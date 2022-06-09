<?php
session_start();
//get user from the $_GET, with replacing all the special characters
if (isset($_SESSION["user"])){// || isset($_GET["redirect"])) {
    // print_r($_SESSION);
    $user = $_SESSION["user"];
    // $_SESSION["user"] = $_GET["redirect"];
} else {
    // $user="Moi";
    header('Location: signin.php');
    exit();
} ?>
<!DOCTYPE html>
<html lang="en">

<?php
$list_chatrooms_filenames = scandir("database/chatrooms");
$list_chatrooms_filenames = array_slice($list_chatrooms_filenames, 2);
$list_chatrooms = [];
$chatrooms_ext = [];
foreach ($list_chatrooms_filenames as $file_name) {
    $list_chatrooms[] = explode(".", $file_name)[0];
    $chatrooms_ext[explode(".", $file_name)[0]] = $file_name;
}
// print_r($list_chatrooms_filenames);
// print_r($list_chatrooms);
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Chatrooms <?php echo $user?></title>
    <meta name="description" content="Global - free CSS template provided by templatemo.com" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="js/simpleajax.js"></script>
    <script src="js/message.js"></script>
    <script src="js/chatroom.js"></script>
</head>

<body>
    <div id="haut">
        <ul>
            <li><a href="signout.php">Logout</a></li>
        </ul>
    </div>
    <h1>Chatrooms</h1>
    <hr>


    <?php $target_chatroom = $_GET['room'];
    // echo $target_chatroom;

    if (in_array($target_chatroom, $list_chatrooms)) {
        echo '<article class="column" id="left">';
        $len_max = 75;
    } else {
        echo '<article class="column" id="left-middle">';
        $len_max = 100;
    }

    ?>
    <h3>Liste des chatrooms:</h3>
    <?php
    foreach ($list_chatrooms_filenames as $file) {
        $value = explode(".", $file)[0];
        echo "<a class='button' id='chatroom_preview' href='?room=$value'>";
        // echo "<p class='editable' data-id='$value'>";
        echo "<div class='chatroom'> #$value</div>";
        $fp = fopen("database/chatrooms/$file", "r");
        fseek($fp, -1, SEEK_END);
        $pos = ftell($fp);
        $lastline = "";
        // Loop backward util "\n" is found, to display the last message
        while ((($C = fgetc($fp)) != "\n") && ($pos >= -1)) {
            $lastline = $C . $lastline;
            fseek($fp, $pos--);
        }
        fclose($fp);
        if (strlen($lastline) > $len_max) {
            echo "<code>" . substr($lastline, 0, $len_max) . "...</code>";
        } else {
            echo "<code>" . substr($lastline, 0, -1) . "</code>";
        }
        echo "</a>";
    }
    ?>

    </article>

    <?php
    if (in_array($target_chatroom, $list_chatrooms)) {
        $target_chatroom_ext = $chatrooms_ext[$target_chatroom];

        echo '<article class="column" id="right">';
        echo '<h3>Chatroom: ' . $target_chatroom . '</h3>';
        echo '<div id="chatbox">';
        $fp = fopen("database/chatrooms/$target_chatroom_ext", "r");
        while (!feof($fp)) {
            $line = fgets($fp);
            echo "<p>$line</p>";
        }
        fpassthru($fp);
        echo '</div>';
        echo '<form id="form_msg" action="" method="post">';
        echo '<textarea id="message_content" name="message" id="message" rows="5" cols="50"></textarea>';
        echo "<input id='message_room' type='hidden' name='room' value='$target_chatroom_ext'>";
        echo "<input id='user_name_form' type='hidden' name='user' value='$user'>";
        echo '</form>';
        echo '</article>';
    }
    ?>

</body>

</html>