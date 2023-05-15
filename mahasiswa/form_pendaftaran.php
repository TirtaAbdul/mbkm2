<?php
$id_formulir = $_GET['id_formulir'];

if (isset($_POST['tambahanggota'])) {
  $id_formulir = $_POST['id_formulir'];
  $nim_anggota = ($_POST['nim_anggota']);

  $queryadd1 = "INSERT INTO `anggota` (`id_anggota`, `id_formulir`, `nim_anggota`) VALUES (NULL, '$id_formulir', '$nim_anggota')";
  $resultadd1 = mysqli_query($conn, $queryadd1);
  if (!$resultadd1) {
    echo "Pengajuan gagal, silahkan ulangi..";
  }
}

if (isset($_GET['hapusanggota'])) {
  $id_anggota = $_GET['hapusanggota'];

  $querydelete1 = "DELETE FROM anggota WHERE id_anggota='$id_anggota'";
  $resultdelete1 = mysqli_query($conn, $querydelete1);
  echo "<meta http-equiv=refresh content=2;URL='?page=form_pendaftaran&&id_formulir=$id_formulir ?>'>";
  if (!$resultdelete1) {
    echo "Penghapusan gagal, silahkan ulangi..";
  }
}

if (isset($_POST['tambahmatkul'])) {
  $id_formulir = $_POST['id_formulir'];
  $kode_matkul = ($_POST['kode_matkul']);

  $queryadd2 = "INSERT INTO `matkul_tujuan` (`id_matkul_tujuan`, `id_formulir`, `kode_matkul`) VALUES (NULL, '$id_formulir', '$kode_matkul')";
  $resultadd2 = mysqli_query($conn, $queryadd2);
  if (!$resultadd2) {
    echo "Pengajuan gagal, silahkan ulangi..";
  }
}

if (isset($_GET['hapusmatkul'])) {
  $id_matkul_tujuan = $_GET['hapusmatkul'];

  $querydelete2 = "DELETE FROM matkul_tujuan WHERE id_matkul_tujuan='$id_matkul_tujuan'";
  $resultdelete2 = mysqli_query($conn, $querydelete2);
  echo "<meta http-equiv=refresh content=2;URL='?page=form_pendaftaran&&id_formulir=$id_formulir ?>'>";
  if (!$resultdelete2) {
    echo "Penghapusan gagal, silahkan ulangi..";
  }
}

if (isset($_POST['updateformulir'])) {
  $id_formulir = $_POST['id_formulir'];
  $prodi_asal = $_POST['prodi_asal'];
  $jenis_program = $_POST['jenis_program'];
  $alasan = $_POST['alasan'];
  $judul_program = $_POST['judul_program'];
  $nama_mitra = $_POST['nama_mitra'];
  $tgl_mulai = $_POST['tgl_mulai'];
  $tgl_selesai = $_POST['tgl_selesai'];
  $rincian_kegiatan = $_POST['rincian_kegiatan'];
  $sumber_pendanaan = $_POST['sumber_pendanaan'];
  $jenis_pertukaran_pelajar = $_POST['jenis_pertukaran_pelajar'];
  $prodi_tujuan = $_POST['prodi_tujuan'];
  $status = '';

  $query0 = "UPDATE formulir SET 
  prodi_asal = '$prodi_asal', 
  alasan = '$alasan', 
  judul_program = '$judul_program', 
  nama_mitra = '$nama_mitra', 
  tgl_mulai = '$tgl_mulai', 
  tgl_selesai = '$tgl_selesai', 
  rincian_kegiatan = '$rincian_kegiatan', 
  sumber_pendanaan = '$sumber_pendanaan', 
  jenis_pertukaran_pelajar = '$jenis_pertukaran_pelajar', 
  prodi_tujuan = '$prodi_tujuan', 
  status = '$status'
  WHERE id_formulir = '$id_formulir'";

  $result0 = mysqli_query($conn, $query0);

  if (!$result0) {
    echo "Penghapusan gagal, silahkan ulangi..";
  }
}
?>

