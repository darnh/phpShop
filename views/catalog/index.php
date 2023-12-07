<?php include ROOT.'/views/layouts/header.php'; ?>

<div class="page-title-section">
    <div class="container"><h1 class="page-title">Shop Our Products</h1></div>
</div>
<div class="content-section">
    <div class="container">
        <div class="shop-page-wrapper">
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
            <div class="shop-list">
                <div class="products-list-wrapper w-dyn-list">
                    <div role="list" class="products-list w-dyn-items">
                        <?php foreach ($latestProducts as $product):?>

                            <div role="listitem" class="w-dyn-item">
                                <div class="shop-item-wrapper"><a href="/product/white-tent"
                                                                  class="shop-item-link-wrapper w-inline-block">
                                        <div data-wf-sku-bindings="%5B%7B%22from%22%3A%22f_main_image_4dr.url%22%2C%22to%22%3A%22style.background-image%22%7D%5D"
                                             style="background-image:url(&quot;https://assets.website-files.com/5e853c3383474026e43f2c78/5e856e41c718420c18dd6751_patrick-hendry-eDgUyGu93Yw-unsplash.jpg&quot;)"
                                             class="shop-image tumbler-1">
                                            <div data-wf-sku-conditions="%7B%22condition%22%3A%7B%22fields%22%3A%7B%22default-sku%3Acompare-at-price%22%3A%7B%22exists%22%3A%22yes%22%2C%22type%22%3A%22CommercePrice%22%7D%7D%7D%2C%22timezone%22%3A%22America%2FChicago%22%7D"
                                                 class="pill-2 badge primary sale w-condition-invisible">Sale
                                            </div>
                                        </div>
                                        <div class="shop-details-wrapper">
                                            <div class="shop-details-left">
                                                <div class="shop-item-name"><?php echo $product['name'];?></div>
                                                <div class="price-wrapper">
                                                    <div data-wf-sku-bindings="%5B%7B%22from%22%3A%22f_price_%22%2C%22to%22%3A%22innerHTML%22%7D%5D"
                                                         class="shop-item-price">$ <?php echo $product['price'];?> USD
                                                    </div>
                                                    <div data-wf-sku-bindings="%5B%7B%22from%22%3A%22f_compare_at_price_7dr10dr%22%2C%22to%22%3A%22innerHTML%22%7D%5D"
                                                         data-wf-sku-conditions="%7B%22condition%22%3A%7B%22fields%22%3A%7B%22default-sku%3Acompare-at-price%22%3A%7B%22exists%22%3A%22yes%22%2C%22type%22%3A%22CommercePrice%22%7D%7D%7D%2C%22timezone%22%3A%22America%2FChicago%22%7D"
                                                         class="shop-item-price compare w-condition-invisible w-dyn-bind-empty"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="shop-button-wrapper"><a href="/product/<?php echo $product['id'];?>" class="btn w-button">Details</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ROOT.'/views/layouts/footer.php'; ?>