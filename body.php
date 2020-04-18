<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="main-banner header-text" id="top">
    <div class="Modern-Slider">
        <!-- Item -->
        <?php
            $args = array(
                'post_type' => 'carrousel'
            );
            $the_query = new WP_Query($args)
            //se tiver posts
            ?>

            <?php
              if( $the_query->have_posts() ): 
                while($the_query->have_posts()) : $the_query->the_post(); ?>
                <div class="item">

                    <div  style="background-image:url(<?php the_post_thumbnail_url()?>);" class="img-fill">
                        <a href="<?php the_field('link') ?>">
                            <div class="text-content">
                                <h6><?php the_title() ?></h6>
                                <h4><?php the_field('subtitulo') ?></h4>
                                <p>
                                    <?php the_field('resumo') ?>
                                </p>
                        </a>
                        </div>
                    </div>

                </div>
                <?php endwhile; ?>
                    <?php endif; wp_reset_query();?>

    </div>
</div>
<!-- Banner Ends Here -->

<div class="request-form">
    <div class="container">
        <div class="row">
            <div class="col-md-3 d-flex justify-content-center">
                <a href="/voh/sobre-nos" class="border-button">SOBRE A V.O.H</a>
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <a href="/voh/postagem" class="border-button">POSTAGENS</a>
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <a href="contact.html" class="border-button">ESTUDOS</a>
            </div>
            <div class="col-md-3 d-flex justify-content-center">
                <a href="contact.html" class="border-button">DOWNLOADS</a>
            </div>
        </div>
    </div>
</div>

<div class="services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Destaques</h2>
                    <hr data-content="**" class="hr-text">
                </div>

            </div>
            <?php
    $args = array(
        'post_type' => 'postagem',
        'posts_per_page' => 4,
        'orderby'       => 'post_date',
        'order'         => 'DESC'
    );
    $the_query = new WP_Query($args)

    //se tiver posts
?>

                <?php
    if( $the_query->have_posts() ): 
        $a = 0;
    while($the_query->have_posts()) : $the_query->the_post(); 
            $i = $a++;
    ?>
                    <?php if( $i == 0 ):   ?>
                    <!-- Jumbotron -->
                    <div class="jumbotron text-center elegant-color white-text " style="height: 35rem;width: 100rem;">
                            <h1 class="card-title h4 pb-2"><?php the_title() ?></h1>
                            <hr class="hr-light">
                            <!-- Card image -->
                            <div id="my-div" style="background-image: url(<?php the_post_thumbnail_url()?>);"  class="view overlay my-4">

                            </div>
                                <p class="card-text white-text"><?php the_field('resumo') ?></p>
                            <!-- Twitter -->
                            <a href="https://twitter.com/share?text=<?php the_title() ?>&amp;url=<?php the_permalink()?>" class="px-2 fa-lg tw-ic"><i class="fab fa-twitter"></i></a>
                                <!-- Dribbble -->
                            <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink()?>" class="px-2 fa-lg fb-ic"><i class="fab fa-facebook-f"></i></a>
                           
                    </div>
                    <!-- Jumbotron -->
                    <?php continue;  endif; ?>


                    <div class="col-md-4 mb-2">
                        <!-- Card Dark -->
                        <div class="card">
                            <!-- Card image -->
                            <div class="view overlay">
                                <img class="card-img-top" src="<?php the_post_thumbnail_url()?>" alt="Card image cap">
                                <a>
                                    <div class="mask rgba-white-slight"></div>
                                </a>

                            </div>
                            <!-- Card content -->
                            <div class="card-body elegant-color white-text rounded-bottom">
                                <!-- Social shares button -->
                                <!-- Title -->
                                <h2 class=""><?php the_title() ?></h2>
                                <hr class="hr-light">
                                <!-- Text -->
                                <p class="card-text white-text mb-4">
                                    <?php the_field('resumo') ?>
                                </p>
                                <!-- Twitter -->
                                <a href="https://twitter.com/share?text=<?php the_title() ?>&amp;url=<?php the_permalink()?>" class="px-2 fa-lg tw-ic"><i class="fab fa-twitter"></i></a>
                                <!-- Dribbble -->
                                <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink()?>" class="px-2 fa-lg fb-ic"><i class="fab fa-facebook-f"></i></a>
                                <!-- Link -->
                                <a href="<?php the_permalink() ?>" class="white-text d-flex justify-content-end">
                                    <h5>Leia Mais <i class="fas fa-angle-double-right"></i></h5>
                                </a>
                            </div>
                        </div>
               
                  
                    </div>
                    
                    <?php endwhile; ?>
                        <?php endif; ?>
                         
                    <div  class="col-md-12 mb-12 m-5 text-center">
                    
                        <a href="/voh/postagem" class="button is-link is-rounded text-white">
                            <span class="icon is-small">
                            <i color="white" class="icon-flat-128x128-075-f-pad-128x128-f8f8f8 fa-2x"></i>
                            </span>
                            <span class="text-white">Mais Postagens</span>
                        </a>
                    </div>
                       
                      

        </div>

        
    </div>
