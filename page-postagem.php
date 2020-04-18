<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>

    <body>
        <?php include 'header.php'; ?>
            <style>
                .jumbotron.hurricane {
                    background: url(http://52.15.68.1/wp-content/uploads/2020/04/thoth_khepri.jpg) no-repeat;
                    background-size: 100%;
                }
                
                .title-card-postagens {
                    background-color: white;
                    padding: 30px 40px 30px 20px;
                    background: rgba(256, 256, 256, 0.5);
                    display: inline-block;
                    font-family: Orbitron;
                }
                
                @media screen and (min-width: 576px) {
                    .title-card-postagens h1 {
                        font-size: 4rem;
                    }
                    .title-card-postagens p {
                        font-size: 2rem;
                    }
                }
            </style>
            <div class="page-sobre-id">
                <div id="breadcrumb">

                    <?php custom_breadcrumbs() ?>

                </div>
                <div class="container">

                    <div class="container-fluid">
                        <div class="jumbotron jumbotron-fluid hurricane">
                            <div class="container">
                                <?php if( have_posts() ): 
                while(have_posts()) : the_post(); ?>
                                    <div class="title-card-postagens">
                                        <h1><?php the_title() ?></h1>
                                        <p>
                                            <?php the_field('subtitulo') ?>
                                        </p>
                                    </div>
                                    <?php endwhile; ?>
                                        <?php endif; ?>
                            </div>
                        </div>

                        <div class="card-deck">
                            <?php
    $args = array(
        'post_type' => 'postagem',
        'posts_per_page' => 20,
        'orderby'       => 'post_date',
        'order'         => 'DESC'
    );
    $the_query = new WP_Query($args)
    //se tiver posts
?>
                                <div class="row">
                                    
                                        <?php
                if( $the_query->have_posts() ): 
                while($the_query->have_posts()) : $the_query->the_post(); ?>
                                            <div class="col-md-3 mb-2">
                                                <div class="card" style="width:300px">
                                                    <img class="card-img-top" src="<?php the_post_thumbnail_url()?>" style="width:100%">
                                                    <div class="card-body">
                                                        <h4 class="card-title"><?php the_title() ?></h4>
                                                        <h5><?php echo get_the_date(); ?></h5>
                                                        <p class="card-text">
                                                            <?php the_field('resumo') ?>
                                                        </p>
                                                        <a href="<?php the_permalink()?>" class="btn btn-primary" target="_blank">Leia Mais</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endwhile; ?>
                                                    <?php endif; ?>
                                   
                                </div>

                        </div>
                        <!-- card-deck -->
                    </div>

                </div>
            </div>
            <?php include 'footer.php'; ?>
    </body>

</html>