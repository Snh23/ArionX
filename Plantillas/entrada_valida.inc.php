<div class="form-group">
    <label for="titulo">Titulo</label>
    <input id="titulo" name="titulo" type="text" class="form-control" placeholder="Titulo pro" <?php $validador->mostrar_titulo(); ?>>
    <?php $validador->mostrar_error_titulo(); ?>
</div>
<div class="form-group">
    <label for="url">URL</label>
    <input id="url" name="url" type="text" class="form-control" placeholder="No usar espacios" <?php $validador->mostrar_url(); ?>>
    <?php $validador->mostrar_error_url(); ?>
</div>
<div class="form-group">
    <label for="texto">Texto</label>
    <textarea class="form-control" name="texto" id="texto" rows="5" placeholder="Escribe aqui tu articulo"><?php $validador->mostrar_texto(); ?></textarea>
    <?php $validador->mostrar_error_texto(); ?>
</div>
<div class="checkbox">
    <label>
        <input name="publicar" type="checkbox" value="si" <?php if ($entrada_publica) echo 'checked'; ?>>Marca este cuadro si quieres que la entrada se publique de inmediato
    </label>
</div>
<br>
<div class="form-group text-center">
    <button name="enviar" type="submit" class="btn-primary">Guardar</button>
</div>