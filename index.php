<?php
//membuat koneksi database

$server = "localhost";
$user = "root";
$password = "";
$dbname = "dewi";
$no = 1;

$koneksi = mysqli_connect($server,$user,$password,$dbname)or die(mysqli_error($koneksi));

    //keterangan Tombol Simpan
    if(isset($_POST['bsimpan'])){
        //uji data diedit atau disimpan
        if($_GET['hal'] == "edit"){
            $edit = mysqli_query($koneksi, "UPDATE tbl_014 set 
                                                matakuliah = '$_POST[tmatkul]',
                                                nama_dosen = '$_POST[tdosen]',
                                                kelas = '$_POST[tkelas]',
                                                wp = '$_POST[twp]',
                                                sks = '$_POST[tsks]'
                                            WHERE id_matkul = '$_GET[id]'
                                            ");
            //data diedit
            if($edit){
                echo "<script>
                        alert('Edit Data Sukses');
                        document.location='index.php';
                    </script>";
            }else{
                echo "<script>
                        alert('Edit Data Gagal');
                        document.location='index.php';
                    </script>";
                }
            }
        else{
            //data disimpan
            $simpan = mysqli_query($koneksi, "INSERT INTO tbl_014 (matakuliah, nama_dosen, kelas, wp, sks)
                                            VALUES ('$_POST[tmatkul]', 
                                                '$_POST[tdosen]', 
                                                '$_POST[tkelas]', 
                                                '$_POST[twp]', 
                                                '$_POST[tsks]')
                                            ");
            if($simpan){
                echo "<script>
                        alert('Menambahkan Data Sukses');
                        document.location='index.php';
                    </script>";
            }else{
                echo "<script>
                        alert('Menambahkan Data Gagal');
                        document.location='index.php';
                    </script>";
            }
        }
    }

//Eksekusi button edit dan hapus
    if(isset($_GET['hal'])){
        //eksekusi data yang akan diedit
        if($_GET['hal'] == "edit"){
            //menampilkan data yang diedit
            $hasil = mysqli_query($koneksi, "SELECT *FROM tbl_014 WHERE id_matkul = '$_GET[id]'");
            $data = mysqli_fetch_array($hasil);
            if($data){
                $vmatkul = $data['matakuliah'];
                $vdosen = $data['nama_dosen'];
                $vkelas = $data['kelas'];
                $vwp = $data['wp'];
                $vsks = $data['sks'];
            }
        }
        else if($_GET['hal'] == "hapus")
        {
            $hapus = mysqli_query($koneksi, "DELETE FROM tbl_014 WHERE id_matkul = '$_GET[id]'");
            if($hapus){
                echo "<script>
                        alert('Hapus Data Sukses');
                        document.location='index.php';
                    </script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 3 - PAW 4B</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <!-- Judul-->
    <h1 class="text-center">Informasi Matakuliah Prodi Teknik Informatika</h1>
    <h2 class="text-center">Semester Genap 2021/2022</h2>

    <!-- Awal card form-->
    <div class="card mt-4">
    <div class="card-header bg-primary text-black" >
        Form Input Data Informasi Matakuliah
    </div>
    <div class="card-body">
        <form method="post" action="">
            <table>    
                <tr class="form-group">
                    <td>
                        <label>Matakuliah</label>
                    </td>
                    <td>
                        <input type="text" name="tmatkul" value="<?=@$vmatkul?>" class="from-control" placeholder="Input Matakuliah Anda disini !" ruqueired>
                    </td>
                </tr>
                <tr class="form-group">
                    <td>
                        <label>Nama Dosen</label>
                    </td>
                    <td>
                        <input type="text" name="tdosen" value="<?=@$vdosen?>" class="from-control" placeholder="Input Nama Dosen disini !" ruqueired>
                    </td>
                </tr>
                <tr class="form-group">
                    <td>
                        <label>Kelas</label>
                    </td>
                    <td>
                        <input type="text" name="tkelas" value="<?=@$vkelas?>" class="from-control" placeholder="Input Kelas Anda disini !" ruqueired>
                    </td>
                </tr>
                <tr class="form-group">
                    <td>
                        <label>Wajib/Pilihan</label>
                    </td>
                    <td>
                        <select class="from-control" name="twp" value="<?=@$vwp?>" >
                            <option>W/P</option>
                            <option value="wajib">Wajib</option>
                            <option value="pilihan">Pilihan</option>
                        </select>
                    </td>
                </tr>
                <tr class="form-group">
                    <td>
                        <label>SKS</label>
                    </td>
                    <td>
                        <input type="text" name="tsks" value="<?=@$vsks?>" class="from-control" placeholder="Input sks Anda disini !" ruqueired>
                    </td>                
                </tr>
                <tr>
                    <td>
                        <button type="submit" class="btn btn-success" name="bsimpan">Save</button>
                        <button type="reset" class="btn btn-danger" name="bbatal">Cancel</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    </div>
<!-- Akhir card form-->

<!-- Awal card tabel-->
<div class="card mt-4">
    <div class="card-header bg-primary text-black" >
        Daftar Informasi Matakuliah
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tr>
                <th>NO</th>
                <th>MATAKULIAH</th>
                <th>NAMA DOSEN</th>
                <th>KELAS</th>
                <th>W/P</th>
                <th>SKS</th>
                <th>ACTION</th>
            </tr>

            <?php
                $hasil = mysqli_query($koneksi, "SELECT * FROM tbl_014 order by id_matkul desc");
                while($data = mysqli_fetch_array($hasil)) :
                $no+1;
            
            ?>
            <tr>
                <td><?=$no++;?></td>
                <td><?=$data['matakuliah'];?></td>
                <td><?=$data['nama_dosen'];?></td>
                <td><?=$data['kelas'];?></td>
                <td><?=$data['wp'];?></td>
                <td><?=$data['sks'];?></td>
                <td>
                    <a href="index.php?hal=edit&id=<?=$data['id_matkul']?>" class="btn btn-warning">Edit</a>
                    <a href="index.php?hal=hapus&id=<?=$data['id_matkul']?>"
                    onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php endwhile;?> 
        </table>
    </div>
    </div>
<!-- Akhir card tabel-->

</div>
<script type="text/javascript" src="js/bootstrap.min.css"></script>
</body>
</html>