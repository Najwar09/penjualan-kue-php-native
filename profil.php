<?php
// memanggil file header.php
include 'header.php';

// memanggil file koneksi.php
include 'koneksi.php';
$login = $_SESSION['user']['id_login'];
$query = "SELECT * FROM login WHERE id_login='$login'";
$hasil = mysqli_query($connection, $query);
$isi = mysqli_fetch_assoc($hasil);
?>

<form method="post" action="proses.php?id=update_user">
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
    <input type="hidden" name="id_login" value="<?= $isi['id_login']; ?>">
    <button type="submit" class="btn btn-primary float-right">Kirim</button>
</form>

<?php include 'footer.php'; ?>