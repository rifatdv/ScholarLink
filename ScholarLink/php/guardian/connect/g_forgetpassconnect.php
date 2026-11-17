<?php
    session_start();
    $id = $_SESSION["studentid"];

    $error=[];
    if(isset($_POST["submit"])){  
        if(empty($_POST["email"])){
            $error["email"] = "This field is required";
        }
    }
    if (!empty($error)) {
    $_SESSION['error'] = $error;
    header("Location: ../../g_forgetpass.php");
    exit();
    }
    //data connection
    $conn = mysqli_connect("localhost","root","","scholarlink");
    if($conn->connect_error){
        die("Connection failed : " . $conn->connect_error);
    }
    else{
        $fpass = $_POST['email'];

        $stmt = $conn->prepare("SELECT email FROM guardian_details");
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();

            if($data["email"] === $fpass){
                $_SESSION['email'] = $data['email'];
                $_SESSION['success'] = "Verified successfully";
                header("location: ../../g_resetpass.php");
            }
            else{
                $error["email"] = "Email doesn't match!";
                $_SESSION["error"]=$error;
                header("Location: ../../g_forgetpass.php");
                exit();
            }
        }
        if (!empty($error)) {
            $_SESSION['error'] = $error;
            header("Location: ../../g_forgetpass.php");
            exit();
        }
    }
?>