<?php
$id_formulir = $_GET['id_formulir'];
$_SESSION['id_formulir'] = $id_formulir;

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
                <h2 class="h10 mt-3 mb-5 text-center"><b>Hasil Asesmen Ajuan</b></h2>
                <div class="row mx-3">
                    <div class="card card-body shadow">
                        <div id="employee_table" class="table-responsive">
                            <?php
                            $query = "SELECT user.nim_nik, user.nama, 
                            formulir.id_formulir, formulir.nim, formulir.prodi_asal, 
                            formulir.jenis_program, formulir.judul_program
                            FROM formulir 
                            LEFT JOIN user ON formulir.nim = user.nim_nik
                            WHERE id_formulir='$id_formulir'";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {

                                while ($data = mysqli_fetch_assoc($result)) {
                            ?>
                                    <table id="example" class="table table-primary" style="width:100%">
                                        <tr>
                                            <td width="30%"><label for="nama_mhs">Nama Lengkap Mahasiswa</label></td>
                                            <td class="tengah">:</td>
                                            <td><?php echo $data['nama']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="30%"><label for="nim">Nomor Induk Mahasiswa </label></td>
                                            <td class="tengah">:</td>
                                            <td><?php echo $data['nim']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="30%"><label for="prodi_asal">Program Studi </label></td>
                                            <td class="tengah">:</td>
                                            <td><?php echo $data['prodi_asal']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="30%"><label for="jenis_program">Jenis Program Merdeka Belajar </label></td>
                                            <td class="tengah">:</td>
                                            <td><?php echo $data['jenis_program']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="30%"><label for="judul_program">Judul Program Merdeka Belajar</label></td>
                                            <td class="tengah">:</td>
                                            <td><?php echo $data['judul_program'];
                                            }
                                        } ?></td>
                                        </tr>
                                        <?php
                                        $query = "SELECT user.nim_nik, user.nama, assign_dospem.id_formulir, assign_dospem.nik_dospem 
                                            FROM assign_dospem 
                                            LEFT JOIN user 
                                            ON assign_dospem.nik_dospem = user.nim_nik
                                            WHERE id_formulir='$id_formulir'";
                                        $result = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($result) > 0) {

                                            while ($data = mysqli_fetch_assoc($result)) {
                                        ?>
                                                <tr>

                                                    <td width="30%"><label for="jenis_program">Nama Lengkap Dosen Pembimbing </label></td>
                                                    <td class="tengah">:</td>
                                                    <td><?php echo $data['nik_dospem']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="30%"><label for="jenis_program">Nomor Induk Dosen Pembimbing</label></td>
                                                    <td class="tengah">:</td>
                                                    <td><?php echo $data['nama'];
                                                    }
                                                } ?></td>
                                                </tr>
                                    </table>
                        </div>
                    </div>
                </div>

                <div class="row mx-3 mt-4">
                    <div class="card card-body shadow">
                        <h3 class="modal-header mb-3">Hasil Asesmen Formulir dan Portofolio</h3>
                        <div id="employee_table" class="table-responsive">
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
                                        <div class="col-12">
                                            <p for="catatan">Catatan / Rekomendasi dari Reviewer</p>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group">
                                                <input class="form-control" id="catatan" type="text" value="<?php echo $dataasesmen['catatan'] ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <p for="catatan_tambahan">Catatan Tambahan dari Reviewer</p>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group">
                                                <input class="form-control" id="catatan" type="text" value="<?php echo $dataasesmen['catatan_tambahan'] ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>