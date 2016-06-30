<?php

/**
 * @file
 * This template is used to print a single field in a view.
 *
 * It is not actually used in default Views, as this is registered as a theme
 * function which has better performance. For single overrides, the template is
 * perfectly okay.
 *
 * Variables available:
 * - $view: The view object
 * - $field: The field handler object that can process the input
 * - $row: The raw SQL result that can be used
 * - $output: The processed output that will normally be used.
 *
 * When fetching output from the $row, this construct should be used:
 * $data = $row->{$field->field_alias}
 *
 * The above will guarantee that you'll always get the correct data,
 * regardless of any changes in the aliasing that might happen if
 * the view is modified.
 */
?>
<?php
 	global $user;
    $fid = null;
    $extension = '';

    $known_ext = array('jpg','gif','pdf','png','jpeg','xls','xlsx','ppt','pptx','doc','docx','zip','bmp','txt');

    $node_ressource = $row->_field_data['nid']['entity'];

    if(isset($node_ressource->field_ressources_fichier['und'][0]['filename'])) {
        $extension = pathinfo($node_ressource->field_ressources_fichier['und'][0]['filename'], PATHINFO_EXTENSION);
        $filesize = $node_ressource->field_ressources_fichier['und'][0]['filesize'];
        $fid = (int)$node_ressource->field_ressources_fichier['und'][0]['fid'];
        $url = '<a href="' . download_file_url($fid) . '">' . $output . '</a><div class="sizer"> - ' . format_size($filesize) . '</div>';
    } elseif(isset($node_ressource->field_ressources_fichier_prive['und'][0]['filename'])) {
        $extension = pathinfo($node_ressource->field_ressources_fichier_prive['und'][0]['filename'], PATHINFO_EXTENSION);
        $filesize = $node_ressource->field_ressources_fichier_prive['und'][0]['filesize'];
        $fid = (int)$node_ressource->field_ressources_fichier_prive['und'][0]['fid'];
        if(in_array('adherents', $user->roles) || in_array('administrator', $user->roles)){
            $url = '<a href="' . download_file_url($fid) . '">' . $output . '</a><div class="sizer"> - ' . format_size($filesize) . '</div>';
        } else{
            $url = $output . '<div class="sizer"> - ' . format_size($filesize) . '</div>';
        }
    }

    print $url;
?>
