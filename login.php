
<?php

require_once "conn.php";

$emailOrPassword_error ="";
$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email =$_POST["email"];
  $password = $_POST["password"];

  if(!$email or !$password){
    $emailOrPassword_error = "Please enter your email and password";

  }

  if (!$emailOrPassword_error) {
  session_start();
  $_SESSION["emailSession"] = $email;


    $userQuery = mysqli_query($conn, "SELECT * FROM usersRegestration WHERE Email = '$email' AND Password = '$password'");
    $findUser = mysqli_fetch_assoc($userQuery);
    if($findUser['Email'] and $findUser['Password']){
      // session_start();
      // $_SESSION["emailSession"] = $findUser['Email'];
      
      $emailOrPassword_error ="Login successfully";
      header("location: index.php");

      }else{
        $emailOrPassword_error ="Email or password is incorrect";
      }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

  <div class="container">
    <label ><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" >
    <label ><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" >

    <button type="submit">Login</button>
    <br/>
    <p><?php echo $emailOrPassword_error ?> </p>
  </div>


  </div>
</form>
</body>
</html>