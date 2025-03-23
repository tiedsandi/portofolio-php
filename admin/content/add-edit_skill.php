<?php 
  if(isset($_POST['tambah'])){
    $skill_name = $_POST['skill_name'];
    $level = $_POST['level'];

    // cek if null datanya
    if (empty($skill_name)) {
        header("Location: ?page=add-edit_skill&status=gagal");
        exit();
    }

    $insert = mysqli_query($conn, "INSERT INTO skills 
            (skill_name, level) 
            VALUES ('$skill_name', '$level')");
    
    if ($insert) {
        header("Location: ?page=skill&status=tambah");
    } else {
        header("Location: ?page=add-edit_skill&status=gagal");
    }
  }

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM skills WHERE id = $id");
    $row = mysqli_fetch_assoc($query);

    if (mysqli_num_rows($query) < 1) {
        header("Location: ?page=skill");
    }
  }

  if(isset($_POST['edit'])){
    $skill_name = $_POST['skill_name'];
    $level = $_POST['level'];
    // cek if null datanya
    if (empty($skill_name)) {
        $idEdit = $_GET['id'] ?? $_POST['id'] ?? 0; 
        header("Location: ?page=add-edit_skill&status=gagal&id=$idEdit");
        exit();
    }

    $update = mysqli_query($conn, "UPDATE skills 
            SET skill_name = '$skill_name', level = '$level' 
            WHERE id = $id");
    
    if ($update) {
        header("Location: ?page=skill&status=edit");
    } else {
        header("Location: ?page=add-edit_skill&status=gagal");
    }
}
?>

<div class="about">
  <div class="content-inner">
    <div class="content-header d-flex justify-content-between">
        <h2><?= isset($_GET['id'])? 'Ubah':'Tambah' ?> Keahlian</h2>
    </div>
    <?php if (isset($_GET['status']) && $_GET['status'] == "gagal") { ?>
        <div class="alert alert-danger" role="alert">
            Anda belum mengisi semua field
        </div>
    <?php } ?>
    <form action="" method="POST">
      <div class="row align-items-center">
          <div class="form-group col-md-6">
            <label for="skill_name">Nama Tipe*</label>
            <input type="text" class="form-control"
                name="skill_name"
                value="<?php echo isset($_GET['id']) ? $row['skill_name'] : '' ?>"
                >
          </div>

          <div class="form-group col-md-6">
            <label for="level">Level*</label>
            <input type="number" class="form-control"
                name="level"
                value="<?php echo isset($_GET['id']) ? $row['level'] : '' ?>"
                >
          </div>
      </div>
      <div class="d-flex">
          <a href="?page=skill" style="background-color:white; border: 1px solid #FF6F61" class="btn  mr-2">Batal</a>
          <?php if(isset($_GET['id'])) :?>
              <button type="submit" class="btn " name="edit">Ubah</button>
          <?php else :?>
              <button type="submit" class="btn " name="tambah">Tambah</button>
          <?php endif; ?>
        </div>
    </form>
  </div>
</div>