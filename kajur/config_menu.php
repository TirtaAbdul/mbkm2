<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';

switch ($page) {
  case 'dashboard':
    include "../kajur/dashboard.php";
    break;
  case 'setuju':
    include "../kajur/setuju.php";
    break;
  case 'tolak':
    include "../kajur/tolak.php";
    break;
  case 'data_ajuan_setuju':
    include "../kajur/data_ajuan_setuju.php";
    break;
  case 'data_ajuan_tolak':
    include "../kajur/data_ajuan_tolak.php";
    break;
  case 'peserta_kegiatan':
    include "../kajur/peserta_kegiatan.php";
    break;
  case 'detail_kegiatan':
    include "../kajur/detail_kegiatan.php";
    break;
  case 'ajuan_view':
    include "../kajur/ajuan_view.php";
    break;
  case 'hasil_asesmen':
    include "../kajur/hasil_asesmen.php";
    break;
  case 'logbook':
    include "../kajur/logbook.php";
    break;
  case 'laporan_akhir':
    include "../kajur/laporan_akhir.php";
    break;
  case 'umpan_balik_view':
    include "../kajur/umpan_balik_view.php";
    break;
  case 'nilai_view':
    include "../kajur/nilai_view.php";
    break;
}
