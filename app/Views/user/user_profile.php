<!DOCTYPE html>
<html>

<head>
    <title>User Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>User Profile</h2>
        </div>
        <div class="card-body">
            <?php if (isset($user)): ?>
                <p class="card-text">Nama
                    Lengkap: <?= $user['gelar_depan'] ?> <?= $user['nama_lengkap'] ?> <?= $user['gelar_belakang'] ?></p>
                <p class="card-text">NIP: <?= $user['nip'] ?></p>
                <p class="card-text">NIK: <?= $user['nik'] ?></p>
                <p class="card-text">Jenis Kelamin: <?= $user['jenis_kelamin'] ?></p>
                <p class="card-text">Alamat: <?= $user['alamat'] ?></p>
                <p class="card-text">Email: <?= $user['email'] ?></p>
                <p class="card-text">Level: <?= $user['level'] ?></p>
            <?php else: ?>
                <p class="card-text">User data not found.</p>
            <?php endif; ?>
            <a href="<?= base_url('logout') ?>" class="btn btn-danger">Logout</a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
