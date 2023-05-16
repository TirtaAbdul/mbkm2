<?php
$id_formulir = $_GET['id_formulir'];
$_SESSION['id_formulir'] = $id_formulir;

if (isset($_POST['submitnilai'])) {
    $id_formulir = ($_POST['id_formulir']);
    $hardskill = $_POST['hardskill'];
    $softskill = $_POST['softskill'];
    $luaran = $_POST['luaran'];
    $capaian = $_POST['capaian'];

    $querysubmit = "INSERT INTO nilai_kegiatan (id_formulir, hardskill, softskill, luaran, capaian) VALUES('$id_formulir', '$hardskill', '$softskill', '$luaran', '$capaian')";
    $resultsubmit = mysqli_query($conn, $querysubmit);
    if ($resultsubmit) {
        echo '<script type="text/javascript">
        alert("NILAI BERHASIL DIKIRIM!");
        window.location = "../dospem/template.php?page=nilai_view&&id_formulir=' . $id_formulir . '";
     </script>';
    } else {
        echo '<script type="text/javascript">
        alert("Pengumpulan Nilai gagal, silahkan ulangi..");
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
                <h2 class="h10 mt-3 mb-5 text-center"><b>Instrumentasi Nilai Kegiatan</b></h2>
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

                <!-- GO -->
                <div class="row mx-3 mt-4">
                    <div class="card card-body shadow">
                        <form action="" method="post">
                            <h3 class="modal-header mb-3">Rubrik Penilaian</h3>
                            <input type="text" name="id_formulir" value="<?= $id_formulir ?>" required hidden>
                            <div id="employee_table">
                                <div class="table-responsive">
                                    <table class="parameter table table-striped table-bordered">
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
                                            <td><input type="radio" id="1" name="hardskill" value="4"></td>
                                            <td><input type="radio" id="1" name="hardskill" value="3"></td>
                                            <td><input type="radio" id="1" name="hardskill" value="2"></td>
                                            <td><input type="radio" id="1" name="hardskill" value="1"></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td style="text-align: left">Kemampuan Softskill</td>
                                            <td><input type="radio" id="2" name="softskill" value="4"></td>
                                            <td><input type="radio" id="2" name="softskill" value="3"></td>
                                            <td><input type="radio" id="2" name="softskill" value="2"></td>
                                            <td><input type="radio" id="2" name="softskill" value="1"></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td style="text-align: left">Luaran kegiatan merdeka belajar (Outcome)</td>
                                            <td><input type="radio" id="3" name="luaran" value="4"></td>
                                            <td><input type="radio" id="3" name="luaran" value="3"></td>
                                            <td><input type="radio" id="3" name="luaran" value="2"></td>
                                            <td><input type="radio" id="3" name="luaran" value="1"></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td style="text-align: left">Capaian Pembelajaran</td>
                                            <td><input type="radio" id="4" name="capaian" value="4"></td>
                                            <td><input type="radio" id="4" name="capaian" value="3"></td>
                                            <td><input type="radio" id="4" name="capaian" value="2"></td>
                                            <td><input type="radio" id="4" name="capaian" value="1"></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="modal-footer mt-3">
                                            <input type="submit" value="SUBMIT" name="submitnilai" class="btn btn-info" onclick="return confirm('Yakin ingin mengumpulkan Nilai? Setelah dikumpulkan, Anda tidak dapat mengubahnya kembali!')"></input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>