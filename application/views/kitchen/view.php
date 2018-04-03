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

<style>

.tooltip {
    position: relative;
    display: inline-block;
    color: #006080;
}

.tooltip .tooltiptext {
    visibility: hidden;
    position: absolute;
    width: 120px;
    background-color: rgba(97,97,97,.9);
    color: #fff;
    font-size: .775em;
    text-align: center;
    padding: 10px 0;
    border-radius: 2px;
    z-index: 1;
    opacity: 0;
    transition: opacity 0.3s;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}

.tooltip-bottom {
  top: 125%;
  left: 50%;  
  margin-left: -60px;
}

</style>