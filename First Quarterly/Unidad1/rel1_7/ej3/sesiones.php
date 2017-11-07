<?php
session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = 'María';
}
?>
<html>
<body>
<h1>Manejo de sesiones</h1>
<h2>Paso 1. Se crea la variable de sesión y se almacena</h2>
Valor de la variable de sesión: <?php echo $_SESSION['user']; ?>
<br/><br/>
<a href="sesionesb.php">Paso 2</a>.
</body>
</html>
