<!--博客侧边栏开始-->
        <div class="col-xl-3 blog-sidebar">
            <div class="blog-sidebar-title">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="blog-header-mobile-title"><?php bloginfo( 'name' ); ?></a>
            </div>
            <div class="blog-sidebar-logo">
                <img src="<?php echo get_option('life-logo'); ?>">
            </div>
            <div class="blog-sidebar-count blog-sidebar-padding">
                <div class="blog-sidebar-count-left">
                    <p class="blog-sidebar-count-p"><?php $count_posts = wp_count_posts(); echo $published_posts = $count_posts->publish;?></p>
                    <span class="blog-sidebar-count-span">文章</span>
                </div>
                <div class="blog-sidebar-count-right">
                    <p class="blog-sidebar-count-p"><?php echo $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->terms");?></p>
                    <span class="blog-sidebar-count-span">标签</span>
                </div>
                <div style="clear: both;"></div>
            </div>
            <div class="blog-sidebar-icon blog-sidebar-padding">
                <ul>
                    <li><a href="<?php echo get_option('life-github'); ?>" class="icon-github" target="_blank" data-toggle="tooltip" data-placement="top" title="Github"><i class="fa fa-github"></i></a></li>
                    <li><a href="<?php echo get_option('life-weibo'); ?>" class="icon-weibo" target="_blank" data-toggle="tooltip" data-placement="top" title="新浪微博"><i class="fa fa-weibo"></i></a></li>
                    <li><a href="<?php echo get_option('life-twitter'); ?>" class="icon-twitter" target="_blank" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="<?php echo get_option('life-facebook'); ?>" class="icon-facebook" target="_blank" data-toggle="tooltip" data-placement="top" title="FaceBook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="<?php echo get_option('life-email'); ?>" class="icon-email" data-toggle="tooltip" data-placement="top" title="E-Mail"><i class="fa fa-envelope"></i></a></li>
                </ul>
            </div>
            <div class="blog-sidebar-categories">
                <h4 class="blog-sidebar-h4"><i class="fa fa-folder-open"></i>&nbsp;文章分类</h4>
                <ul class="list-group blog-sidebar-padding">
                    <?php
                    $args=array(
                        'orderby' => 'name',
                        'order' => 'ASC',
                        'hide_empty' => '0'
                    );
                    $categories=get_categories($args);
                    foreach($categories as $category) {
                        if (get_category_by_slug($category->name)->count){
                            $Ccount = get_category_by_slug($category->name)->count;
                        }else {
                            $Ccount = 0;
                        }
                        echo ' <li class="list-group-item justify-content-between"'. $category-> slug .'">';
                        echo ' <a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.' </a><span class="badge badge-default badge-pill">'.$Ccount.'</span>';
                        echo ' </li>';
                    }
                    ?>
                </ul>
            </div>
            <div class="blog-sidebar-tags">
                <h4 class="blog-sidebar-h4"><i class="fa fa-tag"></i>&nbsp;标签云</h4>
                <ul class="blog-sidebar-tags-ul blog-sidebar-padding">
			  <?php wp_tag_cloud('unit=pt&smallest=8&largest=8&number=100&orderby=count'); ?>
			  <script type="text/javascript">
			  	$(".blog-sidebar-tags-ul>a").attr({"class":"tag-could", "target":"_blank", "data-placement":"top"}).wrap("<li></li>");
			  </script>
                </ul>
            </div>
            <script>
              // 博客侧栏标签云随机色
              var tag_cloud = $('.tag-could');
              tag_cloud.each(function () {
                  var Cnum = 9;
                  var Crand = parseInt(Math.random() * Cnum);
                  $(this).addClass("tag-could" + Crand);
              })
            </script>
            <!--返回顶部按钮-->
            <div class="retop">
                <i class="fa fa-angle-up"></i>
            </div>
        </div><!--博客侧边栏结束-->
