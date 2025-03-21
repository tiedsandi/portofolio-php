

<div class="about">
  <div class="content-inner">
    <div class="content-header d-flex justify-content-between">
        <h2><?php echo isset($_GET['edit']) ? 'EDIT' : 'ADD' ?> Types</h2>
        <a href="admin/content/types/create.php" class="btn btn-primary border">Create</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php if (isset($_GET['tambah']) && $_GET['tambah'] == "error") { ?>
                <div class="alert alert-danger" role="alert">
                    Anda belum mengisi semua field
                </div>
            <?php } ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label for="">Nama Level*</label>
                            </div>
                            <div class="col-sm-10">
                            <input type="text" class="form-control"
                                    name="level_name"
                                    value="<?php echo isset($_GET['idEdit']) ? $row['level_name'] : '' ?>"
                                    >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label for="">Nama Level*</label>
                            </div>
                            <div class="col-sm-10">
                            <input type="text" class="form-control"
                                    name="level_name"
                                    value="<?php echo isset($_GET['idEdit']) ? $row['level_name'] : '' ?>"
                                    >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <a href="?page=types" class="btn btn-outline-secondary">Cancel</a>
                                <?php if(isset($_GET['idEdit'])) :?>
                                    <button type="submit" class="btn btn-primary" name="edit">Edit</button>
                                <?php else :?>
                                    <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>