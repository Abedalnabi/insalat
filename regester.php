<?php
// to connect to the database server
require_once "conn.php";

$firstName = $lastName = $userName = $email = $password = "";
$first_name_error = $last_name_error = $userName_error = $email_error = $password_error = "";
$checkEmail ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName =$_POST["first_name"];
    $lastName = $_POST["last_name"];
    $userName = $_POST["userName"];
    $email = $_POST["email"];
    $password = $_POST["password"];


    if (!$firstName) {
        $first_name_error = "First Name is required.";
    }
    if (!$lastName){
        $last_name_error = "Last Name is required.";
    }
    if (!$userName) {
        $userName_error = "UserNamed is required.";
    }
    if(!$email){
        $email_error = "Email is required.";
    } 
    if(!$password){
        $password_error = "Password is required.";
    } 

    if (!$first_name_error && !$last_name_error && !$userName_error && !$email_error && !$password_error ) {

        $query = mysqli_query($conn, "SELECT * FROM usersRegestration WHERE Email = '$email' OR Username = '$userName'");
        $usersFound = mysqli_fetch_assoc($query);

        if($usersFound['Email'] or $usersFound['Username']){
        $checkEmail = $checkUserName = "Try another Email and UserName";
        }else{
            $sql = "INSERT INTO `usersRegestration` (`FirstName`, `LastName`, `Username`, `Email`, `Password`) VALUES ('$firstName', '$lastName', '$userName', '$email', '$password')";
            $userAdded = mysqli_query($conn, $sql);
            if ($userAdded) {
                header("location: login.php");
            }
        }
    }
}
?>

<!DOCTYPE >
<html>
<head>
    <meta charset="UTF-8">
    <title>Create User Page</title>
    <style>
        .wrapper {
            width: 100%;
            margin: 15px;
        }
        .create-User{
        }
        .form-section{
        }
        .error{
        color :red;

        }
        .users-details{
        margin:10px;
        width :50%;
        }
        .submit-btn{
            background-color: black;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="create-User"> 
            <h2>Register</h2>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-section <?php echo (($first_name_error)) ? 'error' : ''; ?>">
                <p>First Name</p>
                <input type="text" name="first_name" class="users-details" value="">
                <p><?php echo $first_name_error;?></p>
            </div>

            <div class="form-section <?php echo (($last_name_error)) ? 'error' : ''; ?>">
                <p>Last Name</p>
                <input type="text" name="last_name" class="users-details" value="">
                <p><?php echo $last_name_error;?></p>
            </div>

            <div class="form-section <?php echo (($userName_error)) ? 'error' : ''; ?>">
                <p>UserName</p>
                <input type="text" name="userName" class="users-details" value="">
                <p><?php echo $userName_error;?></p>
            </div>

            <div class="form-section <?php echo (($email_error)) ? 'error' : ''; ?>">
                <p>email</p>
                <input type="email" name="email" class="users-details" value="">
                <p><?php echo $email_error;?></p>
            </div>

            <div class="form-section <?php echo (($password_error)) ? 'error' : ''; ?>">
                <p>password</p>
                <input type ="password" name="password" class="users-details"></input>
                <p><?php echo $password_error;?></p>

            </div>
            <p><?php echo $checkEmail ?></p>

            <input type="submit" class="submit-btn" value="Register">
            <a href="login.php" class="submit-btn">Login</a>
        </form>
                
    </div>

</body>
</html>