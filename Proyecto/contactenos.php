<?php
Session_start();
?>
<html>
<head>
    <title>Modify User</title>
    <!--<link type="text/css"; rel="stylesheet"; href="stylesheet.css"/>-->
</head>
<body>
<header>
    <img src="img/Logo.png" width="7%" height="15%""> Contactenos
</header>
<div><?php include('menu.php'); ?></div>
<section>
    <form action="#" method="POST" name="actualizar">
        <table>
            <tr>
                <td>Nombre completo:</td>
                <td><input type="text" name="nombreCompleto"></td>
            </tr>
            <tr>
                <td>E-Mail:</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>Comentarios</td>:</td>
                <td>
                    <textarea rows="6" cols="75">

                    </textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Enviar</button></td>
            </tr>
        </table>
    </form>
</section>
<footer>
    <center>Copyright 2015. Developed by I&D</center>
</footer>
</body>
</html>
