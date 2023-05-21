<?php
$id_formulir = $_GET['id_formulir'];
$_SESSION['id_formulir'] = $id_formulir;

if (isset($_POST['ajukansekarang'])) {
    $id_formulir = $_POST['id_formulir'];

    $tz = 'Asia/Jakarta';
    $dt = new DateTime("now", new DateTimeZone($tz));
    $timestamp = $dt->format('Y-m-d G:i:s');


    $query = "UPDATE formulir SET tgl_ajuan = '$timestamp', status = 'Diajukan' WHERE id_formulir='$id_formulir'";
    $result = mysqli_query($conn, $query);
    echo '<script type="text/javascript">
        alert("SELURUH DATA AJUAN BERHASIL DIAJUKAN!");
        window.location = "?page=pengajuan";
        </script>';
    if (!$result) {
        '<script type="text/javascript">
        alert("Pengajuan gagal, silahkan ulangi...");
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
                <div class="clearfix">
                    <a class="btn btn-danger btn-lg float-end" href="../mahasiswa/template.php?page=pengajuan" role="button">Keluar (X)</a>
                </div>
                <h2 class="h10 mt-3 mb-5 text-center"><b>Pra-Syarat Ajuan yang Wajib Dilengkapi</b></h2>
                <div id="table-employee" class="table-responsive mt-5 mx-5">
                    <table id="example" class="table table-striped" style="width:100%">
                        <tr>
                            <th>
                                <h4>No</h4>
                            </th>
                            <th>
                                <h4>Daftar Syarat</h4>
                            </th>
                            <th>
                                <h4 style="text-align:center;">Aksi</h4>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <h5>1.</h5>
                            </th>
                            <th>
                                <h5>Formulir Pendaftaran</h5>
                            </th>
                            <td style="text-align:center;"> <a href="../mahasiswa/template.php?page=form_pendaftaran&&id_formulir=<?= $id_formulir ?>"><button class="btn btn-secondary">
                                        <h5>Lengkapi Data</h5>
                                    </button></a></td>
                        </tr>

                        <tr>
                            <th>
                                <h5>2.</h5>
                            </th>
                            <th>
                                <h5>Berkas dan Dokumen Portofolio</h5>
                            </th>
                            <td style="text-align:center;"><a href="../mahasiswa/template.php?page=berkas_portofolio&&id_formulir=<?= $id_formulir ?>"><button class="btn btn-secondary">
                                        <h5>Lengkapi Data</h5>
                                    </button></a></td>
                        </tr>
                    </table>
                    <br>
                    <form action="" method="post">
                        <input type="text" name="id_formulir" value="<?= $id_formulir ?>" hidden>
                        <div class="row">
                            <div class="col-12">
                                <div class="modal-footer mt-3">
                                    <input type="submit" value="AJUKAN SEKARANG!" name="ajukansekarang" class="btn btn-success btn-lg" onclick="return confirm('Yakin ingin mengajukan sekarang juga? PASTIKAN ANDA TELAH MENGISI SELURUH SYARAT DI ATAS! Setelah diajukan, Anda tidak dapat mengubahnya kembali!')"></input>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>