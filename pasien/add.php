<?php
require_once 'navbar.php';
require_once 'sidebar.php';

require '../dbkoneksi.php';
if (isset($_POST["submit"])) {
    $_kode = $_POST['kode'];
    $_nama = $_POST['nama'];
    $_tmp_lahir = $_POST['tmp_lahir'];
    $_tgl_lahir = $_POST['tgl_lahir'];
    $_gender = $_POST['gender'];
    $_email = $_POST['email'];
    $_alamat = $_POST['alamat'];
    $_kelurahan_id = $_POST['kelurahan_id'];
    $data = [$_kode, $_nama, $_tmp_lahir, $_tgl_lahir, $_gender, $_email, $_alamat, $_kelurahan_id];
    $sql = "INSERT INTO pasien (kode, nama, tmp_lahir, tgl_lahir, gender, email, alamat, kelurahan_id) VALUES (?,? ,? ,? ,? ,? ,? ,?)";
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
                            <h4 class="card-title">Form Pasien</h4>
                            <p class="card-description">Input Data Pasien</p>

                            <form action="add.php" method="POST">
                                <div class="form-group row">
                                    <label for="kode" class="col-4 col-form-label">Kode</label>
                                    <div class="col-8">
                                        <input id="kode" name="kode" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-4 col-form-label">Nama</label>
                                    <div class="col-8">
                                        <input id="nama" name="nama" type="text" class="form-control">
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
                                    <label for="gender" class="col-4 col-form-label">Jenis Kelamin</label>
                                    <div class="col-8">
                                        <select class="form-control" id="gender" name="gender">
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-4 col-form-label">Email</label>
                                    <div class="col-8">
                                        <input id="email" name="email" type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-4 col-form-label">Alamat</label>
                                    <div class="col-8">
                                        <input id="alamat" name="alamat" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kelurahan_id" class="col-4 col-form-label">Kelurahan ID</label>
                                    <div class="col-8">
                                        <?php
                                        $sqljenis = "SELECT * FROM kelurahan";
                                        $rsjenis = $dbh->query($sqljenis);
                                        ?>
                                        <select id="kelurahan_id" name="kelurahan_id" class="form-control">
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