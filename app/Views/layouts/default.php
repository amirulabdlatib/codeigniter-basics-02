<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title><?= $this->renderSection("title"); ?></title>
</head>

<body>
    <nav>
        <a href="<?= url_to("/"); ?>">Home</a>
        <?php if (auth()->loggedIn()): ?>

            <a href="<?= url_to("Articles::index"); ?>">Articles</a>

            <a href="<?= url_to("\Admin\Controllers\Users::index"); ?>">Users</a>

            <a href="<?= url_to("logout"); ?>">Logout</a>
            Hello <?= esc(auth()->user()->first_name); ?>

        <?php else: ?>
            <a href="<?= url_to("login"); ?>">Login</a>
        <?php endif; ?>
    </nav>


    <?php if (session()->has("message")): ?>
        <p><?= session("message"); ?></p>
    <?php endif; ?>
    <?= $this->renderSection('content'); ?>
</body>

</html>