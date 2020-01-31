
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
            <h1 class="h4 mb-0 text-gray-800"><b>Tugas Akhir   </b></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Tugas Akhir</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
          
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
              


               
                  <form class="form-horizontal" enctype="multipart/form-data"  method="post" action="<?php
                    $NoProposal = $this->uri->segment(3);
                    if($NoProposal!=0){
                      $link="tugasakhir/usertaadd/$NoProposal";
                    }else{
                      $link="tugasakhir/usertaadd";
                    }
                   echo site_url($link) ;?>">
              <div class="form-group col-md-6  ">
                 <?php
                    
                      $NoProposal= $this->session->userdata('NoProposal');
                        if($proposaltaget!=null){
                          foreach ($proposaltaget->result() as $row) :  
                        $Judul= $row->JudulTA;
                        $Tahun=$row->TahunTA;
                        $NIMs=$row->NIM;
                        endforeach;
                      }else{
                       $Judul= "";
                        $Tahun="";
                        $NIMs="";

                      }


                             
                         ?>
                   <div class="form-group">
                        <label class="control-label col-xs-3" >No Proposal TA</label>
                        <div class="col-xs-8">
                            <input name="NoProposal" value="<?php echo $NoProposal; ?>" class="form-control" type="text" placeholder="Masukkan Nomor Proposal TA" readonly>
                        </div>
                    </div>
                
                  <div class="form-group">
                        <label class="control-label col-xs-3" >Judul Tugas Akhir</label>
                        <div class="col-xs-8">
                            <input name="JudulTA" value="<?php echo $Judul; ?>" class="form-control" type="text" placeholder="Masukkan Judul Tugas Akhir" required>
                        </div>
                    </div>
                      <div class="form-group">
                        <label class="control-label col-xs-3" >Tahun Tugas Akhir</label>
                        <div class="col-xs-8">
                            <input name="TahunTA" value="<?php echo $Tahun; ?>" class="form-control" type="text" placeholder="Masukkan Tahun Tugas Akhir" required>
                        </div>
                    </div>

                  <div class="form-group">
                        <label class="control-label col-xs-3" >NIM </label>
                        <div class="col-xs-8">
                            <input name="NIM" value="<?php echo $NIMs; ?>" class="form-control" value="<?php echo $NIMs; ?>" type="text" placeholder="Masukkan NIM" required>
                        </div>
                    </div>

                   


                      <div class="form-group">
                        <label class="control-label col-xs-3" >Folder Softcopy Laporan</label>
                        <div class="col-xs-8">
                            <input name="FolderSoftCopyLaporan" accept=".doc,.docx, .pdf,.zip,.rar" class="form-control" type="file" >
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                       <input type="submit" class="btn btn-sm btn-success " name="submit" value="Simpan"> 
                    </div>

                     
                  </div>
                    

            </form>


                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <tbody>
                     
                      <tr>
                      <th width="20">No</th>
                      <th>No Proposal</th>
                      <th>Judul TA</th>
                      <th>Tahun TA</th>
                      <th>NIM</th>
 <!--                      <th>Pembimbing 1</th>
                      <th>Pembimbing 2</th> -->
                      <th width="20%">Softcopy Laporan</th>  
                      <th>Status</th>
                       <th>Action</th>
                    </tr>
                    </thead>
                   
                    <tbody>
                     
                    <?php
                     $count = 0;
                      foreach ($tugasakhir->result() as $row) :
                        $count++;

                        if($row->Status=="1"){
                          $link='#';
                          $stt='<a href="'.$link.'" class="btn btn-sm  btn-success">Disetujui </a>';

                        }else{
                           $link='#';
                           $stt= '<a href="'.$link.'" class="btn btn-sm  btn-danger">BelumDisetujui  </a>';
                        }


                         ?>
                  <tr>
                    <td><?php echo $count?></td>
                    <td><?php echo $row->NoProposal;?></td>
                    <td><?php echo $row->JudulTA;?></td>
                    <td><?php echo $row->TahunTA;?></td>
                    <td><?php echo $row->NIM;?></td>
                      <td>
                    <a href="<?php echo site_url('tugasakhir/downloadta/'.$row->FolderSoftCopyLaporan); ?>">
                      <i class="fas fa-file"></i> <?php echo $row->FolderSoftCopyLaporan;?></a>
                      </td>

                      <td><?php echo  $stt ;?></td>
                     <td>
                      <a href="<?php echo site_url('tugasakhir/userta/'.$row->NoTA);?>" class="btn btn-sm  btn-info" > <i class="fas fa-edit"></i> </a>
                 
                      <a href="<?php echo site_url('tugasakhir/deleteta/'.$row->NoTA.'/1');?>" class="btn btn-sm  btn-danger" ><i class="fas fa-trash"></i></a>
                        
                        
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


      <!-- ============ MODAL EDIT MAHASISWA =============== -->
  
     

        </div>
        <!---Container Fluid-->
<?php include "script.php"?>
  