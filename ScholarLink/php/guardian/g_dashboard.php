<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScholarLink</title>
    <link rel="stylesheet" href="../../css/guardian/g_dashboard.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="navdiv">
                <div class="platformname">
                    <div class="main">
                        <a href="homepage.php" class="logo"><span>Scholar</span>Link</a>
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
                        <img src="../../image/guardian/dash.png" alt=""><a href="#">Dashboard</a>
                    </div><br>
                    <div class="dash">
                        <img src="../../image/guardian/profileicon.jpg" alt=""><a href="g_profile.php">Profile</a>
                    </div><br>
                    <div class="dash">
                        <img src="../../image/guardian/hiretutoricon.jpg" alt=""><a href="hiretutor.php">Hire a tutor</a>
                    </div><br>
                    <div class="dash">
                        <img src="../../image/guardian/postedjob.jpg" alt=""><a href="g_pendingtutor.php">Posted jobs</a>
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
                <div class="notice">
                    <h3><img src="../../image/guardian/notice.png" alt="">Notice Board</h3>
                    <p>Welcome to ScholarLink.</p>
                </div>
            </div>
            <div class="pending">
                <a href="g_pendingtutor.php">Pending tutor</a>
                <a href="g_livetutor.php">Live tutor</a>
                <a href="g_appointtutor.php">Appointed tutor</a>
                <a href="g_confirmtutor.php">Confirmed tutor</a>
                <a href="g_canceltutor.php">Cancelled tutor</a>
            </div>

            <div class="review">
                <div class="downapp">
                    <img src="../../image/guardian/download.jpg" alt=""><br>
                    <h2>Download our app</h2>
                </div>
                <div class="completeprofile">
                    <h3>Update your profile</h3>
                    <img src="../../image/guardian/complete profile.png" alt="">
                    <p>Complete your profile to ensure that <br> you're genuine user on our platform</p>
                    <hr>
                    <button><a href="g_editprofile.php">Update profile</a></button>
                </div>
                <div class="verification">
                    <h3>Verify your profile</h3>
                    <img src="../../image/guardian/verify.png" alt="">
                    <p>Profile verification needs at least <br> one hiring request</p>
                    <hr>
                    <button><a href="hiretutor.php">Verify</a></button>
                </div>
            </div>
       
        <!-- <div class="navdesign">
            <div class="navhead">
                <div class="img">
                    <img src="../../image/guardian/personicon.jpg" alt="">
                </div>
                <div class="g_info">
                    <p>Md. Samir Ansari</p>
                    <p>ansari.sam2018@gmail.com</p>
                    <p>Guardian/Student ID : 422587</p>
                </div>
            </div>
            <hr>
            <div class="navbody">
                <div class="dash">
                    <img src="../image/dash.png" alt=""><a href="#">Dashboard</a>
                </div><br>
                <div class="dash">
                    <img src="../image/profileicon.jpg" alt=""><a href="g_profile.php">Profile</a>
                </div><br>
                <div class="dash">
                    <img src="../image/hiretutoricon.jpg" alt=""><a href="hiretutor.php">Hire a tutor</a>
                </div><br>
                <div class="dash">
                    <img src="../image/postedjob.jpg" alt=""><a href="g_pendingtutor.php">Posted jobs</a>
                </div><br>
                <div class="dash">
                    <img src="../image/setting2.jpg" alt=""><a href="g_setting.php">Setting</a>
                </div><br>
            </div>
            <hr><br>
            <div class="navbot">
                <div class="dash">
                    <img src="../image/guardiancommunity.png" alt=""><a href="">Join guardian community</a>
                </div><br>
                <div class="dash">
                    <img src="../image/howitworks.jpg" alt=""><a href="">How it works</a>
                </div><br>
                <div class="dash">
                    <img src="../image/signout2.png" alt=""><a href="">Sign out</a>
                </div><br>
            </div>
        </div>
        <div class="body-head">
            <div class="notice">
                <h3><img src="../image/notice.png" alt="">Notice Board</h3>
                <p>Welcome to ScholarLink.</p>
            </div>
        </div>
        <div class="pending">
            <a href="g_pendingtutor.php">Pending tutor</a>
            <a href="g_livetutor.php">Live tutor</a>
            <a href="g_appointtutor.php">Appointed tutor</a>
            <a href="g_confirmtutor.php">Confirmed tutor</a>
            <a href="g_canceltutor.php">Cancelled tutor</a>
        </div>

        <div class="review">

        </div> -->
        <div class="footer">
            <img src="../../image/guardian/callcenter.png" alt="">
            <div class="call">
                <img src="../../image/guardian/call.png" alt=""><h4>01751515558 &emsp;(9:00 AM - 10:00 PM)</h4>
            </div>
        </div>
    </section>
    
</body>
</html>