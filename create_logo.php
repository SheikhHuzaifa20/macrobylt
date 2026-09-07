<?php
$width = 500;
$height = 120;
$img = imagecreatetruecolor($width, $height);
imagealphablending($img, false);
imagesavealpha($img, true);

$transparent = imagecolorallocatealpha($img, 0, 0, 0, 127);
imagefill($img, 0, 0, $transparent);

// Colors
$cyan = imagecolorallocate($img, 0, 210, 255);
$white = imagecolorallocate($img, 255, 255, 255);
$darkBlue = imagecolorallocate($img, 0, 150, 220);

// Draw Modern Gadget Icon (Smartphone outline + Glowing Magnet Ring)
imagesetthickness($img, 4);

// Outer Phone Rounded Box (x: 20 to 65, y: 20 to 100)
imagearc($img, 30, 30, 20, 20, 180, 270, $cyan);
imagearc($img, 55, 30, 20, 20, 270, 360, $cyan);
imagearc($img, 55, 90, 20, 20, 0, 90, $cyan);
imagearc($img, 30, 90, 20, 20, 90, 180, $cyan);
imageline($img, 30, 20, 55, 20, $cyan);
imageline($img, 65, 30, 65, 90, $cyan);
imageline($img, 30, 100, 55, 100, $cyan);
imageline($img, 20, 30, 20, 90, $cyan);

// Inner MagSafe Ring inside phone icon
imagearc($img, 42, 60, 24, 24, 0, 360, $white);
imagearc($img, 42, 60, 12, 12, 0, 360, $cyan);

// Draw Text "GadgetGrove"
$fontFile = 'C:\Windows\Fonts\arialbd.ttf';
if (!file_exists($fontFile)) {
    $fontFile = 'C:\Windows\Fonts\arial.ttf';
}

if (file_exists($fontFile)) {
    // "Gadget" in White, "Grove" in Cyan
    imagettftext($img, 32, 0, 90, 72, $white, $fontFile, "Gadget");
    imagettftext($img, 32, 0, 260, 72, $cyan, $fontFile, "Grove");
} else {
    imagestring($img, 5, 90, 45, "GadgetGrove", $cyan);
}

imagepng($img, "public/images/logo.png");
imagepng($img, "public/assets/images/logo.png");
imagedestroy($img);
echo "GadgetGrove Transparent Logo Created Successfully!\n";
