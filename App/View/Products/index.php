<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h2 class="card-title">All Products </h2>
                                </div>
                                <div class="col-auto">
                                    <a href="<?= url ?>Products/add" class="btn btn-primary">Add</a>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <table id="users-table" class="table table-bordered table-striped">
                                <thead>
                                    <th>Name</th>
                                    <th>Picture</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Option</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $product) : ?>
                                        <tr>
                                            <td><?= $product->name ?></td>
                                            <td><img src="<?= $product->picture ?>" alt="<?= $product->name ?>" style="max-width: 50px;"></td>
                                            <td><?= $product->description ?></td>
                                            <td><?= $product->price ?></td>
                                            <td>
                                                <?php foreach ($categories as $category) : ?>
                                                    <?php if ($category->id == $product->category_id) : ?>
                                                        <?= $category->name ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </td>
                                            <td>
                                                <a href="<?= url ?>Products/edit/<?= $product->id ?>">Edit</a> |
                                                <a href="<?= url ?>Products/delete/<?= $product->id ?>">Delete</a>
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

    </section>

</div>