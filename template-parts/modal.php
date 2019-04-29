<div class="modal">
	
	<div class="modal-overlay modal-toggle"></div>
	
	<div class="modal-wrapper modal-transition">
		
		<div class="modal-header">
			
			<button class="modal-close modal-toggle"><i class="fas fa-times"></i></button>
			
			<h2 class="modal-heading"><?php the_field("video_description"); ?></h2>
			
		</div>
	
		<div class="modal-body">
			
			<div class="modal-content">
				
				<video autoplay muted loop>
        
					<source src="<?php the_field('video_file');?>" type="video/mp4">
				
				</video>
				
			</div>
			
		</div>
		
	</div>
	
</div>