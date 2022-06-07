<?php
    // à compléter
    // dans cette partie, on détruit la session
    // et on redirige l'utilisateur vers la page de login
    session_start();
    session_destroy();
    session_unset();
    session_abort();
    header('Location: signin.php');

?>
