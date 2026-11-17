<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScholarLink</title>
    <link rel="stylesheet" href="../../css/guardian/g_profile.css">
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
                    <img src="../../image/guardian/profileicon.jpg" alt=""><a href="#">Profile</a>
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
            <div class="imageclass1">
                <div class="image1">
                     <img src="../../image/guardian/me.jpeg" alt="">
                </div>
            </div>
            <div class="profile">
                <?php if(isset($_SESSION['email'])) {?>
                        <h3><?= $_SESSION['name'] ?></h3>
                        <p>Guardian/Student ID : <?= $_SESSION['studentid'] ?></p>
                        <?php } ?>
                <button><a href="g_editprofile.php">Edit Information</a></button>
            </div>
            <div class="proinfo">
                <h4><img src="../../image/guardian/email1.png" alt="">Email</h4>
                <?php if(isset($_SESSION['email'])) {?>
                    <p><?= $_SESSION['email'] ?></p>
                    <h4><img src="../../image/guardian/call.png" alt="">Phone</h4>
                    <p><?= $_SESSION['phone'] ?></p>
                    <h4><img src="../../image/guardian/address.png" alt="">Address</h4>
                    <p><?= $_SESSION['address'] ?></p>
                <?php } ?>
            </div>
        </div>
        <div class="allprofileinfo">
            <h3><img src="../../image/guardian/personalinfo.jpg" alt="">Personal Information</h3>
            <div class="p_allinfo">
                <div class="p_info">
                    <p>Name</p>
                    <p>Contact Number</p>
                    <p>Email</p>
                    <p>Gender</p>
                    <p>Facebook Link</p>
                    <p>City</p>
                    <p>Address</p>
                </div>
                <div class="p_details">
                    <?php if(isset($_SESSION['email'])) {?>
                        <p>: <?= $_SESSION['name'] ?></p>
                        <p>: <?= $_SESSION['phone'] ?></p>
                        <p>: <?= $_SESSION['email'] ?></p>
                        <p>: <?= $_SESSION['gender'] ?></p>
                        <p>: <?= $_SESSION['facebook'] ?></p>
                        <p>: <?= $_SESSION['city'] ?></p>
                        <p>: <?= $_SESSION['address'] ?></p>
                    <?php } ?>
                </div>
            </div>
            <h3><img src="../../image/guardian/emergency.png" alt="">Emergency Contact</h3>
            <div class="p_allinfo">
                <div class="p_info">
                    <p>Name</p>
                    <p>Relation</p>
                    <p>Contact Number</p>
                    <p>Address</p>
                </div>
                <div class="p_details">
                    <p>: <?= $_SESSION['g_e_name'] ?></p>
                    <p>: <?= $_SESSION['g_e_relation'] ?></p>
                    <p>: <?= $_SESSION['g_e_contact'] ?></p>
                    <p>: <?= $_SESSION['g_e_address'] ?></p>
                </div>
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