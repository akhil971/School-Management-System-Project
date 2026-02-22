<?php include 'headerlink.php'?>
<?php include 'header.php'?>
<?php include  'navbar.php'?>

<section class=room>
    <div class="container">
        <h1>student form</h1>
        <form action="action.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="input name">name</label>
                    <input type="" name="name" class="form-control" placeholder="name">
                </div>
                  <div class="form-group col-md-6">
                    <label for="input fathername">fathername</label>
                    <input type="text"  name="fathername" class="form-control" placeholder="fathername">
                </div>
                <div class="form-group col-md-12">
                    <label for="input subject">subject</label>
                    <input type="text"  name="subject" class="form-control" placeholder="subject">
                </div>
                
                  <div class="form-group col-md-6">
                    <label for="input email">email</label>
                    <input type="text"  name="email" class="form-control" placeholder="email">
                </div>
                  <div class="form-group col-md-6">
                    <label for="input password">password</label>
    
            </div>
                <input type="int"  name="password" class="form-control" placeholder="password">
                </div>
                  <div class="form-group col-md-6">
                    <label for="input dob">dob</label>
                    <input type="date"  name="dob" class="form-control" placeholder="dob">
                </div>
                  <div class="form-group col-md-6">
                    <label for="input sex">sex</label>
               <select name="Sex" class="form-control" placeholder="sex">
                                <option value="1">male</option>
                                <option value="0">female</option>
                                <option value="0">other</option>
                               </select>
                </div>
                  <div class="form-group col-md-6">
                    <label for="input address">address</label>
                    <input type="text" name="adress" class="form-control" placeholder="adress">
                </div>

            <button type="submit" name="addstudent" class="btn btn-primary">send</button>
        </form>
    </div>
</section>



<?php include 'footer.php'?>
<?php include 'capyright.php'?>
<?php include  'footerlink.php'?>