<?php
    session_start();
    $hold=[
        $gname = $_POST["gname"],
        $gender = $_POST["gender"],
        $gemail = $_POST["gemail"],
        $gphone = $_POST["gphone"],
        $gaddress = $_POST["gaddress"],
        $gpass = $_POST["gpass"],
        $gconfirmpass = $_POST["gconfirmpass"]
    ];
    $error=[];
    if(isset($_POST["submit"])){  
        if(empty($_POST["gname"])){
            $error["gname"] = "This field is required";
        }
        if(empty($_POST["gender"])){
            $error["gender"] = "This field is required";
        }
        if(empty($_POST["gemail"])){
            $error["gemail"] = "This field is required";
        }
        if(empty($_POST["gphone"])){
            $error["gphone"] = "This field is required";
        }
        if(empty($_POST["gaddress"])){
            $error["gaddress"] = "This field is required";
        }
        if(empty($_POST["gpass"])){
            $error["gpass"] = "This field is required";
        }
        if(empty($_POST["gconfirmpass"])){
            $error["gconfirmpass"] = "This field is required";
        }
    }
    if (!empty($error)) {
    $_SESSION['error'] = $error;
    $_SESSION['hold'] = $hold;
    header("Location: ../signuptutor.php");
    exit();
    }
    //data connection
    $conn = mysqli_connect("localhost","root","","scholarlink");
    if($conn->connect_error){
        die("Connection failed : " . $conn->connect_error);
    }
    else{
        $gname = $_POST["gname"];
        $gender = $_POST["gender"];
        $gemail = $_POST["gemail"];
        $gphone = $_POST["gphone"];
        $gaddress = $_POST["gaddress"];
        $gpass = $_POST["gpass"];
        $gconfirmpass = $_POST["gconfirmpass"];
        //$hold=[$gname,$gender,$gemail,$gphone,$gaddress,$gpass,$gconfirmpass];
        if (!preg_match("/^[a-zA-Z-' ]*$/",$gname)) {
            $error["gname"] = "Only letters and white space allowed";
        }
        //password check
        if($gconfirmpass != $gpass){
            $error["gconfirmpass"] = "Password doesn't match!";
        }
        //email check
        if (!filter_var($gemail, FILTER_VALIDATE_EMAIL)) {
            $error["gemail"] = "Invalid email format";
        }
        $emailsql = mysqli_query($conn, "SELECT * FROM tutor_details where email = '$gemail' ");
        if(mysqli_num_rows($emailsql)>0){
            $error["gemail"] = "Email already exist";
        }
        if(strlen($gpass) < 8){
            $error["gpass"] = "Password contain at least 8 characters";
        }
        if(!empty($error)) {
            $_SESSION['error'] = $error;
            header("Location: ../signuptutor.php");
            exit();
        }
        //hash type password
        //$gpasshash = password_hash($gpass, PASSWORD_DEFAULT);

        //insert into table
        $sql = $conn->prepare("INSERT INTO tutor_details(name,gender,email,phone,address,password,confirm_password)
            values(?, ?, ?, ?, ?, ?,?)");
        $sql->bind_param("sssisss",$gname,$gender,$gemail,$gphone,$gaddress,$gpass,$gconfirmpass);
        $sql->execute();
        $sql->close();
        $conn->close();
        header("location:../../g_t_signin.php");
    }
?>