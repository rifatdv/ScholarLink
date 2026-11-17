<?php
include 'application_logic.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiring Management - Applications</title>
    <link rel="stylesheet" href="../../css/admin/style_application.css">
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
        <section class="applications-wrapper">
        <h1>Applications</h1>

        <div class="search-actions">
        <form method="post" class="search-bar">
            <input type="hidden" name="form_type" value="search_application" />
            <input type="text" name="search_term" placeholder="Search by name, email, or subject" required />
            <button type="submit" class="search-btn">Search</button>
        </form>
        </div>

        <!-- Action Buttons -->
        <div class="manual-trigger">
            <form method="post">
            <input type="hidden" name="form_type" value="show_manual_form" />
            <button type="submit" class="add-btn">Add Manual Application</button>
            </form>
        </div>

        <!-- Manual Application Form -->
        <?php if ($showManualForm): ?>
        <form method="post" class="add-application-form">
            <input type="hidden" name="form_type" value="add_application" />
            <input type="text" name="app_name" placeholder="Name" required />
            <input type="email" name="app_email" placeholder="Email" required />

            <div class="checkbox-group">
            <label><input type="checkbox" name="app_subject[]" value="math"> Math</label>
            <label><input type="checkbox" name="app_subject[]" value="science"> Science</label>
            <label><input type="checkbox" name="app_subject[]" value="english"> English</label>
            <label><input type="checkbox" name="app_subject[]" value="chemistry"> Chemistry</label>
            <label><input type="checkbox" name="app_subject[]" value="physics"> Physics</label>
            <label><input type="checkbox" name="app_subject[]" value="higher math"> Higher Math</label>
            <label><input type="checkbox" name="app_subject[]" value="finance"> Finance</label>
            <label><input type="checkbox" name="app_subject[]" value="accounting"> Accounting</label>
            <label><input type="checkbox" name="app_subject[]" value="geography"> Geography</label>
            <label><input type="checkbox" name="app_subject[]" value="bangla"> Bangla</label>
            <label><input type="checkbox" name="app_subject[]" value="statistics"> Statistics</label>
            <label><input type="checkbox" name="app_subject[]" value="computer"> Computer</label>
            </div>

            <button type="submit" class="add-btn">Add Application</button>
        </form>
        <?php endif; ?>

        <!-- Applications Table -->
        <table>
            <thead>
            <tr>
                <th><input type="checkbox" disabled></th>
                <th>ID</th>
                <th>Date</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($applications as $app): 
                $badgeClass = strtolower($app['status']); ?>
                <tr>
                <td><input type="checkbox" name="selected_ids[]" value="<?= $app['id'] ?>"></td>
                <td><?= $app['id'] ?></td>
                <td><?= $app['date'] ?></td>
                <td><?= htmlspecialchars($app['name']) ?></td>
                <td><?= htmlspecialchars($app['email']) ?></td>
                <td><?= htmlspecialchars($app['subject']) ?></td>
                <td><span class="badge <?= $badgeClass ?>"><?= $app['status'] ?></span></td>
                <td>
                    <?php if ($app['status'] === 'Pending'): ?>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="app_id" value="<?= $app['id'] ?>" />
                        <input type="hidden" name="action" value="approve" />
                        <button type="submit" class="edit-btn">Approve</button>
                    </form>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="app_id" value="<?= $app['id'] ?>" />
                        <input type="hidden" name="action" value="reject" />
                        <button type="submit" class="delete-btn">Reject</button>
                    </form>
                    <?php else: ?>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="delete_id" value="<?= $app['id'] ?>" />
                        <button type="submit" class="delete-btn" onclick="return confirm('Delete this application?')">Delete</button>
                    </form>
                    <?php endif; ?>
                </td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($applications)): ?>
                <tr><td colspan="8" style="text-align:center;">No applications found.</td></tr>
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