<?php 

$msg = '';
$msgClass = '';

	if(filter_has_var(INPUT_POST, 'submit')){
		$name = htmlspecialchars($_POST['name']);
		$phone = htmlspecialchars($_POST['phone']);
		$email = htmlspecialchars($_POST['email']);
		if(empty($name) || empty($phone) || empty($email)){
			$msg = 'Todos os campos são obrigatórios!';
			$msgClass = 'alert-danger';
		}else{
			if(filter_var($email, FILTER_VALIDATE_EMAIL)){
				$msg = 'Obrigado pelas informações! Cadastro finalizado com sucesso!';
				$msgClass = 'alert-success';
			}else{
				$msg = 'Por favor, informe um e-mail válido!';
				$msgClass = 'alert-danger';
			}
			
		}
	}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>My Form</title>
		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">My Form</a>
				</div>
			</div>
		</nav>
		<div class="container">
			<?php if($msg != ''):?>
				<div class="alert <?php echo $msgClass; ?>">
					<?php echo $msg; ?>
				</div>
			<?php endif; ?>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<div class="form-group">
					<br>
					<label>Name</label>
					<input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
				</div>
				<div class="form-group">
					<label>Phone number</label>
					<input type="text" name="phone" class="form-control" value="<?php echo isset($_POST['phone']) ? $phone : ''; ?>">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
				</div>
				<br>
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				<br><br>
			</form>
		</div>
	</body>
</html>
