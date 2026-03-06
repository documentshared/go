<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize input
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

    // Telegram Bot credentials
    $botToken = "7913981100:AAEtqg97vQTLBCCwcaoKrtaI7Nc97O048Xc"; // your bot token
    $chatId = "7750600822"; // your chat ID

    // Create message
    $message = "📩 New Sign Up:\nName: $name\nEmail: $email";

    // Send message to Telegram
    $url = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=".urlencode($message);
    $response = file_get_contents($url);

    // Show confirmation page
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>Sign Up</title>
        <style>
            body { font-family: Arial, sans-serif; background: #f7f7f7; text-align: center; padding: 50px;}
            .message { background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);}
            h2 { color: #4CAF50; }
        </style>
    </head>
    <body>
        <div class='message'>
            <h2>Thank you for signing up!</h2>
            <p>We have received your information.</p>
            <a href='index.html'>Go Back</a>
        </div>
    </body>
    </html>";

} else {
    echo "Invalid request.";
}
?>
