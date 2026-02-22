<?php include 'headerlink.php'?>
<?php include 'header.php'?>
<?php include 'navbar.php'?>


<section class=room>
    <div class="container">
        <h1>result form</h1>
        <form action="action.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="input student">student</label>
                    <input type="text" name="student" class="form-control" placeholder="student">
                </div>
                <div class="form-group col-md-6">
                    <label for="input subject">subject</label>
                    <input type="text"  name="subject" class="form-control" placeholder="subject">
                </div>
                 <div class="form-group col-md-12">
                    <label for="input marks">marks</label>
                    <input type="int"  name="marks" class="form-control" placeholder="marks">
                </div>
            </div>


            <button type="submit" name="addresult" class="btn btn-primary">send</button>
        </form>
    </div>
</section>


<?php include 'footer.php'?>
<?php include 'capyright.php'?>
<?php include 'footerlink.php'?>