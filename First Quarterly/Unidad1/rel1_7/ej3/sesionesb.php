<?php
session_start();
?>
    <html>
    <body>
    <h1>Manejo de sesiones</h1>
    <h2>Paso 2. Se accede la variable de sesión y se destruye</h2>
    Valor de la variable de sesión: <?php echo $_SESSION['user']; ?>
    <br/><br/>
    <a href="sesionesc.php">Paso 3</a>.
    </body>
    </html>
<?php
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
}
?>