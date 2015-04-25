<!DOCTYPE html>
<div><?php include('menu.php'); ?></div>
<html>
<head>
	<title>Ayuda</title>
	<link rel="stylesheet" type="text/css" href="Sitio/public/css/ayuda_estilos.css"/>
</head>

<body>
	<div id="header">
		<h1><img src="Sitio/public/img/logo.png"/></h1>
	</div>

	<div id="elementos">
		<h2>Ayuda</h2>
		<ul>
			<li><a href="#agregar_usuario">Agregar usuario</a></li>
			<li><a href="#modificar_usuario">Modificar usuario</a></li>
			<li><a href="#eliminar_usuario">Eliminar usuario</a></li>
			<li><a href="#listar_usuarios">Listar usuarios</a></li>
			<li><a href="#Configuracion_MV">Configuraci&oacuten de M&aacutequina Virtual</a></li>
			<li><a href="#registro_pos">Registro de Punto de Venta</a></li>
			<li><a href="#gestion_respaldos">Gesti&oacuten de Respaldos</a></li>
		</ul>

	<div class="ayuda" id="agregar_usuario">
		<h3><img src="public/img/question_mark.png" alt=""/>Agregar usuario</h3>
		<p>Se debe de llenar cada uno de los campos del formulario ya que todos son requeridos.</p>
	</div>

	<div class="ayuda" id="modificar_usuario">
		<h3><img src="public/img/question_mark.png" alt=""/>Modificar usuario</h3>
		<p>Se debe de ingresar el n&uacutemero de c&eacutedula del usuario a modificar para realizar la b&uacutesqueda. Seguidamente aparecer&aacuten los datos del usuario y ser&aacute posible modificarlos simplemente posicion&aacutendose sobre el campo y realizando el cambio.</p>
	</div>

	<div class="ayuda" id="eliminar_usuario">
		<h3><img src="public/img/question_mark.png" alt=""/>Eliminar usuario</h3>
		<p>Se debe de ingresar el n&uacutemero de c&eacutedula del usuario a eliminar para realizar la b&uacutesqueda. Una vez que se encuentre la coincidencia el usuario ser&aacute eliminado.</p>
	</div>

	<div class="ayuda" id="listar_usuarios">
		<h3><img src="public/img/question_mark.png" alt=""/>Listar usuarios</h3>
		<p>Permite listar todos los usuarios en el Sistema presentando un usuario por l&iacutenea y sus respectivos datos en estilo columna siguiendo la forma:</p>
		<p>Nombre | Primer_Apellido | Segundo_Apellido | Email | Fecha de Nacimiento  | Nombre de Usuario</p>

	<div class="ayuda" id="Configuracion_MV">
		<h3><img src="public/img/question_mark.png" alt=""/>Configuraci&oacuten de M&aacutequina Virtual</h3>
		<p>En Construcci&oacuten</p>
	</div>

	<div class="ayuda" id="registro_pos">
		<h3><img src="question_mark.png" alt=""/>Registro de Punto de Venta</h3>
		<p>En Construcci&oacuten</p>
	</div>

	<div class="ayuda" id="gestion_respaldos">
		<h3><img src="public/img/question_mark.png" alt=""/>Gesti&oacuten de Respaldos</h3>
		<p>En Construcci&oacuten</p>
	</div>

	<p class="top">
		<a href="#">Volver Arriba</a>
	</p>
	 
	<address>
		Copyright &copy; 2015 
		Infrastructure & Development.
	</address>
</body>
</html>
</php>