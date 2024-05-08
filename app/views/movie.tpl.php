<?php 
//   dd($actorsList); 
?>
<div class="movie-wrapper">

                <section class="poster">
                    <img src="https://image.tmdb.org/t/p/original/<?= $movie->getPosterUrl();?>" alt="<?= $movie->getTitle();?>">
                    <i class="fa-regular fa-circle-play"></i>
                </section>
                <section class="details">
                    <h1 class="movie-title"><?= $movie->getTitle();?></h1>
                    <div class="movie-meta">
                        <div class="date"><?= substr($movie->getReleaseDate(), 0, 4);?></div>
                        <div class="rating"><i class="fa-solid fa-star"></i> <span><?= $movie->getRating();?></span> / 10</div>
                    </div>
                    <div class="movie-synopsis">
                    <?= $movie->getSynopsis();?>
                    </div>
                    <div class="crew">
                        <div class="real">
                            <h2><i class="fa-solid fa-film"></i> Réalisateur</h2>
                            <?php if(!is_null($director)): ?>
                            <img src="https://image.tmdb.org/t/p/original/<?= $director->getPictureUrl(); ?>" alt="<?= $director->getName(); ?>">
                            <h3><?= $director->getName(); ?></h3>
                            <?php else: ?>
                                <h3>Aucun réalisateur renseigné dans la base de données</h3>
                            <?php endif; ?>
                        </div>
                        <div class="composer">
                            <h2><i class="fa-solid fa-music"></i> Compositeur</h2>
                            <?php if(!is_null($composer)): ?>
                            <img src="https://image.tmdb.org/t/p/original/<?= $composer->getPictureUrl(); ?>" alt="<?= $composer->getName(); ?>">
                            <h3><?= $composer->getName(); ?></h3>
                            <?php else: ?>
                                <h3>Aucun compositeur renseigné dans la base de donnée</h3>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="actors">
                        <h2><i class="fa-solid fa-clapperboard"></i> Acteurs</h2>
                        <ul>
                            <?php foreach($actorsList as $actor): ?>
                            <li>
                                <img src="https://image.tmdb.org/t/p/original/<?= $actor->getPictureUrl(); ?>" alt="<?= $actor->getName(); ?>">
                                <h3><?= $actor->getName(); ?></h3>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </section>
            </div>