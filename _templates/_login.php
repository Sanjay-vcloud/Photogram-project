<?php
$email = $_POST["email"];
$password = $_POST["password"];

$result = login_validation($email,$password);

if($result)
{?>
  <div class="container">
    <h1 class="mt-5">Login Successful</h1>
    <p class="lead">happy coding......</p>
  </div>
<?php 
}
else
{
?>

<body class="text-center">

 
    <main class="form-signin">
      <form method = "post" action = "login.php">
        <img class="mb-4" src="https://w7.pngwing.com/pngs/458/631/png-transparent-camera-logo-graphy-graphy-symbol-s-photography-monochrome-still-camera-thumbnail.png" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    
        <div class="form-floating">
          <input name = "email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
          <label for="floatingInput">Email address</label>
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