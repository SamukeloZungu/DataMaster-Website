
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoloader
require 'vendor/autoload.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send'])) {
    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);
    
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'samkelosengwayo01@gmail.com'; // Your Gmail address
    $mail->Password = 'uegq lvxc jisk qpnf'; // Your Gmail password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Email content
   
    $mail->addAddress('samkelosengwayo01@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = 'Demo Request';
    $mail->Body = 'Name: ' . $_POST['name'] . '<br>'
                . 'Surname: ' . $_POST['surname'] . '<br>'
                . 'Company: ' . $_POST['company'] . '<br>'
                . 'Email: ' . $_POST['email'] . '<br>'
                . 'Phone: ' . $_POST['phone'] . '<br>'
                . 'Preferred Date for Demo: ' . $_POST['demoDate'] . '<br>'
                . 'Preferred Time for Demo: ' . $_POST['demoTime'] . '<br>';

    // Send the email
    try {
        $mail->send();
        echo 'Thank you for your request! We will contact you shortly.';
    } catch (Exception $e) {
        echo "There was a problem sending your request. Please try again later.";
    }
} else {
    // Redirect back to the form if the form was not submitted
    header("Location: index.html");
    exit();
}
?>

