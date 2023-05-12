</ul>
</div>
</nav>
<main class="content">


    <!--Table-->
    <br></br>
    <h1 class="text-center">Pengajuan Dosen Pembimbing</h1>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama Mhs</th>
                <th>Prodi</th>
                <th>Jenis Program</th>
                <!-- <th>Status</th> -->
                <th>NIK Dosen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        $no = 1;
        $query = "SELECT user.id_user, user.nim_nik, user.nama, formulir.id_formulir, formulir.prodi_asal, formulir.jenis_program, formulir.status, assign_dospem.id_dospem
        FROM formulir 
        LEFT JOIN user ON formulir.id_user = user.id_user 
        LEFT JOIN assign_dospem ON formulir.id_formulir = assign_dospem.id_formulir
        -- LEFT JOIN user ON assign_dospem.id_dospem = user.id_user 
        WHERE formulir.status = 'Disetujui'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $i = 1;
            while ($data = mysqli_fetch_assoc($result)) {
        ?>

                <tr>
                    <td><?php echo $data['nim_nik']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['prodi_asal']; ?></td>
                    <td><?php echo $data['jenis_program']; ?></td>
                    <!-- <td><php echo $data['status']; ?></td> -->
                    <td><?php echo $data['id_dospem']; ?></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $data['id_formulir'] ?>">
                            Detail
                        </button>
                        <div class="modal fade" id="exampleModal<?= $data['id_formulir'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Penentuan Dospem</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../reviewer/proses_assign_dospem.php" autocomplete="off" method="POST" accept-charset="utf-8">
                                            <div class="mb-3">
                                                <input name="id_user" value="<?= $id_user ?>" class="form-control" id="id_user" type="text" hidden required />
                                            </div>

                                            <div class="mb-3">
                                                <input name="id_formulir" value="<?= $data['id_formulir'] ?>" class="form-control" id="id_formulir" type="text" hidden required />
                                            </div>

                                            <div class="mb-3">
                                                <!-- <label for="jurusan" class="form-label">Jurusan Dosen</label> -->
                                                <!-- <select name="jurusan" id="jenis_progam" class="form-control" required>
                                                    <option selected class="text-center" value="">-- Pilih Jurusan Dosen --</option>
                                                    <option>Teknik Elektro</option>
                                                    <option>Teknik Informatika</option>
                                                    <option>Teknik Mesin</option>
                                                    <option>Manajemen Bisnis</option>
                                                </select> -->
                                            </div>

                                            <div class="mb-3">
                                                <label for="id_dospem" class="form-label">Dosen Pembimbing</label>
                                                <select name="id_dospem" class="form-control mb-3">
                                                    <option selected value="" class="text-center">-- Pilih Dosen Pembimbing --</option>
                                                    <?php
                                                    $query2 = "SELECT * FROM user WHERE role='dospem'";
                                                    $result2 = mysqli_query($conn, $query2);

                                                    if (mysqli_num_rows($result2) > 0) {
                                                        $i = 1;
                                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                                    ?>
                                                            <option value="<?= $row2['id_user']; ?>"> <?= $row2['nim_nik'] ?> -- <?= $row2['nama'] ?> </option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Update / Simpan">
                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

        <?php $i++;
            }
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