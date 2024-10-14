<?php
use App\Models\Muallif;
use App\Models\Janr;

$avtors = Muallif::all();
$janrs = Janr::all();

?>
<h1>Edit</h1>
<form action="/updateK" method="POST">
    <input type="hidden" name="id" value="<?= $models[0]->id ?>">
    <input type="text" name="name" value="<?= $models[0]->name ?>">
    <input type="text" name="text" value="<?= $models[0]->text ?>">
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
    <input type="submit" name="ok" value="Edit" class="btn btn-info">
</form>