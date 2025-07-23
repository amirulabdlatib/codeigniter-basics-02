<?= $this->extend('layouts/default'); ?>
<?= $this->section('title'); ?>Edit Article page<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<h1>Edit <?= $article->title; ?></h1>

<?php if (session()->has("errors")): ?>
    <ul>
        <?php foreach (session("errors") as $error): ?>
            <li><?= $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?= form_open("articles/" . $article->id); ?>
<input type="hidden" name="_method" value="PUT">

<?= $this->include('Articles/form'); ?>

</form>
<?= $this->endSection(); ?>