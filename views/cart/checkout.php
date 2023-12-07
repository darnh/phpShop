<?php include ROOT.'/views/layouts/header.php'; ?>

<div class="shop-category-menu"><h2 class="category-menu-heading">Shop by Category</h2>
    <div class="w-dyn-list">
        <div role="list" class="w-dyn-items">

            <?php foreach ($categories as $categoryItem): ?>
                <div role="listitem" class="category-menu-item w-dyn-item"><a href="/category/<?php echo $categoryItem['id'];?>"
                                                                              class="btn dark outline cat-menu w-button">
                        <?php echo $categoryItem['name'];?></a></div>
            <?php endforeach;?>
        </div>
    </div>
</div>

<div class="col-sm-9 padding-right">
    <div class="features_items">
        <h2 class="title text-center">Cart</h2>


        <?php if ($result): ?>
            <p>The order has been placed. We will call you back.</p>
        <?php else: ?>

            <p>Selected items: <?php echo $totalQuantity; ?>, in the amount of: <?php echo $totalPrice; ?>, $</p><br/>

            <?php if (!$result): ?>

                <div class="col-sm-4">
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <p>Fill in the form to place an order. Our manager will contact you.</p>

                    <div class="login-form">
                        <form action="#" method="post">

                            <p>Your name</p>
                            <input type="text" name="userName" placeholder="" value="<?php echo $userName; ?>"/>

                            <p>Phone number</p>
                            <input type="text" name="userPhone" placeholder="" value="<?php echo $userPhone; ?>"/>

                            <p>Order comment</p>
                            <input type="text" name="userComment" placeholder="Сообщение" value="<?php echo $userComment; ?>"/>

                            <br/>
                            <br/>
                            <input type="submit" name="submit" class="btn btn-default" value="Arrangement" />
                        </form>
                    </div>
                </div>

            <?php endif; ?>

        <?php endif; ?>

    </div>
</div>


<?php include ROOT.'/views/layouts/footer.php'; ?>
