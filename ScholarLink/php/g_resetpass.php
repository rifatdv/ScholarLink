<?php
    session_start();
    $error = $_SESSION["error"] ?? [];
    $hold = $_SESSION["hold"] ?? [];
    unset($_SESSION["error"], $_SESSION["hold"]);
    if (isset($_SESSION['success'])) {
        echo "<script>alert('" . $_SESSION['success'] . "');</script>";
        unset($_SESSION['success']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScholarLink</title>
    <link rel="stylesheet" href="../css/guardian/g_resetpass.css">
</head>
<body>
    <!-- header part -->
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
    <!-- section part -->
    <section>
        <div class="resetbox">
            <div class="reset">
                <form method="POST" action="guardian/connect/g_resetpassconnect.php">
                    <h2>Reset your password?</h2>
                    <h3>New password</h3>
                    <div class="neww">
                        <input type="password" name="newpass" id="newpass" placeholder="">
                        <span class="passtoogle" onclick="passwordtooglevisibility()">👁️</span>
                    </div>
                    <span class="error"><?php echo $error["newpass"] ?? ''; ?></span>
                    <h3>Confirm new password</h3>
                    <div class="neww">
                        <input type="password" name="confirmpass" id="confirmpass" placeholder="">
                        <span class="passtoogle" onclick="conpasswordtooglevisibility()">👁️</span>
                    </div>
                    <span class="error"><?php echo $error["confirmpass"] ?? ''; ?></span>
                    <div class="submit">
                        <button type="submit" name="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="resetimage">
                <img src="../image/guardian/resetpass.png" alt="">
            </div>
        </div>
    </section>
    <script>
        function passwordtooglevisibility() {
            var passwordInput1 = document.getElementById("newpass");
            
                if (passwordInput1.type === "password") {
                    passwordInput1.type = "text";
                } else {
                    passwordInput1.type = "password";
                }
                
            }
        function conpasswordtooglevisibility() {
            var passwordInput2 = document.getElementById("confirmpass");
                if (passwordInput2.type === "password") {
                    passwordInput2.type = "text";
                } else {
                    passwordInput2.type = "password";
                }
        }
    </script>
    <!-- footer part -->
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
