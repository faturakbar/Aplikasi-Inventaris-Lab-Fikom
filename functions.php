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
    $jumlah_barang= htmlspecialchars($data['jumlah_barang']);
    $satuan= htmlspecialchars($data['satuan']);
	 
	// Variabel Data pemutihan sementara di set 0
	$baik=0;
	$rusak = 0;
	$putihkan = 0;
	$jumlah = 0;

	 

    // query insert data barang
    $query = "INSERT INTO barang Values 
                ('$kode_barang','$jenis_barang','$sumber',
                 '$nama_barang','$tgl_pengadaan','$jumlah_barang',
                 '$satuan')";
	mysqli_query($conn,$query);
	
	// query insert data pemutihan
	$query3 = "INSERT INTO pemutihan Values 
	('$kode_barang','$baik','$rusak',
	 '$putihkan','$jumlah')";
   	mysqli_query($conn,$query3);

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
     $jumlah_barang = htmlspecialchars($data['jumlah_barang']);
     $satuan= htmlspecialchars($data['satuan']);
 
	 // query ubah data 
     $query = "UPDATE barang SET 
             kode_jenis='$jenis_barang',
             kode_sumber='$sumber',
             nama_barang= '$nama_barang', 
             tgl_pengadaan = '$tgl_pengadaan',
             jumlah_barang ='$jumlah_barang',
             satuan ='$satuan'
             WHERE kode_barang = '$kode_barang'
             ";
	 			
	 mysqli_query($conn,$query);
	 return mysqli_affected_rows($conn);
}

// Function Detail Barang

