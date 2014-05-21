<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>El Arbol De La No Vida</title>
<link rel="stylesheet" href="css/reset.css" media="all" type="text/css" />
<link rel="stylesheet" href="css/general.css" media="all" type="text/css" />
<link rel="stylesheet" href="css/print.css" media="print" type="text/css" />
</head>

<body>
<div id="contenedor">

<h1> Ya sos parte del arbol de la no vida...</h1>
<br/>

<div id="copa">

<?
include ("includes/conexion_mysql.php");
$conec = conectar();
$ssql_etiquetas = "SELECT nombre,ip,valor FROM direcciones"; 

//$ssql_etiquetas="select nombre_etiqueta, id_etiqueta , apariciones from etiqueta";
$rs_etiquetas=mysql_query($ssql_etiquetas);
//Creo un array para meter los datos de las etiquetas
$etiquetas = array();
$etiquetasip = array();
while($fila_etiquetas=mysql_fetch_object($rs_etiquetas)){
   //Voy creando el array asociativo
   $etiquetas[$fila_etiquetas->nombre]=$fila_etiquetas->valor;
   $etiquetasip[$fila_etiquetas->ip]=$fila_etiquetas->valor;
}
//defino array con las etiquetas y las apariciones


function nube_etiquetas($etiquetas,$etiquetasip){
   //saco los valores máximo y minimo de la apariciones de etiquetas
   $valor_max = max($etiquetas);
   $valor_min = min($etiquetas);
   $diferencia = $valor_max - $valor_min;
   
   //creo la capa donde se van a mostrar las etiquetas
   echo '<div class="nube">';
   echo '<div class="etiquetas">';
   
   foreach ($etiquetas as $nombreetiqueta=>$apariciones){
      //calculo un valor de 0 a 10 para cada etiqueta, porcentualmente según valores máximos y mínimos encontrados
      $valor_relativo = round((($apariciones - $valor_min) / $diferencia) * 10);
      //escribo las etiquetas con su estilo dependiendo del valor porcentual
      echo "<span class='etiquetatam$valor_relativo'>";
      //echo $nombreetiqueta;
      ?>
      <a target="_blank" href="http://www.facebook.com/search.php?q=<?php echo $nombreetiqueta ?>&type=users&init=srp"><?php echo $nombreetiqueta?></a>
	  <?
   		echo "</span> ";
	  }
	  
	  foreach ($etiquetasip as $nombreetiquetaip=>$apariciones){
      //calculo un valor de 0 a 10 para cada etiqueta, porcentualmente según valores máximos y mínimos encontrados
      $valor_relativo = round((($apariciones - $valor_min) / $diferencia) * 10);
      //escribo las etiquetas con su estilo dependiendo del valor porcentual
      echo "<span class='etiquetatam$valor_relativo'>";
      //echo $nombreetiqueta;
      ?>
	 
      <a target="_blank" href="http://www.geoiptool.com/es/?IP=<?php echo $nombreetiquetaip ?>"> <?php echo $nombreetiquetaip ?> </a>
      <?
      echo "</span> ";
   
   }
   
   
	


//cierro la nube y las etiquetas
   echo '</div>';
   echo '</div>';
}
nube_etiquetas($etiquetas,$etiquetasip);

?>

</div>

<div id="arbol">
</div>

</div> 
</body>
</html>