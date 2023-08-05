<?php
include 'header.php';
include '../koneksi.php';
$id_login = $_SESSION['user']['id_login'];

?>
<h1>Update Username / Password</h1>
<form method="post" action="proses_profil.php">
    <table class="table">
        <tr>
            <td>
                <div class="form-group">
                    <label for="">Username Baru</label>
                    <input type="text" name="username_baru" required class="form-control" placeholder="Username Baru">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group">
                    <label for="">Password Baru</label>
                    <input type="password" name="pass_baru" required class="form-control" placeholder="Password baru">
                </div>
            </td>
        </tr>
    </table>
    <input type="hidden" name="id_login" value="<?= $id_login ?>">
    <button type="submit" class="btn btn-primary float-right">Kirim</button>
    <a href="index.php" class="btn btn-danger">Kembali</a>
</form>

<?php include 'footer.php'; ?>