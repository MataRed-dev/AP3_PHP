<div class="d-flex flex-column align-items-center fit-content m-auto">
    <div class="fit-content">
        <div class="frame">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $video['IDENTIFIANTVIDEO']; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="stand">
            <?= $video['LIBELLE'] ?>
        </div>
    </div>
    <div class="w-100">

        <div class="card card-dark mt-5 p-3">
            <div class="text-light"><?= $video['DESCRIPTION'] ?></div>

            <?php
            if (sizeof($competences) > 0) {
                ?>
                <hr class="dropdown-divider">
                <div>
                    <?php
                    foreach ($competences as $competence) {
                        ?>
                        <span class="badge bg-primary"><?= $competence["LIBELLECOMPETENCE"] ?></span>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
        <br>
        <div  style="text-align: center" >
        <form action="./addCertif" method="post" class="add">
            <input name="id" class="form-control" id="texte" value="<?= $_GET['id']?>" hidden>
            <input name="idVideo" class="form-control" id="texte" value="<?= $video['IDFORMATION']?>" hidden>
            <button class="d-lg-inline-block ml-3 btn btn-outline-danger"action=''>Certification</button>
        </form>
        </div>
        <?php
        foreach($commentaires as $commentaire){
        ?>
            <div class="card card-dark mt-5 p-3">
               <div class="text-light">
                    <?= $commentaire['prenomInscrit']; ?>
                    <br>  
                    <?= $commentaire['texteComm']; ?>
                </div>
            </div>
        <?php
        }
        ?>
        <br>
        <form action="./add" method="post" class="add">
            <div class="input-group">
            <input name="comm" class="form-control" id="texte" placeholder="Ajouter un commentaire">
            <input name="id" class="form-control" id="texte" value="<?= $_GET['id']?>" hidden>
            <input name="idVideo" class="form-control" id="texte" value="<?= $video['IDFORMATION']?>" hidden>
            <button type="submit" class="btn btn-primary my-2">Envoyer le commentaire</button>
            </div>
        </form>
    </div>
</div>




