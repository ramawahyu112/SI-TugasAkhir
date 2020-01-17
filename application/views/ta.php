
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
              <h6 class="m-0 font-weight-bold text-primary">LIST DATA TUGAS AKHIR</h6>
             
            </div>
             <div class="card-header py-9">
               <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_add_new"><i class="fas fa-plus"> Add</i> </a>
             </div>

<!-- ============ MODAL ADD TUGAS AKHIR =============== -->
        <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><b>Add Data Tugas Akhir</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('tugasakhir/addta');?>">
                <div class="modal-body">

                  <div class="form-group">
                        <label class="control-label col-xs-3" >No Proposal</label>
                        <div class="col-xs-8">
                            <select name="NoProposal" class="form-control">
                            <option value="0">-Pilih No Proposal-</option>
                            <?php foreach($proposalta->result() as $rowproposalta):?>
                                <option value="<?php echo $rowproposalta->NoProposal;?>"><?php echo $rowproposalta->NoProposal;?></option>
                            <?php endforeach;?>
                        </select>
                        </div>
                    </div>

                  <div class="form-group">
                        <label class="control-label col-xs-3" >Judul Tugas Akhir</label>
                        <div class="col-xs-8">
                            <input name="JudulTA" class="form-control" type="text" placeholder="Masukkan Judul Tugas Akhir" required>
                        </div>
                    </div>
                      <div class="form-group">
                        <label class="control-label col-xs-3" >Tahun Tugas Akhir</label>
                        <div class="col-xs-8">
                            <input name="TahunTA" class="form-control" type="text" placeholder="Masukkan Tahun Tugas Akhir" required>
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
                        <label class="control-label col-xs-3" >Tanggal Disetujui</label>
                        <div class="col-xs-8">
                            <input name="TglDisetujui" class="form-control" type="date" placeholder="Masukkan Tanggal Disetujui" required>
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


                      <div class="form-group">
                        <label class="control-label col-xs-3" >Folder Softcopy Laporan</label>
                        <div class="col-xs-8">
                            <input name="FolderSoftCopyLaporan" class="form-control" type="text" placeholder="Masukkan Folder Softcopy Laporan" required>
                        </div>
                    </div>

                      <div class="form-group">
                        <label class="control-label col-xs-3" >Folder Softcopy Source </label>
                        <div class="col-xs-8">
                            <input name="FolderSoftCopySource" class="form-control" type="text" placeholder="Masukkan Folder Softcopy Source" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Status</label>
                        <div class="col-xs-8">
                            <select name="Status" class="form-control">
                            <option value="0">-Belum Disetujui-</option>
                            <option value="1">-Disetujui-</option>
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
        <!--END MODAL ADD TUGAS AKHIR-->

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" id="mydata">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No Proposal</th>
                      <th>Judul Tugas Akhir</th>
                      <th>Tahun Tugas Akhir</th>
                      <th>Nama Mahasiswa</th>
                      <th>Tanggal Disetujui</th>
                      <th>Pembimbing 1</th>
                      <th>Pembimbing 2</th>
                      <th>Folder Softcopy Laporan</th>
                      <th>Folder Softcopy Source</th>
                      <th>Status</th>
                       <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                    <?php
                     $count = 0;
                      foreach ($tugasakhir->result() as $row) :
                        $count++; ?>
                  <tr>
                    <td><?php echo $count?></td>
                    <td><?php echo $row->NoProposal;?></td>
                    <td><?php echo $row->JudulTA;?></td>
                    <td><?php echo $row->TahunTA;?></td>
                    <td><?php echo $row->NamaMahasiswa;?></td>
                    <td><?php echo $row->TglDisetujui;?></td>
                     <td><?php echo $row->Pembimbing1;?></td>
                      <td><?php echo $row->Pembimbing2;?></td>
                      <td><?php echo $row->FolderSoftCopyLaporan;?></td>
                      <td><?php echo $row->FolderSoftCopySource;?></td>
                      <td><?php echo $row->Status;?></td>
                    <td>
                      <a href="#" class="btn btn-sm  btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $row->NoTA;?>"> <i class="fas fa-edit"></i> </a>
                 
                      <a href="#" class="btn btn-sm  btn-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $row->NoTA;?>"><i class="fas fa-trash"></i></a>
                        
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



       <!-- ============ MODAL EDIT TUGAS AKHIR =============== -->
    <?php
        foreach($tugasakhir->result_array() as $i):
            $NoTA=$i['NoTA'];
            $NoProposal=$i['NoProposal'];
            $JudulTA=$i['JudulTA'];
            $TahunTA=$i['TahunTA'];
            $NIM=$i['NIM'];
            $TglDisetujui=$i['TglDisetujui'];
            $NIPPembimbing1=$i['NIPPembimbing1'];
            $NIPPembimbing2=$i['NIPPembimbing2'];
            $FolderSoftCopyLaporan=$i['FolderSoftCopyLaporan'];
            $FolderSoftCopySource=$i['FolderSoftCopySource'];
            $Status=$i['Status'];
        ?>
        <div class="modal fade" id="modal_edit<?php echo $NoTA;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal"
         aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                 <h4 class="modal-title" id="myModalLabel"><b>Edit Data Tugas Akhir</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('tugasakhir/addta/'.$NoTA);?>">
                <div class="modal-body">

                  <div class="form-group">
                        <label class="control-label col-xs-3" >No Proposal</label>
                        <div class="col-xs-8">
                            <select name="NoProposal" class="form-control">
                            <option value="0">-Pilih No Proposal-</option>
                            <?php foreach($proposalta->result() as $rowproposalta):?>
                                <option value="<?php $noproposals=$rowproposalta->NoProposal; echo $noproposals; ?>"  <?php if($NoProposal==$noproposals){ echo 'selected';} ?>
                                ><?php echo $rowproposalta->NoProposal;?></option>
                            <?php endforeach;?>
                        </select>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Judul Tugas Akhir</label>
                        <div class="col-xs-8">
                            <input name="JudulTA" class="form-control"  value="<?php echo $JudulTA;?>" type="text" placeholder="Masukkan Judul Tugas Akhir" required>
                        </div>
                    </div>
                      <div class="form-group">
                        <label class="control-label col-xs-3" >Tahun Tugas Akhir</label>
                        <div class="col-xs-8">
                            <input name="TahunTA" class="form-control" type="text" value="<?php echo $TahunTA;?>" placeholder="Masukkan Tahun Tugas Akhir" required>
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
                        <label class="control-label col-xs-3" >Tanggal Disetujui</label>
                        <div class="col-xs-8">
                            <input name="TglDisetujui" class="form-control" type="date" value="<?php echo $TglDisetujui;?>" placeholder="Masukkan Tanggal Disetujui" required>
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

                        <div class="form-group">
                        <label class="control-label col-xs-3" >Folder Softcopy Laporan</label>
                        <div class="col-xs-8">
                            <input name="FolderSoftCopyLaporan" class="form-control" type="text" value="<?php echo $FolderSoftCopyLaporan;?>" placeholder="Masukkan Folder Softcopy Laporan" required>
                        </div>
                    </div>

                        <div class="form-group">
                        <label class="control-label col-xs-3" >Folder Softcopy Source</label>
                        <div class="col-xs-8">
                            <input name="FolderSoftCopySource" class="form-control" type="text" value="<?php echo $FolderSoftCopySource;?>" placeholder="Masukkan Folder Softcopy Source" required>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-xs-3" >Status</label>
                        <div class="col-xs-8">
                            <select name="Status" class="form-control">
                            <option value="0">-Belum Disetujui-</option>
                            <option value="1">-Disetujui-</option>
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
    <!--END MODAL ADD TUGAS AKHIR-->
<?php
        foreach($tugasakhir->result_array() as $i):
            $NoTA=$i['NoTA'];
            $JudulTA=$i['JudulTA'];
            $NamaMahasiswa=$i['NamaMahasiswa'];
        ?>
     <!-- ============ MODAL HAPUS TUGAS AKHIR=============== -->
        <div class="modal fade" id="modal_hapus<?php echo $NoTA;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="fas fa-trash"> Delete !</h5 >
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>

            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('tugasakhir/deleteta/'.$NoTA);?>">
                <div class="modal-body">
                    <p>Hapus Data Tugas Akhir <b><?php echo $JudulTA;?></b> Atas Nama  <b><?php echo $NamaMahasiswa;?> </b> ?</p>
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
    <!--END MODAL HAPUS TUGAS AKHIR-->

     

 <?php include "script.php"?>
 <script>
    $(document).ready(function(){
        $('#mydata').DataTable();
    });
</script>


</html>
