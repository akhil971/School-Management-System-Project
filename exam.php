<?php include 'headerlink.php' ?>
<?php include  'header.php' ?>
<?php include 'navbar.php' ?>
<section class=room>
    <div class="container">
        <h1>exam from</h1>
        <form action="action.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="input name">name</label>
                    <input type="text" name="name" class="form-control" placeholder="name.">
                </div>
                <div class="form-group col-md-6">
                    <label for="input date">date</label>
                    <input type="date"  name="date" class="form-control" placeholder="date">
                </div>
                 <div class="form-group col-md-12">
                    <label for="input type">type</label>
                    <input type="text"  name="type" class="form-control" placeholder="type">
                </div>
            </div>


            <button type="submit" name="addexam" class="btn btn-primary">send</button>
        </form>
    </div>
</section>





<?php include 'footer.php' ?>
<?php include  'capyright.php' ?>
<?php include  'footerlink.php' ?>