<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutors</title>
    <link rel="stylesheet" href="../../css/admin/style_resource.css">
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

    <h2>Resource Management</h2>

    <!-- Upload Resource Form -->
    <form method="post" action="resource_logic.php" enctype="multipart/form-data" class="resource-form">
    <input type="hidden" name="form_type" value="upload_resource" />

    <select name="audience" required>
        <option value="Student">Students & Guardians</option>
        <option value="Tutor">Tutors Only</option>
        <option value="All">Everyone</option>
    </select>

    <select name="type" required>
        <option value="">Select Type</option>
        <option value="File">File (via Link)</option>
        <option value="Book">Book (via Link)</option>
        <option value="Link">Link</option>
    </select>

    <input type="text" name="title" placeholder="Resource Title" required />
    <textarea name="description" placeholder="Description (optional)"></textarea>

    <!-- External Link -->
    <input type="url" name="link_url" placeholder="External (drive, OneDrive, google etc.) Link (if type is Link)" />

    <button type="submit">Upload Resource</button>
    </form>

    <hr>

    <!-- Display Resources -->
    <?php
    $result = mysqli_query($mysqli, "SELECT * FROM resources ORDER BY uploaded_on DESC");
    while ($res = mysqli_fetch_assoc($result)):
    ?>
    <div class="resource-card">
        <h3><?= htmlspecialchars($res['title']) ?> <small>(<?= $res['type'] ?>)</small></h3>
        <p><?= nl2br(htmlspecialchars($res['description'])) ?></p>

        <?php if (!empty($res['link_url'])): ?>
        <a href="<?= htmlspecialchars($res['link_url']) ?>" target="_blank">
            <?php
            if ($res['type'] === 'Book') {
                echo '📘 Access Book';
            } elseif ($res['type'] === 'File') {
                echo '🗂️ Open File';
            } else {
                echo '🔗 Visit Link';
            }
            ?>
        </a>
        <?php else: ?>
        <p><em>No file or link available.</em></p>
        <?php endif; ?>

        <p class="timestamp">Uploaded on: <?= $res['uploaded_on'] ?></p>
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