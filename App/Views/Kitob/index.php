<?php
use App\Models\Muallif;
use App\Models\Janr;

$avtors = Muallif::all();
$janrs = Janr::all();

?>
<h1>Kitoblar sahifasi</h1>
<form action="/createK" method="POST">
    <input type="text" name="name" placeholder="Name"><br><br>
    <input type="text" name="text" placeholder="Text"><br><br>
    <select name="muallif_id">
        <?php foreach ($avtors as $avtor) { ?>
            <option value="<?= $avtor->id ?>"><?= $avtor->name ?></option>
        <?php } ?>
    </select>
    <select name="janr_id">
        <?php foreach ($janrs as $janr) { ?>
            <option value="<?= $janr->id ?>"><?= $janr->name ?></option>
        <?php } ?>
    </select>
    <button type="submit" name="ok" class="btn btn-primary">Save</button>
</form>
<br>
<table class="table" border="2">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Text</th>
        <th>muallif ismi</th>
        <th>Janr name</th>
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
            <td><?= $model->text ?></td>
            <td>
                <?php foreach ($avtors as $avtor) {
                    if ($avtor->id == $model->muallif_id) {
                        echo $avtor->name;
                    }
                } ?>
            </td>
            <td>
                <?php foreach ($janrs as $janr) {
                    if ($janr->id == $model->janr_id) {
                        echo $janr->name;
                    }
                } ?>
            </td>
            <td>
                <form action="/showK" method="POST">
                    <input type="hidden" name="id" value="<?= $model->id ?>">
                    <button type="submit" name="ok" class="btn btn-outline-primary">Show</button>
                </form>
            </td>
            <td>
                <form action="/editK" method="POST">
                    <input type="hidden" name="id" value="<?= $model->id ?>">
                    <button type="submit" name="ok" class="btn btn-outline-warning">Edit</button>
                </form>
            </td>
            <td>
                <form action="/deleteK" method="POST">
                    <input type="hidden" name="id" value="<?= $model->id ?>">
                    <button type="submit" name="ok" class="btn btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>