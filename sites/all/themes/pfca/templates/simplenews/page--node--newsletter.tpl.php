<?php
print $messages;
global $base_url;
?>
<?php if ($tabs): ?>
  <div class="tabs">
	<?php //print render($tabs); ?>
  </div>
<?php endif; ?>
<?php if ($action_links): ?>
  <ul class="action-links">
	<?php //print render($action_links); ?>
  </ul>
<?php endif; ?>
<table cellpadding="0" cellspacing="0" border="0" width="650" align="center"> <!-- table general -->
	<tr>
		<td bgcolor="#ffffff" align="center" width="650">
			<table cellpadding="0" cellspacing="0" border="0"> <!-- table conteneur -->
				<tr>
					<td>
						<?php print render($page['content']); ?>
						 <!-- /footer -->
					</td>
				</tr>
			</table>
			<table align="center" cellpadding="0" cellspacing="0" border="0" width="555">
			<tr>
				<td height="12" style="font-size:0">&nbsp;</td> <!-- table conditions -->
			</tr>
			<!--
			<tr>
				<td>
					<span style='color: #656565;font-family: "Arial";font-size: 11px; text-align:center; display:block;'>"A tout moment, vous disposez d'un droit d'accès, de modification, de rectification et de suppression des données qui vous concernent" (art 34 de la loi Informatique et Libertés du 6 Janvier 1978).<br/>
Vous pouvez vous désabonner en cliquant sur le lien <a href="#" style="color:#0c3f71; text-decoration:underline;">Me désabonner</a></span>
				</td>
			</tr>-->
			</table> <!-- /table conditions -->

		</td> <!-- /td general -->
	</tr><!-- /tr general -->
</table><!-- /table general -->
