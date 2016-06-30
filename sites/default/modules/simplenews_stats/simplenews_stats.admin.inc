<?php

function simplenews_stats_load_data($node){
    /**
     * Requetes BDD
     */
    
    // Chargements des stats sur les envoies & ouvertures
    $node_total = db_select('simplenews_newsletter', 'sn')
        ->fields('sn')
        ->condition('nid', $node->nid)
        ->execute()
        ->fetchAssoc();
    
    $node_views = db_select('simplenews_stats_view', 'ssv')
        ->fields('ssv')
        ->condition('nid', $node->nid)
        ->execute()
        ->fetchAssoc();
        
    $query_open = db_select('simplenews_stats_open', 'sso')
        ->fields('sso')
        ->condition('nid', $node->nid)
        ->execute();
    
    // Chargement des stats sur les liens
    $query_links = db_select('simplenews_stats_open_link', 'ssol')
        ->fields('ssol')
        ->condition('nid', $node->nid)
        ->execute();
        
    /**
     * On Compte !
     */
        
    // Comptage des nombres de vues
    $node_count = 0;
    $node_count_total = 0;
    $emails = array();
    
    while($row = $query_open->fetchAssoc()){
        $node_count_total += $row['count'];
        $node_count++;
        
        $emails[$row['email']] = array(
            'open' => $row['count'],
            'clicks' => 0,
        );
    }
    
    // Comptage sur les liens
    $links = array();
    $clicks_total = 0;
    $clicks_unique = 0;
    
    while($row = $query_links->fetchAssoc()){
        // Liste des liens
        if(!isset($links[$row['url']])) $links[$row['url']] = array('total' => 0, 'unique' => 0);
        
        $clicks_total += $row['count'];
        $clicks_unique++;
        
        $links[$row['url']]['total'] += $row['count'];
        $links[$row['url']]['unique']++;
        
        // Liste des emails
        if(!isset($emails[$row['email']])) $emails[$row['email']] = array('clicks' => 0);
        $emails[$row['email']]['clicks'] += $row['count'];
        
        if(!isset($emails[$row['email']]['links'])) $emails[$row['email']]['links'] = array();
        $emails[$row['email']]['links'][$row['url']] = $row['count'];
    }
    
    return array(
        'node_total' => $node_total,
        'node_views' => $node_views,
        'links' => $links,
        'emails' => $emails,
        'node_count' => $node_count,
        'node_count_total' => $node_count_total,
        'clicks_total' => $clicks_total,
        'clicks_unique' => $clicks_unique,
    );
}

/**
 * Page qui affiche les stats sur la newsletter dans des Google Charts
 */
