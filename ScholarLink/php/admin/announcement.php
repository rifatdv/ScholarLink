<?php include 'announcement_logic.php'; ?>
<?php include 'announcement_banner.php'; ?>
<?php
// Fetch all announcements for admin view
$announcements = mysqli_query($mysqli, "SELECT * FROM announcements ORDER BY posted_on DESC");
$rows = mysqli_fetch_all($announcements, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutors</title>
    <link rel="stylesheet" href="../../css/admin/style_announce.css">
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
        <section class="announcement-wrapper">
            <h1 class="announcement-title">Announcements</h1>

            <form method="post" action="announcement_logic.php" class="add-announcement-form">
            <input type="hidden" name="form_type" value="add_announcement" />
            <input type="text" name="title" placeholder="Announcement Title" required />
            <textarea name="message" placeholder="Message" required></textarea>
            <input type="date" name="start_date" required />
            <input type="date" name="end_date" />
            <select name="visible_to">
                <option value="All">All</option>
                <option value="Students">Students</option>
                <option value="Tutors">Tutors</option>
            </select>
            <button type="submit">Post Announcement</button>
            </form>

            <table class="announcement-table">
            <thead>
                <tr>
                <th>Title</th>
                <th>Message</th>
                <th>Posted By</th>
                <th>Start</th>
                <th>End</th>
                <th>Visible To</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $a): ?>
                <tr>
                    <td><?= htmlspecialchars($a['title']) ?></td>
                    <td><?= htmlspecialchars($a['message']) ?></td>
                    <td><?= htmlspecialchars($a['posted_by']) ?></td>
                    <td><?= $a['start_date'] ?></td>
                    <td><?= $a['end_date'] ?: '—' ?></td>
                    <td><?= $a['visible_to'] ?></td>
                    <td>
                    <form method="post" action="announcement_logic.php">
                        <input type="hidden" name="form_type" value="delete_announcement" />
                        <input type="hidden" name="announcement_id" value="<?= $a['id'] ?>" />
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
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
            <p>Copyright &copy; 2025 ScholarLink. All rights reserved.</p>
        </div>
        
    </footer>
</body>

</html>