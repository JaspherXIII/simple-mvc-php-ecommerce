
<?php foreach ($orderitems as $orderitem) : ?>
    <div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Orders</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Update Order</h3>
                            <a href="<?= url ?>Orders" class="btn btn-default float-right"><i class="fas fa-arrow-left"></i></a>
                        </div>
                        <form action="<?= url ?>Orders/edit/<?= $orderitem->id ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="status">Order Status</label>
                                    <select name="status" class="form-control" id="status" required>
                                    <option value="Processing" <?= $orderitem->status === 'Processing' ? 'selected' : '' ?>>Processing</option>
                                    <option value="In Transit" <?= $orderitem->status === 'In Transit' ? 'selected' : '' ?>>In Transit</option>
                                    <option value="Shipped" <?= $orderitem->status === 'Shipped' ? 'selected' : '' ?>>Shipped</option>
                                    <option value="Delivered" <?= $orderitem->status === 'Delivered' ? 'selected' : '' ?>>Delivered</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="hidden" name="id" value="<?= $orderitem->id ?>">
                                <button type="submit" name="edit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php endforeach; ?>