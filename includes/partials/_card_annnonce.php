    <article class="card col-lg-3">
            
        <?php if(isset($_SESSION)) : ?>
            <a href="/pages/delete_real_estate_announcement.php?id=<?= $annonce['id'] ?>">
                    <button class="border-0">
                        <img class="deleteIcon" src="/assets/images/delete-icon.svg" alt="" width="40px">
                    </button>
            </a>
        <?php endif; ?>
            <img src="<?= $annonce['image_url'] ?>" alt="">
            <div><?= $annonce['transaction_type'] ?></div>
        <div class="card-body d-flex flex-column justify-content-between">
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
            <div class="d-flex justify-content-between">
                <button class="btn btn-primary">Contact</button>
                <button class="buttonIcone">
                    <i class="bi bi-heart bg-warning rounded-circle p-3"></i>
                </button>
            </div>
        </div>
    </article>

