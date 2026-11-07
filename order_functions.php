<?php

session_start();

function order(): string {
   $dessert = trim($_POST['dessert'] ?? 'none');
   $drink = trim($_POST['drink'] ?? 'none');
   $drinkSize = trim($_POST['drinkSize'] ?? '');

   $_SESSION['dessert'] = ($dessert !== '' && $dessert !== 'none')
      ? $dessert
      : '(not selected)';
   $_SESSION['drink'] = ($drink !== '' && $drink !== 'none')
      ? $drink
      : '(not selected)';
   $_SESSION['drinkSize'] = ($drinkSize !== '')
      ? $drinkSize
      : '(not selected)';

   return "Dessert: " . htmlspecialchars($_SESSION['dessert']) . "<br>"
      . "Drink: " . htmlspecialchars($_SESSION['drink']) . "<br>"
      . "Drink size: " . htmlspecialchars($_SESSION['drinkSize']);
}

function sessionValue(string $key): string {
   return $_SESSION[$key] ?? '(not selected)';
}

function completedChoiceCount(): int {
   $count = 0;

   foreach (['dessert', 'drink', 'drinkSize'] as $key) {
      if (sessionValue($key) !== '(not selected)') {
         $count++;
      }
   }

   return $count;
}

function completionMessage(): string {
   $count = completedChoiceCount();

   if ($count === 3) {
      return 'Your order is complete and ready to submit.';
   }

   if ($count === 0) {
      return 'Start by choosing a dessert, a drink, and a size.';
   }

   return "You have completed {$count} of 3 order choices.";
}

function pairingSuggestion(): string {
   $dessert = sessionValue('dessert');
   $drink = sessionValue('drink');

   if ($dessert === '(not selected)' || $drink === '(not selected)') {
      return 'Select both a dessert and a drink to see a suggested pairing.';
   }

   if ($dessert === 'Cheesecake' && $drink === 'Coffee') {
      return 'Suggested pairing: Cheesecake and coffee create a classic cafe-style combo.';
   }

   if ($dessert === 'Chocolate' && $drink === 'Milkshake') {
      return 'Suggested pairing: Chocolate cake and milk make a rich and familiar dessert pairing.';
   }

   if ($dessert === 'Chocolate' && $drink === 'Coffee') {
      return 'Suggested pairing: Chocolate and coffee reinforce the espresso flavor profile.';
   }

   if ($dessert === 'Pudding' && $drink === 'Tea') {
      return 'Suggested pairing: Pudding and tea create a lighter and balanced combination.';
   }

   return "Suggested pairing: {$dessert} with {$drink} gives the order a custom bistro feel.";
}

function dessertPrice(): float {
   $prices = [
      'Cheesecake' => 5.99,
      'Caramel' => 4.99,
      'Chocolate' => 3.99,
      'Ice Cream' => 2.99,
      'Pudding' => 3.49,
      'Brownie' => 4.49

   ];

   return $prices[sessionValue('dessert')] ?? 0.0;
}

function drinkPrice(): float {
   $basePrices = [
      'Coffee' => 2.99,
      'Tea' => 2.49,
      'Juice' => 3.49,
      'Smoothie' => 4.99,
      'Soda' => 1.99,
      'Milkshake' => 3.99,
      
      'Milk' => 1.75,
   ];
   $sizeUpcharge = [
      'Small' => 0.0,
      'Medium' => 0.6,
      'Large' => 1.15,
   ];

   $drink = sessionValue('drink');
   $drinkSize = sessionValue('drinkSize');

   if (!isset($basePrices[$drink])) {
      return 0.0;
   }

   return $basePrices[$drink] + ($sizeUpcharge[$drinkSize] ?? 0.0);
}

function estimatedTotal(): float {
   return dessertPrice() + drinkPrice();
}

function formattedTotal(): string {
   return '$' . number_format(estimatedTotal(), 2);
}

function pricingNote(): string {
   if (sessionValue('drink') !== '(not selected)' && sessionValue('drinkSize') === '(not selected)') {
      return 'Choose a drink size to finalize the drink price.';
   }

   if (completedChoiceCount() === 0) {
      return 'Your estimated total will update as soon as you begin building the order.';
   }

   return 'The estimate is based on the current dessert, drink, and drink size selections.';
}

function orderProfile(): string {
   $total = estimatedTotal();

   if ($total >= 6.5) {
      return 'Full cafe combo';
   }

   if ($total >= 4.0) {
      return 'Balanced dessert break';
   }

   if ($total > 0) {
      return 'Light snack order';
   }

   return 'No selections yet';
}

function dessertSelected(string $dessert): string {
    return ($_SESSION['dessert'] ?? '') === $dessert
        ? 'checked'
        : '';
}

function drinkSelected(string $drink): string {
    return ($_SESSION['drink'] ?? '') === $drink
        ? 'checked'
        : '';
}

function drinkSizeSelected(string $drinkSize): string {
    return ($_SESSION['drinkSize'] ?? '') === $drinkSize
        ? 'checked'
        : '';
}

?>