<?php

// define the variables and set to empty values
$amount 	= "";
$year 		= "";
$interest 	= 10; // 10% 
$instalment = "";

// read values passed from HTML form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['amount'])) {
		$amount = $_POST['amount'];
	}
	if (isset($_POST['year'])) {
		$year = $_POST['year'];
	}
	if (isset($_POST['instalment'])) {
		$instalment = $_POST['instalment'];
	}
}

// echo out passed values to the page
echo <<<EOT
<table class="table table-sm table-striped table-bordered text-center">
	<thead>
		<tr>
			<th scope="col">Loan Amount</th>
			<th scope="col">Years</th>
			<th scope="col">Interest</th>
			<th scope="col">Instalment</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>$amount BGN</td>
			<td>$year</td>
			<td>$interest</td>
			<td>$instalment</td>
		</tr>
	</tbody>
</table>
EOT;

// calculate time in months
$months = $year * 12;

// check out which is the instalment
// case sensitive!
if (strcmp($instalment, "Fixed") == 0) { // fixed amortization schedule
	// calculate fixed payment for month
	$fixedPayment = $amount / $months;
	$interestRateForMonth = $interest / 12;

	// calculate interest for every month
	for ($i = 0; $i < $months; $i++) {
		// interest for the month. 
		$interestForMonth = $amount / 100 * $interestRateForMonth;
		// diminish capital after calculating interest
		$amount = $amount - $fixedPayment;
		// payment for month is fixed pay + interest
		$paymentForMonth = $fixedPayment + $interestForMonth;
		// echo out payment for this month. Output is formatted (payment has two digits) 
		$month = $i + 1;

		printf("<ul class='list-group'><li class='list-group-item text-center'>Month <span class='badge badge-primary badge-pill'>$month</span> payment is: <span class='text-danger'>%.2f</span></li></ul>", $paymentForMonth);
	}
	// annuity   
} else {
	// calculate monthly pay
	$interest = $interest / 100;
	$result = $interest / 12 * pow(1 + $interest / 12, $months) / (pow(1 + $interest / 12, $months) - 1) * $amount;
	printf("<strong>Monthly pay is:</strong> <span class='text-danger'>%.2f</span>", $result);
}
