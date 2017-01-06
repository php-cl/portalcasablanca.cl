<?php
require_once("header.php");

//Forms posted
if(!empty($_POST))
{
	$deletions = $_POST['delete'];
	if ($deletion_count = deleteUsers($deletions)){
		$successes[] = lang("ACCOUNT_DELETIONS_SUCCESSFUL", array($deletion_count));
	}
	else {
		$errors[] = lang("SQL_ERROR");
	}
}

$userData = fetchAllUsers(); //Fetch information for all users


echo "
<div class='container mydiv-ok'>
<div id='wrapper'>
<div id='top'><div id='logo'></div></div>
<div id='content'>
<h2>Administración de usuarios</h2>
<br>
<div id='left-nav'>";

include("left-nav.php");

echo "
</div>
<div id='main'>";

echo resultBlock($errors,$successes);

echo "
<form name='adminUsers' action='".$_SERVER['PHP_SELF']."' method='post'>
<table class='admin table'>
<tr>
<th>Borrar</th><th>Nombre de Usuario</th><th>Nombre Completo</th><th>Titulo</th><th>Ultimo login</th>
</tr>";

//Cycle through users
foreach ($userData as $v1) {
	echo "
	<tr>
	<td><input type='checkbox' name='delete[".$v1['id']."]' id='delete[".$v1['id']."]' value='".$v1['id']."'></td>
	<td><a href='admin_user.php?id=".$v1['id']."'>".$v1['user_name']."</a></td>
	<td>".$v1['display_name']."</td>
	<td>".$v1['title']."</td>
	<td>
	";
	
	//Interprety last login
	if ($v1['last_sign_in_stamp'] == '0'){
		echo "Never";	
	}
	else {
		echo date("j M, Y", $v1['last_sign_in_stamp']);
	}
	echo "
	</td>
	</tr>";
}

echo "
</table>
<br>
<input type='submit' name='Submit' value='Borrar' class='submit btn btn-warning' />
</form>
</div>
<div id='bottom'></div>
</div>
</div>
";

?>

</div>

<?php  require("footer.php") ?>
