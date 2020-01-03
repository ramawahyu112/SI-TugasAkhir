
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
              <h6 class="m-0 font-weight-bold text-primary">LIST DATA PROGRAM STUDI</h6>
             
            </div>
             <div class="card-header py-9">
               <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_add_new"> Add </a>
             </div>

<!-- ============ MODAL ADD PRODI =============== -->
        <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Add Program Studi</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('ruangbelajar/addmapel');?>">
                <div class="modal-body">

                  <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Program Studi</label>
                        <div class="col-xs-8">
                            <input name="KodeProdi" class="form-control" type="text" placeholder="Masukkan Kode Program Studi" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Jurusan</label>
                        <div class="col-xs-8">
                            <input name="KodeJurusan" class="form-control" type="text" placeholder="Masukkan Kode Jurusan" required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Program Studi</label>
                        <div class="col-xs-8">
                            <input name="NamaProdi" class="form-control" type="text" placeholder="Masukkan Program Studi" required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >No. Telepon</label>
                        <div class="col-xs-8">
                            <input name="NoTelp" class="form-control" type="text" placeholder="Masukkan No. Telepon" required>
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
        <!--END MODAL ADD PRODI-->

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" id="mydata">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Program Studi</th>
                      <th>Kode Jurusan</th>
                      <th>Nama Program Studi</th>
                      <th>No. Telepon</th>
                       <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                    <?php
                     $count = 0;
                      foreach ($prodi->result() as $row) :
                        $count++; ?>
                  <tr>
                    <td><?php echo $count?></td>
                    <td><?php echo $row->KodeProdi;?></td>>
                    <td><?php echo $row->KodeJurusan;?></td>>
                    <td><?php echo $row->NamaProdi;?></td>>
                    <td><?php echo $row->NoTelp;?></td>>
                   <td>
                      <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $row->KodeProdi;?>"> Update </a>
                 
                      <a href="<?php echo site_url('ruangbelajar/deletemapel/'.$row->KodeProdi);?>" class="btn btn-sm btn-danger">Delete</a>


                        
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



       <!-- ============ MODAL EDIT PRODI =============== -->
    <?php
        foreach($prodi->result_array() as $i):
             $KodeProdi=$i['KodeProdi'];
             $KodeJurusan=$i['KodeJurusan'];
             $NamaProdi=$i['NamaProdi'];
             $NoTelp=$i['NoTelp'];
             ?>
        <div class="modal fade" id="modal_edit<?php echo $KodeProdi;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal"
         aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Edit Program Studi</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('ruangbelajar/addmapel/'.$KodeProdi);?>">
                <div class="modal-body">

                  <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Program Studi</label>
                        <div class="col-xs-8">
                            <input name="KodeProdi" value="<?php echo $KodeProdi;?>" class="form-control" type="text" placeholder="Masukkan Kode Program Studi">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Jurusan</label>
                        <div class="col-xs-8">
                            <input name="KodeJurusan" value="<?php echo $KodeJurusan;?>" class="form-control" type="text" placeholder="Masukkan Kode Jurusan">
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Program Studi</label>
                        <div class="col-xs-8">
                            <input name="NamaProdi" value="<?php echo $NamaProdi;?>" class="form-control" type="text" placeholder="Masukkan Program Studi">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >No. Telepon</label>
                        <div class="col-xs-8">
                            <input name="NoTelp" value="<?php echo $NoTelp;?>" class="form-control" type="text" placeholder="Masukkan  No. Telepon" required>
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
    <!--END MODAL ADD PRODI-->

     

 <?php include "script.php"?>
 <script>
    $(document).ready(function(){
        $('#mydata').DataTable();
    });
</script>


</html>
