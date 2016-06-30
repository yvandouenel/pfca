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
  	<div class="top-node">
	<?php
		// Récupération de la vue pour les boutons suivants/précédents
		$view = views_get_view('agenda'); // Id de la vue
		$view->set_display('liste_agenda'); // Id du display
		$view->items_per_page = 0; // Pas de pagniation pour avoir tous les résultats
		$view->execute(); // Execution de la vue

		// Création des boutons suivant/précedent
		$prev = $next = '';
		// Boucle sur les résultats
		foreach($view->result as $index => $row){
	  	// Noeud en cours
	  	if($row->nid == $node->nid){
			// Noeud précédent
			if(isset($view->result[$index - 1])){
		 	 $prev = l('Article précédent', 'node/'.$view->result[$index - 1]->nid, array('attributes' => array('class' => 'prev')));
			}

			// Noeud suivant
			if(isset($view->result[$index + 1])){
		  	$next = l('Article suivant', 'node/'.$view->result[$index + 1]->nid, array('attributes' => array('class' => 'next')));
			}

			// Arret de la boucle
			break;
	  	}
		}
		?>
		<?php
		//teste la provenance:
		if(strstr($_SERVER['HTTP_REFERER'], 'agenda')){
			$href="javascript:history.back();";
		}
		else{
			$href="/agenda";
		}
		?>
		<div class="news-pager">
			<a class="retour-liste" href="<?php print $href; ?>">Retour à l'agenda</a>
			<span class="bt-prec"><?php print $prev ; ?></span>
			<span class="bt-suiv"><?php print $next; ?></span>
		</div>
	</div>


    <?php

      // On affiche la date et le visuel
      $date = $node->field_agenda_date['und'][0]['value'];
	  
      print '<span class="date">'.format_date(strtotime($date),'date_complete');
	  if($node->field_agenda_date['und'][0]['value'] != $node->field_agenda_date['und'][0]['value2']){
		print ' - ' . format_date(strtotime($node->field_agenda_date['und'][0]['value2']),'date_complete');
	  }
	  print '</span>';

      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
      //dpm($node);
      // echo ($node->field_actu_statut['und'][0]['value'] == '0') ? 'public' : 'privÈ';



    /*******************************************************************
     *                  TELECHARGEMENT                               *
     ******************************************************************/
    ?>

    <?php if(isset($node->field_agenda_telechargement['und']) || isset($node->field_ressources_documentaires['und']) || isset($node->field_agenda_telechargement_priv['und'])): ?>
      <div id="telechargement">
        <h2>Téléchargement</h2>
        <div class="content-telechargement">
          <ul>
            <?php
            //Téléchargement fichiers publics
            if(isset($node->field_agenda_telechargement['und'])):
	            foreach($node->field_agenda_telechargement['und'] as $telechargement):
					$extension = pathinfo($telechargement['filename'], PATHINFO_EXTENSION);

					$title_doc = $telechargement['filename'];
					if(isset($telechargement['description']) && !empty($telechargement['description'])) {
						$title_doc = $telechargement['description'];
					}
					?>
					<li>
						<a target="_blank" href="<?php echo download_file_url($telechargement['fid']); ?>">
							<!-- <div class="extension"><?php echo $extension;  ?></div> -->
							<span class="titre"><?php echo $title_doc; ?></span>
							<span class="taille">- <strong><?php echo format_size($telechargement['filesize']); ?></strong></span>
						</a>
					</li>
					<?php
				endforeach;
			endif;
            ?>
            <?php
            //Téléchargement fichiers privés
            if(isset($node->field_agenda_telechargement_priv['und'])):
	            foreach($node->field_agenda_telechargement_priv['und'] as $telechargement):
					$extension = pathinfo($telechargement['filename'], PATHINFO_EXTENSION);

					$title_doc = $telechargement['filename'];
					if(isset($telechargement['description']) && !empty($telechargement['description'])) {
						$title_doc = $telechargement['description'];
					}
					?>
					<li>
						<?php
						if($user->uid):
						?>
						<a target="_blank" href="<?php echo download_file_url($telechargement['fid']); ?>">

							<!-- <div class="extension"><?php echo $extension;  ?></div> -->
							<span class="titre"><?php echo $title_doc; ?></span>
							<span class="taille">- <strong><?php echo format_size($telechargement['filesize']); ?></strong></span>
							<div class="open"></div>
						<?php
						else:
						?>
							<span class="titre"><?php echo $title_doc; ?></span>
							<span class="taille">- <strong><?php echo format_size($telechargement['filesize']); ?></strong></span>
							<div class="close"></div>
						<?php
						endif;
						?>
						<?php
						if($user->uid):
						?>
						</a>
						<?php
						endif;
						?>
					</li>
					<?php
				endforeach;
			endif;
            ?>
            <?php
            //Téléchargement ressources publiques et privées
            if(isset($node->field_ressources_documentaires['und'])):
				$ressources = $node->field_ressources_documentaires['und'];
				foreach($ressources as $ressource):
					$target = node_load($ressource['target_id']);
					$private = 0;
					if($target->field_ressources_fichier['und'][0]){
						$doc_ressource = $target->field_ressources_fichier['und'][0];
					}
					else{
						$private = 1;
						$doc_ressource = $target->field_ressources_fichier_prive['und'][0];
					}

					$title_ressource = $target->title;
				    if(isset($doc_ressource['description']) && !empty($doc_ressource['description'])) {
				      $title_ressource = $doc_ressource['description'];
				    }
				    ?>
				    <li>
				    <?php
						if(($user->uid && $private) || !$private):
						?>
						<a target="_blank" href="<?php echo download_file_url($doc_ressource['fid']); ?>">
						<?php
						endif;
						?>
						   <span class="titre"><?php echo $title_ressource; ?></span>
						   <span class="taille">- <strong><?php echo format_size($doc_ressource['filesize']); ?></strong></span>
						   <?php
							if($private):
								if($user->uid):
								?>
								<div class="open"></div>
								<?php
								else:
								?>
								<div class="close"></div>
								<?php
								endif;
							endif;
						if(($user->uid && $private) || !$private):
						?>
						</a>
						<?php
						endif;
						?>
					</li>
					<?php
				endforeach;
            endif;
            ?>
          </ul>
        </div>
      </div>

    <?php endif;?>


  </div>

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
