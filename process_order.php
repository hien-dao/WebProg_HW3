<?php
require_once "./order_functions.php";

$orderSummary = order();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - Brandon Gorsey's Kitchen</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <h1>Brandon Gorsey's Kitchen</h1>
    <p>Your order has been received!</p>
</header>

<main>

    <section>
        <h2>Order Receipt</h2>

        <div class="receipt-card">
            <?= $orderSummary; ?>
        </div>
    </section>

    <section class="insights">
        <h2>Order Feedback</h2>

        <div class="insight-card">
            <h3>Live Guidance</h3>

            <p><?= htmlspecialchars(completionMessage()); ?></p>

            <p class="insight-note">
                <?= htmlspecialchars(pairingSuggestion()); ?>
            </p>
        </div>

        <div class="insight-card pricing-grid">
            <div>
                <h3>Estimated Total</h3>

                <p class="price-figure">
                    <?= htmlspecialchars(formattedTotal()); ?>
                </p>
            </div>

            <div>
                <h3>Order Profile</h3>

                <p><?= htmlspecialchars(orderProfile()); ?></p>
            </div>
        </div>

    </section>

    <section>
        <a href="index.php">Return to Order Form</a>
        <br><br>
        <a href="forget_order.php">Clear Order and Start Over</a>
    </section>

</main>

</body>
</html>