<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

if (!securePage($_SERVER['PHP_SELF'])){die();}

//Links for logged in user
if(isUserLoggedIn()) {
	echo "
	<ol class=\"breadcrumb\">
	<li><a href='user_settings.php'>Configuraciones de usuario</a></li>
	</ol>";
	
	//Links for permission level 2 (default admin)
	if ($loggedInUser->checkPermission(array(2))){
	echo "
	<ol class=\"breadcrumb\">
	<li><a href='admin_configuration.php'>Configuracion de Administrador</a></li>
	<li><a href='admin_users.php'>Administrar usuarios</a></li>
	<li><a href='admin_permissions.php'>Administrar permisos</a></li>
	<li><a href='admin_pages.php'>Administrar páginas</a></li>
	</ol>";
	}
} 
//Links for users not logged in
else {
	echo "
	<ol class=\"breadcrumb\">
	<li><a href='index.php'>Home</a></li>
	<li><a href='login.php'>Login</a></li>
	<li><a href='register.php'>Register</a></li>
	<li><a href='forgot-password.php'>Forgot Password</a></li>";
	if ($emailActivation)
	{
	echo "<li><a href='resend-activation.php'>Resend Activation Email</a></li>";
	}
	echo "</ol>";
}

?>
