<?php
$dir = 'public/images/products/';
$files = ['magsafe_powerbank', 'gan_fast_charger', 'anc_earbuds', 'armor_phone_case', 'magnetic_car_mount', 'braided_usbc_cable'];

foreach ($files as $name) {
    $file = $dir . $name . '.png';
    if (!file_exists($file)) continue;
    
    $data = file_get_contents($file);
    $src = imagecreatefromstring($data);
    if (!$src) continue;
    
    $w = imagesx($src);
    $h = imagesy($src);
    
    $dst = imagecreatetruecolor($w, $h);
    imagealphablending($dst, false);
    imagesavealpha($dst, true);
    
    $trans = imagecolorallocatealpha($dst, 0, 0, 0, 127);
    imagefill($dst, 0, 0, $trans);
    
    $cx = $w / 2;
    $cy = $h / 2;
    $radius = min($w, $h) * 0.46;
    
    for ($x = 0; $x < $w; $x++) {
        for ($y = 0; $y < $h; $y++) {
            $rgb = imagecolorat($src, $x, $y);
            $r = ($rgb >> 16) & 0xFF;
            $g = ($rgb >> 8) & 0xFF;
            $b = $rgb & 0xFF;
            
            // Luminance
            $lum = ($r * 0.299 + $g * 0.587 + $b * 0.114);
            $dx = $x - $cx;
            $dy = $y - $cy;
            $dist = sqrt($dx * $dx + $dy * $dy);
            
            // Feather edge smooth alpha transition
            if ($lum < 35 && $dist > $radius * 0.7) {
                // Fully transparent background
                imagesetpixel($dst, $x, $y, $trans);
            } elseif ($lum < 60 && $dist > $radius * 0.7) {
                // Soft alpha fade
                $factor = ($lum - 35) / 25;
                $alpha = (int)(127 * (1 - $factor));
                $c = imagecolorallocatealpha($dst, $r, $g, $b, $alpha);
                imagesetpixel($dst, $x, $y, $c);
            } else {
                // Solid product pixel
                $c = imagecolorallocatealpha($dst, $r, $g, $b, 0);
                imagesetpixel($dst, $x, $y, $c);
            }
        }
    }
    
    $cleanPath = $dir . $name . '_clean.png';
    imagepng($dst, $cleanPath);
    imagedestroy($src);
    imagedestroy($dst);
    echo "Clean Transparent PNG: $cleanPath\n";
}
