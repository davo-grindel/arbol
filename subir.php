
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subir</title>
</head>
<body>
<div id="contenedor">

<?php

include ("includes/conexion_mysql.php");
function getIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        return $_SERVER['HTTP_CLIENT_IP'];
       
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
   
    return $_SERVER['REMOTE_ADDR'];
}


$cnx = conectar ();

//chequeo si existe el código ingresado
$sqlCheck = "SELECT nombreLogin,password FROM usuarios WHERE nombreLogin='$_POST[usuario]'  AND password='$_POST[password]'";
$resultado = mysql_query($sqlCheck) or die (mysql_error());
$num = mysql_num_rows($resultado);

/*chequeo si hay un submit de formulario y si resultado del query anterior dio al menos un valor. No es la major manera pero evita que: 
1. Se ingresen datos vacios en la base accediendo a subir.php directamente.
2. se chequea un código para evitar que un formulario en otra página me meta basura en mi base.*/
if(isset($_POST['registrarse']) && $num == 1 ){ //el isset es para comprobar que entran a la pagina por el boton y no por la url //
	
	
	/***** MANEJO DEL ARCHIVO SUBIDO **********/

		//datos del arhivo, estos se generan por defecto en POST
	//	$nombre_archivo = $_FILES['archivo']['name'];
	//	$tipo_archivo = $_FILES['archivo']['type'];
	//	$tamano_archivo = $_FILES['archivo']['size'];
		//compruebo si las características del archivo son las que deseo
		//if (($tipo_archivo != "imagen/x-JPEG") || ($tamano_archivo > 1000000)) {
		//		echo "<p>La extensión o el tamaño del archivo no es correcta. Se permiten archivos .jpg de hasta 1 MB.</p>";
	//	}else{
		//		move_uploaded_file($_FILES["archivo"]["tmp_name"],"img/flog/" . $_FILES["archivo"]["name"]);
			//	echo "Archivo subido en: " . "img/flog" . $_FILES["archivo"]["name"];
	//	};
	
	$nombre=$_POST['nombre'];
	$ip=getIP();
	//medida de seguridad para comillas simples y dobles (para evitar que se ingrsen las comillas//
	mysql_real_escape_string($nombre);
	mysql_real_escape_string($ip);
			
	
	$valor = (rand(1,20));
	
	
	$sql= "INSERT INTO direcciones (nombre, ip, valor) VALUES ('";
	$sql .= $nombre;
	$sql .= "','";
	$sql .= $ip;
	$sql .= "','";
	$sql .= $valor;
	$sql .= "');";
	
	$res = mysql_query($sql) or die(mysql_error());
	echo "Datos ingresados";
	echo '<br /><br /><a href="arbol.php">Ver Arbol</a>';
	echo '<br /><br /><a href="index.php">Nuevo</a>';
	
 } else {
	echo "<p>El usuario y/o password es incorrecto.</p>";
	echo "<br /><br /><a href=". $_SERVER['HTTP_REFERER'].">Volver al formulario.</a>";
};

	mysql_close($cnx);
	exit;
?>

</div>
</body>
</html>