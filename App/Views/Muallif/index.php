<?php 
if (auth()->role != 'user'){
    header('location: /login');
}
?>
<h1>Muallif sahifasi</h1>
<form action="/createM" method="POST">
    <input type="text" name="name" placeholder="Name"><br><br>
    <button type="submit" name="ok" class="btn btn-primary">Save</button>
</form>
<br>
<table class="table" border="2">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Show</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
    foreach ($models as $model) {
        ?>
        <tr>
            <th><?= $model->id ?></th>
            <td><?= $model->name ?></td>
            <td>
                <form action="/showM" method="POST">
                    <input type="hidden" name="id" value="<?= $model->id ?>">
                    <button type="submit" name="ok" class="btn btn-outline-primary">Show</button>
                </form>
            </td>
            <td>
                <form action="/editM" method="POST">
                    <input type="hidden" name="id" value="<?= $model->id ?>">
                    <button type="submit" name="ok" class="btn btn-outline-warning">Edit</button>
                </form>
            </td>
            <td>
                <form action="/deleteM" method="POST">
                    <input type="hidden" name="id" value="<?= $model->id ?>">
                    <button type="submit" name="ok" class="btn btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>