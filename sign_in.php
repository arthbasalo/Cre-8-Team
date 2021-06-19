<?php include("includes/header.php"); ?>
<?php include("includes/menu.php"); ?>
<main id="main">

<!-- ======= About Section ======= -->
<section id="services" class="services">
    <div class="container" data-aos="fade-up">
    <div class="section-title">
        <p>Sign in</p>
    </div>
    <form method="post">
    <div class="row">
        <div class="container">
            <div class="form-group">
                <label for="txtEnterUserName">Username:</label>
                <input type="text" class="form-control" id="txtEnterUserName" placeholder="Enter username" name="txtEnterUserName" value="<?php if(isset($_POST['txtEnterUserName'])) { echo $_POST['txtEnterUserName']; }?>" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="txtEnterPassword">Password:</label>
                <input type="password" class="form-control" id="txtEnterPassword" placeholder="Enter password" name="txtEnterPassword" value="<?php if(isset($_POST['txtEnterPassword'])) { echo $_POST['txtEnterPassword']; }?>" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <button type="submit" class="btn btn-primary" id="btnLogin" name="btnLogin">Submit</button>
        </div>
    </div>
    </form>

    </div>
</section><!-- End About Section -->
</main>
<?php include("includes/footer.php"); ?>