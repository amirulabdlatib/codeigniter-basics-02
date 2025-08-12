<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Show article<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<h1><?= $article->title; ?></h1>

<?php if($article->image): ?>
    <img
        style="height: 100px; width: 100px" 
        src="<?= url_to("Article\Image::get", $article->id);?>" 
        alt="<?= $article->image;?>">
        <?= form_open("articles/$article->id/image/delete");?>
        <input type="hidden" name="_method" value="DELETE">
        <button>Delete</button>
<?php endif; ?>
<br>
<a href="<?= base_url("/articles/{$article->id}/image/edit");?>">Edit image</a>

<p><?= $article->content; ?></p>

<?php if ($article->isOwner() || auth()->user()->can("articles.edit")): ?>
    <a href="<?= url_to('Articles::edit', $article->id); ?>">Edit</a>
<?php endif; ?>
<?php if ($article->isOwner() || auth()->user()->can("articles.delete")): ?>
    <a href="<?= url_to('Articles::delete', $article->id); ?>">Delete</a>
<?php endif; ?>


<?= $this->endSection(); ?>

<?= $this->section('scripts');?>
<script src="<?= base_url('js/article-show.js'); ?>"></script>
<?= $this->endSection('scripts');?>