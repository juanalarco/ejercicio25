<?php
include 'db.php';
/**
 *
 */
class usuario extends db
{

  function __construct()
  {
    //Realizamos la conexion a la base de datos mediante db.
    parent::__construct();

  }


  //Funcion para insertar Usuario
  public function insertarUser($email,$contrasenya,$nombre,$apellidos){

    if ($this->hayError()==true){
        return null;

    }else{

      $sqlInserction="INSERT INTO usuarios(id,usuario,nombre,apellidos,email,rol,pass) VALUES (NULL,'".$email."','".$nombre."','".$apellidos."','".$email."',NULL,'".sha1($contrasenya)."')";

      $this->conexion()->query($sqlInserction);
    }

  }

  // Funcion para mostrar ultimo equipo
  public function mostrarUltimoUsuario(){

    if ($this->hayError()==true){
		return null;

	}else{

		$resultado = $this->conexion()->query("SELECT * FROM carrera ORDER BY id DESC LIMIT ");
		return $resultado;
	}

	}

/* Funcion para inicio de sesion*/
  public function login($usuario){
    if ($this->hayError()==true){
    return null;

	}else{

    $resultado = $this->conexion()->query("SELECT * FROM usuarios WHERE usuario='".$usuario."'");
    return $resultado;
  }

  }

  }




 ?>
