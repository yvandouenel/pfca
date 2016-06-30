<?php

/*
 * Formulaire d'enregistrement
 */
function form_download($form, &$form_state, $fid, $node = null){
    
    global $user,$language;

    if(isset($_COOKIE['Drupal_visitor_download_form'])){
        $infos = unserialize($_COOKIE['Drupal_visitor_download_form']);
    }
    
    $form['intro'] = array(
        '#type' => 'markup',
        '#markup' => nl2br(variable_get('download_form_intro_'.$language->language,'')),
    );
    
    /*
     * USER INFOS
     * Les données appartenant a 'user_infos' seront stockées dans un tableau sérializé
     */
    $form['user_infos'] = array(
        '#type' => 'container',
    );
    
    /*
    $form['user_infos']['genre'] = array(
        '#type' => 'radios',
        '#default_value' => (isset($infos['genre'])) ? $infos['genre'] : '',
        '#options' => array(
            'mr' => t('Mr'),
            'mrs' => t('Mrs'),
        ),
    );
    */
    
    $form['user_infos']['societe'] = array(
        '#type' => 'textfield',
        '#title' => t('Company'),
        '#default_value' => (isset($infos['societe'])) ? $infos['societe'] : '',
        '#required' => TRUE,
    );
    
    
    $form['user_infos']['job'] = array(
        '#type' => 'textfield',
        '#title' => t('Job Title'),
        '#default_value' => (isset($infos['job'])) ? $infos['job'] : '',
        '#required' => TRUE,
    );
    
    /*
    $form['user_infos']['domaine_activite'] = array(
        '#type' => 'select',
        '#title' => t('Main activity'),
        '#required' => TRUE,
        '#default_value' => (isset($infos['domaine_activite'])) ? $infos['domaine_activite'] : '',
        '#options' => array(
            //Attention si vous changez cette liste merci de le faire aussi dans le download_form.admin.inc pour le mode liste et l'export
            t('- None -'),
            t('Aerospace'),
            t('Agricultural equipment'),
            t('Food insdustry'),
            t('Automotive'),
            t('Construction/Mine equipment'),
            t('Metal industry'),
            t('Motorcycle/ Bicycle'),
            t('Other'),
            t('Energy'),
            t('Foundry'),
            t('Hand truck and lifting equipment'),
            t('Metal working industry'),
            t('Medical'),
            t('Metallurgy'),
            t('Engine industry'),
            t('Oil & gas'),
            t('Heavy truks and trailer'),
            t('Plastic industry'),
            t('Shipping and Railway industry'),
            //Attention si vous changez cette liste merci de le faire aussi dans le download_form.admin.inc pour le mode liste et l'export
        ),
    );
    */
    
    $form['user_infos']['nom'] = array(
        '#type' => 'textfield',
        '#title' => t('Last Name'),
        '#default_value' => (isset($infos['nom'])) ? $infos['nom'] : '',
        '#required' => TRUE,
    );
    
    $form['user_infos']['prenom'] = array(
        '#type' => 'textfield',
        '#title' => t('First Name'),
        '#default_value' => (isset($infos['nom'])) ? $infos['nom'] : '',
        '#required' => TRUE,
    );
    
    /*
    $form['user_infos']['adress'] = array(
        '#type' => 'textfield',
        '#title' => t('Adress'),
        '#default_value' => (isset($infos['adress'])) ? $infos['adress'] : '',
        '#required' => TRUE,
    );
    
    $form['user_infos']['zip'] = array(
        '#type' => 'textfield',
        '#title' => t('ZIP'),
        '#default_value' => (isset($infos['zip'])) ? $infos['zip'] : '',
        '#required' => TRUE,
    );
    */
    
    $form['user_infos']['city'] = array(
        '#type' => 'textfield',
        '#title' => t('City'),
        '#default_value' => (isset($infos['city'])) ? $infos['city'] : '',
        '#required' => TRUE,
    );
    
    /*
    $form['user_infos']['country'] = array(
        '#type' => 'textfield',
        '#title' => t('Country'),
        '#default_value' => (isset($infos['country'])) ? $infos['country'] : '',
        '#required' => TRUE,
    );
    */
    
    $form['user_infos']['phone'] = array(
        '#type' => 'textfield',
        '#title' => t('Phone'),
        '#default_value' => (isset($infos['phone'])) ? $infos['phone'] : '',
        '#required' => TRUE,
    );
    
    $form['user_infos']['email'] = array(
        '#type' => 'textfield',
        '#title' => t('Email'),
        '#default_value' => (isset($infos['email'])) ? $infos['email'] : '',
        '#required' => TRUE,
    );
    
    /*
    $form['user_infos']['categorie'] = array(
        '#type' => 'checkboxes',
        '#title' => t('Visitor category'),
        '#default_value' => (isset($infos['categorie'])) ? $infos['categorie'] : array(),
        '#required' => TRUE,
        '#options' => array(
            'Scolaire' => t('School'),
            'Centre de loisirs' => t('Recreation center'),
            'Associations et amicales' => t('Associations and friendships'),
            'Grand public' => t('Public'),
        ),
    );
    
    
    $form['user_infos']['comment'] = array(
        '#type' => 'textarea',
        '#title' => t('Comment'),
        '#default_value' => (isset($infos['comment'])) ? $infos['comment'] : '',
    );
    
    */
    
    
    /*
     * FILE INFOS
     * Necessaire au téléchargement
     */
    $form['file_infos'] = array(
        '#type' => 'container',
    );
    
    $form['file_infos']['fid'] = array(
        '#type' => 'hidden',
        '#default_value' => $fid,
        '#required' => TRUE,
    );
    
    $form['file_infos']['nid'] = array(
        '#type' => 'hidden',
        '#default_value' => ($node && isset($node->nid)) ? $node->nid : 0,
    );
    
    $form['file_infos']['uid'] = array(
        '#type' => 'hidden',
        '#default_value' => $user->uid,
    );
    
    $file_array = download_form_load($fid);
    $my_fid = $file_array['fid'];
    $my_file = file_load($my_fid);
    $path = file_create_url($my_file->uri);
    $form['direct_link'] = array(
        '#type' => 'markup',
    	'#markup' => l(t('Ignore this message and download the document.'),$path.'?dl').'<br /><br />',
    );
    
    // Submit button
    $form['submit'] = array(
        '#type' => 'submit',
        '#default_value' => t('Submit'),
    );
    
    // Keep tree for $form_state['values']
    $form['#tree'] = TRUE;
    
    return $form;
}

