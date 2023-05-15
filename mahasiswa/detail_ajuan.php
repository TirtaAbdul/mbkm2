<?php
$id_formulir = $_GET['id_formulir'];
$_SESSION['id_formulir'] = $id_formulir;

if (isset($_POST['ajukansekarang'])) {
    $id_formulir = $_POST['id_formulir'];

    $query = "UPDATE formulir SET status = 'Diajukan' WHERE id_formulir='$id_formulir'";
    $result = mysqli_query($conn, $query);
    echo '<script type="text/javascript">
        alert("SELURUH DATA AJUAN BERHASIL DIAJUKAN!");
        window.location = "?page=dashboard";
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
                <h2 class="h10 mt-3 mb-5 text-center"><b>Detail Ajuan</b></h2>
                <form action="" method="post">
                    <input type="text" name="id_formulir" value="<?= $id_formulir ?>" hidden>
                    <div><button id="demo" name="ajukansekarang" class="btn btn-success box mb-3" onclick="return confirm('Yakin ingin mengajukan sekarang juga? Setelah diajukan, Anda tidak dapat mengubahnya kembali!')"><b>AJUKAN SEKARANG!</b></button></div>
                </form>
                <div id="table-employee" class="table-responsive">
                    <table id="example" class="table table-striped" style="width:100%">
                        <tr>
                            <th>
                                <h6><b>Tahapan</b></h6>
                            </th>
                            <th>
                                <h6><b>Detail</b></h6>
                            </th>
                        </tr>
                        <tr>
                            <th>Formulir Pendaftaran</th>
                            <td> <a href="../mahasiswa/template.php?page=form_pendaftaran&&id_formulir=<?= $id_formulir ?>"><button class="btn btn-secondary btn-sm">Lihat / Isi</button></a></td>
                        </tr>

                        <tr>
                            <th>Syarat Berkas Portofolio</th>
                            <td><a href="../mahasiswa/template.php?page=berkas_portofolio&&id_formulir=<?= $id_formulir ?>"><button class="btn btn-secondary btn-sm">Lihat / Isi</button></a></td>
                        </tr>
                    </table>
                </div>
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