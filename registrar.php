<?php  require("header.php");
require_once('assets/include/function.php');


//Prevent the user visiting the logged in page if he/she is already logged in
if(isUserLoggedIn()) { header("Location: account.php"); die(); }

//Forms posted
if(!empty($_POST))
{
  $errors = array();
  $email = trim($_POST["email"]);
  $username = trim($_POST["username"]);
  $displayname = trim($_POST["username"]);
  $password = trim($_POST["password"]);
  $confirm_pass = trim($_POST["passwordc"]);
  $captcha = md5($_POST["captcha"]);
  
  
  if ($captcha != $_SESSION['captcha'])
  {
    $errors[] = lang("CAPTCHA_FAIL");
  }
  if(minMaxRange(5,25,$username))
  {
    $errors[] = lang("ACCOUNT_USER_CHAR_LIMIT",array(5,25));
  }
  if(!ctype_alnum($username)){
    $errors[] = lang("ACCOUNT_USER_INVALID_CHARACTERS");
  }
  if(minMaxRange(5,25,$displayname))
  {
    $errors[] = lang("ACCOUNT_DISPLAY_CHAR_LIMIT",array(5,25));
  }
  if(!ctype_alnum($displayname)){
     $errors[] = lang("ACCOUNT_DISPLAY_INVALID_CHARACTERS");
  }
  if(minMaxRange(8,50,$password) && minMaxRange(8,50,$confirm_pass))
  {
    $errors[] = lang("ACCOUNT_PASS_CHAR_LIMIT",array(8,50));
  }
  else if($password != $confirm_pass)
  {
    $errors[] = lang("ACCOUNT_PASS_MISMATCH");
  }
  if(!isValidEmail($email))
  {
    $errors[] = lang("ACCOUNT_INVALID_EMAIL");
  }
  //End data validation
  if(count($errors) == 0)
  { 
    //Construct a user object
    $user = new User($username,$displayname,$password,$email);
    
    //Checking this flag tells us whether there were any errors such as possible data duplication occured
    if(!$user->status)
    {
      if($user->username_taken) $errors[] = lang("ACCOUNT_USERNAME_IN_USE",array($username));
      if($user->displayname_taken) $errors[] = lang("ACCOUNT_DISPLAYNAME_IN_USE",array($displayname));
      if($user->email_taken)    $errors[] = lang("ACCOUNT_EMAIL_IN_USE",array($email));   
    }
    else
    {
      //Attempt to add the user to the database, carry out finishing  tasks like emailing the user (if required)
      if(!$user->userCakeAddUser())
      {
        if($user->mail_failure) $errors[] = lang("MAIL_ERROR");
        if($user->sql_failure)  $errors[] = lang("SQL_ERROR");
      }
    }
  }
  if(count($errors) == 0) 
  {
    $successes[] = $user->success;
    echo "<script>
             alert('Se ha registrado correctamente, revise su mail para validarlo!');
          </script>";
   }
}

require_once("header.php");
?>  
 		
<div class="wrapper-main loginform">
    <div class="container">
      <br><br><br>
      <div class="col-lg-4 col-lg-offset-4">
        <form name='newUser' class="form-signin" action='<?php echo $_SERVER['PHP_SELF'] ?>' method='post'>
          <div class="mykey">
             <h2>Registrar usuario nuevo</h2>     
          </div>
          <br>

      <div class="form-group">
            <div class="controls">
          <div class="input-group">
            <span class="input-group-addon">
              <i class=" glyphicon glyphicon-user"></i>
            </span>
             <input id="inputEmail" class="form-control" name="username" type="text" autofocus="" required="" placeholder="Usuario">
          </div>
        </div>
      </div>


      <div class="form-group">
            <div class="controls">
          <div class="input-group">
            <span class="input-group-addon">
              <i class="glyphicon glyphicon-check"></i>
            </span>
             <input id="inputPassword" class="form-control" name="password"  type="password" required="" placeholder="Contraseña">
          </div>
        </div>
      </div>


      <div class="form-group">
            <div class="controls">
          <div class="input-group">
            <span class="input-group-addon">
              <i class="glyphicon glyphicon-check"></i>
            </span>
             <input id="inputPassword" class="form-control" name="passwordc"  type="password" required="" placeholder="Repetir Contraseña">
          </div>
        </div>
      </div>



      <div class="form-group">
            <div class="controls">
          <div class="input-group">
            <span class="input-group-addon">
              @
            </span>
             <input id="inputEmail" class="form-control" name="email" type="email" autofocus="" required="" placeholder="Correo">
          </div>
        </div>
      </div>



      <div class="form-group">
            <div class="controls">
<p>
<label>Coódigo de Seguridad:</label>
   <img src='models/captcha.php'>
</p>



      <div class="form-group">
            <div class="controls">
          <div class="input-group">
            <span class="input-group-addon">
              S
            </span>
             <input id="inputEmail" class="form-control" name="captcha" type="text" autofocus="" required="" placeholder="Entre el código de seguridad">
          </div>
        </div>
      </div>

</p>
<label>&nbsp;<br>

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


          <button class="btn btn-block btn-warning" value='Register' type="submit">Registrar</button>

        </form>
      </div>
    </div>
  </div> <!-- wrapper-main-->
 




	<?php  require("footer.php") ?>
