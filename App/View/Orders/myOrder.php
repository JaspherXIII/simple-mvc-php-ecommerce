<div class="content-wrapper">

    


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                    <div class="card-header">
                            <h4 class="card-title">
                                Orders
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-respnsive">

                                <table class="table table-striped" width="100%">
                                    <thead>
                                        <th>ID</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($orderitems as $orderitem) : ?>
                                            <tr>
                                                <td><?= $orderitem->id ?></td>
                                                <td>
                                                    <?php foreach ($products as $product) : ?>
                                                        <?php if ($product->id == $orderitem->product_id) : ?>

                                                           <?= $product->name ?>

                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </td>

                                                <td><?= $orderitem->quantity ?></td>
                                                <td>
                                                    <?php foreach ($products as $product) : ?>
                                                        <?php if ($product->id == $orderitem->product_id) : ?>
                                                            ₱<?= $product->price ?>.00
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $totalAmount = $orderitem->quantity * $product->price;
                                                    ?>
                                                    ₱<?= $totalAmount ?>.00
                                                </td>
                                                <td><?= $orderitem->status ?></td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

        </div>
    </div>

</div>