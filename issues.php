<?php include 'headerlink.php'?>
<?php include 'header.php'?>
<?php include 'navbar.php'?>

<section class=room>
    <div class="container">
        <h1>issues form</h1>
        <form action="action.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="input name">issue_id</label>
                    <input type="int" name="issue_id" class="form-control" placeholder="issue_id">
                </div>
                  <div class="form-group col-md-6">
                    <label for="input fathername">detail</label>
                    <input type="text"  name="detail" class="form-control" placeholder="detail">
                </div>

            <button type="submit" name="addissues" class="btn btn-primary">send</button>
        </form>
    </div>
</section>





















<?php  include 'footer.php'?>
<?php include  'capyright.php'?>
<?php include  'footerlink.php'?>