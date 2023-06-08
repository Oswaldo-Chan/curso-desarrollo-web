<fieldset>
    <legend>Información del Artículo</legend>

    <label for="title">Titulo:</label>
    <input type="text" id="title" name="article[title]" placeholder="Titulo de la propiedad" value="<?php echo sanitize($article->title); ?>">

    <label for="image">Imagen:</label>
    <input type="file" id="image" accept="image/jpeg, image/png" name="article[image]">
    
    <?php if ($article->image): ?>
        <img src="/img/<?php echo $article->image ?>" class="image-small">
    <?php endif; ?>

    <label for="description">Descripción:</label>
    <textarea id="description" name="article[description]"><?php echo sanitize($article->description); ?></textarea>

    <label for="content">Contenido:</label>
    <textarea id="content" name="article[content]"><?php echo sanitize($article->content); ?></textarea>
</fieldset>

<fieldset>
    <legend>Información adicional del Artículo</legend>

    <label for="author">Autor</label>
    <select name="article[author]" id="author">
        <option selected disabled value="">Seleccione un autor</option>
        <?php foreach($sellers as $author): ?>
            <option <?php echo $article->author == $author->id ? 'selected' : ''; ?> 
            value="<?php echo sanitize($author->id); ?>"><?php echo sanitize($author->name)." ".sanitize($author->surname); ?></option>
        <?php endforeach; ?>
    </select>
    
</fieldset>


