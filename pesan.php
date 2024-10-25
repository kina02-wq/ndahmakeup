<!-- pesan.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pesan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="pesan.css">
</head>
<body>
    <div class="container">
        <h1>Form Pesanan</h1>
        <form action="detail.pembayaran.php" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pemesan</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Nomor HP</label>
                <input type="phone" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="layanan" class="form-label">Layanan Makeup</label>
                <select class="form-select" id="layanan" name="layanan" required>
                    <option value="Makeup Wisuda|300000">Makeup Wisuda - IDR 300K</option>
                    <option value="Makeup Wisuda Natural|350000">Makeup Wisuda Natural - IDR 350K</option>
                    <option value="Makeup Pernikahan|500000">Makeup Pernikahan - IDR 500K</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
            </div>
            <div class="mb-3">
                <label for="waktu" class="form-label">Waktu</label>
                <input type="time" class="form-control" id="waktu" name="waktu" required>
            </div>

            <!-- New Payment Method Section -->
            <div class="mb-3">
                <label for="payment" class="form-label">Metode Pembayaran</label>
                <select class="form-select" id="payment" name="payment" required>
                    <option value="Bank Transfer">Bank Transfer</option>
                    <option value="Cash">Cash</option>
                </select>
            </div>

            <div class="button-container">
            <button type="button" class="btn-back" onclick="window.location.href='index.php'">Kembali</button>
            <button type="submit" class="btn-submit">Kirim</button>
            </div>
        </form>
    </div>
</body>
</html>
