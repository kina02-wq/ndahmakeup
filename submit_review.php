<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "makeup";

// buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// cek koneksi
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'error' => $conn->connect_error]));
}

// Mendapatkan data input
$data = json_decode(file_get_contents('php://input'), true);
$rating = $data['rating'];
$comment = $data['comment'];

// Memvalidasi input
if (!is_numeric($rating) || $rating < 1 || $rating > 5 || empty($comment)) {
    echo json_encode(['success' => false, 'error' => 'Invalid input']);
    exit();
}

// Masukkan ulasan ke dalam database
$stmt = $conn->prepare("INSERT INTO reviews (rating, comment) VALUES (?, ?)");
$stmt->bind_param("is", $rating, $comment);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => $stmt->error]);
}

$stmt->close();
$conn->close();
?>
