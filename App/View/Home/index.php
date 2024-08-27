<section class="content">
    <div class="container-fluid">
        <div class="card">
        <div class="card-header">
                            <h4 class="card-title">
                                All Products
                            </h4>
                        </div>
            <div class="card-body">
                <div class="row">
                    

                    <div class="col-md-12">

                                <div class="row">
                                    <?php foreach ($products as $product) : ?>
                                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                            <div class="card">
                                                <img src="<?= $product->picture ?>" class="card-img-top" alt="<?= $product->name ?>">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $product->name ?></h5>
                                                    <p class="card-text">Price: ₱<?= $product->price ?></p>
                                                    <button class="btn btn-primary add-to-cart" data-product-id="<?= $product->id ?>">Add to Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var addToCartButtons = document.querySelectorAll('.add-to-cart');

        addToCartButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var productId = this.getAttribute('data-product-id');

                var xhr = new XMLHttpRequest();
                xhr.open('GET', '<?= url ?>Products/addToCart/' + productId, true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Added to Cart!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Failed to add to cart!'
                        });
                    }
                };
                xhr.send();
            });
        });
    });
</script>