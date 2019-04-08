<!-- ******************* Text Area ******************* -->

<div class="text-area mb3">

    <div class="row">

        <div class="col-6 offset-3">
            
            <div class="text-area__two">
                
                <h2 class="heading heading__lg"><?php the_field( 'ta2_heading' );?></h2>
            
                <?php $headingSwitch = get_field('does_this_area_have_a_heading'); ?>

                <div class="expanding-copy">
                
                    <div class="expanding-copy__lead lead-copy <?php echo $headingSwitch;?>">
                        
                        <?php the_field( 'lead_copy' );?>
                        
                    </div>
                
                    <?php if( get_field('read_more') ): ?>
                    
                        <a class="trigger-expand">Read More</a>    
                    
                    <?php endif; ?>
                
                    <div class="expanding-copy__more">
                        
                        <?php the_field('read_more'); ?>          
                        
                    </div>    
                
                    <?php if( get_field('read_more') ): ?>
                
                        <a class="trigger-collapse hide">Read Less</a>    
                    
                    <?php endif; ?>
                         
                </div>
            
            </div>
    
        </div>
        
    </div><!--r-->

</div>

<!--<div class="text-area mb3">

    <div class="row">

        <div class="col-5 offset-1">
            
            <div class="text-area__one">
           
            <?php if( get_field('text_area_1') == 'Quote' ): ?>
            
                <div class="pull-quote">
                    
                    <?php the_field( 'quote' );?>     
                    <?php the_field( 'attribute' );?>
                    
                </div>
                
            <?php else:?>
               
               <h2 class="heading heading__lg"><?php the_field( 'ta1_heading' );?></h2>    
            
            <?php endif;?>
            
            </div>
    
        </div>
   
        <div class="col-5">
            
            <div class="text-area__two">
                
                <h2 class="heading heading__lg"><?php the_field( 'ta2_heading' );?></h2>
            
                <?php $headingSwitch = get_field('does_this_area_have_a_heading'); ?>

                <div class="expanding-copy">
                
                    <div class="expanding-copy__lead lead-copy <?php echo $headingSwitch;?>">
                        
                        <?php the_field( 'lead_copy' );?>
                        
                    </div>
                
                    <?php if( get_field('read_more') ): ?>
                    
                        <a class="trigger-expand">Read More</a>    
                    
                    <?php endif; ?>
                
                    <div class="expanding-copy__more">
                        
                        <?php the_field('read_more'); ?>          
                        
                    </div>    
                
                    <?php if( get_field('read_more') ): ?>
                
                        <a class="trigger-collapse hide">Read Less</a>    
                    
                    <?php endif; ?>
                         
                </div>
            
            </div>
        
        </div>
        
    </div><!--r-->

<!--</div>-->

<!-- ******************* Text Area END ******************* -->