<?php
  include("../config/koneksi.php");  
  ?>
  <?php
$id_type_mobil = $_GET['id_type_mobil']; //get the no which will updated

$queryy = mysql_query("SELECT * FROM type_mobil WHERE id_type_mobil = '$id_type_mobil'"); //get the data that will be updated
$dt=mysql_fetch_array($queryy);

?>
<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Type Mobil</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Type Mobil</a></li>
                                    <li class="active"><a href="#">Edit Data Type Mobil</a></li>
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
                                <strong class="card-title">Edit Data Type Mobil</strong>
                            </div>
                            <div class="card-body">
         
<form action="index.php?p=proses_edit_type_mobil" method="post" enctype="multipart/form-data" class="form-horizontal">
<input type="hidden" id="text-input" name="id_type_mobil" class="form-control" required="" value="<?=$dt['id_type_mobil'];?>">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Type Mobil</label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="type_mobil" class="form-control" required="" value="<?=$dt['type_mobil'];?>">
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </form>


                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->