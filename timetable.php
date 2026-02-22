<?php include 'headerlink.php'?>
<?php include 'header.php'?>
<?php include  'navbar.php'?>

<section class=room>
    <div class="container">
        <h1>timetable form</h1>
        <form action="action.php" method="POST">
            <div class="form-row">
           <div class="form-group col-md-12">
                    <label for="input name">table_id</label>
                    <input type="int" name="table_id" class="form-control" placeholder="table_id">
                </div>
                  <div class="form-group col-md-6">
                    <label for="input password">subject</label>
                <input type="text"  name="subject" class="form-control" placeholder="subject">
                </div>
                 
            </div>


            <button type="submit" name="addtimetable" class="btn btn-primary">send</button>
        </form>
    </div>
</section>























<?php include 'footer.php'?>
<?php include  'capyright.php'?>
<?php include 'footerlink.php'?>