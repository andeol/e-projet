<table class="table font-weight-light">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Activités</th>
      <th scope="col">Date de début</th>
      <th scope="col">Durée(Jour)</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody id = "table_activite_body">

    <?php 
      if (isset($activites)){
        $i = 0;
        foreach ($activites as $activite) {
          echo '<tr>
            <th scope="row">'.$i.'</th>
            <td><input id = "activite_libelle_'.$i.'" type = "text" class = "form-control" value = "'.$activite->getLibelle().' " readonly required /></td>
            <td><input id = "activite_date_'.$i.'" type = "date" class = "form-control" value = "'.$activite->getDateDebut().'" readonly required/></td>
            <td><input id = "activite_duree_'.$i.'" type = "number" value = 0 class = "form-control" value = "'.$activite->getDuree().'" readonly required /></td>
          </tr>';
          $i++;
        }
      }
      else{
        echo '<tr>
          <th scope="row">0</th>
          <td><input id = "activite_libelle_0" type = "text" class = "form-control" readonly required /></td>
          <td><input id = "activite_date_0" type = "date" class = "form-control" placeholder= "JJ/MM/AAAA" readonly required/></td>
          <td><input id = "activite_duree_0" type = "number" value = 0 class = "form-control" readonly required /></td>
        </tr>';
      }
    ?>

  </tbody>
</table>

<input id = "hidden_activite_libelles" type = "text" name = "activite_libelles" hidden />
<input id = "hidden_activite_dates" type = "text" name = "activite_dates" hidden />
<input id = "hidden_activite_durees" type = "text" name = "activite_durees" hidden />