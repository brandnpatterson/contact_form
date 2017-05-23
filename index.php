<?php require_once './config.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Lessons Reciept Form</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/index.css" />
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Lessons Reciept Form</h2>
					<hr />
					<h3>Transaction Info</h3>
					<?php if (!empty($errors)) : ?>
					<div class="errors">
						<p class="bg-danger">
							<?php echo implode('</p><p class="bg-danger">', $errors); ?>
						</p>
					</div>
				<?php elseif (isset($sent)) : ?>
					<div class="success">
						<p class="bg-success">Your reciept was sent successfully.</p>
					</div>
					<?php endif; ?>
					<form role="form" method="post" action="index.php">
						<div class="form-group">
							<input type="text" class="form-control" name="name" placeholder="Client Name" value="">
						</div>
						<div class="form-group">
							<input type="email" class="form-control" name="email" placeholder="Client E-mail" value="">
						</div>
						<div class="form-group">
							<input type="date" class="form-control" name="starting_date"></input>
							<input type="date" class="form-control" name="ending_date"></input>
						</div>
						<div class="form-group">
							<input name="submit" type="submit" value="Send" class="btn btn-primary">
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
