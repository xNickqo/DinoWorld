<?php
session_start();
require_once('config.php');
 
if(isset($_POST['submit']))
{
	if(isset($_POST['email'],$_POST['password']) && !empty($_POST['email']) && !empty($_POST['password']))
	{
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
 
		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$sql = "SELECT * FROM users WHERE email = :email ";
			$handle = $pdo->prepare($sql);
			$params = ['email'=>$email];
			$handle->execute($params);
			if($handle->rowCount() > 0)
			{
				$getRow = $handle->fetch(PDO::FETCH_ASSOC);
				if(password_verify($password, $getRow['password']))
				{
					unset($getRow['password']);
					$_SESSION = $getRow;
					header('location:index.php');
					exit();
				}
				else
				{
					$errors[] = "Error en  Email o Password";
				}
			}
			else
			{
				$errors[] = "Error Email o Password";
			}
			
		}
		else
		{
			$errors[] = "Email no valido";	
		}
 
	}
	else
	{
		$errors[] = "Email y Password son requeridos";	
	}
 
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title> Registrate </title>
	<link rel="stylesheet" href="assets/css/login-style.css">
</head>

<body>
		<header>
			<a class="link-a-header" href="login.php">
				<img class="logo-header" src="assets/img/logo-dark.svg" alt="">
			</a>
			<nav>
				<a class="ingreso" href="login.php">Ingreso</a>
				<button class="boton-login" > <a href="register.php">Registro</a></button>
			</nav>

		</header>
		<main>
			<div class="login-cont">

				<img class="avatar" src="assets/img/logo-dark.svg" alt="">

				<h5>Únete a nosotros y diviertete jugando a nuestros minijuegos</h5>

				<?php
   					if (isset($errors) && count($errors) > 0) {
        				foreach ($errors as $error_msg) {
            				echo '<div class="alert alert-danger">' . $error_msg . '</div>';
        				}
    				}
				?>

				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					<div class="introducir">
						<input class="input-int" type="text" name="email" 	placeholder="Correo electronico">
						
					</div>
					<div class="introducir">
						<input class="input-int" type="password" name="password" placeholder="Contraseña">
						
					</div>

					<div class="boton-registrar">
						<input class="iniciarahora" type="submit" name="submit" value="Iniciar ahora">
					</div>
				</form>

				<div>
					<a class="linkend" href="register.php">¿No tienes cuenta? Create una cuenta.</a>
				</div>
			</div>
		</main>
		<footer>
			
		</footer>
</body>

</html>