<?= $this->extend('layouts/default'); ?>
<?= $this->section('title'); ?>Edit Article page<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<h1>Edit <?= $article['title']; ?></h1>

<?php if (session()->has("errors")): ?>
    <ul>
        <?php foreach (session("errors") as $error): ?>
            <li><?= $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?= form_open("articles/update/" . $article['id']); ?>
<input type="hidden" name="_method" value="PUT">

<label for="title">Title</label>
<input type="text" id="title" name="title" value="<?= old("title", $article['title']); ?>">

<label for="content">Content</label>
<textarea type="text" id="content" name="content"><?= old('content', $article['content']); ?></textarea>

<button type="submit">Update</button>

</form>
<?= $this->endSection(); ?>