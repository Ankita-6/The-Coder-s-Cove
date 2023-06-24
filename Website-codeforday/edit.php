<?php

if(isset($_POST['update']))
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "ankita";


    // Create connection
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

    $uname_e = $_POST['uname1'];
    $email_e  = $_POST['email'];
    $upswd1_e = $_POST['upswd1'];
    $upswd2_e = $_POST['upswd2'];

    $query = "UPDATE `register` SET `uname1`='$uname_e',`upswd1`='$upswd1_e',`upswd2`='$upswd2_e' WHERE `email` = '$email_e'";
    $result = mysqli_query($conn, $query);

    if($result)
    {
        echo '<script type="text/javascript"> alert("Data updated successfully")</script>';
        echo '<a href=index4.html>click to continue to page</a>';
    }
    else{
        echo '<script type="text/javascript"> alert("Data updation failed")</script>';
    }
    mysqli_close($conn);

}
