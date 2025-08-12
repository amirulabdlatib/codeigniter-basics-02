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

<?= form_open_multipart("articles/" . $article->id . "/image/create"); ?>
    <label for="image">Image file</label>
    <input type="file" name="article_image" id="article_image">
    <button type="submit">Upload</button>
</form>

<a href="<?= base_url("/articles/{$article->id}");?>">Back to article detail</a>
<?= $this->endSection("content");?>

