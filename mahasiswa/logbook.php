<?php
$id_formulir = $_GET['id_formulir'];
$_SESSION['id_formulir'] = $id_formulir;

if (isset($_POST['tambahlogbook'])) {
    $id_formulir = ($_POST['id_formulir']);
    $tanggal = ($_POST['tanggal']);
    $kegiatan = $_POST['kegiatan'];
    $kegiatan = addcslashes($_POST['kegiatan'], '\'');
    // $kegiatanb = htmlspecialchars($_POST['kegiatan'], ENT_QUOTES);

    $queryadd = "INSERT INTO `logbook` (`id_logbook`, `id_formulir`, `tanggal`, `kegiatan`) VALUES (NULL, '$id_formulir', '$tanggal', '$kegiatan')";
    $resultadd = mysqli_query($conn, $queryadd);
    if (!$resultadd) {
        echo "Penambahan logbook gagal, silahkan ulangi..";
    }
}

if (isset($_GET['hapuslogbook'])) {
    $id_logbook = $_GET['hapuslogbook'];

    $querydelete = "DELETE FROM logbook WHERE id_logbook='$id_logbook'";
    $resultdelete = mysqli_query($conn, $querydelete);
    echo "<meta http-equiv=refresh content=2;URL='?page=logbook&&id_formulir=$id_formulir ?>'>";
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
                <h2 class="h10 mt-3 mb-5 text-center"><b>Logbook Kegiatan</b></h2>
                <div class="row mx-3">
                    <div class="card card-body shadow">
                        <div id="employee_table" class="table-responsive">
                            <?php
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

                <div class="row mx-3 mt-4">
                    <div class="card card-body shadow">
                        <h3 class="modal-header">Tambah Logbook</h3>
                        <form action="" method="POST">
                            <input name="id_formulir" value="<?= $id_formulir ?>" class="form-control" id="id_formulir" type="text" required hidden>
                            <div class="mb-3">
                                <label for="tanggal">Tanggal</label>
                                <input name="tanggal" class="form-control" id="tanggal" type="date" required>
                            </div>
                            <div class="mb-3">
                                <label for="Kegiatan" class="form-label">Rincian Kegiatan</label>
                                <textarea rows="4" placeholder="Uraikan progress / kegiatan yang anda lakukan" name="kegiatan" class="form-control" id="kegiatan" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="modal-footer mt-3">
                                        <input type="submit" value="TAMBAH" name="tambahlogbook" class="btn btn-info"></input>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row mx-3 mt-4">
                <div class="card card-body shadow">
                    <h3 class="modal-header mb-3">Data Logbook</h3>
                    <div id="employee_table" class="table-responsive">
                        <table id="example" class="table table-striped" style="width:100%">
                            <tr>
                                <th width="5%">No</th>
                                <th width="15%">Tanggal</th>
                                <th width="60%">Kegiatan</th>
                                <th width="20%">Aksi</th>
                            </tr>
                            </thead>

                            <?php
                            $no = 1;
                            $query = "SELECT * FROM logbook WHERE id_formulir='$id_formulir'";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {

                                while ($data = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['tanggal']; ?></td>
                                        <td><?= $data['kegiatan']; ?></td>
                                        <td>
                                            <a href="?page=logbook&&id_formulir=<?= $id_formulir ?>&&hapuslogbook=<?= $data['id_logbook'] ?>" onclick="return confirm('Yakin ingin menghapus Logbook?')">
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