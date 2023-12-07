<?php include ROOT.'/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-lg-6">
                <h4>Shop information</h4>

                <br/>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ac
                    lorem sit amet erat venenatis porta. Pellentesque ultricies
                    neque nec eros fringilla, vitae euismod massa posuere. Nullam
                    volutpat, nisl efficitur convallis bibendum, turpis nunc
                    ullamcorper metus, a iaculis sapien sem a est. Maecenas ac
                    vestibulum ex. Nullam interdum quis mi ut venenatis. </p>

                <p>Phasellus iaculis purus elementum felis varius, vel viverra massa
                    tincidunt. Aliquam vulputate dictum luctus. Aenean lectus
                    risus, pellentesque eget lectus eu, sodales fringilla magna.
                    Nunc diam mi, dictum ac est non, molestie eleifend ligula.
                    Nam pharetra vulputate lectus. Duis non quam in est interdum
                    pellentesque condimentum a elit. Praesent eget turpis euismod,
                    maximus lectus sed, elementum mi. Nulla enim tortor, malesuada
                    suscipit finibus at, eleifend eget urna. Mauris laoreet metus
                    a nisl bibendum, nec maximus urna molestie.</p>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4 padding-right">
            <?php if ($result): ?>
                <p>Message sent! We will reply to your email address.</p>
            <?php else: ?>
                <?php if(isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
            <?php endif; ?>

            <div class="signup-form">
                <h2>Feedback</h2>
                <h5>Any questions? Write to us</h5>
                <br/>
                <form action="#" method="post">
                    <p>Your mail</p>
                    <input type="email" name="userEmail" placeholder="E-mail" value="<?php echo $userEmail; ?>"/>
                    <p>Message</p>
                    <input type="text" name="userText" placeholder="Message" value="<?php echo $userText; ?>"/>
                    <br/>
                    <input type="submit" name="submit" class="btn btn-default" value="Send" />
                </form>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>




<?php include ROOT.'/views/layouts/footer.php'; ?>
