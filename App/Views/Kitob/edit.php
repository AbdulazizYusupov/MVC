<h1>Edit</h1>
<form action="/updateK" method="POST">
    <input type="hidden" name="id" value="<?= $models[0]->id ?>">
    <input type="text" name="name" value="<?= $models[0]->name ?>">
    <input type="text" name="text" value="<?= $models[0]->text ?>">
    <input type="number" name="muallif_id" value="<?= $models[0]->muallif_id ?>">
    <input type="number" name="janr_id" value="<?= $models[0]->janr_id ?>">
    <input type="submit" name="ok" value="Edit" class="btn btn-info">
</form>