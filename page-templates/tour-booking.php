<?php
/**
 * ============== Template Name: Tour Booking
 *
 * @package ramsbury
 */
get_header();?>


<?php get_template_part('template-parts/page', 'hero');?>

<div class="tour-container mb1 mt10 mr1 ml1">
	
	<div class="container">
	
<!-- ******************* Main Content Area ******************* -->

	<div class="h1 mt1">Title</div>
	<div class="description mb5">Phasellus nec vehicula neque, in faucibus arcu. Aenean luctus facilisis lacus in tempus. Nunc vestibulum quam lacinia est porttitor luctus. Vestibulum semper turpis nec nulla pharetra fermentum. Duis sed lacinia ligula, sit amet imperdiet nisl. Phasellus pharetra nunc vitae lacus accumsan, nec gravida nibh tincidunt. Nam ullamcorper libero vitae rutrum feugiat. Phasellus sagittis vestibulum mi hendrerit hendrerit. Proin laoreet erat et enim aliquet finibus. Donec sed blandit sem. Suspendisse non nisl a erat sodales pellentesque. Donec ac ligula eu nisi consectetur feugiat.</div>
	
	<div id="tour-datepicker" class="calendar"></div>
	
	<div class="wrapper-info mt1 mb2">
		
		<div class="pick-info">
			
			<div class="input-tour">
				
				<span>
					<select id="time-booking">
						<option value="" disabled selected hidden>Time Slot</option>
					</select>
				</span>
				
			</div>
			<div class="spots-remaining"></div>
			
			<div class="input-tour quantity">
				<div class="minus">
					<i class="fas fa-minus"></i>
				</div>
				<input id="quantity-booking" type="number" step="1" min="1" class="qty" placeholder="Number in Party"></input>
				<div class="plus">
					<i class="fas fa-plus"></i>
				</div>
			</div>
			
			<div class="input-tour">
				<button class="book-tour">Book Tour</button>
				<div class="tour-error"></div>
			</div>
			
		</div>
		
		<div class="pick-info">
			
			<div class="summary">
				<p>Summary</p>
				<p>Date: <span class="sum-date"></span></p>
				<p>Time: <span class="sum-time"></span></p>
				<p>Number: <span class="sum-number"></span></p>
			</div>
			<p class="tour-total">Total Cost: <span></span></p>
		</div>
	</div>
	
	</div>

</div>


<?php get_footer();?>
