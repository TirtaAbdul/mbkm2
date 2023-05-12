<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';

switch ($page) {
  case 'dashboard': // $page == home (jika isi dari $page adalah home)
    include "../reviewer/dashboard.php"; // load file home.php yang ada di folder views
    break;
  case 'data_pendaftar': // $page == home (jika isi dari $page adalah home)
    include "../reviewer/data_pendaftar.php"; // load file home.php yang ada di folder views
    break;
  case 'detail_pendaftar':
    include "../reviewer/detail_pendaftar.php";
    break;
  case 'hasil_asesmen':
    include "../reviewer/hasil_asesmen.php";
    break;
  case 'detail_hasil_asesmen':
    include "../reviewer/detail_hasil_asesmen.php";
    break;
  case 'penentuan_dospem':
    include "../reviewer/penentuan_dospem.php";
    break;
  case 'penetapan_dospem':
    include "../reviewer/penetapan_dospem.php";
    break;





    // case 'case_selanjutnya':
    // include "views/case_selanjutnya.php";
    // break;

    // case 'case_selanjutnya':
    // include "views/case_selanjutnya.php";
    // break;

    // default: // Ini untuk set default jika isi dari $page tidak ada pada 3 kondisi diatas
    // include "views/dashboard_jur.php";
}
