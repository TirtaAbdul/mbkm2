<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';

switch ($page) {
  case 'dashboard':
    include "../mahasiswa/dashboard.php";
    break;
  case 'detail_ajuan':
    include "../mahasiswa/detail_ajuan.php";
    break;
  case 'form_pendaftaran':
    include "../mahasiswa/form_pendaftaran.php";
    break;
  case 'berkas_portofolio':
    include "../mahasiswa/berkas_portofolio.php";
    break;
  case 'kegiatan':
    include "../mahasiswa/kegiatan.php";
    break;
  case 'detail_kegiatan':
    include "../mahasiswa/detail_kegiatan.php";
    break;
  case 'logbook':
    include "../mahasiswa/logbook.php";
    break;
  case 'laporan_akhir':
    include "../mahasiswa/laporan_akhir.php";
    break;
  case 'umpan_balik':
    include "../mahasiswa/umpan_balik.php";
    break;
  case 'umpan_balik_view':
    include "../mahasiswa/umpan_balik_view.php";
    break;
}
