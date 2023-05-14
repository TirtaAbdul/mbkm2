</ul>
</div>
</nav>
<main class="content">


    <!--Table-->
    <br></br>
    <h1 class="text-center">Data Pendaftar</h1>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Program Studi</th>
                <th>Jenis Program</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        $no = 1;
        $query = "SELECT user.id_user, user.nim_nik, user.nama, formulir.id_formulir, formulir.prodi_asal, formulir.jenis_program, formulir.status FROM formulir LEFT JOIN user ON formulir.id_user = user.id_user WHERE formulir.status = 'Diajukan'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {

            while ($data = mysqli_fetch_assoc($result)) {
        ?>

                <tr>
                    <td><?php echo $data['nim_nik']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['prodi_asal']; ?></td>
                    <td><?php echo $data['jenis_program']; ?></td>
                    <td><?php echo $data['status']; ?></td>
                    <td>
                        <a href="../reviewer/template.php?page=detail_pendaftar&&id_formulir=<?php echo $data['id_formulir'] ?>"><button class="btn btn-info btn-sm">Detail</button></a>
                    </td>
                </tr>

        <?php }
        } ?>
    </table>
    </div>
    </tbody>
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
    </table>
    </div>
    </body>