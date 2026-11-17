<?php
    session_start();
    $sid = $_SESSION["studentid"];
    $error=[];
    if(isset($_POST["submit"])){  
        if(empty($_POST["tutiontype"])){
            $error["tutiontype"] = "This field is required";
        }
        if(empty($_POST["category"])){
            $error["category"] = "This field is required";
        }
        if(empty($_POST["class"])){
            $error["class"] = "This field is required";
        }
        if(empty($_POST["no_student"])){
            $error["no_student"] = "This field is required";
        }
        if(empty($_POST["tutorgender"])){
            $error["tutorgender"] = "This field is required";
        }
        if(empty($_POST["date"])){
            $error["date"] = "This field is required";
        }
        if(empty($_POST["i_name"])){
            $error["i_name"] = "This field is required";
        }
        if(empty($_POST["subject"])){
            $error["subject"] = "This field is required";
        }
        if(empty($_POST["city"])){
            $error["city"] = "This field is required";
        }
        if(empty($_POST["area"])){
            $error["area"] = "This field is required";
        }
        if(empty($_POST["days"])){
            $error["days"] = "This field is required";
        }
        if(empty($_POST["salary"])){
            $error["salary"] = "This field is required";
        }
        if(empty($_POST["time"])){
            $error["time"] = "This field is required";
        }
        if(empty($_POST["studentgender"])){
            $error["studentgender"] = "This field is required";
        }
    }
    if (!empty($error)) {
    $_SESSION['error'] = $error;
    $_SESSION['hold'] = $hold;
    header("Location: ../hiretutor.php");
    exit();
    }
    //data connection
    $conn = mysqli_connect("localhost","root","","scholarlink");
    if($conn->connect_error){
        die("Connection failed : " . $conn->connect_error);
    }
    else{
        $tutiontype = $_POST["tutiontype"];
        $category = $_POST["category"];
        $class = $_POST["class"];
        $no_student = $_POST["no_student"];
        $tutorgender = $_POST["tutorgender"];
        $date = $_POST["date"];
        $i_name = $_POST["i_name"];
        $subject = $_POST["subject"];
        $city = $_POST["city"];
        $area = $_POST["area"];
        $days = $_POST["days"];
        $salary = $_POST["salary"];
        $time = $_POST["time"];
        $studentgender = $_POST["studentgender"];
        $addressdetails = $_POST["address"];

        //update into table
        $sql = $conn->prepare("INSERT INTO hiretutor(studentID,tutiontype,category,class,no_of_student,tutorgender,hiredate,institutename,subject,city,area,daysperweek,salary,hiretime,studentgender,addressdetails)
            values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param("isssssssssssssss",$sid,$tutiontype,$category,$class,$no_student,$tutorgender,$date,$i_name,$subject,$city,$area,$days,$salary,$time,$studentgender,$addressdetails);
        $sql->execute();
        $sql->close();
        $conn->close();
        $_SESSION['success'] = "Request successful";
        header("location:../hiretutor.php");
    }
?>