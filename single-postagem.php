<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
  <body>
  <?php include 'header.php'; ?>
  <div class="page-sobre-id">
  <div  id="breadcrumb">

<?php custom_breadcrumbs() ?>

</div>
      <div class="container">
      <?php if( have_posts() ): 
                while(have_posts()) : the_post(); ?>
         <div class="row ui-tabs ui-widget ui-widget-content ui-corner-all" id="tabs">

         <div class="col-md-12 mt-3 " id="title-post">
            <h2 class="is-size-3"><?php the_title() ?></h2>
        </div>
          <div class="col-md-12">
            <section class="tabs-content">
              <article id="tabs-1" aria-labelledby="ui-id-1" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-hidden="false">
             
                <div class="text-center mt-2 h-25">
                <img   src="<?php the_post_thumbnail_url()?>"  alt="">
               </div>
               
                <div class="text-center  mt-5">
                        <h2 class="is-size-3"><?php the_title() ?></h2>
                        <hr data-content="**" class="hr-text">
                </div>

                <div class="text-justify mt-5 mb-5">
                 <p class="is-size-4">  <?php the_content(); ?></p>
               </div>
             </article>
            </section>
          </div>
        </div>
        <?php endwhile; ?>
            <?php endif; ?>
      </div>
     
</div>
</div>
  <?php include 'footer.php'; ?>
  </body>
</html>
