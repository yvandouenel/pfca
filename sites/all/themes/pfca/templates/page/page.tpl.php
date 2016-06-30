<?php

/**
 * @file
 * Bartik's theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template normally located in the
 * modules/system directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $hide_site_name: TRUE if the site name has been toggled off on the theme
 *   settings page. If hidden, the "element-invisible" class is added to make
 *   the site name visually hidden, but still accessible.
 * - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
 *   theme settings page. If hidden, the "element-invisible" class is added to
 *   make the site slogan visually hidden, but still accessible.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['featured']: Items for the featured region.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['triptych_first']: Items for the first triptych.
 * - $page['triptych_middle']: Items for the middle triptych.
 * - $page['triptych_last']: Items for the last triptych.
 * - $page['footer_firstcolumn']: Items for the first footer column.
 * - $page['footer_secondcolumn']: Items for the second footer column.
 * - $page['footer_thirdcolumn']: Items for the third footer column.
 * - $page['footer_fourthcolumn']: Items for the fourth footer column.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see bartik_process_page()
 * @see html.tpl.php
 */
 global $user;
?>
<div id="page-wrapper"><div id="page">

  <div id="header" class="<?php print $secondary_menu ? 'with-secondary-menu': 'without-secondary-menu'; ?>">
    	<div class="wrapper-container">
        	<!--<h1 id="site-name"<?php if (isset($hide_site_name) && $hide_site_name) { print ' class="element-invisible"'; } ?>>
          		<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
        	</h1>-->

        	<div class="section clearfix">
            	<div class="top_header">
            		<?php if($user->uid): ?>
            		<a href="/user/logout" id="btn-espace-adherent-logged"><?php print $user->name; ?></a>
            		<?php else: ?>
            		<a href="/user" id="btn-espace-adherent">Espace adhérent</a>
            		<?php endif; ?>
                	<div class="liens-top">
                    	<ul>
                        	<li id="lien-actualites">
                            	<a href="/actualites">Toutes les actualités</a>
                        	</li>
                        	<li id="lien-agenda">
                            	<a href="/agenda">Tout l'agenda</a>
                        	</li>
                        	<?php if ( $user->uid ): ?>
	                        	<li id="lien-newsletter">
	                            	<a href="<?php echo url('node/776'); ?>">Newsletter</a>
	                        	</li>
                        	<?php endif; ?>
                    	</ul>
                	</div>
					<?php print render($page['header']); ?>
            	</div>
            	<div class="top-menu">
                	<?php print render($page['menu']);?>
					<?php if ($logo): ?>
						<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
							<!--<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />-->
						</a>
					<?php endif; ?>
            	</div>
        	</div>
        </div>
    </div> <!-- /.section, /#header -->

  <?php if ($messages): ?>
    <div id="messages"><div class="section clearfix">
      <?php print $messages; ?>
    </div></div> <!-- /.section, /#messages -->
  <?php endif; ?>

  <div id="main-wrapper" class="clearfix"><div id="main" class="clearfix">
	<div id="tetiere-wrapper"></div>
    <?php if ($breadcrumb): ?>
    	<div id="wrapper-breadcrumb">
      		<div id="breadcrumb"><?php print $breadcrumb; ?></div>
		</div>
    <?php endif; ?>
		<div id="conteneur">
		<?php if((isset($node) && (!$node->field_activer_page_bloc['und'][0]['value'] && $node->type == "page")) || !isset($node) || (isset($node) && $node->type != "page")): ?>

	    	<?php if ($page['sidebar_first'] || arg(0)=="agenda" || arg(0)=="actualites" || arg(0)=="ressources-documentaires"): ?>
	      	<div id="sidebar-first" class="column sidebar"><div class="section">
	        	<?php
	          	$menu_sidebar = block_load('menu_block', '2');
	          	print drupal_render(_block_get_renderable_array(_block_render_blocks(array($menu_sidebar))));
	          	?>

	          	<?php if($node->type == 'page' && isset($node->field_saviez_vous['und'][0]['value'])): ?>
	          	<div id="saviez_vous">
	            	<h2>Le saviez-vous ?</h2>
	            	<p><?php print $node->field_saviez_vous['und'][0]['value']; ?></p>
	            	<?php if($node->field_page_lien_saviez_vous['und'][0]['display_url'] != "") { ?><a href="<?php print $node->field_page_lien_saviez_vous['und'][0]['display_url']; ?>" title="En savoir plus" class="plus">+</a> <?php } ?>
	          	</div>
	          	<?php endif; ?>

	        	<?php print render($page['sidebar_first']); ?>



	      	</div></div> <!-- /.section, /#sidebar-first -->
	    	<?php endif; ?>
    	<?php endif; ?>

      	<div id="content" class="column<?php if(isset($node) && $node->field_activer_page_bloc['und'][0]['value']) print ' bloc'; ?>"><div class="section">
            <a id="main-content"></a>
            <?php print render($title_prefix); ?>
            <?php if ($title && $node->type != 'interlocuteur'): ?>
              <h1 class="title" id="page-title">
		  <?php
		  if ( $node->type =='agenda' ):
			print $node->title;
		  else:
			print $title;
		  endif;
		?>
              </h1>
            <?php endif; ?>
            <?php print render($title_suffix); ?>
            <?php if ($tabs): ?>
              <div class="tabs">
                <?php print render($tabs); ?>
              </div>
            <?php endif; ?>
            <?php if ($action_links): ?>
              <ul class="action-links">
                <?php print render($action_links); ?>
              </ul>
            <?php endif; ?>
            <?php print render($page['content']); ?>
            <div class="clearfix"></div>
      </div></div> <!-- /.section, /#content -->
      </div><!-- /conteneur -->


      <div id="push_connexion" class="interne">
      	<div id="push-container">
				<span class="big">Adhérent</span>
				<span>Pour accéder à l'ensemble des actualités du réseau</span>
				<a href="/user" title="Connectez-vous">Connectez-vous</a>
      	</div>
      </div>

      <div id="wrapper-bloc-sliders">
      <div id="bloc-sliders">
          <?php
          /**
           * Chargement de la vue Actualités - Display : Block
           */
          $view = views_get_view('actualites');
          $view->set_display('block');
          // Si on est sur un node
          if($node) {
              $tags = 'all';
              // Si le noeud contient des tags
              if(isset($node->field_tag[LANGUAGE_NONE])) {
                  $tags = array();
                  foreach($node->field_tag[LANGUAGE_NONE] as $tag) {
                      $tags[] = $tag['tid'];
                  }
                  $tags = implode('+', $tags);
              }
              // Passage des filtres contextuels à la vue
              $view->set_arguments(array(
                  $node->nid,
                  $tags,
              ));
          }

          $view->pre_execute();
          $view->execute();

          // Sur un noeud, si la vue n'a pas de résultats avec les filtres contextuels
          // il faut la ré-exécuter sans les filtres
          if(count($view->result) == 0 && $node) {
              // Il faut re-créer la vue complètement, sinon le comportement est imprévisible
              $view = views_get_view('actualites');
              $view->set_display('block');
              $view->set_arguments(array());
              $view->pre_execute();
              $view->execute();
          }

          // S'il y a des résultats on affiche la div
          if(count($view->result) > 0) {
          ?>
          <div id="actualite">
              <h2>Actualités</h2>
              <?php print $view->render(); ?>
              <a class="tout" href="/actualites">Toutes les actualités</a>
          </div>
          <?php
          }
          unset($view);
          /**
           * Chargement de la vue Agenda - Display : Block
           */
          $view = views_get_view('agenda');
          $view->set_display('block');
          // Si on est sur un node
          if($node) {
              $tags = 'all';
              // Si le noeud contient des tags
              if(isset($node->field_tag[LANGUAGE_NONE])) {
                  $tags = array();
                  foreach($node->field_tag[LANGUAGE_NONE] as $tag) {
                      $tags[] = $tag['tid'];
                  }
                  $tags = implode('+', $tags);
              }
              // Passage des filtres contextuels à la vue
              $view->set_arguments(array(
                  $node->nid,
                  $tags,
              ));
          }

          $view->pre_execute();
          $view->execute();

          // Sur un noeud, si la vue n'a pas de résultats avec les filtres contextuels
          // il faut la ré-exécuter sans les filtres
          if(count($view->result) == 0 && $node) {
              $view = views_get_view('agenda');
              $view->set_display('block');
              $view->set_arguments(array());
              $view->pre_execute();
              $view->execute();
          }

          // S'il y a des résultats on affiche la div
          if(count($view->result) > 0) {
          ?>
          <div id="agenda">
              <h2>Agenda</h2>
              <?php print $view->render(); ?>
              <a class="tout" href="/agenda">Toutes les dates de l'agenda</a>
          </div>
          <?php
          }
          unset($view);
          ?>

            <?php /*if (views_get_view_result('actualites', 'block')){ ?>
                <div id="actualite">
                    <h2>Actualités</h2>
                    <!--<a href="/flux-actualites" title="Abonnez-vous au flux RSS de nos actualités">Flux RSS</a>-->
                    <?php
                    if($node) {
                        $tags = array();
                        if(isset($node->field_tag[LANGUAGE_NONE])) {
                            foreach($node->field_tag[LANGUAGE_NONE] as $tag) {
                                $tags[] = $tag['tid'];
                            }
                        }
                        $tags = implode('+', $tags);

                        $actualites = views_embed_view('actualites', 'block', $node->nid, $tags);
                    }
                    else {
                        $actualites = views_embed_view('actualites', 'block');
                    }
                    print $actualites;
                    ?>
                    <a class="tout" href="/actualites">Toutes les actualités</a>
                </div> <!-- /actualites -->
            <?php } ?>
            <?php if (views_get_view_result('agenda', 'block')){ ?>
                <div id="agenda">
                    <h2>Agenda</h2>
                    <!--<a href="/flux-agenda" title="Abonnez-vous au flux RSS de notre agenda">Flux RSS</a>-->
                    <?php
                    if($node) {
                        $agenda = views_embed_view('agenda', 'block', $node->nid);
                    }
                    else {
                        $agenda = views_embed_view('agenda', 'block');
                    }
                    print $agenda;
                    ?>
                    <a class="tout" href="/agenda">Toutes les dates de l'agenda</a>
                </div> <!-- /agenda -->
            <?php }*/ ?>
            <?php if (views_get_view_result('page_atterrissage', 'block')){ ?>
                <div id="pages_visites">
                	<h2>Nos pages<br />les + visitées</h2>
                    <?php
                    $page_atterrissage = views_embed_view('page_atterrissage', 'block');
                    print $page_atterrissage;
                    ?>
                </div> <!-- /pages les plus visitées -->
            <?php } ?>
      </div> <!-- /bloc sliders -->
      </div><!-- /wrapper bloc sliders -->

  </div></div> <!-- /#main, /#main-wrapper -->

    <div id="footer-wrapper"><div class="section">
      <div id="footer-columns" class="clearfix">
      	<div id="bloc-addthis-et-partenaires">
      		<!-- AddThis Button BEGIN -->
			<div class="addthis_toolbox addthis_default_style">
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_counter addthis_pill_style"></a>
			</div>
			<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
			<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4e3baf4267c5b8c9"></script>
			<!-- AddThis Button END -->
      		<div id="bloc-projet-cofinance">
      			<h2>Projet cofinancé par</h2>
      			<a href="http://travail-emploi.gouv.fr/" id="ddtfp" target="_blank"></a>
      			<a href="http://www.herault.fr/" id="dpt-herault" target="_blank"></a>
      			<a href="http://europa.eu/index_fr.htm" id="eu" target="_blank"></a>
      			<a href="http://www.europe-en-france.gouv.fr/L-Europe-s-engage" id="europe-engage" target="_blank"></a>
      		</div>
      	</div>
        <?php
          $bloc_edito_footer = block_load('block', '3');
          print drupal_render(_block_get_renderable_array(_block_render_blocks(array($bloc_edito_footer))));
        ?>
        <div id="bloc-liens-utiles-et-contact">
        	<?php
          		// print render($page['footer_top']);
          		$menu_footer = block_load('menu_block', '3');
          		print drupal_render(_block_get_renderable_array(_block_render_blocks(array($menu_footer))));
        	?>
        	<div id="bloc-contact-direct">
        		<h2>Contact direct</h2>
        		<a href="mailto:contact@pfca34.org">contact@pfca34.org</a>
        	</div>
        </div>
      </div> <!-- /#footer_top -->

      <div id="footer" class="clearfix">
        <?php
          print render($page['footer_bot']);

        ?>
      </div> <!-- /#footer_bot -->

  </div></div> <!-- /.section, /#footer-wrapper -->

</div></div> <!-- /#page, /#page-wrapper -->
