<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';

switch ($page) {
  case 'dashboard':
    include "../tu/dashboard.php";
    break;
  case 'setuju':
    include "../tu/setuju.php";
    break;
  case 'tolak':
    include "../tu/tolak.php";
    break;
  case 'data_ajuan_setuju':
    include "../tu/data_ajuan_setuju.php";
    break;
  case 'data_ajuan_tolak':
    include "../tu/data_ajuan_tolak.php";
    break;
  case 'peserta_kegiatan':
    include "../tu/peserta_kegiatan.php";
    break;
  case 'detail_kegiatan':
    include "../tu/detail_kegiatan.php";
    break;
  case 'ajuan_view':
    include "../tu/ajuan_view.php";
    break;
  case 'hasil_asesmen':
    include "../tu/hasil_asesmen.php";
    break;
  case 'logbook':
    include "../tu/logbook.php";
    break;
  case 'laporan_akhir':
    include "../tu/laporan_akhir.php";
    break;
  case 'umpan_balik_view':
    include "../tu/umpan_balik_view.php";
    break;
  case 'nilai_view':
    include "../tu/nilai_view.php";
    break;
}
