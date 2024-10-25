<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makeup Reviews</title>
    <link rel="stylesheet" href="reviews.css">
    <style>
        .review-form, .reviews { margin: 20px; }
        .review { margin-bottom: 15px; }
    </style>
</head>
<body> 
    <div class="review-form">
        <h2>Kirim Ulasan Anda</h2>
       <p>Sebelum kirim ulasan harap lihat kembali rating dan ulasan anda!</p>
        <form id="reviewForm">
            <label for="rating">Rating:</label>
            <select id="rating" name="rating">
                <option value="5">5 Stars</option>
                <option value="4">4 Stars</option>
                <option value="3">3 Stars</option>
                <option value="2">2 Stars</option>
                <option value="1">1 Star</option>
            </select>
            <br>
            <label for="comment">Komen:</label>
            <textarea id="comment" name="comment" rows="4" cols="50"></textarea>
            <br>
            <button type="submit">Kirim Ulasan</button>
            <button class="button-kembali" onclick="window.location.href='index.php'">Kembali</button>
        </form>
    </div>

    <div class="reviews" id="reviews"> 
        <!-- Ulasan akan ditampilkan di sini -->
    </div>

    <script>
        document.getElementById('reviewForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const rating = document.getElementById('rating').value;
            const comment = document.getElementById('comment').value;

            fetch('submit_review.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ rating, comment })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('comment').value = '';  // Clear the textarea
                    loadReviews();  // Muat ulang ulasan
                } else {
                    alert('Failed to submit review');
                }
            });
        });


        // Muat ulasan saat halaman dimuat
        loadReviews();
        function loadReviews() {
    fetch('get_reviews.php')
        .then(response => response.json())
        .then(data => {
            const reviewsDiv = document.getElementById('reviews');
            reviewsDiv.innerHTML = '';
            data.forEach(review => {
                const reviewElement = document.createElement('div');
                reviewElement.className = 'review';
                reviewElement.innerHTML = `
                    <p>Rating: ${review.rating} Stars</p>
                    <p>Komen: ${review.comment}</p>
                    <p><small>Posted on ${review.created_at}</small></p>
                    <button onclick="deleteReview(${review.id})">Hapus</button>
                `;
                reviewsDiv.appendChild(reviewElement);
            });
        });
}

function deleteReview(id) {
    if (confirm('Apakah Anda yakin ingin menghapus ulasan ini?')) {
        fetch('delete_review.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                loadReviews();  // Muat ulang ulasan setelah dihapus
            } else {
                alert('Gagal menghapus ulasan');
            }
        });
    }
}

    </script>
</body>
</html>
