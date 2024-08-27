<div class="content-wrapper">



    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h2 class="card-title">All Orders </h2>
                                </div>

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="orders-table" class="table table-bordered table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Customer</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($orderitems as $orderitem) : ?>
                                           
                                                <tr>
                                                    <td><?= $orderitem->id ?></td>
                                                    <td>
                                                        <?php foreach ($orders as $order) : ?>
                                                            <?php if ($order->id == $orderitem->order_id) : ?>
                                                                <?= $order->name ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </td>
                                                    
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
                                                    <td>
                                                        <a href="<?= url ?>Orders/view/<?= $orderitem->id ?>">View</a> | <a href="<?= url ?>Orders/edit/<?= $orderitem->id ?>">Edit</a>

                                                    </td>
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

    </section>

</div>