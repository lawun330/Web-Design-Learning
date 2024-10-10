<!--
 * Contact page for Franklin's Fine Dining.
 * Provides a contact form for customers to send messages to the restaurant.
-->

<?php 
    define("TITLE", "Contact Us | Franklin's Fine Dining");
    include("includes/header.php");
?>

<div id="contact">
    <hr>

    <h1>Get in touch with us!</h1>

    <?php
        /* PHP used in this script:
		
		preg_match()
		- Perform a regular expression match
		- http://ca2.php.net/preg_match
		
		isset()
		- Determine if a variable is set and is not NULL
		- http://ca2.php.net/manual/en/function.isset.php
		
		$_POST
		- An associative array of variables passed to the current script via the HTTP POST method.
		- http://www.php.net/manual/en/reserved.variables.post.php
		
		trim()
		- Strip whitespace (or other characters) from the beginning and end of a string
		- http://www.php.net/manual/en/function.trim.php
		
		exit
		- Output a message and terminate the current script
		- http://www.php.net//manual/en/function.exit.php
		
		die()
		- Equivalent to exit
		- http://ca1.php.net/manual/en/function.die.php
		
		wordwrap()
		- Wraps a string to a given number of characters
		- http://ca1.php.net/manual/en/function.wordwrap.php
		
		mail()
		- Send mail
		- http://ca1.php.net/manual/en/function.mail.php
        */

        // function to detect header injection
        function hasHeaderInjection($str) {
            return preg_match("/[\r\n]/", $str);
        }

        // if the submit button is pressed
        if (isset($_POST["contact_submit"])) { // submission begins
            $name = trim($_POST["name"]); // trim whitespaces
            $email = trim($_POST["email"]); // trim whitespaces
            $message = $_POST["message"];

            // if there is a header injection for our variables
            if (hasHeaderInjection($name) || hasHeaderInjection($email)) {
                die(); // terminate the script 
            }

            // handle empty inputs
            if (!$name || !$email || !$message) {
                echo '<h4 class="error">All fields required.</h4><hr><a href="contact.php" class="button block">Go Back</a>';
                exit; // terminate the script halfway
            }

            // save the recipient email to a variable
            $to = "your@email.com";

            // construct an email's subject
            $subject = "$name sent you a message via your contact form";
            
            // construct an email's message
            $message = "Name: $name\r\n";
            $message .= "Email: $email\r\n"; 
            $message .= "Message: \r\n$msg";

            // if a subscription checkbox is checked
            if (isset($_POST["subscribe"]) && $_POST["subscribe"]=="Subscribed") {
                $message .= "\r\n\r\nPlease add $email to the mailing list.\r\n";
            }
            
            // wrap an email's message
            $message = wordwrap($message, 72); // 72 characters per line

            // set email headers to a variable
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
            $headers .= "From: $name <$email> \r\n";
            $headers .= "X-Priority: 1\r\n"; // 1 is high priority, 0 is low priority
            $headers .= "X-MSMail-Priority: High\r\n\r\n";
            
            // send the email
            mail($to, $subject, $message, $headers);
    ?>
    
    <!-- show success message after email is sent -->
    <h5>Thanks for contacting Franklin's!</h5>
    <p>Please allow 24 hours for a response.</p>
    <p><a href="index.php" class="button block">&laquo; Go to Home Page</a></p>

    <?php
        } // submission ends
        else { // no-submission begins
    ?>

    <form method="post" id="contact-form" action=""> <!-- empty action submit to the same page -->
        <label for="name">Your Name</label>
        <input type="text" id="name" name="name">

        <label for="email">Your Email</label>
        <input type="email" id="email" name="email">

        <label for="message">and Your Message</label>
        <textarea id="message" name="message"></textarea>

        <input type="checkbox" id="subscribe" name="subscribe" value="Subscribed">
        <label for="subscribe">Subscribe to Newsletter</label>
        
        <input type="submit" class="button next" name="contact_submit" value="Send Message">
    </form>

    <?php } // no-submission ends ?>

    <hr>
</div><!-- contact -->

<?php
    include("includes/footer.php");
?>