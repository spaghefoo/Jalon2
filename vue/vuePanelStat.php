<section class="section">
    <h2>Panel Administrateur - Détail Statistique</h2>
    <form action="./?action=detail-statistique" method="get">
        <label for="dateTraversee">Sélectionnez une date de traversée :</label>
        <select name="dateTraversee" id="dateTraversee">
            <option value="">Tous</option>
            <?php
            $dates = getListeDatesTraversees();
            if (isset($_GET['dateTraversee'])) {
                $dateTraversee = $_GET['dateTraversee'];
                foreach ($dates as $date) {
                    echo "<option value='$date'";
                    if ($date == $dateTraversee) {
                        echo " selected='selected'";
                    }
                    echo ">$date</option>";
                }
            } else {
                foreach ($dates as $date) {
                    echo "<option value='$date'>$date</option>";
                }
            }
            ?>
        </select>
        <input type="hidden" name="action" value="detail-statistique">
        <button type="submit">Valider</button>
        <?php if (isset($_GET['dateTraversee'])) : ?>
            <a href="./?action=detail-statistique" class="reset-date">Réinitialiser</a>
        <?php endif; ?>
    </form>
</section>
