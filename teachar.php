<?php include 'headerlink.php' ?>
<?php include  'header.php' ?>
<?php include  'navbar.php' ?>

<section class=room>
    <div class="container">
        <h1>teachar form</h1>
        <form action="action.php" method="POST">
            <div class="form-row">
           <div class="form-group col-md-12">
                    <label for="input name">name</label>
                    <input type="" name="name" class="form-control" placeholder="name">
                </div>
                
                  <div class="form-group col-md-6">
                    <label for="input email">email</label>
                    <input type="text"  name="email" class="form-control" placeholder="email">
                </div>
                  <div class="form-group col-md-6">
                    <label for="input password">password</label>
                <input type="int"  name="password" class="form-control" placeholder="password">
                </div>
                  <div class="form-group col-md-6">
                    <label for="input dob">dob</label>
                    <input type="date"  name="dob" class="form-control" placeholder="dob">
                </div>
                  <div class="form-group col-md-6">
                    <label for="input sex">sex</label>
                    <input type="text" name="sex" class="form-control" placeholder="sex">
                </div>
                  <div class="form-group col-md-6">
                    <label for="input address">phone</label>
                    <input type="int" name="phone" class="form-control" placeholder="phone">
                </div>
            </div>


            <button type="submit" name="addteachar" class="btn btn-primary">send</button>
        </form>
    </div>
</section>

<?php include 'footer.php' ?>
<?php include "capyright.php" ?>
<?php include "footerlink.php" ?>