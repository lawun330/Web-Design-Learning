<!--
 * Menu page for Franklin's Fine Dining.
 * Displays a list of all menu items with prices and links to individual dish pages.
-->

<?php 
    define("TITLE", "Menu | Franklin's Fine Dining");
    include("includes/header.php");
?>

<div id="menu-items">
    <h1>Our Delicious Menu</h1>
    <p>Like our team, our mnu is very small &mdash; but dang, does it ever pack a punch!</p>
    <p><em>Click any menu item to learn more about it.</em></p>
    
    <hr>
    
    <ul>
        <?php
            foreach ($menuItems as $dish => $item) { // foreach loop with key extraction begins here
                // analogous to $key => $value
        ?>
        <!--
         * Generate a menu item link
         * @param string $dish   The dish key from the $menuItems array
         * @param array  $item   The item details containing 'title' and 'price'
         * @return string        HTML for a list item with a link to the dish page
        -->
        <li><a href="dish.php?item=<?php echo $dish; ?>"><?php echo $item["title"]; ?></a> - $<?php echo $item["price"]; ?></li>
        <?php 
            } // foreach loop with key extraction ends here 
        ?>
    </ul>

    <hr>
</div><!-- menu-items -->

<?php
    include("includes/footer.php");
?>