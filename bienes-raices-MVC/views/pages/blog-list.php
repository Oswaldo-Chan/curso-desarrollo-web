<?php foreach($blog as $article): ?>
        <article class="blog-post">
            <div class="image">
                <img loading="lazy" src="/img/<?php echo $article->image ?>" alt="article image">
            </div>

            <div class="text-post">
                <a href="/article?id=<?php echo $article->id ?>">
                    <h4><?php echo $article->title ?></h4>
                    <p class="meta-info">Escrito el: <span><?php echo $article->date ?></span> por: 
                    <span>
                        <?php foreach($sellers as $seller): ?>
                            <?php if($seller->id == $article->author): ?>
                                <?php echo $seller->name." ".$seller->surname; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </span></p>
                    
                    <p><?php echo $article->description ?></p>
                </a>
            </div>
        </article>
    <?php endforeach; ?>