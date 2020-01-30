
<?php 
  include "header.php"
?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">LIST DATA DOSEN</h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item   " ><a href="./">Home</a></li>
              <li class="breadcrumb-item">Master Data</li>
              <li class="breadcrumb-item active" aria-current="page">Data Dosen</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
          
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_add_new"> <i class="fas fa-plus">Add </i></a>
                </div>

<!-- ============ MODAL ADD DOSEN =============== -->
        <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                 <h4 class="modal-title" id="myModalLabel"><b>Add Dosen</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
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
                            <input name="NIDN" class="form-control" type="text" placeholder="Masukkan NIDN " required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Dosen</label>
                        <div class="col-xs-8">
                            <input name="NamaDosen" class="form-control" type="text" placeholder="Masukkan Nama Dosen" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Alamat</label>
                        <div class="col-xs-8">
                            <textarea name="Alamat" class="form-control"  placeholder="Masukkan Alamat" required></textarea> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nomor Telepon</label>
                        <div class="col-xs-8">
                            <input name="NoTelp" class="form-control" type="text" placeholder="Masukkan Nomor Telepon " required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Golongan</label>
                        <div class="col-xs-8">
                            <input name="Golongan" class="form-control" type="text" placeholder="Masukkan Golongan" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Pangkat</label>
                        <div class="col-xs-8">
                            <input name="Pangkat" class="form-control" type="text" placeholder="Masukkan Pangkat" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Pendidikan Terakhir</label>
                        <div class="col-xs-8">
                            <input name="PendidikanTerakhir" class="form-control" type="text" placeholder="Masukkan Pendidikan Terakhir" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Username</label>
                        <div class="col-xs-8">
                            <input name="Username" class="form-control" type="text" placeholder="Masukkan Username" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Password</label>
                        <div class="col-xs-8">
                            <input name="Password" class="form-control" type="text" placeholder="Masukkan Password" required>
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

                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                     <tr>
                      <th width="20">No</th>
                      <th width="30">NIP</th>
                      <th width="30">NIDN</th>
                      <th width="30">Nama</th>
                      <th>Alamat</th>
                      <th>No. Telp</th>
                      <th width="10">Golongan</th>
                      <th width="10">Pangkat</th>
                      <th width="10">Pendidikan</th>
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
                      <a href="#" class="btn btn-sm   btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $row->NIP;?>"> <i class="fas fa-edit"> </i></a>
                 
                      <a href="<?php echo site_url('tugasakhir/deletedosen/'.$row->NIP);?>" class="btn btn-sm  btn-danger"><i class="fas fa-trash"></i></a>


                        
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

      <!-- ============ MODAL EDIT DOSEN =============== -->
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
                 <h4 class="modal-title" id="myModalLabel"><b>Edit Dosen</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
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
                            <input name="NIDN" value="<?php echo $NIDN;?>" class="form-control" type="text" placeholder="Masukkan NIDN" required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Dosen</label>
                        <div class="col-xs-8">
                            <input name="NamaDosen" value="<?php echo $NamaDosen;?>" class="form-control" type="text" placeholder="Masukkan Nama Dosen" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Alamat</label>
                        <div class="col-xs-8">
                            <textarea name="Alamat" class="form-control"  placeholder="Masukkan Alamat" required><?php echo $Alamat;?> </textarea> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nomor Telepon</label>
                        <div class="col-xs-8">
                            <input name="NoTelp" value="<?php echo $NoTelp;?>" class="form-control" type="text" placeholder="Masukkan Nomor Telepon " required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Golongan</label>
                        <div class="col-xs-8">
                            <input name="Golongan" value="<?php echo $Golongan;?>" class="form-control" type="text" placeholder="Masukkan Golongan" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Pangkat</label>
                        <div class="col-xs-8">
                            <input name="Pangkat" value="<?php echo $Pangkat;?>" class="form-control" type="text" placeholder="Masukkan Pangkat" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Pendidikan Terakhir</label>
                        <div class="col-xs-8">
                            <input name="PendidikanTerakhir" value="<?php echo $PendidikanTerakhir;?>" class="form-control" type="text" placeholder="Masukkan Pendidikan Terakhir" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Username</label>
                        <div class="col-xs-8">
                            <input name="Username" value="<?php echo $Username;?>" class="form-control" type="text" placeholder="Masukkan Username" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Password</label>
                        <div class="col-xs-8">
                            <input name="Password" value="<?php echo $Password;?>" class="form-control" type="text" placeholder="Masukkan Password" required>
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
    <!--END MODAL ADD DOSEN-->


        </div>
        <!---Container Fluid-->
<?php include "script.php"?>
  