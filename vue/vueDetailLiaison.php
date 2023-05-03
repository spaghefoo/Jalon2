<section class='section'>
    <h1>Détail de la Liaison <?php echo $CodeLiaison ?></h1><br><br><br><br><br><br>
    <div class='container'>
        <div class='content'>

            <form action="?action=detail-liaison" method="POST">
                <br><br><br>
                    <h3><u>Modifier la liaison</u></h3>
                    <label for="CodeLiaison">Code de la liaison : </label>
                    <input type="number" name="CodeLiaison" value="<?= $liaison['CodeLiaison'] ?>" /><br><br>

                    <label for="DistanceEnMillesMarin">Distance en milles marin : </label>
                    <input type="text" name="DistanceEnMillesMarin" value="<?= $liaison['DistanceEnMillesMarin'] ?>" /><br><br>

                    <label for="IdPort">Id du premier port : </label>
                    <select id="IdPort" name="IdPort">
                        <option value="1" <?= ($liaison['IdPort'] == 1) ? 'selected' : '' ?>>1</option>
                        <option value="2" <?= ($liaison['IdPort'] == 2) ? 'selected' : '' ?>>2</option>
                        <option value="3" <?= ($liaison['IdPort'] == 3) ? 'selected' : '' ?>>3</option>
                        <option value="4" <?= ($liaison['IdPort'] == 4) ? 'selected' : '' ?>>4</option>
                        <option value="5" <?= ($liaison['IdPort'] == 5) ? 'selected' : '' ?>>5</option>
                        <option value="6" <?= ($liaison['IdPort'] == 6) ? 'selected' : '' ?>>6</option>
                    </select><br><br>

                    <label id="IdPort_1">Id du deuxième port : </label>
                    <select id="IdPort_1" name="IdPort_1">
                        <option value="1" <?= ($liaison['IdPort_1'] == 1) ? 'selected' : '' ?>>1</option>
                        <option value="2" <?= ($liaison['IdPort_1'] == 2) ? 'selected' : '' ?>>2</option>
                        <option value="3" <?= ($liaison['IdPort_1'] == 3) ? 'selected' : '' ?>>3</option>
                        <option value="4" <?= ($liaison['IdPort_1'] == 4) ? 'selected' : '' ?>>4</option>
                        <option value="5" <?= ($liaison['IdPort_1'] == 5) ? 'selected' : '' ?>>5</option>
                        <option value="6" <?= ($liaison['IdPort_1'] == 6) ? 'selected' : '' ?>>6</option>
                    </select><br><br>

                        <label id="IdSecteur">Id du secteur : </label>
                        <select id="IdSecteur" name="IdSecteur">
                            <option value="1" <?= ($liaison['IdSecteur'] == 1) ? 'selected' : '' ?>>1</option>
                            <option value="2" <?= ($liaison['IdSecteur'] == 2) ? 'selected' : '' ?>>2</option>
                            <option value="3" <?= ($liaison['IdSecteur'] == 3) ? 'selected' : '' ?>>3</option>
                        </select><br><br>

                        <input type="submit" value="Soumettre" />
        </div>
    </div>
</section>