<?php
$author_data =  get_the_author_meta('description', get_query_var('author') );
$author_id = get_the_author_meta( 'ID' );
$the_author_data_roles = get_userdata($author_id);
$theRolesAuthor = $the_author_data_roles -> roles;
$author_bio_avatar_size = 120;
if($author_data !=''): ?>
<div class="author-info">
    <div class="author-thumb text-center">
        <a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php print get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size,'','',array('class'=>'media-object img-circle') ); ?></a>
    </div>
    <div class="author-text text-center">
        <h3><a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php print get_the_author(); ?></a></h3>
        <span class="designation">Senior Writer</span>
        <p><?php the_author_meta( 'description' ); ?> </p>
        <div class="author-post">
            <a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php echo esc_html__('All Posts', 'zylo'); ?> <i class="fa-solid fa-arrow-up-right"></i></a>
        </div>
    </div>
</div>
<?php endif; ?>
