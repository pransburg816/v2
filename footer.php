    </div><!-- #content -->
    <footer id="footer" class="site-footer text-center">
       <div class="container-fluid container-left">
            <div class="footer-widgets">
                <?php dynamic_sidebar('footer-widgets'); ?>
            </div>
            <div class="site-info">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved. </p>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
