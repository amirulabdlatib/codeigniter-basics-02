<nav>
    <a href="<?= url_to("/"); ?>">Home</a>
    <?php if (auth()->loggedIn()): ?>

        <a href="<?= url_to("Articles::index"); ?>">Articles</a>

        <?php if (auth()->user()->inGroup("admin")): ?>
            <a href="<?= url_to("\Admin\Controllers\Users::index"); ?>">Users</a>
        <?php endif; ?>

        <a href="<?= url_to("logout"); ?>">Logout</a>
        Hello <?= esc(auth()->user()->first_name); ?>

    <?php else: ?>
        <a href="<?= url_to("login"); ?>">Login</a>
    <?php endif; ?>
</nav>