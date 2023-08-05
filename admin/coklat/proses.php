<?php
include '../../koneksi.php';

// proses menambahkan coklat dari admin
if ($_GET['id'] == 'tambah') {
    $dir = '../../images/';
    $tmp_name = $_FILES['gambar']['tmp_name'];
    $temp = explode(".", $_FILES["gambar"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $target_path = $dir . basename($newfilename);
    $allowedImageType = array("image/gif",   "image/JPG",   "image/jpeg",   "image/pjpeg", "image/png",   "image/x-png");

    if ($_FILES['gambar']["error"] > 0) {
        echo '<script>alert("Error file");history.go(-1)</script>';
        exit();
    } elseif (round($_FILES['gambar']["size"] / 1024) > 4096) {
        echo '<script>alert("WARNING !!! Besar Gambar Tidak Boleh Lebih Dari 4 MB !");history.go(-1)</script>';
        exit();
    } else {
        if (move_uploaded_file($tmp_name, $target_path)) {

            $nama_coklat = $_POST['nama_coklat'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];
            $deskripsi = $_POST['deskripsi'];
            $status = $_POST['status'];
            $gambar = $newfilename;

            $query = "INSERT INTO coklat VALUES('','$nama_coklat','$harga','$stok','$deskripsi','$status','$gambar')";
            mysqli_query($connection, $query);

            echo '<script>alert("Data berhasil di tambahkan!");window.location="coklat.php";</script>';
        }
    }
}




// proses edit coklat dari admin
if ($_GET['id'] == 'edit') {
    $dir = '../../images/';
    $tmp_name = $_FILES['gambar']['tmp_name'];
    $temp = explode(".", $_FILES["gambar"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $target_path = $dir . basename($newfilename);
    $allowedImageType = array("image/gif",   "image/JPG",   "image/jpeg",   "image/pjpeg",   "image/png",   "image/x-png");

    $gambar = $_POST['gambar_lama'];

    $id_coklat = $_POST['id_coklat'];

    $nama_coklat = $_POST['nama_coklat'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];
    $status = $_POST['status'];

    if ($_FILES['gambar']["size"] > 0) {
        if ($_FILES['gambar']["error"] > 0) {
            echo '<script>alert("Error file");history.go(-1)</script>';
            exit();
        } elseif (!in_array($_FILES['gambar']["type"], $allowedImageType)) {
            echo '<script>alert("You can only upload JPG, PNG and GIF file");history.go(-1)</script>';
            exit();
        } elseif (round($_FILES['gambar']["size"] / 1024) > 4096) {
            echo '<script>alert("WARNING !!! Besar Gambar Tidak Boleh Lebih Dari 4 MB !");history.go(-1)</script>';
            exit();
        } else {
            if (move_uploaded_file($tmp_name, $target_path)) {
                if (file_exists('../../images/' . $gambar)) {
                    unlink('../../images/' . $gambar);
                }
                $gambar = $newfilename;
            } else {
                echo '<script>alert("Error file");history.go(-1)</script>';
                exit();
            }
        }
    } else {
        $gambar = $_POST['gambar_lama'];
    }

    
    $query = "UPDATE coklat SET nama_coklat= '$nama_coklat', harga='$harga', stok='$stok', deskripsi='$deskripsi', status='$status', gambar='$gambar' WHERE id_coklat = '$id_coklat'";
    mysqli_query($connection,$query);
    echo '<script>alert("sukses");window.location="coklat.php"</script>';

}

// proses hapus data coklat
if ($_GET['aksi'] == 'hapus') {
    $id_coklat = $_GET['id'];
    $gambar = $_GET['gambar'];

    unlink('../../images/' . $gambar);

    $query = "DELETE FROM coklat WHERE id_coklat='$id_coklat'";
    mysqli_query($connection, $query);

    echo '<script>alert("Data berhasil di hapus!");window.location="coklat.php";</script>';
}
