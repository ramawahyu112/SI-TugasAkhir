
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
              <h6 class="m-0 font-weight-bold text-primary">LIST DATA MATERI</h6>
             
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
                <h3 class="modal-title" id="myModalLabel">Add Materi</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('ruangbelajar/addmateri');?>">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Pelajaran Detail</label>
                        <div class="col-xs-8">
                            <input name="pelajaran" class="form-control" type="text" placeholder="Masukkan pelajaran" required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Judul</label>
                        <div class="col-xs-8">
                            <input name="judul" class="form-control" type="text" placeholder="Masukkan Judul" required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Detail</label>
                        <div class="col-xs-8">
                            <input name="detail" class="form-control" type="text" placeholder="Masukkan detail" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Url Video</label>
                        <div class="col-xs-8">
                            <input name="urlvideo" class="form-control" type="text" placeholder="Masukkan url video" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Url Teks</label>
                        <div class="col-xs-8">
                            <input name="urlteks" class="form-control" type="text" placeholder="Masukkan url teks" required>
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
                      <th>Pelajaran Detail</th>
                      <th>Judul</th>
                      <th>Detail User</th>
                      <th>Url Video</th>
                      <th>Url Teks</th>
                       <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                    <?php
                     $count = 0;
                      foreach ($materi->result() as $row) :
                        $count++; ?>
                  <tr>
                    <td><?php echo $count?></td>
                    <td><?php echo $row->id_mpd;?></td>
                    <td><?php echo $row->judul;?></td>
                    <td><?php echo $row->detail;?></td>
                    <td><?php echo $row->url_video;?></td>
                    <td><?php echo $row->url_teks;?></td>
                    <td>
                      <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $row->id_materi;?>"> Update </a>
                 
                      <a href="<?php echo site_url('ruangbelajar/deletemateri/'.$row->id_materi);?>" class="btn btn-sm btn-danger">Delete</a>


                        
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
        foreach($materi->result_array() as $i):
            $id_materi=$i['id_materi'];
            $id_mpd=$i['id_mpd'];
            $judul=$i['judul'];
            $detail=$i['detail'];
            $urlvideo=$i['url_video'];
            $urlteks=$i['url_teks'];
        ?>
        <div class="modal fade" id="modal_edit<?php echo $id_materi;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal"
         aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Edit Materi</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('ruangbelajar/addmateri/'.$id_materi);?>">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Pelajaran</label>
                        <div class="col-xs-8">
                            <input name="pelajaran" value="<?php echo $id_mpd;?>" class="form-control" type="text" placeholder="Masukkan materi" >
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Judul</label>
                        <div class="col-xs-8">
                            <input name="judul" value="<?php echo $judul;?>" class="form-control" type="text" placeholder="Masukkan judul" required>
                        </div>
                    </div>
 
                   <div class="form-group">
                        <label class="control-label col-xs-3" >Detail</label>
                        <div class="col-xs-8">
                            <input name="detail" value="<?php echo $detail;?>" class="form-control" type="text" placeholder="Masukkan detail" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Url Video</label>
                        <div class="col-xs-8">
                            <input name="urlvideo" value="<?php echo $urlvideo;?>" class="form-control" type="text" placeholder="Masukkan url video" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Url Teks</label>
                        <div class="col-xs-8">
                            <input name="urlteks" value="<?php echo $urlteks;?>" class="form-control" type="text" placeholder="Masukkan url teks" required>
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
