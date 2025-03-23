<?php 
  if(isset($_POST['tambah'])){
    $id_type = $_POST['id_type'];
    $project_name = $_POST['project_name'];
    $link_preview = $_POST['link_preview'];
    $link_repository = $_POST['link_repository'];

    $photo = $_FILES['photo'];

    if ($photo['error'] == 0  && !empty($id_type) && !empty($project_name) && !empty($link_preview) && !empty($link_repository)) {
        $fillName = uniqid() . "_" . basename($photo["name"]);
        $fillPath = "assets/uploads/" . $fillName;
        move_uploaded_file($photo['tmp_name'], $fillPath);

        $insert = mysqli_query($conn, "INSERT INTO projects 
        (id_type, project_name, link_preview, link_repository, photo)
        VALUES ('$id_type', '$project_name', '$link_preview', '$link_repository', '$fillName')");

        if ($insert) {
            header("Location: ?page=porto&status=tambah");
        } else {
            header("Location: ?page=add-edit_porto&status=gagal");
          }
    } else{
        header("Location: ?page=add-edit_porto&status=gagal");
    }
  }

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM projects WHERE id = $id");
    $row = mysqli_fetch_assoc($query);

    if (mysqli_num_rows($query) < 1) {
        header("Location: ?page=porto");
    }
  }

  if(isset($_POST['edit'])){
    $id_type = $_POST['id_type'];
    $project_name = $_POST['project_name'];
    $link_preview = $_POST['link_preview'];
    $link_repository = $_POST['link_repository'];

    $photo = $_FILES['photo'];
    $fieldPhoto = "";

    if ($photo['error'] == 0) {
        $fillName = uniqid() . "_" . basename($photo["name"]);
        $fillPath = "assets/uploads/" . $fillName;

        if (move_uploaded_file($photo['tmp_name'], $fillPath)) {
            $cekFoto = mysqli_query($conn, "SELECT photo FROM projects WHERE id = $id");
            $rowPhoto = mysqli_fetch_assoc($cekFoto);

            if ($rowPhoto && file_exists("assets/uploads/" . $rowPhoto['photo'])) {
                unlink("assets/uploads/" . $rowPhoto['photo']);
            }
            $fieldPhoto = "photo='$fillName',";
        } else {
            echo "GAGAL UPDATE FOTO";
        }
    }

    if (empty($id_type) || empty($project_name) || empty($link_preview) || empty($link_repository)) {
        $idEdit = $_GET['id'] ?? $_POST['id'] ?? 0; 
        header("Location: ?page=add-edit_porto&status=gagal&id=$idEdit");
        exit();
    } 

    $update = mysqli_query($conn, "UPDATE projects 
            SET $fieldPhoto id_type = '$id_type', project_name = '$project_name', link_preview = '$link_preview', link_repository = '$link_repository'
            WHERE id = $id");
    
    if ($update) {
        header("Location: ?page=porto&status=edit");
    } else {
        header("Location: ?page=add-edit_porto&status=gagal");
    }
  }

  $queryD = mysqli_query($conn, "SELECT * FROM types 
  ORDER BY type_name ASC
    ");
  $rowsD = mysqli_fetch_all($queryD, MYSQLI_ASSOC);

?>

<div class="about">
  <div class="content-inner">
    <div class="content-header d-flex justify-content-between">
        <h2><?= isset($_GET['id'])? 'Ubah':'Tambah' ?> Portofolio</h2>
    </div>
    <?php if (isset($_GET['status']) && $_GET['status'] == "gagal") { ?>
        <div class="alert alert-danger" role="alert">
            Anda belum mengisi semua field
        </div>
    <?php } ?>
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="row align-items-center">
          <div class="form-group col-md-6">
            <label for="type_name">Tipe*</label>
            <select class="form-control" name="id_type">
                <option value="">Pilih Tipe</option>
                <?php foreach ($rowsD as $rowD) : ?>
                    <option value="<?= $rowD['id'] ?>" <?= isset($_GET['id']) && $row['id_type'] == $rowD['id'] ? 'selected' : '' ?>>
                    <?= $rowD['type_name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group col-md-6">
            <label for="project_name">Nama Proyek*</label>
            <input type="text" class="form-control"
                name="project_name"
                value="<?php echo isset($_GET['id']) ? $row['project_name'] : '' ?>"
                >
          </div>
          <div class="form-group col-md-6">
            <label for="link_preview">Link Live Priview*</label>
            <input type="text" class="form-control"
                name="link_preview"
                value="<?php echo isset($_GET['id']) ? $row['link_preview'] : '' ?>"
                >
          </div>
          <div class="form-group col-md-6">
            <label for="link_repository">Link Repository*</label>
            <input type="text" class="form-control"
                name="link_repository"
                value="<?php echo isset($_GET['id']) ? $row['link_repository'] : '' ?>"
                >
          </div>
          <div class="form-group col-md-6">
            <label for="photo">Photo*</label>
            <input type="file" class="form-control" name="photo">
          </div>
          <div class="form-group col-md-6">
            <?php if (isset($_GET['id'])) : ?>
              <img src="assets/uploads/<?= $row['photo'] ?>" alt="photo" width="100">
            <?php endif; ?>
          </div>
      </div>
         
      <div class="d-flex">
          <a href="?page=porto" style="background-color:white; border: 1px solid #FF6F61" class="btn  mr-2">Batal</a>
          <?php if(isset($_GET['id'])) :?>
              <button type="submit" class="btn " name="edit">Ubah</button>
          <?php else :?>
              <button type="submit" class="btn " name="tambah">Tambah</button>
          <?php endif; ?>
        </div>
    </form>
  </div>
</div>