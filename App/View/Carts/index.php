
<div class="content-wrapper">




    <div class="content">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Cart
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-respnsive">
                                <?php if (!empty($carts)) : ?>
                                    <table class="table table-striped" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Sub-Total</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $totalItems = 0;
                                            $totalPrice = 0;
                                            foreach ($carts as $cart) : ?>
                                                <tr>
                                                    <?php foreach ($products as $product) : ?>
                                                        <?php if ($product->id == $cart->product_id) : ?>
                                                            <td><img src="<?= $product->picture ?>" style="max-width: 50px;"> <?= $product->name ?></td>
                                                            <td>₱<?= $product->price ?></td>
                                                            <?php
                                                            $subtotal = $product->price * $cart->quantity;
                                                            ?>
                                                            <td><?= $cart->quantity ?></td>
                                                            <td>₱<?= $subtotal ?></td>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                    <?php
                                                    $totalItems += $cart->quantity;
                                                    $totalPrice += $subtotal;
                                                    ?>
                                                    <td>
                                                        <button class="btn btn-danger remove-from-cart" data-product-id="<?= $cart->product_id ?>">Delete</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <div class="summary">
                                        <p>Total Items: <?= $totalItems ?></p>
                                        <p>Total Price: ₱<?= $totalPrice ?></p>
                                    </div>
                                    <div>
                                        <a href="<?= url ?>Carts/checkout" class="btn btn-primary">Checkout</a>
                                    </div>
                                <?php else : ?>
                                    <p>Your cart is empty.</p>
                                    <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

        </div>
    </div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var removeFromCartButtons = document.querySelectorAll('.remove-from-cart');

        removeFromCartButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var productId = this.getAttribute('data-product-id');
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '<?= url ?>Carts/removeFromCart/' + productId, true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Removed from Cart!',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Failed to remove from cart!'
                        });
                    }
                };
                xhr.send();
            });
        });
    });
</script>