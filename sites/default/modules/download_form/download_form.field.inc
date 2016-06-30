<?php

/*
 * 	hook_field_widget_form_alter(&$element, &$form_state, $context)
 */
function download_form_field_widget_form_alter(&$element, &$form_state, $context){
  
    if($context['field']['type'] == 'file'){
        
        foreach($element as $key => &$value){
            if(is_numeric($key)){
                
                $fid = $value['#default_value']['fid'];
                if($fid){
                    $res = db_select('download_form_files','dff')
                            ->fields('dff',array('status'))
                            ->condition('fid',$fid)
                            ->execute()
                            ->fetchAssoc();
                    $default_value = $res['status'];
                }else{
                    $default_value = 0;
                }
                
                $value['download_form'] = array(
                    '#type' => 'checkbox',
                    '#title' => t('Download form'),
                    '#default_value' => $default_value, 
                );
                
                $value['#process'][] = 'download_form_widget_process';
            }
        }
    }
}

/*
 * Process du widget transformé
 */
function download_form_widget_process($element, &$form_state, $form) {
    
    $item = $element['#value'];
    $item['fid'] = $element['fid']['#value'];
    
    $fid = $item['fid'];
    
    $needs_validation = (isset($element['#needs_validation'])) ? true : false;
    $download_form = (isset($item['download_form'])) ? $item['download_form'] : 0;

    if($needs_validation){
        $reqExists = db_select('download_form_files','dff')
                        ->fields('dff',array('fid'))
                        ->condition('fid',$fid)
                        ->execute()->fetchAssoc();
                        
        if($reqExists){
            db_update('download_form_files')
                ->condition('fid',$fid)
                ->fields(array('status' => $download_form))
                ->execute();
        }else{
            db_insert('download_form_files')
                ->fields(array('fid','status'),array($fid,$download_form))
                ->execute();
        }
    }

    return $element;
}

/**
 * Implements hook_field_formatter_info().
 *
 * Add file_force formatters to file/image fields.
 */
function download_form_field_formatter_info() {
    $formatters = array();
    
    // Handle file field files.
    $formatters['download_form_file_default'] = array(
        'label' => t('Download Form : Download form'),
        'field types' => array('file'),
    );
    
    return $formatters;
}

/**
 * Implements hook_field_formatter_view().
 */
function download_form_field_formatter_view($entity_type, $entity, $field, $instance, $langcode, $items, $display){
    
    $element = array();
    $separator = variable_get('clean_url', FALSE) ? '?' : '&';
    
    switch ($display['type']) {
        case 'download_form_file_default':
            foreach ($items as $delta => $item) {
                $element[$delta] = array(
                    '#theme' => 'download_form_link',
                    '#file' => (object) $item,
                );
            }
        break;
    }
    
    return $element;
}

/**
 * Implements hook_theme().
 */
function download_form_theme() {
    $theme = array();
  
    // File field formatters
    $theme['download_form_link'] = array(
        'variables' => array('file' => NULL),
    );
  
    return $theme;
}

/*
 * Theme du lien
 */
function theme_download_form_link($variables){
    
    $file = $variables['file'];
    $fid = $file->fid;
    $df = download_form_load((int)$fid);
    
    if(!$df){
        $df['fid'] = $fid;
        $df['status'] = variable_get('download_form_default','');
    }
    
    if($df['status']){
        $url = download_form_path($fid);
    }else{
        $url = download_form_download_path(md5($fid));
    }
  
    // Use the description as the link text if available.
    if (empty($file->description)) {
        $link_text = $file->filename;
    }
    else {
        $link_text = $file->description;
        $options['attributes']['title'] = check_plain($file->filename);
    }
    
    $options['query'] = drupal_get_destination();
  
    return '<span class="file">' . l($link_text, $url, $options) . '</span>';
}

?>