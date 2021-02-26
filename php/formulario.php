<div class="IngresarDatos" method="post" action="">
   <h3>Batalla naval PHP</h3>
   <h3>Ingresar N y M</h3> 
  <input type="text" name="valorN" id="valorN"  value="" placeholder="valor N" required/> 
  <input type="text" name="valorM" id="valorM"  value="" placeholder="valor M" required/>
  <input type="submit" name="Boton" id="button" value="Aceptar" />
</div>

<?php
if(isset($_POST["valorN"])&&isset($_POST["valorM"])){
   if(is_numeric($_POST["valorN"])&&is_numeric($_POST["valorM"])){
    if($_POST["valorN"]>=5&&$_POST["valorN"]<=20&&$_POST["valorM"]>=5&&$_POST["valorM"]<=20){
        $_SESSION["estado"]=2;
        $_SESSION["valorN"]=$_POST["valorN"];
        $_SESSION["valorM"]=$_POST["valorM"];
        
     }else{
        $_SESSION["estado"]=1;
     }
     header("location:index.php");
   } 
}
?>