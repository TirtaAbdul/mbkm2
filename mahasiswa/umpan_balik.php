<?php
$id_formulir = $_GET['id_formulir'];
$_SESSION['id_formulir'] = $id_formulir;

if (isset($_POST['submitumpanbalik'])) {
    $id_formulir = ($_POST['id_formulir']);
    $softskill = $_POST['softskill'];
    $ilmu = $_POST['ilmu'];
    $pengalaman = $_POST['pengalaman'];
    $pengelolaan = $_POST['pengelolaan'];
    $kesan = $_POST['kesan'];
    $kendala = $_POST['kendala'];
    $masukan = $_POST['masukan'];

    $querysubmit = "INSERT INTO umpan_balik (id_formulir, softskill, ilmu, pengalaman, pengelolaan, kesan, kendala, masukan) VALUES('$id_formulir', '$softskill', '$ilmu', '$pengalaman', '$pengelolaan', '$kesan', '$kendala', '$masukan')";
    $resultsubmit = mysqli_query($conn, $querysubmit);
    if ($resultsubmit) {
        echo '<script type="text/javascript">
        alert("DATA BERHASIL DIUPLOAD!");
        window.location = "../mahasiswa/template.php?page=umpan_balik_view&&id_formulir=' . $id_formulir . '";
     </script>';
    } else {
        echo "Pengumpulan Umpan Balik gagal, silahkan ulangi..";
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

    <div class="row mx-3">
        <div class="col-12 col-xl-12">
            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h10 mt-3 mb-5 text-center"><b>Umpan Balik Kegiatan</b></h2>
                <div class="row mx-3">
                    <div class="card card-body shadow">
                        <div id="employee_table">
                            <?php
                            $query = "SELECT * FROM formulir WHERE id_formulir='$id_formulir'";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {

                                while ($data = mysqli_fetch_assoc($result)) {
                            ?>
                                    <table id="example" class="table table-primary" style="width:100%">
                                        <tr>
                                            <td width="30%"><label for="nama_mhs">Nama Lengkap </label></td>
                                            <td class="tengah">:</td>
                                            <td><?php echo $nama; ?></td>
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
                                    </table>
                        </div>
                    </div>
                </div>
                </br>
                <div class="row mx-3">
                    <div class="card card-body shadow">
                        <form action="" method="post">
                            <h3 class="modal-header mb-3">Parameter Evaluasi</h3>
                            <input type="text" name="id_formulir" value="<?= $id_formulir ?>" required hidden>
                            <div id="employee_table">
                                <div class="table-responsive">
                                    <table id="example" class="parameter table table-striped table-bordered" style="width:100%">
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
                                            <td><input type="radio" id="1" name="softskill" value="4"></td>
                                            <td><input type="radio" id="1" name="softskill" value="3"></td>
                                            <td><input type="radio" id="1" name="softskill" value="2"></td>
                                            <td><input type="radio" id="1" name="softskill" value="1"></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td style="text-align: left">Ilmu yang diperoleh di kampus dapat diimplementasikan pada kegiatan Merdeka Belajar</td>
                                            <td><input type="radio" id="2" name="ilmu" value="4"></td>
                                            <td><input type="radio" id="2" name="ilmu" value="3"></td>
                                            <td><input type="radio" id="2" name="ilmu" value="2"></td>
                                            <td><input type="radio" id="2" name="ilmu" value="1"></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td style="text-align: left">Mendapat pengalaman dan ilmu baru yang belum diperoleh saat belajar di kampus</td>
                                            <td><input type="radio" id="3" name="pengalaman" value="4"></td>
                                            <td><input type="radio" id="3" name="pengalaman" value="3"></td>
                                            <td><input type="radio" id="3" name="pengalaman" value="2"></td>
                                            <td><input type="radio" id="3" name="pengalaman" value="1"></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td style="text-align: left">Pengelolaan program Merdeka Belajar efektif</td>
                                            <td><input type="radio" id="4" name="pengelolaan" value="4"></td>
                                            <td><input type="radio" id="4" name="pengelolaan" value="3"></td>
                                            <td><input type="radio" id="4" name="pengelolaan" value="2"></td>
                                            <td><input type="radio" id="4" name="pengelolaan" value="1"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
                <br>
                <div class="row mx-3">
                    <div class="card card-body shadow">
                        <h3 class="modal-header">Kesan dan Pesan terhadap Kegiatan Merdeka Belajar</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <p>1. Kesan terhadap program merdeka belajar : </p>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <input name="kesan" class="form-control" id="kesan" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <p>2. Kendala program merdeka belajar : </p>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <input name="kendala" class="form-control" id="kendala" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <p>3. Masukan untuk pengelolaan merdeka belajar : </p>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <input name="masukan" class="form-control" id="masukan" type="text" />
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-12">
                                <div class="modal-footer mt-3">
                                    <input type="submit" value="Submit" name="submitumpanbalik" class="btn btn-info" onclick="return confirm('Yakin ingin mengumpulkan Umpan Balik? Setelah dikumpulkan, Anda tidak dapat mengubahnya kembali!')"></input>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>