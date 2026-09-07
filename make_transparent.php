<?php
$dir = 'public/images/products/';
$files = glob($dir . '*.png');

foreach ($files as $file) {
    if (strpos($file, '_trans') !== false) continue;
    $data = file_get_contents($file);
    $img = imagecreatefromstring($data);
    if (!$img) {
        echo "Failed to load: $file\n";
        continue;
    }
    
    $width = imagesx($img);
    $height = imagesy($img);
    
    $newImg = imagecreatetruecolor($width, $height);
    imagealphablending($newImg, false);
    imagesavealpha($newImg, true);
    
    $transparent = imagecolorallocatealpha($newImg, 0, 0, 0, 127);
    imagefill($newImg, 0, 0, $transparent);
    
    for ($x = 0; $x < $width; $x++) {
        for ($y = 0; $y < $height; $y++) {
            $rgb = imagecolorat($img, $x, $y);
            $r = ($rgb >> 16) & 0xFF;
            $g = ($rgb >> 8) & 0xFF;
            $b = $rgb & 0xFF;
            
            // Check background darkness
            $distFromCenter = sqrt(pow($x - $width/2, 2) + pow($y - $height/2, 2));
            $maxDist = sqrt(pow($width/2, 2) + pow($height/2, 2));
            $edgeFactor = $distFromCenter / $maxDist;
            
            if (($r < 30 && $g < 30 && $b < 30) && $edgeFactor > 0.45) {
                imagesetpixel($newImg, $x, $y, $transparent);
            } else {
                $alpha = ($rgb >> 24) & 0x7F;
                $color = imagecolorallocatealpha($newImg, $r, $g, $b, $alpha);
                imagesetpixel($newImg, $x, $y, $color);
            }
        }
    }
    
    $outPath = str_replace('.png', '_trans.png', $file);
    imagepng($newImg, $outPath);
    imagedestroy($img);
    imagedestroy($newImg);
    echo "Created transparent PNG: $outPath\n";
}
