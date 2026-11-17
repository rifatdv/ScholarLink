<?php include 'role_logic.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles & Permissions</title>
    <link rel="stylesheet" href="../../css/admin/style_role.css">
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
        <section class="role-wrapper">
            <h1>Roles & Permissions</h1>

            <!-- Search Bar -->
            <form method="post" class="search-bar">
                <input type="hidden" name="form_type" value="search" />
                <input type="text" name="search_term" placeholder="Search by role name" />
                <select name="access_filter">
                <option value="">Access Level</option>
                <option value="Full Access">Full Access</option>
                <option value="Limited Access">Limited Access</option>
                <option value="Read Only">Read Only</option>
                </select>
                <button type="submit" class="search-btn">Search</button>
            </form>

            <!-- Add New Role Button -->
            <div class="actions">
            <form method="post">
                <input type="hidden" name="form_type" value="show_add_form" />
                <button type="submit" class="add-btn">Add New Role</button>
            </form>
            </div>

            <!-- Add Role Form -->
            <?php if ($showAddForm): ?>
            <div class="add-role-form-wrapper">
                <h3>Add New Role</h3>
                <form method="post" class="add-role-form">
                <input type="hidden" name="form_type" value="add" />
                <input type="text" name="role_name" placeholder="Role Name" required />
                <select name="access_level" required>
                    <option value="">Select Access Level</option>
                    <option value="Full Access">Full Access</option>
                    <option value="Limited Access">Limited Access</option>
                    <option value="Read Only">Read Only</option>
                </select>
                <input type="number" name="assigned_users" placeholder="Assigned Users" min="0" value="0" />
                <button type="submit" class="add-btn">Add Role</button>
                </form>
            </div>
            <?php endif; ?>

            <!-- Roles Table -->
            <table>
            <thead>
                <tr>
                <th><input type="checkbox" disabled /></th>
                <th>ID</th>
                <th>Role Name</th>
                <th>Access Level</th>
                <th>Assigned Users</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($roles as $role): ?>
                <tr>
                    <td><input type="checkbox" name="selected_ids[]" value="<?= $role['id'] ?>" /></td>
                    <td><?= $role['id'] ?></td>
                    <td><?= htmlspecialchars($role['role_name']) ?></td>
                    <td><?= htmlspecialchars($role['access_level']) ?></td>
                    <td><?= $role['assigned_users'] ?></td>
                    <td>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="edit_id" value="<?= $role['id'] ?>" />
                        <button type="submit" class="edit-btn">Edit</button>
                    </form>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="delete_id" value="<?= $role['id'] ?>" />
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($roles)): ?>
                <tr><td colspan="6" style="text-align:center;">No roles found.</td></tr>
                <?php endif; ?>
            </tbody>
            </table>

            <!-- Edit Role Form (Below Table) -->
            <?php if ($editRole): ?>
            <div class="edit-role-form-wrapper">
                <h3>Edit Role: <?= htmlspecialchars($editRole['role_name']) ?></h3>
                <form method="post" class="edit-role-form">
                <input type="hidden" name="form_type" value="edit" />
                <input type="hidden" name="edit_id" value="<?= $editRole['id'] ?>" />
                <input type="text" name="edit_role_name" value="<?= htmlspecialchars($editRole['role_name']) ?>" required />
                <select name="edit_access_level" required>
                    <option value="Full Access" <?= $editRole['access_level'] === 'Full Access' ? 'selected' : '' ?>>Full Access</option>
                    <option value="Limited Access" <?= $editRole['access_level'] === 'Limited Access' ? 'selected' : '' ?>>Limited Access</option>
                    <option value="Read Only" <?= $editRole['access_level'] === 'Read Only' ? 'selected' : '' ?>>Read Only</option>
                </select>
                <input type="number" name="edit_assigned_users" value="<?= $editRole['assigned_users'] ?>" min="0" />
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
            <p>Copyright &copy; 2025 ScholarLink. All rights reserved.</p>
        </div>
        
    </footer>
</body>

</html>