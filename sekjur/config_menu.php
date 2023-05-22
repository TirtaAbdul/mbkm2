<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';

switch ($page) {
  case 'dashboard':
    include "../sekjur/dashboard.php";
    break;
  case 'setuju':
    include "../sekjur/setuju.php";
    break;
  case 'tolak':
    include "../sekjur/tolak.php";
    break;
  case 'data_ajuan_setuju':
    include "../sekjur/data_ajuan_setuju.php";
    break;
  case 'data_ajuan_tolak':
    include "../sekjur/data_ajuan_tolak.php";
    break;
  case 'peserta_kegiatan':
    include "../sekjur/peserta_kegiatan.php";
    break;
  case 'detail_kegiatan':
    include "../sekjur/detail_kegiatan.php";
    break;
  case 'ajuan_view':
    include "../sekjur/ajuan_view.php";
    break;
  case 'hasil_asesmen':
    include "../sekjur/hasil_asesmen.php";
    break;
  case 'logbook':
    include "../sekjur/logbook.php";
    break;
  case 'laporan_akhir':
    include "../sekjur/laporan_akhir.php";
    break;
  case 'umpan_balik_view':
    include "../sekjur/umpan_balik_view.php";
    break;
  case 'nilai_view':
    include "../sekjur/nilai_view.php";
    break;
}
