<?php

include "../config/koneksii.php";

$id = @$_POST[ 'id'];
$nama_barang = @$_POST[ `nama_barang`];
$jumlah_barang = @$_POST[ `jumlah_barang`];

$data = [];

$query = mysqli_query($kon, "UPDATE `barang` SET 
`nama_barang`='". $nama_barang ."',
`jumlah_barang`='". $jumlah_barang ."'
WHERE `id`='". $id ."'");

if($query){
    $status = true;
    $pesan = "request seccess";
    $data[] = $query;
}else{
    $status = false;
    $pesan = "request failed";

}

$json = [
    "status" => $status,
    "pesan" => $pesan,
    "data" => $data
];

header("Content-Type: application/json");
echo json_encode($json);

?>