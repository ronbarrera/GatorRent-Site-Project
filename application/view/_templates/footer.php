<div class="panel-footer text-center">
    <ul>
        <a href="<?php echo URL; ?>home/conditionsOfUse" target="_blank">Conditions of Use</a>
        <a href="<?php echo URL; ?>home/privacyNotice" target="_blank">Privacy Notice</a>
        <a href="<?php echo URL; ?>home/contactUs" target="_blank">Contact Us</a>
        <div class="footer">
        Find <a href="https://github.com/panique/mini">MINI on GitHub</a>.
        If you like the project, support it by <a href="http://tracking.rackspace.com/SH1ES">using Rackspace</a> as your hoster [affiliate link].
    </div>
    </ul>
</div>
    <!-- backlink to repo on GitHub, and affiliate link to Rackspace if you want to support the project -->
    <!-- jQuery, loaded in the recommended protocol-less way -->
    <!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
    <!-- moved to _templates/header.php -->
    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

    <!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
    <script>
        var url = "<?php echo URL; ?>";
    </script>

    <!-- our JavaScript -->
    <script src="<?php echo URL; ?>js/application.js"></script>
</body>
</html>
