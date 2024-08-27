<h1>Order Items</h1>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderItems as $item) : ?>
                <tr>
                    <td><?= $item->product_name ?></td>
                    <td><?= $item->quantity ?></td>
                    <td>$<?= $item->price ?></td>
                    <td>$<?= $item->subtotal ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>