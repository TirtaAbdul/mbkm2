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
                <h2 class="h10 mt-3 mb-5 text-center"><b>Daftar Ajuan</b></h2>
                <div id="table-employee" class="table-responsive">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Jenis Prog</th>
                            <th>Judul Prog</th>
                            <th>Tgl/Waktu Ajuan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = "SELECT user.nim_nik, user.nama, formulir.id_formulir, formulir.prodi_asal, formulir.jenis_program, formulir.judul_program, formulir.tgl_mulai, formulir.tgl_ajuan, formulir.status 
                        FROM formulir 
                        LEFT JOIN user 
                        ON formulir.nim = user.nim_nik WHERE formulir.status = 'Diajukan'";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {

                                while ($data = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?php echo $data['nim_nik']; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td><?php echo $data['prodi_asal']; ?></td>
                                        <td><?php echo $data['jenis_program']; ?></td>
                                        <td><?php echo $data['judul_program']; ?></td>
                                        <td><?php echo $data['tgl_ajuan']; ?></td>
                                        <td><?php echo $data['status']; ?></td>
                                        <td>
                                            <a href="../reviewer/template.php?page=detail_ajuan&&id_formulir=<?= $data['id_formulir'] ?>"><button class="btn btn-secondary btn-sm">Detail</button></a>
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