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
        <a href="http://www.pfca34.org" target="_blank"><img border="0" src="/sites/all/themes/pfca/images/newsletter/bandeau_top_2.gif" width="650" height="20" style="display: block;"/></a>
      </td>
    </tr>
    <tr>
      <td width="20" height="33" bgcolor="#e56630"></td>
      <td width="312" height="33" bgcolor="#e56630" style="color: #FFFFFF;font-family: Arial, sans-serif;font-weight: bold;font-size: 14px;line-height: 14px;text-transform: uppercase;vertical-align: top;">
      <?php echo $node->title; ?>
      </td>
      <td width="318" height="33" bgcolor="#e56630">
        <a href="http://www.pfca34.org" target="_blank"><img border="0" src="/sites/all/themes/pfca/images/newsletter/bandeau_right_2.gif" width="318" height="33" style="display: block;"/></a>
      </td>
    </tr>
    <tr>
      <td width="650" height="36" colspan="3" bgcolor="#e56630">
        <a href="http://www.pfca34.org" target="_blank"><img border="0" src="/sites/all/themes/pfca/images/newsletter/bandeau_bot_2.gif" width="650" height="36" style="display: block;"/></a>
      </td>
    </tr>
  </table>
  <!-- Fin Header -->
  
  <!------ CONTENU ------->
	<table width="650" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<!-- CONTENT -->
			<td width="400" valign="top">
				<!------ AGENDA ------->
				<?php if( !empty( $node->field_evenements_lies['und'] ) ) { ?>
					<table width="400" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#4b4b4b">
						<tr>
						  <td width="46" height="40" bgcolor="#4b4b4b">
							<img border="0" src="/sites/all/themes/pfca/images/newsletter/picto_agenda_2.gif" width="46" height="40"/>
						  </td>
						  <td width="354" height="40" bgcolor="#4b4b4b" style="font-family: Arial, sans-serif;font-size: 16px;font-weight: bold;color: #FFFFFF;text-transform: uppercase;">
							<?php if( !empty($node->field_titre_partie_agenda['und'][0]['safe_value']) ) { ?>
								<span style="text-transform : uppercase"><?php echo $node->field_titre_partie_agenda['und'][0]['safe_value']; ?></span>
							<?php } else { ?>
								AGENDA
							<?php } ?>
						  </td>
						</tr>
						<tr>
							<td width="400" height="10" bgcolor="#FFFFFF" colspan="2"></td>
						</tr>
					</table>
					<?php foreach( $node->field_evenements_lies['und'] as $k => $agenda ) { 
						$agenda_data = node_load($agenda['target_id']); 
						if( !empty($agenda_data) ) {
					?>
						<table width="400" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="20"></td>
								<td width="80" valign="top">
									<?php if( !empty($agenda_data->field_agenda_visuel['und'][0]['uri']) ) { ?>
										<a href="<?php echo url( 'node/' . $agenda_data->nid ); ?>" title="<?php echo $agenda_data->title; ?>" target="_blank"><img src="<?php echo image_style_url('thumbnail', $agenda_data->field_agenda_visuel['und'][0]['uri'] ); ?>" alt="<?php echo $agenda_data->title; ?>" width="80" /></a>
									<?php } ?>
								</td>
								<td width="20"></td>
								<td width="260" valign="top">
									<!-- Titre -->
									<span style="font-weight : bold; font-size : 13px"><a href="<?php echo url( 'node/' . $agenda_data->nid ); ?>" title="<?php echo $agenda_data->title; ?>" target="_blank" style="color : #4B4B4B; text-decoration : none"><?php echo $agenda_data->title; ?></a></span>
									<!-- Separator -->
									<table><tr><td height="5"></td><td></td></tr><td width="80" style="border-top : 1px solid #EE7202" height="5"></td><td></td></tr></table>
									<!-- Dates -->
									<table width="260" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td>
												<span style="font-size : 11px">
													<?php if( !empty($agenda_data->field_agenda_date['und'][0]['value']) ) {
														$output = t('@day @month @year',
																				array(
																				'@day' 		=> t( date( 'd', strtotime( $agenda_data->field_agenda_date['und'][0]['value'] ))),
																				'@month'	=> t( date( 'F', strtotime( $agenda_data->field_agenda_date['und'][0]['value'] ))),
																				'@year'		=> t( date( 'Y', strtotime( $agenda_data->field_agenda_date['und'][0]['value'] )))
																				)
																);

														echo $output;
													} ?>
													<?php if( !empty($agenda_data->field_agenda_date['und'][0]['value2']) && $agenda_data->field_agenda_date['und'][0]['value2'] != $agenda_data->field_agenda_date['und'][0]['value'] ) {
														$output = t('@day @month @year',
																				array(
																				'@day' 		=> t( date( 'd', strtotime( $agenda_data->field_agenda_date['und'][0]['value2'] ))),
																				'@month'	=> t( date( 'F', strtotime( $agenda_data->field_agenda_date['und'][0]['value2'] ))),
																				'@year'		=> t( date( 'Y', strtotime( $agenda_data->field_agenda_date['und'][0]['value2'] )))
																				)
																);

														echo ' - '.$output;
													} ?>
												</span>
											</td>
											<td align="right"><span style="font-size : 11px"><a href="<?php echo url( 'node/' . $agenda_data->nid ); ?>" title="<?php echo $agenda_data->title; ?>" target="_blank">Voir l'&eacute;v&eacute;nement</a></span></td>
										</tr>
									</table>
								</td>
								<td width="20"></td>
							</tr>
						</table>
						<table width="400" border="0" cellspacing="0" cellpadding="0"><tr><td height="20"></td></tr></table>
					
				<?php 
						}
					}
				?>
					<table width="400" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td height="20" width="20"></td>
							<td width="360" align="right">
								<a href="http://www.pfca34.org/agenda" target="_blank" title="Tout l'agenda"><img src="/sites/all/themes/pfca/images/newsletter/tout_agenda_btn.gif" alt="Toutes l'agenda" /></a>
							</td>
							<td height="20" width="20"></td>
						</tr>
					</table>
					<table width="400" border="0" cellspacing="0" cellpadding="0"><tr><td height="20"></td></tr></table>
				<?php
				} ?>
				
				<!------ FIN AGENDA -------->
				
				
				<!------ ACTUALITÉS -------->
				<?php if( !empty( $node->field_actualites_liees['und'] ) ) { ?>
					<table width="400" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#4b4b4b">
						<tr>
						  <td width="46" height="40" bgcolor="#4b4b4b">
							<img border="0" src="/sites/all/themes/pfca/images/newsletter/picto_rubrique_2.gif" width="46" height="40"/>
						  </td>
						  <td width="354" height="40" bgcolor="#4b4b4b" style="font-family: Arial, sans-serif;font-size: 16px;font-weight: bold;color: #FFFFFF;text-transform: uppercase;">
							<?php if( !empty($node->field_titre_partie_actualites['und'][0]['safe_value']) ) { ?>
								<span style="text-transform : uppercase"><?php echo $node->field_titre_partie_actualites['und'][0]['safe_value']; ?></span>
							<?php } else { ?>
								ACTUALITÉS
							<?php } ?>
						  </td>
						</tr>
						<tr>
							<td width="400" height="10" bgcolor="#FFFFFF" colspan="2"></td>
						</tr>
					</table>
					
					<?php foreach( $node->field_actualites_liees['und'] as $k => $actualite ) { 
						$actu_data = node_load($actualite['target_id']); 
						if( !empty($actu_data) ) {
					?>
						<table width="400" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="20"></td>
								<td width="80" valign="top">
									<?php if( !empty($actu_data->field_actu_visuel['und'][0]['uri']) ) { ?>
										<a href="<?php echo url( 'node/' . $actu_data->nid ); ?>" title="<?php echo $actu_data->title; ?>" target="_blank"><img src="<?php echo image_style_url('thumbnail', $actu_data->field_actu_visuel['und'][0]['uri'] ); ?>" alt="<?php echo $actu_data->title; ?>" width="80" /></a>
									<?php } ?>
								</td>
								<td width="20"></td>
								<td width="260" valign="top">
									<!-- Titre -->
									<span style="font-weight : bold; font-size : 13px"><a href="<?php echo url( 'node/' . $actu_data->nid ); ?>" title="<?php echo $actu_data->title; ?>" target="_blank" style="color : #4B4B4B; text-decoration : none"><?php echo $actu_data->title; ?></a></span>
									<!-- Separator -->
									<table><tr><td height="5"></td><td></td></tr><td width="80" style="border-top : 1px solid #EE7202" height="5"></td><td></td></tr></table>
									
									<!-- Summary -->
									<?php if( !empty($actu_data->body['und'][0]['summary']) ) { ?>
									<span style="color : #8D8D8D"><?php echo substr( strip_tags( $actu_data->body['und'][0]['summary'] ), 0, 160 ); ?>...</span>
									<?php } ?>
									
									<table width="260" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td>
												<a href="<?php echo url( 'node/' . $actu_data->nid ); ?>" title="<?php echo $actu_data->title; ?>" target="_blank">Lire la suite</a>
											</td>
											<td align="right"></td>
										</tr>
									</table>
								</td>
								<td width="20"></td>
							</tr>
						</table>
						<table width="400" border="0" cellspacing="0" cellpadding="0"><tr><td height="20"></td></tr></table>
					
				<?php 
						}
					}
				?>
					<table width="400" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td height="20" width="20"></td>
							<td width="360" align="right">
								<a href="http://www.pfca34.org/actualites" target="_blank" title="voir toutes les actualités"><img src="/sites/all/themes/pfca/images/newsletter/toutes_actus_btn.gif" alt="Toutes les actualités" /></a>
							</td>
							<td height="20" width="20"></td>
						</tr>
					</table>
					<table width="400" border="0" cellspacing="0" cellpadding="0"><tr><td height="20"></td></tr></table>
				<?php
					
				} ?>
				
				
				<!--- FIN ACTUALITÉS ------->
				
				
			</td>
			<!-- SIDEBAR -->
			<td width="250" valign="top">
				<?php if( !empty( $node->field_informations_supplementair['und'] ) ) { ?>
				<?php foreach( $node->field_informations_supplementair['und'] as $k => $encart ) {
						$encart_data = field_collection_item_load( $encart['value'] );
						if( !empty($encart_data) ) {
				?>
					<table width="250" border="0" cellspacing="0" cellpadding="0" <?php echo ( !empty($encart_data->field_couleur_de_fond['und'][0]['rgb']) ) ? 'bgcolor="' .$encart_data->field_couleur_de_fond['und'][0]['rgb']. '"' : '' ; ?>>
						<tr>
							<td>
								<table width="250" border="0" cellspacing="0" cellpadding="0">
									<tr><td height="20"></td><td height="20"></td><td height="20"></td></tr>
									<tr>
										<td width="20"></td>
										<td width="210">
											<!-- Titre -->
											<?php if( !empty($encart_data->field_titre['und'][0]['safe_value']) ) { ?>
											<span style="font-weight : bold; font-size : 15px; <?php echo ( !empty($encart_data->field_couleur_du_titre['und'][0]['rgb']) ) ? 'color : '.$encart_data->field_couleur_du_titre['und'][0]['rgb'] : ''; ?>">
											<?php if( !empty($encart_data->field_lien_de_l_encart['und'][0]['safe_value']) ) { ?>
											<a href="<?php echo $encart_data->field_lien_de_l_encart['und'][0]['safe_value']; ?>" title="<?php echo $encart_data->field_titre['und'][0]['safe_value']; ?>" target="_blank" style="text-decoration : none; <?php echo ( !empty($encart_data->field_couleur_du_titre['und'][0]['rgb']) ) ? 'color : '.$encart_data->field_couleur_du_titre['und'][0]['rgb'] : ''; ?>"><?php echo $encart_data->field_titre['und'][0]['safe_value']; ?></a>
											<?php } else { ?>
											<?php echo $encart_data->field_titre['und'][0]['safe_value']; ?>
											<?php } ?>
											</span>
											
											
											<!-- Separator -->
											<table><tr><td height="5"></td><td></td></tr><td width="80" style="border-top : 1px solid #4B4B4B" height="5"></td><td></td></tr></table>
											<?php } ?>
											
											
											<!-- Photo -->
											<?php if( !empty($encart_data->field_photo['und'][0]['uri']) ) { ?>
												<?php if( !empty($encart_data->field_lien_de_l_encart['und'][0]['safe_value']) ) { ?>
													<a href="<?php echo $encart_data->field_lien_de_l_encart['und'][0]['safe_value']; ?>" title="<?php echo $encart_data->field_titre['und'][0]['safe_value']; ?>" target="_blank">
														<img src="<?php echo image_style_url('medium', $encart_data->field_photo['und'][0]['uri']); ?>" alt="<?php echo $encart_data->field_titre['und'][0]['safe_value']; ?>" width="210" />
													</a>
												<?php } else { ?>
													<img src="<?php echo image_style_url('medium', $encart_data->field_photo['und'][0]['uri']); ?>" alt="<?php echo $encart_data->field_titre['und'][0]['safe_value']; ?>" width="210" />
												<?php } ?>
											<br/><br/>
											<?php } ?>
											
											<!-- Sous titre -->
											<?php if( !empty($encart_data->field_sous_titre['und'][0]['value']) ) { ?>
											<span style="font-weight : bold; font-size : 14px; <?php echo ( !empty($encart_data->field_couleur_du_texte['und'][0]['rgb']) ) ? 'color : ' . $encart_data->field_couleur_du_texte['und'][0]['rgb'] : ''; ?>">
												<?php echo $encart_data->field_sous_titre['und'][0]['value']; ?>
											</span><br/>
											<?php } ?>
											
											<!-- Date -->
											<?php if( !empty($encart_data->field_date['und'][0]['value']) ) { ?>
												<?php if( !empty($encart_data->field_date['und'][0]['value']) ) {
														$output = t('@day @month @year',
																				array(
																				'@day' 		=> t( date( 'd', strtotime( $encart_data->field_date['und'][0]['value'] ))),
																				'@month'	=> t( date( 'F', strtotime( $encart_data->field_date['und'][0]['value'] ))),
																				'@year'		=> t( date( 'Y', strtotime( $encart_data->field_date['und'][0]['value'] )))
																				)
																);
											?>
												<span style="<?php echo ( !empty($encart_data->field_couleur_du_titre['und'][0]['rgb']) ) ? 'color : '.$encart_data->field_couleur_du_titre['und'][0]['rgb'] : ''; ?>"><?php echo $output; ?></span><br/>
											<?php
														
													} ?>	
											<?php } ?>
											
											<!-- Contenu -->
											<?php if( !empty($encart_data->field_contenu['und'][0]['safe_value']) ) { ?>
											<span style="<?php echo ( !empty($encart_data->field_couleur_du_texte['und'][0]['rgb']) ) ? 'color : ' . $encart_data->field_couleur_du_texte['und'][0]['rgb'] : ''; ?>">
												<?php echo $encart_data->field_contenu['und'][0]['safe_value']; ?>
											</span>
											<?php } ?>
											<br/>
											<?php if( !empty($encart_data->field_lien_de_l_encart['und'][0]['safe_value']) ) { ?>
												<a href="<?php echo $encart_data->field_lien_de_l_encart['und'][0]['safe_value']; ?>" title="<?php echo $encart_data->field_titre['und'][0]['safe_value']; ?>" target="_blank" style="text-decoration : none; <?php echo ( !empty($encart_data->field_couleur_du_titre['und'][0]['rgb']) ) ? 'color : '.$encart_data->field_couleur_du_titre['und'][0]['rgb'] : ''; ?>">Lire la suite</a>
											<?php } ?>
										</td>
										<td width="20"></td>
									</tr>
									<tr><td height="20"></td><td height="20"></td><td height="20"></td></tr>
								</table>
							</td>
						</tr>
					</table>
				<?php 
						}
					} 
				}
				?>
			</td>
		</tr>
	</table>
  <!------ FIN CONTENU ------->

  <!-- Footer statique -->
  <table width="650" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#E76807">
    <tr>
      <td width="420" height="131">
        <a href="http://www.pfca34.org" title="Visitez notre site" target="_blank" style="display: block;">
          <img border="0" width="420" height="131" src="/sites/all/themes/pfca/images/newsletter/footer_txt.gif" style="display: block;"/>
        </a>
      </td>
	  <td width="230" height="131">
        <a href="http://www.pfca34.org/content/contact" title="Contactez-nous" target="_blank" style="display: block;">
          <img border="0" width="230" height="131" src="/sites/all/themes/pfca/images/newsletter/footer_contact.gif" style="display: block;"/>
        </a>
      </td>
    </tr>
  </table>
  <table width="650" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td width="650" height="37">
        <a href="http://www.choosit.com" title="Choosit l'agence digitale" target="_blank" style="display: block;">
          <img border="0" width="650" height="37" src="/sites/all/themes/pfca/images/newsletter/choosit_2.gif" style="display: block;"/>
        </a>
      </td>
    </tr>
  </table>
  <!-- Fin Footer statique -->
  <center>
	  <span style="font-size : 11px">
			Conform&#233;ment &#224; la loi informatique et libert&#233; du 06/01/1978 (art.27), vous disposez d'un droit d'acc&#232;s et de rectification<br/>
			des donn&#233;es vous concernant. Si vous ne souhaitez plus recevoir cette newsletter, <a href="#" title="D&#233;sabonnez-vous en cliquant ici" target="_blank" style="color:#879e33; text-decoration: underline;">d&#233;sabonnez-vous</a>
	  </span>
  </center>
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
