<?php
// Folder tempat gambar-gambar disimpan
$directory = 'images/';

// Ambil semua file gambar dalam folder
$images = glob($directory . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

// Inisialisasi variabel untuk menampilkan gambar
$output = '';

foreach ($images as $image) {
    $output .= '<div class="galeri-item">';
    $output .= '<img src="' . $image . '" alt="Galeri Image">';
    $output .= '</div>';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="gallery.css">
</head>
<body>
    <h1>Galeri Gambar</h1>
    <div class="gallery">
        <?php echo $output; ?>
    </div>
    <div style="text-align: left;">
    <button class="button-kembali" onclick="window.location.href='index.php'">Kembali</button>
    </div>
</body>
</html>
