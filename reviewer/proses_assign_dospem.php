<?php

include "../koneksi.php";

// $id_formulir = $_GET['id_formulir'];
$id_formulir = $_POST['id_formulir'];

// $id_pendaftaran = $_POST['id_pendaftaran'];
$id_dospem = $_POST['id_dospem'];



// $query = "UPDATE INTO nilai_asesmen  VALUES
//     (DEFAULT, '$id_asesmen', '$formulir', '$skj', '$sksehat', '$suratortu' , '$suratpakta', '$transkip',
//      '$cv', '$pelatihan', '$produk', '$catatan')";
// $result = mysqli_query($conn, $query);
// if ($query) {
//     $querystatus = "UPDATE formulir SET status = 'Disetujui' WHERE id_formulir = $id_formulir";
//     $resultstatus = mysqli_query($conn, $querystatus);
//     if ($querystatus) {
$querydospem = "INSERT INTO assign_dospem VALUES(DEFAULT, '$id_formulir', '$id_dospem', '')";
$resultdospem = mysqli_query($conn, $querydospem);
if ($querydospem) {
    echo '<script type="text/javascript">
   alert("DATA BERHASIL DIUPLOAD!");
   window.location = "../reviewer/template.php?page=penentuan_dospem";
</script>';
} else {
    echo "Gagal Upload";
}
