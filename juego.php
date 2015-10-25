<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style type="text/css">
.cuerpo {
	text-align: justify;
}
.centrado {
	text-align: center;
}
</style>
<body>
<p>
 <?php
if($_SESSION["band"]==1)
{	
	$_SESSION["band"]=0;
	for($i=0;$i<$_SESSION["x"];$i++)
		for($j=0;$j<$_SESSION["y"];$j++)
		{
			if($i%2==0 && $j%2==0)
				$matriz[$i][$j]=0;
			if($i%2==1 && $j%2==1)
				$matriz[$i][$j]=0;
			if($i%2==0 && $j%2==1)
				$matriz[$i][$j]=1;
			if($i%2==1 && $j%2==0)
				$matriz[$i][$j]=2;	
		}
	$_SESSION["matriz"]=$matriz;	
}

if(isset($_GET["click"]) && $_GET["click"]==1)
{
	$_SESSION["matriz"][$_GET["fila"]][$_GET["columna"]]=1;
}
else
if(isset($_GET["fila"]) && isset($_GET["columna"]))
{
	$_SESSION["matriz"][$_GET["fila"]][$_GET["columna"]]=2;
}

if(isset($_GET["boton_reset"]))
{
	session_destroy();
	header("location:inicio.php");
}

?>
<h1 class="centrado"><?php echo $_SESSION["jugador1"]." vs ".$_SESSION["jugador2"]."\n"; ?></h1>
<form id="form1" name="form1" method="get" action="">
  <table border="5" align="center" cellpadding="3" cellspacing="3" bordercolor="#00CC33">
    <?php
	for($i=0;$i<$_SESSION["x"];$i++)
	{
	?>
    <tr>
      <?php
  		for($j=0;$j<$_SESSION["y"];$j++)
  		{
   			if($_SESSION["matriz"][$i][$j]==0)
   			{
		    ?>
      <td><a href="juego.php?fila=<?php echo $i;?>&columna=<?php echo $j;?>&click=<?php echo $_SESSION["turno"];?>"><img width="40" heigth="40" src="Imagenes/marron.jpg"/></a></td>
      <?php
			}
			if($_SESSION["matriz"][$i][$j]==1)
			{
	        ?>
      <td><img width="40" heigth="40" src="Imagenes/azul.jpg"/></td>
      <?php
			}
			if($_SESSION["matriz"][$i][$j]==2)
			{
	        ?>
      <td><img width="40" heigth="40" src="Imagenes/rojo.jpg"/></td>
      <?php
			}
  		}
        ?>
    </tr>
    <?php
	}
    ?>
  </table>
  <h1 class="centrado">
    <?php  
	if($_SESSION["turno"]==1)
	{	
		$_SESSION["turno"]=2;	
		?>
    <h1 class="centrado"><?php echo "Turno de ".$_SESSION["jugador1"]; ?></h1>
    <?php
    }
	else
	{	
		$_SESSION["turno"]=1;	
		?>
    <h1 class="centrado"><?php echo "Turno de ".$_SESSION["jugador2"]; ?></h1>
    <?php
	}
?>
  </h1>
  <p>
    <center>
      <input type="submit" name="boton_reset" id="button" value="Reiniciar" />
    </center>
  <h1 class="centrado">
    <?php
	  $enc=false;
		for($i=0;$i<$_SESSION["x"];$i++)
			for($j=0;$j<$_SESSION["y"];$j++)
			{			
				if($_SESSION["matriz"][$i][$j]==0)				
					$enc=true;
			}
			
			if(!$enc)
			{
				echo "No es posible seguir jugando se acabaron las casillas disponibles.";?> <br> <?php echo "Fin del juego no hay ganador";	 
			}
    ?>
  </h1>
</form>
</body>
</html>