<?php
    include 'calender_view_logic.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calender View</title>
    <link rel="stylesheet" href="../../css/admin/style_calender.css">
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

    <div class="main-content">
        <section class="calendar-wrapper">
        <h1>Class Calendar</h1>

        <div class="calendar-grid">
            <?php foreach ($calendarDays as $day): ?>
            <div class="calendar-day">
                <div class="date-label"><?= date('D, M j', strtotime($day['date'])) ?></div>

                <?php if (!empty($day['classes'])): ?>
                <?php foreach ($day['classes'] as $class): ?>
                    <div class="class-card <?= strtolower($class['status']) ?>">
                    <strong><?= htmlspecialchars($class['title']) ?></strong><br>
                    <span><?= htmlspecialchars($class['instructor']) ?></span><br>
                    <span class="badge"><?= ucfirst($class['status']) ?></span>
                    </div>
                <?php endforeach; ?>
                <?php else: ?>
                <div class="no-class">No classes</div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
        </section>
    </div>

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
                    <div class="sociolink"><img class="image" src="../../image/facebook.png" alt="Facebook"><a href="">Facebook</a></div>
                    <div class="sociolink"><img class="image" src="../../image/instagram.png" alt="Instagram"><a href="">Instagram</a></div>
                    <div class="sociolink"><img class="image" src="../../image/x.png" alt="X"><a href="">X</a></div>
                </div>
            </div>

            <div class="join">
                <div class="join-head">
                    <h4>Join our community</h4>
                </div>
                <div class="join-body">
                    <div class="joinlink"><a href=""><img class="joinimg" src="../../image/tutorcommunity.png" alt="Join tutor community"></a></div>
                    <div class="joinlink"><a href=""><img class="joinimg" src="../../image/guardiancommunity.png" alt="Join guardian community"></a></div>
                </div>

                <div class="join-head">
                    <h4>Download our app</h4>
                </div>
                <div class="join-body">
                    <div class="joinlink"><a href=""><img class="joinimg" src="../../image/googleplay.jpg" alt="Get it on Google Play Store"></a></div>
                    <div class="joinlink"><a href=""><img class="joinimg" src="../../image/applestore.jpg" alt="Get it on App Store"></a></div>
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