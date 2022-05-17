<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>CRUD</title>
      <link rel="stylesheet" href="">
      <script src=""></script>
      <style >
          .wrapper {
            margin: 15px;
          }
          .top-panel-container {
            width: 100%;
            /* background-color: red; */
            display :flex;
            justify-content : space-between;
            
          }
          .add-user-btn{
            background-color: black; /* Green */
            color: white;
            padding: 21px 32px;
            text-decoration: none;
            font-size: 16px;

            /* background-color:green; */
          }
          .table-container{
            margin-top:20px;
            width: 100%;
            background-color: gray;
          }
          .tr-box{
            padding:20px;

          }
          .user-section{
            background-color: white;
            padding:5px;
          }
      </style>
      <script>
          function showHint(str) {
            if (str.length == 0) {
              document.getElementById("txtHint").innerHTML = "";
              return;
            } else {
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                console.log('this.state', this.status);
                console.log('this.respos', this.responseText);
                if ( this.status == 200) {
                  document.getElementById("txtHint").innerHTML = this.responseText;
                }
              };
              console.log();
              xmlhttp.open("GET", "read.php?id="+str, true);
              xmlhttp.send();
            }
}

</script>
  </head>
  <body>
    <div class="wrapper">
      <div class="top-panel-container">
          <h2 >Users</h2>
          <a href="store.php" class="add-user-btn">Add New User</a>
      </div>
      <?php
      // Include conn file
      require_once "conn.php";
      // select all users
      $data = "SELECT * FROM users";
      $users = mysqli_query($conn,$data);
      if(!$users){
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
      } else{
        // if (users) ==> users will be TRUE
        if(mysqli_num_rows($users)>0){
          echo "<table class='table-container'>
            <thead>
              <tr class='tr-box'>
                <th class='user-section' >#</th>
                <th class='user-section'>First name</th>
                <th class='user-section'>Last Name</th>
                <th class='user-section'>Email</th>
                <th class='user-section'>Phone Number</th>
                <th class='user-section'>Address</th>
                <th class='user-section'>Action</th>
              </tr>
            </thead>";
        while($user = mysqli_fetch_array($users)) {
          echo "<tbody>
                  <tr>
                    <td class='user-section'>" . $user['id'] . "</td>
                    <td class='user-section'>" . $user['last_name'] . "</td>
                    <td class='user-section'>" . $user['first_name'] . "</td>
                    <td class='user-section'>" . $user['email'] . "</td>
                    <td class='user-section'>" . $user['phone_number'] . "</td>
                    <td class='user-section'>" . $user['address'] . "</td>
                    <td class='user-section'>
                      <a href='read.php?id=". $user['id'] ."'>r</a>
                      <a href='edit.php?id=". $user['id'] ."'>e</a>
                      <a href='php.php?id=". $user['id'] ."'>d</a>
                    </td>
                  </tr>";
          }
          echo "</tbody>
              </table>";
        } else  {
            echo "<p>No record plz add some user from add user button</p>";
          }
      }
      // Close connection
      mysqli_close($conn);
      ?>

<form action="">
  <label for="fname">User ID:</label>
  <input type="text" id="fname" name="fname" onkeyup="showHint(this.value)">
</form>
<p>ID: <span id="txtHint"></span></p>
      
<?php
// Echo session variables that were set on previous page
echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"] . ".<br>";
echo "YourEmail is" . $_SESSION["emailSession"] . ".";

?>  

<button onclick="myFunction()">Destroy All sessions</button>
    </div>
  </body>
</html>