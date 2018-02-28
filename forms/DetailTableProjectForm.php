<table class="table font-weight-light">
  <thead>
    <tr>
      <th scope="col" >Objectifs </th>
      <th scope="col" >Résultats </th>
      <th scope="col" >Indicateurs </th>
      <th scope="col" >Contraintes </th>
      <th scope="col" ></th>
    </tr>
  </thead>
  <tbody id = "table_detail_body">
    <?php
      if (isset($objectifs)){
        for($i = 0; $i < sizeof($objectifs); $i++) {
          echo '<tr>
          <td><textarea id = "objectif_'.($i).'" type = "text" class = "form-control" required >'.$liste_objectifs[$i]->getLibelle().'</textarea></td>
          <td><textarea id = "resultat_'.($i).'" type = "text" class = "form-control" required >'.$liste_resultats[$i]->getLibelle().'</textarea></td>
          <td><textarea id = "indicateur_'.($i).'" type = "text" class = "form-control" required >'.$liste_resultats[$i]->getIndicateurs().'</textarea></td>
          <td><textarea id = "risque_'.($i).'" type = "text" class = "form-control" required >'.$liste_risques[$i]->getLibelle().'</textarea></td>
        </tr>';
        }
      }
      else{ ?>
        <tr>
          <td><textarea id = "objectif_0" type = "text" class = "form-control" required ></textarea></td>
          <td><textarea id = "resultat_0" type = "text" class = "form-control" required ></textarea></td>
          <td><textarea id = "indicateur_0" type = "text" class = "form-control" required ></textarea></td>
          <td><textarea id = "risque_0" type = "text" class = "form-control" required ></textarea></td>
          <td></td>
        </tr>
      <?php }?>
  </tbody>
</table>

<input id = "hidden_objectifs" type = "text" name = "objectifs" hidden />
<input id = "hidden_resultats" type = "text" name = "resultats" hidden/>
<input id = "hidden_indicateurs" type = "text" name = "indicateurs" hidden/>
<input id = "hidden_risques" type = "text" name = "risques" hidden />




