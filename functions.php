<?php
/**
 * @package WordPress
 * @subpackage Life
 * @since Life 1.0
 */

/**
 * Enqueue scripts and styles.
 *
 * @since Life 1.0
 */
function life_scripts() {
	// Load our main stylesheet.
	wp_enqueue_style( 'life-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'life_scripts' );


// 截取首页文章字数
function emtx_excerpt_length( $length ) {
	return 130;
}
add_filter( 'excerpt_length', 'emtx_excerpt_length' );

function new_excerpt_more($more) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');;


/**
* 数字分页函数
* 因为wordpress默认仅仅提供简单分页
* 所以要实现数字分页，需要自定义函数
* @Param int $range            数字分页的宽度
* @Return string|empty        输出分页的HTML代码
*/
function lingfeng_pagenavi( $range = 4 ) {
    global $paged,$wp_query;
    if ( !$max_page ) {
        $max_page = $wp_query->max_num_pages;
    }
    if( $max_page >1 ) {
        echo "<nav id='pagination' class='blog-pagination'>";
        if( !$paged ){
            $paged = 1;
        }
        previous_posts_link('<i class="fa fa-angle-left"></i>');
        if ( $max_page >$range ) {
            if( $paged <$range ) {
                for( $i = 1; $i <= ($range +1); $i++ ) {
                    echo "<a href='".get_pagenum_link($i) ."'";
                if($i==$paged) echo " class='current'";echo ">$i</a>";
                }
            }elseif($paged >= ($max_page -ceil(($range/2)))){
                for($i = $max_page -$range;$i <= $max_page;$i++){
                    echo "<a href='".get_pagenum_link($i) ."'";
                    if($i==$paged)echo " class='current'";echo ">$i</a>";
                    }
                }elseif($paged >= $range &&$paged <($max_page -ceil(($range/2)))){
                    for($i = ($paged -ceil($range/2));$i <= ($paged +ceil(($range/2)));$i++){
                        echo "<a href='".get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";
                    }
                }
            }else{
                for($i = 1;$i <= $max_page;$i++){
                    echo "<a href='".get_pagenum_link($i) ."'";
                    if($i==$paged)echo " class='current'";echo ">$i</a>";
                }
            }
        next_posts_link('<i class="fa fa-angle-right"></i>');
        echo "</nav>\n";
    }
}


/*
 * Enable support for Post Thumbnails on posts and pages.
 *
 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
 */
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 825, 510, true );


//评论列表
function aurelius_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment; ?>
    <li class="comment" id="li-comment-<?php comment_ID(); ?>">
        <div>
            <div class="comments-author-img">
                <?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 48); } ?>
            </div>
            <div class="comments-main">
                <div>
                    <a href=""><strong class="comments-author-name"><?php printf(__('<cite class="author_name">%s</cite>'), get_comment_author_link()); ?></strong></a>
                    <span class="text-xs block m-t-xs comments-time">
					<?php echo get_comment_time('m月d日'); ?>
				</span>
                </div>
                <div class="comments-content"><?php comment_text(); ?></div>
            </div>
            <div style="clear: both;"></div>
        </div>
        <span class="comments-reply-btn"><?php comment_reply_link(array_merge( $args, array('reply_text' => '回复','depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
    </li>
<?php }


// 评论表单
function my_fields($fields) {
    $fields =  array(
        'author' => '<input name="author" id="author" placeholder="称呼" class="vnick vinput form-control" type="text" />',
        'email'  => '<input name="email" id="email" placeholder="邮箱" class="vmail vinput form-control" type="email" />',
        'url'    => '<input name="url" id="url" placeholder="网址(http://)" class="vlink vinput form-control" type="text" />',
    );
    return $fields;
}
add_filter('comment_form_default_fields','my_fields');


/* 访问计数 */
function record_visitors()
{
    if (is_singular())
    {
        global $post;
        $post_ID = $post->ID;
        if($post_ID)
        {
            $post_views = (int)get_post_meta($post_ID, 'views', true);
            if(!update_post_meta($post_ID, 'views', ($post_views+1)))
            {
                add_post_meta($post_ID, 'views', 1, true);
            }
        }
    }
}
add_action('wp_head', 'record_visitors');

/// 文章阅读次数
function post_views($before = '(点击 ', $after = ' 次)', $echo = 1)
{
    global $post;
    $post_ID = $post->ID;
    $views = (int)get_post_meta($post_ID, 'views', true);
    if ($echo) echo $before, number_format($views), $after;
    else return $views;
}


/*
*自定义后台主题设置选项
*/
//logo
function logo_customize_register( $wp_customize ) {
    $wp_customize->add_section('life-logo',array(
        'title'     => '博主头像',
        'priority'  => 50
    ) );
    $wp_customize->add_setting( 'life-logo', array(
        'default'   => '',
        "transport" => "postMessage",
        'type'      => 'option'
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'life-logo', array(
        'label'     => '博主头像',
        'section'   => 'life-logo'
    ) ) );
}
add_action( 'customize_register', 'logo_customize_register' );
//微博
function weibo_customize_register( $wp_customize ) {
    $wp_customize->add_section('life-weibo',array(
        'title'     => '微博',
        'priority'  => 50
    ) );
    $wp_customize->add_setting( 'life-weibo', array(
        'default'   => '',
        "transport" => "postMessage",
        'type'      => 'option'
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'life-weibo', array(
        'label'     => '微博',
        'section'   => 'life-weibo'
    ) ) );
}
add_action( 'customize_register', 'weibo_customize_register' );
//github
function github_customize_register( $wp_customize ) {
    $wp_customize->add_section('life-github',array(
        'title'     => '邮箱',
        'priority'  => 50
    ) );
    $wp_customize->add_setting( 'life-github', array(
        'default'   => '',
        "transport" => "postMessage",
        'type'      => 'option'
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'life-github', array(
        'label'     => '邮箱',
        'section'   => 'life-github'
    ) ) );
}
add_action( 'customize_register', 'github_customize_register' );
//email
function email_customize_register( $wp_customize ) {
    $wp_customize->add_section('left-email',array(
        'title'     => 'Github',
        'priority'  => 50
    ) );
    $wp_customize->add_setting( 'left-email', array(
        'default'   => '',
        "transport" => "postMessage",
        'type'      => 'option'
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'left-email', array(
        'label'     => 'Github',
        'section'   => 'left-email'
    ) ) );
}
add_action( 'customize_register', 'email_customize_register' );
//facebook
function facebook_customize_register( $wp_customize ) {
    $wp_customize->add_section('life-facebook',array(
        'title'     => '脸书',
        'priority'  => 50
    ) );
    $wp_customize->add_setting( 'life-facebook', array(
        'default'   => '',
        "transport" => "postMessage",
        'type'      => 'option'
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'life-facebook', array(
        'label'     => '脸书',
        'section'   => 'life-facebook'
    ) ) );
}
add_action( 'customize_register', 'facebook_customize_register' );
//twitter
function twitter_customize_register( $wp_customize ) {
    $wp_customize->add_section('life-twitter',array(
        'title'     => '推特',
        'priority'  => 50
    ) );
    $wp_customize->add_setting( 'life-twitter', array(
        'default'   => '',
        "transport" => "postMessage",
        'type'      => 'option'
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'life-twitter', array(
        'label'     => '推特',
        'section'   => 'life-twitter'
    ) ) );
}
add_action( 'customize_register', 'twitter_customize_register' );
//支付宝二维码
function alipay_customize_register( $wp_customize ) {
    $wp_customize->add_section('life-alipay',array(
        'title'     => '支付宝二维码',
        'priority'  => 50
    ) );
    $wp_customize->add_setting( 'life-alipay', array(
        'default'   => '',
        "transport" => "postMessage",
        'type'      => 'option'
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'life-alipay', array(
        'label'     => '支付宝二维码',
        'section'   => 'life-alipay'
    ) ) );
}
add_action( 'customize_register', 'alipay_customize_register' );
//微信支付二维码
function wechatpay_customize_register( $wp_customize ) {
    $wp_customize->add_section('life-wechatpay',array(
        'title'     => '微信支付二维码',
        'priority'  => 50
    ) );
    $wp_customize->add_setting( 'life-wechatpay', array(
        'default'   => '',
        "transport" => "postMessage",
        'type'      => 'option'
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'life-wechatpay', array(
        'label'     => '微信支付二维码',
        'section'   => 'life-wechatpay'
    ) ) );
}
add_action( 'customize_register', 'wechatpay_customize_register' );
//QQ支付二维码
function qqpay_customize_register( $wp_customize ) {
    $wp_customize->add_section('life-qqpay',array(
        'title'     => 'QQ支付二维码',
        'priority'  => 50
    ) );
    $wp_customize->add_setting( 'life-qqpay', array(
        'default'   => '',
        "transport" => "postMessage",
        'type'      => 'option'
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'life-qqpay', array(
        'label'     => 'QQ支付二维码',
        'section'   => 'life-qqpay'
    ) ) );
}
add_action( 'customize_register', 'qqpay_customize_register' );