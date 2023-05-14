<?php
$id_formulir = $_GET['id_formulir'];
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
                <center>
                    <h2 class="h10 mb-4">Asesmen Berkas Portofolio</h2>
                </center>
                <br />
                <h4>Data Mahasiswa</h4>
                <?php
                $no = 1;
                $search = '../mahasiswa/berkas_portofolio/';
                $query = "SELECT user.nim_nik, user.nama, formulir.prodi_asal, formulir.jenis_program,
                formulir.jenis_dokumen, formulir.tautan_skj, formulir.tautan_sksehat, formulir.tautan_suratortu,
                formulir.tautan_suratpakta, formulir.tautan_transkipnilai, formulir.tautan_cv,
                formulir.tautan_pelatihan, formulir.tautan_produk, formulir.tautan_dokumen_lain
                FROM formulir 
                LEFT JOIN user
                ON formulir.nim = user.nim_nik
                WHERE id_formulir='$id_formulir'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {

                    while ($data = mysqli_fetch_assoc($result)) {
                ?>
                        <table>
                            <tr>
                                <td class="kiri"><label for="nama">Nama Lengkap </label></td>
                                <td class="tengah">:</td>
                                <td><?php echo $data['nama']; ?></td>
                            </tr>
                            <tr>
                                <td class="kiri"><label for="nim_nik">Nomor Induk Mahasiswa </label></td>
                                <td class="tengah">:</td>
                                <td><?php echo $data['nim_nik']; ?></td>
                            </tr>
                            <tr>
                                <td class="kiri"><label for="prodi_asal">Program Studi </label></td>
                                <td class="tengah">:</td>
                                <td><?php echo $data['prodi_asal']; ?></td>
                            </tr>
                            <tr>
                                <td class="kiri"><label for="jenis_program">Jenis program Merdeka Belajar </label></td>
                                <td class="tengah">:</td>
                                <td><?php echo $data['jenis_program']; ?></td>
                            </tr>
                        </table>
                        </br>
                        </br>

                        <form action="upload_portofolio.php" method="POST" enctype="multipart/form-data">

                            <center>
                                <p class="h5"><strong>Upload Dokumen</strong></p>
                            </center>

                            <input type="hidden" name="id_formulir" value="<?php echo $id_formulir ?>">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Dokumen</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Surat Rekomendasi Perguruan Tinggi / Jurusan Asal</td>
                                        <td>
                                            <div class="col-md-6">
                                                <label for="file"></label>
                                                <?php if (isset($data['tautan_skj']) && str_replace($search, '', $data['tautan_skj']) != '') { ?>
                                                    <a href="../mahasiswa/berkas_portofolio/<?php echo str_replace($search, '', $data['tautan_skj']); ?>" class="btn btn-info btn-sm">Lihat</a>
                                                    <button type="button" class="btn btn-warning btn-sm" data-skj="<?php echo str_replace($search, '', $data['tautan_skj']); ?>" data-bs-toggle="modal" data-bs-target="#exampleModal1">Edit</button>
                                                <?php } else { ?>
                                                    <input type="file" name="tautan_skj" id="file" accept="application/pdf, application/doc, application/docx, image/jpeg, image/jpg, image/png">
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Surat Keterangan Sehat</td>
                                        <td>
                                            <div class="col-md-6">
                                                <label for="file"></label>
                                                <?php if (isset($data['tautan_sksehat']) && str_replace($search, '', $data['tautan_sksehat']) != '') { ?>
                                                    <a href="../mahasiswa/berkas_portofolio/<?php echo str_replace($search, '', $data['tautan_sksehat']); ?>" class="btn btn-info btn-sm">Lihat</a>
                                                    <button type="button" class="btn btn-warning btn-sm" data-sksehat="<?php echo str_replace($search, '', $data['tautan_sksehat']); ?>" data-bs-toggle="modal" data-bs-target="#exampleModal2">Edit</button>
                                                <?php } else { ?>
                                                    <input type="file" name="tautan_sksehat" id="file" accept="application/pdf, application/doc, application/docx, image/jpeg, image/jpg, image/png">
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Surat Persetujuan dari Orang Tua</td>
                                        <td>
                                            <div class="col-md-6">
                                                <label for="file"></label>
                                                <?php if (isset($data['tautan_suratortu']) && str_replace($search, '', $data['tautan_suratortu']) != '') { ?>
                                                    <a href="../mahasiswa/berkas_portofolio/<?php echo str_replace($search, '', $data['tautan_suratortu']); ?>" class="btn btn-info btn-sm">Lihat</a>
                                                    <button type="button" class="btn btn-warning btn-sm" data-suratorangtua="<?php echo str_replace($search, '', $data['tautan_suratortu']); ?>" data-bs-toggle="modal" data-bs-target="#exampleModal3">Edit</button>
                                                <?php } else { ?>
                                                    <input type="file" name="tautan_suratortu" id="file" accept="application/pdf, application/doc, application/docx, image/jpeg, image/jpg, image/png">
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Surat Pakta Integritas</td>
                                        <td>
                                            <div class="col-md-6">
                                                <label for="file"></label>
                                                <?php if (isset($data['tautan_suratpakta']) && str_replace($search, '', $data['tautan_suratpakta']) != '') { ?>
                                                    <a href="../mahasiswa/berkas_portofolio/<?php echo str_replace($search, '', $data['tautan_suratpakta']); ?>" class="btn btn-info btn-sm">Lihat</a>
                                                    <button type="button" class="btn btn-warning btn-sm" data-suratpakta="<?php echo str_replace($search, '', $data['tautan_suratpakta']); ?>" data-bs-toggle="modal" data-bs-target="#exampleModal4">Edit</button>
                                                <?php } else { ?>
                                                    <input type="file" name="tautan_suratpakta" id="file" accept="application/pdf, application/doc, application/docx, image/jpeg, image/jpg, image/png">
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Transkip Nilai</td>
                                        <td>
                                            <div class="col-md-6">
                                                <label for="file"></label>
                                                <?php if (isset($data['tautan_transkipnilai']) && str_replace($search, '', $data['tautan_transkipnilai']) != '') { ?>
                                                    <a href="../mahasiswa/berkas_portofolio/<?php echo str_replace($search, '', $data['tautan_transkipnilai']); ?>" class="btn btn-info btn-sm">Lihat</a>
                                                    <button type="button" class="btn btn-warning btn-sm" data-transkripnilai="<?php echo str_replace($search, '', $data['tautan_transkipnilai']); ?>" data-bs-toggle="modal" data-bs-target="#exampleModal5">Edit</button>
                                                <?php } else { ?>
                                                    <input type="file" name="tautan_transkipnilai" id="file" accept="application/pdf, application/doc, application/docx, image/jpeg, image/jpg, image/png">
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><b>Tambahan</b></th>
                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td>Biodata / Curriculum Vitae</td>
                                        <td>
                                            <div class="col-md-6">
                                                <label for="file"></label>
                                                <?php if (isset($data['tautan_cv']) && str_replace($search, '', $data['tautan_cv']) != '') { ?>
                                                    <a href="../mahasiswa/berkas_portofolio/<?php echo str_replace($search, '', $data['tautan_cv']); ?>" class="btn btn-info btn-sm">Lihat</a>
                                                    <button type="button" class="btn btn-warning btn-sm" data-cv="<?php echo str_replace($search, '', $data['tautan_cv']); ?>" data-bs-toggle="modal" data-bs-target="#exampleModal6">Edit</button>
                                                <?php } else { ?>
                                                    <input type="file" name="tautan_cv" id="file" accept="application/pdf, application/doc, application/docx, image/jpeg, image/jpg, image/png">
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">7</th>
                                        <td>Sertifikat Pelatihan / Workshop</td>
                                        <td>
                                            <div class="col-md-6">
                                                <label for="file"></label>
                                                <?php if (isset($data['tautan_pelatihan']) && str_replace($search, '', $data['tautan_pelatihan']) != '') { ?>
                                                    <a href="../mahasiswa/berkas_portofolio/<?php echo str_replace($search, '', $data['tautan_pelatihan']); ?>" class="btn btn-info btn-sm">Lihat</a>
                                                    <button type="button" class="btn btn-warning btn-sm" data-pelatihan="<?php echo str_replace($search, '', $data['tautan_pelatihan']); ?>" data-bs-toggle="modal" data-bs-target="#exampleModal7">Edit</button>
                                                <?php } else { ?>
                                                    <input type="file" name="tautan_pelatihan" id="file" accept="application/pdf, application/doc, application/docx, image/jpeg, image/jpg, image/png">
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">8</th>
                                        <td>Karya Tulis / Produk</td>
                                        <td>
                                            <div class="col-md-6">
                                                <label for="file"></label>
                                                <?php if (isset($data['tautan_produk']) && str_replace($search, '', $data['tautan_produk']) != '') { ?>
                                                    <a href="../mahasiswa/berkas_portofolio/<?php echo str_replace($search, '', $data['tautan_produk']); ?>" class="btn btn-info btn-sm">Lihat</a>
                                                    <button type="button" class="btn btn-warning btn-sm" data-produk="<?php echo str_replace($search, '', $data['tautan_produk']); ?>" data-bs-toggle="modal" data-bs-target="#exampleModal8">Edit</button>
                                                <?php } else { ?>
                                                    <input type="file" name="tautan_produk" id="file" accept="application/pdf, application/doc, application/docx, image/jpeg, image/jpg, image/png">
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">9</th>
                                        <td>Dokumen Lainnya</td>
                                        <td>
                                            <div class="col-md-6">
                                                <label for="file"></label>
                                                <?php if (isset($data['tautan_dokumen_lain']) && str_replace($search, '', $data['tautan_dokumen_lain']) != '') { ?>
                                                    <a href="../mahasiswa/berkas_portofolio/<?php echo str_replace($search, '', $data['tautan_dokumen_lain']); ?>" class="btn btn-info btn-sm">Lihat</a>
                                                    <button type="button" class="btn btn-warning btn-sm" data-dokumen="<?php echo str_replace($search, '', $data['tautan_dokumen_lain']); ?>" data-bs-toggle="modal" data-bs-target="#exampleModal9">Edit</button>
                                                <?php } else { ?>
                                                    <input type="file" name="tautan_dokumen_lain" id="file" accept="application/pdf, application/doc, application/docx, image/jpeg, image/jpg, image/png">
                                                <?php } ?>

                                            </div>
                                        </td>
                                    </tr>
                            <?php
                        }
                    } ?>
                                </tbody>
                            </table>
                            </br>
                            <div class="modal-footer">
                                <a href="../mahasiswa/template.php?page=detail_ajuan&&id_formulir=<?= $id_formulir; ?>"><input type="button" value="Kembali" class="btn btn-secondary"></input></a>
                                <input type="submit" name="uploadportofolio" value="Upload / Simpan" class="btn btn-success"></input>
                            </div>
                        </form>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Dokumen</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="edit_portofolio.php" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="hidden" name="id_formulir" value="<?php echo $id_formulir ?>">
                                            <label for="file"></label>
                                            <input type="file" name="tautan_skj" id="skj" accept="application/pdf, application/doc, application/docx, image/jpeg, image/jpg, image/png">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="uploadportofolio" class="btn btn-primary btn-sm">Upload</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabe1">Edit Dokumen</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="edit_portofolio.php" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="hidden" name="id_formulir" value="<?php echo $id_formulir ?>">
                                            <label for="file"></label>
                                            <input type="file" name="tautan_sksehat" id="sksehat" accept="application/pdf, application/doc, application/docx, image/jpeg, image/jpg, image/png">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="uploadportofolio" class="btn btn-primary btn-sm">Upload</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Dokumen</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="edit_portofolio.php" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="hidden" name="id_formulir" value="<?php echo $id_formulir ?>">
                                            <label for="file"></label>
                                            <input type="file" name="tautan_suratortu" id="suratorangtua" accept="application/pdf, application/doc, application/docx, image/jpeg, image/jpg, image/png">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="uploadportofolio" class="btn btn-primary btn-sm">Upload</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Dokumen</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="edit_portofolio.php" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="hidden" name="id_formulir" value="<?php echo $id_formulir ?>">
                                            <label for="file"></label>
                                            <input type="file" name="tautan_suratpakta" id="suratpakta" accept="application/pdf, application/doc, application/docx, image/jpeg, image/jpg, image/png">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="uploadportofolio" class="btn btn-primary btn-sm">Upload</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Dokumen</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="edit_portofolio.php" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="hidden" name="id_formulir" value="<?php echo $id_formulir ?>">
                                            <label for="file"></label>
                                            <input type="file" name="tautan_transkipnilai" id="transkipnilai" accept="application/pdf, application/doc, application/docx, image/jpeg, image/jpg, image/png">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="uploadportofolio" class="btn btn-primary btn-sm">Upload</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Dokumen</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="edit_portofolio.php" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="hidden" name="id_formulir" value="<?php echo $id_formulir ?>">
                                            <label for="file"></label>
                                            <input type="file" name="tautan_cv" id="cv" accept="application/pdf, application/doc, application/docx, image/jpeg, image/jpg, image/png">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="uploadportofolio" class="btn btn-primary btn-sm">Upload</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModal7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Dokumen</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="edit_portofolio.php" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="hidden" name="id_formulir" value="<?php echo $id_formulir ?>">
                                            <label for="file"></label>
                                            <input type="file" name="tautan_pelatihan" id="pelatihan" accept="application/pdf, application/doc, application/docx, image/jpeg, image/jpg, image/png">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="uploadportofolio" class="btn btn-primary btn-sm">Upload</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModal8" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Dokumen</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="edit_portofolio.php" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="hidden" name="id_formulir" value="<?php echo $id_formulir ?>">
                                            <label for="file"></label>
                                            <input type="file" name="tautan_produk" id="produk" accept="application/pdf, application/doc, application/docx, image/jpeg, image/jpg, image/png">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="uploadportofolio" class="btn btn-primary btn-sm">Upload</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModal9" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Dokumen</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="edit_portofolio.php" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="hidden" name="id_formulir" value="<?php echo $id_formulir ?>">
                                            <label for="file"></label>
                                            <input type="file" name="tautan_dokumen_lain" id="dokumen" accept="application/pdf, application/doc, application/docx, image/jpeg, image/jpg, image/png">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="uploadportofolio" class="btn btn-primary btn-sm">Upload</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>