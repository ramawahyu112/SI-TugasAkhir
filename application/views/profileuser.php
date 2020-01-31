
  <?php foreach ($user->result() as $row): 
                    $foto=$row->foto;
                    $Nim= $row->NIM;
                    $NamaMhs= $row->NamaMahasiswa;

                     endforeach;?>
<?php 
  include "headeruser.php"
?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h4 mb-0 text-gray-800"><b>Profile Mahasiswa</b></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Profile Mahasiswa </li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
          
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
              


                        
                 <div class="card-body py-3 d-flex flex-row align-items-center justify-content-between">
                    <img class="img-profile " src="<?php
                    if($foto==""){
                        $link="assets/img/boy.png";
                    }else{
                         $link="assets/uploadimage/".$foto;
                    }

                     echo base_url().$link ?>" style="max-width: 100px">

       
                </div>
                  <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo site_url('tugasakhir/changepicture/'.$Nim);?>">
                <div class="card-body py-3 d-flex flex-row align-items-center ">
                     <div class="form-group">
                      <div class="custom-file">
                        <input type="file" name="fotouser" accept=".jpg,.jpeg, .png" class="custom-file-input" onchange="alertFilename()"  id="customFile">
                        <label class="custom-file-label" id="customName"  for="customFile" ></label>

                      </div>
                    </div>
                     <div class="form-group">

                      <input type="submit" class="btn btn-sm btn-success" name="submit" value="Upload Foto">
                 </div>
                </div>
            </form>

                <div class="card-body py-0 ">
            
                   <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_edit"><i class="fas fa-user-edit"> Edit Profile</i> </a>

                </div>

                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <tbody>
                     
                     <?php
                      foreach ($user->result() as $row) :
                        ?>
                  <tr>
                     <td width="15%">Nim</td>
                     <td width="2%">:</td>
                     <td width="30%"><?php echo $row->NIM;?></td>
                     <td width="3%"></td>
                     <td width="15%">Nama Mahasiswa</td>
                     <td width="2%">:</td>
                     <td width="30%"><?php echo $row->NamaMahasiswa;?></td>
                     </tr>
                    <tr>
                     <td width="15%">Alamat</td>
                     <td width="2%">:</td>
                     <td width="30%"><?php echo $row->Alamat;?></td>
                     <td width="3%"></td>
                     <td width="15%">Nomor Telepon</td>
                     <td width="2%">:</td>
                     <td width="30%"><?php echo $row->NoTelp;?></td>
                     </tr>
                <?php endforeach;?>
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->


      <!-- ============ MODAL EDIT MAHASISWA =============== -->
    <?php
        foreach($user->result_array() as $i):
            $NIM=$i['NIM'];
            $Username=$i['Username'];
            $Password=$i['Password'];
            $NamaMahasiswa=$i['NamaMahasiswa'];
            $Alamat=$i['Alamat'];
            $NoTelp=$i['NoTelp'];
        ?>
        <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="largeModal"
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

        </div>
        <!---Container Fluid-->
<?php include "script.php"?>
  