<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="container">
    <div class="BtComp" style="text-align: center">
        <br><button class="d-lg-inline-block ml-3 btn btn-outline-danger filter-button" data-filter="all">Voir tout</button>
        <?php
        foreach ($competencesA as $competence) {
            ?>
            <button class="d-lg-inline-block ml-3 btn btn-outline-danger filter-button" data-filter="<?= $competence['LIBELLECOMPETENCE'] ?>" ><?= $competence['LIBELLECOMPETENCE'] ?></button>
            <?php
        }
        ?>
    </div>
    <div class="row pt-5">
        <?php
        $cpt=0;
        foreach ($formations as $formation) {
            ?>

            <div class="col-sm-12 p-3n filter
            <?php
            foreach ($competenceByVideos[$cpt] as $competenceByVideo[$cpt]) {
                echo $competenceByVideo[$cpt]['LIBELLECOMPETENCE']." ";
            }
            ?>">
                <div class="card card-hover">
                    <div class="card-body d-flex">
                        <div class="p-3">
                            <img class="preview-image" src="<?= $formation["IMAGE"] ?>">
                        </div>
                        <div class="p-3 flex-grow-1">
                            <h5 class="mb-0 pb-0"><?= $formation['LIBELLE']; ?></h5>
                            <p><?= $formation['DESCRIPTION'] ?></p>
                            <a href="./tv?id=<?= $formation['IDENTIFIANTVIDEO'] ?>" class="btn btn-outline-primary">Voir la formation →</a>
                        </div>
                    </div>
                </div><br>
            </div>

            <?php

        $cpt++;
        }
        ?>
    </div>
</div>

<script>
    $(document).ready(function(){

        $(".filter-button").click(function(){
            var value = $(this).attr('data-filter');

            if(value == "all")
            {
                $('.filter').show('1000');
            }
            else
            {
                $(".filter").not('.'+value).hide('3000');
                $('.filter').filter('.'+value).show('3000');

            }
        });

    });
</script>