function form_download_validate($form, &$form_state){
    if(!valid_email_address($form_state['values']['user_infos']['email'])){
        form_set_error('email',t('Email adress not valid'));
    }
}

function form_download_submit($form, &$form_state){
    
    foreach($form_state['values']['user_infos'] as &$user_field){
        if(is_array($user_field)){
            foreach($user_field as $key => $value){
                if(!$value){
                    unset($user_field[$key]);
                }
            }
        }
    }
    
    $df = download_form_load($form_state['values']['file_infos']['fid']);
    if(!$df){
        drupal_set_message(t('File doesn\'t exists'),'error');
        return;
    }
    
    $key = md5(time());
    
    db_insert('download_form')
        ->fields(
            array('fid','uid','nid','date','cle','downloaded','user'),
            array(
                $df['fid'],
                $form_state['values']['file_infos']['uid'],
                $form_state['values']['file_infos']['nid'],
                date('Y-m-d H:i:s'),
                $key,
                0,
                serialize($form_state['values']['user_infos'])
            )
        )
        ->execute();
    
    user_cookie_save(array(
        'download_form' => serialize($form_state['values']['user_infos']),
    ));
    
    $options = array(
        'query' => drupal_get_destination() + array('key' => $key),
        'absolute' => TRUE,
    );
    
    $form_state['redirect'] = url('download-form/dl/'.$form_state['values']['file_infos']['fid'],$options);
    // Evite l'override du redirect
    unset($_GET['destination']);
}

function form_download_page($fid){
    
    global $language;
    
    $path = download_form_download_path($fid);
    $link = l(t('Download file'),$path,array('query' => array('key' => $_GET['key']) + drupal_get_destination()));
    
    return '
        '.nl2br(variable_get('download_form_dl_intro_'.$language->language,'')).'
        <br/><br/>
        '.$link.'
        <br/><br/>
        <a href="/'.drupal_get_path_alias($_GET['destination']).'">'.t('Go back').'</a>
        <br/><br/>
    ';
}

?>
