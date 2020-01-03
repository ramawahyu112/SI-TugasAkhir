
<?php 
  include "header.php"
?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
  <!--<h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA USER</h6>
             
            </div>
             <div class="card-header py-9">
               <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_add_new"> Add </a>
             </div>

<!-- ============ MODAL ADD BARANG =============== -->
        <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Add User</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('ruangbelajar/addakun');?>">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Username</label>
                        <div class="col-xs-8">
                            <input name="username" class="form-control" type="text" placeholder="Masukkan username" required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Password</label>
                        <div class="col-xs-8">
                            <input name="password" class="form-control" type="text" placeholder="Masukkan password" required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama User</label>
                        <div class="col-xs-8">
                            <input name="nama_user" class="form-control" type="text" placeholder="Masukkan nama user" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Akses</label>
                        <div class="col-xs-8">
                            <input name="hak_akses" class="form-control" type="text" placeholder="Masukkan hak akses" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Status</label>
                        <div class="col-xs-8">
                            <input name="status" class="form-control" type="text" placeholder="Masukkan status" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jenjang</label>
                        <div class="col-xs-8">
                            <input name="id_jenjang" class="form-control" type="text" placeholder="Masukkan id jenjang" required>
                        </div>
                    </div>
 
                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD BARANG-->

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" id="mydata">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Nama User</th>
                      <th>Akses</th>
                      <th>Status</th>
                      <th>Jenjang</th>
                       <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                    <?php
                     $count = 0;
                      foreach ($akun->result() as $row) :
                        $count++; ?>
                  <tr>
                    <td><?php echo $count?></td>
                    <td><?php echo $row->username;?></td>
                    <td><?php echo $row->password;?></td>
                    <td><?php echo $row->nama_user;?></td>
                    <td><?php echo $row->akses;?></td>
                    <td><?php echo $row->status;?></td>
                    <td><?php echo $row->id_jenjang;?></td>
                    <td>
                      <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $row->id_user;?>"> Update </a>
                 
                      <a href="<?php echo site_url('ruangbelajar/deleteakun/'.$row->id_user);?>" class="btn btn-sm btn-danger">Delete</a>


                        
                      </td>
                  </tr>
                <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->



       <!-- ============ MODAL EDIT BARANG =============== -->
    <?php
        foreach($akun->result_array() as $i):
            $id_user=$i['id_user'];
            $username=$i['username'];
            $password=$i['password'];
            $nama_user=$i['nama_user'];
            $akses=$i['akses'];
            $status=$i['status'];
            $id_jenjang=$i['id_jenjang'];
        ?>
        <div class="modal fade" id="modal_edit<?php echo $id_user;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal"
         aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Edit User</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('ruangbelajar/addakun/'.$id_user);?>">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Username</label>
                        <div class="col-xs-8">
                            <input name="username" value="<?php echo $username;?>" class="form-control" type="text" placeholder="Masukkan Username" readonly>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Password</label>
                        <div class="col-xs-8">
                            <input name="password" value="<?php echo $password;?>" class="form-control" type="text" placeholder="Masukkan password" required>
                        </div>
                    </div>
 
                   <div class="form-group">
                        <label class="control-label col-xs-3" >Nama User</label>
                        <div class="col-xs-8">
                            <input name="nama_user" value="<?php echo $nama_user;?>" class="form-control" type="text" placeholder="Masukkan nama user" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Akses</label>
                        <div class="col-xs-8">
                            <input name="hak_akses" value="<?php echo $akses;?>" class="form-control" type="text" placeholder="Masukkan hak akses" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Status</label>
                        <div class="col-xs-8">
                            <input name="status" value="<?php echo $status;?>" class="form-control" type="text" placeholder="Masukkan status" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jenjang</label>
                        <div class="col-xs-8">
                            <input name="id_jenjang" value="<?php echo $id_jenjang;?>" class="form-control" type="text" placeholder="Masukkan id jenjang" required>
                        </div>
                    </div>
 
 
                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>
 
    <?php endforeach;?>
    <!--END MODAL ADD BARANG-->

     

 <?php include "script.php"?>
 <script>
    $(document).ready(function(){
        $('#mydata').DataTable();
    });
</script>


</html>
