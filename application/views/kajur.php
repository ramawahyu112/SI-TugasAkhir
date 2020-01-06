
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
              <h6 class="m-0 font-weight-bold text-primary">LIST DATA KETUA JURUSAN</h6>
             
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
                <h3 class="modal-title" id="myModalLabel">Add Data Jurusan</h3>
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

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" id="mydata">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Jurusan</th>
                      <th>Ketua Jurusan</th>
                      <th>Periode</th>
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
                      <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $row->KodeJurusan;?>"> Update </a>
                 
                      <a href="<?php echo site_url('tugasakhir/deletekajur/'.$row->KodeJurusan.'/'.$row->NIP);?>" class="btn btn-sm btn-danger">Delete</a>
                        
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title" id="myModalLabel">Edit Jurusan</h4>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('tugasakhir/addkajur/'.$KodeJurusan.'/'.$row->NIP);?>">
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

     

 <?php include "script.php"?>
 <script>
    $(document).ready(function(){
        $('#mydata').DataTable();
    });
</script>


</html>
