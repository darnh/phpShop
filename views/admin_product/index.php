<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Admin panel</a></li>
                    <li class="active">Goods management</li>
                </ol>
            </div>

            <a href="/admin/product/create" class="btn btn-default back"><i class="fa fa-plus"></i> Add item</a>

            <h4>List of goods</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID product</th>
                    <th>Item</th>
                    <th>Product name</th>
                    <th>Price</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($productsList as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['code']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['price']; ?></td>
                        <td><a href="/admin/product/update/<?php echo $product['id']; ?>" title="Edit"><i class="fa fa-pencil-square-o">Edit</i></a></td>

                        <td><a href="/admin/product/delete/<?php echo $product['id']; ?>" title="Remove"><i class="fa fa-times">Remove</i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>
