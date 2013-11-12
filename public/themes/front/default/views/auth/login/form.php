<form role="form" action="<?= url('auth/login') ?>" method="post">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" id="email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <button type="submit" class="btn btn-default btn-primary">Login</button>
</form>