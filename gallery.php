<?php include 'headerlink.php' ?>
<?php include 'header.php' ?>
<?php include 'headerbennar.php' ?>
<?php include 'navbar.php' ?>


<?php

include '../cms/admin/connection.php';

$sql = "SELECT * FROM gallery";
$run = $conn->query($sql);
$results = array();

while($row =mysqli_fetch_assoc($run)){
    $results[] =$row;
}

// echo '<pre>';
// print_r($results);
// die;
?>
<section>
    <img src="image/g2.jpg" alt="" class="img-fluid">
</section>
<section class=Gallery>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <h4>Annual Function 2024</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <?php

            foreach ($results as $key => $value){?>
                <div class="col-md-4">
                <div class="box1">
                    <img src="admin/gallery/<?php echo trim($value['image'])?>" alt="" class="img-fluid">
                </div>
            </div>

            <?php } ?>
            
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/ppp4.jpg" alt="" class="img-fluid">
                </div>

            </div>
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/ppp5.jpg" alt="" class="img-fluid">
                </div>

            </div>
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/ppp6.jpg" alt="" class="img-fluid">
                </div>

            </div>
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/ppp7.jpg" alt="" class="img-fluid">
                </div>

            </div>
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/ppp9.jpg" alt="" class="img-fluid">
                </div>

            </div>
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/ppp3.jpg" alt="" class="img-fluid">
                </div>

            </div>
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/ppp2.jpg" alt="" class="img-fluid">
                </div>

            </div>
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/ppp6.jpg" alt="" class="img-fluid">
                </div>

            </div>

            <div class="col-md-4">
                <div class="box1">
                    <img src="image/ppp3.jpg" alt="" class="img-fluid">
                </div>

            </div>
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/ppp4.jpg" alt="" class="img-fluid">
                </div>

            </div>
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/ppp5.jpg" alt="" class="img-fluid">
                </div>

            </div>
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/ppp4.jpg" alt="" class="img-fluid">
                </div>

            </div>
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/ppp6.jpg" alt="" class="img-fluid">
                </div>

            </div>

            <div class="col-md-4">
                <div class="box1">
                    <img src="image/ppp3.jpg" alt="" class="img-fluid">
                </div>

            </div>
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/ppp4.jpg" alt="" class="img-fluid">
                </div>

            </div>
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/ppp5.jpg" alt="" class="img-fluid">
                </div>

            </div>
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/ppp6.jpg" alt="" class="img-fluid">
                </div>

            </div>
        </div>
        <div class="col-md-12">
            <div class="box">
                <h4>Plantation Day</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/gg1.jpg" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/gg2.jpg" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/gg3.jpg" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/gg4.jpg" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/gg5.jpg" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/gg6.jpg" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/gg7.jpg" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/gg8.jpg" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/gg9.jpg" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/gg5.jpg" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/gg4.jpg" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="box1">
                    <img src="image/gg3.jpg" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box">
                <h2>Indian festivals celebration and fancy dress competition</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4" style="margin-left: 370px;">
                <div class="box1">
                    <img src="image/gg10.jpg" alt="" class="img-fluid">
                </div>
            </div>
        </div>



    </div>
</section>






















<?php include 'footer.php' ?>
<?php include 'capyright.php' ?>
<?php include 'footerlink.php' ?>