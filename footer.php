    <footer>
        <div class="footer__content railed">
             <?php wp_nav_menu( array( 'menu' => 'nav-footer-links', 'menu_class' => 'footer__links' ) ); ?>
            <?php wp_nav_menu( array( 'menu' => 'nav-footer-social', 'menu_class' => 'footer__social' ) ); ?>
        </div>
        <div class="footer__meta railed">
            <p class="footer__copyright"><?php echo date('Y'); ?>&copy;.Vinali Staffing. All Rights Reserved.</p>
            <a class="footer__designed" href="http://www.danielbeacham.com">
                Site designed and developed by Beacham
            </a>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>