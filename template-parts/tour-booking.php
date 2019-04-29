<div class="tour-booking dark-block">
	
	<h2 class="heading heading__lg heading__light mb2"><?php the_field("subtitle"); ?></h2>
	
	<div class="tour-description mb5"><?php the_field("description"); ?></div>

	<div id="tour-datepicker" class="calendar"></div>
		
	<div class="wrapper-info mt1">
		
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
				
				<div class="minus-custom">
					<i class="fas fa-minus"></i>
				</div>
				
				<input id="quantity-booking" type="number" step="1" min="1" class="qty" placeholder="Number in Party"></input>
				
				<div class="plus-custom">
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
