<html>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="Sitio/public/css/ayuda_estilos.css"/>
<title>Men&uacute</title>

    <body>
       
        <nav class="horizontal_menu">
    <ul>
        <li><a href="main.php">Inicio</a></li>
        <li><a href="adduser.php">Agregar Usuario</a></li>
        <li><a href="modifyuser.php">Modificar Usuario</a></li>
        <li><a href="deleteuser.php">Eliminar Usuario</a></li>
        <li><a href="showUsers.php">Listar Usuarios</a></li>
        <li><a href="http://">Configuraci&oacuten MV</a></li>
        <li><a href="http://">Registrar POS</a></li>
        <li><a href="http://">Gesti&oacuten de Respaldos</a></li>
        <li><a href="ayuda.php">Ayuda</a></li>
        <li><a href="contactenos.php">Cont&aacutectenos</a></li>
        <li><a href="logout.php">Logout</a></li>
        </ul>
</nav>
            <br><br><br><br><br>
            <p align="right"><?php echo 'Bienvenido: '.$_SESSION['nombreUsuario'].' '.$_SESSION['apellido1'].' '.$_SESSION['apellido2'] ?></p>
        </nav>
    </body>
</html>