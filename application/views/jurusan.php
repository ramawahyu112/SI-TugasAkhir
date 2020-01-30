
<?php 
  include "header.php"
?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">LIST DATA JURUSAN</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Master Data</li>
              <li class="breadcrumb-item active" aria-current="page">Data Jurusan</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
          
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_add_new">
                  <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                      </span>
                      <span class="text">Add</span>
               </a>
                </div>


                <!-- ============ MODAL ADD JURUSAN =============== -->
        <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title" id="myModalLabel"><b>Add Jurusan</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
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
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                      <th width="20">No</th>
                      <th width="110">Kode Jurusan</th>
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
                      <a href="#" class="btn btn-sm btn-info " data-toggle="modal" data-target="#modal_edit<?php echo $row->KodeJurusan;?>"> <i class="fas fa-edit"></i> </a>
                 
                      <a href="#" class="btn btn-sm btn-danger "  data-toggle="modal" data-target="#modal_hapus<?php echo $row->KodeJurusan;?>">  <i class="fas fa-trash"></i></a>
                        
                      </td>
                  </tr>
                <?php endforeach;?>
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

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
               <h4 class="modal-title" id="myModalLabel"><b>Edit Jurusan</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
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
    <!--END MODAL EDIT JURUSAN-->


     <?php
        foreach($jurusan->result_array() as $i):
            $KodeJurusan=$i['KodeJurusan'];
            $NamaJurusan=$i['NamaJurusan'];
        ?>
     <!-- ============ MODAL HAPUS JURUSAN =============== -->
        <div class="modal fade" id="modal_hapus<?php echo $KodeJurusan;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="fas fa-trash"> Delete !</h5 >
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>

            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('tugasakhir/deletejurusan/'.$KodeJurusan);?>">
                <div class="modal-body">
                    <p>Menghapus data dapat mempengaruhi program lainnya !!</p>
                    <p>Hapus data Jurusan <b><?php echo $NamaJurusan;?> ?</b></p>
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
    <!--END MODAL HAPUS JURUSAN-->

        </div>
        <!---Container Fluid-->
<?php include "script.php"?>
  