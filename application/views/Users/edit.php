<div class="container-fluid px-4">
    <h1 class="mt-4">Edit User</h1>
    <div class="card">
        <div class="card-body">
            <form action="<?= site_url('users/update/'.$user->id) ?>" method="post">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= $user->nama ?>" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?= $user->username ?>" required>
                </div>
                <div class="form-group">
                    <label>Password Baru <small class="text-muted">(kosongkan jika tidak diubah)</small></label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control" required>
                        <option value="admin" <?= $user->role=='admin'?'selected':'' ?>>Admin</option>
                        <option value="sales" <?= $user->role=='sales'?'selected':'' ?>>Sales</option>
                        <option value="manager" <?= $user->role=='manager'?'selected':'' ?>>Manager</option>
                    </select>
                </div>
                <a href="<?= site_url('users') ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>