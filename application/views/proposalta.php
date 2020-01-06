
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
              <h6 class="m-0 font-weight-bold text-primary">LIST DATA PROPOSAL TUGAS AKHIR</h6>
             
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
                <h3 class="modal-title" id="myModalLabel">Add Data Proposal Tugas Akhir</h3>
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
        <!--END MODAL ADD JURUSAN-->

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" id="mydata">
                  <thead>
                    <tr>
                      <th>No</th>
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
                      <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $row->NoProposal;?>"> Update </a>
                 
                      <a href="<?php echo site_url('tugasakhir/deletekaprodi/'.$row->NoProposal);?>" class="btn btn-sm btn-danger">Delete</a>
                        
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
        foreach($proposalta->result_array() as $i):
            $NoProposal=$i['NoProposal'];
            $JudulProposal=$i['JudulProposal'];
            $TahunProposal=$i['TahunProposal'];
            $NamaMahasiswa=$i['NamaMahasiswa'];
            $Pembimbing1=$i['Pembimbing1'];
            $Pembimbing2=$i['Pembimbing2'];
        ?>
        <div class="modal fade" id="modal_edit<?php echo $NoProposal;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal"
         aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title" id="myModalLabel">Edit Program Studi</h4>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('tugasakhir/addkaprodi/'.$KodeProdi.'/'.$row->NIP);?>">
                <div class="modal-body">
 

                   <div class="form-group">
                        <label class="control-label col-xs-3" >Program Studi</label>
                        <div class="col-xs-8">
                            <select name="KodeProdi" class="form-control">
                            <option value="0">-Pilih Program Studi-</option>
                            <?php foreach($prodi->result() as $rowprodi):?>
                                <option value="<?php $prodis=$rowprodi->KodeProdi; echo $prodis; ?>"
                                   <?php if($KodeProdi==$prodis){ echo 'selected';} ?>
                                  ><?php echo $rowprodi->NamaProdi;?></option>
                            <?php endforeach;?>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Ketua Program Studi</label>
                        <div class="col-xs-8">
                            <select name="NIP" class="form-control">
                            <option value="0">-Pilih Ketua Program Studi-</option>
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

     

 <?php include "script.php"?>
 <script>
    $(document).ready(function(){
        $('#mydata').DataTable();
    });
</script>


</html>
