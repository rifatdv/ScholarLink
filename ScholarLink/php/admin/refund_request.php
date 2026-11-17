<?php
include 'refund_request_logic.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutors</title>
    <link rel="stylesheet" href="../../css/admin/style_refund.css">
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
        <section class="refund-wrapper">
            <h1 class="refund-title">Refund Requests</h1>

            <!-- Add New Refund Button -->
            <form method="post">
            <input type="hidden" name="form_type" value="show_form" />
            <button type="submit" class="new-refund-btn">Add New Refund</button>
            </form>

            <!-- Add Refund Form -->
            <form method="post" class="add-refund-form" id="refund-form" style="display: none;">
            <input type="text" name="student_name" placeholder="Student Name" required />
            <input type="email" name="email" placeholder="Email" required />
            <textarea name="reason" placeholder="Reason for Refund" required></textarea>
            <input type="number" name="amount" placeholder="Amount" step="0.01" required />
            <select name="status">
                <option value="Pending">Pending</option>
                <option value="Approved">Approved</option>
            </select>
            <button type="submit" name="form_type" value="add_refund">Add Refund</button>
            </form>

            <?php if ($_POST['form_type'] === 'show_form'): ?>
            <!-- Refund Form -->
            <form method="post" class="add-refund-form">
                <input type="text" name="student_name" placeholder="Student Name" required />
                <input type="email" name="email" placeholder="Email" required />
                <textarea name="reason" placeholder="Reason for Refund" required></textarea>
                <input type="number" name="amount" placeholder="Amount" step="0.01" required />
                <select name="status">
                <option value="Pending">Pending</option>
                <option value="Approved">Approved</option>
                </select>
                <button type="submit" name="form_type" value="add_refund">Add Refund</button>
            </form>
            <?php endif; ?>

            <!-- Refund Table -->
            <table>
            <thead>
                <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Student Name</th>
                <th>Email</th>
                <th>Reason</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($refunds as $refund): ?>
                <tr>
                    <td><?= $refund['id'] ?></td>
                    <td><?= $refund['date'] ?></td>
                    <td><?= htmlspecialchars($refund['student_name']) ?></td>
                    <td><?= htmlspecialchars($refund['email']) ?></td>
                    <td><?= htmlspecialchars($refund['reason']) ?></td>
                    <td>$<?= number_format($refund['amount'], 2) ?></td>
                    <td><span class="badge <?= strtolower($refund['status']) ?>"><?= $refund['status'] ?></span></td>
                    <td>
                    <form method="post">
                        <input type="hidden" name="form_type" value="delete_refund" />
                        <input type="hidden" name="delete_id" value="<?= $refund['id'] ?>" />
                        <button type="submit" class="delete-btn" onclick="return confirm('Delete this refund request?')">Delete</button>
                    </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($refunds)): ?>
                <tr><td colspan="8" style="text-align:center;">No refund requests found.</td></tr>
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
            <p>Copyright &copy; 2025 ScholarLink. All rights reserved.</p>
        </div>
        
    </footer>
</body>

</html>