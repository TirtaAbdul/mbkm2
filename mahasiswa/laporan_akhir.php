<?php
$id_formulir = $_GET['id_formulir'];
$_SESSION['id_formulir'] = $id_formulir;

if (isset($_POST['tambahlaporanakhir'])) {
    $ekstensi_diperbolehkan = array('pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png');
    $nama    = $_FILES['file']['name'];
    $pendaftaran = $_POST['id_formulir'];
    $x        = explode('.', $nama);
    $ekstensi    = strtolower(end($x));
    $ukuran        = $_FILES['file']['size'];
    $file_tmp    = $_FILES['file']['tmp_name'];

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 1044070) {
            // Lokasi Penempatan file
            $dirUpload = "../mahasiswa/berkas_laporanakhir/";
            $linkBerkas = $dirUpload . $nama;
            // Menyimpan file
            $terupload = move_uploaded_file($file_tmp, $linkBerkas);
            if ($terupload) {
                $queryadd    = "INSERT INTO `laporan_akhir` (`id_laporan_akhir`, `id_formulir`, `file`, `jenis_dokumen`, `nama_dokumen`) VALUES(NULL, '$pendaftaran' ,'$nama', '$ekstensi', '$linkBerkas')";
                $resultadd = mysqli_query($conn, $queryadd);
                if ($resultadd) {
                    echo '<script type="text/javascript">
                    alert("FILE BERHASIL DI UPLOAD!");
                 </script>';
                } else {
                    echo "FILE GAGAL DI UPLOAD!";
                }
            } else {
                echo "UKURAN FILE TERLALU BESAR!";
            }
        }
    } else {
        echo "EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!";
    }
}

if (isset($_GET['hapuslaporanakhir'])) {
    $id_laporan_akhir = $_GET['hapuslaporanakhir'];

    $querydelete = "DELETE FROM laporan_akhir WHERE id_laporan_akhir='$id_laporan_akhir'";
    $resultdelete = mysqli_query($conn, $querydelete);
    echo "<meta http-equiv=refresh content=2;URL='?page=laporan_akhir&&id_formulir=$id_formulir ?>'>";
    if (!$resultdelete) {
        echo "Penghapusan logbook gagal, silahkan ulangi..";
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
                <h2 class="h10 mt-3 mb-5 text-center"><b>Laporan Akhir</b></h2>
                <div class="row mx-3">
                    <div class="card card-body shadow">
                        <div id="employee_table">
                            <?php
                            $no = 1;
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
                <br>
                <div class="row mx-3">
                    <div class="card card-body shadow">
                        <h3 class="modal-header">Upload Laporan</h3>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="text" name="id_formulir" id="id_formulir" value="<?= $id_formulir ?>" hidden required>
                            <div class="mb-3">
                                <label for="file">File (Max size : 5 MB)</label>
                                <p><input type="file" name="file" id="file" accept="application/pdf, application/doc, application/docx, image/jpeg, image/jpg, image/png"></p>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_dokumen">Jenis Dokumen</label>
                                <input placeholder="Format dokumen (pdf, doc, docx, png, jpg)" name="jenis_dokumen" id="jenis_dokumen" class="form-control" id="jenis_dokumen" type="text" required />
                            </div>
                            <div class="mb-3">
                                <label for="nama_dokumen">Nama Dokumen</label>
                                <input placeholder="Cth: Sertifikat" name="nama_dokumen" id="nama_dokumen" class="form-control" id="nama_dokumen" type="text" required />
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="modal-footer mt-3">
                                        <input type="submit" value="Upload" name="tambahlaporanakhir" class="btn btn-info">
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row mx-3 mt-4">
                <div class="card card-body shadow">
                    <h3 class="modal-header mb-3">Dokumen Tersimpan</h3>
                    <div id="employee_table">
                        <table id="example" class="table table-striped" style="width:100%">
                            <tr>
                                <th width="5%"><?= $no++ ?></th>
                                <th width="15%">Jenis Dokumen</th>
                                <th width="55%">Nama Dokumen</th>
                                <th width="30%">Aksi</th>
                            </tr>
                            </thead>
                            <?php
                            $search = '../mahasiswa/berkas_laporanakhir/';
                            $query = "SELECT * FROM laporan_akhir WHERE id_formulir='$id_formulir'";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {

                                while ($data = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['jenis_dokumen']; ?></td>
                                        <td><?= $data['nama_dokumen']; ?></td>
                                        <td>
                                            <a href="../mahasiswa/berkas_laporanAkhir/<?php echo str_replace($search, '', $data['nama_dokumen']); ?>" class="btn btn-info btn-sm">Lihat</a>
                                            <a href="?page=laporan_akhir&&id_formulir=<?= $id_formulir ?>&&hapuslaporanakhir=<?= $data['id_laporan_akhir'] ?>" onclick="return confirm('Yakin ingin menghapus Laporan?')">
                                                <input type="button" class="btn btn-danger btn-sm" value="Hapus">
                                            </a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    rowReorder: {
                        selector: 'td:nth-child(2)'
                    },
                    responsive: true
                });
            });
        </script>