</div>
<div class="services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Câmaras Herméticas</h2>
                    <hr data-content="**" class="hr-text">
                </div>

            </div>

            <?php
    $args = array(
        'post_type' => 'estudo',
        'orderby'       => 'post_date',
        'order'         => 'ASC'
    );
    $the_query = new WP_Query($args)
    //se tiver posts
?>

                <?php
    if( $the_query->have_posts() ): 
    while($the_query->have_posts()) : $the_query->the_post(); ?>
                    <div class="col-md-4 mb-2">
                        <!-- Card -->
                        <div class="card card-image" style="background-image: url(<?php the_post_thumbnail_url()?>);">
                            <!-- Content -->
                            <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                                <div style=" width: 100%;word-wrap: break-word;">
                                    <h2 class="<?php the_field('cor') ?>-text"><i class="fas fa-chart-pie"></i> <?php the_title() ?></h2>
                                    <h3 class="font-weight-bold"><?php the_field('subtitulo') ?></h3>
                                    <p style="white-space: pre-line;">
                                        <?php the_field('resumo') ?>
                                    </p>
                                    <a href="<?php the_permalink() ?>" class="btn btn-<?php the_field('cor') ?>"><i class="fas fa-clone left"></i>Leia Mais</a>
                                </div>
                            </div>

                        </div>
                        <!-- Card -->
                    </div>
                    <?php endwhile; ?>
                        <?php endif; ?>
        </div>
    </div>
</div>


<!--Downloads-->
<div class="testimonials">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Quais são nossas Referências</h2>
                    <span>Principais mestres no hermetismo (Arraste com o mouse para ver todos)</span>
                </div>
            </div>

            <h4 class="card-title"></h4>
            <hr class="hr-light">
            <!-- Text -->
            <p class="card-text white-text mb-4">

                <div class="col-md-12">
                    <div class="owl-testimonials owl-carousel">
                        <!-- Item -->
                        <?php
            $args = array(
                'post_type' => 'referencias'
            );
            $the_query = new WP_Query($args)
            //se tiver posts
            ?>

                            <?php
              if( $the_query->have_posts() ): 
                while($the_query->have_posts()) : $the_query->the_post(); ?>
                                <div class="testimonial-item">
                                    <div class="inner-content">
                                        <h4><?php the_title() ?></h4>
                                        <span><?php the_field('profissao') ?></span>
                                        <p>
                                            <?php the_field('resumo') ?>
                                        </p>

                                        <!-- Link -->
                                        <a href="<?php the_permalink() ?>" class="blue.darken-4 d-flex justify-content-end">
                                            <h5>Leia Mais <i class="fas fa-angle-double-right"></i></h5>
                                        </a>
                                    </div>
                                    <img src="<?php the_post_thumbnail_url()?>" alt="">
                                </div>
                                <?php endwhile; ?>
                                    <?php endif; wp_reset_query();?>
                    </div>

                </div>
        </div>
    </div>
</div>