<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "makeup";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari POST
$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];

// Hapus ulasan berdasarkan ID
$sql = "DELETE FROM reviews WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

$response = [];
if ($stmt->execute()) {
    $response['success'] = true;
} else {
    $response['success'] = false;
}

$stmt->close();
$conn->close();

// Kirimkan response dalam format JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
