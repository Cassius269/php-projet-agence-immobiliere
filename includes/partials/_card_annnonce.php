    <article class="card col-lg-4 m-auto">
            <img src="<?= $annonce['image'] ?>" alt="">
            <div><?= $annonce['transactionType'] ?></div>
        <div class="card-body">
            <!-- <p id="typeAnnonce"><?= $annonce['type'] ?></p> -->
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title"><?= $annonce['title'] ?></h2>
                <p class="card-text"><?= $annonce['price'] ?></p>
            </div>
            <p class="card-text"><?= $annonce['localisation'] ?></p>
            <p class="card-text"><?= $annonce['description'] ?></p>
            <button class="btn btn-primary">Contact</button>
        </div>
    </article>

