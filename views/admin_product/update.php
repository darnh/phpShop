<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Admin panel</a></li>
                    <li><a href="/admin/product">Goods management</a></li>
                    <li class="active">Edit product</li>
                </ol>
            </div>


            <h4>Edit product #<?php echo $id; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Product name</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $product['name']; ?>">

                        <p>Item</p>
                        <input type="text" name="code" placeholder="" value="<?php echo $product['code']; ?>">

                        <p>Price, $</p>
                        <input type="text" name="price" placeholder="" value="<?php echo $product['price']; ?>">

                        <p>Category</p>
                        <select name="category_id">
                            <?php if (is_array($categoryList)): ?>
                                <?php foreach ($categoryList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>"
                                        <?php if ($product['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br/><br/>

                        <p>Manufacturer</p>
                        <input type="text" name="brand" placeholder="" value="<?php echo $product['brand']; ?>">

                        <div class="col-sm-3">
                            <label class="col-sm-3 control-label" for="image">Image (jpg/png):</label>
                            <img alt="#" src="<?php echo Product::getImage($id); ?>" width="200" />
                            <input type="file" name="image" value="">
                        </div>
                        <br/><br/>

                        <p>Stock availability</p>
                        <select name="availability">
                            <option value="1" <?php if ($product['availability'] == 1) echo ' selected="selected"'; ?>>
                                Yes
                            </option>
                            <option value="0" <?php if ($product['availability'] == 0) echo ' selected="selected"'; ?>>
                                No
                            </option>
                        </select>

                        <br/><br/>


                        <p>Status</p>
                        <select name="status">
                            <option value="1" <?php if ($product['status'] == 1) echo ' selected="selected"'; ?>>
                                Displayed
                            </option>
                            <option value="0" <?php if ($product['status'] == 0) echo ' selected="selected"'; ?>>Hidden
                            </option>
                        </select>

                        <br/><br/>

                        <input type="submit" name="submit" class="btn btn-default" value="Save">

                        <br/><br/>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

