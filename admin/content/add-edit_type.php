<?php 
  if(isset($_POST['tambah'])){
    $type_name = $_POST['type_name'];

    // cek if null datanya
    if (empty($type_name)) {
        header("Location: ?page=add-edit_type&status=gagal");
        exit();
    }

    $insert = mysqli_query($conn, "INSERT INTO types 
            (type_name) 
            VALUES ('$type_name')");
    
    if ($insert) {
        header("Location: ?page=type&status=tambah");
    } else {
        header("Location: ?page=add-edit_type&status=gagal");
    }
  }

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM types WHERE id = $id");
    $row = mysqli_fetch_assoc($query);
  }

  if(isset($_POST['edit'])){
    $type_name = $_POST['type_name'];

    // cek if null datanya
    if (empty($type_name) ) {
        $idEdit = $_GET['id'] ?? $_POST['id'] ?? 0; 
        header("Location: ?page=add-edit_type&status=gagal&id=$idEdit");
        exit();
    }

    $update = mysqli_query($conn, "UPDATE types 
            SET type_name = '$type_name' 
            WHERE id = $id");
    
    if ($update) {
        header("Location: ?page=type&status=edit");
    } else {
        header("Location: ?page=add-edit_type&status=gagal");
    }
}
?>

<div class="about">
  <div class="content-inner">
    <div class="content-header d-flex justify-content-between">
        <h2><?= isset($_GET['id'])? 'Edit':'Add' ?> type</h2>
    </div>
    <?php if (isset($_GET['status']) && $_GET['status'] == "gagal") { ?>
        <div class="alert alert-danger" role="alert">
            Anda belum mengisi semua field
        </div>
    <?php } ?>
    <form action="" method="POST">
      <div class="row align-items-center">
          <div class="form-group col-md-6">
            <label for="type_name">Type Name</label>
            <input type="text" class="form-control"
                name="type_name"
                value="<?php echo isset($_GET['id']) ? $row['type_name'] : '' ?>"
                >
          </div>
      </div>
      <div class="d-flex">
          <a href="?page=type" style="background-color:white; border: 1px solid #FF6F61" class="btn  mr-2">Batal</a>
          <?php if(isset($_GET['id'])) :?>
              <button type="submit" class="btn " name="edit">Ubah</button>
          <?php else :?>
              <button type="submit" class="btn " name="tambah">Tambah</button>
          <?php endif; ?>
        </div>
    </form>
  </div>
</div>