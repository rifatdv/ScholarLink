<?php
    session_start();
    $id = $_SESSION["studentid"];
    //data connection
    $conn = mysqli_connect("localhost","root","","scholarlink");
    if($conn->connect_error){
        die("Connection failed : " . $conn->connect_error);
    }
    else{
        if(isset($_POST["submit"])){
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
            $gender = $_POST["gender"];
            $facebook = $_POST["facebook"];
            $city = $_POST["city"];
            $address = $_POST["address"];
            $picture = $_POST["picture"];
            $e_name = $_POST["e_name"];
            $relation = $_POST["relation"];
            $e_contact = $_POST["e_contact"];
            $e_address = $_POST["e_address"];
            echo "$id";
            //insert into table
            $sql = "UPDATE guardian_details SET name='$name', phone='$phone', email='$email', gender='$gender', facebook='$facebook',
                                city='$city', address='$address', image='$picture', g_e_name='$e_name', g_e_relation='$relation', g_e_contact='$e_contact',
                                g_e_address='$e_address' WHERE studentID = '$id'";
            $sql_run = mysqli_query($conn, $sql);
            
            header("location:../g_profile.php");
        }
    }
?>