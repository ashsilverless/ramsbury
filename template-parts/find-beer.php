<div class="find-cta mt5">
 
    <div class="content">   
    
        <h2 class="heading heading__xl"><?php  the_field('find_headline', 'options');?></h2>
        
        <a href="" class="button">Search Stockists</a>        
    
     </div>

    <?php for ($x = 0; $x <= 5; $x++) {
        get_template_part('template-parts/beer', 'glass');
    } ?>

</div>
