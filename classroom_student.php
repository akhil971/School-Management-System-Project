<?php include 'headerlink.php'?>
<?php include 'header.php'?>
<?php include  'navbar.php'?>

<section class=room>
    <div class="container">
        <h1>classroom_student form</h1>
        <form action="action.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="input name">subject_id</label>
                    <input type="int" name="subject_id" class="form-control" placeholder="subject_id">
                </div>
                  <div class="form-group col-md-6">
                    <label for="input fathername">classroom_id</label>
                    <input type="int"  name="classroom_id" class="form-control" placeholder="classroom_id">
                </div>

            <button type="submit" name="addclassroom_student" class="btn btn-primary">send</button>
        </form>
    </div>
</section>



















<?php include 'footer.php'?>
<?php include 'capyright.php'?>
<?php include 'footerlink.php'?>