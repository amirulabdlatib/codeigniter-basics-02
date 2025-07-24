<?= $this->extend("layouts/default"); ?>

<?= $this->section("title"); ?>Users<?= $this->endSection(); ?>

<?= $this->section("content"); ?>
<h1>Users</h1>
<table>
    <thead>
        <tr>
            <th>Email</th>
            <th>First Name</th>
            <th>Active</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= esc($user->email); ?></td>
                <td><?= esc(!empty($user->first_name) ? $user->first_name : 'No name provided'); ?></td>
                <td><?= esc($user->active ? 'Active' : "Inactive"); ?></td>
                <td><a href="<?= base_url("/admin/users/$user->id"); ?>">Show</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $pager->links(); ?>

<?= $this->endSection(); ?>