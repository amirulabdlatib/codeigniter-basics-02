<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>User Permissions<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<h1>User Permissions</h1>
<?= form_open("/admin/users/$user->id/permissions"); ?>

<label>
    <input
        type="checkbox"
        name="permissions[]"
        value="articles.edit"
        <?= $user->hasPermission("articles.edit") ? "checked" : ""; ?>>
    Can edit articles
</label>

<label>
    <input
        type="checkbox"
        name="permissions[]"
        value="articles.delete"
        <?= $user->hasPermission("articles.delete") ? "checked" : ""; ?>>
    Can delete articles
</label>


<button>Save</button>

</form>


<?= $this->endSection(); ?>