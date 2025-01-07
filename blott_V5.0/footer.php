<?php wp_footer(); ?>




        <footer id="page-footer">blott.com.au</footer>



        <div id="circle-background">
            <div class="table">
                <div class="table-cell wrapper">
                    <div class="circle-locator">
                        <div class="circle">
                            <div class="circles">
                                <div class="animated"><span class="circle circle-0"></span></div>
                                <div class="animated"><span class="circle circle-1"></span></div>
                                <div class="animated"><span class="circle circle-2"></span></div>
                                <div class="animated"><span class="circle circle-3"></span></div>
                                <div class="animated"><span class="circle circle-4"></span></div>
                                <div class="animated"><span class="circle circle-5"></span></div>
                                <div class="animated"><span class="circle circle-6"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div id="smoke-background">
            <div class="table" id="smoke-container">
                <div class="table-cell wrapper">
                    <div id="smoke1"></div>
                    <div id="smoke2"></div>
                </div>
            </div>
        </div>

        <div id="main-bg-holder"></div>

        <div id="preloader">
            <div class="table" id="depreload" >
                <div class="table-cell wrapper">
                    <div class="circle">
                        <canvas class="line" width="560px" height="560px"></canvas>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" class="logo" alt="logo" />
                    </div>
                    <p class="perc"></p>
                    <p class="loading">Loading...</p>
                </div>

                <div class="preload-image-list">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/ecuador_002.jpg" />
                    <img src="<?php echo get_template_directory_uri(); ?>/img/smoke1.png" />
                    <img src="<?php echo get_template_directory_uri(); ?>/img/smoke2.png" />
                </div>
            </div>
        </div>


        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-2848378-6"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-2848378-6');
        </script>
        <!-- analytics -->


    </body>
</html>
