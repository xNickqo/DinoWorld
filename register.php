<?php
session_start();
require_once('config.php');
 
if(isset($_POST['submit']))
{
    if(isset($_POST['nombre'],$_POST['apellido'],$_POST['email'],$_POST['password']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['email']) && !empty($_POST['password']))
    {
        $firstName = trim($_POST['nombre']);
        $lastName = trim($_POST['apellido']);

        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $hashPassword = $password;
        $options = array("cost"=>4);
        $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
        $date = date('Y-m-d H:i:s');
 
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $sql = 'SELECT * FROM users WHERE email = :email';
            $stmt = $pdo->prepare($sql);
            $p = ['email'=>$email];
            $stmt->execute($p);
            
            if($stmt->rowCount() == 0)
            {
                $sql = "INSERT INTO users (nombre, apellido, email, `password`, created_at,updated_at) VALUES(:vnombre,:vapellido, :email, :pass,:created_at,:updated_at)";
            
                try{
                    $handle = $pdo->prepare($sql);
                    $params = [
                        ':vnombre'=>$firstName,
                        ':vapellido'=>$lastName,
                       
                        ':email'=>$email,
                        ':pass'=>$hashPassword,
                        ':created_at'=>$date,
                        ':updated_at'=>$date
                    ];
                    
                    $handle->execute($params);
                    
                    $success = 'Usuario creado correctamente!!';
                    
                }
                catch(PDOException $e){
                    $errors[] = $e->getMessage();
                }
            }
            else
            {
                $valFirstName = $firstName;
                $valLastName = $lastName;
                
                $valEmail = '';
                $valPassword = $password;
 
                $errors[] = 'el Email ya esta registrado';
            }
        }
        else
        {
            $errors[] = "el Email no es valido";
        }
    }
    else
    {
        if(!isset($_POST['nombre']) || empty($_POST['nombre']))
        {
            $errors[] = 'el nombre es requerido';
        }
        else
        {
            $valFirstName = $_POST['apellido'];
        }
        if(!isset($_POST['apellido']) || empty($_POST['apellido']))
        {
            $errors[] = 'el apellido es requerido';
        }
        else
        {
            $valLastName = $_POST['apellido'];
        }
 
        if(!isset($_POST['email']) || empty($_POST['email']))
        {
            $errors[] = 'Email es requerido';
        }
        else
        {
            $valEmail = $_POST['email'];
        }
 
        if(!isset($_POST['password']) || empty($_POST['password']))
        {
            $errors[] = 'el Password es requerido';
        }
        else
        {
            $valPassword = $_POST['password'];
        }
        
    }
 
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title> Registrate </title>
	<link rel="stylesheet" href="assets/css/registro-style.css">
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
			<div class="register-cont">

				<h5>Únete a nosotros y diviertete jugando a nuestro minijuego</h5>

				<p>Rellena los campos solicitados para crear tu cuenta y utiliza nuestra aplicación.</p>

				<?php 
                    if(isset($errors) && count($errors) > 0){
                        foreach($errors as $error_msg){
                    		echo '<div class="alert alert-danger">'.$error_msg.'</div>';
                        }
                    }
                                        
                    if(isset($success)){
                        echo '<div class="alert alert-success">'.$success.'</div>';
                    }
                ?>

				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
					<div class="column">
						<input class="input-int" type="text" name="nombre" placeholder="Nombre">
						<input class="input-int-right" type="text" name="apellido" placeholder="Apellido">
					</div>
					<div class="column">
						<input class="correo" type="text" name="email" placeholder="ejemplo@dominio.com">
					</div>
					<div class="column">
						<input class="input-int" type="password" name="password" placeholder="Clave de seguridad">
						<input class="input-int-right" type="password" name="repassword" placeholder="Confirmación de clave">
					</div>

					<p>Al registrarse, esta permitiendo el uso de sus datos proporcionados para que sean usados en la aplicación</p>

					<div class="boton-registrar">
						<input class="iniciarahora"  type="submit" name="submit" value="Iniciar ahora">
					</div>
				</form>

				<div>
					<a class="linkend" href="login.php">¿Ya tienes cuenta? Ingresa a tu cuenta</a>
				</div>
			</div>
		</main>
		<footer>
			
		</footer>
</body>

</html>

