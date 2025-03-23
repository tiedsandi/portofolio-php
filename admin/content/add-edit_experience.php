<?php 
  if(isset($_POST['tambah'])){
    $start_date = $_POST['start_date'];
    $finish_date = $_POST['finish_date'];
    $experience_name = $_POST['experience_name'];
    $position = $_POST['position'];
    $location = $_POST['location'];
    $content = $_POST['content'];


    // cek if null datanya
    if (empty($start_date) || empty($finish_date) || empty($experience_name) || empty($position) || empty($location) || empty($content) || $content === '<p><br></p>' ) {
        header("Location: ?page=add-edit_experience&status=gagal");
        exit();
    }

    $insert = mysqli_query($conn, "INSERT INTO experiences 
            (experience_name, position, content, start_date, finish_date, location) 
            VALUES ('$experience_name', '$position', '$content', '$start_date', '$finish_date', '$location')");
    
    if ($insert) {
        header("Location: ?page=experience&status=tambah");
    } else {
        header("Location: ?page=add-edit_experience&status=gagal");
    }
  }

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM experiences WHERE id = $id");
    $row = mysqli_fetch_assoc($query);

    if (mysqli_num_rows($query) < 1) {
        header("Location: ?page=experience");
    }
  }

  if(isset($_POST['edit'])){
    $start_date = $_POST['start_date'];
    $finish_date = $_POST['finish_date'];
    $experience_name = $_POST['experience_name'];
    $position = $_POST['position'];
    $content = $_POST['content'];
    $location = $_POST['location'];

    // cek if null datanya
    if (empty($start_date) || empty($finish_date) || empty($experience_name) || empty($position) || empty($location) || empty($content) || $content === '<p><br></p>' ) {
        $idEdit = $_GET['id'] ?? $_POST['id'] ?? 0; 
        header("Location: ?page=add-edit_experience&status=gagal&id=$idEdit");
        exit();
    }

    $update = mysqli_query($conn, "UPDATE experiences 
            SET experience_name = '$experience_name', content = '$content', start_date = '$start_date', finish_date = '$finish_date', position = '$position', location = '$location'
            WHERE id = $id");
    
    if ($update) {
        header("Location: ?page=experience&status=edit");
    } else {
        header("Location: ?page=add-edit_experience&status=gagal");
    }
}
?>

<div class="about">
  <div class="content-inner">
    <div class="content-header d-flex justify-content-between">
        <h2><?= isset($_GET['id'])? 'Ubah':'Tambah' ?> Pengalaman</h2>
    </div>
    <?php if (isset($_GET['status']) && $_GET['status'] == "gagal") { ?>
        <div class="alert alert-danger" role="alert">
            Anda belum mengisi semua field
        </div>
    <?php } ?>
    <form action="" method="POST">
      <div class="row align-items-center">
          <div class="form-group col-md-6">
            <label for="start_date">Mulai Pengalaman*</label>
            <input type="date" class="form-control"
                name="start_date"
                value="<?php echo isset($_GET['id']) ? $row['start_date'] : '' ?>"
                >
          </div>
          <div class="form-group col-md-6">
            <label for="finish_date">Selesai Pengalaman*</label>
            <input type="date" class="form-control"
                name="finish_date"
                value="<?php echo isset($_GET['id']) ? $row['finish_date'] : '' ?>"
                >
          </div>
          <div class="form-group col-md-6">
            <label for="experience_name">Nama Pengalaman*</label>
            <input type="text" class="form-control"
                name="experience_name"
                placeholder="Nama Pengalaman"
                value="<?php echo isset($_GET['id']) ? $row['experience_name'] : '' ?>"
                >
          </div>
          <div class="form-group col-md-6">
            <label for="position">Jabatan*</label>
            <input type="text" class="form-control"
                name="position"
                placeholder="Nama jabatan"
                value="<?php echo isset($_GET['id']) ? $row['position'] : '' ?>"
                >
          </div>
          <div class="form-group col-md-6">
            <label for="location">Lokasi*</label>
            <input type="text" class="form-control"
                name="location"
                placeholder="Tempa Lokasi Bekerja"
                value="<?php echo isset($_GET['id']) ? $row['location'] : '' ?>"
                >
          </div>
          <div class="form-group col-md-12">
            <label for="content">Isi*</label>
            <textarea class="summernote" name="content"><?php echo isset($_GET['id']) ? $row['content'] : '' ?></textarea>
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