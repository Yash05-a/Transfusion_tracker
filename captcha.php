<?php
session_start();

// Generate a random captcha code
$captchaCode = generateCaptchaCode();

// Save the captcha code in the session
$_SESSION['captcha_code'] = $captchaCode;

// Generate the captcha image
$width = 120;
$height = 40;
$image = imagecreatetruecolor($width, $height);
$backgroundColor = imagecolorallocate($image, 255, 255, 255);
$textColor = imagecolorallocate($image, 0, 0, 0);
imagefilledrectangle($image, 0, 0, $width - 1, $height - 1, $backgroundColor);
imagettftext($image, 20, 0, 10, 30, $textColor, 'path/to/font.ttf', $captchaCode);

// Set the appropriate header and output the image
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);

// Generate a random captcha code
function generateCaptchaCode($length = 6) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $captchaCode = '';
    $charLength = strlen($characters);
    for ($i = 0; $i < $length; $i++) {
        $captchaCode .= $characters[rand(0, $charLength - 1)];
    }
    return $captchaCode;
}
?>
