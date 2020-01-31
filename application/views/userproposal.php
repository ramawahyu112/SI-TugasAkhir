
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
            <h1 class="h4 mb-0 text-gray-800"><b>Proposal TA   </b></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">proposal ta </li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
          
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
              


               
                  <form class="form-horizontal"  method="post" action="<?php
                    $NoProposal = $this->uri->segment(3);
                    if($NoProposal!=0){
                      $link="tugasakhir/userproposaladd/$NoProposal";
                    }else{
                      $link="tugasakhir/userproposaladd";
                    }
                   echo site_url($link) ;?>">
              <div class="form-group col-md-6  ">
                 <?php
                    
                      
                        if($proposaltaget!=null){
                          foreach ($proposaltaget->result() as $row) :
                        $Judul= $row->JudulProposal;
                        $Tahun=$row->TahunProposal;
                        $NIMs=$row->NIM;
                        $NIP1=$row->NIPPembimbing1;
                        endforeach;
                      }else{
                       $Judul= "";
                        $Tahun="";
                        $NIMs="";
                        $NIP1="";

                      }


                             
                         ?>
                
                  <div class="form-group">
                        <label class="control-label col-xs-3" >Judul Proposal</label>
                        <div class="col-xs-8">
                            <input name="JudulProposal" value="<?php echo $Judul; ?>"  class="form-control" type="text" placeholder="Masukkan Judul Proposal" required>
                        </div>
                    </div>
                      <div class="form-group">
                        <label class="control-label col-xs-3" >Tahun Proposal</label>
                        <div class="col-xs-8">
                            <input name="TahunProposal" value="<?php echo $Tahun; ?>" class="form-control" type="text" placeholder="Masukkan Tahun Proposal" required>
                        </div>
                    </div>
                   <div class="form-group">
                        <label class="control-label col-xs-3" >NIM </label>
                        <div class="col-xs-8">
                            <input name="NIM" class="form-control" value="<?php echo $NIMs; ?>" type="text" placeholder="Masukkan NIM" required>
                        </div>
                    </div>

                   <div class="form-group">
                        <label class="control-label col-xs-3" >Pembimbing 1</label>
                        <div class="col-xs-8">
                            <select name="NIPPembimbing1" class="form-control">
                            <option value="0">-Pilih Dosen-</option>
                            <?php foreach($dosen->result() as $rowdosen):?>
                                <option value="<?php $nips=$rowdosen->NIP; echo $nips; ?>"  <?php if($NIP1==$nips){ echo 'selected';} ?>><?php echo $rowdosen->NamaDosen;?></option>
                            <?php endforeach;?>
                        </select>
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
                      <?php 
                        $data_session = array(
                       'NoProposal' => $row->NoProposal
                           );
                             $this->session->set_userdata($data_session);

                       ?>
                    <td>
                      <a href="<?php echo site_url('tugasakhir/userproposal/'.$row->NoProposal);?>" class="btn btn-sm  btn-info" > <i class="fas fa-edit"></i> </a>
                 
                      <a href="<?php echo site_url('tugasakhir/deleteproposalta/'.$row->NoProposal.'/1');?>" class="btn btn-sm  btn-danger" ><i class="fas fa-trash"></i></a>
                        
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
  