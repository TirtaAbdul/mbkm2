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
                <br>
                <div class="row mx-3">
                    <div class="card card-body shadow">
                        <div id="employee_table">
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
                                    <td> <a href="../mahasiswa/template.php?page=ajuan_view&&id_formulir=<?= $id_formulir ?>"><button class="btn btn-secondary btn-sm">Lihat Data</button></a></td>
                                </tr>
                                <tr>
                                    <th>Logbook Kegiatan</th>
                                    <td> <a href="../mahasiswa/template.php?page=logbook&&id_formulir=<?= $id_formulir ?>"><button class="btn btn-secondary btn-sm">Lihat / Isi</button></a></td>
                                </tr>
                                <tr>
                                    <th>Laporan Akhir</th>
                                    <td><a href="../mahasiswa/template.php?page=laporan_akhir&&id_formulir=<?= $id_formulir ?>"><button class="btn btn-secondary btn-sm">Lihat / Isi</button></a></td>
                                </tr>
                                <tr>
                                    <th>Umpan Balik</th>
                                    <td>
                                        <a href="../mahasiswa/template.php?page=umpan_balik&&id_formulir=<?= $id_formulir ?>"><button class="btn btn-secondary btn-sm">Isi Umpan Balik</button></a>
                                        <a href="../mahasiswa/template.php?page=umpan_balik_view&&id_formulir=<?= $id_formulir ?>"><button class="btn btn-secondary btn-sm">Lihat Umpan Balik</button></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nilai Kegiatan</th>
                                    <td><button class="btn btn-secondary btn-sm" disabled>Lihat Nilai</button></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                </table>
            </div>
        </div>
    </div>
    <!-- <script>
        function ajukanSekarang() {
            var txt;
            if (confirm("Yakin ingin mengajukan sekarang juga? Setelah diajukan, Anda tidak dapat mengubahnya kembali")) {
                // txt = "You pressed OK!";
                window.location = '<= "../mahasiswa/proses_ajukansekarang.php?id_formulir=$id_formulir" ?>';
            } else {
                txt = "<b>AJUKAN SEKARANG!</b>";
            }
            document.getElementById("demo").innerHTML = txt;
        }
    </script> -->