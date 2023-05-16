<?php
$id_formulir = $_GET['id_formulir'];
$_SESSION['id_formulir'] = $id_formulir;

if (isset($_POST['setuju2'])) {
    $id_formulir = $_POST['id_formulir'];
    $catatan_tambahan = $_POST['catatan_tambahan'];
    $nik_dospem = $_POST['nik_dospem'];

    $querysetuju2 = "UPDATE review_asesmen 
    SET catatan_tambahan = '$catatan_tambahan' 
    WHERE id_formulir = $id_formulir";
    $querydospem = "INSERT INTO assign_dospem (`id_formulir`, `nik_dospem`, `status`) 
    VALUES('$id_formulir', '$nik_dospem', '')";

    $resultsetuju2 = mysqli_query($conn, $querysetuju2);
    $resultdospem = mysqli_query($conn, $querydospem);

    if ($resultsetuju2 && $resultdospem) {
        $querystatus2 = "UPDATE formulir SET status = 'Peserta Kegiatan' WHERE id_formulir = $id_formulir";
        $resultstatus2 = mysqli_query($conn, $querystatus2);
        echo '<script type="text/javascript">
        alert("UPDATED: AJUAN BERHASIL DISETUJUI!");
        window.location = "?page=peserta_kegiatan";
        </script>';
    } else {
        echo '<script type="text/javascript">
        alert("Gagal Menyetujui Ajuan, silahkan ulangi...");
        </script>';
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

                                    <input type="text" name="id_formulir" class="form-control" value="<?= $id_formulir ?>" id="id_formulir" hidden disabled>

                                    <div class="mb-3">
                                        <label for="nim" class="form-label">Nomor Induk Mahasiswa</label>
                                        <input type="text" name="nim" class="form-control" value="<?= $rowall['nim'] ?>" id="nim" disabled>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Lengkap</label>
                                        <input type="text" name="nama" class="form-control" value="<?= $nama ?>" id="nama" disabled>
                                    </div>

                                    <div class="mb-3">
                                        <label for="prodi_asal" class="form-label">Program Studi Asal</label>
                                        <input type="text" name="prodi_asal" class="form-control" value="<?= $rowall['prodi_asal'] ?>" id="prodi_asal" disabled>
                                    </div>


                                    <div class="mb-3">
                                        <label for="jenis_program" class="form-label">Jenis Program Merdeka Belajar</label>
                                        <input type="text" name="jenis_program" class="form-control" value="<?= $rowall['jenis_program'] ?>" id="jenis_program" disabled>
                                    </div>

                                    <div class="mb-3">
                                        <label for="alasan" class="form-label">Alasan Memilih Program</label>
                                        <input type="text" name="alasan" class="form-control" value="<?= $rowall['alasan'] ?>" id="alasan" disabled>
                                    </div>

                                    <div class="mb-3">
                                        <label for="judul_program" class="form-label">Judul Program / Kegiatan</label>
                                        <input type="text" name="judul_program" class="form-control" value="<?= $rowall['judul_program'] ?>" id="judul_program" disabled>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama_mitra" class="form-label">Nama Lengkap Mitra (Jika ada)</label>
                                        <input type="text" name="nama_mitra" class="form-control" value="<?= $rowall['nama_mitra'] ?>" id="nama_mitra" disabled>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tgl_mulai" class="form-label">tgl Mulai</label>
                                        <input type="text" name="tgl_mulai" class="form-control" value="<?= $rowall['tgl_mulai'] ?>" id="tgl_mulai" disabled>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tgl_selesai" class="form-label">tgl Selesai</label>
                                        <input type="text" name="tgl_selasai" class="form-control" value="<?= $rowall['tgl_selesai'] ?>" id="tgl_selasai" disabled>
                                    </div>

                                    <div class="mb-3">
                                        <label for="rincian_kegiatan" class="form-label">Rincian Kegiatan Program</label>
                                        <input type="text" name="rincian_kegiatan" class="form-control" value="<?= $rowall['rincian_kegiatan'] ?>" id="rincian_kegiatan" disabled>
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
                                <input type="text" name="sumber_pendanaan" class="form-control" value="<?= $rowall['sumber_pendanaan'] ?>" id="sumber_pendanaan" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="exampleDataList" class="form-label">Daftar Anggota</label>
                                <!-- Tabel Anggota -->
                                <table id="example1" class="table table-primary" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama Anggota</th>
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
                                                    <td><?= $noanggota++; ?></t']d>
                                                    <td><?php echo $data['nim_nik']; ?></td>
                                                    <td><?php echo $data['nama']; ?></td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
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
                                <input type="text" name="jenis_pertukaran_pelajar" class="form-control" value="<?= $rowall['jenis_pertukaran_pelajar'] ?>" id="jenis_pertukaran_pelajar" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="prodi_tujuan" class="form-label">Program Studi Tujuan</label>
                                <input type="text" name="prodi_tujuan" class="form-control" value="<?= $rowall['prodi_tujuan'] ?>" id="prodi_tujuan" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="exampleDataList" class="form-label">Daftar Mata Kuliah Tujuan</label>
                                <!-- Tabel Matkul Tujuan -->
                                <table id="example2" class="table table-primary" style=" width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Mata Kuliah</th>
                                            <th>SKS</th>
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
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>

                    <?php }
                            } ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Asesmen Portofolio -->
    <div class="row mx-8">
        <div class="col-12 col-xl-12">
            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h10 mt-3 mb-5 text-center"><b>Berkas Portofolio</b></h2>
                <div class="row mx-3">
                    <div class="card card-body shadow">
                        <div id="employee_table">
                            <?php
                            $search = '../mahasiswa/berkas_portofolio/';

                            $queryportofolio = "SELECT * FROM formulir WHERE id_formulir=$id_formulir";
                            $resultportofolio = mysqli_query($conn, $queryportofolio);

                            if (mysqli_num_rows($resultportofolio) > 0) {

                                while ($dataportofolio = mysqli_fetch_assoc($resultportofolio)) {
                            ?>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Dokumen</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Surat Rekomendasi Perguruan Tinggi / Jurusan Asal</td>
                                                <td>
                                                    <div class="col-md-6">
                                                        <label for="file"></label>
                                                        <?php if (isset($dataportofolio['tautan_skj']) && str_replace($search, '', $dataportofolio['tautan_skj']) != '') { ?>
                                                            <a href="../mahasiswa/berkas_portofolio/<?php echo str_replace($search, '', $dataportofolio['tautan_skj']); ?>" class="btn btn-info btn-sm">Lihat</a>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Surat Keterangan Sehat</td>
                                                <td>
                                                    <div class="col-md-6">
                                                        <label for="file"></label>
                                                        <?php if (isset($dataportofolio['tautan_sksehat']) && str_replace($search, '', $dataportofolio['tautan_sksehat']) != '') { ?>
                                                            <a href="../mahasiswa/berkas_portofolio/<?php echo str_replace($search, '', $dataportofolio['tautan_sksehat']); ?>" class="btn btn-info btn-sm">Lihat</a>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Surat Persetujuan dari Orang Tua</td>
                                                <td>
                                                    <div class="col-md-6">
                                                        <label for="file"></label>
                                                        <?php if (isset($dataportofolio['tautan_suratortu']) && str_replace($search, '', $dataportofolio['tautan_suratortu']) != '') { ?>
                                                            <a href="../mahasiswa/berkas_portofolio/<?php echo str_replace($search, '', $dataportofolio['tautan_suratortu']); ?>" class="btn btn-info btn-sm">Lihat</a>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>Surat Pakta Integritas</td>
                                                <td>
                                                    <div class="col-md-6">
                                                        <label for="file"></label>
                                                        <?php if (isset($dataportofolio['tautan_suratpakta']) && str_replace($search, '', $dataportofolio['tautan_suratpakta']) != '') { ?>
                                                            <a href="../mahasiswa/berkas_portofolio/<?php echo str_replace($search, '', $dataportofolio['tautan_suratpakta']); ?>" class="btn btn-info btn-sm">Lihat</a>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td>Transkip Nilai</td>
                                                <td>
                                                    <div class="col-md-6">
                                                        <label for="file"></label>
                                                        <?php if (isset($dataportofolio['tautan_transkip']) && str_replace($search, '', $dataportofolio['tautan_transkip']) != '') { ?>
                                                            <a href="../mahasiswa/berkas_portofolio/<?php echo str_replace($search, '', $dataportofolio['tautan_transkip']); ?>" class="btn btn-info btn-sm">Lihat</a>
                                                        <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">6</th>
                                                <td>Biodata / Curriculum Vitae</td>
                                                <td>
                                                    <div class="col-md-6">
                                                        <label for="file"></label>
                                                        <?php if (isset($dataportofolio['tautan_cv']) && str_replace($search, '', $dataportofolio['tautan_cv']) != '') { ?>
                                                            <a href="../mahasiswa/berkas_portofolio/<?php echo str_replace($search, '', $dataportofolio['tautan_cv']); ?>" class="btn btn-info btn-sm">Lihat</a>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">7</th>
                                                <td>Sertifikat Pelatihan / Workshop</td>
                                                <td>
                                                    <div class="col-md-6">
                                                        <label for="file"></label>
                                                        <?php if (isset($dataportofolio['tautan_pelatihan']) && str_replace($search, '', $dataportofolio['tautan_pelatihan']) != '') { ?>
                                                            <a href="../mahasiswa/berkas_portofolio/<?php echo str_replace($search, '', $dataportofolio['tautan_pelatihan']); ?>" class="btn btn-info btn-sm">Lihat</a>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">8</th>
                                                <td>Karya Tulis / Produk</td>
                                                <td>
                                                    <div class="col-md-6">
                                                        <label for="file"></label>
                                                        <?php if (isset($dataportofolio['tautan_produk']) && str_replace($search, '', $dataportofolio['tautan_produk']) != '') { ?>
                                                            <a href="../mahasiswa/berkas_portofolio/<?php echo str_replace($search, '', $dataportofolio['tautan_produk']); ?>" class="btn btn-info btn-sm">Lihat</a>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">9</th>
                                                <td>Dokumen Lain</td>
                                                <td>
                                                    <div class="col-md-6">
                                                        <label for="file"></label>
                                                        <?php if (isset($dataportofolio['tautan_dokumen_lain']) && str_replace($search, '', $dataportofolio['tautan_dokumen_lain']) != '') { ?>
                                                            <a href="../mahasiswa/berkas_portofolio/<?php echo str_replace($search, '', $dataportofolio['tautan_dokumen_lain']); ?>" class="btn btn-info btn-sm">Lihat</a>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                            </tr>
                                    </table>
                            <?php }
                            } ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mx-8">
        <div class="col-12 col-xl-12">
            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h10 mt-3 mb-5 text-center"><b>Hasil Asesmen Formulir dan Portofolio</b></h2>
                <div class="row mx-3">
                    <div class="card card-body shadow">
                        <div id="employee_table">
                            <div class="table-responsive">
                                <form action="" method="POST" accept-charset="utf-8">
                                    <input type="text" name="id_formulir" class="form-control" value="<?= $id_formulir ?>" id="id_formulir" required hidden>
                                    <?php
                                    $no = 1;
                                    $queryasesmen = "SELECT * FROM review_asesmen where id_formulir=$id_formulir";

                                    $resultasesmen = mysqli_query($conn, $queryasesmen);

                                    while ($dataasesmen = mysqli_fetch_array($resultasesmen)) {
                                    ?>

                                        <table class="parameter table table-striped table-bordered">
                                            <caption></caption>

                                            <tr>
                                                <th rowspan="2">No</th>
                                                <th rowspan="2">Jenis Kegiatan / Dokumen</th>
                                                <th colspan="2">Keabsahan Bukti</th>
                                            </tr>
                                            <tr>
                                                <th>Valid</th>
                                                <th>Tidak Valid</th>

                                            </tr>
                                            <td>1</td>
                                            <td style="text-align: left">Formulir</td>
                                            <?php for ($i = 2; $i > 0; $i -= 1) {

                                                $checked = ($dataasesmen['formulir'] == $i) ? "checked" : "";
                                            ?>
                                                <td><input type="radio" id="1" name="formulir" value="<?php echo $i ?>" <?php echo $checked ?> disabled></td>
                                            <?php } ?>
                                            <tr>
                                                <td>2</td>
                                                <td style="text-align: left">Surat Rekomendasi Perguruan Tinggi / Jurusan Asal</td>
                                                <?php for ($i = 2; $i > 0; $i -= 1) {

                                                    $checked = ($dataasesmen['skj'] == $i) ? "checked" : "";
                                                ?>
                                                    <td><input type="radio" id="1" name="skj" value="<?php echo $i ?>" <?php echo $checked ?> disabled></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td style="text-align: left">Surat Keterangan Sehat</td>
                                                <?php for ($i = 2; $i > 0; $i -= 1) {

                                                    $checked = ($dataasesmen['sksehat'] == $i) ? "checked" : "";
                                                ?>
                                                    <td><input type="radio" id="1" name="sksehat" value="<?php echo $i ?>" <?php echo $checked ?> disabled></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td style="text-align: left">Surat Persetujuan dari Orang Tua</td>
                                                <?php for ($i = 2; $i > 0; $i -= 1) {

                                                    $checked = ($dataasesmen['suratortu'] == $i) ? "checked" : "";
                                                ?>
                                                    <td><input type="radio" id="1" name="suratortu" value="<?php echo $i ?>" <?php echo $checked ?> disabled></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td style="text-align: left">Surat Pakta Integritas</td>
                                                <?php for ($i = 2; $i > 0; $i -= 1) {

                                                    $checked = ($dataasesmen['suratpakta'] == $i) ? "checked" : "";
                                                ?>
                                                    <td><input type="radio" id="1" name="suratpakta" value="<?php echo $i ?>" <?php echo $checked ?> disabled></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td style="text-align: left">Transkrip Nilai</td>
                                                <?php for ($i = 2; $i > 0; $i -= 1) {

                                                    $checked = ($dataasesmen['transkipnilai'] == $i) ? "checked" : "";
                                                ?>
                                                    <td><input type="radio" id="1" name="transkipnilai" value="<?php echo $i ?>" <?php echo $checked ?> disabled></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="text-align: left"><strong>Tambahan</strong></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td style="text-align: left">Biodata / Curriculum Vitae</td>
                                                <?php for ($i = 2; $i > 0; $i -= 1) {

                                                    $checked = ($dataasesmen['cv'] == $i) ? "checked" : "";
                                                ?>
                                                    <td><input type="radio" id="1" name="cv" value="<?php echo $i ?>" <?php echo $checked ?> disabled></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td style="text-align: left">Sertifikat Pelatihan / Workshop</td>
                                                <?php for ($i = 2; $i > 0; $i -= 1) {

                                                    $checked = ($dataasesmen['pelatihan'] == $i) ? "checked" : "";
                                                ?>
                                                    <td><input type="radio" id="1" name="pelatihan" value="<?php echo $i ?>" <?php echo $checked ?> disabled></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td style="text-align: left">Karya Tulis / Produk</td>
                                                <?php for ($i = 2; $i > 0; $i -= 1) {

                                                    $checked = ($dataasesmen['produk'] == $i) ? "checked" : "";
                                                ?>
                                                    <td><input type="radio" id="1" name="produk" value="<?php echo $i ?>" <?php echo $checked ?> disabled></td>
                                                <?php } ?>
                                            </tr>
                                        </table>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <p for="catatan">Catatan / Rekomendasi dari Reviewer</p>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="input-group">
                                                    <input class="form-control" id="catatan" type="text" value="<?php echo $dataasesmen['catatan'] ?>" disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-6">
                                                <p for="catatan_tambahan">Catatan Tambahan dari Reviewer</p>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="input-group">
                                                    <textarea name="catatan_tambahan" class="form-control" id="catatan_tambahan" required></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer mt-3">
                                            <!-- Button Modal UPDATE Dospem Assignment -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ubah ke Setujui</button>
                                            <!-- Modal Update Dospem Assignment -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Form Penentuan Dospem</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" autocomplete="off" method="POST" accept-charset="utf-8">
                                                                <div class="mb-3">
                                                                    <input name="id_formulir" value="<?= $id_formulir ?>" class="form-control" id="id_formulir" type="text" hidden required />
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="nik_dospem" class="form-label">Dosen Pembimbing</label>
                                                                    <select name="nik_dospem" class="form-control mb-3">
                                                                        <option selected value="" class="text-center">-- Pilih Dosen Pembimbing --</option>
                                                                        <?php
                                                                        $query2 = "SELECT * FROM user WHERE role='Dospem'";
                                                                        $result2 = mysqli_query($conn, $query2);

                                                                        if (mysqli_num_rows($result2) > 0) {
                                                                            $i = 1;
                                                                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                                                        ?>
                                                                                <option value="<?= $row2['nim_nik']; ?>"> <?= $row2['nim_nik'] ?> -- <?= $row2['nama'] ?> </option>
                                                                        <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <!-- </div> -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" name="setuju2" class="btn btn-success" onclick="return confirm('Yakin ingin menyetujui ajuan dan menentukan Dosen Pembimbing?')">Tentukan Dospem</button>
                                                                </div>
                                                        </div>
                                                    <?php
                                                } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>