<?= $this->extend('layouts/default'); ?>
<?= $this->section("title");?>Update Image <?= $this->endSection("title");?>


<?= $this->section("content");?>
<h1>Edit Image :<?= $article->title; ?></h1>

<?php if (session()->has("errors")): ?>
    <ul>
        <?php foreach (session("errors") as $error): ?>
            <li><?= $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?= form_open("articles/" . $article->id); ?>
<input type="hidden" name="_method" value="PATCH">

</form>

<a href="<?= base_url("/articles/{$article->id}");?>">Back to article detail</a>
<?= $this->endSection("content");?>

