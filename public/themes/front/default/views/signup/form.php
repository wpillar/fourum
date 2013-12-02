<?php foreach ($errors->all() as $error): ?>
<div class="alert alert-danger">
    <?= $error ?>
</div>
<?php endforeach ?>

<form role="form" action="<?= url("register") ?>" method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" id="username" value="<?= Input::old('username') ?>">
    </div>
    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="text" class="form-control" name="email" id="email" value="<?= Input::old('email') ?>">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <button type="submit" class="btn btn-default btn-primary">Register</button>
</form>
