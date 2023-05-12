<?php

include "../koneksi.php";

$id_formulir = $_GET['id_formulir'];

if ($_POST['upload']) {
    // $id_pendaftaran = $_POST['id_pendaftaran'];
    $id_asesmen = $_POST['id_asesmen'];
    $formulir = $_POST['formulir'];
    $skj = $_POST['skj'];
    $sksehat = $_POST['sksehat'];
    $suratortu = $_POST['suratortu'];
    $suratpakta = $_POST['suratpakta'];
    $transkip = $_POST['transkip'];
    $cv = $_POST['cv'];
    $pelatihan = $_POST['pelatihan'];
    $produk = $_POST['produk'];
    $catatan = $_POST['catatan'];



    $query = "INSERT INTO nilai_asesmen  VALUES
    (DEFAULT, '$id_asesmen', '$formulir', '$skj', '$sksehat', '$suratortu' , '$suratpakta', '$transkip',
     '$cv', '$pelatihan', '$produk', '$catatan')";
    $result = mysqli_query($conn, $query);
    if ($query) {
        $querystatus = "UPDATE formulir SET status = 'Disetujui' WHERE id_formulir = $id_formulir";
        $resultstatus = mysqli_query($conn, $querystatus);
        // if ($querystatus) {
        //     $querydospem = "INSERT INTO assign_dospem ('id_') VALUES (DEFAULT, '$id_fomulir', '', '')";
        //     $resultdospem = mysqli_query($conn, $querydospem);
        //     if ($querydospem) {
        echo '<script type="text/javascript">
   alert("DATA BERHASIL DIUPLOAD!");
   window.location = "../reviewer/template.php?page=detail_hasil_asesmen&&id_asesmen=' . $id_asesmen . '";
</script>';
        // }
        // }
    } else {
        echo "Gagal Upload";
    }
} else if ($_POST['tolak']) {
    // $id_pendaftaran = $_POST['id_pendaftaran'];
    $id_asesmen = $_POST['id_asesmen'];
    $formulir = $_POST['formulir'];
    $skj = $_POST['skj'];
    $sksehat = $_POST['sksehat'];
    $suratortu = $_POST['suratortu'];
    $suratpakta = $_POST['suratpakta'];
    $transkip = $_POST['transkip'];
    $cv = $_POST['cv'];
    $pelatihan = $_POST['pelatihan'];
    $produk = $_POST['produk'];
    $catatan = $_POST['catatan'];



    $query = "INSERT INTO nilai_asesmen  VALUES
    (DEFAULT, '$id_asesmen', '$formulir', '$skj', '$sksehat', '$suratortu' , '$suratpakta', '$transkip',
     '$cv', '$pelatihan', '$produk', '$catatan')";
    $result = mysqli_query($conn, $query);
    if ($query) {
        $querystatus = "UPDATE formulir SET status = 'Ditolak' WHERE id_formulir = $id_formulir";
        $resultstatus = mysqli_query($conn, $querystatus);
        if ($querystatus) {
            echo '<script type="text/javascript">
   alert("UPDATED: DATA BERHASIL DITOLAK!");
   window.location = "../reviewer/template.php?page=detail_hasil_asesmen&&id_asesmen=' . $id_asesmen . '";
</script>';
        }
    } else {
        echo "Gagal Upload";
    }
}
