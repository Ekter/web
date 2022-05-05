<?php
    // à compléter
    // dans cette partie, on détruit la session
    // et on redirige l'utilisateur vers la page de login
    session_abort();
    session_start();
    session_destroy();
    header("Location: index.html");

?>
