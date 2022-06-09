<?php
   echo "fsjldfndsf";
   $name=$_GET["name"]; 

   $file=fopen("database/chatroom/$name.csv","w");
   fclose($file);
   header("Location:index.php?room=$name");

?>
