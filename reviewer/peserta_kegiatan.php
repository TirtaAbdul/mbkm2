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
                            <th>Prodi</th>
                            <th>Jenis Prog</th>
                            <th>NIK Dospem</th>
                            <th>Nama Dospem</th>
                            <th>Status</th>
                            <th>Aksi</th>
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
                                        <td><?php echo $data['nim']; ?></td>
                                        <td><?php echo $data['prodi_asal']; ?></td>
                                        <td><?php echo $data['jenis_program']; ?></td>
                                        <td><?php echo $data['nik_dospem']; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td><?php echo $data['status']; ?></td>
                                        <td>
                                            <!-- Button Detail Kegiatan Peserta -->
                                            <a href="../reviewer/template.php?page=detail_kegiatan&&id_formulir=<?php echo $data['id_formulir']; ?>"><button class="btn btn-secondary btn-sm">Detail</button></a>
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