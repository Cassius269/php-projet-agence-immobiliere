    <article class="card col-lg-3" style="height: 551px;">
            <img src="<?= $annonce['image_url'] ?>" alt="">
            <div><?= $annonce['transaction_type'] ?></div>
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title"><?= $annonce['title'] ?></h2>
                <?php if($annonce['transaction_type'] == 'location') : ?>
                    <p class="card-text fst-italic"><?= $annonce['price'] ?> €/mois</p>
                <?php elseif($annonce['transaction_type'] == 'vente') : ?>
                    <p class="card-text fst-italic"><?= $annonce['price'] ?> €</p>                
                <?php endif; ?>
            </div>
            <p class="card-text"><?= $annonce['city'] ?></p>
            <p class="card-text"><?= $annonce['description'] ?></p>
            <button class="btn btn-primary">Contact</button>
        </div>
    </article>

