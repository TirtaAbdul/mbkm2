<?php
$id_formulir = $_GET['id_formulir'];
$_SESSION['id_formulir'] = $id_formulir;

if (isset($_POST['ubahdospem'])) {
    $id_formulir = $_POST['id_formulir'];
    $nik_dospem = $_POST['nik_dospem'];

    $querydospem = "UPDATE assign_dospem SET nik_dospem = $nik_dospem WHERE id_formulir = $id_formulir";

    $resultdospem = mysqli_query($conn, $querydospem);

    if ($resultdospem) {
        echo '<script type="text/javascript">
        alert("UPDATED: BERHASIL MENGUBAH DOSEN PEMBIMBING!");
        window.location = "?page=peserta_kegiatan";
        </script>';
    } else {
        echo '<script type="text/javascript">
        alert("Gagal Mengubah Dosen Pembimbing, silahkan ulangi...");
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
                <h2 class="h10 mt-3 mb-5 text-center"><b>Detail Kegiatan</b></h2>
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

                <div class="row mx-3 mt-4">
                    <div class="card card-body shadow">
                        <div id="employee_table" class="table-responsive">
                            <table id="example" class="table table-striped" style="width:100%">
                                <tr>
                                    <th>
                                        <h6><b>Dokumentasi</b></h6>
                                    </th>
                                    <th>
                                        <h6><b>Detail</b></h6>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Data Ajuan (Formulir Pendaftaran & Berkas Portofolio)</th>
                                    <td> <a href="../reviewer/template.php?page=ajuan_view&&id_formulir=<?= $id_formulir ?>"><button class="btn btn-secondary btn-sm">Lihat</button></a></td>
                                </tr>
                                <tr>
                                    <th>Hasil Asesmen Ajuan</th>
                                    <td> <a href="../reviewer/template.php?page=hasil_asesmen&&id_formulir=<?= $id_formulir ?>"><button class="btn btn-secondary btn-sm">Lihat</button></a></td>
                                </tr>
                                <tr>
                                    <th>Ubah Dosen Pembimbing</th>
                                    <td>
                                        <!-- Button Modal Ubah Dospem     -->
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ubah</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Umpan Balik Mahasiswa</th>
                                    <td>
                                        <button class="btn btn-secondary btn-sm" disabled>Lihat</button>
                                        <a href="../reviewer/template.php?page=umpan_balik_view&&id_formulir=<?= $id_formulir ?>"><button class="btn btn-secondary btn-sm">Lihat</button></a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tentukan Dospem (Add) -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Penentuan Dospem</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" accept-charset="utf-8">
                        <div class="mb-3">
                            <input name="id_formulir" value="<?= $id_formulir ?>" class="form-control" id="id_formulir" type="text" hidden required />
                        </div>
                        <div class="mb-3">
                            <label for="nik_dospem" class="form-label">Dosen Pembimbing</label>
                            <select name="nik_dospem" class="form-control mb-3">
                                <option selected value="" class="text-center">-- Pilih Dosen Pembimbing --</option>
                                <?php
                                $query = "SELECT * FROM user WHERE role='Dospem'";
                                $result = mysqli_query($conn, $query);

                                if (mysqli_num_rows($result) > 0) {
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <option value="<?= $row['nim_nik']; ?>"> <?= $row['nim_nik'] ?> -- <?= $row['nama'] ?> </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" name="ubahdospem" class="btn btn-success" onclick="return confirm('Yakin ingin mengubah Dosen Pembimbing?')">Tentukan Dospem</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>