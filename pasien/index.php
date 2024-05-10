<?php
require_once 'navbar.php';
require_once 'sidebar.php';
?>


<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <!-- partial:partials/_navbar.html -->

  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card corona-gradient-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Tabel Pasien</h4>
                <a href="add.php"><button type="button" class="btn btn-primary btn-fw">
                    Tambah Data
                  </button></a>

                <div class="table-responsive">
                  <table class="table table-dark">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Kelurahan ID</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      // Panggil file
                      require '../dbkoneksi.php';
                      // Bikin Query SQL
                      $query = $dbh->query("SELECT * FROM pasien");
                      // Tampilkan data looping
                      foreach ($query as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['kode'] . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['tmp_lahir'] . "</td>";
                        echo "<td>" . $row['tgl_lahir'] . "</td>";
                        echo "<td>" . $row['gender'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['alamat'] . "</td>";
                        echo "<td>" . $row['kelurahan_id'] . "</td>";
                        echo "<td>";
                        echo "<a href='edit.php?id=" . $row['id'] . "'><button class='btn btn-warning'>Edit</button></a>";
                        echo "<a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Yakin Hapus Data?\")'><button class='btn btn-danger'>Delete</button></a>";
                        echo "</td>";
                        echo "</tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- content-wrapper ends -->
  <?php
  require_once 'footer.php';
  ?>