<?php 
    $query = mysqli_query($conn, "SELECT * FROM types 
            ORDER BY type_name ASC
    ");

    $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

    if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $query = "DELETE FROM types WHERE id = $id";
    mysqli_query($conn, $query);

    header("Location: ?page=type&status=hapus");
    exit();
    }
?>

<div class="about">
  <div class="content-inner">
    <div class="content-header d-flex justify-content-between">
        <h2>Tipe</h2>
        <a href="?page=add-edit_type" class="btn ">Buat</a>
    </div>

    <?php 
        if (isset($_GET['status'])) {
            $alerts = [
                "tambah" => "Anda berhasil menambah data!",
                "edit" => "Anda berhasil mengubah data!",
                "hapus" => "Data berhasil dihapus."
            ];

            if (array_key_exists($_GET['status'], $alerts)) {
                echo '<div class="alert alert-success mt-3" role="alert">' . $alerts[$_GET['status']] . '</div>';
            }
        }
    ?>

    <div class="row align-items-center">
    <table class="table table-bordered text-center">
      <thead>
          <tr>
              <th>No</th>
              <th>Tipe</th>
              <th>Aksi</th>
          </tr>
      </thead>
      <tbody>
          <?php
          $no = 1;
          foreach ($rows as $row) {
          ?>
              <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $row['type_name'] ?></td>
                  <td>
                      <a class="btn  btn-sm" style="background-color:white; border: 1px solid #FF6F61" href="?page=add-edit_type&id=<?php echo $row['id'] ?>">Edit</a>
                      <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin delete ?')" href="?page=type&delete=<?php echo $row['id'] ?>">Delete</a>
                  </td>
              </tr>

          <?php
          }
          ?>
          <!-- cek jika data kosong -->
          <?php if (empty($rows)) : ?>
              <tr>
                  <td colspan="6">Belum ada data</td>
              </tr>
          <?php endif ?> 
      </tbody>
    </table>
    </div>
  </div>
</div>