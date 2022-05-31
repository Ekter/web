<?php

   $id = $_POST['user'];
   $content = trim($_POST['content']);

   $file=fopen("database/$id.txt","a");
   $file.="$user:$content";
   fclose($file);
?>
