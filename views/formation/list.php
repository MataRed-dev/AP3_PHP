<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="container">
    <div class="BtComp" style="text-align:center"> <br>
        <button class="d-lg-inline-block ml-3 btn btn-outline-danger filter-button" data-filter="all">Voir tout</button>
        <?php
        foreach ($competences as $competence) {
            ?>
            <button class="d-lg-inline-block ml-3 btn btn-outline-danger filter-button" data-filter="<?= $competence['LIBELLECOMPETENCE'] ?>" ><?= $competence['LIBELLECOMPETENCE'] ?></button>
            <?php
        }
        ?>
    </div>
    <div class="row pt-5">
        <?php
        foreach ($formations as $formation) {
            ?>

            <div class="col-sm-12 p-3 filter <?php $competences ?>">
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
                </div>
            </div>

            <?php
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
                //$('.filter').removeClass('hidden');
                $('.filter').show('1000');
            }
            else
            {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
                $(".filter").not('.'+value).hide('3000');
                $('.filter').filter('.'+value).show('3000');

            }
        });

    });
</script>