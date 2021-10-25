<?php 
require_once("library.php");
$call = new admin;
$waktu = $_GET["waktu"];
$tanggal = strtotime($_GET["waktu"]);
$tanggal = date("d-M-Y",$tanggal);
$tanggal = str_replace("-"," ",$tanggal);
header("Content-type:application/vnd-ms-excel");
header("Content-disposition:attachment;filename=Data Setoran periode ".$tanggal.".xls");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        tr th{
            text-align: center;
        }

        tr td{
            text-align: center;
        }

    </style>
    <title>Document</title>
</head>
<body>
        <h3>Setoran dan profit periode <?php echo $tanggal;?></h3>
        <table border="1" width="100%" cellspacing="0">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>total timbangan</th>
                                    <th>total keranjang</th>
                                    <th>setoran pasar</th>
                                    <th>setoran pribadi</th>
                                    <th>Laba</th>
                                    <th>Pendapatan bersih</th>
                                </tr>
          
                          <?php 
                                $tanggal = strtotime($waktu);
                                $tanggal = date("d-M-Y",$tanggal);
                                $tanggal = str_replace("-"," ",$tanggal);
                                $timbangan = $call->querys("SELECT SUM(timbangan) as timbangan FROM setoran where waktu like '%$waktu%'");
                                $keranjang = $call->querys("SELECT SUM(keranjang) as keranjang FROM setoran where waktu like '%$waktu%'");
                                $harga = $call->querys("select * from harga where waktu like '%$waktu%' ");
                                while($tim = mysqli_fetch_assoc($timbangan)){
                                while($ker = mysqli_fetch_assoc($keranjang)){
                                while($har = mysqli_fetch_assoc($harga)){ 
                                $setoran_pasar = $tim["timbangan"] * $har["harga_pasar"];
                                    $setoran_pribadi = $tim["timbangan"] * $har["harga_pribadi"];
                                    $laba = $setoran_pribadi - $setoran_pasar;
                                    ?>
                                <tr>
                                  
                                    <td class="col-lg-2"><?php echo $tanggal;?></td>
                                    <td><?php echo number_format( $tim["timbangan"]);?></td>
                                    <td><?php echo $ker["keranjang"];?></td>
                                    <td class="col-lg-2"><?php echo "Rp.".' '.number_format($setoran_pasar);?></td>
                                    <td class="col-lg-2"><?php echo "Rp.".' '.number_format($setoran_pribadi);?></td>
                                    <td class="col-lg-2"><?php echo "Rp.".' '.number_format($laba); ?></td>
                                    <td class="col-lg-2"><?php echo "Rp.".' '.number_format($laba - $har["biaya"]); ?></td>
                                </tr>

                                <?php   
                            
                                }
                            } 
                        }
                            ?>
                              
    </table>
</body>
</html>