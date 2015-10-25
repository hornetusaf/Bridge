<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.cuerpo {
	text-align: justify;
}
.centrado {
	text-align: center;
}
</style>
</head>

<body>

<h1 class="centrado">Bienvenidos a Bridge</h1>
<p class="cuerpo">Bridge es un juego de tablero para dos personas, que se basa en un tablero cuadrado
  impar, donde dicho tablero posee tres colores, azul para el jugador 1, roja para el jugador 2, y marrón que son las únicas casillas donde los jugadores podrán
  marcar con su color, la idea del juego es formar un puente entre dos extremos, el jugador 1 lo deberá formar de izquierda a derecha y el Jugador 2 de arriba a 
  abajo. El juego comenzara con el jugador 2, y los turnos se intercalaran.</p>
<form id="form1" name="form1" method="post" action="">
  <p class="cuerpo"><strong> Nombres  jugadores:</strong> <span class="cuerpo">
    <input name="jugador1" type="text" id="textfield" value="<?php 
	if(!isset($_POST["jugador1"]))
		echo "Jugador 1";	
	else
	if(isset($_POST["jugador1"]) && ($_POST["jugador1"]=="Jugador 1" || $_POST["jugador1"]=="" || $_POST["jugador1"]=="Nombre Requerido Jugador 1" ))
		echo "Nombre Requerido Jugador 1";
	else
		echo $_POST["jugador1"]; ?>" size="40" />
    </span> <span class="cuerpo">
    <input name="jugador2" type="text" id="textfield2" value="<?php 
	if(!isset($_POST["jugador2"]))
		echo "Jugador 2";	
	else
	if(isset($_POST["jugador2"]) && ($_POST["jugador2"]=="Jugador 2" || $_POST["jugador2"]=="" || $_POST["jugador2"]=="Nombre Requerido Jugador 2"))
		echo "Nombre Requerido Jugador 2";
	else
		echo $_POST["jugador2"]; ?>" size="40" />
    </span></p>
  <p class="cuerpo"><strong>Tamaño del tablero:
    <input name="tam_x" type="text" id="textfield3" size="5" value="<?php 
	 if(isset($_POST["tam_x"]) && $_POST["tam_x"]%2==1)
	     	echo $_POST["tam_x"];
	 else
	 	echo "";
		 ?>"/>
    X
    <input name="tam_y" type="text" id="textfield4" size="5" value="<?php 
	 if(isset($_POST["tam_y"]) && $_POST["tam_y"]%2==1)
	     	echo $_POST["tam_y"];
	 else
	 	echo "";
		 ?>"/>
    </strong>
    <input type="submit" name="boton_jugar" id="button" value="Jugar" />
  </p> 
  
</form>

<?php
	if(isset($_POST["boton_jugar"]))
	{		
		if($_POST["jugador1"]!="Jugador 1" && $_POST["jugador1"]!="Nombre Requerido Jugador 1" && $_POST["jugador1"]!="" && $_POST["jugador2"]!="Jugador 2" && $_POST["jugador2"]!="Nombre Requerido Jugador 2" && $_POST["jugador2"]!="")
		{
			if($_POST["tam_x"]%2==1 && $_POST["tam_y"]%2==1)
			{
				$_SESSION["jugador1"]=$_POST["jugador1"];
				$_SESSION["jugador2"]=$_POST["jugador2"];
				$_SESSION["x"]=$_POST["tam_x"];
				$_SESSION["y"]=$_POST["tam_y"];
				$_SESSION["turno"]=2;
				$_SESSION["band"]=1;
				header("location:juego.php");
			}
			else
				echo "Debe ingresar tamaños impares";
		}
		else
		{
			echo "Revise los nombres de los jugadores";	
		}
	}
?>

<p class="cuerpo">&nbsp;</p>
</body>
</html>