<?php
require_once 'config.php';
requireLogin();

$user_id = $_SESSION['user_id'];

// Fetch User Balance
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

// Fetch Recent Transactions (Sent and Received)
$stmt = $pdo->prepare("
    SELECT t.*, 
           sender.username as sender_name, 
           receiver.username as receiver_name 
    FROM transactions t
    JOIN users sender ON t.sender_id = sender.id
    JOIN users receiver ON t.receiver_id = receiver.id
    WHERE t.sender_id = ? OR t.receiver_id = ?
    ORDER BY t.created_at DESC
    LIMIT 10
");
$stmt->execute([$user_id, $user_id]);
$transactions = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mini Bank</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-container">
        <div class="nav-header">
            <div class="user-welcome">Welcome, <?php echo htmlspecialchars($user['username']); ?></div>
            <a href="logout.php" class="logout-link">Logout</a>
        </div>

        <!-- Balance Card -->
        <div class="card balance-card">
            <h3>Current Balance</h3>
            <div class="balance-amount">$<?php echo number_format($user['balance'], 2); ?></div>
        </div>

        <!-- Transfer Money Form -->
        <div class="card">
            <h2>Transfer Money</h2>
            <?php
            if (isset($_SESSION['transfer_msg'])) {
                $msg_type = $_SESSION['transfer_type'] === 'success' ? 'alert-success' : 'alert-error';
                echo '<div class="alert ' . $msg_type . '">' . $_SESSION['transfer_msg'] . '</div>';
                unset($_SESSION['transfer_msg']);
                unset($_SESSION['transfer_type']);
            }
            ?>
            <form action="transfer_process.php" method="POST">
                <div class="form-group">
                    <label>Recipient Username</label>
                    <input type="text" name="recipient" required placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label>Amount</label>
                    <input type="number" name="amount" step="0.01" min="0.01" required placeholder="0.00">
                </div>
                <button type="submit" class="btn">Send Money</button>
            </form>
        </div>

        <!-- Transaction History -->
        <div class="card">
            <h3>Recent Transactions</h3>
            <?php if (empty($transactions)): ?>
                <p style="color: var(--text-muted); text-align: center; margin-top: 1rem;">No transactions yet.</p>
            <?php else: ?>
                <ul class="transaction-list">
                    <?php foreach ($transactions as $t): ?>
                        <?php 
                            $is_sender = $t['sender_id'] == $user_id;
                            $amount_class = $is_sender ? 'minus' : 'plus';
                            $amount_sign = $is_sender ? '-' : '+';
                            $other_person = $is_sender ? $t['receiver_name'] : $t['sender_name'];
                            $desc = $is_sender ? "Sent to $other_person" : "Received from $other_person";
                        ?>
                        <li class="transaction-item">
                            <div class="transaction-info">
                                <h4><?php echo htmlspecialchars($desc); ?></h4>
                                <span class="transaction-date"><?php echo date('M j, Y h:i A', strtotime($t['created_at'])); ?></span>
                            </div>
                            <div class="amount <?php echo $amount_class; ?>">
                                <?php echo $amount_sign; ?>$<?php echo number_format($t['amount'], 2); ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
