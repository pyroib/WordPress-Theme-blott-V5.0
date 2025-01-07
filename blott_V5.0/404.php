<?php get_header(); ?>


<?PHP
$pageIds = getDefaultDisplayPageID();
$profilePageId = $pageIds['profilePageId'];
$portfolioPageId = $pageIds['portfolioPageId'];
$creativePageId = $pageIds['creativePageId'];
?>

    <style type="text/css" media="all">

        #text-shadow-box {
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            font-family: Helvetica, Arial, sans-serif;
            -webkit-tap-highlight-color: rgba(0,0,0,0);
            -webkit-user-select: none;
            z-index: 2000;
        }

        #text-shadow-box #tsb-text,
        #text-shadow-box #tsb-link {
            position: absolute;
            top: 40%;
            left: 0;
            width: 100%;
            height: 1em;
            margin: -0.77em 0 0 0;
            font-size: 90px;
            line-height: 1em;
            font-weight: bold;
            text-align: center;
        }

        #text-shadow-box #tsb-text {
            font-size: 100px;
            color: transparent;
        }

        #text-shadow-box #tsb-link a {
            color: rgb(0, 0 , 0, 0.3 );
            text-decoration: none;
            font-size:4em;
        }

        #text-shadow-box #tsb-box,
        #text-shadow-box #tsb-wall {
            position: absolute;
            top: 40%;
            left: 0;
            width: 100%;
            height: 60%;
        }

        #text-shadow-box #tsb-wall {
            background-color: rgba(255, 255, 255, 0.02);


        }

        #text-shadow-box #tsb-wall p {
            font-size: 24px;
            line-height: 3.5em;
            text-align: justify;
            color: #FFF;
            width: 550px;
            margin: 1.5em auto;

        }

        #text-shadow-box #tsb-wall p a {
            color: #fff;
        }

        #text-shadow-box #tsb-wall p a:hover {
            text-decoration: none;
            color: #000;
            background: #fff;
        }

        #tsb-spot {
            position: absolute;
            top: 0;
            left: 0;
            width: 200%;
            height: 200%;
            pointer-events: none;
            background: -webkit-gradient(radial, center center, 0, center center, 450, from(rgba(0,0,0,0)), to(rgba(0,0,0,0.9)));
            background: -moz-radial-gradient(center 45deg, circle closest-side, transparent 0, black 450px);

        }
    </style>

    <div id="text-shadow-box">
        <div  id="tsb-box"></div>
        <p  id="tsb-text"></p>
        <h1 id="tsb-link"><a href="/">404</a></h1>
        <div id="tsb-wall"><p>You look lost? This page doesnt exist!</p></div>
        <div style="background-position: -867px -803px;" id="tsb-spot"></div>
    </div>


    <script type="text/javascript" language="javascript" charset="utf-8">

        var text = null;
        var spot = null;
        var box = null;
        var boxProperty = '';

        $(function() {
            init();
            $('#text-shadow-box').click(function (e) {
                $('#text-shadow-box').hide();
                $(document.elementFromPoint(e.clientX, e.clientY)).trigger("click");
                $('#text-shadow-box').show();
            });
        });

        function init() {
            text = document.getElementById('tsb-text');
            spot = document.getElementById('tsb-spot');
            box = document.getElementById('tsb-box');

            if (text && spot && box) {
                document.getElementById('text-shadow-box').onmousemove = onMouseMove;
                document.getElementById('text-shadow-box').ontouchmove = function (e) {e.preventDefault(); e.stopPropagation(); onMouseMove({clientX: e.touches[0].clientX, clientY: e.touches[0].clientY});};
            }

            onMouseMove({clientX: Math.floor(window.innerWidth / 2), clientY: Math.floor(window.innerHeight / 2.75)});
        }

        function onMouseMove(e) {
            var xm = (e.clientX - Math.floor(window.innerWidth / 2)) * 0.4;
            var ym = (e.clientY - Math.floor(window.innerHeight / 3)) * 0.4;
            var d = Math.round(Math.sqrt(xm*xm + ym*ym) / 5);
            //text.style.textShadow = -xm + 'px ' + -ym + 'px ' + (d + 10) + 'px black';
            if (boxProperty) {
                box.style[boxProperty] = '0 ' + -ym + 'px ' + (d + 30) + 'px black';
                console.log(box.style[boxProperty]);

            }
            xm = e.clientX - window.innerWidth;
            ym = e.clientY - window.innerHeight;
            spot.style.backgroundPosition = xm + 'px ' + ym + 'px';
        }
    </script>




    <content id="content" class="table container ">
        <div class="table-cell wrapper content-locator row ">
            <div class="content-section profile-locator pulse">
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
                </div>
            </div>

            <div class="content-section blog-locator <?PHP echo (isset($_GET['z'])&&$_GET['z']=='show-blog' ? 'default-show' : 'pulse'); ?>">
                <div class="content-section-header" toggle-id="content-blog-blurb" id="content-blog-header" >
                    <h2 class="main-content-link" id="link-3"><span class="href">Blog</span></h2>
                </div>
                <div class="content-section-blurb" id="content-blog-blurb">
                    <section>
                        <div class="container">
                            <div class="row">
                                <div class="home-content col-12 col-sm-12 col-md-12 col-lg-8">
                                    <?php get_template_part('loop'); ?>
                                    <?php get_template_part('pagination'); ?>
                                </div>

                                <div class="post-details col-12 col-sm-12 col-md-12 col-lg-4">
                                    <div id="blog-menu" class="dark"><?php blog_controls(); ?></div>
                                    <div id="blog-search"><?php get_template_part('searchform'); ?></div>
                                    <div id="secondary" class="widget-area archive-list" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'html5blank' ); ?>">
                                        <?php get_sidebar( 'sidebar-1' ); ?>
                                        <?php get_sidebar( 'sidebar-2' ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <div class="content-section creative-locator <?= (isset($_GET['z']) && $_GET['z'] == 'show-creative' ? 'default-show' :'pulse' ); ?>">
                <div class="content-section-header" toggle-id="content-creative-blurb" id="content-creative-header" >
                    <h2 class="main-content-link" id="link-4"><span class="href">Creative</span></h2>
                </div>
                <div class="content-section-blurb" id="content-creative-blurb" >
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
                </div>
            </div>




        </div>
    </content>

<?php get_footer(); ?>