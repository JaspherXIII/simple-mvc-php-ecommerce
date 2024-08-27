<div class="content-wrapper">

    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Account <small></small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Account</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>



    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">



                            <?php if (isset($user)) : ?>
                                <form action="<?= url ?>Users/edit/<?= $user->id ?>" method="post">

                                    <div class="card-body">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input name="username" class="form-control" required value="<?= $user->username ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control" required value="<?= $user->password ?>">
                                            </div>
                                        </div>
                                        <input type="hidden" name="role" value="user"> 
                                    </div>
                                    <div class="card-footer">
                                        <input name="id" type="hidden" value="<?= $user->id ?>">
                                        <button type="submit" name="edit" class="btn btn-success">Save</button>
                                    </div>

                                </form>
                            <?php endif; ?>



                       

                    </div>

                </div>

                </section>

            </div>
        </div>
    </div>
</div>