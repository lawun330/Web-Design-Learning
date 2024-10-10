<!--
 * Team page for Franklin's Fine Dining.
 * Displays information about the restaurant's staff members.
-->

<?php
    define("TITLE", "Team | Franklin's Fine Dining"); 
    include("includes/header.php");
?>

<div id="team-members" class="cf">
    <hr>
    
    <h1>Our Team at Franklin's</h1>
    <p>We're small, but mighty. Franklin's Fine Dining has been a family-owned and run business
    since the dirty thirties, and we're proud of it! When you get these three together, you never know what can happen.
    But you can count on one thing: <strong>The best food you've ever had. Ever.</strong></p>
    
    <hr>

    <?php
        foreach ($teamMembers as $member) { // foreach loop begins here
    ?>
        <div class="member">
            <!-- image file extension is used here -->
            <img src="img/<?php echo $member["image"]; ?>.png" alt="<?php echo $member["name"]; ?>">
            <h2><?php echo $member["name"]; ?></h2>
            <p><?php echo $member["bio"]; ?></p>
        </div><!-- member -->
    <?php
        }   // foreach loop ends here
    ?>

</div><!-- team-members -->

<?php
    include("includes/footer.php");
?>