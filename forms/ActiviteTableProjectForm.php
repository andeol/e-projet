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
    <tr>
      <th scope="row">0</th>
      <td><input id = "activite_libelle_0" type = "text" class = "form-control" required /></td>
      <td><input id = "activite_date_0" type = "date" class = "form-control" placeholder= "JJ/MM/AAAA" required/></td>
      <td><input id = "activite_duree_0" type = "number" value = '0' class = "form-control" required /></td>
    </tr>
  </tbody>
</table>

<input id = "hidden_activite_libelles" type = "text" name = "activite_libelles" hidden />
<input id = "hidden_activite_dates" type = "text" name = "activite_dates" hidden />
<input id = "hidden_activite_durees" type = "text" name = "activite_durees" hidden />