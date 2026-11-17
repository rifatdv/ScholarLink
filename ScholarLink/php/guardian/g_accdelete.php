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
    <link rel="stylesheet" href="../../css/guardian/g_accdelete.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="navdiv">
                <div class="platformname">
                    <div class="main">
                        <a href="homepage.php" class="logo">ScholarLink</a>
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
        <div class="blank">
            
        </div>
    </header>
    
    <section>
        <div class="navdesign">
            <div class="navhead">
                <div class="imageclass">
                        <div class="image">
                            <!-- <img src="../../image/guardian/personicon.jpg" alt=""> -->
                            <img src="../../image/guardian/me.jpeg" alt="">
                        </div>
                        <!-- <div class="camera">
                            <input type="file">
                            <img src="../../image/guardian/cam.png" alt="">
                        </div> -->
                    </div>
                <div class="g_info">
                    <?php if(isset($_SESSION['email'])) {?>
                        <p><?= $_SESSION['name'] ?></p>
                        <p><?= $_SESSION['email'] ?></p>
                        <p>Guardian/Student ID : <?= $_SESSION['studentid'] ?></p>
                    <?php } ?>
                </div>
            </div>
            <hr>
            <div class="navbody">
                <div class="dash">
                    <img src="../../image/guardian/dash.png" alt=""><a href="g_dashboard.php">Dashboard</a>
                </div><br>
                <div class="dash">
                    <img src="../../image/guardian/profileicon.jpg" alt=""><a href="g_profile.php">Profile</a>
                </div><br>
                <div class="dash">
                    <img src="../../image/guardian/hiretutoricon.jpg" alt=""><a href="hiretutor.php">Hire a tutor</a>
                </div><br>
                <div class="dash">
                    <img src="../../image/guardian/postedjob.jpg" alt=""><a href="">Posted jobs</a>
                </div><br>
                <div class="dash">
                    <img src="../../image/guardian/setting2.jpg" alt=""><a href="g_setting.php">Setting</a>
                </div><br>
            </div>
            <hr><br>
            <div class="navbot">
                <div class="dash">
                    <img src="../../image/guardian/guardiancommunity.png" alt=""><a href="">Join guardian community</a>
                </div><br>
                <div class="dash">
                    <img src="../../image/guardian/howitworks.jpg" alt=""><a href="">How it works</a>
                </div><br>
                <div class="dash">
                    <img src="../../image/guardian/signout2.png" alt=""><a href="connect/g_signout.php">Sign out</a>
                </div><br>
            </div>
        </div>
        <div class="body-head">
            <div class="pass">
                <img src="../../image/guardian/padlock.png" alt=""><button><a href="g_setting.php">Password</a></button>
            </div>
            <div class="accdel">
                <img src="../../image/guardian/accountdelete.png" alt=""><button><a href="#">Account&nbsp;Delete</a></button>
            </div>
        </div>
        <div class="passfield">
            <div class="passchange">
                <form method="POST" action="connect/g_accdeleteconnect.php">
                    <h2>Account Delete</h2>
                    <div class="cnrpass">
                        <h4>Enter Your Password <span>*</span></h4>
                        <div class="cpass">
                            <input type="password" name="curpass1" id="pass">
                            <p onclick="pass()">👁️</p>
                        </div><span><?php echo $error["curpass"] ?? ''; ?></span>
                    </div>
                    <button type="submit" name="submit">Delete</button>
                </form>
            </div>
            <img src="../../image/guardian/sidepicaccdel.jpg" alt="">
        </div>
    </section>
    <script>
        function pass() {
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }  
    </script>                  
</body>
</html>