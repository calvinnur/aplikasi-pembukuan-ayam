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
    <table border="1" cellspacing="0" width="100%">
        <tr>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Timbangan</th>
            <th>Keranjang</th>
            <th>Status</th>
            <th>Setoran Pribadi</th>
            
        </tr>
        <?php
        $no = 1;
        $jumlah = 0;
        $query = $call->querys("select * from setoran where waktu = '".$waktu."'");
        
        while($show = mysqli_fetch_assoc($query)){?>
        <tr>
            <td><?php echo $tanggal?></td>
            <td><?php echo $show["username"]?></td>
            <td><?php echo $show["timbangan"];?></td>
            <td><?php echo $show["keranjang"]?></td>
            <td> 
                <?php if($show["status"] == 0){
                                            echo "Belum terkonfirmasi";
                                            }else{
                                            echo "Telah terkonfirmasi";
                                            }
                                            ?>
                                            </td>
            <td>
            <?php $profit = $call->querys("select * from harga where waktu like '%$waktu%'");
                                             $count_profit = mysqli_num_rows($profit);
                                             if($count_profit < 1){
                                                echo "Data harga belum terisi";
                                             }else{
                                                while($pft = mysqli_fetch_assoc($profit)){
                                                    echo "Rp.".' '.number_format($show["timbangan"] * $pft["harga_pribadi"]) ;
                                                   }
                                             }
                                              
                                    
                                    ?>
            </td>
          
                
        
            
        </tr>
        <?php }?>
    </table>
</body>
</html>