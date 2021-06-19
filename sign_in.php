<?php include("includes/header.php"); ?>
<?php include("includes/menu.php"); ?>

<main id="main">

<!-- ======= About Section ======= -->
<section id="services" class="services">
    <div class="container" data-aos="fade-up">
    <div class="section-title">
        <p>Sign in</p>
    </div>
    <div class="row">
        <div class="container">
            <div class="form-group">
                <label for="uname">Username:</label>
                <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

    </div>
</section><!-- End About Section -->
</main>
<?php include("includes/footer.php"); ?>