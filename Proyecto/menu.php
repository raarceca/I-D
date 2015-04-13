<link type="text/css"; rel="stylesheet"; href="stylesheet.css"/>
<body>
<div>
    <center>
        <a href="main.php">Home</a> | <a href="showUsers.php"> Mostrar Usuarios </a> | <a href="adduser.php">Add User</a> | <a href="modifyuser.php">Modify User</a> | <a href="deleteuser.php">Delete User</a> || Bienvenido: <?php echo $_SESSION['apellido1'] . ' ' . $_SESSION['apellido2'] . ', ' . $_SESSION['nombreUsuario']; ?> | <a href="logout.php">Logout</a>
    </center>
</div>
</body>