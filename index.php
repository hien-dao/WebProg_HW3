<?php
require_once "./order_functions.php";

// Check whether the customer submitted an order.
$orderSubmitted = $_SERVER['REQUEST_METHOD'] === 'POST';

$orderSummary = '';

if ($orderSubmitted) {
   $orderSummary = order();

   // Record the customer's visit.
   $visitStamp = date('l, F j, Y g:i a');

   setcookie('lastVisit', $visitStamp, time() + 86400, '/');
}

// Welcome message
if (isset($_COOKIE['lastVisit'])) {
   $last = htmlspecialchars($_COOKIE['lastVisit']);
   $welcomeBack = "Welcome back! Your last visit was {$last}.";
} else {
   $welcomeBack = 'First time at Brandon Gorsey\'s Kitchen? Welcome in!';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="A kitchen order form for Brandon Gorsey's Kitchen using PHP for CSC 4370 Homework 3.">
   <title>Brandon Gorsey's Kitchen</title>
   <link rel="stylesheet" href="styles.css">
</head>
<body>
 
   <header>
      <h1>Brandon Gorsey's Kitchen</h1>
      <p>We serve the best food in town!</p>
      <nav>
         <a href="#display">Display</a></li>
         <a href="#order-form">Order Form</a></li>
         <a href="#insights">Insights</a></li>
      </nav>
   </header>

   <main>

      <!-- Display Section -->
      <section class="menu-section">
         <h2>Choose Your Dessert</h2>

         <div class="display-section">

            <label class="display-card">
               <input type="radio" name="dessert"
                  value="Cheesecake"
                  form="orderForm"
                  <?= dessertSelected("Cheesecake"); ?>>

               <h3>Cheesecake</h3>
               <img src="images/cheesecake.jpg" alt="Cheesecake Dessert">
               <p class="price">$5.99</p>
               <p class="ingredients">cream cheese, sugar, eggs</p>
               <p class="description">
                  A rich and creamy dessert with a buttery graham cracker crust.
               </p>
            </label>

            <label class="display-card">
               <input type="radio" name="dessert"
                  value="Caramel"
                  form="orderForm"
                  <?= dessertSelected("Caramel"); ?>>

               <h3>Caramel</h3>
               <img src="images/caramel.jpg" alt="Caramel Dessert">
               <p class="price">$4.99</p>
               <p class="ingredients">sugar, butter, cream</p>
               <p class="description">
                  A sweet and buttery treat with a smooth, golden texture.
               </p>
            </label>

            <label class="display-card">
               <input type="radio" name="dessert"
                  value="Chocolate"
                  form="orderForm"
                  <?= dessertSelected("Chocolate"); ?>>

               <h3>Chocolate</h3>
               <img src="images/chocolate.jpg" alt="Chocolate Dessert">
               <p class="price">$3.99</p>
               <p class="ingredients">cocoa, sugar, milk</p>
               <p class="description">
                  A rich and indulgent dessert made with the finest cocoa.
               </p>
            </label>

            <label class="display-card">
               <input type="radio" name="dessert"
                  value="Ice Cream"
                  form="orderForm"
                  <?= dessertSelected("Ice Cream"); ?>>

               <h3>Ice Cream</h3>
               <img src="images/icecream.jpg" alt="Ice Cream Dessert">
               <p class="price">$2.99</p>
               <p class="ingredients">milk, sugar, cream</p>
               <p class="description">
                  A cool and creamy treat perfect for any occasion.
               </p>
            </label>

            <label class="display-card">
               <input type="radio" name="dessert"
                  value="Pudding"
                  form="orderForm"
                  <?= dessertSelected("Pudding"); ?>>

               <h3>Pudding</h3>
               <img src="images/pudding.jpg" alt="Pudding Dessert">
               <p class="price">$3.49</p>
               <p class="ingredients">milk, sugar, cornstarch</p>
               <p class="description">
                  A smooth and creamy dessert with a delicate texture.
               </p>
            </label>

            <label class="display-card">
               <input type="radio" name="dessert"
                  value="Brownie"
                  form="orderForm"
                  <?= dessertSelected("Brownie"); ?>>

               <h3>Brownie</h3>
               <img src="images/brownie.jpg" alt="Brownie Dessert">
               <p class="price">$4.49</p>
               <p class="ingredients">chocolate, sugar, butter</p>
               <p class="description">
                  A rich and fudgy treat with a deep chocolate flavor.
               </p>
            </label>

         </div>
      </section>

      <section class="menu-section">
         <h2>Choose Your Drink</h2>

         <div class="display-section">

            <label class="display-card">
               <input type="radio" name="drink"
                  value="Coffee"
                  form="orderForm"
                  <?= drinkSelected("Coffee"); ?>>

               <h3>Coffee</h3>
               <img src="images/coffee.jpg" alt="Coffee Drink">
               <p class="price">$2.99</p>
               <p class="ingredients">water, coffee beans</p>
               <p class="description">
                  A hot and energizing beverage made from freshly brewed coffee beans.
               </p>
            </label>

            <label class="display-card">
               <input type="radio" name="drink"
                  value="Tea"
                  form="orderForm"
                  <?= drinkSelected("Tea"); ?>>

               <h3>Tea</h3>
               <img src="images/tea.jpg" alt="Tea Drink">
               <p class="price">$2.49</p>
               <p class="ingredients">water, tea leaves</p>
               <p class="description">
                  A soothing and aromatic drink made from steeped tea leaves.
               </p>
            </label>

            <label class="display-card">
               <input type="radio" name="drink"
                  value="Juice"
                  form="orderForm"
                  <?= drinkSelected("Juice"); ?>>

               <h3>Juice</h3>
               <img src="images/juice.jpg" alt="Juice Drink">
               <p class="price">$3.49</p>
               <p class="ingredients">fresh fruits</p>
               <p class="description">
                  A refreshing and healthy beverage made from freshly squeezed fruits.
               </p>
            </label>

            <label class="display-card">
               <input type="radio" name="drink"
                  value="Smoothie"
                  form="orderForm"
                  <?= drinkSelected("Smoothie"); ?>>

               <h3>Smoothie</h3>
               <img src="images/smoothie.jpg" alt="Smoothie Drink">
               <p class="price">$4.99</p>
               <p class="ingredients">fruits, yogurt, ice</p>
               <p class="description">
                  A thick and creamy beverage made from blended fruits and yogurt.
               </p>
            </label>

            <label class="display-card">
               <input type="radio" name="drink"
                  value="Soda"
                  form="orderForm"
                  <?= drinkSelected("Soda"); ?>>

               <h3>Soda</h3>
               <img src="images/soda.jpg" alt="Soda Drink">
               <p class="price">$1.99</p>
               <p class="ingredients">carbonated water, sugar, flavoring</p>
               <p class="description">
                  A fizzy and sweet beverage that comes in a variety of flavors.
               </p>
            </label>

            <label class="display-card">
               <input type="radio" name="drink"
                  value="Milkshake"
                  form="orderForm"
                  <?= drinkSelected("Milkshake"); ?>>

               <h3>Milkshake</h3>
               <img src="images/milkshake.jpg" alt="Milkshake Drink">
               <p class="price">$3.99</p>
               <p class="ingredients">milk, ice cream, flavoring</p>
               <p class="description">
                  A creamy and indulgent beverage made from milk and ice cream.
               </p>
            </label>
         </div>
      </section>



      <!-- Order Form Section -->
      <section class="order-form">
         <h2>Complete Your Order</h2>
         <form method="POST" action="index.php" id="orderForm">
            <fieldset>
                  <legend>Choose Your Drink Size:</legend>
                  <label>
                     <input type="radio" name="drinkSize"
                           value="Small"
                           <?= drinkSizeSelected("Small"); ?>>
                     Small
                  </label>
                  <label>
                     <input type="radio" name="drinkSize"
                           value="Medium"
                           <?= drinkSizeSelected("Medium"); ?>>
                     Medium
                  </label>
                  <label>
                     <input type="radio" name="drinkSize"
                           value="Large"
                           <?= drinkSizeSelected("Large"); ?>>
                     Large
                  </label>
            </fieldset>
            <button type="submit">Submit Order</button>
         </form>
      </section>

      <?php if ($orderSubmitted): ?>
      <section class="receipt-section">
         <h2>Order Receipt</h2>
         <p class="welcome-note">
            <?= $welcomeBack ?>
         </p>

         <div class="receipt-card">
            <h3>Your Order</h3>
            <p>
                  <strong>Dessert:</strong>
                  <?= htmlspecialchars(sessionValue('dessert')); ?>
            </p>
            <p>
                  <strong>Drink:</strong>
                  <?= htmlspecialchars(sessionValue('drink')); ?>
            </p>
            <p>
                  <strong>Drink Size:</strong>
                  <?= htmlspecialchars(sessionValue('drinkSize')); ?>
            </p>
         </div>

         <div class="insight-card">
            <h3>Order Feedback</h3>
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

         <div class="order-again">
            <a href="index.php" class="order-again-btn">
               Order Again!
            </a>
            <a href="forget_order.php" class="clear-order-btn">
                  Clear Order
            </a>
         </div>
      </section>
      <?php endif; ?>


   </main>
</body>
</html>