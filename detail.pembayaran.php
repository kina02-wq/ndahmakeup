<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan</title>   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="pembayaran.css">
</head>
<body>
    <div class="container">
        <h1>Detail Pesanan</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST['nama'];
            $phone = $_POST['phone'];
            $layanan = $_POST['layanan'];
            $tanggal = $_POST['tanggal'];
            $waktu = $_POST['waktu'];
            $payment = $_POST['payment']; 

             // Split the service and price
             list($layananName, $layananPrice) = explode('|', $layanan);
            
            // Tampilkan detail pesanan di halaman
            echo "<p><strong>Nama Pemesan:</strong> $nama</p>";
            echo "<p><strong>Nomor HP:</strong> $phone</p>";
            echo "<p><strong>Layanan yang Dipilih:</strong> $layanan</p>";
            echo "<p><strong>Harga Layanan:</strong> IDR " . number_format($layananPrice) . "</p>"; // Format the price
            echo "<p><strong>Tanggal:</strong> $tanggal</p>";
            echo "<p><strong>Waktu:</strong> $waktu</p>";
            echo "<p><strong>Metode Pembayaran:</strong> $payment</p>"; 
            
             // Tampilkan nomor rekening jika Bank Transfer dipilih
             if ($payment === "Bank Transfer") {
                $rekening = "186-00-0174168-1 (Bank MANDIRI a/n Indarti Astuti Amahoru)";
                echo "<p><strong>Nomor Rekening:</strong> $rekening</p>";
            }

            // Format pesan untuk dikirim ke WhatsApp
            $pesan = urlencode("Halo, saya ingin memesan jasa makeup. Berikut detailnya: 
            Nama: $nama 
            Referensi: $layanan 
            Harga: IDR " . number_format($layananPrice) . " 
            Tanggal: $tanggal 
            Nomor HP: $phone
            Waktu: $waktu
            Metode Pembayaran: $payment."); 

                
            // Nomor WhatsApp tujuan (ganti dengan nomor yang sesuai)
            $nomorWhatsapp = "6281247454366"; // Nomor WhatsApp tujuan
            $linkWhatsapp = "https://wa.me/6281247454366?text=$pesan";
            
            // Tampilkan tombol untuk mengirim ke WhatsApp
            echo "<a href='$linkWhatsapp' class='btn btn-success mt-3'>Kirim ke WhatsApp</a>";
            echo "<a href='pesan.php' class='btn btn-secondary mt-3'>Kembali</a>";
        } else {
            echo "<p>Data pesanan tidak tersedia.</p>";
        }
        ?>
    </div>
</body>
</html>
