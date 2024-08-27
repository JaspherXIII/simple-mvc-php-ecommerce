<?php foreach ($orderitems as $orderitem) : ?>

    <div class="content-wrapper">


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="card-title">View Order</h3>
                                    </div>
                                    <div class="col-auto">
                                        <a href="<?= url ?>Orders" class="btn btn-secondary float-right">Back</i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">


                                <?php foreach ($orders as $order) : ?>
                                    <?php if ($order->id == $orderitem->order_id) : ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Customer Details</h5>
                                        <p><strong>Name:</strong> <?= $order->name ?></p>
                                        <p><strong>Address:</strong> <?= $order->address ?>, <?= $order->city ?>,<br> <?= $order->state ?>, <?= $order->zip ?></p>

                                    </div>
                                    <div class="col-md-6">
                                        <h5>Payment Details</h5>
                                        <p><strong>Payment Method:</strong> <?= $order->payment_method ?></p>
                                    </div>
                                </div>


                                <br> <br>
                                <h5>Order Items</h5>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?php foreach ($products as $product) : ?>
                                                    <?php if ($product->id == $orderitem->product_id) : ?>

                                                        <?= $product->name ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </td>
                                            <td><?= $orderitem->quantity ?></td>
                                            <td>
                                                <?php
                                                $totalAmount = $orderitem->quantity * $product->price;
                                                ?>
                                                ₱<?= $totalAmount ?>.00
                                            </td>
                                            <td><?= $orderitem->status ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php endforeach; ?>