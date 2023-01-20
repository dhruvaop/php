<?php 
$insert = false;
if(isset($_POST['name'])){
$server = "dhruva.rwlb.rds.aliyuncs.com:3306";
$username = "account";
$password = "Bhunu@123";

$con = mysqli_connect($server, $username, $password);

if(!$con)
{
    die("Connection to this database failed due to" . mysqli_connect_error());
}


$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$other = $_POST['other'];

// echo "Success connecting to the db";
$sql = "INSERT INTO `db`.`trip` (`name`,`age`,`gender`,`email`,`phone`,`other`) VALUES ('$name','$age','$gender','$email','$phone','$other');";

if($con->query($sql) == true){
    // echo "Successfully inserted";

    // Flag for successful insertion
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}

// Close the database connection
$con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Referral Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gochi+Hand&family=Handlee&family=Ubuntu:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg"src="bg.jpeg" alt="Gyan Ganga College">
    <div class="container">
        <h1>Welcome to Gyan Ganga U.S. Trip form</h1>
        <p>Enter your details and submit this form to confirm this form 
            to confirm your participation in the trip
        </p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Please submit the form properly it is SUPER IMPORTANT!! if you have already done then ignore the message :) </p>";
        }
    ?>

        <form action="index.php" method="post">
            <input type="name" name ="name" id="name" placeholder ="Enter your name">
            <input type="age" name ="age" id="age" placeholder = "Enter your age">
            <input type="gender" name ="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name ="email" id="email" placeholder="Enter your email">
            <input type="phone" name ="phone" id="phone" placeholder="Enter your phone">
            <textarea name = "other" id="other" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>

    <script src="index.js"></script>
    
</body>
</html>