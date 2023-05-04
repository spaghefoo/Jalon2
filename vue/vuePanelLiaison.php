<section class="section">
  <h2>Panel Administrateur - Liaison</h2>
</section>
<form action="?action=panelLiaison" method="POST">
  <section class="section">

    <h3><u>Ajouter une liaison</u></h3>
    <label for="CodeLiaison">Code de la liaison : </label>
    <input type="number" name="CodeLiaison" /><br><br>

    <label for="DistanceEnMillesMarin">Distance en milles marin : </label>
    <input type="text" name="DistanceEnMillesMarin" /><br><br>

    <label for="IdPort">Id du premier port : </label>
    <select id="IdPort" name="IdPort">
      <?php

        for($i = 0; $i < sizeof($resultPorts); $i++)
        {
            echo '<option value='.$resultPorts[$i]['IdPort'].'>'.$resultPorts[$i]['libellePort'].'</option>';
        }
      ?>
    </select><br><br>

    <label id="IdPort_1">Id du deuxième port : </label>
    <select id="IdPort_1" name="IdPort_1">
    <?php
      for($i = 0; $i < sizeof($resultPorts); $i++)
      {
          echo '<option value='.$resultPorts[$i]['IdPort'].'>'.$resultPorts[$i]['libellePort'].'</option>';
      }
    ?>
    </select><br><br>

    <label id="IdSecteur">Id du secteur : </label>
    <select id="IdSecteur" name="IdSecteur">
    <?php
        for($i = 0; $i < sizeof($resultSecteurs); $i++)
        {
            echo '<option value='.$resultSecteurs[$i]['IdSecteur'].'>'.$resultSecteurs[$i]['nomSecteur'].'</option>';
        }
    ?>
    </select><br><br>

    <input type="submit" />

  </section>
  <section class="section">
    <h3><u>Modification d'une liaison</u></h3>
    <?php
    if (count($AffichageLiaison) > 0) {
      echo "<table id='liaison'>";
      echo "<tr><th>CodeLiaison</th><th>Distance en milles marin</th><th>Id du Port</th><th>Id du Port 2</th><th>Id du Secteur</th></tr>";
      for ($i = 0; $i < count($AffichageLiaison); $i++) {
        echo "<tr>";
        echo "<td>" . $AffichageLiaison[$i]['CodeLiaison'] . "</td>";
        echo "<td>" . $AffichageLiaison[$i]['DistanceEnMillesMarin'] . "</td>";
        echo "<td>" . $AffichageLiaison[$i]['IdPort'] . "</td>";
        echo "<td>" . $AffichageLiaison[$i]['IdPort_1'] . "</td>";
        echo "<td>" . $AffichageLiaison[$i]['IdSecteur'] . "</td>";
        echo    "<td><a href=./?action=detail-liaison&CodeLiaison=" .
        $AffichageLiaison[$i]['CodeLiaison'] . " title='Cliquez pour les détails de la reservation'>" .
        $AffichageLiaison[$i]['CodeLiaison'] .
        "</a></td>";
        echo "</tr>";
      }
      echo "</table>";
    } else {
      echo "AUCUNE LIAISON<br>";
    }
    ?>
  </section>
</form>