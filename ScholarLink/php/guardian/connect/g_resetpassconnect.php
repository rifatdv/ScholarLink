<?php
    session_start();
    $email = $_SESSION['email'];
    $phone = $_SESSION['phone'];

    $error=[];
    if(isset($_POST["submit"])){ 
        if(empty($_POST["newpass"])){
            $error["newpass"] = "This field is required";
        }
        if(empty($_POST["confirmpass"])){
            $error["confirmpass"] = "This field is required";
        }
    }
    if (!empty($error)) {
    $_SESSION['error'] = $error;
    header("Location: ../../g_resetpass.php");
    exit();
    }
    //data connection
    $conn = mysqli_connect("localhost","root","","scholarlink");
    if($conn->connect_error){
        die("Connection failed : " . $conn->connect_error);
    }
    else{
        $email = $_SESSION['email'];
        $phone = $_SESSION['phone'];
        if(isset($_POST["submit"])){
            $newpass = $_POST["newpass"];
            $confirmpass = $_POST["confirmpass"];
            
            $stmt = $conn->prepare("SELECT password FROM guardian_details WHERE email = ?");
            $stmt -> bind_param("s", $email);
            $stmt->execute();
            $stmt_result = $stmt->get_result();
            if($stmt_result->num_rows > 0){
                $data = $stmt_result->fetch_assoc();
                if($data["password"] != $newpass){
                    if($confirmpass == $newpass){
                        //update into table
                        $sql = "UPDATE guardian_details SET password='$newpass', confirm_password='$confirmpass' WHERE email = '$email'";
                        $sql_run = mysqli_query($conn, $sql);
                        $_SESSION['success'] = "Password updated successfully";
                        header("location:../../g_t_signin.php");
                    }
                    else{
                        $error["confirmpass"]="Password doesn't match";
                        $_SESSION["error"]=$error;
                        header("Location: ../../g_resetpass.php");
                        exit();
                    }
                }
                else{
                    $error["newpass"] = "Match with current password. Try different one!";
                    $_SESSION["error"]=$error;
                    header("Location: ../../g_resetpass.php");
                    exit();
                }
            }
            
            //retype new password check
            // if($renewpass != $newpass){
            //     $error["renewpass"] = "Password doesn't match!";
            // }
            if (!empty($error)) {
            $_SESSION['error'] = $error;
            header("Location: ../../g_resetpass.php");
            exit();
            }

            $stmt1 = $conn->prepare("SELECT password FROM guardian_details WHERE phone = ?");
            $stmt1 -> bind_param("s", $phone);
            $stmt1->execute();
            $stmt_result1 = $stmt1->get_result();
            if($stmt_result1->num_rows > 0){
                $data1 = $stmt_result1->fetch_assoc();
                if($data1["password"] != $newpass){
                    if($confirmpass == $newpass){
                        //update into table
                        $sql1 = "UPDATE guardian_details SET password='$newpass', confirm_password='$confirmpass' WHERE phone = '$phone'";
                        $sql_run1 = mysqli_query($conn, $sql1);
                        $_SESSION['success'] = "Password updated successfully";
                        header("location:../../g_t_signin.php");
                    }
                    else{
                        $error["confirmpass"]="Password doesn't match";
                        $_SESSION["error"]=$error;
                        header("Location: ../../g_resetpass.php");
                        exit();
                    }
                }
                else{
                    $error["newpass"] = "Match with current password. Try different one!";
                    $_SESSION["error"]=$error;
                    header("Location: ../../g_resetpass.php");
                    exit();
                }
            }
            
            if (!empty($error)) {
            $_SESSION['error'] = $error;
            header("Location: ../../g_resetpass.php");
            exit();
            }
        }
    }
?>