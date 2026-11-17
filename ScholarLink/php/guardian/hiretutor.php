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
    <link rel="stylesheet" href="../../css/guardian/hiretutor.css">
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
                    <img src="../../image/guardian/hiretutoricon.jpg" alt=""><a href="#">Hire a tutor</a>
                </div><br>
                <div class="dash">
                    <img src="../../image/guardian/postedjob.jpg" alt=""><a href="g_pendingtutor.php">Posted jobs</a>
                </div><br>
                <div class="dash">
                    <img src="../../image/guardian/setting2.jpg" alt=""><a href="g_setting.php">Setting</a>
                </div><br>
            </div>
            <hr class="dash_hr"><br>
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
        <div class="hiretutor-head">
            <div class="hiretutor">
                <h3>Need tutor?</h3>
                <p>Please fill up all the informations below</p>
            </div>
            <hr class="ht_hr">
            <form method="POST" action="connect/hiretutorconnect.php">
                <div class="tutioninfo">
                    <h3>Tution Information</h3>
                    <div class="alltutioninfo">
                        <div class="tutionlabel">
                            <p>Tution&nbsp;type<span>*</span></p>
                            <p>Category<span>*</span></p>
                            <p>Class<span>*</span></p>
                            <p>No.&nbsp;of&nbsp;student<span>*</span></p>
                            <p>Tutor&nbsp;gender<span>*</span></p>
                            <p>Hiring&nbsp;date<span>*</span></p>
                            <p>Institute&nbsp;name<span>*</span></p>
                        </div>
                        <div class="tutioninput">
                            <select name="tutiontype" id="tutiontype">
                                <option value="" disabled selected hidden>--Select a tution type--</option>
                                <option value="Offline">Offline</option>
                                <option value="Group">Group</option>
                                <option value="Online">Online</option>
                                <option value="Package">Package</option>
                                <option value="Shadow">Shadow</option>
                            </select><div><span><?php echo $error["tutiontype"] ?? ''; ?></span></div>
                            <select name="category" id="category">
                                <option value="" disabled selected hidden>--Select a category--</option>
                                <option value="B_Medium">Bangla Medium</option>
                                <option value="E_Medium">English Medium</option>
                                <option value="E_Version">English Version</option>
                            </select><div><span><?php echo $error["category"] ?? ''; ?></span></div>
                            <select name="class" id="class">
                                <option value="" disabled selected hidden>--Select a class--</option>
                                <option value="Class 1">Class 1</option>
                                <option value="Class 2">Class 2</option>
                                <option value="Class 3">Class 3</option>
                                <option value="Class 4">Class 4</option>
                                <option value="Class 5">Class 5</option>
                                <option value="Class 6">Class 6</option>
                                <option value="Class 7">Class 7</option>
                                <option value="Class 8">Class 8</option>
                                <option value="Class 9">Class 9</option>
                            </select><div><span><?php echo $error["class"] ?? ''; ?></span></div>
                            <select name="no_student" id="no_student">
                                <option value="" disabled selected hidden>--Select no. students--</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select><span><?php echo $error["no_student"] ?? ''; ?></span>
                            <select name="tutorgender" id="tutorgender">
                                <option value="" disabled selected hidden>--Select tutor gender--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Any">Any</option>
                            </select><span><?php echo $error["tutorgender"] ?? ''; ?></span>
                            <input type="date" name="date" id="date"><span><?php echo $error["date"] ?? ''; ?></span>
                            <input type="text" name="i_name" id="i_name"><span><?php echo $error["i_name"] ?? ''; ?></span>
                        </div>
                        <div class="tutionlabel2">
                            <p>Subjects<span>*</span></p>
                            <p>City<span>*</span></p>
                            <p>Location<span>*</span></p>
                            <p>Days/week<span>*</span></p>
                            <p>Salary<span>*</span></p>
                            <p>Time<span>*</span></p>
                            <p>Student gender<span>*</span></p>
                        </div>
                        <div class="tutioninput2">
                            <select name="subject" id="subject">
                                <option value="" disabled selected hidden>--Select a subject--</option>
                                <option value="All">All</option>
                                <option value="Bangla">Bangla</option>
                                <option value="English">English</option>
                                <option value="General Maths">General Maths</option>
                                <option value="Social Science">Social Science</option>
                                <option value="General Science">General Science</option>
                                <option value="Religious Studies">Religious Studies</option>
                                <option value="Physics">Physics</option>
                                <option value="Chemistry">Chemistry</option>
                                <option value="Biology">Biology</option>
                                <option value="Higher Math">Higher Math</option>
                            </select><span><?php echo $error["subject"] ?? ''; ?></span>
                            <select name="city" id="city">
                                <option value="" disabled selected hidden>--Select a city--</option>
                                <option value="Dhaka">Dhaka</option>
                            </select><span><?php echo $error["city"] ?? ''; ?></span>
                            <select name="area" id="area">
                                <option value="" disabled selected hidden>--Select a area--</option>
                                <option value="Abdullahpur">Abdullahpur</option>
                                <option value="Uttara">Uttara</option>
                                <option value="Airport">Airport</option>
                                <option value="Nikunjo-2">Nikunjo-2</option>
                                <option value="Kuratoli">Kuratoli</option>
                                <option value="Bashundhara R/A">Bashundhara R/A</option>
                                <option value="Banani">Banani</option>
                                <option value="Vatara">Vatara</option>
                                <option value="Notun Bajar">Notun Bajar</option>
                                <option value="Gulshan-1">Gulshan-1</option>
                                <option value="Gulshan-2">Gulshan-2</option>
                                <option value="Mohakhali">Mohakhali</option>
                                <option value="Niketon">Niketon</option>
                                <option value="Rampura">Rampura</option>
                                <option value="Tejgaon">Tejgaon</option>
                            </select><span><?php echo $error["area"] ?? ''; ?></span>
                            <select name="days" id="days">
                                <option value="" disabled selected hidden>--Select days/week--</option>
                                <option value="1 day/week">1 day/week</option>
                                <option value="2 day/week">2 day/week</option>
                                <option value="3 day/week">3 day/week</option>
                                <option value="4 day/week">4 day/week</option>
                                <option value="5 day/week">5 day/week</option>
                                <option value="6 day/week">6 day/week</option>
                                <option value="7 day/week">7 day/week</option>
                            </select><span><?php echo $error["days"] ?? ''; ?></span>
                            <input type="number" name="salary" id="salary"><span><?php echo $error["salary"] ?? ''; ?></span>
                            <input type="time" name="time" id="time"><span><?php echo $error["time"] ?? ''; ?></span>
                            <select name="studentgender" id="studentgender">
                                <option value="" disabled selected hidden>--Select student gender--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select><span><?php echo $error["studentgender"] ?? ''; ?></span>
                        </div>
                    </div>
                    <div class="add">
                        <label for="address">Address details</label>
                        <textarea rows="5" cols="50" name="address" id="address"></textarea>
                   </div>
                        
                    <button type="reset" class="reset" name="reset">Reset</button>
                    <button type="submit" class="submit" name="submit">Submit</button>

                    <div class="footer">
                        <img src="../../image/guardian/callcenter.png" alt="">
                        <div class="call">
                            <img src="../../image/guardian/call.png" alt=""><h4>01751515558 &emsp;(9:00 AM - 10:00 PM)</h4>
                        </div>
                    </div>
                </div>
            </form>
        </div>
      
    </section>

    <footer>
    </footer>
</body>
</html>