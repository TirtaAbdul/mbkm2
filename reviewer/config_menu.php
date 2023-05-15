<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';

switch ($page) {
  case 'dashboard':
    include "../reviewer/dashboard.php";
    break;
  case 'pendaftar':
    include "../reviewer/pendaftar.php";
    break;
  case 'detail_ajuan':
    include "../reviewer/detail_ajuan.php";
    break;
  case 'data_ajuan':
    include "../reviewer/data_ajuan.php";
    break;
  case 'tolak':
    include "../reviewer/tolak.php";
    break;
  case 'assign_dospem':
    include "../reviewer/assign_dospem.php";
    break;
    // case 'ajuan_view':
    //   include "../reviewer/ajuan_view.php";
    //   break;
    // case 'kegiatan':
    //   include "../reviewer/kegiatan.php";
    //   break;
  case 'detail_kegiatan':
    include "../reviewer/detail_kegiatan.php";
    break;
  case 'logbook':
    include "../reviewer/logbook.php";
    break;
  case 'laporan_akhir':
    include "../reviewer/laporan_akhir.php";
    break;
  case 'umpan_balik':
    include "../reviewer/umpan_balik.php";
    break;
  case 'umpan_balik_view':
    include "../reviewer/umpan_balik_view.php";
    break;
}
