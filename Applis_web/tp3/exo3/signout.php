<?php
    session_abort();
    session_start();
    session_destroy();
    header("Location: index.html");

?>
