<?php
session_start();
if (isset($_SESSION['apellido1']) == false){
    header("location:login.php"); //Redirecciona la pagina hacia otra pagina.
}
?>
<html>
    <head>
        <title>Main</title>
        <!--<link type="text/css"; rel="stylesheet"; href="stylesheet.css"/>-->
    </head>
    <body>
        <header>
            <img src="img/Logo.png" width="7%" height="15%""> <center>Main Page</center>
        </header>
        <div><?php include('menu.php'); ?></div>
        <section>

        </section>
        <footer>
            <center>Copyright 2015. Developed by I&D</center>
        </footer>
    </body>
</html>