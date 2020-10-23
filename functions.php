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

function tgl_indo($tanggal){
    $bulan = array (
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}



// Function Jenis Barang

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


// Function Sumber Barang

function tambah_sumber ($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form 
    $kode_sumber = $data['kode_sumber'];  
    $sumber= htmlspecialchars($data['sumber']);   
    // query insert data 
    $query = "INSERT INTO sumber Values 
                ('$kode_sumber','$sumber')";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}


function id_sumber($query) {
        global $conn;
        $result = mysqli_query($conn,$query);
        $data = mysqli_fetch_assoc($result);
        return $data;

}


function hapus_sumber ($kode_sumber) {
	global $conn;
	mysqli_query($conn, "DELETE FROM sumber WHERE kode_sumber= '$kode_sumber'");
	return mysqli_affected_rows($conn);
}

function ubah_sumber ($data) {
	global $conn;
	 // ambil data dari tiap elemen dalam form 
	 $kode_sumber = $data['kode_sumber'];
	 $sumber= htmlspecialchars($data['sumber']);

	 // query ubah data 
	 $query = "UPDATE  sumber SET 
	 			sumber = '$sumber' 
	 			WHERE kode_sumber = '$kode_sumber'
	 			";
	 			
	 mysqli_query($conn,$query);
	 return mysqli_affected_rows($conn);

}


// Function Ruangan

function tambah_ruangan ($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form 
    $kode_ruangan = $data['kode_ruangan'];  
    $ruangan= htmlspecialchars($data['ruangan']);   
    // query insert data 
    $query = "INSERT INTO ruangan Values 
                ('$kode_ruangan','$ruangan')";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function id_ruangan($query) {
    global $conn;
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);
    return $data;

}
function hapus_ruangan ($kode_ruangan) {
	global $conn;
	mysqli_query($conn, "DELETE FROM ruangan WHERE kode_ruangan= '$kode_ruangan'");
	return mysqli_affected_rows($conn);
}

function ubah_ruangan ($data) {
	global $conn;
	 // ambil data dari tiap elemen dalam form 
	 $kode_ruangan = $data['kode_ruangan'];
	 $ruangan= htmlspecialchars($data['ruangan']);

	 // query ubah data 
	 $query = "UPDATE  ruangan SET 
	 			ruangan = '$ruangan' 
	 			WHERE kode_ruangan = '$kode_ruangan'
	 			";
	 			
	 mysqli_query($conn,$query);
	 return mysqli_affected_rows($conn);
}

// Function Barang

function tambah_barang ($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form 
    $kode_barang = $data['kode_barang'];  
    $jenis_barang= htmlspecialchars($data['jenis_barang']);
    $sumber= htmlspecialchars($data['sumber']);
    $nama_barang= htmlspecialchars($data['nama_barang']);
    $tgl_pengadaan= htmlspecialchars($data['tgl_pengadaan']);
    $jumlah= htmlspecialchars($data['jumlah']);
    $satuan= htmlspecialchars($data['satuan']);
     

    // query insert data 
    $query = "INSERT INTO barang Values 
                ('$kode_barang','$jenis_barang','$sumber',
                 '$nama_barang','$tgl_pengadaan','$jumlah',
                 '$satuan')";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function hapus_barang ($kode_barang) {
	global $conn;
	mysqli_query($conn, "DELETE FROM barang WHERE kode_barang= '$kode_barang'");
	return mysqli_affected_rows($conn);
}

function ubah_barang ($data) {
	global $conn;
	 // ambil data dari tiap elemen dalam form 
     $kode_barang = $data['kode_barang'];  
     $jenis_barang= htmlspecialchars($data['jenis_barang']);
     $sumber= htmlspecialchars($data['sumber']);
     $nama_barang= htmlspecialchars($data['nama_barang']);
     $tgl_pengadaan= htmlspecialchars($data['tgl_pengadaan']);
     $jumlah= htmlspecialchars($data['jumlah']);
     $satuan= htmlspecialchars($data['satuan']);
 
	 // query ubah data 
     $query = "UPDATE barang SET 
             kode_jenis='$jenis_barang',
             kode_sumber='$sumber',
             nama_barang= '$nama_barang', 
             tgl_pengadaan = '$tgl_pengadaan',
             jumlah ='$jumlah',
             satuan ='$satuan'
             WHERE kode_barang = '$kode_barang'
             ";
	 			
	 mysqli_query($conn,$query);
	 return mysqli_affected_rows($conn);
}
