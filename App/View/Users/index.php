<div class="content-wrapper">


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h2 class="card-title">All Accounts </h2>
                                </div>
                                
                            </div>

                        </div>

                        <div class="card-body">
                            <table id="users-table" class="table table-bordered table-striped">
                                <thead>
                                    <th>Username</th>
                                   
                                    <th>Role</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($args as $user) : ?>
                                        <tr>
                                            <td><?= $user->username ?></td>
                                           
                                            <td><?= $user->role ?></td>

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