<?php
require 'koneksi.php';
$input = file_get_contents('php://input');
$data = json_decode($input, true);
//terima data dari mobile
$id = trim($data['id']);
$nama = trim($data['nama']);
$deskripsi = trim($data['deskripsi']);
http_response_code(201);
if ($nama != '' and $deskripsi != '') {
    $query = mysqli_query($koneksi, "update barang set nama='$nama',deskripsi='$deskripsi' where 
id='$id'");
    $pesan = true;
} else {
    $pesan = false;
}
echo json_encode($pesan);
echo mysqli_error($koneksi);
