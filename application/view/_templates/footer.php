<div class="panel-footer text-center">
    <ul>
        <a href="<?php echo URL; ?>home/conditionsofuse" target="_blank">Conditions of Use</a>
        <a href="<?php echo URL; ?>home/privacynotice" target="_blank">Privacy Notice</a>
        <a href="<?php echo URL; ?>home/contactus" target="_blank">Contact Us</a>
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

    <!-- Google Analytics tracking -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-88746021-1', 'auto');
        ga('send', 'pageview');
    </script>
</body>
</html>
