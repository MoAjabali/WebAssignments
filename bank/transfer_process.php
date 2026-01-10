<?php
require_once 'config.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sender_id = $_SESSION['user_id'];
    $recipient_username = sanitize($_POST['recipient']);
    $amount = floatval($_POST['amount']);

    // Basic Validation
    if (empty($recipient_username) || $amount <= 0) {
        $_SESSION['transfer_msg'] = "Invalid input.";
        $_SESSION['transfer_type'] = "error";
        header("Location: index.php");
        exit;
    }

    if ($recipient_username === $_SESSION['username']) {
        $_SESSION['transfer_msg'] = "You cannot send money to yourself.";
        $_SESSION['transfer_type'] = "error";
        header("Location: index.php");
        exit;
    }

    try {
        // START TRANSACTION
        $pdo->beginTransaction();

        // 1. Check Sender Balance (Locking row for update is good practice but keeping it simple as requested)
        // We select the balance to ensure we have the latest data
        $stmt = $pdo->prepare("SELECT balance FROM users WHERE id = ? FOR UPDATE");
        $stmt->execute([$sender_id]);
        $sender = $stmt->fetch();

        if ($sender['balance'] < $amount) {
            throw new Exception("Insufficient funds.");
        }

        // 2. Check Recipient Exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$recipient_username]);
        $recipient = $stmt->fetch();

        if (!$recipient) {
            throw new Exception("Recipient not found.");
        }
        $recipient_id = $recipient['id'];

        // 3. Deduct from Sender
        $stmt = $pdo->prepare("UPDATE users SET balance = balance - ? WHERE id = ?");
        if (!$stmt->execute([$amount, $sender_id])) {
            throw new Exception("Failed to deduct amount.");
        }

        // 4. Add to Recipient
        $stmt = $pdo->prepare("UPDATE users SET balance = balance + ? WHERE id = ?");
        if (!$stmt->execute([$amount, $recipient_id])) {
            throw new Exception("Failed to add amount.");
        }

        // 5. Log Transaction
        $stmt = $pdo->prepare("INSERT INTO transactions (sender_id, receiver_id, amount, type, status) VALUES (?, ?, ?, 'transfer', 'success')");
        if (!$stmt->execute([$sender_id, $recipient_id, $amount])) {
            throw new Exception("Failed to log transaction.");
        }

        // COMMIT TRANSACTION
        $pdo->commit();

        $_SESSION['transfer_msg'] = "Transfer successful!";
        $_SESSION['transfer_type'] = "success";

    } catch (Exception $e) {
        // ROLLBACK TRANSACTION ON ERROR
        $pdo->rollBack();
        
        $_SESSION['transfer_msg'] = "Transaction failed: " . $e->getMessage();
        $_SESSION['transfer_type'] = "error";
    }

    header("Location: index.php");
    exit;
} else {
    header("Location: index.php");
    exit;
}
?>
