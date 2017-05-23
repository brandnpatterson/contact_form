
<?php require_once './config.php' ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>PHP Contact Form</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<link rel="stylesheet" href="index.css" />
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Enter your message below</h1>
					<?php if (!empty($errors)) : ?>
					<div class="errors">
						<p class="bg-danger">
							<?php echo implode( '</p><p class="bg-danger">', $errors ); ?>
						</p>
					</div>
					<?php elseif ($sent) : ?>
					<div class="success">
						<p class="bg-success">Thank you! Your e-mail has been sent!</p>
					</div>
					<?php endif; ?>
					<form role="form" method="post" action="index.php">
						<div class="form-group">
							<input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo isset( $fields['name']) ? _e($fields['name']) : '' ?>">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="email" placeholder="E-mail" value="<?php echo isset( $fields['email']) ? _e($fields['email']) : '' ?>">
						</div>
						<div class="form-group">
							<textarea class="form-control" rows="4" placeholder="What's up?" name="message"><?php echo isset( $fields['message']) ? _e($fields['message']) : '' ?></textarea>
						</div>
						<div class="form-group">
							<label for="human" class="control-label">
								5 + 2 = ?
							</label>
							<input type="text" class="form-control" name="human" placeholder="Show us you're a human!">
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
