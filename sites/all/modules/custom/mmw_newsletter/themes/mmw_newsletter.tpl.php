<!DOCTYPE html>
<html>
  <head>
    <title><?php $header_title; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
  </head>
  <!-- 
  GREEN : #8CB13F
  BLACK : #30302E
  GREY-L: #CDCBCC
  GREY-M: #A3A1A2
  GREY  : #5F5D5E
  -->
  <body bgcolor="#202020"  style="background:#202020;margin-top:0;font-family:Arial, Helvetica, sans-serif">
    <table cellpadding="0" cellspacing="0" width="100%">
      <tr>
        <td align="center">
          <!-- START TABLE content: Your content in this table -->
          <table cellpadding="0" cellspacing="0" width="650">
            <tr>
              <td bgcolor="#ffffff" width="25">&nbsp;</td>
                <?php print $header; ?>
              <td bgcolor="#ffffff">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" bgcolor="#ffffff">&nbsp;</td>
            </tr>
            <tr>
              <td bgcolor="#ffffff"><img src="<?php print $hpixel; ?>" alt="pixel" title="pixel" width="1" height="35" /></td>
              <td bgcolor="#ffffff">
                <!-- Content title1:  -->
                <?php if (!empty($title)): ?>
                  <span style="color:#8CB13F;font-size:30px;"><?php print $title; ?></span>
                <?php endif; ?>

                <!-- START TABLE List items: Your list item here-->
                <?php if (!empty($image)): ?>
                </br></br>
                <img style='width: 100%;' src='<?php print $image['url']; ?>' height='<?php print $image['height']; ?>' width='<?php print $image['width']; ?>'/>
                <?php endif; ?>
                <?php print $summary; ?>

                <?php print $content; ?>
                <!-- END TABLE List items:-->
              </td>
              <td bgcolor="#ffffff">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" bgcolor="#ffffff" style="height:35px"><img src="<?php print $hpixel; ?>" alt="pixel" title="pixel" width="1" height="35" /></td>
            </tr>
            <tr>
              <td colspan="3" bgcolor="#282828" style="height:20px"><img src="<?php print $hpixel; ?>" alt="pixel" title="pixel" width="1" height="20" /></td>
            </tr>
            <?php print $footer; ?>
          </table>
          <!-- END TABLE content -->
        </td>
      </tr>
    </table>
  </body>
</html>