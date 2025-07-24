<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>User detail<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<h1>User detail page</h1>
<dl>
    <dt>Email</dt>
    <dd><?= esc($user->email); ?></dd>

    <dt>First Name</dt>
    <dd><?= esc($user->first_name); ?></dd>

    <dt>Created</dt>
    <dd><?= esc($user->created_at); ?></dd>
</dl>
<?= $this->endSection(); ?>