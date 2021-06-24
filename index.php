<!DOCTYPE HTML>
<html>
<head>
	<title>Credit Plus</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<style>
		fieldset.fs-border {
			border: 1px groove #ddd !important;
			padding: 0 1.4em 1.4em 1.4em !important;
			margin: 0 0 1.5em 0 !important;
			-webkit-box-shadow:  0px 0px 0px 0px #000;
					box-shadow:  0px 0px 0px 0px #000;
		}
		legend.fs-border {
			font-weight: bold !important;
			text-align: center !important;
			padding: 0 10px;
			border-bottom: none;
		}
		.input-group > .input-group-prepend > .input-group-text {
			width: 150px;
		}
		.form-control:disabled, .form-control[readonly] {
			background-color: #fff;
			cursor: not-allowed;
		}
	</style>
</head>

<body>
	<div class="container my-5">
		<div class="row">
			<div class="col-lg-6 offset-lg-3">
				<fieldset class="fs-border">
					<legend class="fs-border">Credit Plus</legend>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
						<div class="form-group">
							<label>Loan amount</label>
							<input name="amount" type="range" class="form-control-range" min="500" max="5000" step="0.5" value="500" onInput="$('#rangeval').html($(this).val())">
							<span id="rangeval">500</span> BGN
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text" for="inputGroupSelect01">Years</label>
							</div>
							<select name="year" class="custom-select" id="inputGroupSelect01" required>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
							</select>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text" for="inputGroupSelect02">Interest Rate (%)</label>
							</div>
							<input type="text" name="interest" class="form-control" value="10.00" disabled>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text" for="inputGroupSelect03">Instalment</label>
							</div>
							<select name="instalment" class="custom-select" id="inputGroupSelect03" required>
								<option>Fixed</option>
								<option>Annuity</option>
							</select>
						</div>
						<button type="submit" class="btn btn-primary" id="submitBtn">Calculate</button>
					</form>
				</fieldset>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 offset-lg-3 my-5">
				<?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
					<?php require_once('./loan.php'); ?>
					<p class="mt-5">
						<a class="btn btn-secondary" href="./index.php">Clear</a>
					</p>
				<?php endif ?>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>