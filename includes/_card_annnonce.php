<article class="card">
        <img src="<?= $annonce['image'] ?>" alt="">
    <div class="card-body">
        <p class="d-flex "><?= $annonce['type'] ?></p>
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="card-title"><?= $annonce['titre'] ?></h2>
            <p class="card-text"><?= $annonce['prix'] ?></p>
        </div>
        <p class="card-text"><?= $annonce['localisation'] ?></p>
        <button class="btn btn-primary">Contact</button>
    </div>
</article>

<!---
    display: flex
;
    background: grey;
    justify-content: end;
    position: relative;
    bottom: 2.5rem;
    /* width: 100%; */
    left: 1rem;
-->