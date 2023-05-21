<!-- Konfig Modal Tambah Jenis Program Ajuan -->
<?php
if (isset($_POST['buatajuan'])) {
    $nim = $_POST['nim'];
    $jenis_program = ($_POST['jenis_program']);

    $query = "INSERT INTO formulir (id_formulir, nim, jenis_program) VALUES(DEFAULT, '$nim', '$jenis_program')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "Pengajuan gagal, silahkan ulangi..";
    }
}
?>

<!-- Isi Konten -->
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
                <h2 class="h10 mt-3 mb-5 text-center"><b>Daftar dan Status Ajuan</b></h2>
                <div class="my-3">
                    <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <b>BUAT AJUAN BARU</b>
                    </button>
                </div>
                <div id="table-employee" class="table-responsive">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <th width="5%">No</th>
                            <th width="25%">Jenis Kegiatan</th>
                            <th width="25%">Judul Program</th>
                            <th width="10%">Tgl/Waktu Ajuan</th>
                            <th width="10%">Status</th>
                            <th width="10%">Aksi</th>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = "SELECT * FROM formulir WHERE nim='$nim' && status!='Peserta Kegiatan'";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {

                                while ($data = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?php echo $data['jenis_program']; ?></td>
                                        <td><?php echo $data['judul_program']; ?></td>
                                        <td><?php echo $data['tgl_ajuan']; ?></td>
                                        <td><?php echo $data['status']; ?></td>

                                        <td>
                                            <!-- <a href="../mahasiswa/template.php?page=detail_ajuan&&id_formulir=<php echo $data['id_formulir']; ?>"><button class="btn btn-secondary btn-sm">Detail</button></a> -->
                                            <?php
                                            $status = $data['status'];

                                            if ($status == 'Diajukan') {
                                                echo '<button class="btn btn-secondary btn-sm" disabled>Detail</button>';
                                            } else {
                                                echo '<a href="../mahasiswa/template.php?page=detail_ajuan&&id_formulir=' . $data['id_formulir'] . '"><button class="btn btn-secondary btn-sm">Detail</button></a>';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Ajuan -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Buat Ajuan Baru</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" autocomplete="off" method="POST" accept-charset="utf-8">
                            <div class="mb-3">
                                <input name="nim" value="<?= $nim ?>" class="form-control" type="text" hidden required>
                            </div>

                            <div class="mb-3">
                                <label for="jenis_program" class="form-label">Jenis Program</label>
                                <select name="jenis_program" id="jenis_progam" class="form-control" required>
                                    <option selected class="text-center" value="">-- Pilih Jenis Program Merdeka Belajar --</option>
                                    <option>Penelitian / Riset</option>
                                    <option>Proyek Kemanusiaan</option>
                                    <option>Kegiatan Wirausaha</option>
                                    <option>Studi / Proyek Independent</option>
                                    <option>Membangun Desa / Kuliah Kerja Nyata Tematik</option>
                                    <option>Magang Praktik Kerja</option>
                                    <option>Asistensi Mengajar di Satuan Pendidikan</option>
                                    <option>Pertukaran Pelajar</option>
                                </select>
                            </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" name="buatajuan" class="btn btn-success">Buat Ajuan</button>
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