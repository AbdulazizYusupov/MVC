
<h1>Edit</h1>
<form action="/updateM" method="POST">
    <input type="hidden" name="id" value="<?= $models[0]->id ?>">
    <input type="text" name="name" value="<?= $models[0]->name ?>">
    <input type="submit" name="ok" value="Edit" class="btn btn-info">
</form>