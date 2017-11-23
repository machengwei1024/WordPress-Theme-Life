<?php
if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');
?>
<div id="comments" class="post-comments">
    <div class="comments-number-box">
        <p class="comments-number"><?php comments_number( '没有评论', '仅有1条评论', '% 条评论' ); ?></p>
    </div>
    <br>
<ol class="comment-list">
    <?php
    if (!empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {
        // if there's a password
        // and it doesn't match the cookie
        ?>
        <li class="decmt-box">
            <p><a href="#addcomment">请输入密码再查看评论内容.</a></p>
        </li>
        <?php
    } else if ( !comments_open() ) {
        ?>
        <li class="decmt-box">
            <p><a href="#addcomment">评论功能已经关闭!</a></p>
        </li>
        <?php
    } else if ( !have_comments() ) {
        ?>
<!--            如果没有评论-->
        <?php
    } else {
        wp_list_comments('type=comment&callback=aurelius_comment');
    }
    ?>
</ol>
<!– Comment Form –>
<?php if ( comments_open() ) : ?>
    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
        <p><?php printf(__('你需要先 <a href="%s">登录</a> 才能发表评论.'), get_option('siteurl')."/wp-login.php?redirect_to=".urlencode(get_permalink()));?></p>
    <?php else : ?>
        <?php
        $comments_args = array(
            'comment_notes_text'=>'',
            'submit_button'=>'</div><div class="vright"><button name="submit" id="submit" type="submit" class="vsubmit vbtn">发射</button></div></div>',
            'title_reply'=>'',
            'comment_notes_after' => '<div class="vcontrol"><div class="vident">',
            'comment_field' => '<div class="vedit"><textarea id="comment" name="comment" aria-required="true" class="veditor vinput" placeholder="尽情吐槽吧！"></textarea></div>',
            'title_reply_before'=>'<p>',
            'title_reply_after'=>'</p>',
        );
        comment_form($comments_args);
    endif;
else :  ?>
    <p><?php _e('对不起评论已经关闭.'); ?></p>
<?php endif; ?>
</div>
