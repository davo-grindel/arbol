<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>El Arbol De La No Vida</title>
<link rel="stylesheet" href="css/general.css" media="all" type="text/css" />
</head>

<body>
<div id="contenedor">

<h1>Ingresa tu nombre</h1>

	<form method="POST" action="subir.php" enctype="multipart/form-data">
  <fieldset>
		<label for="nombre">Tu nombre:</label>
		<input name="nombre" type="text" class="nombre" />
	    		   
    	<label for="usuario">Usuario:</label>
		<input name="usuario" type="text" />
   
    <label for="password">Password:</label>
		<input name="password" type="password" />
		<input class="submit" name="registrarse" type="submit" value="Aceptar" />
  	 
  </fieldset>
	</form>  
<img src="captcha.php" width="100" height="40"  />
</div> 
</div>

</body>
</html>