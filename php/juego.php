<?php
 function limite($i,$j,$N,$M){
    return ($i>=0&&$j>=0&&$i<$N&&$j<$M);
 }
 
   if($_SESSION["estado"]==3){
     if(isset($_POST["estado"])){
      if($_POST["estado"]==4){
        header("location:index.php");
        $_SESSION["estado"]=1;
        $_POST["estado"]=1;
      }   
    }
    $N=$_SESSION["valorN"];
    $M=$_SESSION["valorM"];
   
    $G=$_SESSION["G"];
    $H=$_SESSION["H"];
   
    $GT=$_SESSION["GT"];
    $HT=$_SESSION["HT"];
   
    $GV=$_SESSION["GV"];
    $HV=$_SESSION["HV"];
   
    $GR=$_SESSION["GR"];
    $HR=$_SESSION["HR"];
   
    $P=$_SESSION["P"];
    $X=$_SESSION["X"];
    $mar=$_SESSION["mapa"];
    $game=1;
    if(isset($_POST["fila"])&&isset($_POST["columna"])){
      if(($G+$H+$P)>0&&$X>0){
        if($mar[$_POST["fila"]][$_POST["columna"]]<4&&$mar[$_POST["fila"]][$_POST["columna"]]>0){
          switch($mar[$_POST["fila"]][$_POST["columna"]]){
            case 1:
             $P--;
            break;
            case 2:
             $HR+=1;
             if($HR==$HV){
               $H--;$HR=0;
             }
            break;
            case 3:
             $GR+=1;
             if($GR==$GV){
               $G--;$GR=0;
             }
            break;
          }
         $mar[$_POST["fila"]][$_POST["columna"]]*=(-1);
        }else if($mar[$_POST["fila"]][$_POST["columna"]]==0){
         $mar[$_POST["fila"]][$_POST["columna"]]=4;$X--;
        }
      }
    }
    if(($G+$H+$P)==0&&$X>0){
      $game=10;
    }else if(($G+$H+$P)>0&&$X==0){
      $game=0;
    }
   echo "<div>";
   echo "Cantidad de fallos disponibles:$X<br/>";
   echo "Cantidad de naves :".($G+$H+$P)."<br/>";
   echo "Portaviones:$G---Acorazados:$H---Fragatas:$P<br/>";
   if($game==10){
     echo "<h1>Gano :D<h1/>";
   }else if($game==0){
     echo "<h1>Perdio :,v<h1/>";
   }
   for($i=0;$i<$N;$i++){
     for($j=0;$j<$M;$j++){
       if($game==1){
        if($mar[$i][$j]>=0&&$mar[$i][$j]<4){
          echo "<input class='pos' type='button' onclick='jugar(".$i.",".$j.")' value='' >";
        }else if($mar[$i][$j]<4){
          switch($mar[$i][$j]){
            case -1:
             echo "<input class='pos color1' type='button' onclick='jugar(".$i.",".$j.")' value='F' >";
            break;
            case -2:
             echo "<input class='pos color1' type='button' onclick='jugar(".$i.",".$j.")' value='A' >";
            break;
            case -3:
             echo "<input class='pos color1' type='button' onclick='jugar(".$i.",".$j.")' value='P' >";
            break;
          }
        }else{
          echo "<input class='pos color2' type='button' onclick='jugar(".$i.",".$j.")' value='' >";
        }
       }else{
        if($mar[$i][$j]>=0&&$mar[$i][$j]<4){
          echo "<input class='pos' type='button'  value='' >";
        }else if($mar[$i][$j]<4){
          switch($mar[$i][$j]){
            case -1:
             echo "<input class='pos color1' type='button'  value='F' >";
            break;
            case -2:
             echo "<input class='pos color1' type='button'  value='A' >";
            break;
            case -3:
             echo "<input class='pos color1' type='button'  value='P' >";
            break;
          }
        }else{
          echo "<input class='pos color2' type='button'  value='' >";
        }        
       }
     }
     echo "<br/>";
   }
   echo "<input name='nuevoJuego' type='button' value='Nuevo Juego' onclick='njuego()'  >";
   echo "</div>";

   
   $_SESSION["valorN"]=$N;
   $_SESSION["valorM"]=$M;
   
   $_SESSION["G"]=$G;
   $_SESSION["H"]=$H;
   
   $_SESSION["GT"]=$GT;
   $_SESSION["HT"]=$HT;
   
   $_SESSION["GV"]=$GV;
   $_SESSION["HV"]=$HV;
   
   $_SESSION["GR"]=$GR;
   $_SESSION["HR"]=$HR;
   
   $_SESSION["P"]=$P;
   $_SESSION["X"]=$X;
   $_SESSION["mapa"]=$mar;
   }
 


?>