<?php 

global $host, $usuario, $contrasenia, $base; //declaramos las variables como globales
$host = "mysql4.000webhost.com"; //SERVIDOR
$usuario = "a6790369_grindel";		//USUARIO
$contrasenia = "gorthang2";		//CONTRASEÑA
$base = "a6790369_arbol";	//BASE DE DATOS


function conectar(){
global $host, $usuario, $contrasenia, $base; //las globales se llaman siempre antes de usarlas
$idConexion = mysql_connect($host, $usuario, $contrasenia) or die(mysql_error());
mysql_select_db($base, $idConexion);
mysql_query("SET NAMES utf8");
return $idConexion;
};


?>
