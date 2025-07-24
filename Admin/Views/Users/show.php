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
    <dd><?= esc($user->created_at->humanize()); ?></dd>

    <dt>Groups</dt>
    <dd>
        <?= implode(",", $user->getGroups()); ?>
        <a href="<?= url_to("\Admin\Controllers\Users::groups", $user->id); ?>">Edit</a>
    </dd>

    <dt>Pemissions</dt>
    <dd>
        <?= implode(",", $user->getPermissions()); ?>
        <a href="<?= url_to("\Admin\Controllers\Users::permissions", $user->id); ?>">Edit</a>
    </dd>


    <?= form_open("admin/users/$user->id/toggle-ban"); ?>
    <button><?= $user->isBanned() ? "Unban" : "Ban"; ?></button>
    </form>
</dl>
<?= $this->endSection(); ?>