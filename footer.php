<footer class="blog-footer">
    <p class="blog-footer-left">
        Copyright © <?php echo(date("Y")) ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a> <?php if (get_option( 'zh_cn_l10n_icp_num' )){ ?>| <a href="http://www.miitbeian.gov.cn/" rel="external nofollow" target="_blank"><?php echo get_option( 'zh_cn_l10n_icp_num' );?></a> <?php } ?></p>
    <p class="blog-footer-right">Powered by <a href="https://wordpress.org" target="_blank">WordPress</a>,Theme <a href="https://weic.me/themes-life/" target="_blank">Life</a></p>
</footer>

</div><!--博客主栏结束-->
<?php get_sidebar(); ?>
</div>
</div>
    <script type="text/javascript">
        hljs.initHighlightingOnLoad();
        hljs.initLineNumbersOnLoad();
        otherF();
        $(document).pjax('a', '#pjax-box', {fragment:'#pjax-box', timeout:8000}).on('pjax:complete', function() {
            $('pre code').each(function(i, block){
                hljs.highlightBlock(block);
            })
            $('code.hljs').each(function(i, block) {
                hljs.lineNumbersBlock(block);
            });
        }).on('pjax:start', function() { NProgress.start(); }).on('pjax:end',   function() {
            NProgress.done();
            otherF();
        });
    </script>
<?php wp_footer(); ?>
</body>
</html>
