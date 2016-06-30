<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
 	global $user;
    $fid = null;
    $extension = '';

    $known_ext = array('jpg','gif','pdf','png','jpeg','xls','xlsx','ppt','pptx','doc','docx','zip','bmp','txt');

    $node_ressource = $row->_field_data['nid']['entity'];

    if(isset($node_ressource->field_ressources_fichier['und'][0]['filename'])) {
        $extension = pathinfo($node_ressource->field_ressources_fichier['und'][0]['filename'], PATHINFO_EXTENSION);
        $filesize = $node_ressource->field_ressources_fichier['und'][0]['filesize'];
        $fid = (int)$node_ressource->field_ressources_fichier['und'][0]['fid'];
    }
    elseif(isset($node_ressource->field_ressources_fichier_prive['und'][0]['filename'])) {
        $extension = pathinfo($node_ressource->field_ressources_fichier_prive['und'][0]['filename'], PATHINFO_EXTENSION);
        $filesize = $node_ressource->field_ressources_fichier_prive['und'][0]['filesize'];
        $fid = (int)$node_ressource->field_ressources_fichier_prive['und'][0]['fid'];
    }
?>
<div class="extension">
	<?php if(isset($node_ressource->field_ressources_fichier['und'][0]['filename'])): ?>
    <a href="<?php echo download_file_url($fid) ; ?>">
        <img src="/<?php echo drupal_get_path('theme',$GLOBALS['theme'])."/images/".$extension; ?>.png" alt=".<?php echo $extension;  ?>" />
    </a>
    <?php else: ?>
    	<?php if(in_array('adherents', $user->roles) || in_array('administrator', $user->roles)): ?>
	    <a href="<?php echo download_file_url($fid) ; ?>">
	        <img src="/<?php echo drupal_get_path('theme',$GLOBALS['theme'])."/images/".$extension; ?>.png" alt=".<?php echo $extension;  ?>" />
	    </a>
    	<?php else: ?>
	    <img src="/<?php echo drupal_get_path('theme',$GLOBALS['theme'])."/images/".$extension; ?>.png" alt=".<?php echo $extension;  ?>" />
    	<?php endif; ?>
    <?php endif; ?>
</div>
<?php //dpm($fields); ?>

<?php foreach ($fields as $id => $field): ?>
  <?php if (!empty($field->separator)): ?>
    <?php print $field->separator; ?>
  <?php endif; ?>
  <?php print $field->wrapper_prefix; ?>
    <?php print $field->label_html; ?>
     <?php print $field->content; ?>
  <?php print $field->wrapper_suffix; ?>
<?php endforeach; ?>

<?php if(isset($node_ressource->field_ressources_fichier_prive['und'][0]['filename'])): ?>
<div class="private">
		<?php if(in_array('adherents', $user->roles) || in_array('administrator', $user->roles)): ?>
        <img src="/<?php echo drupal_get_path('theme',$GLOBALS['theme']); ?>/images/open.png" alt="Ressource privée" />
        <?php else: ?>
       <a href="/user?destination=<?php echo substr($_SERVER['REQUEST_URI'], 1) ; ?>"><img src="/<?php echo drupal_get_path('theme',$GLOBALS['theme']); ?>/images/close.png" alt="Ressource privée" /></a>
        <?php endif; ?>
</div>
<?php endif; ?>
<div class="download">
	<?php if(isset($node_ressource->field_ressources_fichier['und'][0]['filename'])): ?>
    <a href="<?php echo download_file_url($fid) ; ?>">
        <img src="/<?php echo drupal_get_path('theme',$GLOBALS['theme']); ?>/images/download.png" alt="Télécharger" />
    </a>
    <?php else: ?>
    	<?php if(in_array('adherents', $user->roles) || in_array('administrator', $user->roles)): ?>
	    <a href="<?php echo download_file_url($fid) ; ?>">
	        <img src="/<?php echo drupal_get_path('theme',$GLOBALS['theme']); ?>/images/download.png" alt="Télécharger" />
	    </a>
    	<?php else: ?>
	    <!-- <img src="/<?php echo drupal_get_path('theme',$GLOBALS['theme']); ?>/images/download.png" alt="Télécharger" /> -->
    	<?php endif; ?>
    <?php endif; ?>
</div>


