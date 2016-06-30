Fonctionnalités
---------------

    - Ajoute un bouton sur l'onglet "Newsletter" qui permet de changer le status d'une news pour pouvoir la renvoyer
    - Affiche le nombre restant de mails dans la queue
    - Propose 2 pages pour l'inscription (on utilise les blocs de Simplenews) newsletter/subscribe & newsletter/subscribe/[TID]
    - Affiche le temps restant sur les Batch Drupal
    - Propose un nouveau theme_suggestion sur le simplenews-newsletter-body--[NODE-TYPE].tpl.php
        simplenews-newsletter-footer--[NODE-TYPE].tpl.php


Installation
------------

Pour que le mail de fin d'envoi puisse être envoyé il faut rajouter :

    module_invoke_all('simplenews_sent', node_load($nid));
    
A la ligne 623 du fichier simplenews/includes/simplenews.mail.inc