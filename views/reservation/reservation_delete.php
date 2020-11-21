<h1>Supression d'une réservation</h1>
<?= $result_delete ?>
<form method="post" action="reservations.php?action=delete" name ="reservationDeleteForm">
<div class="form-row">
        <label for="id">Id</label>
        <input name="id" type="text">
    </div>
    <div class="form-row">
        <input name="submit" type="submit" value="Supprimer une réservation">
    </div>
</form>