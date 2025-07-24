<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>User Groups<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<h1>User Group page</h1>
<?= form_open("/admin/users/$user->id/groups"); ?>

<label>
    <input
        type="checkbox"
        name="groups[]"
        value="user"
        <?= $user->inGroup("user") ? "checked" : ""; ?>>
    User
</label>


<label>
    <input
        type="checkbox"
        name="groups[]"
        value="admin"
        <?= $user->inGroup("admin") ? "checked" : ""; ?>>
    Admin
</label>

<button>Save</button>

</form>


<?= $this->endSection(); ?>