function simplenews_stats_node_tab_charts($node){
    
    $data = simplenews_stats_load_data($node);
    extract($data);
    
    // Count pour les charts
    $links_chart[] = array(
        'Link URL',
        'Click count'
    );
    
    $links_chart_unique[] = array(
        'Link URL',
        'Click count'
    );
    
    foreach($links as $url => $data){
        $links_chart[] = array(
            $url . '  ['.$data['total'].']',
            $data['total']
        );
        
        $links_chart_unique[] = array(
            $url . '  ['.$data['unique'].']',
            $data['unique']
        );
    }
    
    return '
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        // Load the Visualization API and the piechart package.
        google.load(\'visualization\', \'1.0\', {\'packages\':[\'corechart\']});
        
        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(onChartReady);
        
        function onChartReady(){
            // Chart Bars
            var data = google.visualization.arrayToDataTable([
                ["","Sent", "Opened (unique)", "Opened", "Clicks (unique)", "Clicks", "Views"],
                ["",'.$node_total['sent_subscriber_count'].','.$node_count.','.$node_count_total.','.$clicks_unique.','.$clicks_total.','.$node_views['count'].'],
              ]);
      
            var options = {
                title: "Global statistics",
                vAxis: {title: "",  titleTextStyle: {color: "black"}},
                legend: {
                    position: "bottom"
                }
              };
      
            var chart = new google.visualization.BarChart(document.getElementById("chart-views"));
            chart.draw(data, options);
            
            // Links Unique Pie
            var data = google.visualization.arrayToDataTable('.json_encode($links_chart_unique).');
      
            var options = {
              title: "Links statistics (unique)"
            };
      
            var chart2 = new google.visualization.PieChart(document.getElementById("chart-links"));
            chart2.draw(data, options);
            
            // Links Total Pie
            var data = google.visualization.arrayToDataTable('.json_encode($links_chart).');
      
            var options = {
              title: "Links statistics (total)"
            };
      
            var chart3 = new google.visualization.PieChart(document.getElementById("chart-links2"));
            chart3.draw(data, options);

        }
    </script>
    <div id="chart-views" style="width:800px;margin:auto;height:300px;margin-bottom:50px;">
    </div>
    <div id="chart-links" style="width:800px;margin:auto;height:300px;margin-bottom:50px;">
    </div>
    <div id="chart-links2" style="width:800px;margin:auto;height:300px;">
    </div>';
    
    return $form;
}

/**
 * Page qui affiche les stats des emails sur la newsletter
 */
function simplenews_stats_node_tab_emails($node){
    
    $data = simplenews_stats_load_data($node);
    extract($data);
    
    // Création de la table
    $headers = array(
        'email' => array('data' => 'Email', 'width' => '15%'),
        'open' => array('data' => 'Open', 'width' => '5%'),
        'clicks' => array('data' => 'Clicks', 'width' => '5%'),
        'links' => array('data' => 'Links detail', 'width' => '75%'),
    );
    
    $rows = array();
    foreach($emails as $email => $data){
        
        $links_headers = array(
            'url' => array('data' => 'Link URL', 'width' => '95%'),
            'clicks' => array('data' => 'Clicks', 'width' => '5%'),
        );
        
        $links_rows = array();
        
        $clicks = 0;
        foreach($data['links'] as $url => $count){
            $clicks += $count;
            
            $links_rows[] = array(
                'url' => $url,
                'clicks' => $count,
            );
        }
        
        $row = array(
            'email' => $email,
            'open' => isset($data['open']) ? $data['open'] : 0,
            'clicks' => $clicks,
            'links' => '<div class="links-detail"><a href="javascript:void(0);" class="show-hide-links">Show/Hide links details</a>' . theme_table(array(
                'header' => $links_headers,
                'rows' => $links_rows,
                'attributes' => array(
                    'class' => array('links-details-table'),
                    'style' => 'margin-top:15px;'
                ),
                'caption' => '',
                'colgroups' => null,
                'sticky' => TRUE,
                'empty' => 'No stat found'
            )) . '</div>',
        );
        
        $rows[] = $row;
    }
    
    return theme_table(array(
        'header' => $headers,
        'rows' => $rows,
        'attributes' => array(
            'id' => 'details-table'
        ),
        'caption' => '',
        'colgroups' => null,
        'sticky' => TRUE,
        'empty' => 'No stat found'
    )).
    '<script type="text/javascript">
        jQuery(document).ready(function($){
            $(".links-details-table").hide().addClass("hide");
            
            $(".show-hide-links").bind("click", function(event){
                var parent = $(event.currentTarget).parent();
                var table = $(".links-details-table", parent);
                
                if(table.hasClass("hide")){
                    table.removeClass("hide").show();
                }else{
                    table.addClass("hide").hide();
                }
            });
        });
        </script>';
    
}

/**
 * Stats sur les liens
 */
function simplenews_stats_node_tab_links($node){
    $data = simplenews_stats_load_data($node);
    extract($data);
    
    // Création de la table
    $headers = array(
        'url' => array('data' => 'Link URL', 'width' => '80%'),
        'unique' => array('data' => 'Unique', 'width' => '10%'),
        'total' => array('data' => 'Total', 'width' => '10%'),
    );
    
    $rows = array();
    foreach($links as $url => $data){
        
        $row = array(
            'url' => $url,
            'unique' => $data['unique'],
            'total' => $data['total'],
        );
        
        $rows[] = $row;
    }
    
    return theme_table(array(
        'header' => $headers,
        'rows' => $rows,
        'attributes' => array(
            'id' => 'details-table'
        ),
        'caption' => '',
        'colgroups' => null,
        'sticky' => TRUE,
        'empty' => 'No stat found'
    ));
}