<?= $this->extend('layouts/default'); ?>
<?= $this->section('title'); ?>Create Article page<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<h1>New article</h1>

<?php if (session()->has("errors")): ?>
    <ul>
        <?php foreach (session("errors") as $error): ?>
            <li><?= $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?= form_open("articles/store"); ?>

<label for="title">Title</label>
<input type="text" id="title" name="title">

<label for="content">Content</label>
<textarea type="text" id="content" name="content"></textarea>

<button type="submit">Create</button>

</form>
<?= $this->endSection(); ?>