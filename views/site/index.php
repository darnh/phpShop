<?php include ROOT.'/views/layouts/header.php'; ?>


<body>

<div class="hero-section">
    <div class="container">
        <div class="hero-wrapper"><h1 class="hero-heading">Serving you <br>since 1989.</h1>
            <p class="hero-paragraph">Acme Outdoors is an outdoor and adventure shop located in the Boathouse District
                in Oklahoma City.</p>
            <div class="hero-button-wrapper"><a href="/catalog" class="btn light outline w-button">Shop Merch</a>
            </div>
        </div>
    </div>
</div>
<div class="support-section">
    <div class="container">
        <div class="support-top-wrapper">
            <div class="support-top-left">
                <div class="support-top-details-text">Ways to support</div>
                <h2 class="support-top-heading">Support Acme Outdoors.</h2></div>
            <div class="support-top-right"><p>COVID-19 has forced us to close our retail space, but we need support from
                    patrons like yourself now more than ever. Below, we’ve listed the best ways to help us through this
                    season.</p></div>
        </div>
        <div class="support-wrapper">


            <div class="support-wrapper">
                <div class="support-column">
                    <div class="support-square">
                        <div class="support-square-number">01</div>
                        <div class="support-square-text">SHOP<br>PRODUCTS</div>
                        <img src="https://assets.website-files.com/5e7ff3ec0c4ef4c974fa99e3/5e7ff57a5836db2a07bab0e3_Circle.svg"
                             alt="Circle Decoration in Shop Products Block" class="support-square-image"></div>
                    <p>Our full product line is still available online here on our site! Getting outside and hiking is still
                        something you can do. Get your gear now!</p></div>
                <div class="support-column">
                    <div class="support-square">
                        <div class="support-square-number">02</div>
                        <div class="support-square-text">Donate</div>
                        <img src="https://assets.website-files.com/5e7ff3ec0c4ef4c974fa99e3/5e7ff57adc54453434efb9ee_Triangle.svg"
                             alt="Triangle Decoration in Donate Block" class="support-square-image triangle"></div>
                    <p>Since we've changed the way we operate to online only, and to ensure your safety, not all our staff
                        is working. Donate to keep them afloat.</p></div>
                <div class="support-column">
                    <div class="support-square">
                        <div class="support-square-number">03</div>
                        <div class="support-square-text">Buy <br>GIFT CARDS</div>
                        <img src="https://assets.website-files.com/5e7ff3ec0c4ef4c974fa99e3/5e7ff57afea9a31a44d66db0_Rectangle.svg"
                             alt="Rectangle Decoration in Buy Gift Cards Block" class="support-square-image rectangle">
                    </div>
                    <p>Have all the outdoor gear you need for now?&nbsp;Buy a gift card and use it later or share it with
                        friends and family. </p></div>
            </div>


        </div>
    </div>
</div>
<div class="safe-section">
    <div class="container">
        <div class="safe-wrapper"><h2 class="safe-heading">How we're keeping you safe during COVID-19</h2>
            <p class="safe-paragraph">As an outdoor shop, we’ve taken precautionary measures to ensure the safety of all
                our customers and team members.</p>

        </div>
    </div>
</div>
<div class="products-section">
    <div class="container">
        <div class="shop-top-wrapper">
            <div class="support-top-left">
                <div class="support-top-details-text">shop products</div>
                <h2 class="support-top-heading">Open 24/7/365.</h2></div>
            <div class="support-top-right"></div>
        </div>
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

</body>

<?php include ROOT.'/views/layouts/footer.php'; ?>