
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
              <h6 class="m-0 font-weight-bold text-primary">LIST DATA JURUSAN</h6>
             
            </div>
             <div class="card-header py-9">
               <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_add_new"> Add </a>
             </div>

<!-- ============ MODAL ADD JURUSAN =============== -->
        <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Add Data Jurusan</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('tugasakhir/addjurusan');?>">
                <div class="modal-body">

                  <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Jurusan</label>
                        <div class="col-xs-8">
                            <input name="KodeJurusan" class="form-control" type="text" placeholder="Masukkan Kode Jurusan" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Jurusan</label>
                        <div class="col-xs-8">
                            <input name="NamaJurusan" class="form-control" type="text" placeholder="Masukkan Nama Jurusan" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Ketua Jurusan</label>
                        <div class="col-xs-8">
                            <input name="NamaKaJurusan" class="form-control" type="text" placeholder="Masukkan Nama Ketua Jurusan" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nomor Telepon</label>
                        <div class="col-xs-8">
                            <input name="NoTelp" class="form-control" type="text" placeholder="Masukkan Nomor Telepon" required>
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
        <!--END MODAL ADD JURUSAN-->

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" id="mydata">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Jurusan</th>
                      <th>Nama Jurusan</th>
                      <th>Nama Ketua Jurusan</th>
                      <th>Nomor Telepon</th>
                       <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                    <?php
                     $count = 0;
                      foreach ($jurusan->result() as $row) :
                        $count++; ?>
                  <tr>
                    <td><?php echo $count?></td>
                    <td><?php echo $row->KodeJurusan;?></td>
                    <td><?php echo $row->NamaJurusan;?></td>
                    <td><?php echo $row->NamaKaJurusan;?></td>
                    <td><?php echo $row->NoTelp;?></td>
                    <td>
                      <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $row->KodeJurusan;?>"> Update </a>
                 
                      <a href="<?php echo site_url('tugasakhir/deletejurusan/'.$row->KodeJurusan);?>" class="btn btn-sm btn-danger">Delete</a>
                        
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



       <!-- ============ MODAL EDIT JURUSAN =============== -->
    <?php
        foreach($jurusan->result_array() as $i):
            $KodeJurusan=$i['KodeJurusan'];
            $NamaJurusan=$i['NamaJurusan'];
            $NamaKaJurusan=$i['NamaKaJurusan'];
             $NoTelp=$i['NoTelp'];
        ?>
        <div class="modal fade" id="modal_edit<?php echo $KodeJurusan;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal"
         aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Edit Jurusan</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('tugasakhir/addjurusan/'.$KodeJurusan);?>">
                <div class="modal-body">
 

                  <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Jurusan</label>
                        <div class="col-xs-8">
                            <input name="KodeJurusan" class="form-control" value="<?php echo $KodeJurusan;?>" type="text" placeholder="Masukkan Kode Jurusan" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Jurusan</label>
                        <div class="col-xs-8">
                            <input name="NamaJurusan" class="form-control" value="<?php echo $NamaJurusan;?>" type="text" placeholder="Masukkan Nama Jurusan" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Ketua Jurusan</label>
                        <div class="col-xs-8">
                            <input name="NamaKaJurusan" class="form-control" value="<?php echo $NamaKaJurusan;?>" type="text" placeholder="Masukkan Nama Ketua Jurusan" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nomor Telepon</label>
                        <div class="col-xs-8">
                            <input name="NoTelp" class="form-control" value="<?php echo $NoTelp;?>" type="text" placeholder="Masukkan Nomor Telepon" required>
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
    <!--END MODAL ADD JURUSAN-->

     

 <?php include "script.php"?>
 <script>
    $(document).ready(function(){
        $('#mydata').DataTable();
    });
</script>


</html>
