<div class="content-wrapper">


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        <div class="row">
                                    <div class="col">
                                        <h3 class="card-title">Add Category</h3>
                                    </div>
                                    <div class="col-auto">
                                        <a href="<?= url ?>Categories" class="btn btn-secondary float-right">Back</i></a>
                                    </div>
                                </div>
                        </div>
                        <form action="<?= url ?>Categories/add" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" id="name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="add" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
