<?php
include 'stockXml.php';

$linda = new SimpleXMLElement($xmlstr);
$a=$linda->trad[0] ;
$b=$linda->trad[1] ;
$c=$linda->trad[2] ;
echo $a. '<br>' . $b .'<br> ' . $c .'</br>'; ;
$aa=$linda->trad[0]->attributes();
$bb=$linda->trad[1]->attributes();
$cc=$linda->trad[2]->attributes();
echo $aa. '<br>' . $bb .'<br> ' . $cc .'</br>'; ;
$con = mysqli_connect("localhost","root","","traduction");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql="INSERT INTO translation (id, traduction) VALUES ('$cc' , '$c'),('$bb' , '$b'),('$aa', '$a');";
$result=mysqli_query($con,$sql);
if($result == true){
                     	echo "félicitation";
                   }
                  else{
	                        echo "valeurs déja existe dans la base donnés";
                       }
?>