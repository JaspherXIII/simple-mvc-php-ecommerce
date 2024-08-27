<?php foreach ($products as $product) : ?>
    <div class="content-wrapper">


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">

                            <div class="row">
                                    <div class="col">
                                        <h3 class="card-title">Edit Product</h3>
                                    </div>
                                    <div class="col-auto">
                                        <a href="<?= url ?>Products" class="btn btn-secondary float-right">Back</i></a>
                                    </div>
                                </div>
                            </div>
                            <form action="<?= url ?>Products/edit/<?= $product->id ?>" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" class="form-control" id="name" required value="<?= $product->name ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <input type="text" name="description" class="form-control" id="description" required value="<?= $product->description ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="number" name="price" class="form-control" id="price" required value="<?= $product->price ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="category_id">Category</label>
                                                <select name="category_id" class="form-control" id="category_id" required>
                                                    <?php foreach ($categories as $category) : ?>
                                                        <option value="<?= $category->id ?>" <?= ($category->id == $product->category_id) ? 'selected' : '' ?>>
                                                            <?= $category->name ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="picture">Picture</label>
                                                <input type="file" name="picture" class="form-control-file" id="picture" accept="image/*" required onchange="previewImage(this)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="id" value="<?= $product->id ?>">
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