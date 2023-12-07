<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Admin panel</a></li>
                    <li class="active">Order management</li>
                </ol>
            </div>

            <h4>Order list</h4>

            <br/>


            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID orders</th>
                    <th>Buyer's name</th>
                    <th>Buyer's phone number</th>
                    <th>Date of registration</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($ordersList as $order): ?>
                    <tr>
                        <td>
                            <a href="/admin/order/view/<?php echo $order['id']; ?>">
                                <?php echo $order['id']; ?>
                            </a>
                        </td>
                        <td><?php echo $order['user_name']; ?></td>
                        <td><?php echo $order['user_phone']; ?></td>
                        <td><?php echo $order['date']; ?></td>
                        <td><?php echo Order::getStatusText($order['status']); ?></td>
                        <td><a href="/admin/order/view/<?php echo $order['id']; ?>" title="Watch"><i class="fa fa-eye">Watch</i></a></td>
                        <td><a href="/admin/order/update/<?php echo $order['id']; ?>" title="Edit">Edit<i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/order/delete/<?php echo $order['id']; ?>" title="Remove">Remove<i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>
