<?php
/**
 * Created by PhpStorm.
 * User: ihton
 * Date: 23/10/2017
 * Time: 09:25
 */
?>
<head>
    <title>Ejercicio 1</title>
</head>
<body>
<form action="ejercicio1-resultados.php" method="post">
    Cadena a buscar:<br/>
    <input type="text" name="search" value="Pepeluí">
    <br/><br/>

    Radio:<br/>
    <input type="radio" name="gender" value="male" checked> Male
    <input type="radio" name="gender" value="female"> Female
    <input type="radio" name="gender" value="other"> Other
    <br/><br/>

    Checkbox:<br/>
    <input type="checkbox" name="extras[]" value="Garaje">Garaje
    <input type="checkbox" name="extras[]" value="Piscina">Piscina
    <br/><br/>

    Password:<br/>
    <input type="password" name="psw">
    <br/><br/>

    Select:<br/>
    <select name="color">
        <option value="rojo">Rojo</option>
        <option value="verde">Verde</option>
        <option value="azul">Azul</option>
    </select>
    <br/><br/>

    Idioma:<br/>
    <select name="idioma[]" multiple>
        <option value="ingles">Inglés</option>
        <option value="frances">Francés</option>
        <option value="aleman">Alemán</option>
    </select>
    <br/><br/>

    <input type="submit" value="Enviar">
</form>
</body>