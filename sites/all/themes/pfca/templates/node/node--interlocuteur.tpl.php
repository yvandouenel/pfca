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

  <h1><?php print $node->title; ?></h1>
  <a href="javascript:history.back();" id="retour_liste_resultats">Retourner<br/> à la liste des résultats</a>
  <!--<script>
  $(document).ready(function() {
    $(.printMe').click(function() {
      window.print();
      return false;
    });
    $("#backLink").click(function(event) {
      event.preventDefault();
      history.back(1);
    });
  });
  </script>-->

  <?php if ($display_submitted): ?>
    <div class="meta submitted">
      <?php print $user_picture; ?>
      <?php print $submitted; ?>
    </div>
  <?php endif; ?>

  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php
      //dpm($node);

      ?>

      <div id="coordonnees">
        <div class="infos">
          <h2>Coordonnées</h2>
          <a href="javascript:window.print();" title="Cliquez-ici pour imprimer la fiche" class="printMe">Imprimer la fiche</a>
          <!-- Logo cliquable si URL -->
          <?php if(isset($node->field_site['und'])): ?>
          <a href="<?php print $node->field_site['und'][0]['url']; ?>" title="<?php print $node->field_site['und'][0]['title']; ?>" target="_blank" class="logo_organisme">
            <?php if(isset($node->field_visuel['und'])):

              $img = $node->field_visuel['und'][0];

              $logo = theme_image_style(array(
                'style_name' => '200x160',
                'path' => $img['uri'],
                'alt' => $img['alt'],
                'title' => $img['title'],
                'width' => 200,
                'height' => 160
              ));

            ?>
              <?php print $logo; ?>

            <!-- Image par défaut si pas de logo -->
            <?php else: ?>
              <?php global $theme_path;

                $image_folder = '/'.$theme_path.'/images/';

              ?>
              <img src="<?php print $image_folder; ?>logo_default.png" alt="Logo">
            <?php endif; ?>
          </a>
          <!-- Sinon juste une div avec le logo -->
          <?php else: ?>
            <div class="logo_organisme">
              <?php if(isset($node->field_visuel['und'])):

                $img = $node->field_visuel['und'][0];

                $logo = theme_image_style(array(
                  'style_name' => '200x160',
                  'path' => $img['uri'],
                  'alt' => $img['alt'],
                  'title' => $img['title'],
                  'width' => 200,
                  'height' => 160
                ));

              ?>
              <?php print $logo; ?>

              <!-- Image par défaut si pas de logo -->
              <?php else: ?>
              <?php global $theme_path;

                $image_folder = '/'.$theme_path.'/images/';

              ?>
              <img src="<?php print $image_folder; ?>logo_default.png" alt="Logo">
            <?php endif; ?>
            </div>
          <?php endif; ?>
          <div class="adresse">
          <h2>Adresse :</h2>
            <?php

              print '<span class="infos-int interlocuteur-coordonnees">'.$node->field_adresse['und'][0]['street'].'</span>';
              print '<span class="infos-int additional">'.$node->field_adresse['und'][0]['additional'].'</span>';
              print $node->field_adresse['und'][0]['postal_code'].'&nbsp;';
              print $node->field_adresse['und'][0]['city'];

            ?>
          </div>
          <div class="clearfix"></div>
          <div class="complements">
          	<?php if($node->field_tel['und'][0]['value']): ?>
            <span><b>Téléphone :</b></span> <?php print $node->field_tel['und'][0]['value']; ?><br>
            <?php endif; ?>
          	<?php if($node->field_fax['und'][0]['value']): ?>
            <span><b>Fax :</b></span> <?php print $node->field_fax['und'][0]['value']; ?><br>
            <?php endif; ?>
          	<?php if($node->field_email['und'][0]['email']): ?>
            <span><b>Email :</b></span> <a href="mailto:<?php print $node->field_email['und'][0]['email']; ?>" title="Envoyez leur un mail" rel="nofollow"><?php print $node->field_email['und'][0]['email']; ?></a><br>
            <?php endif; ?>
          	<?php if($node->field_site['und'][0]['url']): ?>
            <span><b>Site web :</b></span> <a href="<?php print $node->field_site['und'][0]['url']; ?>" title="<?php print $node->field_site['und'][0]['title']; ?>" target="_blank"><?php print $node->field_site['und'][0]['url']; ?></a>
            <?php endif; ?>
          </div>
        </div><!-- /infos -->
        <div class="gmap">
	      <?php
			//$block = block_load('views', 'gmap_interlocuteur-block',);
			//print drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
			print views_embed_view('gmap_interlocuteur', 'block', $node->nid);
		  ?>
          <a href="<?php print url('node/45'); ?>" class="modification">Adhérent, signalez une modification</a>
        </div><!-- /gmap -->
      </div><!-- /coordonnées -->


      <div id="bloc-caracteristiques">
      		<div id="c-carousel">
				<div id="wrapper">
					<div id="pager"></div>
					<div id="carousel">
						<?php if($node->field_structure['und']): ?>
						<div class="slide first">
							<h3>Structure</h3>
							<?php print $node->field_structure['und'][0]['value']; ?>
						</div>
						<?php endif; ?>
						<?php if($node->field_equipe_technique['und'] && (in_array('adherents', $user->roles) || in_array('administrator', $user->roles))): ?>
						<div class="slide">
							<h3>Equipe technique</h3>
							<?php print $node->field_equipe_technique['und'][0]['value']; ?>
						</div>
						<?php endif; ?>
						<?php if($node->field_secteurs_d_activites['und']): ?>
						<div class="slide">
							<h3>Secteurs d'activités</h3>
							<?php print $node->field_secteurs_d_activites['und'][0]['value']; ?>
						</div>
						<?php endif; ?>
						<?php if($node->field_territoires_d_intervention['und']): ?>
						<div class="slide">
							<h3>Territoires d'interventions</h3>
							<?php print $node->field_territoires_d_intervention['und'][0]['value']; ?>
						</div>
						<?php endif; ?>
						<?php if($node->field_public['und']): ?>
						<div class="slide">
							<h3>Public</h3>
							<?php print $node->field_public['und'][0]['value']; ?>
						</div>
						<?php endif; ?>
						<?php if($node->field_modalites_d_accueil['und']): ?>
						<div class="slide">
							<h3>Modalités d'accueil</h3>
							<?php print $node->field_modalites_d_accueil['und'][0]['value']; ?>
						</div>
						<?php endif; ?>
						<?php if($node->field_prestations_2['und']): ?>
						<div class="slide">
							<h3>Prestations</h3>
							<?php print $node->field_prestations_2['und'][0]['value']; ?>
						</div>
						<?php endif; ?>
						<?php if($node->field_actions['und']): ?>
						<div class="slide">
							<h3>Actions</h3>
							<?php print $node->field_actions['und'][0]['value']; ?>
						</div>
						<?php endif; ?>
						<?php if($node->field_competences['und'] && (in_array('adherents', $user->roles) || in_array('administrator', $user->roles))): ?>
						<div class="slide">
							<h3>Compétences</h3>
							<?php print $node->field_competences['und'][0]['value']; ?>
						</div>
						<?php endif; ?>
						<?php if($node->field_particularites['und'] && (in_array('adherents', $user->roles) || in_array('administrator', $user->roles))): ?>
						<div class="slide">
							<h3>Particularités</h3>
							<?php print $node->field_particularites['und'][0]['value']; ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
      		</div>
      	</div>


      <?php

      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      // print render($content);



      // print ($node->field_statut['und'][0]['value'] == '0') ? 'public' : 'privé';


    ?>

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
