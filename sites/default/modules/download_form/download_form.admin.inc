<?php

function download_form_admin_list(){
    
    drupal_add_js(drupal_get_path('module', 'download_form').'/download_form.js');
    drupal_add_css(drupal_get_path('module', 'download_form').'/download_form.css');
    
    $headers = array(
        'sid' => array('data' => t('SID'), 'field' => 'sid', 'sort' => 'desc'),
        'fid' => array('data' => t('File'), 'field' => 'fid'),
        'node' => array('data' => t('Node'), 'field' => 'nid'),
        'uid' => array('data' => t('User'), 'field' => 'uid'),
        'date' => array('data' => t('Date'), 'field' => 'date'),
        'data' => array('data' => t('Data'))
    );
    
    $input_form = drupal_get_form('form_download',0);
    $fields = $input_form['user_infos'];
    
    $sids = db_select('download_form','df')
                ->extend('PagerDefault')
                ->extend('TableSort')
                ->fields('df',array('sid'))
                ->condition('downloaded',1)
                ->orderByHeader($headers)
                ->limit(100)
                ->execute()
                ->fetchCol();
    
    $options = array();
    foreach($sids as $sid){
        $submission = db_select('download_form','df')
                        ->fields('df',array())
                        ->condition('sid',$sid)
                        ->execute()
                        ->fetchAssoc();
                        
        $file = file_load($submission['fid']);
        $file_url = file_create_url($file->uri);
        
        $file_usage = db_select('file_usage','fu')
                        ->fields('fu',array())
                        ->condition('fid',$submission['fid'])
                        ->condition('type','node')
                        ->execute()
                        ->fetchAssoc();
        
        if($file_usage){
            $node = node_load($file_usage['id']);
            $node_title = $node->title;
            $node_url = drupal_get_path_alias('node/'.$node->nid);
        }
        
        if($submission['uid'] > 0){
            $user = user_load($submission['uid']);
            $user_name = $user->name;
            $user_url = drupal_get_path_alias('user/'.$user->uid);
        }else{
            $user_name = 'Anonyme';
            $user_url = '';
        }
        
        $data = unserialize($submission['user']);
        
        $data_text = '
        <div class="list-infos">
                <a class="list-button" href="javascript:void(0);">'.t('Show/hide data').'</a>
                <div class="list-content">
                    <ul>';
        foreach($data as $key => $value){
			if(is_array($value)){
				$value = implode(', ',$value);
			}
            $data_text .= '<li>' . $fields[$key]['#title'] . ' : ' . $value .'</li>';
        }
        $data_text .= '<ul>
        </div></div>';

        
        $options[$sid] = array(
            'sid' => $sid,
            'fid' => array(
                'data' => array(
                    '#type' => 'link',
                    '#title' => $file->filename,
                    '#href' => $file_url,
                ),
            ),
            'node' => array(
                'data' => array(
                    '#type' => 'link',
                    '#title' => $node_title,
                    '#href' => $node_url,
                ),
            ),
            'date' => $submission['date'],
            'data' => $data_text,
        );
        
        if(!empty($user_url)){
            $options[$sid]['uid'] = array(
                'data' => array(
                    '#type' => 'link',
                    '#title' => $user_name,
                    '#href' => $user_url,
                ),
            );
        }else{
            $options[$sid]['uid'] = $user_name;
        }
    }
    
    $form['nodes'] = array(
        '#type' => 'tableselect',
        '#header' => $headers,
        '#options' => $options,
        '#empty' => t('No downloaded file available.'),
        '#js_select' => false,
    );
    $form['pager'] = array('#markup' => theme('pager'));
    
    return $form;
}

