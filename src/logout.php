<?php
session_start();

// Distruge sesiunea
session_destroy();

// Ștergem cookie-ul de autentificare
if (isset($_COOKIE['remember_token'])) {
    unset($_COOKIE['remember_token']);
    setcookie('remember_token', '', time() - 3600, '/');
}
// Redirecționează către pagina de index
header("Location: index.php");
exit();
?>
