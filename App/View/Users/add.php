<form action="<?= url ?>Users/add" method="post">
    <div class="card">
        <div class="card-header bg-black">
            <div class="card-title text-white">
                Add User
                <div style="float: right;">
                    <a href="<?= url ?>Users">Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Username </label>
                    <input name="username" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Password </label>
                    <input type="password" name="password" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Role </label>
                    <select name="role" class="form-control">
                        <option value="user">User</option>
                        <option value="administrator">Administrator</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" name="add" class="btn btn-success">Save</button>
        </div>
    </div>
</form>