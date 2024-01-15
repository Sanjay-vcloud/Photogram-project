<?
$signup = false;
if (isset($_POST['username']) and isset($_POST['password'])and isset($_POST['email'])and isset($_POST['phone']))
{
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$error = user::signup($username,$password,$email,$phone);
$signup = true;
}
if($signup)
{
	if(!$error)
	{?>
 <div class="container">
    <h1 class="mt-5">signup Successful</h1>
    <p class="lead">happy coding...... hi you are doing great keep move on</p>
  </div>
  <?}else{?>

    <h1 class="mt-5">Error</h1>
    <p class="lead">Something went wrong solve <?=$error?></p>
<?} }else{?>


<body class="text-center">

    <main class="form-signup">
      <form method = "post" action = "signup.php">
        <img class="mb-4" src="https://w7.pngwing.com/pngs/458/631/png-transparent-camera-logo-graphy-graphy-symbol-s-photography-monochrome-still-camera-thumbnail.png" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
    
        <div class="form-floating">
          <input name = "username" type="text" class="form-control" id="floatingInputuser" placeholder="username">
          <label for="floatingInputuser">username</label>
        </div>

        <div class="form-floating">
          <input name = "phone" type="text" class="form-control" id="floatingPhone" placeholder="Phone">
          <label for="floatingPhone">phone</label>
        </div>

        <div class="form-floating">
          <input name = "email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>

        <div class="form-floating">
          <input name = "password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
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
	  <?}?>
      </body>