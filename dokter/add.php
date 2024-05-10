<?php
require_once 'navbar.php';
require_once 'sidebar.php';

require '../dbkoneksi.php';
if (isset($_POST["submit"])) {
    $_nama = $_POST['nama'];
    $_gender = $_POST['gender'];
    $_tmp_lahir = $_POST['tmp_lahir'];
    $_tgl_lahir = $_POST['tgl_lahir'];
    $_kategori = $_POST['kategori'];
    $_telpon = $_POST['telpon'];
    $_alamat = $_POST['alamat'];
    $_unit_kerja_id = $_POST['unit_kerja_id'];
    $data = [$_nama, $_gender, $_tmp_lahir, $_tgl_lahir, $_kategori, $_telpon, $_alamat, $_unit_kerja_id];
    $sql = "INSERT INTO dokter (nama, gender, tmp_lahir, tgl_lahir, kategori, telpon, alamat, unit_kerja_id) VALUES (?,? ,? ,? ,? ,? ,? ,?)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    echo "<script>window.location.href = 'index.php';</script>";
}
?>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Form Dokter</h4>
                            <p class="card-description">Input Data Dokter</p>

                            <form action="add.php" method="POST">
                                <div class="form-group row">
                                    <label for="nama" class="col-4 col-form-label">Nama</label>
                                    <div class="col-8">
                                        <input id="nama" name="nama" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gender" class="col-4 col-form-label">Jenis Kelamin</label>
                                    <div class="col-8">
                                        <select id="gender" name="gender" class="form-control">
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tmp_lahir" class="col-4 col-form-label">Tempat Lahir</label>
                                    <div class="col-8">
                                        <input id="tmp_lahir" name="tmp_lahir" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_lahir" class="col-4 col-form-label">Tanggal Lahir</label>
                                    <div class="col-8">
                                        <input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kategori" class="col-4 col-form-label">Kategori</label>
                                    <div class="col-8">
                                        <input id="kategori" name="kategori" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="telpon" class="col-4 col-form-label">Telpon</label>
                                    <div class="col-8">
                                        <input id="telpon" name="telpon" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-4 col-form-label">Alamat</label>
                                    <div class="col-8">
                                        <input id="alamat" name="alamat" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="unit_kerja_id" class="col-4 col-form-label">Unit Kerja ID</label>
                                    <div class="col-8">
                                        <?php
                                        $sqljenis = "SELECT * FROM unit_kerja";
                                        $rsjenis = $dbh->query($sqljenis);
                                        ?>
                                        <select id="unit_kerja_id" name="unit_kerja_id" class="form-control">
                                            <?php
                                            foreach ($rsjenis as $rowjenis) {
                                            ?>
                                                <option value="<?= $rowjenis['id'] ?>"><?= $rowjenis['nama'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
require_once 'footer.php';
?>