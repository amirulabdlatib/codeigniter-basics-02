<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Show article<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<h1><?= $article->title; ?></h1>
<p><?= $article->content; ?></p>

<?php if ($article->isOwner()): ?>
    <a href="<?= url_to('Articles::edit', $article->id); ?>">Edit</a>
    <a href="<?= url_to('Articles::delete', $article->id); ?>">Delete</a>
<?php endif; ?>


<?= $this->endSection(); ?>