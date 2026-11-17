<?php
include 'report_logic.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutors</title>
    <link rel="stylesheet" href="../../css/admin/style_report.css">
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
        <section class="report-wrapper"></section>   
            <h1 class="report-title">Finance Reports</h1>

            <!-- Add New Report Button -->
            <form method="post">
            <input type="hidden" name="form_type" value="show_report_form" />
            <button type="submit" class="new-report-btn">Add New Report</button>
            </form>

            <?php if ($_POST['form_type'] === 'show_report_form'): ?>
            <!-- Report Form -->
            <form method="post" class="add-report-form">
                <input type="text" name="report_title" placeholder="Report Title" required />
                <textarea name="description" placeholder="Description" required></textarea>
                <input type="date" name="report_date" required />
                <select name="category">
                <option value="Transaction">Transaction</option>
                <option value="Payout">Payout</option>
                <option value="Refund">Refund</option>
                </select>
                <button type="submit" name="form_type" value="add_report">Add Report</button>
            </form>
            <?php endif; ?>

            <!-- Report Table -->
            <table class="report-table">
            <thead>
                <tr>
                <th>Date</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($reports) > 0): ?>
                <?php foreach ($reports as $report): ?>
                    <tr>
                    <td><?= $report['report_date'] ?></td>
                    <td><?= htmlspecialchars($report['title']) ?></td>
                    <td><?= htmlspecialchars($report['description']) ?></td>
                    <td><?= $report['category'] ?></td>
                    <td>
                        <form method="post">
                        <input type="hidden" name="form_type" value="delete_report" />
                        <input type="hidden" name="report_id" value="<?= $report['id'] ?>" />
                        <button type="submit" class="delete-btn" onclick="return confirm('Delete this report?')">Delete</button>
                        </form>
                    </td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr><td colspan="6">No reports found.</td></tr>
                <?php endif; ?>
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
            <p>Copyright &copy; 2025 ScholarLink. All rights reseved.</p>
        </div>
        
    </footer>
</body>

</html>