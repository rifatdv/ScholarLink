<?php
// session_start();
// if (!isset($_SESSION['admin_email']) && !isset($_COOKIE['admin_email'])) {
//   header("Location: ../g_t_signin.php");
//   exit;
// }
// $adminEmail = $_SESSION['admin_email'] ?? $_COOKIE['admin_email'] ?? '';
// $adminName = explode('@', $adminEmail)[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pannel</title>
    <link rel="stylesheet" href="../../css/admin/style_admin_dashboard.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="navdiv">
                <div class="platformname">
                    <div class="main">
                        <a href="#" class="logo"><span>Scholar</span>Link</a>
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
    </header>

    <section class="dashboard">
        <div class="intro">
            <!-- <h1>Welcome to Admin Dashboard, <?= htmlspecialchars($adminName) ?></h1> -->
            <p>Please use the navigation below to manage the platform.</p>
        </div>

        <div class="logout">
            <button><a href="logout.php" class="logoutbtn">Logout</a></button>
        </div>

        <div class="nav-scroll">
            <div class="nav-row">
            <div class="nav-card">
                <h3>User Management</h3>
                <ul>
                <li><a href="student.php">Students</a></li>
                <li><a href="tutors.php">Tutors</a></li>
                <li><a href="application.php">Applications</a></li>
                <li><a href="role.php">Roles & Permissions</a></li>
                <li><a href="session.php">Sessions/Classes (Umcoming, Past, Cancelled)</a></li>
                <li><a href="calender_view.php">Calender View</a></li>
                </ul>
            </div>

            <div class="nav-card">
                <h3>Payments & Finance</h3>
                <ul>
                <li><a href="transaction.php">Transactions</a></li>
                <li><a href="payout.php">Tutor Payouts</a></li>
                <li><a href="refund_request.php">Refund Requests</a></li>
                <li><a href="report.php">Reports</a></li>
                </ul>
            </div>

            <div class="nav-card">
                <h3>Content Management</h3>
                <ul>
                <li><a href="courses.php">Courses</a></li>
                <li><a href="resource.php">Resources</a></li>
                </ul>
            </div>

            <div class="nav-card">
                <h3>Feedback & Support</h3>
                <ul>
                <li><a href="reviews.php">Reviews</a></li>
                </ul>
            </div>

            <div class="nav-card">
                <h3>Reports & Analytics</h3>
                <ul>
                <li><a href="student_report.php">Student Reports</a></li>
                <li><a href="tutor_report.php">Tutor Reports</a></li>
                <li><a href="finance_report.php">Finance Reports</a></li>
                </ul>
            </div>

            <div class="nav-card">
                <h3>Notifications</h3>
                <ul>
                    <li><a href="announcement.php">Announcements</a></li>
                </ul>
            </div>
        </div>
    </section>

    <footer class="bottom">
        <div class="botdesign">
            <div class="use">
                <div class="use-head">
                    <h4>Useful Links</h4>
                </div>
                <div class="use-body">
                    <ul>
                        <li class="use-li"><a href="">Terms & conditions</a></li>
                        <li class="use-li"><a href="">Become Tutor</a></li>
                        <li class="use-li"><a href="">Available Resources</a></li>
                        <li class="use-li"><a href="">About us</a></li>
                    </ul>
                </div>
            </div>

            <div class="social">
                <div class="social-head">
                    <h4>ScholarLink social</h4>
                </div>
                <div class="social-body">
                    <div class="sociolink"><img class="image" src="../../image/guardian/facebook.png" alt="Facebook"><a href="">Facebook</a></div>
                    <div class="sociolink"><img class="image" src="../../image/guardian/instagram.png" alt="Instagram"><a href="">Instagram</a></div>
                    <div class="sociolink"><img class="image" src="../../image/guardian/x.png" alt="X"><a href="">X</a></div>
                </div>
            </div>

            <div class="join">
                <div class="join-head">
                    <h4>Join our community</h4>
                </div>
                <div class="join-body">
                    <div class="joinlink"><a href=""><img class="joinimg" src="../../image/guardian/tutorcommunity.png" alt="Join tutor community"></a></div>
                    <div class="joinlink"><a href=""><img class="joinimg" src="../../image/guardian/guardiancommunity.png" alt="Join guardian community"></a></div>
                </div>

                <div class="join-head">
                    <h4>Download our app</h4>
                </div>
                <div class="join-body">
                    <div class="joinlink"><a href=""><img class="joinimg" src="../../image/guardian/googleplay.jpg" alt="Get it on Google Play Store"></a></div>
                    <div class="joinlink"><a href=""><img class="joinimg" src="../../image/guardian/applestore.jpg" alt="Get it on App Store"></a></div>
                </div>
            </div>

            <div class="join">
                <div class="join-head">
                    <h4>Stay Connected</h4>
                </div>
                <div class="add-body">
                    <h4>ScholarLink</h4>
                </div>
                <div class="add">
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