<?php

$insert=false;
if(isset($_POST['name'])){
    
    $server = "localhost";
    $username = "root";
    $password="";

    $con= mysqli_connect($server,$username,$password);
    if(!$con){
        die("connection to this databse failed due to".mysqli_connect_error());
    }
    // echo"succesfully connected to the database";

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pincode = $_POST['pincode'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $address = $_POST['address'];
    $landmark = $_POST['landmark'];
    $phone2 = $_POST['phone2'];

    $sql= "INSERT INTO `address`.`details` ( `Name`, `Phone`, `Email`, 
    `Pincode`, `City`, `State`, `Address`, `Landmark`,
     `Phone-2`, `dt`) VALUES ('$name', '$phone', 
     '$email', '$pincode', '$city', '$state', 
     '$address', '$landmark','$phone2' ,current_timestamp());";
    // echo $sql;

    if($con-> query($sql)==true){
        // echo "Succesfully Inserted ";
        $insert=true;
    }
    else{
        echo "Error: $sql <br> $con->error";
    }

    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> YogaMart Checkout</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- <img class="bg" src="bg.webp" alt="YogaMart"> -->
    <div class="header">
        <a class="logo" href="index.html"><img src="logo.png" alt="YogaMart" /></a>
    </div>
    <div class="container">
        <h1>Checkout</h3>
            <p>Enter the Address details below: </p>
            <?php
            if($insert==true){
            echo "<p class='submitMsg'>Your order is Succesfully Delivered<br> 
            We are happy to see you again! Thank You.</p>";
            }
            ?>


            <form action="index.php" method="post">
                <input type="text" name="name" id="name" placeholder="Enter your name">
                <input type="phone" name="phone" id="phone" maxlength="10" placeholder="10-digits mobile number">
                <input type="email" name="email" id="email" placeholder="Enter your email">
                <input type="text" name="pincode" id="pincode" maxlength="6" autocomplete="postal-code" tabindex="3"
                    placeholder="Pincode">
                <input type="text" name="city" id="city" autocomplete="city" tabindex="6"
                    placeholder="City/District/Town">
                <input type="text" name="state" id="state" autocomplete="state" tabindex="6" placeholder="State">
                <input type="text" name="address" id="address" rows="3" placeholder="Address (Area and Street)"></input>
                <input type="text" name="landmark" id="landmark" autocomplete="address" placeholder="Landmark (Optional)"></input>
                <input type="phone" name="phone2" id="phone2" maxlength="10" autocomplete="phone" tabindex="6"
                    placeholder="Alternate Phone (Optional)">
                <button class="btn">Save and Deliver Here</button>
            </form>

    </div>
    <script src="script.js"></script>

</body>

</html>