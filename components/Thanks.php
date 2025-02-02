<?php
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        // If page opened w/o form submission, redirect home (and stop the script from executing)
        header("Location: /");
        exit;
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST)) {
        // If form submission is successful, sanitize input
        $leadName = filter_var($_POST['lead_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $leadEmail = filter_var($_POST['lead_email'], FILTER_SANITIZE_EMAIL);
        $leadPhone = filter_var($_POST['lead_phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $leadMessage = filter_var($_POST['lead_message'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/phpmailer/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';
?>
        <!-- SECTION: Thank you! -->
        <section class="thanks">
            <div class="jumbotron jumbotron__thanks">
                <h1>We'll Be In Touch</h1>
            </div>
            <div class="content">
                <?php
                    try {
                        $mail = new PHPMailer(true);
                        $mail->isSMTP();
                        $mail->SMTPAuth = true;

                        // Credentials
                        $mail->Host = 'smtp.titan.email';
                        $mail->Username = 'info@securelegacyins.com';
                        $mail->Password = 'T!nshoe614';
                        $mail->Port = 465;
                        $mail->SMTPSecure = "ssl";
                        
                        // Sender information
                        $mail->setFrom('info@securelegacyins.com', 'SecureLegacy');

                        // Receiver email address and name
                        $mail->addAddress('info@securelegacyins.com', 'SecureLegacy');

                        // Add cc or bcc
                        // $mail->addCC('email@mail.com');
                        // $mail->addBCC('user@mail.com');

                        $mail->isHTML(true);
                        $mail->Subject = "SecureLegacy: Contact Form";
                        $mail->Body = "<h2>Client Information</h2>" .
                            "<ul>" .
                                "<li>Name: {$leadName}</li>" .
                                "<li>Email: {$leadEmail}</li>" .
                                "<li>Phone: {$leadPhone}</li>" .
                            "</ul>" .
                            "<br>" .
                            "<p>{$leadMessage}</p>";
                        // Get error information
                        // $mail->ErrorInfo
                        $mail->send();

                        // Page output
                        echo "<h2>Message Sent!</h2>" .
                        "<p>Thank you for your submission. The message has been received and we will reach out to you within 24 hours.</p>";
                    } catch (Exception $e) {
                        // Page output
                        echo "<h2>Message Send Error!</h2>" .
                        "<p>Please email us at info@securelegacyins.com. Thank you!</p>";
                        
                        // Output to log file
                        $dateAndTime = new DateTime('now', new DateTimeZone('America/New_York'));
                        $log_file = fopen("logs/contact_errors.txt", "a");
                        $log_message = "Error Submitting on " .
                            $dateAndTime->format('Y-m-d H:i:s') .
                            ": Name: {$leadName}" .
                            ": Email: {$leadEmail}" .
                            ": Phone: {$leadPhone}" .
                            ", Message: {$leadMessage}\n";
                        fwrite($log_file, $log_message);
                        fclose($log_file);
                    }
                    $mail->smtpClose();
                ?>
            </div>
        </section>
