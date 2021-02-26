<?php
 if($_SESSION["estado"]!=1){
  $_SESSION["estado"]=1;
 }else{
   header("location:../index.php");
 }
 function limite($i,$j,$N,$M){
    return ($i>=0&&$j>=0&&$i<$N&&$j<$M);
 }
 $N=$_SESSION["valorN"];
 $M=$_SESSION["valorM"];

 $aux=max($N,$M);
 $G=($N*$M)/$aux;
 $H=$N*$M/(($N+$M)/2);
 $P=$G+$H;
 $X=($N*$M)-($G*3+$H*2+$P)/2;
 $X=round ( $X ,0,PHP_ROUND_HALF_DOWN );

 /*divido el numero de naves por el pacio de la matriz*/
 $G=round ( $G/3 ,0,PHP_ROUND_HALF_DOWN );
 $H=round ( $H/2 ,0,PHP_ROUND_HALF_DOWN );
 $P=round ( $P/2 ,0,PHP_ROUND_HALF_DOWN );
 /*Creo la matriz */
 $mar=[];
 $naves=[$G,$H,$P];

 for($i=0;$i<$N;$i++){
    for($j=0;$j<$M;$j++){
        $mar[$i][$j]=0; //se carga
    }
 }
 $tipo=3;
 $contR=0;
 while($tipo>0){
   $total=$naves[$contR];
   $cont=0;
   while($cont<$total){
    $aux=0;
    while($aux==0){
      $i=rand ( 0 , $N-1 );
      $j=rand ( 0 , $M-1 );
      if($tipo>1){
        $giro=0;
        while($giro<8){
          $cont1=0;
          $espacio=0;
      
          $v=0;$v1=0;//valor para el giro en la matriz
          switch($giro+1){
              case 1: $v=1; $v1=1;  break;
              case 2: $v=1; $v1=0;  break;
              case 3: $v=1; $v1=-1; break;
              case 4: $v=0; $v1=-1; break;
              case 5: $v=-1;$v1=-1; break;
              case 6: $v=-1;$v1=0;  break;
              case 7: $v=-1;$v1=1;  break;
              case 8: $v=0; $v1=1;  break;
          }
           
          while($cont1!=$tipo){
            $ii=$i+$cont1*$v;
            $jj=$j+$cont1*$v1;
            if(limite($ii,$jj,$N,$M)){            
               if($mar[$ii][$jj]===0){
                $espacio++;
               }
            }
            $cont1++;
          }

          if($espacio===$tipo){
            $cont1=0;
            while($cont1!=$tipo){
              $ii=$i+$cont1*$v;
              $jj=$j+$cont1*$v1;
              $mar[$ii][$jj]=$tipo;
              $cont1++;
            }
            $aux=1;$giro=8;
            break;             
          }    
        $giro++;
       }//giro en busqueda de un espacio           
      }else{
        
        $ii=$i+$cont1*$v;
        $jj=$j+$cont1*$v1;
        if(limite($ii,$jj,$N,$M)){
          if($mar[$ii][$jj]===0){
            $mar[$ii][$jj]=$tipo;
            $aux=1;
          }
        }
        
      }
    }   
  $cont++;
} 
  $contR++;
  $tipo--;
 }

/*
 for($i=0;$i<$N;$i++){
   for($j=0;$j<$M;$j++){
     echo "-".$mar[$i][$j]."-";
   }
   echo "<br/>";
 }
 echo "N:".$N."-M:".$M."-G:".$G."-H:".$H."-P:".$P."-X:".$X;
 */

$_SESSION["G"]=$G;
$_SESSION["H"]=$H;
$_SESSION["P"]=$P;
$_SESSION["X"]=$X;
$_SESSION["GT"]=$G;
$_SESSION["HT"]=$H;
$_SESSION["GV"]=3;
$_SESSION["HV"]=2;
$_SESSION["PT"]=$P;
$_SESSION["XT"]=$X;
$_SESSION["GR"]=0;
$_SESSION["HR"]=0;
$_SESSION["mapa"]=$mar;
$_SESSION["estado"]=3;
$_POST["estado"]=1;
header("location:index.php");
?>