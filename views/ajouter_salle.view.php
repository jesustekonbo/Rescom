<section class="probootstrap-section">
    <div class="container">
      <div class="row probootstrap-gutter40">
        <div class="col-md-8">
          <h2 class="mt0">Ajouter une Salle</h2>
          <form action="controllers/salleController.php?action=create" method="post" class="probootstrap-form">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="type_salle">Type de salle</label>
                  <select name="idtype_salle" id="type_salle" class="form-control" required>
                    <option value="" disable selected>Selectionner votre type de salle</option>
                    <?php 
                      $type_salles = $type_salledb->readAll();
                      foreach($type_salles as $type_salle){ 
                    ?>
                    <option value="<?=$type_salle->IDTYPE_DE_SALLE?>"><?=$type_salle->NOM_TYPE_BIEN?></option>
                    <?php
                      } 
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="localite">Localité</label>
                  <select name="idlocalite" id="localite" class="form-control" required>
                    <option value="" disable selected>Selectionner la localité</option>
                    <?php 
                      $localites = $localitedb->readAll();
                      foreach($localites as $localite){ 
                    ?>
                    <option value="<?=$localite->IDLOCALITE ?>"><?=$localite->NOM_LOCALITE?></option>
                    <?php
                      } 
                    ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="idproprietaire">Propriétaire</label>
                  <select name="idproprietaire" id="idproprietaire" class="form-control">
                    <option value="<?=$profil->IDPROPRIETAIRE?>" disable selected><?=$profil->NOM?></option>
                  </select>
                </div>
              </div>
            </div>
                  
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="superficie">superficie</label>
                  <div class="form-field">
                    <i class="icon icon-calendar2"></i>
                    <input type="number" class="form-control" id="superficie" name="superficie" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nbreplace">Nombre de places</label>
                  <div class="form-field">
                    <i class="icon icon-calendar2"></i>
                    <input type="number" class="form-control" id="nbreplace" name="nbreplace" required>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nbrebed">Nombre de Chambres</label>
                  <div class="form-field">
                    <input type="number" class="form-control" id="nbrebed" name="nbrebed" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nbrebath">Nombre de Toilettes</label>
                  <div class="form-field">
                    <input type="number" class="form-control" id="nbrebath" name="nbrebath" required>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="parking">Avez vous un Parking ?</label>
                  <select name="parking" class="form-control" id="parking" required>
                    <option value="non">non</option>
                    <option value="oui">oui</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="prix">Prix journalier de la salle</label>
                  <div class="form-field">
                    <input type="number" class="form-control" id="prix" name="prix" required>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="image">Image de la salle</label>
                  <input type="file" class="form-control" id="image" name="image">
                </div>
              </div>
            </div>

            <div class="form-group">
              <input type="submit" class="btn btn-success btn-lg container" id="submit" name="submit" value="Valider">
            </div>
          </form>
        </div>
        <div class="col-md-4">
          <h2 class="mt0">infos</h2>
          <p>Veuillez saisir correctement vos informations Pour ajouter une salle sur la plateforme ou nous contacter pour plus de detail.</p>
          <p><a href="contact.php" class="btn btn-primary" role="button">Nous contacter</a></p>
        </div>
      </div>
    </div>
  </section>