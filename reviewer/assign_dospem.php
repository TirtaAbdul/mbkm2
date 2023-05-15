<!-- Konfig Modal Tambah Jenis Program Ajuan -->
<?php
if (isset($_POST['assigndospem'])) {
    $id_formulir = $_POST['id_formulir'];
    $nik_dospem = ($_POST['nik_dospem']);

    $querydospem = "INSERT INTO assign_dospem VALUES('$id_formulir', '$nik_dospem', '')";
    $resultdospem = mysqli_query($conn, $querydospem);
    if ($querydospem) {
        echo "Pembaruan Dosen Pembimbing gagal, silahkan ulangi..";
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
                <h2 class="h10 mt-3 mb-5 text-center"><b>Daftar Peserta Kegiatan</b></h2>
                <div id="table employee" class="table-responsive">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <th>No</th>
                            <th>NIM Mhs</th>
                            <th>Program Studi</th>
                            <th>Jenis Program</th>
                            <th>NIK Dospem</th>
                            <th>Nama Dospem</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = "SELECT formulir.id_formulir, formulir.nim, 
                        formulir.prodi_asal, formulir.jenis_program, formulir.status, 
                        assign_dospem.nik_dospem, user.nama
                        FROM formulir 
                        LEFT JOIN assign_dospem ON formulir.id_formulir = assign_dospem.id_formulir
                        LEFT JOIN user ON assign_dospem.nik_dospem = user.nim_nik
                        WHERE formulir.status = 'Peserta Kegiatan'";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {

                                while ($data = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?php echo $data['id_formulir']; ?></td>
                                        <td><?php echo $data['nim']; ?></td>
                                        <td><?php echo $data['prodi_asal']; ?></td>
                                        <td><?php echo $data['jenis_program']; ?></td>
                                        <td><?php echo $data['nik_dospem']; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td><?php echo $data['status']; ?></td>
                                        <td>
                                            <!-- Button Modal Update Penentuan Dospem -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $data['id_formulir'] ?>">Update</button>
                                            <!-- Modal Penentuan Dospem -->
                                            <div class="modal fade" id="exampleModal<?= $data['id_formulir'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Form Penentuan Dospem</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" autocomplete="off" method="POST" accept-charset="utf-8">

                                                                <div class="mb-3">
                                                                    <input name="id_formulir" value="<?= $data['id_formulir'] ?>" class="form-control" id="id_formulir" type="text" hidden required />
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="nik_dospem" class="form-label">Dosen Pembimbing</label>
                                                                    <select name="nik_dospem" class="form-control mb-3">
                                                                        <option selected value="" class="text-center">-- Pilih Dosen Pembimbing --</option>
                                                                        <?php
                                                                        $query2 = "SELECT * FROM user WHERE role='Dospem'";
                                                                        $result2 = mysqli_query($conn, $query2);

                                                                        if (mysqli_num_rows($result2) > 0) {
                                                                            $i = 1;
                                                                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                                                        ?>
                                                                                <option value="<?= $row2['nim_nik']; ?>"> <?= $row2['nim_nik'] ?> -- <?= $row2['nama'] ?> </option>
                                                                        <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="assigndospem" class="btn btn-success" onclick="return confirm('Yakin ingin memperbarui Dosen Pembimbing?')">Update Dospem</button>
                                                        </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Button Detail Kegiatan Peserta -->
                                            <a href="../reviewer/template.php?page=detail_kegiatan&&id_formulir=<?php echo $data['id_formulir']; ?>"><button class="btn btn-secondary btn-sm">Masuk</button></a>
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