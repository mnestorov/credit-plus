<?php

require_once('./CreditPlus.php');

$data = [
	'loan_amount' 	=> 500,
	'term_years' 	=> 1,
	'interest' 		=> 10,
	'terms' 		=> 3,
	'taxes' => [
        'tax1' => 25,
        'tax2' => 17,
    ],
];

$amortization = new CreditPlus($data);

?>