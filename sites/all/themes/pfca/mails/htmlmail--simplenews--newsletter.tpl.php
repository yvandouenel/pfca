<?php

/**
 * @file
 * Sample template for sending Simplenews messages with HTML Mail.
 *
 * The following variables are available in this template:
 *
 *  - $message_id: The email message id, or "simplenews_$key"
 *  - $module: The sending module, which is 'simplenews'.
 *  - $key: The simplenews action, which may be any of the following:
 *    - node: Send a newsletter to its subscribers.
 *    - subscribe: New subscriber confirmation message.
 *    - test: Send a test newsletter to the test address.
 *    - unsubscribe: Unsubscribe confirmation message.
 *  - $headers: An array of email (name => value) pairs.
 *  - $from: The configured sender address.
 *  - $to: The recipient subscriber email address.
 *  - $subject: The message subject line.
 *  - $body: The formatted message body.
 *  - $language: The language object for this message.
 *  - $params: An array containing the following keys:
 *    - context:  An array containing the following keys:
 *      - account: The recipient subscriber account object, which contains
 *        the following useful properties:
 *        - snid: The simplenews subscriber id, or NULL for test messages.
 *        - name: The subscriber username, or NULL.
 *        - activated: The date this subscription became active, or NULL.
 *        - uid: The subscriber user id, or NULL.
 *        - mail: The subscriber email address; same as $message['to'].
 *        - language: The subscriber language code.
 *        - tids: An array of taxonomy term ids.
 *        - newsletter_subscription: An array of subscription ids.
 *      - node: The simplenews newsletter node object, which contains the
 *        following useful properties:
 *        - changed: The node last-modified date, as a unix timestamp.
 *        - created: The node creation date, as a unix timestamp.
 *        - name: The username of the node publisher.
 *        - nid: The node id.
 *        - title: The node title.
 *        - uid: The user ID of the node publisher.
 *      - newsletter: The simplenews newsletter object, which contains the
 *        following useful properties:
 *        - nid: The node ID of the newsletter node.
 *        - name: The short name of the newsletter.
 *        - description: The long name or description of the newsletter.
 *  - $template_path: The relative path to the template directory.
 *  - $template_url: The absolute url to the template directory.
 *  - $theme: The name of the selected Email theme.
 *  - $theme_path: The relative path to the Email theme directory.
 *  - $theme_url: The absolute url to the Email theme directory.
 */
  $template_name = basename(__FILE__);
  $current_path = realpath(NULL);
  $current_len = strlen($current_path);
  $template_path = realpath(dirname(__FILE__));
  if (!strncmp($template_path, $current_path, $current_len)) {
    $template_path = substr($template_path, $current_len + 1);
  }
  $template_url = url($template_path, array('absolute' => TRUE));
  $node = $params['simplenews_source']->getNode();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php print $node->title; ?></title>
<style>
  .ReadMsgBody {width: 100%;}
  .ExternalClass {width: 100%;}
  body {color:#4b4b4b;line-height:20px;font-family:Arial, sans-serif;font-size:11px;background-color:#f5f5f5;margin-bottom:20px;margin-top:20px;margin-right:0px;margin-left:0px;-webkit-text-size-adjust:none;}
  table { font-size: 12px; }
  img { border: none; }
  a { color: #879e33; text-decoration: underline; }
  a:hover { color: #9db93a; text-decoration: none; }
  p { margin: 0; }
  
  span.yshortcuts { color:#000; background-color:none; border:none;}
  span.yshortcuts:hover,
  span.yshortcuts:active,
  span.yshortcuts:focus {color:#000; background-color:none; border:none;}
    h2 {font-size: 17px;color: #e76807;text-transform: uppercase;}
    h3 {font-size: 16px;font-weight:bold;color: #84932c;}
</style>
                                                                                                                                                                                                                                                                
</head>

<body marginwidth="0" marginheight="0" topmargin="0" leftmargin="0" style="color:#4b4b4b;line-height:20px;font-family:Arial, sans-serif;font-size:11px;background-color:#f5f5f5;margin-bottom:20px;margin-top:20px;margin-right:0px;margin-left:0px;-webkit-text-size-adjust:none;">
	<table cellpadding="0" cellspacing="0" border="0" width="650" align="center"> <!-- table general -->
		<tr>
			<td bgcolor="#ffffff" align="center" width="650">
				<table cellpadding="0" cellspacing="0" border="0"> <!-- table conteneur -->
					<tr>
						<td>
						<center>
							Si vous rencontrez des difficult&#233;s pour visualiser cette newsletter, consultez la <a href="<?php echo url('node/' . $params['simplenews_source']->getNode()->nid, array('absolute' => TRUE)); ?>" title="Consultez la version en ligne" target="_blank" style="color:#879e33; text-decoration: underline;">version en ligne.</a>
						</center><br/>
						<?php echo $body; ?>
						</td>
					</tr>
				</table>
				</table> <!-- /table conditions -->

			</td> <!-- /td general -->
		</tr><!-- /tr general -->
	</table><!-- /table general -->
</body>
</html>