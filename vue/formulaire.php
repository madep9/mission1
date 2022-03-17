

  
    <div class="flexbody">
        <nav class="menuLeft item">Menu</nav>
        <section class="content item">
            <form method="post" action="index.php?uc=controler&action=valider">
<label for="">Noméro de visiteur</label>
            <select name="idvisiteur" size="1">
<?php foreach($idVisteurs as $unVisiteur): ?>
<option value="<?php echo $unVisiteur['id'] ?>"><?php echo $unVisiteur['id'] ?></option>
<?php endforeach ?>
</select>
                <p><label for="mois" class="form-label">Mois (2 chiffres) : </label>
                <input type="text" class="form-control" id="mois" name="mois"></p>
              <p> <label for="Année" class="form-label">Année (4 chiffres) : </label>
                <input type="text" class="form-control" id="année" name="annee" ></p>
                <p><label for="Repas midi " class="form-label">Repas midi : </label>
                <input type="text" class="form-control" id="repas midi" name="tab[REP]" ></p>
                <p> <label for="Nuitées" class="form-label">Nuitées : </label>
                <input type="text" class="form-control" id="nuitées" name= "tab[NUI]" ></p>
                <p> <label for="étapes" class="form-label">étapes : </label>
                <input type="text" class="form-control" id="étapes" name="tab[ETP]"></p>
                <p> <label for="Kilomètres" class="form-label">Kilomètres : </label>
                <input type="text" class="form-control" id="Kilomètre" name="tab[KM]"></p>
                <p><button type="submit" class="btn btn-primary">Submit</button></p>

            </form>
      </section>
    </div>


      