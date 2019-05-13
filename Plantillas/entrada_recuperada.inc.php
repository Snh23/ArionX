<input type="hidden" id="id_entrada" name="id_entrada" value="<?php echo $id_entrada; ?>">
<div class="form-group">
    <label for="titulo">Titulo</label>
    <input id="titulo" name="titulo" type="text" class="form-control"value="<?php echo $entrada_recuperada -> get_titulo(); ?>">
    <input type="hidden" id="titulo_original" name="titulo_origial" value="<?php echo $validador -> get_titulo(); ?>">
</div>
<div class="form-group">
    <label for="url">URL</label>
    <input id="url" name="url" type="text" class="form-control" value="<?php echo $entrada_recuperada -> get_url(); ?>">
    <input type="hidden" id="url_original" name="url_origial" value="<?php echo $validador -> get_url(); ?>">
</div>
<div class="form-group">
    <label for="texto">Contenido</label>
    <textarea class="form-control" name="texto" id="texto" rows="5"><?php echo $entrada_recuperada -> get_texto(); ?></textarea>
    <input type="hidden" id="texto_original" name="texto_origial" value="<?php echo $validador -> get_texto(); ?>">
</div>
<div class="checkbox">
    <label>
        <input name="publicar" type="checkbox" value="si" <?php if($entrada_recuperada -> are_activa()) echo 'checked' ?>>Marca este cuadro si quieres que la entrada se publique de inmediato
    <input type="hidden" id="publicar_original" name="publicar_original" value="<?php echo $validador -> are_activa(); ?>">
    </label>
</div>
<br>
<div class="form-group text-center">
    <button name="guardar_cambios_entrada" type="submit" class="btn-primary">Guardar</button>
</div>