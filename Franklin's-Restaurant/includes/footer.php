<!--
 * Footer file for Franklin's Fine Dining website.
 * Includes contact information, location, hours, and copyright notice.
-->

<?php
    $companyName = "Franklin's Fine Dining";
?>

            <div id="footer" class="cf">

                <div class="column three">
                    <strong>Phone</strong>
                    (+95) 997 714 8758
                </div><!-- column -->

                <div class="column three">
                    <strong>Location</strong>
                    330 Pyae Road<br>
                    Kamayut, Yangon
                </div><!-- column -->

                <div class="column three">
                    <strong>Hours</strong>
                    <em>Sunday - Wednesday</em><br>
                    11:00am - 10:00pm<br><br>

                    <em>Saturday</em><br>
                    9:00am - 5:00pm<br><br>
                    
                    <em>Thursday - Friday</em><br>
                    Closed<br><br>

                    <?php include("includes/store-hours.php"); ?>

                </div><!-- column -->

            </div><!-- footer -->

            <small>&copy;<?php echo date("Y"); ?> <?php echo $companyName; ?></small>
        
        </div><!-- content -->
    
    </div><!-- wrapper -->

    <div class="copyright-info">
        <?php include("../assets/includes/copyright.php"); ?>
    </div><!-- copyright-info -->
</body>

</html>