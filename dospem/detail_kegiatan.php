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
                                    <th>Logbook Kegiatan</th>
                                    <td> <a href="../dospem/template.php?page=logbook&&id_formulir=<?= $id_formulir ?>"><button class="btn btn-secondary btn-sm">Lihat</button></a></td>
                                </tr>
                                <tr>
                                    <th>Laporan Akhir</th>
                                    <td><a href="../dospem/template.php?page=laporan_akhir&&id_formulir=<?= $id_formulir ?>"><button class="btn btn-secondary btn-sm">Lihat</button></a></td>
                                </tr>
                                <tr>
                                    <th>Umpan Balik Mahasiswa</th>
                                    <td>
                                        <button class="btn btn-secondary btn-sm" disabled>Lihat</button>
                                        <a href="../dospem/template.php?page=umpan_balik&&id_formulir=<?= $id_formulir ?>"><button class="btn btn-secondary btn-sm">Lihat</button></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th> Instrumentasi Nilai Kegiatan</th>
                                    <td>
                                        <a href="../dospem/template.php?page=nilai&&id_formulir=<?= $id_formulir ?>"><button class="btn btn-secondary btn-sm">Isi Nilai</button></a>
                                        <a href="../dospem/template.php?page=nilai_view&&id_formulir=<?= $id_formulir ?>"><button class="btn btn-secondary btn-sm">Lihat</button></a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                </table>
            </div>
        </div>