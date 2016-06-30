 <table width="650" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td width="650" height="20"></td>
    </tr>
  </table>
  <table width="650" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td width="650" height="99" bgcolor="#FFFFFF">
        <a href="http://www.pfca34.org" target="_blank" style="display: block;">
          <img border="0" src="/sites/all/themes/pfca/images/newsletter/header.gif" width="650" height="99" alt="PFCA34 - La Newsletter" style="display: block;"/>
        </a>
      </td>
    </tr>
  </table>
  <table width="650" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td width="650" height="20" colspan="3" bgcolor="#e56630">
        <img border="0" src="/sites/all/themes/pfca/images/newsletter/bandeau_top.gif" width="650" height="20" style="display: block;"/>
      </td>
    </tr>
    <tr>
      <td width="20" height="45" bgcolor="#e56630"></td>
      <td width="312" height="45" bgcolor="#e56630" style="color: #FFFFFF;font-family: Arial, sans-serif;font-weight: bold;font-size: 21px;line-height: 21px;text-transform: uppercase;vertical-align: top;">
      <?php echo $node->title; ?>
      </td>
      <td width="318" height="45" bgcolor="#e56630">
        <img border="0" src="/sites/all/themes/pfca/images/newsletter/bandeau_right.gif" width="318" height="45" style="display: block;"/>
      </td>
    </tr>
    <tr>
      <td width="650" height="89" colspan="3" bgcolor="#e56630">
        <img border="0" src="/sites/all/themes/pfca/images/newsletter/bandeau_bot.gif" width="650" height="89" style="display: block;"/>
      </td>
    </tr>
  </table>
  <!-- Fin Header -->
  <?php if(isset($node->field_titre_flash_info['und'])){ ?>
   <!-- Bandeau rubrique -->
  <table width="650" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#4b4b4b">
    <tr>
      <td width="46" height="59" bgcolor="#4b4b4b">
        <img border="0" src="/sites/all/themes/pfca/images/newsletter/picto_rubrique.gif" width="46" height="59"/>
      </td>
      <td width="604" height="59" bgcolor="#4b4b4b" style="font-family: Arial, sans-serif;font-size: 18px;font-weight: bold;color: #FFFFFF;text-transform: uppercase;">
        Flash info
      </td>
    </tr>
    <tr>
      <td width="650" height="10" bgcolor="#FFFFFF" colspan="2"></td>
    </tr>
  </table>
  <!-- Fin bandeau rubrique -->
    <!-- Exemple de contenu flash info -->
  <table width="650" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
    <tr>
      <td width="20" height="20"></td>
      <td width="630" height="20" colspan="4"></td>
    </tr>
    <tr>
      <td width="20"></td>
      <td width="630" colspan="4" style="font-family: Arial, sans-serif;font-size: 16px;font-weight: bold;color: #4b4b4b;text-transform: uppercase;">  <a target="_blank" href="<?php echo $node->field_lien_flash_info['und'][0]['url']; ?>" title="" style="display: block; font-family: Arial, sans-serif;font-size: 16px;font-weight: bold;color: #4b4b4b;text-transform: uppercase; text-decoration:none;"><?php echo $node->field_titre_flash_info['und'][0]['value']; ?> </a></td>

    </tr>
    <tr>
      <td width="20" height="15"></td>
      <td width="630" height="15" colspan="4"></td>
    </tr>
    <tr>
      <td width="20" height="1"></td>
      <td width="630" height="1" colspan="4"><img border="0" src="/sites/all/themes/pfca/images/newsletter/line_divider.gif" width="80" height="1"/></td>
    </tr>
    <tr>
      <td width="20" height="20"></td>
      <td width="630" height="20" colspan="4"></td>
    </tr>
    <tr>
      <td width="20"></td>
      <!-- Contenu Colonne gauche -->
      <td width="360" style="vertical-align: top;">
        <table width="360" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
          <!-- Date -->
          <tr>
            <td width="360" height="10" style="font-size: 13px;line-height: 12px;color: #999999;">
             <?php echo $node->field_texte_avant_date_flash_inf['und'][0]['value']; ?>
             <?php echo format_date(strtotime($node->field_date_flash_info['und']['0']['value']),'full'); ?>
            </td>
          </tr>
          <!-- Fin Date -->
          <tr>
            <td width="360" height="15"></td>
          </tr>
          <!-- Contenu -->
          <tr>
            <td width="360">
             <?php echo $node->field_contenu_flash_info['und'][0]['value']; ?>
            </td>
          </tr>
          <!-- Fin Contenu -->
          <tr>
            <td width="360" height="15"></td>
          </tr>
          <?php if(isset($node->field_lien_flash_info['und'])){ ?>
          <!-- Bouton avec lien & texte administrable -->
          <tr>
            <td width="360" bgcolor="#e76807" style="text-align: center;">
              <a target="_blank" href="<?php echo $node->field_lien_flash_info['und'][0]['url']; ?>" title="" style="display: block;padding-top: 10px;padding-bottom: 10px;font-size: 13px;font-weight: bold;color: #FFFFFF;text-transform: uppercase;text-decoration: none;text-align: center;">
               <?php echo $node->field_lien_flash_info['und'][0]['title']; ?>
              </a>
            </td>
          </tr>
          <!-- Fin Bouton avec lien & texte administrable -->
          <?php } ?>
        </table>
      </td>
      <!-- Fin Contenu Colonne gauche -->
      <td width="20"></td>
      <td width="250" colspan="2" style="vertical-align: top;">
        <table width="250" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
        <?php if(isset($node->field_liens_utiles_flash_info['und'])){ ?>
          <!-- Liens utiles -->
          <tr>
            <td width="250">
              <table width="250" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#eeeeee">
                <tr>
                  <td width="250" height="50" colspan="3">
                    <img border="0" src="/sites/all/themes/pfca/images/newsletter/titre_lien_utiles.gif" width="250" height="50"/>
                  </td>
                </tr>
                <tr>
                  <td width="20"></td>
                  <td width="210">
                  <?php foreach($node->field_liens_utiles_flash_info['und'] as $liens_utiles){ ?>
                    <a target="_blank" href="<?php echo $liens_utiles['url']; ?>" style="color: #4b4b4b;"><?php echo $liens_utiles['title']; ?></a><br/>
                   <?php } ?>
                  </td>
                  <td width="20"></td>
                </tr>
                <tr>
                  <td width="250" height="30" colspan="3"></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td width="250" height="1" style="line-height: 1px"></td>
          </tr>
          <!-- Fin Liens utiles -->
           <?php } ?>
           <?php if(isset($node->field_telechargements_flash_info['und'])){ ?>
          <!-- Téléchargements -->
          <tr>
            <td width="250">
              <table width="250" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#879e33">
                <tr>
                  <td width="250" height="50" colspan="3">
                    <img border="0" src="/sites/all/themes/pfca/images/newsletter/titre_telechargement.gif" width="250" height="50"/>
                  </td>
                </tr>
                <tr>

                  <td width="20"></td>
                  <td width="210">
                  <?php
                  foreach($node->field_telechargements_flash_info['und'] as $dl_flash_info){
                  ?>
                    <a href="<?php echo download_file_url($dl_flash_info['fid']); ?>" style="color: #FFFFFF;"><?php if($dl_flash_info['description'] != ""){ echo $dl_flash_info['description']."<br/>"; }  ?></a>
                    <?php } ?>
                  </td>
                  <td width="20"></td>
                </tr>
                <tr>
                  <td width="250" height="30" colspan="3"></td>
                </tr>
              </table>
            </td>
          </tr>
          <!-- Fin Téléchargements -->
          <?php } ?>
        </table>
      </td>
    </tr>
    <tr>
      <td width="20" height="30"></td>
      <td width="630" height="30" colspan="4"></td>
    </tr>
    <tr>
      <td width="20"></td>
      <td width="630" colspan="4">
        <!-- Logos / Images -->
        <table width="630" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
            <?php
             $i = 0;
            $next= false;
            foreach($node->field_visuels_flash_info['und'] as $visuels_flash_info){
	            $image_flash_info = field_collection_item_load($visuels_flash_info['value']);
	             foreach($image_flash_info->field_visuel_fc_flash_info['und'] as $file){
					 if($i==0 || $next == true){
			             echo "<tr>";
			             $next = false;
		             }
					 $i++;
                  $thumb = theme_image_style(array(
                    'style_name' => 'h50',
                    'path' => $file['uri'],
                    'alt' => $file['alt'],
                    'title' => $file['title']
                  ));

            ?>
            <td style="text-align: left;vertical-align: middle;">
				<?php if($image_flash_info->field_lien_fc_flash_info['und'][0]['value']): ?><a href="<?php echo $image_flash_info->field_lien_fc_flash_info['und'][0]['value']; ?>" style="display: block;"><?php endif; ?>
					<?php print $thumb; ?>
				<?php if($image_flash_info->field_lien_fc_flash_info['und'][0]['value']): ?></a><?php endif; ?>
            </td>
            <td width="20"></td>
             <?php }
					if($i%3 == 0){echo "</tr><tr><td colspan='6' height='10'></td></tr>";
						$next=true;
					}
             } ?>

        </table>
        <!-- Fin Logos / Images -->
      </td>
    </tr>
    <tr>
      <td width="20" height="30"></td>
      <td width="630" height="30" colspan="4"></td>
    </tr>
    <tr>
      <td width="650" height="1" colspan="5" bgcolor="#eeeeee" style="line-height: 1px"></td>
    </tr>
  </table>
  <!-- Fin Exemple de contenu flash info -->
  <?php } ?>

   <!------------------------ ACTUALITES ------------------------>

