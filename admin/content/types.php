<div class="about">
  <div class="content-inner">
    <div class="content-header d-flex justify-content-between">
        <h2>Types</h2>
        <a href="?page=add-edit_types" class="btn btn-primary border">Create</a>
    </div>
    <div class="row align-items-center">
    <table class="table table-bordered text-center">
      <thead>
          <tr>
              <th>No</th>
              <th>Role</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
          <?php
          $no = 1;
          foreach ($rows as $row) {
          ?>

              <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $row['level_name'] ?></td>
                  <td><?php echo $row['name'] ?></td>
                  <td><?php echo $row['email'] ?></td>

                  
                  <td>
                      <a class="btn btn-success btn-sm" href="add_edit_user.php?idEdit=<?php echo $row['id'] ?>">Edit</a>
                      <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin delete ?')" href="page_user.php?delete=<?php echo $row['id'] ?>">Delete</a>
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