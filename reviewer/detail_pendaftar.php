<?php
$id_formulir = $_GET['id_formulir'];
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
                        <td class="kanan"> <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".modalBesar">+</button></td>
                    </tr>
                </table>

                <div class="mb-3">

                    <!-- <table id="example" class="" style="width:100%"> -->

                    <div id="employee_table">
                        <table class="table table-bordered" id="example" class="" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="10%">No</th>
                                    <th width="15%">Kode</th>
                                    <th width="50%">Mata Kuliah</th>
                                    <th width="10%">SKS</th>
                                    <th width="15%">Action</th>
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
                                            <td>
                                                <a href=""><button class="btn btn-warning btn-sm">E</button></a>
                                                <a href=""><button class="btn btn-danger btn-sm">H</button></a>
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
    </tr>

    </form>

    <!-- Modal Matkul -->
    <div class="modal fade modalBesar" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ModalTambahMatkulLabel">Daftar Mata Kuliah Tujuan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form name="input" action="proses_tambahmatkul.php" method="POST" accept-charset="utf-8">
                        <input name="id_user" value="<?= $id_user ?>" class="form-control" id="id_user" type="text" required hidden />
                        <input name="id_formulir" value="<?= $id_formulir ?>" class="form-control" id="id_formulir" type="text" required hidden />
                        <label name="id_matkul_prodi" id="id_matkul_prodi">Mata Kuliah Tujuan</label>
                        <select name="id_matkul_prodi" class="form-control mb-3">
                            <option selected value="" class="text-center">KODE -- MATKUL [SKS]</option>
                            <?php
                            $query2 = "SELECT id_matkul_prodi, kode, nama_matkul, sks FROM matkul WHERE prodi='Teknik Informatika'";
                            $result2 = mysqli_query($conn, $query2);

                            if (mysqli_num_rows($result2) > 0) {
                                $i = 1;
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                            ?>
                                    <option value="<?= $row2['id_matkul_prodi']; ?>"> <?= $row2['kode'] ?> -- <?= $row2['nama_matkul'] ?> [<?= $row2['sks'] ?> SKS]</option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                        <input type="submit" value="Tambah" class="btn btn-primary"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>



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

    </br></br>
    <style>
        .parameter {
            /* border: 1px solid black; */
            text-align: center;
        }
    </style>
    <div class="row mx-8 mt-2">
        <div class="col-12">
            <div class="card card-body border-0 shadow">
                <center>
                    <h2 class="h10 mt-2 mb-5"><b>Asesmen Formulir dan Portofolio</b></h2>

                </center>
                <form action="../reviewer/detail_asesmen_pendaftar.php?id_formulir=<?= $id_formulir ?>" method="POST">
                    <table class="parameter table table-striped table-bordered">
                        <caption></caption>

                        <input type="text" name="id_asesmen" value="<?= $dataportofolio['id_asesmen'] ?>" hidden>
                <?php }
                } ?>
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
                <td style="text-align: left">Formulir Pendaftaran</td>
                <td><input type="radio" id="1" name="formulir" value="2"></td>
                <td><input type="radio" id="1" name="formulir" value="1"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td style="text-align: left">Surat Rekomendasi Perguruan Tinggi / Jurusan Asal</td>
                    <td><input type="radio" id="2" name="skj" value="2"></td>
                    <td><input type="radio" id="2" name="skj" value="1"></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td style="text-align: left">Surat Keterangan Sehat</td>
                    <td><input type="radio" id="3" name="sksehat" value="2"></td>
                    <td><input type="radio" id="3" name="sksehat" value="1"></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td style="text-align: left">Surat Persetujuan dari Orang Tua</td>
                    <td><input type="radio" id="4" name="suratortu" value="2"></td>
                    <td><input type="radio" id="4" name="suratortu" value="1"></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td style="text-align: left">Surat Pakta Integritas</td>
                    <td><input type="radio" id="5" name="suratpakta" value="2"></td>
                    <td><input type="radio" id="5" name="suratpakta" value="1"></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td style="text-align: left">Transkrip Nilai</td>
                    <td><input type="radio" id="6" name="transkip" value="2"></td>
                    <td><input type="radio" id="6" name="transkip" value="1"></td>
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
                    <td><input type="radio" id="7" name="cv" value="2"></td>
                    <td><input type="radio" id="7" name="cv" value="1"></td>
                </tr>
                <tr>
                    <td>8</td>
                    <td style="text-align: left">Sertifikat Pelatihan / Workshop</td>
                    <td><input type="radio" id="8" name="pelatihan" value="2"></td>
                    <td><input type="radio" id="8" name="pelatihan" value="1"></td>
                </tr>
                <tr>
                    <td>9</td>
                    <td style="text-align: left">Karya Tulis / Produk</td>
                    <td><input type="radio" id="9" name="produk" value="2"></td>
                    <td><input type="radio" id="9" name="produk" value="1"></td>
                </tr>
                    </table>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <p for="catatan">Catatan / Rekomendasi dari Reviewer</p>
                        </div>
                        <div class="col-lg-12">
                            <div class="input-group">
                                <textarea class="form-control" name="catatan" id="catatan" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    </br>
                    <input type="submit" class="btn btn-info" name="upload" value="Setujui">
                    <input type="submit" class="btn btn-danger" name="tolak" value="Tolak">
                </form>

                <!-- <input type="submit" value="Upload" name="upload" class="btn btn-primary"> -->
                </input>


                <!-- Volt JS -->
                <!-- <script src="../assets/js/volt.js"></script> -->
                <!-- <script>
        $(document).ready(function() {
            $("#simpanmatkul").click(function() {
                let id = $("#kodematkul").val()
                let matkul = $("#namamatkul").val()
                let sks = $("#sks").val()

                $.ajax({
                    type: "POST",
                    data: {
                        upload: "upload",
                        id: id,
                        matkul: matkul,
                        sks: sks
                    },
                    url: "upload_modal.php",
                    success: function(result) {
                        alert(result);
                        window.location.href = 'formulir_pendaftar_mhs.php';
                        //the controller function count_votes returns an integer.
                        //echo that with the fade in here.
                        console.log(result)
                    }
                });
            })

        });
    </script> -->

                </body>