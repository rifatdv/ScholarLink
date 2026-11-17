<?php
    session_start();

    $error = $_SESSION["error"] ?? [];
    $hold = $_SESSION["hold"] ?? [];
    unset($_SESSION["error"], $_SESSION["hold"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScholarLink</title>
    <link rel="stylesheet" href="../css/guardian/g_signup.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="navdiv">
                <div class="platformname">
                    <div class="main">
                        <a href="../homepage.php" class="logo">ScholarLink</a>
                    </div>
                    <p>A TUTOR PLATFORM YOU CAN TRUST</p>
                </div>
                <div class="show">
                    <ul>
                        <li class="info">Be with us</li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="contactnum">
            <img src="../image/guardian/call.png" alt=""><h4>&emsp;01751515558 </h4>
        </div>
        <div class="blank">
            
        </div>
    </header>
    
    <section>
        <div class="formback">
            <div class="formhead">
                <form method="POST" action="guardian/connect/g_signupconnect.php">
                    <h3>Create account</h3><br>
                    <div class="inputbox">
                        <label for="gname">Name<span>*</span></label><br>
                        <input type="text" name="gname" id="gname" value="<?php echo $hold["gname"] ?? ''; ?>"><br>
                        <span class="error"><?php echo $error["gname"] ?? ''; ?></span>
                    </div>
                    
                    <div class="radiobtn">
                        <p>Gender<span>*</span></p>
                        <div class="radio_group">
                            <input type="radio" name="gender" id="male" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="Male">
                            <label for="male" class="radio_label">Male</label>
                            <input type="radio" name="gender" id="female" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="Female">
                            <label for="female" class="radio_label">Female</label><br>
                        </div><br><span class="error"><?php echo $error["gender"] ?? ''; ?></span>
                    </div>
                    
                    <div class="inputbox">
                        <label for="gemail">Email<span>*</span></label><br>
                        <input type="email" name="gemail" id="gemail"><br>
                        <span class="error"><?php echo $error["gemail"] ?? ''; ?></span>
                    </div>
                    <div class="inputbox">
                        <label for="gphone">Phone<span>*</span></label><br>
                        <input type="number" name="gphone" id="gphone"><br>
                        <span class="error"><?php echo $error["gphone"] ?? ''; ?></span>
                    </div>
                    <div class="inputbox">
                        <label for="gaddress">Address<span>*</span></label><br>
                        <input type="text" name="gaddress" id="gaddress"><br>
                        <span class="error"><?php echo $error["gaddress"] ?? ''; ?></span>
                    </div>
                    <div class="inputbox">
                        <label for="gpass">Password<span>*</span></label><br>
                        <input type="password" name="gpass" id="gpass"><br>
                        <span class="error"><?php echo $error["gpass"] ?? ''; ?></span>
                    </div>
                    <div class="inputbox">
                        <label for="gconfirmpass">Confirm Password<span>*</span></label><br>
                        <input type="password" name="gconfirmpass" id="gconfirmpass"><br>
                        <span class="error"><?php echo $error["gconfirmpass"] ?? ''; ?></span>
                    </div><br>
                    <div class="check">
                        <input type="checkbox" >Agree to our Terms & conditions <br>
                        <input type="checkbox" >Agree to our Privacy policy
                    </div>
                    <button type="reset" class="reset" name="reset">Reset</button>
                    <button type="submit" class="submit" name="submit">Submit</button>
                </form>
                <div class="signinopt">
                    <p>Already have an account?<a href="g_t_signin.php">&ensp;Sign in now</a></p>
                </div>
                
            </div>
        </div>
    </section>

    <!-- <script>
        function message(){
            alert ("Registration Successful");
        }
    </script> -->

    <footer class="bottom">
        <div class="botdesign">
            <div class="use">
                <h2>Useful Links</h2>
                <div class="use-body">
                    <ul>
                        <li><a href="">Term & conditions</a></li>
                        <li><a href="">Become tutor</a></li>
                        <li><a href="">Available resources</a></li>
                        <li><a href="">About us</a></li>
                    </ul>
                </div>
            </div>
            <div class="use">
                <h2>Social Links</h2>
                <div class="social-body">
                    <ul>
                        <li><img src="../image/guardian/facebook.png" alt=""><br><a href="">Facebook</a></li>
                        <li><img src="../image/guardian/instagram.png" alt=""><br><a href="">Instagram</a></li>
                        <li><img src="../image/guardian/x.png" alt=""><br><a href="">X</a></li>
                    </ul>
                </div>
            </div>
            <div class="use">
                <h2>Join our community</h2>
                <div class="join-body">
                        <a href=""><img src="../image/guardian/tutorcommunity.png" alt=""></a>
                        <a href=""><img src="../image/guardian/guardiancommunity.png" alt=""></a>              
                </div>
                <h2>Download our app</h2>
                <div class="down-body">
                        <a href=""><img src="../image/guardian/googleplay.png" alt=""></a>
                        <a href=""><img src="../image/guardian/applestore.png" alt=""></a>              
                </div>
            </div>
            <div class="use">
                <h2>Stay connected</h2>
                <p>ScholarLink</p>
                <div class="add-body">
                    <p>Headoffice: Kusholi Bhaban, 2nd Floor,<br> 238/1 Begum Rokeya Sharani, Agargaon, <br>Dhaka-1207</p>
                </div>
            </div>
        </div>
        <div class="webver">
            <h4>Web App Version : 2.2.21</h4>
        </div>
        <div class="copy">
            <h4>Copyright &copy; 2025 ScholarLink. All rights reseved.</h4>
        </div>
    </footer>
</body>
</html>