<?php
// dd($moviesList);
?>
<h1 class="result-title">Résultats de la recherche : <span><?= $searchedTerm; ?></span></h1>
<section class="results">

    <?php foreach($moviesList as $movie): ?>
        <a href="<?= $router->generate('movie', ['id' => $movie->getId()]); ?>" class="movie-result">
        <img src="https://image.tmdb.org/t/p/original/<?= $movie->getPosterUrl(); ?>" alt="<?= $movie->getTitle(); ?>">
        <h3>
            <?= $movie->getTitle(); ?>
        </h3>
    </a>
    <?php endforeach; ?>
</section>