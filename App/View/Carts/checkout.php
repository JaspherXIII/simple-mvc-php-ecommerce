<div class="content-wrapper">


    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Checkout
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= url ?>Carts/processCheckout" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label><b>Billing Information</b></label>
                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address:</label>
                                            <input type="text" class="form-control" id="address" name="address" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="city">City:</label>
                                            <input type="text" class="form-control" id="city" name="city" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="state">State:</label>
                                            <input type="text" class="form-control" id="state" name="state" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="zip">ZIP Code:</label>
                                            <input type="text" class="form-control" id="zip" name="zip" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="payment_method">Payment Method:</label>
                                            <select class="form-control" id="payment_method" name="payment_method" required>
                                                <option value="Cash on Delivery">Cash on Delivery</option>
                                                <option value="GCash">GCash</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>


            </div>

        </div>
    </div>

</div>