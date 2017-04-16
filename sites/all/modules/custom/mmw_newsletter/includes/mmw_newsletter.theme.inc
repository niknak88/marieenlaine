<?php

function mmw_newsletter_page($nid) {

  // check $nid is numeric a id of node
  if (is_numeric($nid)) {

    global $theme_path;
    global $base_url;

    $module_path = $base_url . '/' . drupal_get_path('module', 'mmw_newsletter');

    $node = node_load($nid);
    $site_name = variable_get('site_name');

    $data = array();


//-- Header variable setup
    // title H1 to newsletter (title of website)
    $header['header_title'] = $site_name;
    // link for show all image in newsletter
    $header['show_pictures'] = array(
        'string' => t('Cliquez ici pour voir les images'),
        'link' => '%%webversion%%'//drupal_lookup_path('alias', 'node/' . $node->nid),
    );
    // link for unsubscription in newsletter
    // main logo in newsletter
    $header['logo'] = array(
        'src' => $base_url . "/" . $theme_path . "/logo.png",
        'alt' => $site_name,
        'width' => 369,
        'height' => 92,
    );
    // link to website access
    $header['link_site'] = array(
        'string' => t('Visiter le site @name', array('@name' => $site_name)),
        'link' => $base_url,
    );

    $header['hpixel'] = $module_path . '/themes/images/hpixel.gif';
//-- End Header variable setup

    $data['header'] = theme('mmw_newsletter_header', $header);

    // title H2 to newsletter (this newsletter)
    $data['title'] = $node->title;
    // description before list of news
    $lang_body = field_language('node', $node, 'body');
    if(isset($node->body[$lang_body]))
    {
        $data['summary'] = $node->body[$lang_body][0]['value'];
    }
    else
    {
        $data["summary"] = "";
    }
    
    
    $data['image'] = '';
    if(isset($node->field_pictures) && !empty($node->field_pictures) ){
      $data['image']['url'] = file_create_url($node->field_pictures[LANGUAGE_NONE][0]['uri']);
      $data['image']['width'] = $node->field_pictures[LANGUAGE_NONE][0]['width'];
      $data['image']['height'] = $node->field_pictures[LANGUAGE_NONE][0]['height'];
    }
    
    $footer['unsubscribe'] = array(
        'string' => t('Désinscription'),
        'link' => '%%unsubscribelink%%',
    );
    $footer['hpixel'] = $module_path . '/themes/images/hpixel.gif';

    $data['footer'] = theme('mmw_newsletter_footer', $footer);

    $data['hpixel'] = $module_path . '/themes/images/hpixel.gif';
    // list (table) news for this newsletter
    $data['content'] = '';

    // Check if function exist 
    if (function_exists('mmw_newsletter_get_content')) {
      $content = mmw_newsletter_get_content($data, $node);
    } else {
      // for each node referenced on newsletter node, get title, body (trimed+...), picture and read more)
      //-- Attention :: field_newsletter_select_content est le champs entity reference, modifier sur chaque site
      if (isset($node->field_newsletter_select_content)) {
        $content = array();
        $lang_field_newsletter_select_content = field_language('node', $node, 'field_newsletter_select_content');
        foreach ($node->field_newsletter_select_content[$lang_field_newsletter_select_content] as $key => $item_id) {

          $item = node_load(reset($item_id));
          $lang_field_body_item = field_language('node', $item, 'body');
          // create variable to used on template
          $content['items'][$key] = array(
              'title' => $item->title,
              'body' => views_trim_text(array('max_length' => 70, 'word_boundary' => TRUE, 'ellipsis' => TRUE, 'html' => TRUE), $item->body[$lang_field_body_item][0]['value']),
              'date' => date('d-m-Y', $item->created),
              'more' => url('node/' . $item->nid, array('absolute' => TRUE)),
          );
          // set style for picture
          if (isset($item->field_image)) {
            $lang_field_image = field_language('node', $item, 'field_image');
            $teaser_image = array(
                'style_name' => 'thumbnail', // change for different format
                'path' => $item->field_image[$lang_field_image][0]['uri'],
                'width' => '236',
                'height' => '144',
                'alt' => $item->field_image[$lang_field_image][0]['alt'],
                'title' => $item->field_image[$lang_field_image][0]['title'],
            );
            $content['items'][$key]['pict'] = theme('image_style', $teaser_image);
          }
        }
      }
    }
    if ($content != '') {
      // list (table) news for this newsletter
      $content['hpixel'] = $module_path . '/themes/images/hpixel.gif';
      $data['content'] = theme('mmw_newsletter_body', $content);
    }
    // render template for newsletter (table + css inline)
    print theme('mmw_newsletter', $data);
    //return ''; // for debug
  }
}

/**
 * Implements hook_theme().
 */
function mmw_newsletter_theme() {
  return array(
      'mmw_newsletter' => array(
          'arguments' => array('data' => array()),
          'path' => drupal_get_path('module', 'mmw_newsletter') . '/themes',
          'template' => 'mmw_newsletter'
      ),
      'mmw_newsletter_body' => array(
          'arguments' => array('data' => array()),
          'path' => drupal_get_path('module', 'mmw_newsletter') . '/themes',
          'template' => 'mmw_newsletter_body'
      ),
      'mmw_newsletter_header' => array(
          'arguments' => array('data' => array()),
          'path' => drupal_get_path('module', 'mmw_newsletter') . '/themes',
          'template' => 'mmw_newsletter_header'
      ),
      'mmw_newsletter_footer' => array(
          'arguments' => array('data' => array()),
          'path' => drupal_get_path('module', 'mmw_newsletter') . '/themes',
          'template' => 'mmw_newsletter_footer'
      ),
      "mmw_newsletter_subscribe_form" => array(
          "arguments" => array(),
          "template" => "tpl/mmw_newsletter_subscribe_form"
      )
  );
}
