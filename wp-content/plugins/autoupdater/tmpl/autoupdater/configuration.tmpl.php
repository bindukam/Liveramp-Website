<div id="autoupdater-page">
    <div class="autoupdater-template-wrapper">
        <?php echo $template_active; ?>
    </div>
    <?php if (!empty($template_inactive)) : ?>
        <div class="autoupdater-template-wrapper" style="display: none;">
            <?php echo $template_inactive; ?>
        </div>
    <?php endif; ?>
    <div id="autoupdater-form-wrapper">
        <?php include dirname(dirname(__FILE__)) . '/configuration_form.tmpl.php'; ?>
    </div>
</div>
