<?php
include 'reviews_logic.php';
?>

<?php
include 'db.php';
?>

<?php
$filter = $_GET['role'] ?? '';
$where = $filter ? "WHERE r.role = '$filter'" : '';
$result = mysqli_query($mysqli, "
  SELECT r.*, rr.reply, rr.replied_on
  FROM reviews r
  LEFT JOIN review_replies rr ON r.id = rr.review_id
  $where
  ORDER BY r.submitted_on DESC
");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutors</title>
    <link rel="stylesheet" href="../../css/admin/style_reviews.css">
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

    <h2>Review Management</h2>

    <form method="get">
    <select name="role">
        <option value="">All Roles</option>
        <option value="Tutor">Tutor</option>
        <option value="Guardian">Guardian</option>
        <option value="Student">Student</option>
    </select>
    <button type="submit">Filter</button>
    </form>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <div class="review-card">
        <p><strong><?= $row['role'] ?>:</strong> <?= htmlspecialchars($row['message']) ?></p>
        <p><em>From:</em> <?= htmlspecialchars($row['name']) ?> | <?= $row['submitted_on'] ?></p>

        <?php if ($row['reply']): ?>
        <div class="admin-reply">
            <strong>Reply:</strong> <?= htmlspecialchars($row['reply']) ?>
            <span class="timestamp"><?= $row['replied_on'] ?></span>
        </div>
        <?php else: ?>
        <form method="post" action="review_logic.php">
            <input type="hidden" name="form_type" value="reply_review" />
            <input type="hidden" name="review_id" value="<?= $row['id'] ?>" />
            <textarea name="reply" placeholder="Reply..." required></textarea>
            <button type="submit">Send Reply</button>
        </form>
        <?php endif; ?>
    </div>
    <?php endwhile; ?>

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