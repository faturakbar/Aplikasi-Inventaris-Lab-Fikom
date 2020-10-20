<?php 
// koneksi ke database
$conn = mysqli_connect("localhost","root","","db_inventaris");

function tampil_data ($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows =[];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] =$row;
	}

	return $rows;
}

function tambah ($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form 
    $kode_jenis = $data['kode_jenis'];  
    $jenis_barang = htmlspecialchars($data['jenis_barang']);   
    // query insert data 
    $query = "INSERT INTO jenis_barang Values 
                ('$kode_jenis','$jenis_barang')";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}


function id ($query) {
        global $conn;
        $result = mysqli_query($conn,$query);
        $data = mysqli_fetch_assoc($result);
        return $data;

}

function hapus ($kode_jenis) {
	global $conn;
	mysqli_query($conn, "DELETE FROM jenis_barang WHERE kode_jenis= '$kode_jenis'");
	return mysqli_affected_rows($conn);
}

function ubah ($data) {
	global $conn;
	 // ambil data dari tiap elemen dalam form 
	 $kode_jenis = $data['kode_jenis'];
	 $jenis_barang= htmlspecialchars($data['jenis_barang']);

	 // query ubah data 
	 $query = "UPDATE  jenis_barang SET 
	 			jenis_barang= '$jenis_barang' 
	 			WHERE kode_jenis = '$kode_jenis'
	 			";
	 			
	 mysqli_query($conn,$query);
	 return mysqli_affected_rows($conn);

}
