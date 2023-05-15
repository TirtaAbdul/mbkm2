<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';

switch ($page) {
  case 'dashboard':
    include "../dospem/dashboard.php";
    break;
  case 'bimbing':
    include "../dospem/bimbing.php";
    break;
  case 'detail_kegiatan':
    include "../dospem/detail_kegiatan.php";
    break;
  case 'logbook':
    include "../dospem/logbook.php";
    break;
  case 'laporan_akhir':
    include "../dospem/laporan_akhir.php";
    break;
  case 'umpan_balik':
    include "../dospem/umpan_balik.php";
    break;
  case 'umpan_balik_view':
    include "../dospem/umpan_balik_view.php";
    break;
}
