<!--
 * Navigation menu for Franklin's Fine Dining website.
 * Generates the navigation menu items from the $navItems array.
-->

<ul>
    <?php

        foreach ($navItems as $item) {
            // using single quotes does not work
            echo "<li>
                    <a href=\"{$item["slug"]}\">
                        {$item["title"]}
                    </a>
                </li>";
        }

    ?>
</ul>