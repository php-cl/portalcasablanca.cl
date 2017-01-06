<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

//Prevent the user visiting the logged in page if he/she is already logged in
if(isUserLoggedIn()) { header("Location: account.php"); die(); }

//Forms posted
if(!empty($_POST))
{
	$errors = array();
	$username = sanitize(trim($_POST["username"]));
	$password = trim($_POST["password"]);
	
	//Perform some validation
	//Feel free to edit / change as required
	if($username == "")
	{
		$errors[] = lang("ACCOUNT_SPECIFY_USERNAME");
	}
	if($password == "")
	{
		$errors[] = lang("ACCOUNT_SPECIFY_PASSWORD");
	}

	if(count($errors) == 0)
	{
		//A security note here, never tell the user which credential was incorrect
		if(!usernameExists($username))
		{
			$errors[] = lang("ACCOUNT_USER_OR_PASS_INVALID");
		}
		else
		{
			$userdetails = fetchUserDetails($username);
			//See if the user's account is activated
			if($userdetails["active"]==0)
			{
				$errors[] = lang("ACCOUNT_INACTIVE");
			}
			else
			{
				//Hash the password and use the salt from the database to compare the password.
				$entered_pass = generateHash($password,$userdetails["password"]);
				
				if($entered_pass != $userdetails["password"])
				{
					//Again, we know the password is at fault here, but lets not give away the combination incase of someone bruteforcing
					$errors[] = lang("ACCOUNT_USER_OR_PASS_INVALID");
				}
				else
				{
					//Passwords match! we're good to go'
					
					//Construct a new logged in user object
					//Transfer some db data to the session object
					$loggedInUser = new loggedInUser();
					$loggedInUser->email = $userdetails["email"];
					$loggedInUser->user_id = $userdetails["id"];
					$loggedInUser->hash_pw = $userdetails["password"];
					$loggedInUser->title = $userdetails["title"];
					$loggedInUser->displayname = $userdetails["display_name"];
					$loggedInUser->username = $userdetails["user_name"];
					
					//Update last sign in
					$loggedInUser->updateLastSignIn();
					$_SESSION["userCakeUser"] = $loggedInUser;
					
					//Redirect to user account page
					header("Location: account.php");
					die();
				}
			}
		}
	}
}

require_once("header.php");
?>



<div class="wrapper-main loginform">
  <div class="container">
    <br><br><br>
    <div class="col-lg-4 col-lg-offset-4">
    <form name='login' class="form-signin" action='<?php echo $_SERVER['PHP_SELF'] ?>' method='post'>
      <div class="mykey">
      <i class="fa fa-users fa-5x"></i>      
      </div>
      <br>


      <div class="form-group">
            <div class="controls">
          <div class="input-group">
            <span class="input-group-addon">
             <i class="fa fa-user"></i>
            </span>
            <input type='text' class="form-control" name='username'required="" placeholder="Usuario"/>
          </div>
        </div>
      </div>

      <div class="form-group">
            <div class="controls">
          <div class="input-group">
            <span class="input-group-addon">
             <i class="fa fa-pencil-square-o"></i>
            </span>
            <input type="password" class="form-control" name='password' required="" placeholder="Contraseña"/>
          </div>
        </div>
      </div>

  <?php

if  ($errors) {
{  
      echo "<div class=\"alert alert-danger fade in\">";
      echo "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
      echo resultBlock($errors,$successes);
      echo "</div>";
 }
 }
?>
    <br>
      <button value='Login' class="btn btn-block btn-warning" type="submit">Ingresar</button>
      <br>
      <a href="recuperar_pass.php">Recuperar Contraseña</a>
      <br>
      <a href="registrar.php">Registrar</a>
    </form>
   </div>
  </div>
</div> <!-- wrapper-main-->
<?php  require("footer.php") ?>