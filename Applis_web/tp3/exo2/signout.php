<?php
    // à compléter
    // dans cette partie, on détruit la session
    // et on redirige l'utilisateur vers la page de login
    session_destroy();
    session_abort();
    session_start();
    header("Location: login.php");
?>
