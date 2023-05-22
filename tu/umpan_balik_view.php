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

    <div class="row mx-3">
        <div class="col-12 col-xl-12">
            <div class="card card-body border-0 shadow mb-4">
                <div class="clearfix">
                    <a class="btn btn-danger btn-lg float-end" href="../tu/template.php?page=detail_kegiatan&&id_formulir=<?= $id_formulir ?>" role="button">Keluar (X)</a>
                </div>
                <h2 class="h10 mt-3 mb-5 text-center"><b>Umpan Balik Kegiatan</b></h2>
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
                                                    <td><?php echo $data['nama']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="30%"><label for="jenis_program">Nomor Induk Dosen Pembimbing</label></td>
                                                    <td class="tengah">:</td>
                                                    <td><?php echo $data['nik_dospem'];
                                                    }
                                                } ?></td>
                                                </tr>
                                    </table>
                        </div>
                    </div>
                </div>

                <div class="row mx-3 mt-4">
                    <div class="card card-body shadow">
                        <form action="" method="post">
                            <h3 class="modal-header mb-3">Parameter Evaluasi</h3>
                            <input type="text" name="id_formulir" value="<?= $id_formulir ?>" required hidden>
                            <div id="employee_table">
                                <div class="table-responsive">
                                    <table id="example" class="parameter table table-striped table-bordered" style="width:100%">
                                        <?php
                                        $queryumpanbalik = "SELECT * FROM umpan_balik WHERE id_formulir=$id_formulir";
                                        $resultumpanbalik = mysqli_query($conn, $queryumpanbalik);

                                        if (mysqli_num_rows($resultumpanbalik) > 0) {

                                            while ($dataumpanbalik = mysqli_fetch_assoc($resultumpanbalik)) {
                                        ?>
                                                <tr>
                                                    <th rowspan="2" class="align-middle text-center">
                                                        <h5>No</h5>
                                                    </th>
                                                    <th rowspan="2" class="align-middle text-center">
                                                        <h5>Parameter</h5>
                                                    </th>
                                                    <th colspan="4" class="align-middle text-center">
                                                        <h5>Tanggapan </h5>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Sangat Setuju</th>
                                                    <th>Setuju</th>
                                                    <th>Kurang Setuju</th>
                                                    <th>Tidak Setuju</th>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td style="text-align: left">Program bermanfaat bagi pengembangan diri (Softskill dan hardskill)</td>
                                                    <?php for ($i = 4; $i > 0; $i -= 1) {
                                                        $checked = ($dataumpanbalik['softskill'] == $i) ? "checked" : "";
                                                    ?>
                                                        <td><input type="radio" id="1" name="softskill" value="<?php echo $i ?>" <?php echo $checked ?> disabled></td>
                                                    <?php } ?>

                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td style="text-align: left">Ilmu yang diperoleh di kampus dapat diimplementasikan pada kegiatan Merdeka Belajar</td>
                                                    <?php for ($i = 4; $i > 0; $i -= 1) {
                                                        $checked = ($dataumpanbalik['ilmu'] == $i) ? "checked" : "";
                                                    ?>
                                                        <td><input type="radio" id="2" name="ilmu" value="<?php echo $i ?>" <?php echo $checked ?> disabled></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td style="text-align: left">Mendapat pengalaman dan ilmu baru yang belum diperoleh saat belajar di kampus</td>
                                                    <?php for ($i = 4; $i > 0; $i -= 1) {
                                                        $checked = ($dataumpanbalik['pengalaman'] == $i) ? "checked" : "";
                                                    ?>
                                                        <td><input type="radio" id="3" name="pengalaman" value="<?php echo $i ?>" <?php echo $checked ?> disabled></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td style="text-align: left">Pengelolaan program Merdeka Belajar efektif</td>
                                                    <?php for ($i = 4; $i > 0; $i -= 1) {
                                                        $checked = ($dataumpanbalik['pengelolaan'] == $i) ? "checked" : "";
                                                    ?>
                                                        <td><input type="radio" id="1" name="pengelolaan" value="<?php echo $i ?>" <?php echo $checked ?> disabled></td>
                                                    <?php } ?>
                                                </tr>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="row mx-3 mt-4">
                    <div class="card card-body shadow">
                        <h3 class="modal-header">Kesan dan Pesan terhadap Kegiatan Merdeka Belajar</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <p>1. Kesan terhadap program merdeka belajar : </p>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <input name="kesan" class="form-control" id="kesan" value="<?= $dataumpanbalik['kesan'] ?>" type="text" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mt-3">
                                <p>2. Kendala program merdeka belajar : </p>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <input name="kendala" class="form-control" id="kendala" value="<?= $dataumpanbalik['kendala'] ?>" type="text" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mt-3">
                                <p>3. Masukan untuk pengelolaan merdeka belajar : </p>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <input name="masukan" class="form-control" id="masukan" value="<?= $dataumpanbalik['masukan'] ?>" type="text" disabled>
                                </div>
                            </div>
                        </div>
                        <br>
                <?php }
                                        } ?>

                    </div>
                </div>