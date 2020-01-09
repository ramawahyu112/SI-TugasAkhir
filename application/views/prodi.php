
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
               <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_add_new"><i class="fas fa-plus">Add</i> </a>
             </div>

<!-- ============ MODAL ADD PRODI =============== -->
        <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Add Program Studi</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('tugasakhir/addprodi');?>">
                <div class="modal-body">

                  <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Program Studi</label>
                        <div class="col-xs-8">
                            <input name="KodeProdi" class="form-control" type="text" placeholder="Masukkan Kode Program Studi" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jurusan</label>
                        <div class="col-xs-8">

                          <select name="KodeJurusan" class="form-control">
                            <option value="0">-Pilih Jurusan-</option>
                            <?php foreach($jurusan->result() as $rowjurusan):?>
                                <option value="<?php echo $rowjurusan->KodeJurusan;?>"><?php echo $rowjurusan->NamaJurusan;?></option>
                            <?php endforeach;?>
                        </select>
                     
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
                      <th>Jurusan</th>
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
                    <td><?php echo $count;?></td>
                    <td><?php echo $row->KodeProdi;?></td>
                    <td><?php echo $row->NamaJurusan;?></td>
                    <td><?php echo $row->NamaProdi;?></td>
                    <td><?php echo $row->NoTelp;?></td>
                   <td>
                      <a href="#" class="btn btn-sm  btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $row->KodeProdi;?>"> <i class="fas fa-edit"></i> </a>
                 
                      <a href="#" data-toggle="modal" data-target="#modal_hapus<?php echo $row->KodeProdi;?>" class="btn btn-sm  btn-danger"><i class="fas fa-trash"></i></a>


                        
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
            <form class="form-horizontal" method="post" action="<?php echo site_url('tugasakhir/addprodi/'.$KodeProdi);?>">
                <div class="modal-body">

                  <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Program Studi</label>
                        <div class="col-xs-8">
                            <input name="KodeProdi" value="<?php echo $KodeProdi;?>" class="form-control" type="text" placeholder="Masukkan Kode Program Studi">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jurusan</label>
                        <div class="col-xs-8">
                             <select name="KodeJurusan" class="form-control">
                            <option value="0">-Pilih Jurusan-</option>
                            <?php foreach($jurusan->result() as $rowjurusan):?>
                                <option value="<?php $jur=$rowjurusan->KodeJurusan; echo $jur; ?>" 
                                  <?php if($KodeJurusan==$jur){ echo 'selected';} ?>
                                  ><?php echo $rowjurusan->NamaJurusan;?></option>
                            <?php endforeach;?>
                        </select>
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
    <!--END MODAL EDIT PRODI-->

 <?php
        foreach($prodi->result_array() as $i):
             $KodeProdi=$i['KodeProdi'];
             $NamaProdi=$i['NamaProdi'];
             ?>
     <!-- ============ MODAL HAPUS PRODI =============== -->
        <div class="modal fade" id="modal_hapus<?php echo $KodeProdi;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="fas fa-trash"> Delete !</h5 >
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>

            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('tugasakhir/deleteprodi/'.$KodeProdi);?>">
                <div class="modal-body">
                    <p>Menghapus data dapat mempengaruhi program lainnya !!</p>
                    <p>Hapus data Program Studi <b><?php echo $NamaProdi;?> ?</b></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-success " data-dismiss="modal" aria-hidden="true">Batal</button>
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <?php endforeach;?>
    <!--END MODAL HAPUS PRODI-->

     

 <?php include "script.php"?>
 <script>
    $(document).ready(function(){
        $('#mydata').DataTable();
    });
</script>


</html>
