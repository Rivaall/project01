<?php
require_once 'navbar.php';
require_once 'sidebar.php';

require '../dbkoneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Query untuk mengambil data pasien berdasarkan id
    $sql = "SELECT * FROM pasien WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST["submit"])) {
    $_kode = $_POST['kode'];
    $_nama = $_POST['nama'];
    $_tmp_lahir = $_POST['tmp_lahir'];
    $_tgl_lahir = $_POST['tgl_lahir'];
    $_gender = $_POST['gender'];
    $_email = $_POST['email'];
    $_alamat = $_POST['alamat'];
    $_kelurahan_id = $_POST['kelurahan_id'];
    $data = [$_kode, $_nama, $_tmp_lahir, $_tgl_lahir, $_gender, $_email, $_alamat, $_kelurahan_id, $id];
    // Query SQL untuk update data pasien berdasarkan id
    $sql = "UPDATE pasien SET kode = ?, nama = ?, tmp_lahir = ?, tgl_lahir = ?, gender = ?, email = ?, alamat = ?, kelurahan_id = ? WHERE id = ?";
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
                            <p class="card-description">Edit Data Pasien</p>
                            <form action="edit.php?id=<?= $row['id'] ?>" method="POST">
                                <div class="form-group row">
                                    <label for="kode" class="col-4 col-form-label">Kode</label>
                                    <div class="col-8">
                                        <input id="kode" name="kode" type="text" class="form-control" value="<?= $row['kode'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-4 col-form-label">Nama</label>
                                    <div class="col-8">
                                        <input id="nama" name="nama" type="text" class="form-control" value="<?= $row['nama'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tmp_lahir" class="col-4 col-form-label">Tempat Lahir</label>
                                    <div class="col-8">
                                        <input id="tmp_lahir" name="tmp_lahir" type="text" class="form-control" value="<?= $row['tmp_lahir'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_lahir" class="col-4 col-form-label">Tanggal Lahir</label>
                                    <div class="col-8">
                                        <input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control" value="<?= $row['tgl_lahir'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gender" class="col-4 col-form-label">Jenis Kelamin</label>
                                    <div class="col-8">
                                        <select id="gender" name="gender" class="form-control">
                                            <option value="L" <?= ($row['gender'] == 'L') ? 'selected' : '' ?>>Laki-Laki</option>
                                            <option value="P" <?= ($row['gender'] == 'P') ? 'selected' : '' ?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-4 col-form-label">Email</label>
                                    <div class="col-8">
                                        <input id="email" name="email" type="email" class="form-control" value="<?= $row['email'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-4 col-form-label">Alamat</label>
                                    <div class="col-8">
                                        <input id="alamat" name="alamat" type="text" class="form-control" value="<?= $row['alamat'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kelurahan_id" class="col-4 col-form-label">Kelurahan ID</label>
                                    <div class="col-8">
                                        <select id="kelurahan_id" name="kelurahan_id" class="form-control">
                                            <?php
                                            $sqljenis = "SELECT * FROM kelurahan";
                                            $rsjenis = $dbh->query($sqljenis);
                                            foreach ($rsjenis as $rowjenis) {
                                                $selected = ($row['kelurahan_id'] == $rowjenis['id']) ? 'selected' : '';
                                                echo "<option value='" . $rowjenis['id'] . "' $selected>" . $rowjenis['nama'] . "</option>";
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