<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';

switch ($page) {
  case 'dashboard':
    include "../kps/dashboard.php";
    break;
  case 'setuju':
    include "../kps/setuju.php";
    break;
  case 'tolak':
    include "../kps/tolak.php";
    break;
  case 'data_ajuan_setuju':
    include "../kps/data_ajuan_setuju.php";
    break;
  case 'data_ajuan_tolak':
    include "../kps/data_ajuan_tolak.php";
    break;
  case 'peserta_kegiatan':
    include "../kps/peserta_kegiatan.php";
    break;
  case 'detail_kegiatan':
    include "../kps/detail_kegiatan.php";
    break;
  case 'ajuan_view':
    include "../kps/ajuan_view.php";
    break;
  case 'hasil_asesmen':
    include "../kps/hasil_asesmen.php";
    break;
  case 'logbook':
    include "../kps/logbook.php";
    break;
  case 'laporan_akhir':
    include "../kps/laporan_akhir.php";
    break;
  case 'umpan_balik_view':
    include "../kps/umpan_balik_view.php";
    break;
  case 'nilai_view':
    include "../kps/nilai_view.php";
    break;
}
