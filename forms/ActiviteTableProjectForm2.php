<table class="table font-weight-light" style = "font-size:.6em;">
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
      $i = 0;
      foreach ($activites as $activite) {
        echo '<tr>
          <th scope="row">'.$i.'</th>
          <td><input id = "activite_libelle_'.$i.'" type = "text" class = "form-control" value = "'.$activite->getLibelle().' "required /></td>
          <td><input id = "activite_date_'.$i.'" type = "date" class = "form-control" value = "'.$activite->getDateDebut().'" required/></td>
          <td><input id = "activite_duree_'.$i.'" type = "number" value = 0 class = "form-control" value = "'.$activite->getDuree().'" required /></td>
        </tr>';
        $i++;
      }
    ?>

  </tbody>
</table>

<input id = "hidden_activite_libelles" type = "text" name = "activite_libelles" hidden />
<input id = "hidden_activite_dates" type = "text" name = "activite_dates" hidden />
<input id = "hidden_activite_durees" type = "text" name = "activite_durees" hidden />