<?php
   if(isset($node->field_actualite_newsletter['und'])){ ?>
  <!-- Bandeau rubrique -->
  <table width="650" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#4b4b4b">
    <tr>
      <td width="46" height="59" bgcolor="#4b4b4b">
        <img border="0" src="/sites/all/themes/pfca/images/newsletter/picto_rubrique.gif" width="46" height="59"/>
      </td>
      <td width="404" height="59" bgcolor="#4b4b4b" style="font-family: Arial, sans-serif;font-size: 18px;font-weight: bold;color: #FFFFFF;text-transform: uppercase;">
       <?php echo $node->field_titre_rubrique_actualites['und'][0]['value']; ?>
       </td>
       <td width="180" align="right" height="59">
       <a style="color:#e76807; font-family: Arial, sans-serif;font-size: 12px;" href="http://www.pfca34.org/actualites">Toutes les actualités</a>
      </td>
      <td width="20"></td>
    </tr>
    <tr>
      <td width="650" height="10" bgcolor="#FFFFFF" colspan="4"></td>
    </tr>
  </table>
  <!-- Fin bandeau rubrique -->
  <?php foreach($node->field_actualite_newsletter['und'] as $actualite){
	  $actualites = field_collection_item_load($actualite['value']);
	  $mynode_ac = node_load($actualites->field_actualite_lie['und'][0]['target_id']);

  ?>
  <!-- Un élément -->
  <table width="650" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
    <tr>
      <td width="20" height="20"></td>
      <td width="630" height="20" colspan="4"></td>
    </tr>
    <tr>
      <td width="20"></td>
        <td width="630" colspan="4" style="font-family: Arial, sans-serif;font-size: 16px;font-weight: bold;color: #4b4b4b;text-transform: uppercase;">  <a href="/<?php echo drupal_get_path_alias('node/'.$mynode_ac->nid); ?>" title="" style="display: block; font-family: Arial, sans-serif;font-size: 16px;font-weight: bold;color: #4b4b4b;text-transform: uppercase; text-decoration:none;"><?php echo $mynode_ac->title;  ?></a></td>
    </tr>
    <tr>
      <td width="20" height="15"></td>
      <td width="630" height="15" colspan="4"></td>
    </tr>
    <tr>
      <td width="20" height="1"></td>
      <td width="630" height="1" colspan="4"><img border="0" src="/sites/all/themes/pfca/images/newsletter/line_divider.gif" width="80" height="1"/></td>
    </tr>
    <tr>
      <td width="20" height="20"></td>
      <td width="630" height="20" colspan="4"></td>
    </tr>
    <tr>
      <td width="20"></td>
      <!-- Contenu Colonne gauche -->
      <td width="360" style="vertical-align: top;">
        <table width="360" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
          <!-- Thématique -->
          <?php if(isset($mynode_ac->field_actu_thematique['und'])){ ?>
          <tr>
            <td width="360" height="15" style="font-family: Arial, sans-serif;font-size: 14px;color: #e76807;font-weight: bold;line-height: 14px;">
            <?php
				$tab_thematique = array();
				foreach($mynode_ac->field_actu_thematique['und'] as $thematiques_ac){
            	$mytaxo_ac = taxonomy_term_load($thematiques_ac['tid']);
            	array_push($tab_thematique, $mytaxo_ac->name );

          } print implode(',', $tab_thematique); ?></td>
          </tr>
          <?php } ?>
          <!-- Fin Thématique -->
          <tr>
            <td width="360" height="15"></td>
          </tr>
          <!-- Date -->
          <tr>
            <td width="360" height="10" style="font-size: 13px;line-height: 12px;color: #999999;">
             <?php echo format_date(strtotime($mynode_ac->field_actu_date['und']['0']['value']),'full'); ?>
            </td>
          </tr>
          <!-- Fin Date -->
          <tr>
            <td width="360" height="15"></td>
          </tr>
          <!-- Contenu/Résumé -->
          <tr>
            <td width="360">
             <?php echo substr($mynode_ac->body['und'][0]['summary'],0,300);  ?>
            </td>
          </tr>
          <!-- Fin Contenu/Résumé -->
          <tr>
            <td width="360" height="15"></td>
          </tr>
          <!-- Bouton + -->
          <tr>
            <td width="360" height="32">
              <a href="/<?php echo drupal_get_path_alias('node/'.$mynode_ac->nid); ?>" title="Lire la suite sur notre site" style="display: block;">
                <img border="0" src="/sites/all/themes/pfca/images/newsletter/btn_plus.gif" width="32" height="32" alt="Bouton lire la suite sur notre site" title="Lire la suite sur notre site" style="display: block;"/>
              </a>
            </td>
          </tr>
          <!-- Fin Bouton + -->
        </table>
      </td>
      <!-- Fin Contenu Colonne gauche -->
      <td width="20"></td>
      <td width="250" colspan="2" style="vertical-align: top;">
        <table width="250" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
          <?php if(isset($actualites->field_liens_utiles_actualites['und'])){ ?>
          <!-- Liens utiles -->
          <tr>
            <td width="250">
              <table width="250" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#eeeeee">
                <tr>
                  <td width="250" height="50" colspan="3">
                    <img border="0" src="/sites/all/themes/pfca/images/newsletter/titre_lien_utiles.gif" width="250" height="50"/>
                  </td>
                </tr>
                <tr>
                  <td width="20"></td>
                  <td width="210">
                  <?php foreach($actualites->field_liens_utiles_actualites['und'] as $liens_utiles_ac){ ?>
                    <a target="_blank" href="<?php echo $liens_utiles_ac['url']; ?>" style="color: #4b4b4b;"><?php echo $liens_utiles_ac['title']; ?></a><br/>
                   <?php } ?>
                  </td>
                  <td width="20"></td>
                </tr>
                <tr>
                  <td width="250" height="30" colspan="3"></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td width="250" height="1" style="line-height: 1px"></td>
          </tr>
          <!-- Fin Liens utiles -->
           <?php } ?>
          <?php if(isset($actualites->field_telechargements_actualites['und']) || isset($mynode_ac->field_actu_telechargement['und'])){ ?>
          <!-- Téléchargements -->
          <tr>
            <td width="250">
              <table width="250" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#879e33">
                <tr>
                  <td width="250" height="50" colspan="3">
                    <img border="0" src="/sites/all/themes/pfca/images/newsletter/titre_telechargement.gif" width="250" height="50"/>
                  </td>
                </tr>
                <tr>

                  <td width="20"></td>
                  <td width="210">
                  <?php
                  foreach($mynode_ac->field_actu_telechargement['und'] as $dl_actus){
                  ?>
                    <a href="<?php echo download_file_url($dl_actus['fid']); ?>" style="color: #FFFFFF;"><?php if($dl_actus['description'] != "" ){ echo $dl_actus['description']."<br/>"; } ?></a>
                    <?php }  ?>
                  <?php
                  foreach($actualites->field_telechargements_actualites['und'] as $dl_actu){
                  ?>
                    <a href="<?php echo download_file_url($dl_actu['fid']); ?>" style="color: #FFFFFF;"><?php if($dl_actu['description'] != ""){ echo $dl_actu['description']."<br/>"; } ?></a>
                    <?php }  ?>
                  </td>
                  <td width="20"></td>
                </tr>
                <tr>
                  <td width="250" height="30" colspan="3"></td>
                </tr>
              </table>
            </td>
          </tr>
          <!-- Fin Téléchargements -->
          <?php } ?>
        </table>
      </td>
    </tr>
    <tr>
      <td width="20" height="30"></td>
      <td width="630" height="30" colspan="4"></td>
    </tr>
    <tr>
      <td width="20"></td>
      <td width="630" colspan="4">
        <!-- Logos / Images -->
        <table width="630" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
            <?php
             $i = 0;
            $next= false;
            foreach($actualites->field_visuels_actualites['und'] as $visuels_actualites){
	            $image_actualites = field_collection_item_load($visuels_actualites['value']);
	             foreach($image_actualites->field_field_visuel_fc_actualite['und'] as $file){
					 if($i==0 || $next == true){
			             echo "<tr>";
			             $next = false;
		             }
					 $i++;
                  $thumb = theme_image_style(array(
                    'style_name' => 'h50',
                    'path' => $file['uri'],
                    'alt' => $file['alt'],
                    'title' => $file['title']
                  ));

            ?>
            <td style="text-align: left;vertical-align: middle;">
				<?php if($image_actualites->field_lien_fc_actualite['und'][0]['url']): ?><a href="<?php echo $image_actualites->field_lien_fc_actualite['und'][0]['url']; ?>" style="display: block;"><?php endif; ?>
					<?php print $thumb; ?>
				<?php if($image_actualites->field_lien_fc_actualite['und'][0]['url']): ?></a><?php endif; ?>
            </td>
            <td width="20"></td>
            <?php }
					if($i%3 == 0){echo "</tr><tr><td colspan='6' height='10'></td></tr>";
						$next=true;
					}
             } ?>

        </table>
        <!-- Fin Logos / Images -->

      </td>
    </tr>
    <tr>
      <td width="20" height="30"></td>
      <td width="630" height="30" colspan="4"></td>
    </tr>
    <tr>
      <td width="650" height="1" colspan="5" bgcolor="#eeeeee" style="line-height: 1px"></td>
    </tr>
  </table>
  <!-- Fin élément -->
  <?php } ?>
<?php } ?>

  <?php
   if(isset($node->field_agenda_newsletter['und'])){ ?>
  <!-- Bandeau rubrique -->
  <table width="650" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#4b4b4b">
    <tr>
      <td width="46" height="59" bgcolor="#4b4b4b">
        <img border="0" src="/sites/all/themes/pfca/images/newsletter/picto_rubrique.gif" width="46" height="59"/>
      </td>
      <td width="404" height="59" bgcolor="#4b4b4b" style="font-family: Arial, sans-serif;font-size: 18px;font-weight: bold;color: #FFFFFF;text-transform: uppercase;">
       <?php echo $node->field_titre_rubrique_agenda['und'][0]['value']; ?>
      </td>
       <td width="180" align="right" height="59">
       <a style="color:#e76807; font-family: Arial, sans-serif;font-size: 12px;" href="http://www.pfca34.org/agenda">Tous les agendas</a>
      </td>
      <td width="20"></td>
    </tr>
    <tr>
      <td width="650" height="10" bgcolor="#FFFFFF" colspan="4"></td>
    </tr>
  </table>
  <!-- Fin bandeau rubrique -->
  <?php foreach($node->field_agenda_newsletter['und'] as $agendas){
	  $agenda = field_collection_item_load($agendas['value']);
	  $mynode = node_load($agenda->field_agenda_lie['und'][0]['target_id']);

	  //dpm($mynode);
  ?>
  <!-- Un élément -->
  <table width="650" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
    <tr>
      <td width="20" height="20"></td>
      <td width="630" height="20" colspan="4"></td>
    </tr>
    <tr>
      <td width="20"></td>
       <td width="630" colspan="4" style="font-family: Arial, sans-serif;font-size: 16px;font-weight: bold;color: #4b4b4b;text-transform: uppercase;"><a href="/<?php echo drupal_get_path_alias('node/'.$mynode->nid); ?>" title="" style="display: block; font-family: Arial, sans-serif;font-size: 16px;font-weight: bold;color: #4b4b4b;text-transform: uppercase; text-decoration:none;"><?php echo $mynode->title;  ?></a></td>
    </tr>
    <tr>
      <td width="20" height="15"></td>
      <td width="630" height="15" colspan="4"></td>
    </tr>
    <tr>
      <td width="20" height="1"></td>
      <td width="630" height="1" colspan="4"><img border="0" src="/sites/all/themes/pfca/images/newsletter/line_divider.gif" width="80" height="1"/></td>
    </tr>
    <tr>
      <td width="20" height="20"></td>
      <td width="630" height="20" colspan="4"></td>
    </tr>
    <tr>
      <td width="20"></td>
      <!-- Contenu Colonne gauche -->
      <td width="360" style="vertical-align: top;">
        <table width="360" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
         <?php if(isset($mynode->field_agenda_thematique['und'])){ ?>
          <!-- Thématique -->
          <tr>
            <td width="360" height="15" style="font-family: Arial, sans-serif;font-size: 14px;color: #e76807;font-weight: bold;line-height: 14px;">
           <?php
				$tab_thematique_agenda = array();
				foreach($mynode->field_agenda_thematique['und'] as $thematiques_agenda){
            	$mytaxo_agenda = taxonomy_term_load($thematiques_agenda['tid']);
            	array_push($tab_thematique_agenda, $mytaxo_agenda->name );
          } print implode(',', $tab_thematique_agenda);?>
          </td>
          </tr>
          <?php } ?>
          <!-- Fin Thématique -->
          <tr>
            <td width="360" height="15"></td>
          </tr>
          <!-- Date -->
          <tr>
            <td width="360" height="10" style="font-size: 13px;line-height: 12px;color: #999999;">
             <?php echo format_date(strtotime($mynode->field_agenda_date['und']['0']['value']),'full'); ?>
            </td>
          </tr>
          <!-- Fin Date -->
          <tr>
            <td width="360" height="15"></td>
          </tr>
          <!-- Contenu/Résumé -->
          <tr>
            <td width="360">
             <?php echo substr($mynode->body['und'][0]['summary'],0,300);  ?>
            </td>
          </tr>
          <!-- Fin Contenu/Résumé -->
          <tr>
            <td width="360" height="15"></td>
          </tr>
          <!-- Bouton + -->
          <tr>
            <td width="360" height="32">
              <a href="/<?php echo drupal_get_path_alias('node/'.$mynode->nid); ?>" title="Lire la suite sur notre site" style="display: block;">
                <img border="0" src="/sites/all/themes/pfca/images/newsletter/btn_plus.gif" width="32" height="32" alt="Bouton lire la suite sur notre site" title="Lire la suite sur notre site" style="display: block;"/>
              </a>
            </td>
          </tr>
          <!-- Fin Bouton + -->
        </table>
      </td>
      <!-- Fin Contenu Colonne gauche -->
      <td width="20"></td>
      <td width="250" colspan="2" style="vertical-align: top;">
        <table width="250" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
          <?php if(isset($agenda->field_liens_utiles_agenda['und'])){ ?>
          <!-- Liens utiles -->
          <tr>
            <td width="250">
              <table width="250" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#eeeeee">
                <tr>
                  <td width="250" height="50" colspan="3">
                    <img border="0" src="/sites/all/themes/pfca/images/newsletter/titre_lien_utiles.gif" width="250" height="50"/>
                  </td>
                </tr>
                <tr>
                  <td width="20"></td>
                  <td width="210">
                  <?php foreach($agenda->field_liens_utiles_agenda['und'] as $liens_utiles){ ?>
                    <a target="_blank" href="<?php echo $liens_utiles['url']; ?>" style="color: #4b4b4b;"><?php echo $liens_utiles['title']; ?></a><br/>
                   <?php } ?>
                  </td>
                  <td width="20"></td>
                </tr>
                <tr>
                  <td width="250" height="30" colspan="3"></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td width="250" height="1" style="line-height: 1px"></td>
          </tr>
          <!-- Fin Liens utiles -->
           <?php } ?>
          <?php if(isset($agenda->field_telechargements_agenda['und']) || isset($mynode->field_agenda_telechargement['und'])){ ?>
          <!-- Téléchargements -->
          <tr>
            <td width="250">
              <table width="250" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#879e33">
                <tr>
                  <td width="250" height="50" colspan="3">
                    <img border="0" src="/sites/all/themes/pfca/images/newsletter/titre_telechargement.gif" width="250" height="50"/>
                  </td>
                </tr>
                <tr>

                  <td width="20"></td>
                  <td width="210">
                  <?php
                  foreach($mynode->field_agenda_telechargement['und'] as $dl_agendas){
                  ?>
                    <a href="<?php echo download_file_url($dl_agendas['fid']); ?>" style="color: #FFFFFF;"><?php if($dl_agendas['description'] != ""){ echo $dl_agendas['description']."<br/>"; } ?></a>
                  <?php }  ?>
                  <?php
                  foreach($agenda->field_telechargements_agenda['und'] as $dl_agenda){
                  ?>
                    <a href="<?php echo download_file_url($dl_agenda['fid']); ?>" style="color: #FFFFFF;"><?php if($dl_agenda['description']  != "") {echo $dl_agenda['description']."<br/>"; } ?></a>
                  <?php }  ?>
                  </td>
                  <td width="20"></td>
                </tr>
                <tr>
                  <td width="250" height="30" colspan="3"></td>
                </tr>
              </table>
            </td>
          </tr>
          <!-- Fin Téléchargements -->
          <?php } ?>

        </table>
      </td>
    </tr>
    <tr>
      <td width="20" height="30"></td>
      <td width="630" height="30" colspan="4"></td>
    </tr>
    <tr>
      <td width="20"></td>
      <td width="630" colspan="4">
        <!-- Logos / Images -->
        <table width="630" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">

            <?php
              $i = 0;
			  $next= false;
             foreach($agenda->field_visuels_agenda['und'] as $visuels_agenda){
	            $image_agenda = field_collection_item_load($visuels_agenda['value']);

	             foreach($image_agenda->field_field_visuel_fc_agenda['und'] as $file){
	             	if($i==0 || $next == true){
			             echo "<tr>";
			             $next = false;
		             }
					 $i++;
                  $thumb = theme_image_style(array(
                    'style_name' => 'h50',
                    'path' => $file['uri'],
                    'alt' => $file['alt'],
                    'title' => $file['title']
                  ));
            ?>
            <td style="text-align: left;vertical-align: middle;">
				<?php if($image_agenda->field_lien_fc_agenda['und'][0]['url']): ?><a href="<?php echo $image_agenda->field_lien_fc_agenda['und'][0]['url']; ?>" style="display: block;"> <?php endif; ?>
					<?php print $thumb; ?>
				<?php if($image_agenda->field_lien_fc_agenda['und'][0]['url']): ?></a><?php endif; ?>
            </td>
            <td width="20"></td>
             <?php }
             if($i%3 == 0){echo "</tr><tr><td colspan='6' height='10'></td></tr>";
						$next=true;
					}
              } ?>

        </table>
        <!-- Fin Logos / Images -->

      </td>
    </tr>
    <tr>
      <td width="20" height="30"></td>
      <td width="630" height="30" colspan="4"></td>
    </tr>
    <tr>
      <td width="650" height="1" colspan="5" bgcolor="#eeeeee" style="line-height: 1px"></td>
    </tr>
  </table>
  <!-- Fin élément -->
  <?php } ?>
<?php } ?>
  <!-- Footer statique -->
  <table width="650" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#E76807">
    <tr>
      <td width="650" height="138">
        <a href="http://www.pfca34.org" title="Visitez notre site" target="_blank" style="display: block;">
          <img border="0" width="650" height="138" src="/sites/all/themes/pfca/images/newsletter/footer.gif" style="display: block;"/>
        </a>
      </td>
    </tr>
  </table>
  <table width="650" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td width="650" height="30">
        <a href="http://www.choosit.com" title="Choosit l'agence digitale" target="_blank" style="display: block;">
          <img border="0" width="650" height="30" src="/sites/all/themes/pfca/images/newsletter/choosit.gif" style="display: block;"/>
        </a>
      </td>
    </tr>
  </table>
  <table width="650" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td width="650" height="20"></td>
    </tr>
  </table>
  <!-- Fin Footer statique -->
  <!--
  <center>
    Conform&#233;ment &#224; la loi informatique et libert&#233; du 06/01/1978 (art.27), vous disposez d'un droit d'acc&#232;s et de rectification<br/>
    des donn&#233;es vous concernant. Si vous ne souhaitez plus recevoir cette newsletter, <a href="#" title="D&#233;sabonnez-vous en cliquant ici" target="_blank" style="color:#879e33; text-decoration: underline;">d&#233;sabonnez-vous</a>
  </center>
  -->
  <style>
    .ReadMsgBody {width: 100%;}
    .ExternalClass {width: 100%;}
    body {color:#4b4b4b;line-height:20px;font-family:Arial, sans-serif;font-size:11px;background-color:#f5f5f5;margin-bottom:20px;margin-top:20px;margin-right:0px;margin-left:0px;-webkit-text-size-adjust:none;}
    table { font-size: 12px; }
    img { border: none; }
    a { color: #879e33; text-decoration: underline; }
    a:hover { color: #9db93a; text-decoration: none; }

    span.yshortcuts { color:#000; background-color:none; border:none;}
    span.yshortcuts:hover,
    span.yshortcuts:active,
    span.yshortcuts:focus {color:#000; background-color:none; border:none;}
    /*
h2 {font-size: 17px;color: #e76807;text-transform: uppercase;}
    h3 {font-size: 16px;font-weight:bold;color: #84932c;}
*/
    

  </style>
