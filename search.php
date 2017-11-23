<?php get_header(); ?>

<header class="blog-post-page-title blog-search-page-title">
    <h4 class="page-title"><?php printf( __( '关键词 “%s” 的搜索结果'), get_search_query() ); ?></h4>
</header>

<div class="blog-main-post blog-post-page-box">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article class="blog-post-block">
            <header>
                <?php if(has_post_thumbnail()){ ?>
                    <div class="blog-post-block-img">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php } ?>
            </header>
            <div class="blog-post-block-padding">
                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                <section>
                    <?php the_excerpt(""); ?>
                </section>
                <footer>
                    <time datetime="<?php the_time('Y-m-d') ?>"><i class="fa fa-clock-o"></i><?php the_time('Y-m-d') ?></time>
                    <span><i class="fa fa-folder-o"></i>
                        <?php the_category('<a>','</a>'); ?>
				</span>
                </footer>
            </div>
        </article>
    <?php endwhile; ?>
    <?php endif; ?>
    <?php get_template_part( 'navigator' ); ?>
</div>
<?php get_footer(); ?>