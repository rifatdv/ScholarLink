<?php 
    include 'student_logic.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - Student</title>
    <link rel="stylesheet" href="../../css/admin/style_student.css">
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
        <section class="student-wrapper">
        <h1>Students</h1>

        <!-- Search Form -->
        <form method="post" class="search-bar">
            <input type="hidden" name="form_type" value="search" />
            <input type="text" name="search_term" placeholder="Search by name or email" />
            <select name="class_filter">
            <option value="">Class</option>
            <option value="8">Grade 8</option>
            <option value="9">Grade 9</option>
            <option value="10">Grade 10</option>
            <option value="11">Grade 11</option>
            <option value="12">Grade 12</option>
            <option value="O-Level">O-Level</option>
            <option value="A-Level">A-Level</option>
            </select>
            <select name="status_filter">
            <option value="">Status</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
            </select>
            <button type="submit" class="search-btn">Search</button>
        </form>

        <!-- Action Buttons -->
        <div class="actions">
            <form method="post">
            <input type="hidden" name="form_type" value="show_add_form" />
            <button type="submit" class="add-btn">+ Add New Student</button>
            </form>
        </div>

        <!-- Add Student Form -->
        <?php if ($showAddForm): ?>
            <div class="add-fstudent-orm-wrapper">
            <h3>Add New Student</h3>
            <form method="post" class="add-student-role-form">
                <input type="hidden" name="form_type" value="add" />
                <input type="text" name="name" placeholder="Name" required />
                <input type="email" name="email" placeholder="Email" required />
                <select name="class" required>
                <option value="">Select Class</option>
                <?php foreach (["8","9","10","11","12","O-Level","A-Level"] as $grade): ?>
                    <option value="<?= $grade ?>"><?= $grade ?></option>
                <?php endforeach; ?>
                </select>
                <select name="status" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                </select>
                <button type="submit" class="add-btn">Add Student</button>
            </form>
            </div>
        <?php endif; ?>

        <!-- Student Table -->
        <table>
            <thead>
            <tr>
                <th><input type="checkbox" id="select-all" /></th>
                <th>ID</th>
                <th>Date</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                <td><input type="checkbox" class="select-row" /></td>
                <td><?= $student['id'] ?></td>
                <td><?= $student['date'] ?></td>
                <td><?= htmlspecialchars($student['name']) ?></td>
                <td><?= htmlspecialchars($student['email']) ?></td>
                <td><span class="badge <?= strtolower($student['status']) ?>"><?= $student['status'] ?></span></td>
                <td>
                    <form method="post" style="display:inline;">
                    <input type="hidden" name="edit_id" value="<?= $student['id'] ?>" />
                    <button type="submit" class="edit-btn">Edit</button>
                    </form>
                    <form method="post" style="display:inline;">
                    <input type="hidden" name="delete_id" value="<?= $student['id'] ?>" />
                    <button type="submit" class="delete-btn">Delete</button>
                    </form>
                </td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($students)): ?>
                <tr><td colspan="7" style="text-align:center;">No students found.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>

        <!-- Edit Student Form -->
        <?php if ($editStudent): ?>
            <div class="edit-student-form-wrapper">
            <h3>Edit Student: <?= htmlspecialchars($editStudent['name']) ?></h3>
            <form method="post" class="edit-student-role-form">
                <input type="hidden" name="form_type" value="edit" />
                <input type="hidden" name="edit_id" value="<?= $editStudent['id'] ?>" />
                <input type="text" name="edit_name" value="<?= htmlspecialchars($editStudent['name']) ?>" required />
                <input type="email" name="edit_email" value="<?= htmlspecialchars($editStudent['email']) ?>" required />
                <select name="edit_class" required>
                <option value="">Select Class</option>
                <?php foreach (["8","9","10","11","12","O-Level","A-Level"] as $grade): ?>
                    <option value="<?= $grade ?>" <?= $editStudent['class'] === $grade ? 'selected' : '' ?>><?= $grade ?></option>
                <?php endforeach; ?>
                </select>
                <select name="edit_status" required>
                <option value="active" <?= $editStudent['status'] === 'active' ? 'selected' : '' ?>>Active</option>
                <option value="inactive" <?= $editStudent['status'] === 'inactive' ? 'selected' : '' ?>>Inactive</option>
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