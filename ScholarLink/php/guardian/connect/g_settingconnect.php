<?php
    session_start();
    $id = $_SESSION["studentid"];

    $error=[];
    if(isset($_POST["submit"])){  
        if(empty($_POST["curpass"])){
            $error["curpass"] = "This field is required";
        }
        if(empty($_POST["newpass"])){
            $error["newpass"] = "This field is required";
        }
        if(empty($_POST["renewpass"])){
            $error["renewpass"] = "This field is required";
        }
    }
    if (!empty($error)) {
    $_SESSION['error'] = $error;
    header("Location: ../g_setting.php");
    exit();
    }
    //data connection
    $conn = mysqli_connect("localhost","root","","scholarlink");
    if($conn->connect_error){
        die("Connection failed : " . $conn->connect_error);
    }
    else{
        if(isset($_POST["submit"])){
            $curpass = $_POST["curpass"];
            $newpass = $_POST["newpass"];
            $renewpass = $_POST["renewpass"];
            
            $stmt = $conn->prepare("SELECT password FROM guardian_details WHERE studentID = ?");
            $stmt->bind_param("s", $id);
            $stmt->execute();
            $stmt_result = $stmt->get_result();
            if($stmt_result->num_rows > 0){
                $data = $stmt_result->fetch_assoc();
                // if($data["password"] != $curpass){
                //     $error["curpass"] = "Password doesn't match!";
                // }
                if($data["password"] === $curpass){
                    if($renewpass == $newpass){
                        //update into table
                        $sql = "UPDATE guardian_details SET password='$newpass', confirm_password='$renewpass' WHERE studentID = '$id'";
                        $sql_run = mysqli_query($conn, $sql);
                        $_SESSION['success'] = "Password updated successfully";
                        header("location:../g_setting.php");
                    }
                    else{
                        $error["renewpass"]="Password doesn't match";
                        $_SESSION["error"]=$error;
                        header("Location: ../g_setting.php");
                        exit();
                    }
                }
                else{
                    $error["curpass"] = "Password doesn't match!";
                    $_SESSION["error"]=$error;
                    header("Location: ../g_setting.php");
                    exit();
                }
            }
            
            //retype new password check
            if($renewpass != $newpass){
                $error["renewpass"] = "Password doesn't match!";
            }
            if (!empty($error)) {
            $_SESSION['error'] = $error;
            header("Location: ../g_setting.php");
            exit();
            }
        }
    }
?>