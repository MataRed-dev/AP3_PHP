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
        <button class="d-lg-inline-block ml-3 btn btn-outline-danger"action=''>Sértifffikation</button>
        </div>
        <?php
        foreach($commentaires as $commentaire){
        ?>
            <div class="card card-dark mt-5 p-3">
                <div class="text-light"><?= $commentaire['texteComm']; ?></div>
            </div>
        <?php
        }
        ?>
        <br>
        <form action="/AP3_php/add" method="post" class="add">
            <div class="input-group">
                <input id="comm" name="comm" type="text" class="form-control" placeholder="Met un commentaire" aria-label="My new idea" aria-describedby="basic-addon1"/>
            </div>
        </form>
    </div>
</div>




