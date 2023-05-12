<?php

include "../koneksi.php";

// var_dump($_FILES);
if ($_POST['uploadportofolio']) {
    $formulir               = $_POST['id_formulir'];
    $ekstensi_diperbolehkan = array('pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png');
    $skj                    = $_FILES['tautan_skj']['name'];
    $sksehat                = $_FILES['tautan_sksehat']['name'];
    $suratortu              = $_FILES['tautan_suratortu']['name'];
    $suratpakta             = $_FILES['tautan_suratpakta']['name'];
    $transkipnilai          = $_FILES['tautan_transkipnilai']['name'];
    $cv                     = $_FILES['tautan_cv']['name'];
    $pelatihan              = $_FILES['tautan_pelatihan']['name'];
    $produk                 = $_FILES['tautan_produk']['name'];
    $dokumen_lain           = $_FILES['tautan_dokumen_lain']['name'];
    // $x        = explode('.', $_FILES['tautan_produk']['name']);
    $ekstensi     = "pdf";
    // strtolower(end($x));
    $ukuran       = $_FILES['tautan_skj']['size'];
    $file_tmp1    = $_FILES['tautan_skj']['tmp_name'];
    $file_tmp2    = $_FILES['tautan_sksehat']['tmp_name'];
    $file_tmp3    = $_FILES['tautan_suratortu']['tmp_name'];
    $file_tmp4    = $_FILES['tautan_suratpakta']['tmp_name'];
    $file_tmp5    = $_FILES['tautan_transkipnilai']['tmp_name'];
    $file_tmp6    = $_FILES['tautan_cv']['tmp_name'];
    $file_tmp7    = $_FILES['tautan_pelatihan']['tmp_name'];
    $file_tmp8    = $_FILES['tautan_produk']['tmp_name'];
    $file_tmp9    = $_FILES['tautan_dokumen_lain']['tmp_name'];

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 104407000000) {
            // Lokasi Penempatan file
            $dirUpload          = "../mahasiswa/berkas_portofolio/";
            $link_skj           = $dirUpload . $skj;
            $link_sksehat       = $dirUpload . $sksehat;
            $link_suratortu     = $dirUpload . $suratortu;
            $link_suratpakta    = $dirUpload . $suratpakta;
            $link_transkipnilai = $dirUpload . $transkipnilai;
            $link_cv            = $dirUpload . $cv;
            $link_pelatihan     = $dirUpload . $pelatihan;
            $link_produk        = $dirUpload . $produk;
            $link_dokumen_lain  = $dirUpload . $dokumen_lain;
            // Menyimpan file
            $terupload1 = move_uploaded_file($file_tmp1, $link_skj);
            $terupload2 = move_uploaded_file($file_tmp2, $link_sksehat);
            $terupload3 = move_uploaded_file($file_tmp3, $link_suratortu);
            $terupload4 = move_uploaded_file($file_tmp4, $link_suratpakta);
            $terupload5 = move_uploaded_file($file_tmp5, $link_transkipnilai);
            $terupload6 = move_uploaded_file($file_tmp6, $link_cv);
            $terupload7 = move_uploaded_file($file_tmp7, $link_pelatihan);
            $terupload8 = move_uploaded_file($file_tmp8, $link_produk);
            $terupload9 = move_uploaded_file($file_tmp9, $link_dokumen_lain);
            if ($terupload1) {
                $query    = "UPDATE formulir SET jenis_dokumen='$ekstensi', 
                tautan_skj='$link_skj', tautan_sksehat='$link_sksehat', 
                tautan_suratortu='$link_suratortu', tautan_suratpakta='$link_suratpakta', 
                tautan_transkipnilai='$link_transkipnilai', tautan_cv='$link_cv', 
                tautan_pelatihan='$link_pelatihan', tautan_produk='$link_produk', 
                tautan_dokumen_lain='$link_dokumen_lain'
                WHERE id_formulir ='$formulir'";
                $result = mysqli_query($conn, $query);
                if ($query) {
                    echo '<script type="text/javascript">
                    alert("FILE BERHASIL DI UPDATE!");
                    window.location = "../mahasiswa/template.php?page=berkas_portofolio&&id_formulir=' . $formulir . '";
                 </script>';
                } else {
                    echo "FILE GAGAL DI UPLOAD!";
                }
            } else {
                echo "UKURAN FILE TERLALU BESAR!";
            }
        }
    } else {
        echo "EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!";
    }
}
