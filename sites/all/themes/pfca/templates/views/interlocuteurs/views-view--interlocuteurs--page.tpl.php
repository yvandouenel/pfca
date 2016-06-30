<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */

if($_GET['prov']){
	$mynode = node_load($_GET['prov']);
	$body = $mynode->body['und'][0]['value'];
}

if(isset($mynode->title)){ ?>
	<a id="bloc_push_actu" href="/actualites">
	<h2>Retrouvez<br>toutes les actualités</h2>
	<!-- <span><?php echo $mynode->title; ?></span> -->
	</a>
	<?php if(isset($body)){ ?>
		<div class="field field-name-body field-type-text-with-summary field-label-hidden">
			<div class="field-items">
				<div class="field-item even">
					<?php echo $body; ?>
				</div>
			</div>
		</div>
	<?php } ?>
<?php
}
?>

<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
    <div class="view-header">
      <?php print $header; ?>
    </div>
  <?php endif; ?>

  <div class="gmap">
  <?php
  	$results = views_get_view_result('interlocuteurs', 'page_1');
  	$nodes = array();
  	foreach($results as $result){
  		//dpm($result);
  		array_push($nodes,$result->nid);
  	}
  	if(!empty($nodes)){
  		$nodes = implode('+',$nodes);
  		//dpm($nodes);
  		print views_embed_view('gmap_interlocuteur', 'block',$nodes);
	}
	else{
		print views_embed_view('gmap_interlocuteur', 'block');
	}
	//print views_embed_view('gmap_interlocuteur', 'block');
  ?>
  <a href="<?php print url('node/45'); ?>" class="modification">Adhérent, signalez une modification</a>
  </div><!-- /gmap -->

  <?php if ($exposed): ?>
    <div class="view-filters">
      <?php print $exposed; ?>
    </div>
  <?php endif; ?>

  <div id="bloc-vert">
  	<h3>Consultez</h3>La carte des zones de revitalisation rurale
  	<a href="/content/la-carte-des-zones-de-revitalisation-rurale">Cliquez-ici</a>
  </div>

  <div id="bloc-orange">
  	<h3>Consultez</h3>La carte des quartiers prioritaires de la politique de la ville
  	<a href="/content/la-carte-des-quartiers-populaires-de-la-politique-de-la-ville">Cliquez-ici</a>
  </div>

  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>

  <?php if ($rows): ?>
    <div class="view-content">
      <?php print $rows; ?>
    </div>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>

  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

</div><?php /* class view */ ?>