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
                <h4 class="card-title">Tabel Periksa</h4>
                <a href="add.php"><button type="button" class="btn btn-primary btn-fw">
                    Tambah Data
                  </button></a>

                <div class="table-responsive">
                  <table class="table table-dark">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Berat</th>
                        <th>Tinggi</th>
                        <th>Tensi</th>
                        <th>Keterangan</th>
                        <th>ID Pasien</th>
                        <th>ID Dokter</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      // Panggil file
                      require '../dbkoneksi.php';
                      // Bikin Query SQL
                      $query = $dbh->query("SELECT * FROM periksa");
                      // Tampilkan data looping
                      foreach ($query as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['tanggal'] . "</td>";
                        echo "<td>" . $row['berat'] . "</td>";
                        echo "<td>" . $row['tinggi'] . "</td>";
                        echo "<td>" . $row['tensi'] . "</td>";
                        echo "<td>" . $row['keterangan'] . "</td>";
                        echo "<td>" . $row['pasien_id'] . "</td>";
                        echo "<td>" . $row['dokter_id'] . "</td>";
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