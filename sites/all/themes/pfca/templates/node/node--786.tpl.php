<?php

/**
 * @file
 * Bartik's theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>>
      <a href="<?php print $node_url; ?>"><?php print $title; ?></a>
    </h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <div class="meta submitted">
      <?php print $user_picture; ?>
      <?php print $submitted; ?>
    </div>
  <?php endif; ?>

  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
      $interlocuteur = views_embed_view('interlocuteurs', 'block_1');
      print $interlocuteur;
    ?>
  </div>


  <?php
/***********************************************************************
 *                             BLOCS                                   *
 **********************************************************************/

        if($node->field_activer_page_bloc['und'][0]['value']){

            $active_trail = menu_get_active_trail();
            $menu_tree = menu_tree($active_trail[1]['menu_name']);

            $actual_node = $node;

            $current_trail = $active_trail[sizeof($active_trail)-1];

            $current = utils_get_menu($current_trail['mlid'],$menu_tree);

            if($current){
                //print '<ul class="menu-section '$class.'">';
                print '<ul class="menu-section">';
                $nb=0;
                foreach($current['#below'] as $key => $item){
                    $nb++;
                    if(is_numeric($key)){

                        $thumb = '';
                        $summary = '';

                        if($item['#original_link']['router_path'] == 'node/%'){
                            $nid = str_replace('node/', '', $item['#original_link']['link_path']);
                            $mynode = node_load($nid);
                        }


                        $url = url(drupal_get_path_alias($item['#href']));
                        print '
                            <li>
                                <a href="' . $url . '">
								 	<div class="right">
								 		<span class="title">' . $item['#title'] . '</span>
                                    </div>
                                </a>
                            </li>';
                        /*if($nb == 3){
                            print '<li class="separateur-pointilles"></li>';
                            $nb = 0;
                        }*/
                    }
                }
                print '</ul>';
            }
        }
    ?>

  <?php
  /*******************************************************************
   *                  Accordéon                                *
  ******************************************************************/
    if(isset($node->field_page_accordeons['und'])): ?>
      <div class="onglets">
        <?php foreach($node->field_page_accordeons['und'] as $block_id): ?>
          <?php
            $block = field_collection_item_load($block_id['value']);
                        if(isset($block->field_accordeon_titre['und']) && $block->field_accordeon_titre['und'][0]['safe_value']):
          ?>
          <div class="onglet-content">
          <h3 <?php if($block->field_accordeon_ouvert['und'][0]['value']==1){print "class='open'";}; ?>><?php print $block->field_accordeon_titre['und'][0]['safe_value']; ?><span class="plus-moins"></span></h3>
          <div class="onglet">
              <?php print $block->field_accordeon_contenu['und'][0]['safe_value']; ?>
              <?php /*if(isset($block->field_accordeon_fichier['und'])): ?>
              <div class="files-list">
                <ul>
                <?php

                    //var_dump($block->field_accordeon_fichier['und']);

                ?>
                <?php foreach($block->field_accordeon_fichier['und'] as $file): ?>
                  <?php
                    $name = (!empty($file['description'])) ? $file['description'] : $file['filename'];
                    //$url = download_file_url($file['fid']);

                    $df = download_form_load((int)$file['fid']);
                    if(!$df){
                      $df['fid'] = $file['fid'];
                      $df['status'] = variable_get('download_form_default',0);
                    }

                    if($df['status']){
                      $url = download_form_url($df['fid']).'?destination='.$_GET['q'];
                    }else{
                      $url = download_form_download_url($df['fid']);
                    }
                    $extension=pathinfo($file['filename'],PATHINFO_EXTENSION);
                    $known_ext = array('jpg','gif','pdf','png','jpeg','xls','xlsx','ppt','pptx','doc','docx','zip','bmp','txt');

                  ?>
                  <li>
                  <?php
                                if(in_array($extension, $known_ext)){
                                            ?>
                                            <img src="<?php print $base_url; ?>/sites/default/themes/neotelecoms/images/<?php print $extension; ?>.png">
                                            <?php
                                    }
                                    else{
                                            ?>
                                            <img src="<?php print $base_url; ?>/sites/default/themes/neotelecoms/images/defaut.png">
                                            <?php
                                    }
                                  ?>
                  <a href="<?php print $url; ?>"><?php print $name; ?></a></li>
                <?php endforeach; ?>
                </ul>
              </div>
              <?php endif; */?>
          </div></div>
                      <?php endif; ?>
                <?php endforeach; ?>
      </div>
  <?php endif; ?>

  <?php
  /*******************************************************************
     *                  BODY SOUS ACCORDEON                            *
     ******************************************************************/

  if(isset($node->field_page_body_accordeon['und'])){
  	print '<div id="body_sous_accordeon">'. $node->field_page_body_accordeon['und'][0]['value'].'</div>';
  }
  ?>

  <?php
    /*******************************************************************
     *                  GALLERIE PHOTOS                                *
     ******************************************************************/
    ?>

    <?php if(isset($node->field_page_galerie_photos['und'])): ?>
    <div class="gallerie">
      <h2>Galerie photo</h2>
     <div class="cont-galerie">
        <ul>
        <?php if(sizeof($node->field_page_galerie_photos['und'])>1) $rel=" rel='next'"; ?>
          <?php foreach($node->field_page_galerie_photos['und'] as $file): ?>
            <?php
              $thumb = theme_image_style(array(
                'style_name' => 'visu_gallerie',
                'path' => $file['uri'],
                'alt' => $file['alt'],
                'title' => $file['title'],
                'width' => 142,
                'height' => 95
              ));

              $url = image_style_url('zoom_galerie', $file['uri']);
            ?>
            <li><a href="<?php print $url; ?>" class="galerie"<?php print $rel; ?> title="<?php print $file['title']; ?>"><?php print $thumb; ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <br style="clear:both;"/>
    <?php endif; ?>

    <?php
    /*******************************************************************
     *                  TELECHARGEMENT                               *
     ******************************************************************/
    ?>

    <?php if(isset($node->field_page_telechargement['und'])): ?>
      <div id="telechargement">
        <h2>Téléchargement</h2>
        <div class="content-telechargement">
          <ul>
            <?php foreach($node->field_page_telechargement['und'] as $telechargement):
              $extension = pathinfo($telechargement['filename'], PATHINFO_EXTENSION);

                    $title_doc = $telechargement['filename'];
                    if(isset($telechargement['description']) && !empty($telechargement['description'])) {
                      $title_doc = $telechargement['description'];
                    }
                    ?><li>
                   <a target="_blank" href="<?php echo download_file_url($telechargement['fid']); ?>">
                 <?php /* <div class="extension"><?php echo $extension;  ?></div> */?>
                     <span class="titre"><?php echo $title_doc; ?></span>
                    <span class="taille">- <strong><?php echo format_size($telechargement['filesize']); ?></strong></span>
                    </a></li>
                    <?php
            endforeach;
            //dpm($node);
            ?>
            <?php if(isset($node->field_ressources_documentaires['und'])):

              $ressources = $node->field_ressources_documentaires['und'];

            ?>

              <?php foreach($ressources as $ressource):

                $target = node_load($ressource['target_id']);

                //$ressource = node_load($node->field_ressources_documentaires['und'][0]['target_id']);
                //
                //dpm($ressource);
                //
                //
                //$doc_ressource = $ressource->field_ressources_fichier['und'];

                // node_load($node->field_ressources_documentaires['und']);

                $doc_ressource = $target->field_ressources_fichier['und'][0];

                $title_ressource = $target->title;
                    if(isset($doc_ressource['description']) && !empty($doc_ressource['description'])) {
                      $title_ressource = $doc_ressource['description'];
                    }
                    ?><li>
                   <a target="_blank" href="<?php echo download_file_url($doc_ressource['fid']); ?>">

                     <span class="titre"><?php echo $title_ressource; ?></span>
                    <span class="taille">- <strong><?php echo format_size($doc_ressource['filesize']); ?></strong></span>
                    </a></li>

              <?php endforeach; ?>

            <?php endif; ?>
          </ul>
        </div>
      </div>

    <?php endif;?>

  <?php
    // Remove the "Add new comment" link on the teaser page or if the comment
    // form is being displayed on the same page.
    if ($teaser || !empty($content['comments']['comment_form'])) {
      unset($content['links']['comment']['#links']['comment-add']);
    }
    // Only display the wrapper div if there are links.
    $links = render($content['links']);
    if ($links):
  ?>
    <div class="link-wrapper">
      <?php print $links; ?>
    </div>
  <?php endif; ?>

  <?php print render($content['comments']); ?>

</div>
