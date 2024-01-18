<?php
$signin = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['username']) && !empty($_POST['username']) &&
      isset($_POST['password']) && !empty($_POST['password'])) {

      $username = $_POST['username'];
      $password = $_POST['password'];

      // Assuming user::login_validation is a function you've defined for login validation
      $error = user::login_validation($username, $password);
      $signin = true;
  }
}
if($signin)
{
	if($error)
	{?>
 <div class="container">
    <h1 class="mt-5">signin Successful</h1>
    <p class="lead">happy coding...... hi you are doing great keep move on</p>
  </div>
  <?}else{?>

    <h1 class="mt-5">Error</h1>
    <p class="lead">Something went wrong solve <?=$error?></p>
<?} }else{?>

<body class="text-center">

 
    <main class="form-signin">
      <form method = "post" action = "login.php">
        <img class="mb-4" src="https://w7.pngwing.com/pngs/458/631/png-transparent-camera-logo-graphy-graphy-symbol-s-photography-monochrome-still-camera-thumbnail.png" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    
        <div class="form-floating">
          <input name = "username" type="text" class="form-control" id="floatingInput" placeholder="User_name" required>
          <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
          <input name = "password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
          <label for="floatingPassword">Password</label>
        </div>
    
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      </form>
    </main>   
      </body>
<br>
<br>
<br>
<br>
<br>
<?php
}
?>