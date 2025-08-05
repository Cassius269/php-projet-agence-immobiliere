    <article class="card col-lg-4">
            <img src="<?= $annonce['image'] ?>" alt="">
            <div><?= $annonce['type'] ?></div>
        <div class="card-body">
            <!-- <p id="typeAnnonce"><?= $annonce['type'] ?></p> -->
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title"><?= $annonce['titre'] ?></h2>
                <p class="card-text"><?= $annonce['prix'] ?></p>
            </div>
            <p class="card-text"><?= $annonce['localisation'] ?></p>
            <button class="btn btn-primary">Contact</button>
        </div>
    </article>