<main class="content">

  <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
      <li class="breadcrumb-item">
        <a href="#">
        </a>
      </li>
    </ol>
  </nav>

  <form name="input" action="" method="POST" accept-charset="utf-8">
    <div class="row mx-8">
      <div class="col-12 col-xl-12">
        <div class="card card-body border-0 shadow mb-4">
          <h2 class="h10 mt-3 mb-5 text-center"><b>Formulir Pendaftaran</b></h2>
          <div class="row mx-3">
            <div class="card card-body shadow">
              <div id="employee_table">
                <?php
                $queryall = "SELECT * FROM formulir where id_formulir='$id_formulir'";
                $resultall = mysqli_query($conn, $queryall);

                if (mysqli_num_rows($resultall) > 0) {
                  $i = 1;
                  while ($rowall = mysqli_fetch_assoc($resultall)) {
                ?>

                    <input type="text" name="id_formulir" class="form-control" value="<?= $id_formulir ?>" id="id_formulir" required hidden>

                    <div class="mb-3">
                      <label for="nim" class="form-label">Nomor Induk Mahasiswa</label>
                      <input type="text" name="nim" class="form-control" value="<?= $nim ?>" id="nim" placeholder="Masukkan NIK Anda" required readonly>
                    </div>

                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama Lengkap</label>
                      <input type="text" name="nama" class="form-control" value="<?= $nama ?>" id="nama" placeholder="Masukkan Nama Anda" required readonly>
                    </div>

                    <div class="mb-3">
                      <label for="prodi_asal" class="form-label">Program Studi Asal</label>
                      <select name="prodi_asal" class="form-control" value="<?= $rowall['prodi_asal'] ?>" id="prodi_asal" required>
                        <option class="text-center" value="">-- Pilih Prodi Asal Anda --</option>
                        <?php
                        // SELECT DISTINC utk supaya tidak tertampil duplikasi pada data yang sama
                        $queryprodiasal = "SELECT DISTINCT prodi FROM matkul_prodi";
                        $resultprodiasal = mysqli_query($conn, $queryprodiasal);

                        if (mysqli_num_rows($resultprodiasal) > 0) {
                          $i = 1;
                          while ($rowprodiasal = mysqli_fetch_assoc($resultprodiasal)) {
                        ?>
                            <option value="<?= $rowprodiasal['prodi']; ?>" <?php if ($rowall['prodi_asal'] == $rowprodiasal['prodi']) echo 'Selected'; ?>><?= $rowprodiasal['prodi']; ?></option>
                        <?php
                          }
                        }
                        ?>
                      </select>
                    </div>

                    <div class="mb-3">
                      <label for="jenis_program" class="form-label">Jenis Program Merdeka Belajar</label>
                      <input name="jenis_program" value="<?= $rowall['jenis_program'] ?>" class="form-control" id="jenis_program" type="text" required readonly>
                    </div>

                    <div class="mb-3">
                      <label for="alasan" class="form-label">Alasan Memilih Program</label>
                      <textarea class="form-control" value="<?= $rowall['alasan']  ?>" name="alasan" id="alasan" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                      <label for="judul_program" class="form-label">Judul Program / Kegiatan</label>
                      <input name="judul_program" value="<?= $rowall['judul_program'] ?>" class="form-control" id="judul_program" type="text" required>
                    </div>

                    <div class="mb-3">
                      <label for="nama_mitra" class="form-label">Nama Lengkap Mitra (Jika ada)</label>
                      <input name="nama_mitra" value="<?= $rowall['nama_mitra'] ?>" class="form-control" id="nama_mitra" type="text">
                    </div>

                    <div class="mb-3">
                      <label for="tgl_mulai" class="form-label">tgl Mulai</label>
                      <input name="tgl_mulai" value="<?= $rowall['tgl_mulai'] ?>" class="form-control" id="tgl_mulai" type="date" required>
                    </div>

                    <div class="mb-3">
                      <label for="tgl_selesai" class="form-label">tgl Selesai</label>
                      <input name="tgl_selesai" value="<?= $rowall['tgl_selesai'] ?>" class="form-control" id="tgl_selesai" type="date" required>
                    </div>

                    <div class="mb-3">
                      <label for="rincian_kegiatan" class="form-label">Rincian Kegiatan Program</label>
                      <textarea class="form-control" value="<?= $rowall['rincian_kegiatan'] ?>" name="rincian_kegiatan" id="rincian_kegiatan" rows="3" required></textarea>
                    </div>
              </div>
            </div>
          </div>

          <div class="row mx-3 mt-4">
            <div class="card card-body shadow">
              <h3 class="modal-header mb-3">Untuk Program Membangun Desa / Kuliah Kerja Nyata Tematik</h3>
              <div id="employee_table">
                <div class="mb-3">
                  <label for="sumber_pendanaan" class="form-label">Sumber Pendanaan</label>
                  <input name="sumber_pendanaan" value="<?= $rowall['sumber_pendanaan'] ?>" class="form-control" id="sumber_pendanaan" type="text" />
                </div>

                <div class="mb-3">
                  <label for="exampleDataList" class="form-label">Daftar Anggota</label>
                  <!-- Button Modal Tambah Anggota -->
                  <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#ModalTambahAnggota"><b>+ Tambah</b></button>
                  <!-- Tabel Anggota -->
                  <div id="table-employee" class="table-responsive">
                    <table id="example1" class="table table-primary" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NIM</th>
                          <th>Nama Anggota</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $noanggota = 1;
                        $query = "SELECT anggota.id_anggota, anggota.nim_anggota, user.nim_nik, user.nama
                        FROM anggota
                        LEFT JOIN user
                        ON anggota.nim_anggota=user.nim_nik where anggota.id_formulir=$id_formulir";
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                          while ($data = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                              <td><?= $noanggota++; ?></td>
                              <td><?php echo $data['nim_nik']; ?></td>
                              <td><?php echo $data['nama']; ?></td>
                              <td>
                                <a href="?page=form_pendaftaran&&id_formulir=<?= $id_formulir ?>&&hapusanggota=<?= $data['id_anggota'] ?>" onclick="return confirm('Yakin ingin menghapus Anggota?')">
                                  <input type="button" class="btn btn-danger btn-sm" value="Hapus">
                                </a>
                              </td>
                            </tr>
                        <?php }
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mx-3 mt-4">
            <div class="card card-body shadow">
              <h3 class="modal-header mb-3">Untuk Program Pertukaran Pelajar</h3>
              <div id="employee_table">
                <div class="mb-3">
                  <label name="jenis_pertukaran_pelajar" id="jenis_pertukaran_pelajar">Jenis Pertukaran Pelajar</label>
                  <select name="jenis_pertukaran_pelajar" class="form-control" value="<?= $rowall['jenis_pertukaran_pelajar'] ?>">
                    <option value="" class="text-center">-- Pilih Jenis Pertukaran Pelajar -- </option>
                    <option value="Antar Prodi di Politeknik Negeri Batam" <?php if ($rowall['jenis_pertukaran_pelajar'] == 'Antar Prodi di Politeknik Negeri Batam') echo 'Selected'; ?>>Antar Prodi di Politeknik Negeri Batam</option>
                    <option value="Antar Prodi Pada Perguruan Tinggi Berbeda" <?php if ($rowall['jenis_pertukaran_pelajar'] == 'Antar Prodi Pada Perguruan Tinggi Berbeda') echo 'Selected'; ?>>Antar Prodi Pada Perguruan Tinggi Berbeda</option>
                    <option value="Prodi Sama Pada Perguruan Tinggi Berbeda" <?php if ($rowall['jenis_pertukaran_pelajar'] == 'Prodi Sama Pada Perguruan Tinggi Berbeda') echo 'Selected'; ?>>Prodi Sama Pada Perguruan Tinggi Berbeda</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="prodi_tujuan" class="form-label">Program Studi Tujuan</label>
                  <select name="prodi_tujuan" class="form-control" value="<?= $rowall['prodi_tujuan'] ?>" id="prodi_tujuan" required>
                    <option class="text-center" value="">-- Pilih Prodi Tujuan Anda --</option>
                    <?php
                    // SELECT DISTINC utk supaya tidak tertampil duplikasi pada data yang sama
                    $queryproditujuan = "SELECT DISTINCT prodi FROM matkul_prodi";
                    $resultproditujuan = mysqli_query($conn, $queryproditujuan);

                    if (mysqli_num_rows($resultproditujuan) > 0) {
                      $i = 1;
                      while ($rowproditujuan = mysqli_fetch_assoc($resultproditujuan)) {
                    ?>
                        <option value="<?= $rowproditujuan['prodi']; ?>" <?php if ($rowall['prodi_tujuan'] == $rowproditujuan['prodi']) echo 'Selected'; ?>><?= $rowproditujuan['prodi']; ?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="exampleDataList" class="form-label">Daftar Mata Kuliah Tujuan</label>
                  <!-- Button Modal Matkul Tujuan-->
                  <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#ModalTambahMatkul"><b>+ Tambah</b></button>
                  <!-- Tabel Matkul Tujuan -->
                  <div id="table-employee" class="table-responsive">
                    <table id="example2" class="table table-primary" style=" width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Kode</th>
                          <th>Mata Kuliah</th>
                          <th>SKS</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $nomatkul = 1;
                        $query = "SELECT matkul_tujuan.id_matkul_tujuan, matkul_tujuan.kode_matkul, matkul_prodi.kode_matkul, matkul_prodi.nama_matkul, matkul_prodi.sks
                        FROM matkul_tujuan
                        LEFT JOIN matkul_prodi
                        ON matkul_tujuan.kode_matkul=matkul_prodi.kode_matkul where matkul_tujuan.id_formulir=$id_formulir";
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                          while ($data = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                              <td><?= $nomatkul++; ?></td>
                              <td><?php echo $data['kode_matkul']; ?></td>
                              <td><?php echo $data['nama_matkul']; ?></td>
                              <td><?php echo $data['sks']; ?></td>
                              <td>
                                <a href="?page=form_pendaftaran&&id_formulir=<?= $id_formulir ?>&&hapusmatkul=<?= $data['id_matkul_tujuan'] ?>" onclick="return confirm('Yakin ingin menghapus Mata Kuliah?')">
                                  <input type="button" class="btn btn-danger btn-sm" value="Hapus">
                                </a>
                              </td>
                            </tr>
                        <?php }
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>

            <?php }
                } ?>
              </div>

            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="modal-footer mt-3">
                <a href="../mahasiswa/template.php?page=detail_ajuan&&id_formulir=<?= $id_formulir; ?>"><input type="button" value="Kembali" class="btn btn-secondary"></input></a>
                <input type="submit" name="updateformulir" value="Simpan" class="btn btn-primary" onclick="return confirm('Yakin ingin menyimpan Formulir?')"></input>
              </div>
            </div>
          </div>
        </div>
  </form>
  </div>
  </div>

  <!-- Modal Tambah Anggota -->
  <div class="modal fade" id="ModalTambahAnggota" tabindex="-1" aria-labelledby="ModalTambahAnggotaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="ModalTambahAnggotaLabel">Form Tambah Anggota</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" autocomplete="off" method="POST" accept-charset="utf-8">

            <input name="id_formulir" value="<?= $id_formulir ?>" class="form-control" id="id_formulir" type="text" required hidden>

            <div class="mb-3">
              <label for="nim_anggota" class="form-label">NIM Anggota</label>
              <input name="nim_anggota" class="form-control mb-3" list="datalistOptions" id="exampleDataList" placeholder="Ketikkan NIM / Nama Anggota">
              <datalist id="datalistOptions">
                <?php
                $queryanggota = "SELECT nim_nik, nama FROM user WHERE role='Mahasiswa'";
                $resultanggota = mysqli_query($conn, $queryanggota);

                if (mysqli_num_rows($resultanggota) > 0) {
                  $i = 1;
                  while ($rowanggota = mysqli_fetch_assoc($resultanggota)) {
                ?>
                    <option value="<?= $rowanggota['nim_nik']; ?>"><?= $rowanggota['nama'] ?></option>
                <?php
                  }
                }
                ?>
              </datalist>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
          <button type="submit" name="tambahanggota" class="btn btn-info">Tambah Anggota</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Tambah Matkul -->
  <div class="modal fade" id="ModalTambahMatkul" tabindex="-1" aria-labelledby="ModalTambahMatkulLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="ModalTambahMatkulLabel">Form Tambah Matkul</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" autocomplete="off" method="POST" accept-charset="utf-8">

            <input name="id_formulir" value="<?= $id_formulir ?>" class="form-control" id="id_formulir" type="text" required hidden>

            <label name="kode_matkul" class="form-label">Mata Kuliah Tujuan</label>
            <select name="kode_matkul" class="form-control mb-3">
              <option selected value="" class="text-center">KODE -- MATKUL [SKS]</option>
              <?php
              $querymatkul = "SELECT kode_matkul, nama_matkul, sks FROM matkul_prodi WHERE prodi='Teknik Informatika'";
              $resultmatkul = mysqli_query($conn, $querymatkul);

              if (mysqli_num_rows($resultmatkul) > 0) {
                $i = 1;
                while ($rowmatkul = mysqli_fetch_assoc($resultmatkul)) {
              ?>
                  <option value="<?= $rowmatkul['kode_matkul']; ?>"> <?= $rowmatkul['kode_matkul'] ?> -- <?= $rowmatkul['nama_matkul'] ?> [<?= $rowmatkul['sks'] ?> SKS]</option>
              <?php
                }
              }
              ?>
            </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
          <button type="submit" name="tambahmatkul" class="btn btn-success">Tambah Matkul</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#example1').DataTable({
        lengthChange: false,
        searching: false,
        // ordering: false,
        info: false,
        bPaginate: false,
        responsive: true
      });
      $('#example2').DataTable({
        lengthChange: false,
        searching: false,
        // ordering: false,
        info: false,
        bPaginate: false,
        responsive: true
      });
    });
  </script>