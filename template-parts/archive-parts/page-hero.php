<!-- ******************* Hero Content ******************* -->

<?php $heroImage = get_field('background_image');?>

<div class="wrapper-hero mb3" style="background-image: url(<?php echo $heroImage['url']; ?>);">

    <div class="container">
    
        <div class="row">
                
            <div class="col-12 wrapper-hero__content text-center">       
                
                <h1 class="heading heading__xl heading__light font800"><?php the_field( 'hero_heading' );?></h1>            
                <h2 class="heading heading__sm heading__light font300"><?php the_field( 'copy' );?></h1>               
            </div>       
                
        </div>
    
    </div>

    
</div>

<!-- ******************* Hero Content END ******************* -->