<?php
// Function to create sleek dark tech gradient background image with glowing cyan grid/mesh
function createTechBg($w, $h, $filename) {
    $img = imagecreatetruecolor($w, $h);
    
    // Gradient dark background (#080c10 to #001f3f)
    for ($y = 0; $y < $h; $y++) {
        $factor = $y / $h;
        $r = (int)(8 * (1 - $factor) + 5 * $factor);
        $g = (int)(12 * (1 - $factor) + 25 * $factor);
        $b = (int)(16 * (1 - $factor) + 50 * $factor);
        $color = imagecolorallocate($img, $r, $g, $b);
        imageline($img, 0, $y, $w, $y, $color);
    }
    
    // Ambient cyan glow circles
    $cyanGlow = imagecolorallocatealpha($img, 0, 210, 255, 115);
    imagefilledellipse($img, (int)($w * 0.5), (int)($h * 0.5), (int)($w * 0.8), (int)($h * 0.8), $cyanGlow);
    imagefilledellipse($img, (int)($w * 0.2), (int)($h * 0.3), (int)($w * 0.4), (int)($h * 0.4), $cyanGlow);
    
    // Save image as WEBP and PNG
    imagewebp($img, $filename);
    $pngFile = str_replace('.webp', '.png', $filename);
    imagepng($img, $pngFile);
    imagedestroy($img);
    echo "Created tech background: $filename & $pngFile\n";
}

createTechBg(1920, 600, "public/images/man.webp");
createTechBg(1920, 600, "public/assets/images/man.webp");
createTechBg(1920, 800, "public/images/contact-back.webp");
createTechBg(1920, 800, "public/assets/images/contact-back.webp");
createTechBg(800, 800, "public/images/bottle-bg.png");
createTechBg(800, 800, "public/assets/images/bottle-bg.png");
