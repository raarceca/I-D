<?php
session_start();
if (isset($_SESSION['apellido1']) == false){
    header("location:login.php"); //Redirecciona la pagina hacia otra pagina.
}
?>
<html>
    <head>
        <title>Main</title>
        <link type="text/css"; rel="stylesheet"; href="stylesheet.css"/>
    </head>
    <body>
        <header>
            <img src="img/Logo.png" width="7%" height="15%""> Main Page
        </header>
        <div><?php include('menu.php'); ?></div>
        <section>
        <h3>Users Management</h3>
            <ul>
                <li type="disc"> <a href="adduser.php">Add user</a> </li>
                <li type="disc"> <a href="modifyuser.php"> Modify user </a> </li>
                <li type="disc"><a href="deleteuser.php"> Delete user </a> </li>
                <li type="disc"><a href="showUsers.php"> Mostrar Usuarios </a></li>
            </ul>

        </section>
        <footer>
            <center>Copyright 2015. Developed by I&D</center>
        </footer>
    </body>
</html>