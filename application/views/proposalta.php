
<?php 
  include "header.php"
?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">LIST DATA PROPOSAL TUGAS AKHIR</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Tugas Akhir</li>
              <li class="breadcrumb-item active" aria-current="page">Proposal Tugas Akhir</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
          
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_add_new"><i class="fas fa-plus"> Add</i> </a>
                </div>


              <!-- ============ MODAL ADD PROPOSAL =============== -->
        <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><b>Add Data Proposal Tugas Akhir</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('tugasakhir/addproposalta');?>">
                <div class="modal-body">

                  <div class="form-group">
                        <label class="control-label col-xs-3" >Judul Proposal</label>
                        <div class="col-xs-8">
                            <input name="JudulProposal" class="form-control" type="text" placeholder="Masukkan Judul Proposal" required>
                        </div>
                    </div>
                      <div class="form-group">
                        <label class="control-label col-xs-3" >Tahun Proposal</label>
                        <div class="col-xs-8">
                            <input name="TahunProposal" class="form-control" type="text" placeholder="Masukkan Tahun Proposal" required>
                        </div>
                    </div>

                  <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Mahasiswa</label>
                        <div class="col-xs-8">
                            <select name="NIM" class="form-control">
                            <option value="0">-Pilih Mahasiswa-</option>
                            <?php foreach($mahasiswa->result() as $rowmahasiswa):?>
                                <option value="<?php echo $rowmahasiswa->NIM;?>"><?php echo $rowmahasiswa->NamaMahasiswa;?></option>
                            <?php endforeach;?>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Pembimbing 1</label>
                        <div class="col-xs-8">
                            <select name="NIPPembimbing1" class="form-control">
                            <option value="0">-Pilih Dosen-</option>
                            <?php foreach($dosen->result() as $rowdosen):?>
                                <option value="<?php echo $rowdosen->NIP;?>"><?php echo $rowdosen->NamaDosen;?></option>
                            <?php endforeach;?>
                        </select>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-xs-3" >Pembimbing 2</label>
                        <div class="col-xs-8">
                            <select name="NIPPembimbing2" class="form-control">
                            <option value="0">-Pilih Dosen-</option>
                            <?php foreach($dosen->result() as $rowdosen):?>
                                <option value="<?php echo $rowdosen->NIP;?>"><?php echo $rowdosen->NamaDosen;?></option>
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
        <!--END MODAL ADD PROPOSAL-->
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                     <tr>
                      <th width="20">No</th>
                      <th>Judul Proposal</th>
                      <th>Tahun Proposal</th>
                      <th>Nama Mahasiswa</th>
                      <th>Pembimbing 1</th>
                      <th>Pembimbing 2</th>
                       <th>Action</th>
                    </tr>
                    </thead>
                   
                    <tbody>
                     
                   <?php
                     $count = 0;
                      foreach ($proposalta->result() as $row) :
                        $count++; ?>
                  <tr>
                    <td><?php echo $count?></td>
                    <td><?php echo $row->JudulProposal;?></td>
                    <td><?php echo $row->TahunProposal;?></td>
                    <td><?php echo $row->NamaMahasiswa;?></td>
                     <td><?php echo $row->Pembimbing1;?></td>
                      <td><?php echo $row->Pembimbing2;?></td>
                    <td>
                      <a href="#" class="btn btn-sm  btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $row->NoProposal;?>"> <i class="fas fa-edit"></i> </a>
                 
                      <a href="#" class="btn btn-sm  btn-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $row->NoProposal;?>"><i class="fas fa-trash"></i></a>
                        
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

     <!-- ============ MODAL EDIT PROPOSAL =============== -->
    <?php
        foreach($proposalta->result_array() as $i):
            $NoProposal=$i['NoProposal'];
            $JudulProposal=$i['JudulProposal'];
            $TahunProposal=$i['TahunProposal'];
            $NIM=$i['NIM'];
            $NIPPembimbing1=$i['NIPPembimbing1'];
            $NIPPembimbing2=$i['NIPPembimbing2'];
        ?>
        <div class="modal fade" id="modal_edit<?php echo $NoProposal;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal"
         aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                 <h4 class="modal-title" id="myModalLabel"><b>Edit Data Proposal Tugas Akhir</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('tugasakhir/addproposalta/'.$NoProposal);?>">
                <div class="modal-body">
    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Judul Proposal</label>
                        <div class="col-xs-8">
                            <input name="JudulProposal" class="form-control"  value="<?php echo $JudulProposal;?>" type="text" placeholder="Masukkan Judul Proposal" required>
                        </div>
                    </div>
                      <div class="form-group">
                        <label class="control-label col-xs-3" >Tahun Proposal</label>
                        <div class="col-xs-8">
                            <input name="TahunProposal" class="form-control" type="text" value="<?php echo $TahunProposal;?>" placeholder="Masukkan Tahun Proposal" required>
                        </div>
                    </div>

                  <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Mahasiswa</label>
                        <div class="col-xs-8">
                            <select name="NIM" class="form-control">
                            <option value="0">-Pilih Mahasiswa-</option>
                            <?php foreach($mahasiswa->result() as $rowmahasiswa):?>
                                <option value="<?php $nims=$rowmahasiswa->NIM; echo $nims; ?>"  <?php if($NIM==$nims){ echo 'selected';} ?>
                                ><?php echo $rowmahasiswa->NamaMahasiswa;?></option>
                            <?php endforeach;?>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Pembimbing 1</label>
                        <div class="col-xs-8">
                            <select name="NIPPembimbing1" class="form-control">
                            <option value="0">-Pilih Dosen-</option>
                            <?php foreach($dosen->result() as $rowdosen):?>
                                <option value="<?php $nips=$rowdosen->NIP; echo $nips; ?>"  <?php if($NIPPembimbing1==$nips){ echo 'selected';} ?>><?php echo $rowdosen->NamaDosen;?></option>
                            <?php endforeach;?>
                        </select>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-xs-3" >Pembimbing 2</label>
                        <div class="col-xs-8">
                            <select name="NIPPembimbing2" class="form-control">
                            <option value="0">-Pilih Dosen-</option>
                            <?php foreach($dosen->result() as $rowdosen):?>
                                <option value="<?php $nips2=$rowdosen->NIP; echo $nips2;?>" <?php if($NIPPembimbing2==$nips2){ echo 'selected';} ?>><?php echo $rowdosen->NamaDosen;?></option>
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
    <!--END MODAL ADD PROPOSAL-->
<?php
        foreach($proposalta->result_array() as $i):
            $NoProposal=$i['NoProposal'];
            $JudulProposal=$i['JudulProposal'];
            $NamaMahasiswa=$i['NamaMahasiswa'];
        ?>
     <!-- ============ MODAL HAPUS PROPOSALTA=============== -->
        <div class="modal fade" id="modal_hapus<?php echo $NoProposal;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="fas fa-trash"> Delete !</h5 >
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>

            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('tugasakhir/deleteproposalta/'.$NoProposal);?>">
                <div class="modal-body">
                    <p>Hapus data Proposal <b><?php echo $JudulProposal;?></b> Atas Nama  <b><?php echo $NamaMahasiswa;?> </b> ?</p>
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
    <!--END MODAL HAPUS PROPOSALTA-->

        </div>
        <!---Container Fluid-->
<?php include "script.php"?>
  