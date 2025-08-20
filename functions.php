<?php

require 'db.php';

/**
 * @param string $query 
 * @return array 
 */
function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

/**

 * @param array $data 
 * @return int 
 */
function tambah($data)
{
    global $koneksi;

    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    $query = "INSERT INTO mahasiswa (nama, nim, jurusan) 
              VALUES 
              ('$nama', '$nim', '$jurusan')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


?>