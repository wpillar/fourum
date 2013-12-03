<div class="container">

    <div class="row">
        <div class="col-md-10">
            <h1><a href="<?= url('/') ?>"><?= $forumName ?></a></h1>
        </div>
        <div class="col-md-2">
            <?php if (Auth::check() && $user): ?>
            <h4 style="margin-top:20px;"><?= $user->getUsername() ?></h4>
            <ul class="small-nav">
                <li><a href="<?= url("user/profile/{$user->getUsername()}") ?>">Profile</a></li>
                <li><a href="<?= url('auth/logout') ?>">Logout</a></li>
            </ul>
            <?php else: ?>
            <h4 style="margin-top:20px"><a href="<?= url('register') ?>">Create Account</a></h4>
            <?php endif ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
    </div>
