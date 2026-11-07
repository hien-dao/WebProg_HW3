<?php
require_once "./order_functions.php";

$visitStamp = date('l, F j, Y g:i a');

setcookie('lastVisit', $visitStamp, time() + 86400, '/');

$welcomeBack = '';

if (isset($_COOKIE['lastVisit'])) {
   $last = htmlspecialchars($_COOKIE['lastVisit']);

   $welcomeBack = "Welcome back! Your last visit was {$last}.";
} else {
   $welcomeBack = 'First time at Brandon Gorsey\'s Kitchen? Welcome in!';
}

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
      <h2>Order Confirmation</h2>

      <p class="welcome-note">
         <?= $welcomeBack ?>
      </p>

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

   <section class="order-again">
      <h2>Enjoy Your Meal!</h2>

      <a href="index.php" class="order-again-btn">
         Order Again!
      </a>

      <br><br>

      <a href="forget_order.php">
         Clear Order and Start Over
      </a>
   </section>

</main>

</body>
</html>
