            <footer>
                <hr>
                <ul class="small-nav">
                    <li><a href="<?= url('admin') ?>">Admin</a></li>

                    <?php if (Auth::check()): ?>
                    <li><a href="<?= url('auth/logout') ?>">Logout</a></li>
                    <?php else: ?>
                    <li><a href="<?= url('auth/login') ?>">Login</a></li>
                    <?php endif ?>
                </ul>
            </footer>
        </div>
    </body>
</html>
