
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
              <h6 class="m-0 font-weight-bold text-primary">LIST DATA MATA PELAJARAN</h6>
             
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
                <h3 class="modal-title" id="myModalLabel">Add Mata Pelajaran</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('ruangbelajar/addmapel');?>">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Mata Pelajaran</label>
                        <div class="col-xs-8">
                            <input name="namamapel" class="form-control" type="text" placeholder="Masukkan mata pelajaran" required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jenjang</label>
                        <div class="col-xs-8">
                            <input name="jenjang" class="form-control" type="text" placeholder="Masukkan jenjang" required>
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
                      <th>Nama Mata Pelajaran</th>
                      <th>Jenjang</th>
                       <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                    <?php
                     $count = 0;
                      foreach ($mapel->result() as $row) :
                        $count++; ?>
                  <tr>
                    <td><?php echo $count?></td>
                    <td><?php echo $row->nama_mp;?></td>>
                    <td><?php echo $row->id_jenjang;?></td>
                    <td>
                      <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $row->id_mp;?>"> Update </a>
                 
                      <a href="<?php echo site_url('ruangbelajar/deletemapel/'.$row->id_mp);?>" class="btn btn-sm btn-danger">Delete</a>


                        
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
        foreach($mapel->result_array() as $i):
            $id_mp=$i['id_mp'];
             $nama_mp=$i['nama_mp'];
            $id_jenjang=$i['id_jenjang'];
        ?>
        <div class="modal fade" id="modal_edit<?php echo $id_mp;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal"
         aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Edit User</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('ruangbelajar/addmapel/'.$id_mp);?>">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Mata Pelajaran</label>
                        <div class="col-xs-8">
                            <input name="namamapel" value="<?php echo $nama_mp;?>" class="form-control" type="text" placeholder="Masukkan mata pelajaran">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jenjang</label>
                        <div class="col-xs-8">
                            <input name="jenjang" value="<?php echo $id_jenjang;?>" class="form-control" type="text" placeholder="Masukkan  jenjang" required>
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
