
<?php include ROOT.'/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">

                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <div class="signup-form">
                    <h2>Log in</h2>
                    <form action="#" method="post">
                        <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
                        <br/>
                        <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>"/>
                        <br/>
                        <input type="submit" name="submit" class="btn btn-default" value="Log in"/>

                    </form>
                </div>
        </div>
    </div>
</section>


<?php include ROOT.'/views/layouts/footer.php'; ?>
