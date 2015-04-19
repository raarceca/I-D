<html>
<meta charset="utf-8">
<link type="text/css"; rel="stylesheet"; href="css/estilos.css"/>
<title>Pure CSS3 Menu</title>

    <body>
        <!--
        <div>
            <center>
                <a href="main.php">Home</a> | <a href="showUsers.php"> Mostrar Usuarios </a> | <a href="adduser.php">Add User</a> | <a href="modifyuser.php">Modify User</a> | <a href="deleteuser.php">Delete User</a> || Bienvenido: <?php echo $_SESSION['apellido1'] . ' ' . $_SESSION['apellido2'] . ', ' . $_SESSION['nombreUsuario']; ?> | <a href="logout.php">Logout</a>
            </center>
        </div>
        -->
        <nav role='navigation'>
            <ul>
                <li><a href="main.php">Inicio</a></li>
                <li><a href="#">Gestion de Usuario</a>
                    <ul>
                        <li><a href="adduser.php">Agregar</a></li>
                        <li><a href="modifyuser.php">Modificar</a></li>
                        <li><a href="deleteuser.php">Eliminar</a></li>
                        <li><a href="showUsers.php">Listar Usuarios</a></li>
                    </ul>
                </li>
                <li><a href="#">Respaldos</a>
                    <ul>
                        <li><a href="">Configuracion MV</a></li>
                        <li><a href="">Registar PoS</a></li>
                        <li><a href="">Gestion de Respaldos</a></li>
                    </ul>
                </li>
                <li><a href="contactenos.php">Contactenos</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            <br><br><br><br><br>
            <p align="right"><?php echo 'Bienvenido: '.$_SESSION['nombreUsuario'].' '.$_SESSION['apellido1'].' '.$_SESSION['apellido2'] ?></p>
        </nav>
    </body>
</html>