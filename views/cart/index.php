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

            <?php if ($productsInCart): ?>
            <p>You have selected the following items:</p>
            <table class="table-bordered table-striped table">
                <tr>
                    <th>Product code</th>
                    <th>Title</th>
                    <th>Prise, usd</th>
                    <th>Quantity, piece</th>
                    <th>Delete</th>
                </tr>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['code']; ?></td>
                        <td>
                            <a href="/product/<?php echo $product['id']; ?>">
                                <?php echo $product['name']; ?>
                            </a>
                        </td>
                        <td><?php echo $product['price']; ?></td>
                        <td><?php echo $productsInCart[$product['id']]; ?></td>
                        <td>
                            <a href="/cart/delete/<?php echo $product['id'];?>">
                                <i class="fa fa-times">Remove</i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                    <tr>
                        <td colspan="3">Total cost:</td>
                        <td><?php echo $totalPrice;?></td>
                    </tr>
            </table>
                <a class="btn btn-default checkout" href="/cart/checkout"><i class="fa fa-shopping-cart"></i> Place an order</a>
            <?php else: ?>
                <p>Basket is empty</p>

                <a class="btn btn-default checkout" href="/"><i class="fa fa-shopping-cart"></i> Back to shopping</a>
            <?php endif; ?>


        </div>

    </div>





<?php include ROOT.'/views/layouts/footer.php'; ?>