function download_form_admin_export(){
    
    $filename = 'export_downloaded_files_'.date('Y-m-d_H-i-s').'.csv';
    $file_content = '';
    
    $input_form = drupal_get_form('form_download',0);
    $fields = $input_form['user_infos'];
    
    $submissions = db_select('download_form','df')
                ->fields('df',array())
                ->condition('downloaded',1)
                ->orderBy('sid')
                ->execute()
                ->fetchAllAssoc('sid');
                
    $header_csv = '"SID";"'.t('File').'";"'.t('Node').'";"'.t('User').'";"'.t('Date').'";';
    
    foreach($fields as $name => $field){        
        if(!@preg_match('/^#/',$name)){
            $header_csv .= '"'.$field['#title'].'";';
        }
    }
    
    foreach($submissions as $sid => $submission){
        
        $submission = (array)$submission;
        
        $file = file_load($submission['fid']);
        $file_url = file_create_url($file->uri);
        
        $file_usage = db_select('file_usage','fu')
                        ->fields('fu',array())
                        ->condition('fid',$submission['fid'])
                        ->condition('type','node')
                        ->execute()
                        ->fetchAssoc();
        
        if($file_usage){
            $node = node_load($file_usage['id']);
            $node_url = drupal_get_path_alias('node/'.$node->nid);
            $node_url = url($node_url,array('absolute' => TRUE));
        }
        
        if($submission['uid'] > 0){
            $user = user_load($submission['uid']);
            $user_name = $user->name;
            $user_url = drupal_get_path_alias('user/'.$user->uid);
        }else{
            $user_name = 'Anonyme';
            $user_url = '';
        }
        
        $row = '"'.$sid.'";"'.$file_url.'";"'.$node_url.'";"'.$user_name.'";"'.$submission['date'].'";';
        
        $data = unserialize($submission['user']);

        foreach($fields as $name => $field){        
            if(!@preg_match('/^#/',$name)){
				
				if(is_array($data[$name])){
					$data[$name] = implode(', ',$data[$name]);
				}
				
                $row .= '"'.$data[$name].'";';
            }
        }        
        
        $rows[] = $row;
    }
    
    $file_content .= $header_csv."\r\n";
    $file_content .= implode("\r\n",$rows);
    
    $headers = array(
        'Content-Type'              => 'force-download',
        'Content-Disposition'       => 'attachment; filename="' . $filename . '"',
        'Content-Length'            => strlen($file_content),
        'Content-Transfer-Encoding' => 'binary',
        'Pragma'                    => 'no-cache',
        'Cache-Control'             => 'must-revalidate, post-check=0, pre-check=0',
        'Expires'                   => '0',
        'Accept-Ranges'             => 'bytes'
    );
    
    drupal_send_headers($headers);
    //*/
    
    print utf8_decode($file_content);
    
    return;
}

function download_form_admin_settings(){
    
    $languages = language_list();
    
    $form['default_behavior'] = array(
        '#type' => 'checkbox',
        '#title' => t('Enable form by default'),
        '#default_value' => variable_get('download_form_default',0),
    );
    
    $form['intros'] = array(
        '#title' => t('Header text form'),
        '#type' => 'fieldset',
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    
    foreach($languages as $key => $language){
        $form['intros'][$key] = array(
            '#title' => $language->native,
            '#type' => 'textarea',
            '#default_value' => variable_get('download_form_intro_'.$key,''),
        );
    }
    
    $form['dl_intros'] = array(
        '#title' => t('Header text download page'),
        '#type' => 'fieldset',
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    
    foreach($languages as $key => $language){
        $form['dl_intros'][$key] = array(
            '#title' => $language->native,
            '#type' => 'textarea',
            '#default_value' => variable_get('download_form_dl_intro_'.$key,''),
        );
    }
    
    $form['submit'] = array(
        '#type' => 'submit',
        '#default_value' => t('Save'),
    );
    
    $form['#tree'] = TRUE;
    
    return $form;
}

function download_form_admin_settings_submit($form, &$form_state){
    $intros = $form_state['values']['intros'];
    $dl_intros = $form_state['values']['dl_intros'];
    foreach($intros as $key => $value){
        variable_set('download_form_intro_'.$key,$value);
    }
    
    foreach($dl_intros as $key => $value){
        variable_set('download_form_dl_intro_'.$key,$value);
    }
    variable_set('download_form_default',$form_state['values']['default_behavior']);
}

?>