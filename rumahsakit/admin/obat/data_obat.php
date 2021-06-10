<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pendaftaran | esemka-his</title>
  	<link rel="stylesheet" href="../assets/css/style.css">
	  <!--link bootstrap-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		  <!--/link bootstrap-->
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>
<body>
	<div class="wrapper">
			<nav id="sidebar">
				<div class="sidebar-header">
					<a href="../index.php"><h3>Esemka-His</h3>
					<strong>EH</strong>
					</a>
				</div>
				<ul class="list-unstyled components">
					<li>
						<a href="../index.php">
							<i class="fas fa-home"></i>
							Dashboard
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fas fa-american-sign-language-interpreting"></i>
							Data Pasien
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fas fa-diagnoses"></i>
							Data Dokter
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fas fa-briefcase"></i>
							Data Poli Klinik
						</a>
					</li>
					<li>
						<a href="../obat/data_obat.php">
							<i class="fas fa-briefcase"></i>
							Data Obat
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fas fa-briefcase"></i>
							Rekam Medis
						</a>
					</li>
					<li>
						<a href="logout.php">
							<i class="fas fa-sign-out-alt"></i>
							<font color="red">Logout</font><br>
						</a>
					</li>
				</ul>
				
					<button type="button" id="sidebarCollapse" class="btn btn-default">
							<i class="fas fa-angle-double-right"></i>
					</button>
			</nav>		
		<div id="content">
 			
		
			<nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">

				<marquee>Selamat Datang Di Halaman Utama Aplikasi Rumah Sakit Sederhana Esemka-His Berbasis Web</marquee>
					
				
				</div>
			</nav>

			<div id="page-wrapper" >
				<div style="padding: 15px 20px;background-color: #fbf9f9; min-height: 600px; margin-right: 15px; margin-left: 5px; margin-bottom: 0px;" >
					<div id="page-inner">
                        <div class="box">
                            <h1>Obat</h1>
                            <div style="margin-bottom: 20px;" >
                                <form action="" class="form-inline" method="post">
                                    <div class="form-group">
                                        <input type="text" name="pencarian" class="form-control" placeholder="Pencarian">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                    </div>
                                    <div class="pull-right">
                                        <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                                        <a href="add_obat.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Obat</a>
                                        </div></form>
                                    </div>
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Obat</th>
                                            <th>Harga Obat</th>
                                            <th>Keterangan</th>
                                            <th><i class="glyphicon glyphicon-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php
                                            include '../../config.php';
                                            $batas = 5;
                                            $hal = @$_GET['hal'];
                                            if(empty($hal) ){
                                                $posisi = 0;
                                                $hal = 1;
                                            }else {
                                                $posisi = ($hal - 1 ) * $batas;
                                            }
                                            $no = 1;
                                            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                                $pencarian = trim(mysqli_real_escape_string($koneksi, $_POST['pencarian']));
                                                if ($pencarian != '') {
                                                    $sql ="SELECT * FROM obat WHERE nama_obat LIKE '%$pencarian%'";
                                                    $query = $sql;
                                                    $queryJml = $sql;
                                                }else {
                                                    $query = "SELECT * FROM obat LIMIT $posisi, $batas";
                                                    $queryJml = "SELECT * FROM obat";
                                                    $no = $posisi + 1;
                                                }
                                            }else {
                                                $query = "SELECT * FROM obat LIMIT $posisi, $batas";
                                                $queryJml = "SELECT * FROM obat";
                                                $no = $posisi + 1;
                                            }
                                            
                                            $sql_obat = mysqli_query ($koneksi, $query) or die (mysqli_error($koneksi));
                                            if (mysqli_num_rows($sql_obat) > 0) {
                                                while ($data = mysqli_fetch_array($sql_obat)) { ?>
                                                    <tr>
                                                        <td><?=$no++?></td>
                                                        <td><?=$data['nama_obat']?></td>
                                                        <td><?=$data['harga_obat']?></td>
                                                        <td><?=$data['ket_obat']?></td>
                                                        <td class="text-center">
                                                        <a href="edit_obat.php?id=<?=$data['id_obat']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                                        <a href="delete_obat.php?id=<?=$data['id_obat']?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }else{
                                                echo "<tr><td colspan=\"5\" align=\"center\">Data Tidak Ditemukan</td></tr>";
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php
                                if($_POST['pencarian'] == '') { ?>
                                    <div style="float:left;">
                                        <?php
                                        $jml = mysqli_num_rows(mysqli_query($koneksi, $queryJml));
                                        echo "Jumlah Data : <b>$jml</b>";
                                        ?>
                                    </div>
                                    <div style="float: right;">
                                        <ul class="pagination pagination-sm" style="margin:0">
                                            <?php
                                            $jml_hal = ceil($jml / $batas);
                                            for ($i=1; $i <= $jml_hal; $i++) { 
                                                if ($i != $hal) {
                                                    echo "<li><a href=\"?hal=$i\">$i</a></i>";
                                                }else {
                                                    echo "<li class=\"active\"><a>$i</a></li>";
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                   <?php
                                }else { 
                                    echo "<div style=\"float:left;\">";
                                    $jml = mysqli_num_rows(mysqli_query($koneksi, $queryJml));
                                    echo "Data Hasil Pencarian : <b>$jml</b>";
                                    echo "</div>";
                                }
                            ?>
                        </div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	

	<!-- jQuery CDN - Slim version (=without AJAX) -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>
</html>

