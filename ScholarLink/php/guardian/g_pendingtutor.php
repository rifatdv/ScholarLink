<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScholarLink</title>
    <link rel="stylesheet" href="../../css/guardian/g_pendingtutor.css">
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
                        <img src="../../image/guardian/me.jpeg" alt="">
                    </div>
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
                    <img src="../../image/guardian/postedjob.jpg" alt=""><a href="#">Posted jobs</a>
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
        <div class="section">
            <div class="body-head">
                <div class="pending">
                    <button type="button"><a href="#">Pending tutor</a></button>
                </div>
                <div class="live">
                    <button><a href="g_livetutor.php">Live tutor</a></button>
                </div>
                <div class="appoint">
                    <button><a href="g_appointtutor.php">Appointed tutor</a></button>
                </div>
                <div class="confirm">
                    <button><a href="g_confirmtutor.php">Confirmed tutor</a></button>
                </div>
                <div class="cancel">
                    <button><a href="g_canceltutor.php">Cancelled tutor</a></button>
                </div>
                <div class="request">
                    <button><a href="hiretutor.php">Post tutor request</a></button>
                </div>
            </div>
            <div class="pendingtutor">
                
            </div>
        </div>
    </section>
    <div class="footer">
        <img src="../../image/guardian/callcenter.png" alt="">
        <div class="call">
            <img src="../../image/guardian/call.png" alt=""><h4>01751515558 &emsp;(9:00 AM - 10:00 PM)</h4>
        </div>
    </div>
</body>
</html>