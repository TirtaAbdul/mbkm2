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
                <div class="clearfix">
                    <a class="btn btn-danger btn-lg float-end" href="../mahasiswa/template.php?page=detail_kegiatan&&id_formulir=<?= $id_formulir ?>" role="button">Keluar (X)</a>
                </div>
                <h2 class="h10 mt-3 mb-5 text-center"><b>Laporan Akhir</b></h2>
                <div class="row mx-3">
                    <div class="card card-body shadow">
                        <div id="employee_table" class="table-responsive">
                            <?php
                            $no = 1;
                            $query = "SELECT * FROM formulir WHERE id_formulir='$id_formulir'";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {

                                while ($data = mysqli_fetch_assoc($result)) {
                            ?>
                                    <table id="example" class="table table-primary" style="width:100%">
                                        <tr>
                                            <td width="30%"><label for="nama_mhs">Nama Lengkap Mahasiswa</label></td>
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
                <br>
                <div class="row mx-3">
                    <div class="card card-body shadow">
                        <h3 class="modal-header">Upload Laporan</h3>
                        <!-- Accordion -->
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Syarat & Ketentuan File Dokumen
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>Harap memenuhi setiap syarat dan ketentuan di bawah ini!</strong><br><br>
                                        <div class="table-responsive">
                                            <table class="table table-dark">
                                                <tr>
                                                    <td>Ukuran (size) File</td>
                                                    <td>: </td>
                                                    <td>Maksimal 5 MB</td>
                                                </tr>
                                                <tr>
                                                    <td>Jenis File </td>
                                                    <td>: </td>
                                                    <td>PDF, DOC, DOCS, JPG, JPEG, PNG</td>
                                                </tr>
                                                <tr>
                                                    <td>Ekstensi File </td>
                                                    <td>: </td>
                                                    <td>.pdf, .doc, .docs, .jpg, .jpeg, .png</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="text" name="id_formulir" id="id_formulir" value="<?= $id_formulir ?>" hidden required>
                            <div class="mb-3">
                                <label for="file">File Dokumen</label>
                                <p><input type="file" class="form-control" name="file" id="file" accept="application/pdf, application/doc, application/docx, image/jpeg, image/jpg, image/png" required></p>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_dokumen">Jenis Dokumen</label>
                                <input placeholder="Format dokumen (pdf, doc, docx, jpg, jpeg, png)" name="jenis_dokumen" id="jenis_dokumen" class="form-control" id="jenis_dokumen" type="text" required />
                            </div>
                            <div class="mb-3">
                                <label for="nama_dokumen">Nama Dokumen</label>
                                <input placeholder="Cth: Sertifikat" name="nama_dokumen" id="nama_dokumen" class="form-control" id="nama_dokumen" type="text" required />
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="modal-footer mt-3">
                                        <input type="submit" value="UPLOAD" name="tambahlaporanakhir" class="btn btn-info">
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row mx-3 mt-4">
                <div class="card card-body shadow">
                    <h3 class="modal-header mb-3">Dokumen Tersimpan</h3>
                    <div id="employee_table" class="table-responsive">
                        <table id="example" class="table table-striped" style="width:100%">
                            <tr>
                                <th width="5%">No</th>
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