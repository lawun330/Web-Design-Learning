<!--
 * Individual dish page (template) for Franklin's Fine Dining menu.
 * Displays details of a specific menu item, including price and suggested beverage.
-->

<?php 
    define("TITLE", "Menu Item | Franklin's Fine Dining");
    include("includes/header.php");
    
    // function to strip bad characters from url to protect against header injection
    // read more about preg_replace() at http://php.net/manual/en/function.preg-replace.php
    function stripBadChars($input) {
        $output = preg_replace("/[^a-zA-Z0-9_-]/", "", $input); // use regex to replace bad characters with an empty string 
        return $output;
    }

    // check if a variable is set from a query string and passed through the get collection
    if(isset($_GET["item"])) {
        $menuItem = $_GET["item"];              // get the variable value from the get collection
        $menuItem = stripBadChars($menuItem);   // remove bad characters
        $dish = $menuItems[$menuItem];          // extract information from nested associative array
    }

    // function to calculate a suggested tip
    function suggestTip($price, $tip) {
        $totalTip = $price * $tip;
        // money_format() function was deprecated in PHP 7.4 and removed in PHP 8.0 -> use number_format() function
        return number_format($totalTip, 2); // format the value to represent money
    }
?>

<hr>
<div id="dish">
    <h1><?php echo $dish["title"]; ?> <span class="price">$<?php echo $dish["price"]; ?></span></h1>
    <p><?php echo $dish["blurb"]; ?></p>

    <br>

    <p><strong>Suggested beverage: <?php echo $dish["drink"]; ?></strong></p>
    <p><em>Suggested tip: $<?php echo suggestTip($dish["price"], 0.20); ?></em></p>
</div><!-- dish -->

<hr>

<a href="menu.php" class="button previous">&laquo; Back to Menu</a>

<?php
    include("includes/footer.php");
?>