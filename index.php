<?php
   require_once "./order_functions.php";
   $orderSummary = order();
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
      <section class="display-section">
         <card class="display-card">
            <h3>Cheesecake</h3>
            <img src="images/cheesecake.jpg" alt="Cheesecake Dessert">
            <p class="price">$5.99</p>
            <p class="ingredients">cream cheese, sugar, eggs</p>
            <p class="description">A rich and creamy dessert with a buttery graham cracker crust.</p>
         </card>
         <card class="display-card">
            <h3>Caramel</h3>
            <img src="images/caramel.jpg" alt="Caramel Dessert">
            <p class="price">$4.99</p>
            <p class="ingredients">sugar, butter, cream</p>
            <p class="description">A sweet and buttery treat with a smooth, golden texture.</p>
         </card>
         <card class="display-card">
            <h3>Chocolate</h3>
            <img src="images/chocolate.jpg" alt="Chocolate Dessert">
            <p class="price">$3.99</p>
            <p class="ingredients">cocoa, sugar, milk</p>
            <p class="description">A rich and indulgent dessert made with the finest cocoa.</p>
         </card>
         <card class="display-card">
            <h3>Ice Cream</h3>
            <img src="images/icecream.jpg" alt="Ice Cream Dessert">
            <p class="price">$2.99</p>
            <p class="ingredients">milk, sugar, cream</p>
            <p class="description">A cool and creamy treat perfect for any occasion.</p>
         </card>
         <card class="display-card">
            <h3>Pudding</h3>
            <img src="images/pudding.jpg" alt="Pudding Dessert">
            <p class="price">$3.49</p>
            <p class="ingredients">milk, sugar, cornstarch</p>
            <p class="description">A smooth and creamy dessert with a delicate texture.</p>
         </card>
         <card class="display-card">
            <h3>Brownie</h3>
            <img src="images/brownie.jpg" alt="Brownie Dessert">
            <p class="price">$4.49</p>
            <p class="ingredients">chocolate, sugar, butter</p>
            <p class="description">A rich and fudgy treat with a deep chocolate flavor.</p>
         </card>
         <card class="display-card">
            <h3>Coffee</h3>
            <img src="images/coffee.jpg" alt="Coffee Drink">
            <p class="price">$2.99</p>
            <p class="ingredients">water, coffee beans</p>
            <p class="description">A hot and energizing beverage made from freshly brewed coffee beans.</p>
         </card>
         <card class="display-card">
            <h3>Tea</h3>
            <img src="images/tea.jpg" alt="Tea Drink">
            <p class="price">$2.49</p>
            <p class="ingredients">water, tea leaves</p>
            <p class="description">A soothing and aromatic drink made from steeped tea leaves.</p>
         </card>
         <card class="display-card">
            <h3>Juice</h3>
            <img src="images/juice.jpg" alt="Juice Drink">
            <p class="price">$3.49</p>
            <p class="ingredients">fresh fruits, water</p>
            <p class="description">A refreshing and healthy beverage made from freshly squeezed fruits.</p>
         </card>
         <card class="display-card">
            <h3>Smoothie</h3>
            <img src="images/smoothie.jpg" alt="Smoothie Drink">
            <p class="price">$4.99</p>
            <p class="ingredients">fruits, yogurt, ice</p>
            <p class="description">A thick and creamy drink made from blended fruits and yogurt.</p>
         </card>
         <card class="display-card">
            <h3>Soda</h3>
            <img src="images/soda.jpg" alt="Soda Drink">
            <p class="price">$1.99</p>
            <p class="ingredients">carbonated water, sugar, flavoring</p>
            <p class="description">A fizzy and sweet beverage with a variety of flavors to choose from.</p>
         </card>
         <card class="display-card">
            <h3>Milkshake</h3>
            <img src="images/milkshake.jpg" alt="Milkshake Drink">
            <p class="price">$4.49</p>
            <p class="ingredients">milk, ice cream, flavoring</p>
            <p class="description">A creamy and indulgent drink made from milk and ice cream.</p>
         </card>

      </section>

      <!-- Order Form Section -->
      <section class="order-form">
         <h2>Place Your Order Here</h2>
         <form method="POST" action="process_order.php">
            <label for="dessert">Choose a dessert:</label>
            <select name="dessert" id="dessert">
               <option value="none" <?= dessertSelected("none"); ?>>Select a dessert</option>
               <option value="Cheesecake" <?= dessertSelected("Cheesecake"); ?>>Cheesecake</option>
               <option value="Caramel" <?= dessertSelected("Caramel"); ?>>Caramel</option>
               <option value="Chocolate" <?= dessertSelected("Chocolate"); ?>>Chocolate</option>
               <option value="Ice Cream" <?= dessertSelected("Ice Cream"); ?>>Ice Cream</option>
               <option value="Pudding" <?= dessertSelected("Pudding"); ?>>Pudding</option>
               <option value="Brownie" <?= dessertSelected("Brownie"); ?>>Brownie</option>
            </select>

            <label for="drink">Choose a drink:</label>
            <select name="drink" id="drink">
               <option value="none" <?= drinkSelected("none"); ?>>Select a drink</option>
               <option value="Coffee" <?= drinkSelected("Coffee"); ?>>Coffee</option>
               <option value="Tea" <?= drinkSelected("Tea"); ?>>Tea</option>
               <option value="Juice" <?= drinkSelected("Juice"); ?>>Juice</option>
               <option value="Smoothie" <?= drinkSelected("Smoothie"); ?>>Smoothie</option>
               <option value="Soda" <?= drinkSelected("Soda"); ?>>Soda</option>
               <option value="Milkshake" <?= drinkSelected("Milkshake"); ?>>Milkshake</option>
            </select>

            <fieldset>
               <legend>Choose a drink size:</legend>
               <input type="radio" name="drinkSize" value="Small" <?= drinkSizeSelected("Small"); ?>> Small
               <input type="radio" name="drinkSize" value="Medium" <?= drinkSizeSelected("Medium"); ?>> Medium
               <input type="radio" name="drinkSize" value="Large" <?= drinkSizeSelected("Large"); ?>> Large
            </fieldset>

            <button type="submit">Submit Order</button>
         </form>
      </section>

      <section class="insights">
         <h2>Insights</h2>

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

   </main>
</body>
</html>