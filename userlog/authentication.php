
<?php session_start(); ?>
<?php include('../dbcon.php'); ?>
<html>
<head>
    <title>QR Code Authentication</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            text-align: center;
            padding: 50px;
        }

        h1 {
            color: #333333;
            margin-bottom: 30px;
        }

        .qr-code {
            max-width: 300px;
            margin: 0 auto;
        }

        .message {
            color: #777777;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>QR Code Authentication</h1>

    <?php
    // Check if the token is provided in the URL
    if (isset($_GET['token'])) {
        $token = $_GET['token'];
        // Generate a QR code with the token
        $qr_code_url = "https://api.qrserver.com/v1/create-qr-code/?data=$token";

        // Display the QR code
        echo "<div class='qr-code'><img src='$qr_code_url' alt='QR Code'></div>";

        // Check if the user has successfully authenticated
        // You can add your own logic to check if the authentication is successful
        $authenticated = true;

        if ($authenticated) {
            // Redirect the user to the desired page
            header("Location: userdashboard.php");
            exit;
        } else {
            echo "<div class='message'>Waiting for authentication...</div>";
        }
    }
    ?>
</body>
</html>
