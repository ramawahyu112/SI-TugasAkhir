
<?php 
  include "header.php"
?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">LIST DATA KETUA JURUSAN</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Ketua Jurusan</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
          
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_add_new"><i class="fas fa-plus">Add</i> </a>
                </div>


               <!-- ============ MODAL ADD JURUSAN =============== -->
        <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title" id="myModalLabel"><b>Add Ketua  Jurusan</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('tugasakhir/addkajur');?>">
                <div class="modal-body">

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
                        <label class="control-label col-xs-3" >Ketua Jurusan</label>
                        <div class="col-xs-8">
                            <select name="NIP" class="form-control">
                            <option value="0">-Pilih Ketua Jurusan-</option>
                            <?php foreach($dosen->result() as $rowdosen):?>
                                <option value="<?php echo $rowdosen->NIP;?>"><?php echo $rowdosen->NamaDosen;?></option>
                            <?php endforeach;?>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Periode</label>
                        <div class="col-xs-8">
                            <input name="Periode" class="form-control" type="text" placeholder="Masukkan Periode Jabatan" required>
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
                      <th>Jurusan</th>
                      <th>Ketua Jurusan</th>
                      <th width="50">Periode</th>
                       <th>Action</th>
                    </tr>
                    </thead>
                   
                    <tbody>
                     
                     <?php
                     $count = 0;
                      foreach ($kajur->result() as $row) :
                        $count++; ?>
                  <tr>
                    <td><?php echo $count?></td>
                    <td><?php echo $row->NamaJurusan;?></td>
                    <td><?php echo $row->NamaDosen;?></td>
                    <td><?php echo $row->Periode;?></td>
                    <td>
                      <a href="#" class="btn btn-sm  btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $row->KodeJurusan;?>"><i class="fas fa-edit"></i> </a>
                 
                      <a href="#" data-toggle="modal" data-target="#modal_hapus<?php echo $row->KodeJurusan;?>" class="btn  btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        
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
        foreach($kajur->result_array() as $i):
            $KodeJurusan=$i['KodeJurusan'];
            $NIP=$i['NIP'];
            $Periode=$i['Periode'];
        ?>
        <div class="modal fade" id="modal_edit<?php echo $KodeJurusan;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal"
         aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><b>Edit Ketua  Jurusan</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('tugasakhir/addkajur/'.$KodeJurusan.'/'.$NIP);?>">
                <div class="modal-body">
 

                  <div class="form-group">
                        <label class="control-label col-xs-3" >Jurusan</label>
                        <div class="col-xs-8">
                            <select name="KodeJurusan" class="form-control">
                            <option value="0">-Pilih Jurusan-</option>
                            <?php foreach($jurusan->result() as $rowjurusan):?>
                                <option value="<?php $jurusans=$rowjurusan->KodeJurusan; echo $jurusans; ?>"
                                  <?php if($KodeJurusan==$jurusans){ echo 'selected';} ?>
                                  ><?php echo $rowjurusan->NamaJurusan;?></option>
                            <?php endforeach;?>
                        </select>
                        </div>
                    </div>

                      <div class="form-group">
                        <label class="control-label col-xs-3" >Ketua Jurusan</label>
                        <div class="col-xs-8">
                            <select name="NIP" class="form-control">
                            <option value="0">-Pilih Ketua Jurusan-</option>
                            <?php foreach($dosen->result() as $rowdosen):?>
                                <option value="<?php $dosens=$rowdosen->NIP; echo $dosens; ?>"
                                  <?php if($NIP==$dosens){ echo 'selected';} ?>
                                  ><?php echo $rowdosen->NamaDosen;?></option>
                            <?php endforeach;?>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Periode</label>
                        <div class="col-xs-8">
                            <input name="Periode" class="form-control" value="<?php echo $Periode;?>" type="text" placeholder="Masukkan Periode Jabatan" required>
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

    <?php
        foreach($kajur->result_array() as $i):
            $KodeJurusan=$i['KodeJurusan'];
            $NIP=$i['NIP'];
            $NamaDosen=$i['NamaDosen'];
            $Periode=$i['Periode'];
        ?>
     <!-- ============ MODAL HAPUS KETUA JURUSAN =============== -->
        <div class="modal fade" id="modal_hapus<?php echo $KodeJurusan;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="fas fa-trash"> Delete !</h5 >
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>

            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('tugasakhir/deletekajur/'.$KodeJurusan.'/'.$NIP);?>">
                <div class="modal-body">
                    <p>Hapus data Ketua Jurusan <b><?php echo $NamaDosen;?></b> periode   <b><?php echo $Periode;?> </b> ?</p>
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
    <!--END MODAL HAPUS KETUA JURUSAN-->
        </div>
        <!---Container Fluid-->
<?php include "script.php"?>
  