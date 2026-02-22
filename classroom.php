<?php include 'headerlink.php' ?>
<?php include  'header.php' ?>
<?php include 'navbar.php' ?>
<section class=room>
    <div class="container">
        <h1>classroom form</h1>
        <form action="action.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="input teacher_id">teacher_id</label>
                    <input type="int" name="teacher_id" class="form-control" placeholder="id_no.">
                </div>
                <div class="form-group col-md-6">
                    <label for="input section">section</label>
                    <input type="text"  name="section" class="form-control" placeholder="section">
                </div>
            </div>


            <button type="submit" name="addclassroom" class="btn btn-primary">send</button>
        </form>
    </div>
</section>





<?php include 'footer.php' ?>
<?php include  'capyright.php' ?>
<?php include  'footerlink.php' ?>