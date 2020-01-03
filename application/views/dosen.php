
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
              <h6 class="m-0 font-weight-bold text-primary">LIST DATA DOSEN</h6>
             
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
                <h3 class="modal-title" id="myModalLabel">Add DATA DOSEN</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('tugasakhir/adddosen');?>">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >NIP</label>
                        <div class="col-xs-8">
                            <input name="NIP" class="form-control" type="text" placeholder="Masukkan NIP" required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >NIDN</label>
                        <div class="col-xs-8">
                            <input name="NIDN" class="form-control" type="text" placeholder="Masukkan NIDN required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Dosen</label>
                        <div class="col-xs-8">
                            <input name="NamaDosen" class="form-control" type="text" placeholder="Masukkan nama dosen" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Alamat</label>
                        <div class="col-xs-8">
                            <input name="Alamat" class="form-control" type="text" placeholder="Masukkan alamat" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nomor Telepon</label>
                        <div class="col-xs-8">
                            <input name="NoTelp" class="form-control" type="text" placeholder="Masukkan nomor telepon " required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Golongan</label>
                        <div class="col-xs-8">
                            <input name="Golongan" class="form-control" type="text" placeholder="Masukkan golongan" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Pangkat</label>
                        <div class="col-xs-8">
                            <input name="Pangkat" class="form-control" type="text" placeholder="Masukkan pangkat" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Pendidikan Terakhir</label>
                        <div class="col-xs-8">
                            <input name="PendidikanTerakhir" class="form-control" type="text" placeholder="Masukkan pendidikan terakhir" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Username</label>
                        <div class="col-xs-8">
                            <input name="Username" class="form-control" type="text" placeholder="Masukkan username" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Password</label>
                        <div class="col-xs-8">
                            <input name="Password" class="form-control" type="text" placeholder="Masukkan password" required>
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
                      <th>NIP</th>
                      <th>NIDN</th>
                      <th>Nama Dosen</th>
                      <th>Alamat</th>
                      <th>Nomor Telepon</th>
                      <th>Golongan</th>
                      <th>Pangkat</th>
                      <th>Pendidikan Terakhir</th>
                      <th>Username</th>
                      <th>Password</th>
                       <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                    <?php
                     $count = 0;
                      foreach ($dosen->result() as $row) :
                        $count++; ?>
                  <tr>
                    <td><?php echo $count?></td>
                    <td><?php echo $row->NIP;?></td>
                    <td><?php echo $row->NIDN;?></td>
                    <td><?php echo $row->NamaDosen;?></td>
                    <td><?php echo $row->Alamat;?></td>
                    <td><?php echo $row->NoTelp;?></td>
                    <td><?php echo $row->Golongan;?></td>
                    <td><?php echo $row->Pangkat;?></td>
                    <td><?php echo $row->PendidikanTerakhir;?></td>
                    <td><?php echo $row->Username;?></td>
                    <td><?php echo $row->Password;?></td>
                    <td>
                      <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $row->NIP;?>"> Update </a>
                 
                      <a href="<?php echo site_url('tugasakhir/deletedosen/'.$row->NIP);?>" class="btn btn-sm btn-danger">Delete</a>


                        
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
        foreach($dosen->result_array() as $i):
            $NIP=$i['NIP'];
            $NIDN=$i['NIDN'];
            $NamaDosen=$i['NamaDosen'];
            $Alamat=$i['Alamat'];
            $NoTelp=$i['NoTelp'];
            $Golongan=$i['Golongan'];
            $Pangkat=$i['Pangkat'];
             $PendidikanTerakhir=$i['PendidikanTerakhir'];
            $Username=$i['Username'];
            $Password=$i['Password'];
      
        ?>
        <div class="modal fade" id="modal_edit<?php echo $NIP;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal"
         aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Edit dosen</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('tugasakhir/adddosen/'.$NIP);?>">
                <div class="modal-body">
                   <div class="form-group">
                        <label class="control-label col-xs-3" >NIP</label>
                        <div class="col-xs-8">
                            <input name="NIP" value="<?php echo $NIP;?>" class="form-control" type="text" placeholder="Masukkan NIP" required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >NIDN</label>
                        <div class="col-xs-8">
                            <input name="NIDN" value="<?php echo $NIDN;?>" class="form-control" type="text" placeholder="Masukkan NIDN required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Dosen</label>
                        <div class="col-xs-8">
                            <input name="NamaDosen" value="<?php echo $NamaDosen;?>" class="form-control" type="text" placeholder="Masukkan nama dosen" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Alamat</label>
                        <div class="col-xs-8">
                            <input name="Alamat" value="<?php echo $Alamat;?>" class="form-control" type="text" placeholder="Masukkan alamat" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nomor Telepon</label>
                        <div class="col-xs-8">
                            <input name="NoTelp" value="<?php echo $NoTelp;?>" class="form-control" type="text" placeholder="Masukkan nomor telepon " required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Golongan</label>
                        <div class="col-xs-8">
                            <input name="Golongan" value="<?php echo $Golongan;?>" class="form-control" type="text" placeholder="Masukkan golongan" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Pangkat</label>
                        <div class="col-xs-8">
                            <input name="Pangkat" value="<?php echo $Pangkat;?>" class="form-control" type="text" placeholder="Masukkan pangkat" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Pendidikan Terakhir</label>
                        <div class="col-xs-8">
                            <input name="PendidikanTerakhir" value="<?php echo $PendidikanTerakhir;?>" class="form-control" type="text" placeholder="Masukkan pendidikan terakhir" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Username</label>
                        <div class="col-xs-8">
                            <input name="Username" value="<?php echo $Username;?>" class="form-control" type="text" placeholder="Masukkan username" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Password</label>
                        <div class="col-xs-8">
                            <input name="Password" value="<?php echo $Password;?>" class="form-control" type="text" placeholder="Masukkan password" required>
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
