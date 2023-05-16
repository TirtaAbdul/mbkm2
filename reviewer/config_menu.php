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
  case 'tolak':
    include "../reviewer/tolak.php";
    break;
  case 'data_ajuan':
    include "../reviewer/data_ajuan.php";
    break;
  case 'peserta_kegiatan':
    include "../reviewer/peserta_kegiatan.php";
    break;
  case 'detail_kegiatan':
    include "../reviewer/detail_kegiatan.php";
    break;
  case 'ajuan_view':
    include "../reviewer/ajuan_view.php";
    break;
  case 'hasil_asesmen':
    include "../reviewer/hasil_asesmen.php";
    break;
  case 'umpan_balik_view':
    include "../reviewer/umpan_balik_view.php";
    break;
}
