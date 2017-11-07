<?php
session_start();
?>

<html>
<body>
<h1>Manejo de sesiones</h1>
<h2>Paso 3. La variable ya ha sido destruída y su valor se ha perdido</h2>
Valor de la variable de sesión: <?php echo @$_SESSION['user']; ?>
<br/><br/>
<a href="sesiones.php">Volver al paso 1</a>.
</body>
</html>
