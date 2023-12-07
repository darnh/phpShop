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

<div class="page-title-section">
    <div class="container"><h1 class="page-title"><?php echo $product['name'];?></h1></div>
</div>
<div class="content-section">
    <div class="container">
        <div class="shopping-page-wrapper">
            <div class="shopping-page-left">
                <div data-wf-sku-bindings="%5B%7B%22from%22%3A%22f_main_image_4dr.url%22%2C%22to%22%3A%22style.background-image%22%7D%5D"
                     style="background-image:url(&quot;https://assets.website-files.com/5e853c3383474026e43f2c78/5e856e41c718420c18dd6751_patrick-hendry-eDgUyGu93Yw-unsplash.jpg&quot;)"
                     class="shopping-page-image">
                    <div data-wf-sku-conditions="%7B%22condition%22%3A%7B%22fields%22%3A%7B%22default-sku%3Acompare-at-price%22%3A%7B%22exists%22%3A%22yes%22%2C%22type%22%3A%22CommercePrice%22%7D%7D%7D%2C%22timezone%22%3A%22America%2FChicago%22%7D"
                         class="pill-2 badge primary sale w-condition-invisible">Sale
                    </div>
                </div>
            </div>
            <div class="shipping-page-right"><h2 class="page-product-headin"><?php echo $product['name'];?></h2>
                <div class="page-price-wrapping">
                    <div data-wf-sku-bindings="%5B%7B%22from%22%3A%22f_price_%22%2C%22to%22%3A%22innerHTML%22%7D%5D"
                         class="shop-item-price-page">$&nbsp;<?php echo $product['price'];?>USD
                    </div>
                    <div data-wf-sku-bindings="%5B%7B%22from%22%3A%22f_compare_at_price_7dr10dr%22%2C%22to%22%3A%22innerHTML%22%7D%5D"
                         data-wf-sku-conditions="%7B%22condition%22%3A%7B%22fields%22%3A%7B%22default-sku%3Acompare-at-price%22%3A%7B%22exists%22%3A%22yes%22%2C%22type%22%3A%22CommercePrice%22%7D%7D%7D%2C%22timezone%22%3A%22America%2FChicago%22%7D"
                         class="shop-item-price-page compare-at w-condition-invisible w-dyn-bind-empty"></div>
                </div>
                <div>
                    <form class="w-commerce-commerceaddtocartform">
                        <label for="quantity-8342fe54ad998bceba4bd86dd02b8e79">Quantity</label>
                        <div class="add-to-cart-page-wrapper">
                            <input type="number" pattern="^[0-9]+$" inputMode="numeric" id="quantity-8342fe54ad998bceba4bd86dd02b8e79" name="commerce-add-to-cart-quantity-input" min="1" class="w-commerce-commerceaddtocartquantityinput input cart-quantity" value="1" />
                            <a class="btn btn-default add-to-cart"  <a  href="#" data-id="<?php echo $product['id']; ?>"  >Add to cart </a>
                        </div>
                    </form>
                    <div style="display:none" class="w-commerce-commerceaddtocartoutofstock" tabindex="0">
                        <div>This product is out of stock.</div>
                    </div>
                    <div aria-live="" data-node-type="commerce-add-to-cart-error" style="display:none"
                         class="w-commerce-commerceaddtocarterror">
                        <div data-node-type="commerce-add-to-cart-error"
                             data-w-add-to-cart-quantity-error="Product is not available in this quantity."
                             data-w-add-to-cart-general-error="Something went wrong when adding this item to the cart."
                             data-w-add-to-cart-mixed-cart-error="You can’t purchase another product with a subscription."
                             data-w-add-to-cart-buy-now-error="Something went wrong when trying to purchase this item."
                             data-w-add-to-cart-checkout-disabled-error="Checkout is disabled on this site."
                             data-w-add-to-cart-select-all-options-error="Please select an option in each set.">Product
                            is not available in this quantity.
                        </div>
                    </div>
                </div>
                <div class="w-richtext"><h2>What’s a Rich Text element?</h2>
                    <p>The rich text element allows you to create and format headings, paragraphs, blockquotes, images,
                        and video all in one place instead of having to add and format them individually. Just
                        double-click and easily create content.</p><h4>Static and dynamic content editing</h4>
                    <p>A rich text element can be used with static or dynamic content. For static content, just drop it
                        into any page and begin editing. For dynamic content, add a rich text field to any collection
                        and then connect a rich text element to that field in the settings panel. Voila!</p><h4>How to
                        customize formatting for each rich text</h4>
                    <p>Headings, paragraphs, blockquotes, figures, images, and figure captions can all be styled after a
                        class is added to the rich text element using the "When inside of" nested selector system.</p>
                    <p>‍</p></div>
                <div><h3 class="page-product-headin">Tweet about #AcmeOutdoors products</h3>
                    <div class="w-widget w-widget-twitter">
                        <iframe allowtransparency="true" frameborder="0" scrolling="no"
                                src="//platform.twitter.com/widgets/tweet_button.html#counturl=biznus-template.io&amp;dnt=true&amp;height=28&amp;show_count=false&amp;size=l&amp;text=You'll%20love%20the%20product%20from%20Acme%20Outdoors!&amp;url=http%3A%2F%2Fbiznus-template.io&amp;width=76"
                                style="border: none; height: 28px; overflow: hidden; width: 76px;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php include ROOT.'/views/layouts/footer.php'; ?>