<h1>Supression d'une voiture</h1>
<?= $result_delete ?>
<form method="post" action="cars.php?action=delete" name ="userDeleteForm">
    <div class="form-row">
        <label for="id">Id</label>
        <input name="id" type="text">
    </div>
    <div class="form-row">
        <input name="submit" type="submit" value="Supprimer une voiture">
    </div>
</form>