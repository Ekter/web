<?php

   $user = $_POST['user'];
   $content = trim($_POST['content']);
   $room=$_POST['room'];

   $file=fopen("database/chatrooms/$room","a");
   fwrite($file,"\n$user: $content");
   fclose($file);
   header('Location: chatroom.php?room='.$room);
?>
