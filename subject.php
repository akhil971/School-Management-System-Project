<?php include 'headerlink.php' ?>
<?php include  'header.php' ?>
<?php include  'navbar.php' ?>

<section class=room>
    <div class="container">
        <h1>subject form</h1>
        <form action="action.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="input name">name</label>
                    <input type="int" name="name" class="form-control" placeholder="name">
                </div>
                <div class="form-group col-md-6">
                    <label for="input subject_id">subject_id</label>
                    <input type="int" name="subject_id" class="form-control" placeholder="subject_id">
                </div>
                <div class="form-group col-md-12">
                    <label for="input decription">decription</label>
                    <input type="text" name="description" class="form-control" placeholder="decription">
                </div>
            </div>


            <button type="submit" name="addsubject" class="btn btn-primary">send</button>
        </form>
    </div>
</section>

<?php include 'footer.php' ?>
<?php include "capyright.php" ?>
<?php include "footerlink.php" ?>