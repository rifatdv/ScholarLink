<?php
    session_start();

    $error = $_SESSION["error"] ?? [];
    unset($_SESSION["error"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScholarLink</title>
    <link rel="stylesheet" href="../css/guardian/g_t_signin.css">
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
        <!-- <div class="body"> -->
            <div class="loginbox">
                <form method="POST" action="guardian/connect/g_t_signinconnect.php">
                    <h2>Sign in here</h2>
                    <!-- <div class="radio_group">
                        <input type="radio" name="value" id="guardian">
                        <label for="guardian" class="radio_label">Guardian</label>
                        <input type="radio" name="value" id="tutor">
                        <label for="tutor" class="radio_label">Tutor</label>
                    </div> -->
                    <div class="inputbox">
                        <!-- <span class="icon"><ion-icon name="mail"></ion-icon></span> -->
                        <label>Email <span>*</span></label><br>
                        <input type="email" name="email" id="email" value=""><br>
                        <span class="error"><?php echo $error["email"] ?? ''; ?></span>
                    </div><br>
                    <div class="inputbox">
                        <!-- <span class="icon"><ion-icon name="lock-closed"></ion-icon></span> -->
                        <label>Password <span>*</span></label><br>
                        <input type="password" name="password" id="password" value=""><br>
                        <span class="error"><?php echo $error["password"] ?? ''; ?></span>
                    </div><br>
                    <div class="remember">
                            <input type="checkbox">&nbsp;Remember me
                            <a href="g_forgetpass.php">Forget password?</a>
                        </div>
                    
                    <div class="signin">
                        <!-- <a href="g_dashboard.html"><input class="submit" type="submit" value="Login"></a> -->
                         <button type="submit" name="submit" class="submit">Login</button>
                    </div>
                    <!-- <div class="forget">
                        <a href="">Forget password?</a>
                    </div> -->
                    <div class="register">
                        <p>Don't have an account?<a href="g_signup.php">&ensp;Sign up now</a></p>
                    </div>
                </form>
            </div>
        <!-- </div> -->
    </section>
   
    <!-- <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> -->

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
        <div class="version">
            <p>Web App Version : 2.2.21</p>
        </div>
        <div class="copyright">
            <p>Copyright &copy; 2025 ScholarLink. All rights reseved.</p>
        </div>
        
    </footer>
</body>
</html>