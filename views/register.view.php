<main id="main">
    
    <section class="section-login" style="background-color: #2eca6a;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="assets/images/property-9.jpg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="post" action="Controllers/utilisateurController.php?action=create">

                  <div class="d-flex align-items-center mb-1 pb-1">
                    <span class="h1 mb-0" style="color: #2eca6a">Reservation<span class="color-b"> de salle</span></span>
                  </div>

                  <h5 class="fw-normal mb-2 pb-3" style="letter-spacing: 1px;">Créer votre compte</h5>

                  <div class="form-outline mb-3">
                    <label class="form-label" for="form2Example16">Type de compte</label>
                    <select class="form-control form-select form-control-a" id="Type" name="type">
                      <option name="client">client</option>
                      <option name="proprietaire">proprietaire</option>
                    </select>
                  </div>

                  <div class="form-outline mb-3">
                    <label class="form-label" for="form2Example17">Nom complet</label>
                    <input type="text" required name="nom" id="form2Example17" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline mb-3">
                    <label class="form-label" for="form2Example18">Adresse email</label>
                    <input type="email" required name="email" id="form2Example18" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline mb-3">
                    <label class="form-label" for="form2Example19">Télephone</label>
                    <input type="tel" required name="telephone" id="form2Example19" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline mb-3">
                    <label class="form-label" for="form2Example27">Mot de passe</label>
                    <input type="password" required name="password" id="form2Example27" class="form-control form-control-lg" />
                  </div>

                  <div class="pt-1 mb-3">
                    <input type="submit" class="btn btn-success btn-lg btn-block" style="width:100%" name="register" value="Inscription"/>
                  </div>

                  <p class="mb-4 pb-lg-2" style="color: #393f81;">Vous avez déjà un compte ? 
                  <a href="login.php"class="btn btn-dark">Connectez-vous ici</a></p>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  </main><!-- End #main -->