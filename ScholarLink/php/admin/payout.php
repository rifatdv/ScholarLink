<?php
include 'payout_logic.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutors</title>
    <link rel="stylesheet" href="../../css/admin/style_payout.css">
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
        <section class="payouts-wrapper">
            <h1>Tutor Payouts</h1>

            <!-- Search Bar -->
            <div class="search-bar">
            <form method="post" class="search-form">
                <input type="hidden" name="form_type" value="search_payouts" />
                <input type="text" name="search_term" placeholder="Search by tutor name or email" />
                <select name="status_filter">
                <option value="">Status</option>
                <option value="Pending">Pending</option>
                <option value="Paid">Paid</option>
                </select>
                <button type="submit" class="search-btn">Search</button>
            </form>
            </div>

            <form method="post" class="add-payout-form">
            <input type="text" name="tutor_name" placeholder="Tutor Name" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="number" name="amount" placeholder="Amount" step="0.01" required />
            <select name="status">
                <option value="Pending">Pending</option>
                <option value="Paid">Paid</option>
            </select>
            <button type="submit" name="form_type" value="add_payout">Add Payout</button>
            </form>

            <!-- Payouts Table -->
            <table>
            <thead>
                <tr>
                <th><input type="checkbox" disabled /></th>
                <th>ID</th>
                <th>Date</th>
                <th>Tutor Name</th>
                <th>Email</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payouts as $payout): 
                $badgeClass = strtolower($payout['status']); ?>
                <tr>
                    <td><input type="checkbox" name="selected_ids[]" value="<?= $payout['id'] ?>" /></td>
                    <td><?= $payout['id'] ?></td>
                    <td><?= $payout['date'] ?></td>
                    <td><?= htmlspecialchars($payout['tutor_name']) ?></td>
                    <td><?= htmlspecialchars($payout['email']) ?></td>
                    <td>$<?= number_format($payout['amount'], 2) ?></td>
                    <td><span class="badge <?= $badgeClass ?>"><?= $payout['status'] ?></span></td>
                    <td>
                    <?php if ($payout['status'] === 'Pending'): ?>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="payout_id" value="<?= $payout['id'] ?>" />
                        <input type="hidden" name="action" value="mark_paid" />
                        <button type="submit" class="edit-btn">Mark as Paid</button>
                    </form>
                    <?php endif; ?>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="delete_id" value="<?= $payout['id'] ?>" />
                        <button type="submit" class="delete-btn" onclick="return confirm('Delete this payout?')">Delete</button>
                    </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($payouts)): ?>
                <tr><td colspan="8" style="text-align:center;">No payouts found.</td></tr>
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