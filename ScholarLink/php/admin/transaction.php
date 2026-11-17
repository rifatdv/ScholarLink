<?php   
    include 'transaction_logic.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiring Management - Transaction</title>
    <link rel="stylesheet" href="../../css/admin/style_transaction.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="navdiv">
                <div class="platformname">
                    <div class="main">
                        <a href="transaction.html" class="logo"><span>Scholar</span>Link</a>
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
        <section class="finance-section">
        <h2>Transactions</h2>

        <!-- Add Transaction Form -->
        <form method="post" class="add-transaction-form">
            <input type="hidden" name="form_type" value="add_transaction" />
            <input type="text" name="txn_user" placeholder="User name" required />
            <input type="number" step="1" name="txn_amount" placeholder="Amount" required />
            <select name="txn_method" required>
            <option value="">Method</option>
            <option value="bkash">Bkash</option>
            <option value="rocket">Rocket</option>
            <option value="nagad">Nagad</option>
            <option value="other">Other</option>
            </select>
            <select name="txn_status" required>
            <option value="">Status</option>
            <option value="Completed">Completed</option>
            <option value="Pending">Pending</option>
            </select>
            <button type="submit" class="add-btn">Add Transaction</button>
        </form>

        <!-- Search Form -->
        <form method="post" class="search-form">
            <input type="hidden" name="form_type" value="search_transaction" />
            <input type="text" name="search_term" placeholder="Search by user or status" required />
            <button type="submit" class="search-btn">Search</button>
        </form>

        <!-- Transaction Table -->
        <table class="finance-table">
            <thead>
            <tr>
                <th>Date</th>
                <th>User</th>
                <th>Amount</th>
                <th>Method</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($transactions as $txn): 
                $statusClass = strtolower(str_replace(' ', '-', $txn['status'])); ?>
            <tr>
                <td><?= htmlspecialchars($txn['date']) ?></td>
                <td><?= htmlspecialchars($txn['user']) ?></td>
                <td>$<?= htmlspecialchars($txn['amount']) ?></td>
                <td><?= htmlspecialchars($txn['method']) ?></td>
                <td><?= htmlspecialchars($txn['status']) ?></td>
                <td>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="edit_id" value="<?= $txn['id'] ?>" />
                    <button type="submit" class="edit-btn">Edit</button>
                </form>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="delete_id" value="<?= $txn['id'] ?>" />
                    <button type="submit" class="delete-btn" onclick="return confirm('Delete this transaction?')">Delete</button>
                </form>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if (empty($transactions)): ?>
                <tr><td colspan="6" style="text-align:center;">No transactions found.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>

        <!-- Edit Form -->
        <?php if (isset($editTxn)): ?>
            <div class="edit-form">
            <form method="post" action="">
                <input type="hidden" name="form_type" value="edit_transaction" />
                <input type="hidden" name="txn_id" value="<?= $editTxn['id'] ?>" />
                <input type="text" name="txn_user" value="<?= htmlspecialchars($editTxn['user']) ?>" required />
                <input type="number" step="1" name="txn_amount" value="<?= htmlspecialchars($editTxn['amount']) ?>" required />
                <select name="txn_method" required>
                <option value="bkash" <?= $editTxn['method'] === 'bkash' ? 'selected' : '' ?>>Bkash</option>
                <option value="rocket" <?= $editTxn['method'] === 'rocket' ? 'selected' : '' ?>>Rocket</option>
                <option value="nagad" <?= $editTxn['method'] === 'nagad' ? 'selected' : '' ?>>Nagad</option>
                <option value="other" <?= $editTxn['method'] === 'other' ? 'selected' : '' ?>>Other</option>
                </select>
                <select name="txn_status" required>
                <option value="Completed" <?= $editTxn['status'] === 'Completed' ? 'selected' : '' ?>>Completed</option>
                <option value="Pending" <?= $editTxn['status'] === 'Pending' ? 'selected' : '' ?>>Pending</option>
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