<?php
    session_start();
    $id = $_SESSION["studentid"];

    $error=[];
    if(isset($_POST["submit"])){  
        if(empty($_POST["phone"])){
            $error["phone"] = "This field is required";
        }
    }
    if (!empty($error)) {
    $_SESSION['error'] = $error;
    header("Location: ../../g_forgetpass2.php");
    exit();
    }
    //data connection
    $conn = mysqli_connect("localhost","root","","scholarlink");
    if($conn->connect_error){
        die("Connection failed : " . $conn->connect_error);
    }
    else{
        $fpass = $_POST['phone'];

        $stmt = $conn->prepare("SELECT phone FROM guardian_details");
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();

            if($data["phone"] === $fpass){
                $_SESSION['phone'] = $data['phone'];
                $_SESSION['success'] = "Verified successfully";
                header("location: ../../g_resetpass.php");
            }
            else{
                $error["phone"] = "Number doesn't match!";
                $_SESSION["error"]=$error;
                header("Location: ../../g_forgetpass2.php");
                exit();
            }
        }
        if (!empty($error)) {
            $_SESSION['error'] = $error;
            header("Location: ../../g_forgetpass2.php");
            exit();
        }
    }
?>