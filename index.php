<?php

  session_start();
  
  if(!isset($_SESSION["estado"])){
    $_SESSION["estado"]=1;
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BatallaNavalPHP</title>
</head>
<script type="text/javascript">
function jugar(i,j)
{
  document.Tabla.fila.value=i;
	document.Tabla.columna.value=j;
	document.Tabla.submit();
}

function njuego()
{
  document.Tabla.estado.value=4;
	document.Tabla.submit();
}

</script>
<style>
body{
    margin:0;
    padding:0;
    width:100%;
    height:100vh;
    display:grid;
    place-items:center;
}
.Tabla{
    width:100%;
    height:100%;
    display:grid;
    place-items:center;
}
.IngresarDatos{
    display:flex;
    flex-direction: column;
}
.pos{
    height: 40px;
    width: 40px;
    background-color: blue;
}
.color1{
    background-color: brown;
}
.color2{
    background-color: yellow;
}
</style>
<body>
    <form class="Tabla" name="Tabla" method="post" action="">
    <?php
    
    switch($_SESSION["estado"]){
       case 1:
         include("php/formulario.php");
       break;
       case 2:
         include("php/generarDatos.php");
       break;
       case 3:
         include("php/juego.php");
       break;
    }
    
    ?>
    <input name="fila" type="hidden" value="" />
    <input name="columna" type="hidden" value="" />
    <input name="estado" type="hidden" value="" />
    </form>
</body>
</html>