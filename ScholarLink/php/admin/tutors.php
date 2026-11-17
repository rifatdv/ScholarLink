<?php
include 'tutor_logic.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutors</title>
    <link rel="stylesheet" href="../../css/admin/style_tutor.css">
    <style>
    .status-select {
      padding: 6px 12px;
      border-radius: 4px;
      font-weight: 600;
      color: white;
      border: none;
    }
    .status-select.active {
      background-color: #28a745;
    }
    .status-select.inactive {
      background-color: #e53935;
    }
  </style>
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
    <section class="active-wrapper">
      <h1>Tutors</h1>

        <div class="search-bar">
          <form method="post" class="add-tutor-form" style="margin-bottom: 20px;">
            <input type="hidden" name="form_type" value="add" />
            <input type="text" name="add_name" placeholder="Name" required />
            <input type="email" name="add_email" placeholder="Email" required />
            <select name="add_subject" required>
              <option value="">Subject</option>
                <option value="math">Math</option>
                <option value="science">Science</option>
                <option value="english">English</option>
                <option value="physics">Physics</option>
                <option value="chemistry">Chemistry</option>
                <option value="higher math">Higher Math</option>
                <option value="biology">Biology</option>
                <option value="accounting">Accounting</option>
                <option value="finance">Finance</option>
                <option value="economics">Economics</option>
                <option value="business studies">Business Studies</option>
                <option value="history">History</option>
                <option value="geography">Geography</option>
                <option value="civics">Civics</option>
                <option value="religion">Religion</option>
                <option value="art">Art</option>
                <option value="music">Music</option>
                <option value="physical education">Physical Education</option>
                <option value="computer science">Computer Science</option>
                <option value="information technology">Information Technology</option>
                <option value="design and technology">Design and Technology</option>
                <option value="environmental science">Environmental Science</option>
                <option value="psychology">Psychology</option>
                <option value="sociology">Sociology</option>
                <option value="philosophy">Philosophy</option>
                <option value="foreign languages">Foreign Languages</option>
                <option value="other">Other</option>
            </select>
            <button type="submit" class="add-btn">Add Tutor</button>
          </form>

          <form method="post" class="search-bar">
            <input type="hidden" name="form_type" value="search" />
            <input type="text" name="search_term" placeholder="Search by name or email" />
            <button type="submit" class="search-btn">Search</button>
          </form>
        </div>

        <table>
          <thead>
            <tr>
              <th><input type="checkbox" disabled /></th>
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
            <?php foreach ($tutors as $tutor): 
              $statusClass = strtolower($tutor['status']); ?>
            <tr>
              <td><input type="checkbox" /></td>
              <td><?= $tutor['id'] ?></td>
              <td><?= $tutor['date'] ?></td>
              <td><?= htmlspecialchars($tutor['name']) ?></td>
              <td><?= htmlspecialchars($tutor['email']) ?></td>
              <td><?= $tutor['subject'] ?></td>
              <td>
                <form method="post">
                  <input type="hidden" name="update_id" value="<?= $tutor['id'] ?>" />
                  <select name="new_status" class="status-select <?= $statusClass ?>">
                    <option value="Active" <?= $tutor['status'] === 'Active' ? 'selected' : '' ?>>Active</option>
                    <option value="Inactive" <?= $tutor['status'] === 'Inactive' ? 'selected' : '' ?>>Inactive</option>
                  </select>
                  <button type="submit" class="edit-btn">Update</button>
                </form>
              </td>
              <td>
                <form method="post" style="display:inline;">
                  <input type="hidden" name="edited_id" value="<?= $tutor['id'] ?>" />
                  <button type="submit" class="edit-btn">Edit</button>
                </form>
              </td>

              <td>
                <form method="post" style="display:inline;">
                  <input type="hidden" name="delete_id" value="<?= $tutor['id'] ?>" />
                  <button type="submit" class="delete-btn">Delete</button>
                </form>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?php if ($editTutor): ?>
          <div class="edit-form">
            <form method="post" style="margin-top: 20px;">
              <input type="hidden" name="form_type" value="edit_save" />
              <input type="hidden" name="edit_id" value="<?= $editTutor['id'] ?>" />
              <input type="text" name="edit_name" value="<?= htmlspecialchars($editTutor['name']) ?>" required />
              <input type="email" name="edit_email" value="<?= htmlspecialchars($editTutor['email']) ?>" required />
              <select name="edit_subject" required>
                <option value="Math" <?= $editTutor['subject'] === 'Math' ? 'selected' : '' ?>>Math</option>
                <option value="Science" <?= $editTutor['subject'] === 'Science' ? 'selected' : '' ?>>Science</option>
                <option value="English" <?= $editTutor['subject'] === 'English' ? 'selected' : '' ?>>English</option>
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