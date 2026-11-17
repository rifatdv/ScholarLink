<?php
    session_start();

    $error=[];
    if(isset($_POST["submit"])){
            
            if(empty($_POST["email"])){
                $error["email"] = "This field is required";
            }
            if(empty($_POST["password"])){
                $error["password"] = "This field is required";
            }
        }
    if (!empty($error)) {
        $_SESSION['error'] = $error;
        header("Location: ../../g_t_signin.php");
        exit();
    }
    //data connection
    $conn = mysqli_connect("localhost","root","","scholarlink");
    if($conn->connect_error){
        die("Connection failed : " . $conn->connect_error);
    }
    else{
        $email = $_POST["email"];
        $password = $_POST["password"];

        //guardian information
        $stmt = $conn->prepare("SELECT * FROM guardian_details WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data["password"] === $password){
                $_SESSION['studentid'] = $data['studentID'];
                $_SESSION['name'] = $data['name'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['gender'] = $data['gender'];
                $_SESSION['phone'] = $data['phone'];
                $_SESSION['address'] = $data['address'];
                $_SESSION['location'] = $data['location'];
                $_SESSION['city'] = $data['city'];
                $_SESSION['facebook'] = $data['facebook'];
                $_SESSION['g_e_name'] = $data['g_e_name'];
                $_SESSION['g_e_relation'] = $data['g_e_relation'];
                $_SESSION['g_e_contact'] = $data['g_e_contact'];
                $_SESSION['g_e_address'] = $data['g_e_address'];
                header("Location: ../g_dashboard.php");
                exit();
            }
            else{
                $error["password"]="Wrong password";
                $_SESSION["error"]=$error;
                header("Location: ../../g_t_signin.php");
                exit();
            }
        }
        

        //tutor information
        $stmt1 = $conn->prepare("SELECT * FROM tutors WHERE email = ?");
        $stmt1->bind_param("s", $email);
        $stmt1->execute();
        $stmt_result1 = $stmt1->get_result();
        if($stmt_result1->num_rows > 0){
            $data1 = $stmt_result1->fetch_assoc();
            if($data1["password"] === $password){
                $_SESSION['tutorid'] = $data1['tutorID'];
                $_SESSION['name'] = $data1['name'];
                $_SESSION['email'] = $data1['email'];
                $_SESSION['gender'] = $data1['gender'];
                $_SESSION['phone'] = $data1['phone'];
                $_SESSION['address'] = $data1['address'];
                $_SESSION['location'] = $data1['location'];
                $_SESSION['city'] = $data1['city'];
                $_SESSION['facebook'] = $data1['facebook'];
                $_SESSION['g_e_name'] = $data1['g_e_name'];
                $_SESSION['g_e_relation'] = $data1['g_e_relation'];
                $_SESSION['g_e_contact'] = $data1['g_e_contact'];
                $_SESSION['g_e_address'] = $data1['g_e_address'];
                header("Location: ../../tutor/tutor.php");
                exit();
            }
            else{
                $error["password"]="Wrong password";
                $_SESSION["error"]=$error;
                header("Location: ../../g_t_signin.php");
                exit();
            }
        }
        
            $error["email"]="Email not found";
            $_SESSION["error"]=$error;
            header("Location: ../../g_t_signin.php");
            exit();
        
        $conn->close();
    }
    
?>