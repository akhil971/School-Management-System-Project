<?php include 'headerlink.php'?>
<?php include  'header.php'?>
<?php include  'navbar.php'?>

<section class=room>
    <div class="container">
        <h1>attendance form</h1>
        <form action="action.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="input user_id">user_id</label>
                    <input type="int" name="user_id" class="form-control" placeholder="id_no.">
                </div>
                <div class="form-group col-md-6">
                    <label for="input date">date</label>
                    <input type="date"  name="date" class="form-control" placeholder="date">
                </div>
            </div>


            <button type="submit" name="addattendance" class="btn btn-primary">send</button>
        </form>
    </div>
</section>










<?php  include 'footer.php'?>
<?php  include 'capyright'?>
<?php  include  'footerlink'?>