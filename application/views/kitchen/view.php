<div class="form column-wrapper clearfix">
  <div class="single_recipe">
		<?php
			echo '<h2>'.$recipes_item['title'].'</h2>';
			echo '<div class="item">by '.$recipes_item['source'].'</div>';
			echo '<div class="description">'.$recipes_item['description'].'</div>';

			if(!empty($recipes_item['total_time'])) {
				echo '<label>Total Time</label>';
				echo '<div class="total_time">'.$recipes_item['total_time'].'</div>';
			}
			
			if(!empty($recipes_item['servings_yield'])) {
				echo '<label>Servings/Yield</label>';
				echo '<div class="servings_yield">'.$recipes_item['servings_yield'].'</div>';
			}

			if(!empty($recipes_item['ingredients'])) {
				echo '<label>Ingredients</label>';
				echo '<div class="ingredients">';
				for ($i = 0; $i < count($recipes_item['ingredients']); $i++) {
	    				echo '<div class="ingredient">'.$recipes_item['ingredients'][$i]['ingredient'].'</div>';
				}
				echo '</div>';
			}
			
			$instructions = explode(".", $recipes_item['instructions']);

			echo '<label>Instructions</label>';
			echo '<div class="instructions">';
			foreach ($instructions as $instruction) {
				if ($instruction == "") { break; }
				echo $instruction . "." . "</br>";
			}
			echo '</div>';

			if(!empty($recipes_item['ingredients_icing'])) {
				echo '<label>Icing Ingredients</label>';
				echo '<div class="ingredients">';
				for ($i = 0; $i < count($recipes_item['ingredients_icing']); $i++) {
	    				echo '<div class="ingredient">'.$recipes_item['ingredients_icing'][$i]['ingredient'].'</div>';
				}
				echo '</div>';
			}

			if (!empty($recipes_item['instructions_icing'][0]['instructions'])) {
				
				$icing_instructions = explode(".", $recipes_item['instructions_icing'][0]['instructions']);
				
				echo '<label>Icing Instructions</label>';
				echo '<div class="instructions">';
				foreach ($icing_instructions as $instruction) {
					if ($instruction == "") { break; }
					echo $instruction . "." . "</br>";
				}
				echo '</div>';
			}

		?>
		
		<div class="helper_icons">
			<div class="tooltip">
				<a href="<?php echo site_url('recipes/remove/'.$recipes_item['slug']); ?>" 
				    onclick="return confirm('Are you sure?');">
				   	<i class="material-icons">delete</i>
				</a>
				<span class="tooltiptext tooltip-bottom">Remove Recipe</span>
			</div>
			<div class="tooltip">
				<a href="javascript:window.print()">
					<i class="material-icons">print</i>
				</a>
				<span class="tooltiptext tooltip-bottom">Print Recipe</span>
			</div>
		</div>

		
				<!--
		<div id="email"><a href="<?php echo site_url('recipes/email/'.$recipes_item['slug']); ?>"><i class="material-icons">email</i></a></div> 
		-->
		
	</div>
</div>