function tambah_detail ($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form 
    $no_seri = htmlspecialchars($data['no_seri']);
    $nama_barang= htmlspecialchars($data['nama_barang']);
    $ruangan= htmlspecialchars($data['ruangan']);
    $keterangan= htmlspecialchars($data['keterangan']);
	$kondisi= htmlspecialchars($data['kondisi']);
	 
 
	//jika keterangan kosong 
	if ($keterangan=="") {
		$keterangan ="Tidak Ada Keterangan";
	} 

    // upload gambar
	 $gambar = upload_detail();

	//check apakah noseri sudah ada atau belum ?
	$check_noseri= tampil_data("SELECT no_seri FROM detail_barang WHERE no_seri = '$no_seri'");
 
		foreach ($check_noseri as $seri ) {
			if ($seri['no_seri']==$no_seri) {
				echo "<script> alert ('No Seri Sudah Ada');
				</script>";
				return false;
		}
			}
		
	


		// Check batas maksimum input data
		$check = tampil_data("SELECT count(kode_barang) as num  FROM detail_barang 
							WHERE kode_barang = '$nama_barang'");
		$tes = tampil_data("SELECT jumlah_barang   FROM barang 
							WHERE kode_barang = '$nama_barang'");

		foreach ($check as $cek ) {	
			foreach ($tes as $tes) {		 
				$akhir = $tes['jumlah_barang'];		
				if ( $cek['num']>= $akhir ) {
					echo "<script> alert ('Data Yang Anda Inputkan lebih dari Jumlah Barang');
					</script>";
					return false;
				}
				else {			
			$query1 = "INSERT INTO detail_barang Values 
			('$no_seri','$nama_barang','$ruangan',
			'$keterangan','$kondisi','$gambar')";	
			mysqli_query($conn,$query1);
				}
			}
		}	
		// check apakah kode barang sudah ada di pemutihan atau belum 
			$baik = $kondisi;
			$rusak = $kondisi;
			$putihkan=$kondisi;	

			$result = mysqli_query($conn, "SELECT * from pemutihan WHERE kode_barang = '$nama_barang' ");
			$row = mysqli_fetch_assoc($result);	 
			if ($kondisi=="BAIK") {
				$baik =  $row['baik']+ 1;
				$rusak =  $row['rusak'];
				$putihkan = $row['putihkan'];	
			} 
			else if ($kondisi=="RUSAK") {
				$baik = $row['baik'];	
				$rusak =  $row['rusak']+ 1;	
				$putihkan = $row['putihkan'];	
			} else {
				$baik = $row['baik'];	
				$rusak =$row['rusak'];	
				$putihkan = $row['putihkan']+1;
			}

			$jumlah = $baik + $rusak + $putihkan; 

			$query2 = "UPDATE  pemutihan SET  			
			baik ='$baik',
			rusak = '$rusak',
			putihkan = '$putihkan',
			jumlah = '$jumlah'
			WHERE kode_barang = '$nama_barang'
			";
			
	if ($nama_barang == $row['kode_barang']) {
	
		mysqli_query($conn,$query2);

	} else {
		return false;
	}	
    return mysqli_affected_rows($conn);
}


function upload_detail () {

	$namaFile = $_FILES['gambar'] ['name'];
	$ukuranFile = $_FILES['gambar'] ['size'];
	$errorFile = $_FILES['gambar'] ['error'];	
	$tmpFile = $_FILES['gambar'] ['tmp_name'];

		//cek apakah file yang diuopload adalah gambar
		$ekstensiGambarValid = ['jpg', 'jpeg','png',];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		if (!in_array($ekstensiGambar,$ekstensiGambarValid)) {
		 
			return false;
		}

		// cek jika ukurannya terlalu besar 
		if ($ukuranFile >  1000000) {
			 echo "<script> alert ('Ukuran Gambar Terlalu Besar!!!');
				  </script>";
			 	return false;
		}

		//lolos pengecekan gambar siap di upload 

		//generate nama file baru
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar;
		move_uploaded_file($tmpFile, 'img/'.$namaFileBaru);

		return $namaFileBaru;

}

function hapus_detail ($no_seri) {
	global $conn;

	$check = tampil_data("SELECT kode_barang, kondisi  FROM detail_barang 
					  WHERE no_seri = '$no_seri'")[0];

	$kondisii = $check['kondisi'];
	$nama_barang = $check ['kode_barang'];

 
	$baik = $kondisii;
	$rusak = $kondisii;
	$putihkan=$kondisii;
 
	$result = mysqli_query($conn, "SELECT * from pemutihan WHERE kode_barang = '$nama_barang' ");
	$row = mysqli_fetch_assoc($result);	 

	// Check kondisi awal yang  untuk dikurangi nilainya
	if ($kondisii=="BAIK") {
		$baik =  $row['baik']-1;
		$rusak =  $row['rusak']+0;
		$putihkan =  $row['putihkan']+0;	
	}
    else if ($kondisii=="RUSAK") {	
		$baik =  $row['baik']+0;
		$rusak =  $row['rusak']- 1;	
		$putihkan =  $row['putihkan']+0;	
	} else {
		$baik =  $row['baik']+0;
		$rusak =  $row['rusak']+0;
		$putihkan = $row['putihkan']-1;
	}
		
	$jumlah = floatval($baik) + floatval($rusak) + floatval($putihkan);

	$query2 = "UPDATE  pemutihan SET  			
	baik ='$baik',
	rusak = '$rusak',
	putihkan = '$putihkan',
	jumlah = '$jumlah'
	WHERE kode_barang = '$nama_barang'
	";
	
	mysqli_query($conn,$query2);

	mysqli_query($conn, "DELETE FROM detail_barang WHERE no_seri= '$no_seri'");
	return mysqli_affected_rows($conn);
}

function ubah_detail ($data) {
	global $conn;
	 // ambil data dari tiap elemen dalam form 
     $no_seri = htmlspecialchars($data['no_seri']);
     $nama_barang= htmlspecialchars($data['nama_barang']);
     $ruangan= htmlspecialchars($data['ruangan']);
     $keterangan= htmlspecialchars($data['keterangan']);
     $kondisi= htmlspecialchars($data['kondisi']); 
	 $gambarlama =htmlspecialchars($data['gambarlama']);
	 $kondisii = $data['kondisii'];
	 
	 
	 // cek apakah user pilih gambar baru atau tidak 
	 if ($_FILES['gambar']['error'] === 4 ) {
	 	$gambar =$gambarlama;
	 } else {
	 	$gambar = upload_detail();
	 }


	 // query ubah data 
	 $query1 = "UPDATE  detail_barang SET 	 			
	 			kode_barang = '$nama_barang',
	 			kode_ruangan ='$ruangan',
	 			keterangan = '$keterangan',
	 			kondisi = '$kondisi',
                gambar = '$gambar'
	 			WHERE no_seri = '$no_seri'
	 			";
	mysqli_query($conn,$query1);

	 // check apakah kode barang sudah ada di pemutihan atau belum 
	$baik = $kondisi;
	$rusak = $kondisi;
	$putihkan=$kondisi;	

	$result = mysqli_query($conn, "SELECT * from pemutihan WHERE kode_barang = '$nama_barang' ");
	$row = mysqli_fetch_assoc($result);	 

	// Check kondisi awal yang  untuk dikurangi nilainya
	if ($kondisii=="BAIK") {
		$baik =  $row['baik']-1;	
	}
    else if ($kondisii=="RUSAK") {		
		$rusak =  $row['rusak']- 1;	
			
	} else {
		
		$putihkan = $row['putihkan']-1;
	}

	 // Check kondisi yang dirubah untuk ditambah nilainya
	if ($kondisi=="BAIK") {
		$baik =  $row['baik']+ 1;	
	} 
	else if ($kondisi=="RUSAK") {		
		$rusak =  $row['rusak']+ 1;	
			
	} else {		
		$putihkan = $row['putihkan']+1;
	}
	
 	$jumlah = floatval($baik) + floatval($rusak) + floatval($putihkan);

	$query2 = "UPDATE  pemutihan SET  			
	baik ='$baik',
	rusak = '$rusak',
	putihkan = '$putihkan',
	jumlah = '$jumlah'
	WHERE kode_barang = '$nama_barang'
	";
	
	mysqli_query($conn,$query2);

	return mysqli_affected_rows($conn);

} 

function cari_detail ($keyword) {	
	$query ="SELECT * FROM detail_barang WHERE 
			 kode_barang LIKE '%$keyword%' OR			    
			 " ;  		 
			 return tampil_data ($query);
}



// Function Mutasi 

function tambah_mutasi ($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form 
    $kode_mutasi = htmlspecialchars($data['kode_mutasi']);
    $no_seri= htmlspecialchars($data['no_seri']);
    $ruangan_awal= htmlspecialchars($data['ruangan_awal']);
	$ruangan_tujuan= htmlspecialchars($data['ruangan_tujuan']);
	$tgl_mutasi= htmlspecialchars($data['tgl_mutasi']);

	// Query ubah data ruangan pada detail data barang
	$query1 = "UPDATE  detail_barang SET 	
	kode_ruangan ='$ruangan_tujuan'
	WHERE no_seri = '$no_seri'
	";

	// check apakah ruangan awal sama seperti ruangan tujuan 
	if ($ruangan_awal == $ruangan_tujuan) {
		echo "<script> alert ('Ruangan Awal Dan Ruangan Tujuan Tidak Boleh Sama');
		</script>";
	   return false;
	}
	// query insert data 
    $query2 = "INSERT INTO   mutasi Values 
                ('$kode_mutasi','$no_seri','$ruangan_awal',
				 '$ruangan_tujuan','$tgl_mutasi')";

	
				 
	mysqli_query($conn,$query1);
	mysqli_query($conn,$query2);
    return mysqli_affected_rows($conn);
}

function hapus_mutasi ($kode_mutasi) {
	global $conn;
	mysqli_query($conn, "DELETE FROM mutasi WHERE kode_mutasi= '$kode_mutasi'");
	return mysqli_affected_rows($conn);
}