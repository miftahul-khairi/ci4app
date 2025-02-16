<!DOCTYPE html>
<html>

<head>
    <title>Add User</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Add User</h2>
        </div>
        <div class="card-body">
            <form id="addUserForm" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="photo">Photo:<span class="required-star">*</span></label>
                    <input type="file" class="form-control" id="photo" name="photo" required>
                </div>
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap:<span class="required-star">*</span></label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                </div>
                <div class="form-group">
                    <label for="gelar_depan">Gelar Depan:<span class="required-star">*</span></label>
                    <input type="text" class="form-control" id="gelar_depan" name="gelar_depan" required>
                </div>
                <div class="form-group">
                    <label for="gelar_belakang">Gelar Belakang:<span class="required-star">*</span></label>
                    <input type="text" class="form-control" id="gelar_belakang" name="gelar_belakang" required>
                </div>
                <div class="form-group">
                    <label for="nip">NIP:</label>
                    <input type="text" class="form-control" id="nip" name="nip">
                </div>
                <div class="form-group">
                    <label for="nik">NIK:<span class="required-star">*</span></label>
                    <input type="text" class="form-control" id="nik" name="nik" required>
                </div>
                <div class="form-group">
                    <label for="male">Laki-laki<span class="required-star">*</span></label>
                    <input type="radio" id="male" name="jenis_kelamin" value="Laki-laki" required>
                    <label for="female">Female<span class="required-star">*</span></label>
                    <input type="radio" id="female" name="jenis_kelamin" value="Perempuan" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" class="form-control" id="alamat" name="alamat">
                </div>
                <div class="form-group">
                    <label for="email">Email:<span class="required-star">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:<span class="required-star">*</span></label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="level">Level:<span class="required-star">*</span></label>
                    <select class="form-control" id="level" name="level" required>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add User</button>
                <button type="button" class="btn btn-secondary"
                        onclick="window.location.href='<?= base_url('admin/profile') ?>'">Batal
                </button>
            </form>
            <div id="message"></div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#addUserForm').on('submit', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            // Log the form data for debugging
            // console.log('Form Data:', formData.get('jenis_kelamin')); 
            $.ajax({
                url: '<?= base_url('admin/add_user') ?>',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (response) {
                    console.log(response); // Log the response for debugging
                    if (response.status === 'success') {
                        window.location.href = response.redirect; // Redirect to the profile page
                    } else if (response.errors) {
                        $('#message').html('<div class="alert alert-danger">' + Object.values(response.errors).join('<br>') + '</div>');
                    } else {
                        $('#message').html('<div class="alert alert-danger">An error occurred while processing your request.</div>');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX Error: ' + status + ' ' + error);
                    console.log(xhr.responseText); // Log the response text for debugging
                    $('#message').html('<div class="alert alert-danger">An error occurred while processing your request.</div>');
                }
            });
        });
    });
</script>
</body>

</html>
