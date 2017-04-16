<table cellpadding="0" cellspacing="0">
  <?php foreach ($items as $item): ?>
    <tr>
      <td width="236" valign="middle">
        <?php
        if (isset($item['pict'])) {
          print $item['pict'];
        }
        ?>
      </td>

      <td width="10">&nbsp;</td>
      <td width="354">
        <!-- START TABLE infos items: Your infos items here-->
        <table cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="3">
              <span style="color:#8CB13F;"><?php print $item['date']; ?></span>
            </td>
          </tr>
          <tr>
            <td colspan="3">
              <span style="color:#30302E;font-size:25px"><?php print $item['title']; ?></span>
            </td>
          </tr>
          <tr>
            <td colspan="3">
                <!-- Content texts (for each paragraph, copy from '<p>' to '</p>')  -->
              <p style="color:#5F5D5E;font-size: 13px;">
  <?php print $item['body']; ?>
              </p>
            </td>
          </tr>
          <tr>
            <td colspan="3">
              <img src="<?php print $hpixel; ?>" alt="pixel" title="pixel" width="1" height="7" />
            </td>
          </tr>
          <tr>
            <td bgcolor="#8CB13F" align="center" height="35" width="100">
              <!-- Link more infos (in href attribute) -->
              <a href="<?php print $item['more']; ?>" style="color:#ffffff;font-size: 16px;text-decoration:none;">plus d'infos</a>
            </td>
            <td width="127">&nbsp;</td>
            <td width="127">&nbsp;</td>
          </tr>
        </table>
        <!-- END TABLE List items: Your infos items here-->
      </td>
    </tr>
    <tr>
      <td colspan="3" height="35"><img src="<?php print $hpixel; ?>" alt="pixel" title="pixel" width="1" height="35" /></td>
    </tr>
<?php endforeach; ?>
</table>