<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>User</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">User</a></li>
                                    <li class="active"><a href="#">Data User</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data User</strong>
                            </div>
                            <div class="card-body">
                                <a href="index.php?p=tambah_user" class="btn btn-success mb-3"><i class="fa fa-plus" style="color: white"></i> <font size="3" color="white"><u>Tambah Data</u></font></a></div><br>

                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
<?php
  include ("../config/koneksi.php");
  $sqll = "select * from user order by id_user desc";
  $resultt = mysql_query($sqll);
    if(mysql_num_rows($resultt) > 0){
?>                                            
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Alamat</th>
                                            <th>No. HP</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
  $nomor=1;
  while($data = mysql_fetch_array($resultt)){
?>                                          
                                        <tr>
                                            <td><?= $nomor++;?></td>
                                            <td><?= $data['nama'];?></td>
                                            <td><?= $data['username'];?></td>
                                            <td><?= $data['alamat'];?></td>
                                            <td><?= $data['hp'];?></td>
                                            <td align="center">
                                            <?php if($data['status']=='1'){ ?>
                                              <a href="index.php?p=ganti_status_user&id=<?php echo $data['id_user'];?>&status=<?php echo $data['status'];?>" onClick="return confirm('Apakah Anda Yakin Menonaktifkan User Ini?')" class="btn btn-success mb-3" style="width: 100px"> <font color="white"> Aktif</font></a>
                                            <?php } elseif($data['status']=='0') { ?>
                                              <a href="index.php?p=ganti_status_user&id=<?php echo $data['id_user'];?>&status=<?php echo $data['status'];?>" onClick="return confirm('Apakah Anda Yakin Mengaktifkan User Ini?')" class="btn btn-danger mb-3" style="width: 100px"> <font color="white">Nonaktif</font></a>
                                            <?php } ?>
                                          </td>
                                            
                                            <td align="center">
                                                <a href="index.php?p=edit_user&id_user=<?php echo $data['id_user']; ?>" class="btn btn-warning mb-3"> <i class="fa fa-fw fa-pencil" style="color: white"></i> <font color="white">Edit</font></a>
                                            </td>
                                            <td align="center">
                                                <a href="index.php?p=hapus_user&id_user=<?php echo $data['id_user']; ?>" onClick="return confirm('Apakah Anda Yakin Hapus Data?')" class="btn btn-danger mb-3"> <i class="fa fa-fw fa-trash" style="color: white"></i> <font color="white">Hapus</font></a>
                                            </td>
                                        </tr>
<?php
  }
?>
              </tbody>
            </table>
<?php
  }else{
    echo 'Data not found!';
    echo mysql_error();
  }
?>            
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->