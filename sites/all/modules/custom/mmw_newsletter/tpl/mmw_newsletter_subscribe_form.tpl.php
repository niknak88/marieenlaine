<?php if(variable_get("mmw_newsletter_show_description", TRUE)): ?>
  <div class="mmw-newsletter-description"><?php echo t('Description subscribe/unsubscribe on Newsletters'); ?></div>
<?php endif; ?>
<p class="text-success mmw-newsletter-success" style="display: none;"></p>
<p class="text-danger mmw-newsletter-danger" style="display: none;"></p>
<div class="ajax-form-newsletter">
    <div class="form-group">
        <label for="mmw-newsletter-email"><?php echo t("Votre mail"); ?></label>
        <input type="email" id="mmw-newsletter-email" class="mmw-newsletter-email-input form-control" value="" placeholder="<?php echo t("Email"); ?>"/>
    </div>
    <input type="submit" class="btn btn-success mmw-newsletter-subscribe" value="<?php echo t("Subscribe"); ?>"/>
    <?php if(variable_get("mmw_newsletter_show_unsubscribe", TRUE)): ?>
    <input type="submit" class="btn btn-warning mmw-newsletter-unsubscribe" value="<?php echo t("Unsubscribe"); ?>"/>
    <?php endif; ?>
</div>
<script>
    jQuery(".mmw-newsletter-subscribe").click(function(e){
        e.preventDefault();
        jQuery.ajax({
            url: '<?php echo url("makemeweb-newsletter/subscribe"); ?>',
            data: {
                "email" : jQuery('.mmw-newsletter-email-input').val()
            },
            type: "POST",
            dataType: "json",
            success: function(data)
            {
                if(data.status === "OK")
                {
                    jQuery('.mmw-newsletter-success').html(data.message).show();
                    jQuery('.mmw-newsletter-danger').hide();
                }
                else
                {
                    jQuery('.mmw-newsletter-danger').html(data.message).show();
                    jQuery('.mmw-newsletter-success').hide();
                }
            }
        });
    });
    jQuery(".mmw-newsletter-unsubscribe").click(function(e){
        e.preventDefault();
        jQuery.ajax({
            url: '<?php echo url("makemeweb-newsletter/unsubscribe"); ?>',
            data: {
                "email" : jQuery('.mmw-newsletter-email-input').val()
            },
            type: "POST",
            dataType: "json",
            success: function(data)
            {
                if(data.status === "OK")
                {
                    jQuery('.mmw-newsletter-success').html(data.message).show();
                    jQuery('.mmw-newsletter-danger').hide();
                }
                else
                {
                    jQuery('.mmw-newsletter-danger').html(data.message).show();
                    jQuery('.mmw-newsletter-success').hide();
                }
            }
        });
    });
</script>