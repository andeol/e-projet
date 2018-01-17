<table class="table font-weight-light" style = "font-size:.6em;">
  <thead>
    <tr>
      <th scope="col" style="width: 25%;">Objectifs </th>
      <th scope="col" style="width: 25%;">Résultats </th>
      <th scope="col" style="width: 25%;">Indicateurs </th>
      <th scope="col" style="width: 25%;">Contraintes </th>
    </tr>
  </thead>
  <tbody id = "table_detail_body">

    <?php 
      for($i = 0; $i < sizeof($objectifs); $i++) {
        echo '<tr>
        <td><textarea id = "objectif_'.$i++.'" type = "text" class = "form-control" required >'.$objectifs[$i]->getLibelle().'</textarea></td>
        <td><textarea id = "resultat_'.$i++.'" type = "text" class = "form-control" required >'.$resultats[$i]->getLibelle().'</textarea></td>
        <td><textarea id = "indicateur_'.$i++.'" type = "text" class = "form-control" required >'.$resultats[$i]->getIndicateurs().'</textarea></td>
        <td><textarea id = "risque_'.$i++.'" type = "text" class = "form-control" required >'.$risques[$i]->getLibelle().'</textarea></td>
      </tr>';
      }
    ?>
  </tbody>
</table>

<input id = "hidden_objectifs" type = "text" name = "objectifs" hidden />
<input id = "hidden_resultats" type = "text" name = "resultats" hidden />
<input id = "hidden_indicateurs" type = "text" name = "indicateurs" hidden />
<input id = "hidden_risques" type = "text" name = "risques" hidden />




