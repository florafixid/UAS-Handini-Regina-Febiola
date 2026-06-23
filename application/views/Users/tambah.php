<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah User</h1>
    <div class="card">
        <div class="card-body">
            <form action="<?= site_url('users/simpan') ?>" method="post">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control" required>
                        <option value="admin">Admin</option>
                        <option value="sales">Sales</option>
                        <option value="manager">Manager</option>
                    </select>
                </div>
                <a href="<?= site_url('users') ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>