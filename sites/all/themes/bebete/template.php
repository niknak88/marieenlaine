<?php

/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 * 
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
 */

function bebete_preprocess_maintenance_page(&$vars){ 
  $vars['logo'] = path_to_theme().'/logo.png';
  $vars['site_name'] = variable_get('site_name', "Marie-Hélène Saerens");
  $vars['site_slogan'] = variable_get('site_slogan', "Graphiste Designer & Illustratrice");
  
  
  //http://marieenlaine.net/sites/all/themes/omega/alpha/css/grid/alpha_default/wide/alpha-default-wide-12.css?mmzc6f
  //http://marieenlaine.net/sites/all/themes/omega/alpha/css/grid/alpha_default/wide/alpha-default-wide-12.css?mmzc6f
  $vars['styles'] = drupal_add_css(path_to_theme() . '/css/global.css');
  $vars['styles'] .= drupal_add_css(drupal_get_path('theme', 'alpha').'/css/grid/alpha_default/wide/alpha-default-wide-12.css');
}
