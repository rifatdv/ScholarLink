<?php
// include 'session_logic.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
    <link rel="stylesheet" href="../../css/admin/style_session.css">
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
        <section class="class-wrapper">
        <h1>Classes / Sessions</h1>

        <!-- Search Form -->
        <form method="post" class="search-bar">
            <input type="hidden" name="form_type" value="search" />
            <input type="text" name="search_term" placeholder="Search by class title or instructor" />
            <select name="status_filter">
            <option value="">Status</option>
            <option value="upcoming">Upcoming</option>
            <option value="past">Past</option>
            <option value="cancelled">Cancelled</option>
            </select>
            <button type="submit" class="search-btn">Search</button>
        </form>

        <!-- Add Button -->
        <div class="actions">
            <form method="post">
            <input type="hidden" name="form_type" value="show_add_form" />
            <button type="submit" class="add-btn">+ Add New Class</button>
            </form>
        </div>

        <!-- Add Form -->
        <?php if ($showAddForm): ?>
            <div class="add-class-form-wrapper">
            <h3>Add New Class</h3>
            <form method="post" class="add-class-form">
                <input type="hidden" name="form_type" value="add" />
                <input type="text" name="title" placeholder="Class Title" required />
                <input type="text" name="instructor" placeholder="Instructor Name" required />
                <input type="date" name="date" required />
                <select name="status" required>
                <option value="upcoming">Upcoming</option>
                <option value="past">Past</option>
                <option value="cancelled">Cancelled</option>
                </select>
                <button type="submit" class="add-btn">Add Class</button>
            </form>
            </div>
        <?php endif; ?>

        <!-- Class Table -->
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Class Title</th>
                <th>Instructor</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>            
            <?php foreach ($classes as $class): ?>
                <tr>
                <td><?= $class['id'] ?></td>
                <td><?= htmlspecialchars($class['title']) ?></td>
                <td><?= htmlspecialchars($class['instructor']) ?></td>
                <td><?= $class['date'] ?></td>
                <td><span class="badge <?= strtolower($class['status']) ?>"><?= $class['status'] ?></span></td>
                <td>
                    <form method="post" style="display:inline;">
                    <input type="hidden" name="edit_id" value="<?= $class['id'] ?>" />
                    <button type="submit" class="edit-btn">Edit</button>
                    </form>
                    <form method="post" style="display:inline;">
                    <input type="hidden" name="delete_id" value="<?= $class['id'] ?>" />
                    <button type="submit" class="delete-btn">Delete</button>
                    </form>
                </td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($classes)): ?>
                <tr><td colspan="6" style="text-align:center;">No classes found.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>

        <!-- Edit Form -->
        <?php if ($editClass): ?>
            <div class="edit-class-form-wrapper">
            <h3>Edit Class: <?= htmlspecialchars($editClass['title']) ?></h3>
            <form method="post" class="edit-class-form">
                <input type="hidden" name="form_type" value="edit" />
                <input type="hidden" name="edit_id" value="<?= $editClass['id'] ?>" />
                <input type="text" name="edit_title" value="<?= htmlspecialchars($editClass['title']) ?>" required />
                <input type="text" name="edit_instructor" value="<?= htmlspecialchars($editClass['instructor']) ?>" required />
                <input type="date" name="edit_date" value="<?= $editClass['date'] ?>" required />
                <select name="edit_status" required>
                <option value="upcoming" <?= $editClass['status'] === 'upcoming' ? 'selected' : '' ?>>Upcoming</option>
                <option value="past" <?= $editClass['status'] === 'past' ? 'selected' : '' ?>>Past</option>
                <option value="cancelled" <?= $editClass['status'] === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                </select>
                <button type="submit" class="edit-btn">Save Changes</button>
            </form>
            </div>
        <?php endif; ?>
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