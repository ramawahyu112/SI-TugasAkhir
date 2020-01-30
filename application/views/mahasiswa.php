
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
              <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA MAHASISWA</h6>
             
            </div>
             <div class="card-header py-9">
               <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_add_new"><i class="fas fa-plus"> Add</i> </a>
             </div>

<!-- ============ MODAL ADD MAHASISWA =============== -->
        <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel"><b>Add Mahasiswa</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('tugasakhir/addmahasiswa');?>">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Username</label>
                        <div class="col-xs-8">
                            <input name="Username" class="form-control" type="text" placeholder="Masukkan Username Anda" required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Password</label>
                        <div class="col-xs-8">
                            <input name="Password" class="form-control" type="text" placeholder="Masukkan Password Anda" required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >NIM</label>
                        <div class="col-xs-8">
                            <input name="NIM" class="form-control" type="text" placeholder="Masukkan NIM Anda" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Mahasiswa</label>
                        <div class="col-xs-8">
                            <input name="NamaMahasiswa" class="form-control" type="text" placeholder="Masukkan Nama Anda" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Alamat</label>
                        <div class="col-xs-8">
                            <textarea name="Alamat" class="form-control" placeholder="Masukkan Alamat" required></textarea> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >No. Telepon</label>
                        <div class="col-xs-8">
                            <input name="NoTelp" class="form-control" type="text" placeholder="Masukkan No. Telepon" required>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-xs-3" >Program Studi</label>
                        <div class="col-xs-8">

                          <select name="KodeProdi" class="form-control">
                            <option value="0">-Pilih Program Studi-</option>
                            <?php foreach($prodi->result() as $rowprodi):?>
                                <option value="<?php echo $rowprodi->KodeProdi;?>"><?php echo $rowprodi->NamaProdi;?></option>
                            <?php endforeach;?>
                        </select>
                     
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
        <!--END MODAL ADD MAHASISWA-->

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" id="mydata">
                  <thead>
                    <tr>
                      <th width="20">No</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>NIM</th>
                      <th>Nama </th>
                      <th>Alamat</th>
                      <th>No. Telp</th>
                      <th>Program Studi</th>
                       <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                    <?php
                     $count = 0;
                      foreach ($mahasiswa->result() as $row) :
                        $count++; 
                        ?>
                  <tr>
                    <td><?php echo $count?></td>
                    <td><?php echo $row->Username;?></td>
                    <td><?php echo $row->Password;?></td>
                    <td><?php echo $row->NIM;?></td>
                    <td><?php echo $row->NamaMahasiswa;?></td>
                    <td><?php echo $row->Alamat;?></td>
                    <td><?php echo $row->NoTelp;?></td>
                    <td><?php echo $row->NamaProdi;?></td>
                    <td>
                      <a href="#" class="btn btn-sm  btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $row->NIM;?>"> <i class="fas fa-edit"></i> </a>
                 
                      <a href="#" class="btn btn-sm  btn-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $row->NIM;?>"><i class="fas fa-trash"></i></a>


                        
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



       <!-- ============ MODAL EDIT MAHASISWA =============== -->
    <?php
        foreach($mahasiswa->result_array() as $i):
            $NIM=$i['NIM'];
            $Username=$i['Username'];
            $Password=$i['Password'];
            $NamaMahasiswa=$i['NamaMahasiswa'];
            $Alamat=$i['Alamat'];
            $NoTelp=$i['NoTelp'];
            $KodeProdi=$i['KodeProdi'];
        ?>
        <div class="modal fade" id="modal_edit<?php echo $NIM;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal"
         aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                 <h4 class="modal-title" id="myModalLabel"><b>Edit Mahasiswa</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('tugasakhir/addmahasiswa/'.$NIM);?>">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Username</label>
                        <div class="col-xs-8">
                            <input name="Username" value="<?php echo $Username;?>" class="form-control" type="text" placeholder="Masukkan Username Anda" required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Password</label>
                        <div class="col-xs-8">
                            <input name="Password" value="<?php echo $Password;?>" class="form-control" type="text" placeholder="Masukkan Password Anda" required>
                        </div>
                    </div>
 
                   <div class="form-group">
                        <label class="control-label col-xs-3" >NIM</label>
                        <div class="col-xs-8">
                            <input name="NIM" value="<?php echo $NIM;?>" class="form-control" type="text" placeholder="Masukkan NIM Anda" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Mahasiswa</label>
                        <div class="col-xs-8">
                            <input name="NamaMahasiswa" value="<?php echo $NamaMahasiswa;?>" class="form-control" type="text" placeholder="Masukkan Nama Anda" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Alamat</label>
                        <div class="col-xs-8">
                            <textarea name="Alamat"class="form-control"  placeholder="Masukkan Alamat" required><?php echo $Alamat;?>  </textarea> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >No. Telepon</label>
                        <div class="col-xs-8">
                            <input name="NoTelp" value="<?php echo $NoTelp;?>" class="form-control" type="text" placeholder="Masukkan No. Telepon" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Program Studi</label>
                        <div class="col-xs-8">
                             <select name="KodeProdi" class="form-control">
                            <option value="0">-Pilih Program Studi-</option>
                            <?php foreach($prodi->result() as $rowprodi):?>
                                <option value="<?php $pro=$rowprodi->KodeProdi; echo $pro; ?>" 
                                  <?php if($KodeProdi==$pro){ echo 'selected';} ?>
                                  ><?php echo $rowprodi->NamaProdi;?></option>
                            <?php endforeach;?>
                        </select>
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
    <!--END MODAL ADD MAHASISWA-->


     <?php
        foreach($mahasiswa->result_array() as $i):
            $NIM=$i['NIM'];
            $NamaMahasiswa=$i['NamaMahasiswa'];
        ?>
     <!-- ============ MODAL HAPUS MAHASISWA =============== -->
        <div class="modal fade" id="modal_hapus<?php echo $NIM;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="fas fa-trash"> Delete !</h5 >
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>

            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('tugasakhir/deletemahasiswa/'.$NIM);?>">
                <div class="modal-body">
                    <p>Menghapus data dapat mempengaruhi program lainnya !!</p>
                    <p>Hapus data Mahasiswa <b><?php echo $NamaMahasiswa;?> ?</b></p>
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
    <!--END MODAL HAPUS MAHASISWA-->

     

 <?php include "script.php"?>
 <script>
    $(document).ready(function(){
        $('#mydata').DataTable();
    });
</script>


</html>
