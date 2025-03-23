<?php 
  if(isset($_POST['tambah'])){
    $service_name = $_POST['service_name'];
    $icon = $_POST['icon'];
    $description = $_POST['description'];

    // cek if null datanya
    if (empty($service_name) || empty($icon) || empty($description) || $description === '<p><br></p>') {
        header("Location: ?page=add-edit_service&status=gagal");
        exit();
    }

    $insert = mysqli_query($conn, "INSERT INTO services 
            (service_name, icon, description) 
            VALUES ('$service_name', '$icon', '$description')");
    
    if ($insert) {
        header("Location: ?page=service&status=tambah");
    } else {
        header("Location: ?page=add-edit_service&status=gagal");
    }
  }

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM services WHERE id = $id");
    $row = mysqli_fetch_assoc($query);

    if (mysqli_num_rows($query) < 1) {
        header("Location: ?page=service");
    }
  }

  if(isset($_POST['edit'])){
    $service_name = $_POST['service_name'];
    $icon = $_POST['icon'];
    $description = $_POST['description'];
    // cek if null datanya
    if (empty($service_name) || empty($icon) || empty($description) || $description === '<p><br></p>') {
        $idEdit = $_GET['id'] ?? $_POST['id'] ?? 0; 
        header("Location: ?page=add-edit_service&status=gagal&id=$idEdit");
        exit();
    }

    $update = mysqli_query($conn, "UPDATE services 
            SET service_name = '$service_name', icon = '$icon', description = '$description'
            WHERE id = $id");
    
    if ($update) {
        header("Location: ?page=service&status=edit");
    } else {
        header("Location: ?page=add-edit_service&status=gagal");
    }
}
?>

<div class="about">
  <div class="content-inner">
    <div class="content-header d-flex justify-content-between">
        <h2><?= isset($_GET['id'])? 'Ubah':'Tambah' ?> Servis</h2>
    </div>
    <?php if (isset($_GET['status']) && $_GET['status'] == "gagal") { ?>
        <div class="alert alert-danger" role="alert">
            Anda belum mengisi semua field
        </div>
    <?php } ?>
    <form action="" method="POST">
      <div class="row align-items-center">
          <div class="form-group col-md-6">
            <label for="service_name">Nama Servis*</label>
            <input type="text" class="form-control"
                name="service_name"
                value="<?php echo isset($_GET['id']) ? $row['service_name'] : '' ?>"
                >
          </div>

          <div class="form-group col-md-6">
            <label for="icon">Icon*</label>
            <input type="text" class="form-control"
                name="icon"
                value="<?php echo isset($_GET['id']) ? $row['icon'] : '' ?>"
                >
          </div>

          <div class="form-group col-md-12">
            <label for="description">Isi*</label>
            <textarea class="summernote" name="description"><?php echo isset($_GET['id']) ? $row['description'] : '' ?></textarea>
          </div>
      </div>
      <div class="d-flex">
          <a href="?page=service" style="background-color:white; border: 1px solid #FF6F61" class="btn  mr-2">Batal</a>
          <?php if(isset($_GET['id'])) :?>
              <button type="submit" class="btn " name="edit">Ubah</button>
          <?php else :?>
              <button type="submit" class="btn " name="tambah">Tambah</button>
          <?php endif; ?>
        </div>
    </form>
  </div>
</div>