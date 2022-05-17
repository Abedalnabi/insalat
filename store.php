<?php
// to connect to the database server
require_once "conn.php";

$first_name = $last_name = $email = $phone_number = $address = "";
$first_name_error = $last_name_error = $email_error = $phone_number_error = $address_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstName =$_POST["first_name"];
  $lastName = $_POST["last_name"];
  $email = $_POST["email"];
  $phoneNumber = $_POST["phone_number"];
  $address = $_POST["address"];


    if (!$firstName) {
        $first_name_error = "First Name is required.";
    }
    if (!$lastName){
        $last_name_error = "Last Name is required.";
    }
    if (!$email) {
        $email_error = "Email is required.";
    }
    if(!$phoneNumber){
        $phone_number_error = "Phone Number is required.";
    } 
    if(!$address){
        $address_error = "Address is required.";
    } 

    if (!$first_name_error_err && !$last_name_error && !$email_error && !$phone_number_error && !$address_error ) {
        $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `phone_number`, `address`) VALUES ('$firstName', '$lastName', '$email', '$phoneNumber', '$address')";
        $userAdded = mysqli_query($conn, $sql);
        if ($userAdded) {
            header("location: index.php");
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
            display: inline-block;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="create-User"> 
            <h2>Create User</h2>
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
                <p><?php echo $first_name_error;?></p>
            </div>

            <div class="form-section <?php echo (($email_error)) ? 'error' : ''; ?>">
                <p>Email</p>
                <input type="email" name="email" class="users-details" value="">
                <p><?php echo $email_error;?></p>
            </div>

            <div class="form-section <?php echo (($phone_number_error)) ? 'error' : ''; ?>">
                <p>Phone Number</p>
                <input type="number" name="phone_number" class="users-details" value="">
                <p><?php echo $phone_number_error;?></p>
            </div>

            <div class="form-section <?php echo (($address_error)) ? 'error' : ''; ?>">
                <p>Address</p>
                <textarea name="address" class="users-details"></textarea>
                <p><?php echo $address_error;?></p>
            </div>
            
            <input type="submit" class="submit-btn" value="Submit">
            <a href="index.php" class="submit-btn">Cancel</a>
        </form>
    </div>
</body>
</html>