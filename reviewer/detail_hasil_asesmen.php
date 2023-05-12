<?php
$id_asesmen = $_GET['id_asesmen'];
$quer = "SELECT id_formulir FROM asesmen 
WHERE id_asesmen='$id_asesmen'";
$res = mysqli_query($conn, $quer);

if (mysqli_num_rows($res) > 0) {
    $i = 1;
    while ($form = mysqli_fetch_assoc($res)) {
        $id_formulir = $form['id_formulir'];


?>
        <style>
            .kiri,
            .tengah,
            .kanan {
                vertical-align: top;
                padding-bottom: 10px;
            }
        </style>

        </ul>
        </div>
        </nav>

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


                        <center>
                            <h2 class="h10 mb-5 mt-2"><b>Formulir Pendaftaran</b></h2>

                        </center>

                        <!-- Mulai Form -->

                        <!-- <div class="panel-body">
                        <div class="col-md-15 col-lg-15">
                            <div class="form-group"> -->
                        <?php
                        $query = "SELECT  
                                user.id_user, user.nim_nik, user.nama, 
                                formulir.id_formulir, formulir.prodi_asal, formulir.jenis_program,
                                formulir.alasan, formulir.judul_program, formulir.nama_mitra,
                                formulir.tgl_mulai, formulir.tgl_selesai, formulir.rincian_kegiatan,
                                formulir.sumber_pendanaan, formulir.jenis_pertukaran_pelajar, 
                                formulir.prodi_tujuan, formulir.status
                                FROM formulir 
                                LEFT JOIN user 
                                ON formulir.id_user = user.id_user 
                                WHERE id_formulir='$id_formulir'";
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <!-- <input type="text" name="id_formulir" class="form-control" value="<= $row['id_formulir'] ?>" id="id_formulir" required hidden> -->

                                <table>
                                    <tr>
                                        <th width="250px"></th>
                                        <th width="20px"></th>
                                        <th class="kolomkanan"></th>
                                    </tr>
                                    <tr>
                                        <td class="kiri"><label for="nim">Nomor Induk Mahasiswa </label></td>
                                        <td class="tengah">:</td>
                                        <td class="kanan"><?php echo $row['nim_nik']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="kiri"><label for="nama_mhs">Nama Lengkap </label></td>
                                        <td class="tengah">:</td>
                                        <td class="kanan"><?php echo $row['nama']; ?> <input type="hidden" name="id_pendaftaran" value="<?php echo $data['id_pendaftaran'] ?>"></td>
                                    </tr>
                                    <tr>
                                        <td class="kiri"><label for="prodi">Program Studi Asal</label></td>
                                        <td class="tengah">:</td>
                                        <td class="kanan"><?php echo $row['prodi_asal']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="kiri"><label for="jenis_program">Jenis Program </label></td>
                                        <td class="tengah">:</td>
                                        <td class="kanan"><?php echo $row['jenis_program']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="kiri"><label for="alasan">Alasan Memilih Program </label></td>
                                        <td class="tengah">:</td>
                                        <td class="kanan"><?php echo $row['alasan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="kiri"><label for="judul_program">Judul Program / Kegiatan</label></td>
                                        <td class="tengah">:</td>
                                        <td class="kanan"><?php echo $row['judul_program']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="kiri"><label for="nama_mitra">Nama Mitra (Jika ada) </label></td>
                                        <td class="tengah">:</td>
                                        <td class="kanan"><?php echo $row['nama_mitra']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="kiri"><label for="tanggal_mulai">Tanggal Mulai </label></td>
                                        <td class="tengah">:</td>
                                        <td class="kanan"><?php echo $row['tgl_mulai']; ?></td>
                                    </tr>
                                    <!--  -->
                                    <tr>
                                        <td class="kiri"><label for="tanggal_selesai">Tanggal Selesai </label></td>
                                        <td class="tengah">:</td>
                                        <td class="kanan"><?php echo $row['tgl_selesai']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="kiri"><label for="rincian_kegiatan">Rincian Kegiatan </label></td>
                                        <td class="tengah">:</td>
                                        <td class="kanan"><?php echo $row['rincian_kegiatan']; ?></td>
                                    </tr>
                                </table>

                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>

            <div class="row mx-8">
                <div class="col-12">
                    <div class="card card-body border-0 shadow mb-4">
                        <p>
                        <h5><b>Untuk Program Membangun Desa / Kuliah Kerja Nyata Tematik</b></h5>
                        </p>


                        <table>
                            <tr>
                                <th width="250px"></th>
                                <th width="20px"></th>
                                <th class="kolomkanan"></th>
                            </tr>
                            <tr>
                                <td class="kiri"><label for="sumber_pendanaan">Sumber Pendanaan </label></td>
                                <td class="tengah">:</td>
                                <td class="kanan"><?php echo $row['sumber_pendanaan']; ?></td>
                            </tr>
                            <tr>
                                <td class="kiri"> <label for="exampleDataList" class="form-label">Daftar Anggota</label></td>
                                <td class="tengah">:</td>
                                <td class="kanan"> </td>
                            </tr>
                        </table>

                        <div class="mb-3">


                            <!-- <table id="example" class="" style="width:100%"> -->

                            <div id="employee_table">
                                <table class="table table-bordered" id="example" class="" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th width="10%">No</th>
                                            <th width="25%">NIM</th>
                                            <th width="65%">Nama Anggota</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query = "SELECT anggota.id_user_anggota, user.nim_nik, user.nama
                                        FROM anggota
                                        LEFT JOIN user
                                        ON anggota.id_user_anggota = user.id_user where anggota.id_formulir=$id_formulir";
                                        $result = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($result) > 0) {

                                            while ($data = mysqli_fetch_assoc($result)) {
                                        ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
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
            </div>

            <div class="row mx-8">
                <div class="col-12">
                    <div class="card card-body border-0 shadow mb-4">
                        <p>
                        <h5><b>Untuk Program Pertukaran Pelajar </b></h5>
                        </p>

                        <table>
                            <tr>
                                <th width="250px"></th>
                                <th width="20px"></th>
                                <th class="kolomkanan"></th>
                            </tr>
                            <tr>
                                <td class="kiri"><label for="jenis_pertukaran_pelajar">Jenis Pertukaran Pelajar </label></td>
                                <td class="tengah">:</td>
                                <td class="kanan"><?php echo $row['jenis_pertukaran_pelajar']; ?></td>
                            </tr>
                            <tr>
                                <td class="kiri"><label for="prodi_tujuan">Program Studi Tujuan </label></td>
                                <td class="tengah">:</td>
                                <td class="kanan"><?php echo $row['prodi_tujuan']; ?></td>
                            </tr>
                            <tr>
                                <td class="kiri"><label for="exampleDataList" class="form-label">Daftar Mata Kuliah Tujuan</label></td>
                                <td class="tengah">:</td>
                                <td class="kanan"> </td>
                            </tr>
                        </table>

                        <div class="mb-3">

                            <!-- <table id="example" class="" style="width:100%"> -->

                            <div id="employee_table">
                                <table class="table table-bordered" id="example" class="" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th width="10%">No</th>
                                            <th width="20%">Kode</th>
                                            <th width="60%">Mata Kuliah</th>
                                            <th width="10%">SKS</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT matkul_tujuan.id_matkul_prodi, matkul.kode, matkul.nama_matkul, matkul.sks
                                        FROM matkul_tujuan
                                        LEFT JOIN matkul
                                        ON matkul_tujuan.id_matkul_prodi=matkul.id_matkul_prodi where matkul_tujuan.id_formulir=$id_formulir";
                                        $result = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($result) > 0) {

                                            while ($data = mysqli_fetch_assoc($result)) {
                                        ?>

                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?php echo $data['kode']; ?></td>
                                                    <td><?php echo $data['nama_matkul']; ?></td>
                                                    <td><?php echo $data['sks']; ?></td>
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
            </tr>

            </form>



            <!-- Asesmen Portofolio -->
            <div class="row mx-8 mt-2">
                <div class="col-12">
                    <div class="card card-body border-0 shadow">
                        <center>
                            <h2 class="h10 mt-2 mb-5"><b>Berkas Portofolio</b></h2>

                        </center>
                        <?php
                        $search = '../mahasiswa/file_portofolio/';

                        $queryportofolio = "SELECT * FROM asesmen WHERE id_formulir=$id_formulir";
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
                                                        <a href="../mahasiswa/file_portofolio/<?php echo str_replace($search, '', $dataportofolio['tautan_skj']); ?>" class="btn btn-info btn-sm">Lihat</a>
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
                                                        <a href="../mahasiswa/file_portofolio/<?php echo str_replace($search, '', $dataportofolio['tautan_sksehat']); ?>" class="btn btn-info btn-sm">Lihat</a>
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
                                                        <a href="../mahasiswa/file_portofolio/<?php echo str_replace($search, '', $dataportofolio['tautan_suratortu']); ?>" class="btn btn-info btn-sm">Lihat</a>
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
                                                        <a href="../mahasiswa/file_portofolio/<?php echo str_replace($search, '', $dataportofolio['tautan_suratpakta']); ?>" class="btn btn-info btn-sm">Lihat</a>
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
                                                        <a href="../mahasiswa/file_portofolio/<?php echo str_replace($search, '', $dataportofolio['tautan_transkip']); ?>" class="btn btn-info btn-sm">Lihat</a>

                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">6</th>
                                            <td>Biodata / Curriculum Vitae</td>
                                            <td>
                                                <div class="col-md-6">
                                                    <label for="file"></label>
                                                    <?php if (isset($dataportofolio['tautan_cv']) && str_replace($search, '', $dataportofolio['tautan_cv']) != '') { ?>
                                                        <a href="../mahasiswa/file_portofolio/<?php echo str_replace($search, '', $dataportofolio['tautan_cv']); ?>" class="btn btn-info btn-sm">Lihat</a>
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
                                                        <a href="../mahasiswa/file_portofolio/<?php echo str_replace($search, '', $dataportofolio['tautan_pelatihan']); ?>" class="btn btn-info btn-sm">Lihat</a>
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
                                                        <a href="../mahasiswa/file_portofolio/<?php echo str_replace($search, '', $dataportofolio['tautan_produk']); ?>" class="btn btn-info btn-sm">Lihat</a>
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
                                                        <a href="../mahasiswa/file_portofolio/<?php echo str_replace($search, '', $dataportofolio['tautan_dokumen_lain']); ?>" class="btn btn-info btn-sm">Lihat</a>
                                                <?php }
                                                    }
                                                ?>
                                                </div>
                                            </td>
                                        </tr>
                                </table>
                                </br>
                    </div>
                </div>
            </div>




            <!--Table-->
            <div class="row mx-8">
                <div class="col-12">
                    <div class="card card-body border-0 shadow mb-4">
                        <center>
                            <h2 class="h10 mb-4">Asesmen Portofolio</h2>
                        </center>
                        <br />
                        <?php
                                $no = 1;
                                // $sql2 = mysqli_query($koneksi,"SELECT * FROM asesmen desc limit 8");
                                $search = '../mahasiswa/file_portofolio/';
                                $pendaftaran = 0;
                        ?>


                        </br></br>
                        <style>
                            .parameter {
                                /* border: 1px solid black; */
                                text-align: center;
                            }
                        </style>
                        <?php
                                $no = 1;
                                $query = "SELECT * FROM nilai_asesmen where id_asesmen=$id_asesmen";
                                $result = mysqli_query($conn, $query);
                                // if (mysqli_num_rows($result) > 0) {
                                while ($data = mysqli_fetch_array($result)) {
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

                                        $checked = ($data['formulir'] == $i) ? "checked" : "";
                                ?>
                                    <td><input type="radio" id="1" name="formulir" value="<?php echo $i ?>" <?php echo $checked ?> disabled></td>
                                <?php } ?>
                                <tr>
                                    <td>2</td>
                                    <td style="text-align: left">Surat Rekomendasi Perguruan Tinggi / Jurusan Asal</td>
                                    <?php for ($i = 2; $i > 0; $i -= 1) {

                                        $checked = ($data['skj'] == $i) ? "checked" : "";
                                    ?>
                                        <td><input type="radio" id="1" name="skj" value="<?php echo $i ?>" <?php echo $checked ?> disabled></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td style="text-align: left">Surat Keterangan Sehat</td>
                                    <?php for ($i = 2; $i > 0; $i -= 1) {

                                        $checked = ($data['sksehat'] == $i) ? "checked" : "";
                                    ?>
                                        <td><input type="radio" id="1" name="sksehat" value="<?php echo $i ?>" <?php echo $checked ?> disabled></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td style="text-align: left">Surat Persetujuan dari Orang Tua</td>
                                    <?php for ($i = 2; $i > 0; $i -= 1) {

                                        $checked = ($data['suratortu'] == $i) ? "checked" : "";
                                    ?>
                                        <td><input type="radio" id="1" name="suratortu" value="<?php echo $i ?>" <?php echo $checked ?> disabled></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td style="text-align: left">Surat Pakta Integritas</td>
                                    <?php for ($i = 2; $i > 0; $i -= 1) {

                                        $checked = ($data['suratpakta'] == $i) ? "checked" : "";
                                    ?>
                                        <td><input type="radio" id="1" name="suratpakta" value="<?php echo $i ?>" <?php echo $checked ?> disabled></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td style="text-align: left">Transkrip Nilai</td>
                                    <?php for ($i = 2; $i > 0; $i -= 1) {

                                        $checked = ($data['transkip'] == $i) ? "checked" : "";
                                    ?>
                                        <td><input type="radio" id="1" name="transkip" value="<?php echo $i ?>" <?php echo $checked ?> disabled></td>
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

                                        $checked = ($data['cv'] == $i) ? "checked" : "";
                                    ?>
                                        <td><input type="radio" id="1" name="cv" value="<?php echo $i ?>" <?php echo $checked ?> disabled></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td style="text-align: left">Sertifikat Pelatihan / Workshop</td>
                                    <?php for ($i = 2; $i > 0; $i -= 1) {

                                        $checked = ($data['pelatihan'] == $i) ? "checked" : "";
                                    ?>
                                        <td><input type="radio" id="1" name="pelatihan" value="<?php echo $i ?>" <?php echo $checked ?> disabled></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td style="text-align: left">Karya Tulis / Produk</td>
                                    <?php for ($i = 2; $i > 0; $i -= 1) {

                                        $checked = ($data['produk'] == $i) ? "checked" : "";
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
                                        <input name="catatan" class="form-control" id="catatan" type="text" value="<?php echo $data['catatan'] ?>" disabled />
                                        <!-- WARNING!! kasih height dan text-wrap -->
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- </div> -->
                    <!-- </div>
            </div>
            </div> -->
<?php
                                }
                            }
                        }
                    }
                } ?>
</br>



<!-- <input type="submit" value="Upload" name="upload" class="btn btn-primary"> -->