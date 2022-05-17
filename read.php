<?php
session_start();
?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <style >
        .wrapper{
            width: 1200px;
            margin :20px;
        }
        .user-container{
            /* background-color: red; */
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
    </style>
</head>
<body>
    <?php

    if (isset($_GET["id"])) {
        require_once "conn.php";
        $id = $_GET["id"];
        $query = mysqli_query($conn, "SELECT * FROM users WHERE ID = '$id'");

        $user = mysqli_fetch_assoc($query);
            $firstName = $user["first_name"];
            $lastName = $user["last_name"];
            $email = $user["email"];
            $phoneNumber = $user["phone_number"];
            $address = $user["address"];
    }
?>
    <div class="wrapper">
        <div>
            <h1> User View </h1>
        </div>
        <div class="user-container">
            <div class="user-section">
                <label>First Name</label>
                <p class="section"><?php echo $firstName ?></p>
            </div>
            <div class="user-section">
                <label>Last Name</label>
                <p class="section" ><?php echo $lastName ?></p>
            </div>
            <div class="user-section">
                <label>Email</label>
                <p class="section" ><?php echo $email ?></p>
            </div>
            <div class="user-section">
                <label>Phone Number</label>
                <p class="section" ><?php echo $phoneNumber ?></p>
            </div>
            <div class="user-section">
                <label>Address</label>
                <p class="section" ><?php echo $address ?></p>
            </div>
            <p><a href="index.php" class="button">Back</a></p>
        </div>
    </div>
    <?php
// Echo session variables that were set on previous page
echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"] . ".<br>";
echo "YourEmail is" . $_SESSION["emailSession"] . ".";

?>  

    echo $_SESSION["favcolor"]?></p>
    
</body>
</html>