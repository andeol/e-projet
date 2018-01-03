<table id = "table_activities" class="table font-weight-light" style = "font-size:.6em;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Activités</th>
      <th scope="col">Date de début</th>
      <th scope="col">Durée(Jour)</th>
    </tr>
  </thead>
  <tbody id = "table_activities_body">
    <tr>
    	<th scope="row">1</th>
    	<td><input type = "text" class = "form-control" /></td>
    	<td><input type = "text" class = "form-control" placeholder= "JJ/MM/AAAA"/></td>
    	<td><input type = "text" class = "form-control" /></td>
    </tr>
    <tr>
      <th scope="row">1</th>
      <td><input type = "text" class = "form-control" /></td>
      <td><input type = "text" class = "form-control" placeholder= "JJ/MM/AAAA"/></td>
      <td><input type = "text" class = "form-control" /></td>
    </tr>
  </tbody>
</table>


<!-- Modal to register the new activity -->
<div class="modal fade" id="addActiviteModal" tabindex="-1" role="dialog" aria-labelledby="addActiviteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addActiviteModalLabel"> Nouvelle activité </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class = "form-row">
            <label for="" style = "font-size:.6em;">Libellé</label>
            <input type="text" class="form-control" placeholder="Libellé">
          </div>

          <div class = "form-row">
            <label for="" style = "font-size:.6em;">Date de début</label>
            <input type="text" class="form-control" placeholder="JJ/MM/AAAA">
          </div>

          <div class = "form-row">
            <label for="" style = "font-size:.6em;">Durée</label>
            <input type="text" class="form-control" placeholder="Durée">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-success">Ajouter</a>
      </div>
    </div>
  </div>
</div>