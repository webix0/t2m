<?php get_header(); ?>

<div id="content" class="narrowcolumn">

<!-- This sets the $curauth variable -->

    <?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    ?>
    <?php if ( function_exists( 'wpsabox_author_box' ) ) echo wpsabox_author_box(); ?>

<div class="author-articles">
    <h2>Articles by <?php echo $curauth->nickname; ?>:</h2>
<ul>
<!-- The Loop -->

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <li>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><h4><?php the_title(); ?></h4></a>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Link to: <?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
            
            <p><?php the_excerpt();?></p>
        </li>

    <?php endwhile; else: ?>
        <p><?php _e('No posts by this author.'); ?></p>

    <?php endif; ?>

<!-- End Loop -->

    </ul>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>