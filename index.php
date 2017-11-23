<?php get_header(); ?>

<div class="blog-main-post">
	<div class="index-post-br"></div>

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
                <span>
                    <i class="fa fa-eye"></i>
                    <span class="views"><?php post_views(' ', ' '); ?></span>
                </span>
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
