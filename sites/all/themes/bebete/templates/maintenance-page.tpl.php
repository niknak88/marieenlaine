<!DOCTYPE html PUBLIC "-//W3C//DTD HTML+RDFa 1.1//EN">
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf->version . $rdf->namespaces; ?>>
<head<?php print $rdf->profile; ?>>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>  
  <?php print $styles; ?>
  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body class="<?php print $classes; ?>">
  
  <div id="page">
    
    <div id="header">
      <div id="zone-branding" class="zone zone-branding clearfix container-12">
        <div class="grid-2 region region-logo" id="region-logo">
          <div class="region-inner region-logo-inner">
            <div class="block block-delta-blocks block-logo block-delta-blocks-logo odd block-without-title" id="block-delta-blocks-logo">
              <div class="block-inner clearfix">
                <div class="content clearfix">
                  <div class="logo-img">
                    <a href="<?php print $base_path; ?>" id="logo" title="Return to the <?php print $site_name; ?> home page" class="active">
                      <img typeof="foaf:Image" src="<?php print $logo; ?>" alt="<?php print $site_name; ?>">
                    </a>
                  </div>
                </div>
              </div>
            </div>  
          </div>
        </div>
        <div class="grid-4 suffix-6 region region-branding" id="region-branding">
          <div class="region-inner region-branding-inner">
            <div class="block block-delta-blocks block-site-name block-delta-blocks-site-name odd block-without-title" id="block-delta-blocks-site-name">
              <div class="block-inner clearfix">
                <div class="content clearfix">
                  <h1 class="site-name">
                    <a href="/" title="Return to the <?php print $site_name; ?> home page">
                      <span><?php print $site_name; ?></span>
                    </a>
                  </h1>    
                </div>
              </div>
            </div>
            <div class="block block-delta-blocks block-site-slogan block-delta-blocks-site-slogan even block-without-title" id="block-delta-blocks-site-slogan">
              <div class="block-inner clearfix">
                <div class="content clearfix">
                  <h6 class="site-slogan"><?php print $site_slogan; ?></h6>
                </div>
              </div>
            </div>  
          </div>
        </div>  
      </div>
    </div>

    <div id="container" class="clearfix container-12">
        <div id="content">
          <?php if (!empty($title)): ?><h2 class="title" id="page-title"><?php print $title; ?></h2><?php endif; ?>
          <div id="content-content" class="clearfix">
            <?php print $content; ?>
          </div> <!-- /content-content -->
        </div> <!-- /content -->
    </div> <!-- /container -->
  
  </div> <!-- /page -->
  
</body>
</html>