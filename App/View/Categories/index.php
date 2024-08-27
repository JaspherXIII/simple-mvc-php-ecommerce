<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h2 class="card-title">All Categories </h2>
                                </div>
                                <div class="col-auto">
                                    <a href="<?= url ?>Categories/add" class="btn btn-primary float-right">Add</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="categories-table" class="table table-bordered table-striped">
                                <thead>
                                    <th>Name</th>
                                    <th>Option</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($args as $category) : ?>
                                        <tr>
                                            <td><?= $category->name ?></td>
                                            <td>
                                                <a href="<?= url ?>Categories/delete/<?= $category->id ?>">Delete</a>
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