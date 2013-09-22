<header class="navbar navbar-admin navbar-fixed-top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?= url('/admin') ?>" class="navbar-brand"><?= $forumName ?></a>
        </div>
        <nav class="collapse navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">
                <li>
                  <a href="<?= url('/admin/settings') ?>">Settings</a>
                </li>
                <li class="active">
                  <a href="<?= url('/admin/forums') ?>">Forums</a>
                </li>
                <li>
                  <a href="<?= url('/admin/users') ?>">Users</a>
                </li>
                <li>
                  <a href="<?= url('/admin/groups') ?>">Groups</a>
                </li>
                <li>
                  <a href="<?= url('/admin/themes') ?>">Themes</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Will Pillar <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</header>

<div class="container" style="margin-top:50px;">
