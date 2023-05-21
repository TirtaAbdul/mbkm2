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
                <div class="clearfix">
                    <a class="btn btn-danger btn-lg float-end" href="../dospem/template.php?page=detail_kegiatan&&id_formulir=<?= $id_formulir ?>" role="button">Keluar (X)</a>
                </div>
                <h2 class="h10 mt-3 mb-5 text-center"><b>Hasil Instrumentasi Nilai Kegiatan</b></h2>
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

                <!-- GO -->
                <div class="row mx-3 mt-4">
                    <div class="card card-body shadow">
                        <h3 class="modal-header mb-3">Rubrik Penilaian</h3>
                        <input type="text" name="id_formulir" value="<?= $id_formulir ?>" required hidden>
                        <div id="employee_table">
                            <div class="table-responsive">
                                <table class="parameter table table-striped table-bordered">
                                    <?php
                                    $querynilai = "SELECT * FROM nilai_kegiatan WHERE id_formulir=$id_formulir";
                                    $resultnilai = mysqli_query($conn, $querynilai);

                                    if (mysqli_num_rows($resultnilai) > 0) {

                                        while ($datanilai = mysqli_fetch_assoc($resultnilai)) {
                                    ?>
                                            <tr>
                                                <th rowspan="2" class="align-middle text-center">No</th>
                                                <th rowspan="2" class="align-middle text-center">Aspek Penilaian</th>
                                                <th colspan="4" class="align-middle text-center">Skala Penilaian</th>
                                            </tr>
                                            <tr>
                                                <th>Kurang</th>
                                                <th>Cukup</th>
                                                <th>Baik</th>
                                                <th>Baik Sekali</th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td style="text-align: left">Kemampuan Hardskill</td>
                                                <?php for ($i = 4; $i > 0; $i -= 1) {
                                                    $checked = ($datanilai['hardskill'] == $i) ? "checked" : "";
                                                ?>
                                                    <td><input type="radio" id="1" name="hardskill" value="<?php echo $i ?>" <?php echo $checked ?> disabled></td>
                                                <?php } ?>

                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td style="text-align: left">Kemampuan Softskill</td>
                                                <?php for ($i = 4; $i > 0; $i -= 1) {
                                                    $checked = ($datanilai['softskill'] == $i) ? "checked" : "";
                                                ?>
                                                    <td><input type="radio" id="2" name="softskill" value="<?php echo $i ?>" <?php echo $checked ?> disabled></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td style="text-align: left">Luaran kegiatan merdeka belajar (Outcome)</td>
                                                <?php for ($i = 4; $i > 0; $i -= 1) {
                                                    $checked = ($datanilai['luaran'] == $i) ? "checked" : "";
                                                ?>
                                                    <td><input type="radio" id="3" name="luaran" value="<?php echo $i ?>" <?php echo $checked ?> disabled></td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td style="text-align: left">Capaian Pembelajaran</td>
                                                <?php for ($i = 4; $i > 0; $i -= 1) {
                                                    $checked = ($datanilai['capaian'] == $i) ? "checked" : "";
                                                ?>
                                                    <td><input type="radio" id="1" name="capaian" value="<?php echo $i ?>" <?php echo $checked ?> disabled></td>
                                                <?php } ?>
                                            </tr>
                                    <?php }
                                    } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>