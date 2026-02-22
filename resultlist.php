<?php
include 'connection.php';



$Sql = "SELECT * FROM result";
$run = $conn->query($Sql);
$result = array();
while ($row = $run->fetch_assoc()) {

    $result[] = $row;
}
// echo'<pre>';
// print_r($result);  die;

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>s1.no</th>
                                <th>student</th>
                                <th>subject</th>
                                <th>markst</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sn = 0;
                            foreach ($result as $key => $VALUE) {
                                $sn++;
                            ?>

                                <tr>
                                    <th scope="row"><?php echo $sn;?></th>
                                    <td><?php echo  $VALUE['student'] ?></td>
                                    <td><?php echo  $VALUE['subject'] ?></td>
                                    <td><?php echo  $VALUE['marks'] ?></td>
                                     <td><a href="deletedata.php?resultid=<?php echo $VALUE['id']?>">delete</a></td>
                                </tr>
                            <?php  } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>