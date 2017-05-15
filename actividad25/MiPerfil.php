<?php
include 'lib/seguridad.php';
$seguridad = new seguridad();
	if ($seguridad->getUsuario()== null){
		header('Location: index.php');
		exit;
	}
	
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
	<?php
		if ((empty($_POST['email']))&&
		(empty($_POST['nombre']))&&
		(empty($_POST['apellidos']))&&
		(empty($_POST['roles']))){
				
	?>
	<h1>Bienvenido a tu perfil</h1><hr>
	<form class="" action="MiPerfil.php" method="post">

	EMAIL<br><br><input type="text" name="email"  placeholder="Usuario" value="<?=$_GET['email']?>" readonly required/><br><br>
	
	NOMBRE<br><br><input type="text" name="nombre" placeholder="Actualiza tu nombre"><br><br>

	APELLIDOS<br><br><input type="text" name="apellidos" placeholder="Actualiza tu apellido"><br><br>
	
	ROLES<br><br><select name="roles">
		<option value="">ELIGE UN ROL</option>
		<option value="user">USER</option>
		<option value="admin">ADMIN</option>
		<option value="superadmin">SUPERADMIN</option>
		</select>
		
	<br><br><input type="submit" name="" value="ACTUALIZAR">
	</form>
	<form class="" action="MiPerfil.php" method="post">
	<input type="hidden" name="logout" value="Logout">
	<input type="submit" name="logout" value="LogOut">
	<?php
	}
	
	if (isset($_POST['logout'])){
			echo "Logout correcto";
			$seguridad->logout();
			header('Location: index.php');
		}
			
	if((isset($_POST['email'])) && (!empty($_POST['email'])) &&
        (isset($_POST['nombre'])) && (!empty($_POST['nombre'])) &&
        (isset($_POST['apellidos'])) && (!empty($_POST['apellidos']))&&
	(isset($_POST['roles'])) && (!empty($_POST['roles']))) {
			
		include 'lib/usuarios.php';
		$user = new usuario();	
		$user->updateUser($_POST['nombre'],$_POST['apellidos'],$_POST['roles'],$_POST['email']);
		echo "Enhorabuena, tu usuario ha sido actualizado";	
		}	
	?>
	</body>
	</html>
