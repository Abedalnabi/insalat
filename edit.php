<?php
require_once "conn.php";

$first_name = $last_name = $email = $phone_number = $address = "";
$first_name_error = $last_name_error = $email_error = $phone_number_error = $address_error = "";
if (isset($_POST["id"])) {
    $id = $_POST["id"];

        $firstName = $_POST["first_name"];
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

        if (!$phoneNumber){
            $phone_number_error = "Phone Number is required.";
        } 

        if (!$address) {
            $address_error = "Address is required.";
        } 

    if (!$first_name_error_err && !$last_name_error &&
        !$email_error&& !$phone_number_error && !$address_error) {

        $sql = "UPDATE `users` SET `first_name`= '$firstName', `last_name`= '$lastName', `email`= '$email', `phone_number`= '$phoneNumber', `address`= '$address' WHERE id='$id'";

        if (mysqli_query($conn, $sql)) {
        header("location: index.php");
        }
    }

} else {
$id = $_GET["id"];
    if (isset($_GET["id"])) {
        $query = mysqli_query($conn, "SELECT * FROM users WHERE ID = '$id'");

        $user = mysqli_fetch_assoc($query);
            $firstName   = $user["first_name"];
            $lastName    = $user["last_name"];
            $email       = $user["email"];
            $phoneNumber = $user["phone_number"];
            $address     = $user["address"];
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <style>
        .wrapper{
            width: 1200px;
            margin :20px;
        }
        .user-container{
            /* background-color: red; */
            margin-top :20px;
        }
        .user-section{
            /* background-color:green; */
        }
            .section{
            padding:5px;
            border: 1px solid black;
            /* background-color: white; */
            width: 300px;
        }
        .button{
            background-color: black;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
        input,textarea{
        width: 50%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="page-header">
            <h2>Update User</h2>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>

            <div class="user-container">
                <label>First Name</label>
                <br />
                <input type="text" name="first_name" value="<?php echo $firstName; ?>">
            </div>

            <div class="user-container ">
                <label>Last Name</label>
                <br />
                <input type="text" name="last_name" value="<?php echo $lastName; ?>">
            </div>

            <div class="user-container ">
                <label>Email</label>
                <br />
                <input type="email" name="email"  value="<?php echo $email; ?>">
            </div>

            <div class="user-container ">
                <label>Phone Number</label>
                <br />
                <input type="number" name="phone_number"  value="<?php echo $phoneNumber; ?>">
            </div>

            <div class="user-container ">
                <label>Address</label>
                <br />
                <textarea name="address" ><?php echo $address; ?></textarea>
            </div>
            <input type="submit" class="button" value="Submit">
            <a href="index.php" class="button">Cancel</a>
            
        </form>
    </div>
</body>
</html>