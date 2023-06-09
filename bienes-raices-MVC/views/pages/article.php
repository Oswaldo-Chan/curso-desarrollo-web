<main class="container section content-center">
    <h1><?php echo $article->title?></h1>

    <img loading="lazy" src="/img/<?php echo $article->image?>" alt="article image">

    <p class="meta-info">Escrito el: <span><?php echo $article->date ?></span> por: 
    <span>
        <?php foreach($sellers as $seller): ?>
            <?php if($seller->id == $article->author): ?>
                <?php echo $seller->name." ".$seller->surname; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </span></p>

    <div class="property-summary">
        <p><?php echo $article->description?></p>

        <p><?php echo $article->content?></p>
    </div>
</main>