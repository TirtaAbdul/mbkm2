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
                <h2 class="h10 mt-3 mb-5 text-center"><b>Pelaksanaan dan History Kegiatan</b></h2>
                <div id="table-employee" class="table-responsive">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <th width="5%">No</th>
                            <th width="25%">Jenis Kegiatan</th>
                            <th width="25%">Judul Program</th>
                            <th width="10%">Tanggal Mulai</th>
                            <th width="10%">Status</th>
                            <th width="10%">Aksi</th>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = "SELECT * FROM formulir WHERE nim='$nim' && status='Peserta Kegiatan'";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {

                                while ($data = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?php echo $data['jenis_program']; ?></td>
                                        <td><?php echo $data['judul_program']; ?></td>
                                        <td><?php echo $data['tgl_mulai']; ?></td>
                                        <td>
                                            <?php
                                            $status = $data['status'];

                                            if ($status == 'Peserta Kegiatan') {
                                                echo 'Sedang Berlangsung';
                                            } else {
                                                echo $data['status'];
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="../mahasiswa/template.php?page=detail_kegiatan&&id_formulir=<?php echo $data['id_formulir']; ?>"><button class="btn btn-secondary btn-sm">Detail</button></a>
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