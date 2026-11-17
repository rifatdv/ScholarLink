<?php
    session_start();
    $id = $_SESSION["studentid"];

    $error=[];
    if(isset($_POST["submit"])){  
        if(empty($_POST["curpass1"])){
            $error["curpass1"] = "This field is required";
        }
    }
    if (!empty($error)) {
    $_SESSION['error'] = $error;
    header("Location: ../g_accdelete.php");
    exit();
    }
    //data connection
    $conn = mysqli_connect("localhost","root","","scholarlink");
    if($conn->connect_error){
        die("Connection failed : " . $conn->connect_error);
    }
    else{
        if(isset($_POST["submit"])){
            $curpass = $_POST["curpass1"];
            
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
                    //delete a data from table
                    $sql = "DELETE FROM guardian_details WHERE studentID = '$id'";
                    $sql_run = mysqli_query($conn, $sql);
                    $_SESSION['success'] = "Account deleted successfully";
                    header("location:../../g_t_signin.php");
                }
                else{
                    $error["curpass"] = "Password doesn't match!";
                    $_SESSION["error"]=$error;
                    header("Location: ../g_accdelete.php");
                    exit();
                }
            }
            
            if (!empty($error)) {
            $_SESSION['error'] = $error;
            header("Location: ../g_accdelete.php");
            exit();
            }
        }
    }
?>