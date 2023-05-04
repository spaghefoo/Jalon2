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
                        <?php
                        // boucle pour afficher les ports et selectionner celui correspondant.
                           for($i = 0; $i < sizeof($resultPorts); $i++)
                           {
                                $selected = '';
                                // j'ai remplace l'operateur ternaire par ça parce que ça marchait pas sinon.
                                if($liaison['IdPort'] == $i)
                                {
                                    $selected = 'selected';
                                }
                                echo '<option value='.$resultPorts[$i]['IdPort'].' '.$selected.'>'.$resultPorts[$i]['libellePort'].'</option>';
                           }
                        ?>
                    </select><br><br>

                    <label id="IdPort_1">Id du deuxième port : </label>
                    <select id="IdPort_1" name="IdPort_1">
                       <?php
                       // idem que dessus.
                            for($i = 0; $i < sizeof($resultPorts); $i++)
                            {
                                $selected = '';
                                if($liaison['IdPort_1'] == $i)
                                {
                                    $selected = 'selected';
                                }
                                echo '<option value='.$resultPorts[$i]['IdPort'].' '.$selected.'>'.$resultPorts[$i]['libellePort'].'</option>';
                            }
                       ?>
                    </select><br><br>

                        <label id="IdSecteur">Id du secteur : </label>
                        <select id="IdSecteur" name="IdSecteur">
                         <?php
                         // boucle pour afficher les secteurs et selectionner celui correspondant.
                              for($i = 0; $i < sizeof($resultPorts); $i++)
                              {
                                   $selected = '';
                                   if($liaison['IdSecteur'] == $i)
                                   {
                                       $selected = 'selected';
                                   }
                                   echo '<option value='.$resultSecteurs[$i]['IdPort'].' '.$selected.'>'.$resultSecteurs[$i]['libellePort'].'</option>';
                              }
                         ?>
                        </select><br><br>

                        <input type="submit" value="Soumettre" />
        </div>
    </div>
</section>