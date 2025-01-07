<?php get_header(); ?>
<?PHP
$pageIds = getDefaultDisplayPageID();
$profilePageId = $pageIds['profilePageId'];
$portfolioPageId = $pageIds['portfolioPageId'];
$creativePageId = $pageIds['creativePageId'];
?>
<content id="content" class="table container ">
    <div class="table-cell wrapper content-locator row pulse">
        <div class="content-section profile-locator default-show">
            <div class="content-section-header" toggle-id="content-profile-blurb" id="content-profile-header">
                <h2 class="main-content-link" id="link-1"><span class="href">Profile</span></h2>
            </div>
            <div class="content-section-blurb" id="content-profile-blurb">
                <?PHP
                $postDetails = get_post($profilePageId);
                ?>
                <article id="post-<?php echo $postDetails->ID; ?>" >
                    <?php echo apply_filters('the_content', $postDetails->post_content ); ?>
                </article>
            </div>
        </div>


        <div class="content-section  portfolio-locator <?= (isset($_GET['z']) && $_GET['z'] == 'show-portfolio' ? 'default-show' :'pulse' ); ?>">
            <div class="content-section-header" toggle-id="content-portfolio-blurb" id="content-portfolio-header">
                <h2 class="main-content-link" id="link-2"><span class="href">Portfolio</span></h2>
            </div>
            <div class="content-section-blurb" id="content-portfolio-blurb">
                <main role="main">
                    <section>
                        <div class="container">
                            <div class="row">

                                <div class="portfolio-menu col-12 col-sm-12 col-md-3 col-lg-3">
                                    <div id="portfolio-controls" class="dark"><?php portfolio_controls(); ?></div>
                                </div>
                                <div class="portfolio-content col-12 col-sm-12 col-md-9 col-lg-9">
                                    <?PHP
                                    $postDetails = get_post($portfolioPageId);
                                    ?>
                                    <h3><?php echo $postDetails->Title; ?></h3>
                                    <article id="post-<?php echo $postDetails->id; ?>" >
                                        <?php echo apply_filters('the_content', $postDetails->post_content ); ?>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </div>

        <div class="content-section blog-locator default-show">
            <div class="content-section-header" toggle-id="content-blog-blurb" id="content-blog-header" >
                <h2 class="main-content-link" id="link-3"><span class="href">Blog</span></h2>
            </div>
            <div class="content-section-blurb" id="content-blog-blurb">
                <main role="main">
                    <section>
                        <div class="container">
                            <div class="row">
                                <div class="author-content col-12 col-sm-12 col-md-12 col-lg-8">
                                    <?php if (have_posts()): the_post(); ?>
                                        <h3><?php _e( 'Author Archives for ', 'html5blank' ); echo get_the_author(); ?></h3>
                                        <?php if ( get_the_author_meta('description')) : ?>
                                            <?php echo get_avatar(get_the_author_meta('user_email')); ?>
                                            <h4><?php _e( 'About ', 'html5blank' ); echo get_the_author() ; ?></h4>
                                            <?php echo wpautop( get_the_author_meta('description') ); ?>
                                        <?php endif; ?>

                                        <?php rewind_posts(); while (have_posts()) : the_post(); ?>
                                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                                <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
                                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                        <?php the_post_thumbnail(array(120,120)); // Declare pixel size you need inside the array ?>
                                                    </a>
                                                <?php endif; ?>
                                                <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                                                <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
                                                <span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
                                                <span class="comments"><?php comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
                                                <br class="clear">
                                                <?php edit_post_link(); ?>
                                            </article>
                                        <?php endwhile; ?>

                                    <?php else: ?>
                                        <article>
                                            <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
                                        </article>
                                    <?php endif; ?>
                                    <?php get_template_part('pagination'); ?>
                                </div>
                                <div class="post-details col-12 col-sm-12 col-md-12 col-lg-4">
                                    <div id="blog-menu" class="dark"><?php blog_controls(); ?></div>
                                    <div id="blog-search">
                                        <?php get_template_part('searchform'); ?>
                                    </div>
                                    <div id="secondary" class="widget-area archive-list" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'html5blank' ); ?>">
                                        <?php get_sidebar( 'sidebar-1' ); ?>
                                        <?php get_sidebar( 'sidebar-2' ); ?>
                                    </div>
                                </div>
                            </div>
                    </section>
                </main>
            </div>
        </div>

        <div class="content-section creative-locator <?= (isset($_GET['z']) && $_GET['z'] == 'show-creative' ? 'default-show' :'pulse' ); ?>">
            <div class="content-section-header" toggle-id="content-creative-blurb" id="content-creative-header" >
                <h2 class="main-content-link" id="link-4"><span class="href">Creative</span></h2>
            </div>
            <div class="content-section-blurb" id="content-creative-blurb" >
                <main role="main">
                    <section>
                        <div class="container">
                            <div class="row">

                                <div class="creative-menu col-12 col-sm-12 col-md-3 col-lg-3">
                                    <div id="creative-controls" class="dark"><?php creative_controls(); ?></div>
                                </div>
                                <div class="creative-content col-12 col-sm-12 col-md-9 col-lg-9">
                                    <?PHP
                                    $postDetails = get_post($creativePageId);
                                    ?>
                                    <h3><?php echo $postDetails->Title; ?></h3>
                                    <article id="post-<?php echo $postDetails->id; ?>" >
                                        <?php echo apply_filters('the_content', $postDetails->post_content ); ?>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </div>




    </div>
</content>

<?php get_footer(); ?>

