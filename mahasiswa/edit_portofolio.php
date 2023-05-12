<?php
include "../koneksi.php";

$id = $_GET['id'];

if (isset($_FILES['tautan_skj']['tmp_name'])) {
    $ukuran = $_FILES['tautan_skj']['size'];
    // 1. skj
    $file_tmp = $_FILES['tautan_skj']['tmp_name'];
    $skj = $_FILES['skj']['name'];
    if ($ukuran < 104407000000) {
        $dirUpload = "../mahasiswa/berkas_portofolio/";
        $link_skj = $dirUpload . $tautan_skj;
        $terupload = move_uploaded_file($file_tmp1, $link_skj);
        if ($terupload) {
            $query  = mysqli_query($koneksi, "UPDATE asesmen SET tautan_skj = '$linkskj' WHERE id_pendaftaran = $id");
            if ($query) {
                echo '<script type="text/javascript">
                alert("FILE BERHASIL DI UPLOAD!");
                window.location = "../pages/asesmen_simpan.php";
             </script>';
            } else {
                echo 'Gagal';
            }
        } else {
            echo "FILE GAGAL DI UPLOAD!";
        }
    } else {
        echo "UKURAN FILE TERLALU BESAR!";
    }
} else if (isset($_FILES['sksehat']['tmp_name'])) {
    $ukuran = $_FILES['sksehat']['size'];
    // 2. sksehat
    $file_tmp2 = $_FILES['sksehat']['tmp_name'];
    $sksehat = $_FILES['sksehat']['name'];
    if ($ukuran < 104407000000) {
        $dirUpload = "../file_asesmen/";
        $linksksehat = $dirUpload . $sksehat;
        $terupload2 = move_uploaded_file($file_tmp2, $linksksehat);
        if ($terupload2) {
            $query  = mysqli_query($koneksi, "UPDATE asesmen SET tautan_sksehat = '$linksksehat' WHERE id_pendaftaran = $id");
            if ($query) {
                echo '<script type="text/javascript">
                alert("FILE BERHASIL DI UPLOAD!");
                window.location = "../pages/asesmen_simpan.php";
             </script>';
            } else {
                echo 'Gagal';
            }
        } else {
            echo "FILE GAGAL DI UPLOAD!";
        }
    } else {
        echo "UKURAN FILE TERLALU BESAR!";
    }
} else if (isset($_FILES['suratorangtua']['tmp_name'])) {
    $ukuran = $_FILES['suratorangtua']['size'];
    // 3. suratorangtua
    $file_tmp3 = $_FILES['suratorangtua']['tmp_name'];
    $suratorangtua = $_FILES['suratorangtua']['name'];
    if ($ukuran < 104407000000) {
        $dirUpload = "../file_asesmen/";
        $linksuratorangtua = $dirUpload . $suratorangtua;
        $terupload3 = move_uploaded_file($file_tmp3, $linksuratorangtua);
        if ($terupload3) {
            $query  = mysqli_query($koneksi, "UPDATE asesmen SET tautan_suratortu = '$linksuratorangtua' WHERE id_pendaftaran = $id");
            if ($query) {
                echo '<script type="text/javascript">
            alert("FILE BERHASIL DI UPLOAD!");
            window.location = "../pages/asesmen_simpan.php";
         </script>';
            } else {
                echo 'Gagal';
            }
        } else {
            echo "FILE GAGAL DI UPLOAD!";
        }
    } else {
        echo "UKURAN FILE TERLALU BESAR!";
    }
} else if (isset($_FILES['suratpakta']['tmp_name'])) {
    $ukuran = $_FILES['suratpakta']['size'];
    // 4. suratpakta
    $file_tmp4 = $_FILES['suratpakta']['tmp_name'];
    $suratpakta = $_FILES['suratpakta']['name'];
    if ($ukuran < 104407000000) {
        $dirUpload = "../file_asesmen/";
        $linksuratpakta = $dirUpload . $suratpakta;
        $terupload4 = move_uploaded_file($file_tmp4, $linksuratpakta);
        if ($terupload4) {
            $query  = mysqli_query($koneksi, "UPDATE asesmen SET tautan_suratpakta = '$linksuratpakta' WHERE id_pendaftaran = $id");
            if ($query) {
                echo '<script type="text/javascript">
            alert("FILE BERHASIL DI UPLOAD!");
            window.location = "../pages/asesmen_simpan.php";
         </script>';
            } else {
                echo 'Gagal';
            }
        } else {
            echo "FILE GAGAL DI UPLOAD!";
        }
    } else {
        echo "UKURAN FILE TERLALU BESAR!";
    }
} else if (isset($_FILES['transkipnilai']['tmp_name'])) {
    $ukuran = $_FILES['transkipnilai']['size'];
    // 5. transkipnilai
    $file_tmp5    = $_FILES['transkipnilai']['tmp_name'];
    $transkipnilai    = $_FILES['transkipnilai']['name'];
    if ($ukuran < 104407000000) {
        $dirUpload = "../file_asesmen/";
        $linktranskipnilai = $dirUpload . $transkipnilai;
        $terupload5 = move_uploaded_file($file_tmp5, $linktranskipnilai);
        if ($terupload5) {
            $query  = mysqli_query($koneksi, "UPDATE asesmen SET tautan_transkip = '$linktranskipnilai' WHERE id_pendaftaran = $id");
            if ($query) {
                echo '<script type="text/javascript">
            alert("FILE BERHASIL DI UPLOAD!");
            window.location = "../pages/asesmen_simpan.php";
         </script>';
            } else {
                echo 'Gagal';
            }
        } else {
            echo "FILE GAGAL DI UPLOAD!";
        }
    } else {
        echo "UKURAN FILE TERLALU BESAR!";
    }
} else if (isset($_FILES['cv']['tmp_name'])) {
    $ukuran = $_FILES['cv']['size'];
    // 6. cv
    $file_tmp6    = $_FILES['cv']['tmp_name'];
    $cv    = $_FILES['cv']['name'];
    if ($ukuran < 104407000000) {
        $dirUpload = "../file_asesmen/";
        $linkcv = $dirUpload . $cv;
        $terupload6 = move_uploaded_file($file_tmp6, $linkcv);
        // var_dump($dirUpload);
        if ($terupload6) {
            $query  = mysqli_query($koneksi, "UPDATE asesmen SET tautan_cv = '$linkcv' WHERE id_pendaftaran = $id");
            if ($query) {
                echo '<script type="text/javascript">
            alert("FILE BERHASIL DI UPLOAD!");
            window.location = "../pages/asesmen_simpan.php";
         </script>';
            } else {
                echo 'Gagal';
            }
        } else {
            echo "FILE GAGAL DI UPLOAD!";
        }
    } else {
        echo "UKURAN FILE TERLALU BESAR!";
    }
} else if (isset($_FILES['pelatihan']['tmp_name'])) {
    $ukuran = $_FILES['pelatihan']['size'];
    // 7. pelatihan
    $file_tmp7    = $_FILES['pelatihan']['tmp_name'];
    $pelatihan    = $_FILES['pelatihan']['name'];
    if ($ukuran < 104407000000) {
        $dirUpload = "../file_asesmen/";
        $linkpelatihan = $dirUpload . $pelatihan;
        $terupload7 = move_uploaded_file($file_tmp7, $linkpelatihan);
        if ($terupload7) {
            $query  = mysqli_query($koneksi, "UPDATE asesmen SET tautan_pelatihan = '$pelatihan' WHERE id_pendaftaran = $id");
            if ($query) {
                echo '<script type="text/javascript">
            alert("FILE BERHASIL DI UPLOAD!");
            window.location = "../pages/asesmen_simpan.php";
         </script>';
            } else {
                echo 'Gagal';
            }
        } else {
            echo "FILE GAGAL DI UPLOAD!";
        }
    } else {
        echo "UKURAN FILE TERLALU BESAR!";
    }
} else if (isset($_FILES['produk']['tmp_name'])) {
    $ukuran = $_FILES['produk']['size'];
    // 8. produk
    $file_tmp8    = $_FILES['produk']['tmp_name'];
    $produk    = $_FILES['produk']['name'];
    if ($ukuran < 104407000000) {
        $dirUpload = "../file_asesmen/";
        $linkproduk = $dirUpload . $produk;
        $terupload8 = move_uploaded_file($file_tmp8, $linkproduk);
        if ($terupload8) {
            $query  = mysqli_query($koneksi, "UPDATE asesmen SET tautan_produk = '$produk' WHERE id_pendaftaran = $id");
            if ($query) {
                echo '<script type="text/javascript">
            alert("FILE BERHASIL DI UPLOAD!");
            window.location = "../pages/asesmen_simpan.php";
         </script>';
            } else {
                echo 'Gagal';
            }
        } else {
            echo "FILE GAGAL DI UPLOAD!";
        }
    } else {
        echo "UKURAN FILE TERLALU BESAR!";
    }
} else if (isset($_FILES['dokumen']['tmp_name'])) {
    $ukuran = $_FILES['dokumen']['size'];
    // 9. dokumen
    $file_tmp9    = $_FILES['dokumen']['tmp_name'];
    $dokumen    = $_FILES['dokumen']['name'];
    if ($ukuran < 104407000000) {
        $dirUpload = "../file_asesmen/";
        $linkdokumen = $dirUpload . $dokumen;
        $terupload9 = move_uploaded_file($file_tmp9, $linkdokumen);
        if ($terupload9) {
            $query  = mysqli_query($koneksi, "UPDATE asesmen SET tautan_dokumen = '$dokumen' WHERE id_pendaftaran = $id");
            if ($query) {
                echo '<script type="text/javascript">
            alert("FILE BERHASIL DI UPLOAD!");
            window.location = "../pages/asesmen_simpan.php";
         </script>';
            } else {
                echo 'Gagal';
            }
        } else {
            echo "FILE GAGAL DI UPLOAD!";
        }
    } else {
        echo "UKURAN FILE TERLALU BESAR!";
    }

    //end
}
