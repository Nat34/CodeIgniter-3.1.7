<?php

	$textdata = array
	  (
	  array('name' => 'description', 'rows' => '5', 'cols'=> '10'),
	  array('name' => 'instructions', 'rows' => '5', 'cols'=> '10'),
    array('name' => 'icing_instructions', 'rows' => '5', 'cols'=> '10'),
	  );
?>


<div class="wrap">
<div class="form column-wrapper clearfix">
    <div class="cp-title">
        <?php echo $title; ?>
    </div>
    <div class="cp-text">
        <p>To submit your tasty recipe, please fill in all fields. Title your recipe, your source, put an eye-catching description, 
		list the ingredients and the instructions.</p>
    </div>
    <div class="form_validation_wrapper">
    	<?php echo validation_errors(); ?>
    </div>
    <?php echo form_open('kitchen/create'); ?>

    <label for="title">Title</label>
    <?php echo form_input('title', set_value('title'), TRUE); ?><br />
    
    <label for="source">Source</label>
    <?php echo form_input('source', set_value('source'), TRUE); ?><br />
    
    <label for="description">Description</label>
    <?php echo form_textarea($textdata[0], set_value($textdata[0]['name']), TRUE); ?><br />
    
    <label for="total_time">Total Time</label>
    <?php echo form_input('total_time', set_value('total_time'), TRUE); ?><br />

    <label for="ingredients">Ingredients</label>

    <?php
    
        echo '<div class="ingred_input_wrapper">';
    	echo '<div id="ingredient_col1">';
	    for($i = 0; $i < 5; $i++) {
	    	$a = set_value('ingredients_col1['.$i.']');
	    	echo form_input('ingredients_col1[]', $a, TRUE);
	    }
	echo '</div>';
    	echo '<div id="ingredient_col2">';
	    for($i = 0; $i < 5; $i++) {
	    	$a = set_value('ingredients_col2['.$i.']');
	    	echo form_input('ingredients_col2[]', $a, TRUE);
	    }
	echo '</div>';
	echo '</div>';
    ?>
    
    <label for="instructions">Instructions</label>
    <?php echo form_textarea($textdata[1], set_value($textdata[1]['name']), TRUE); ?><br />
    
    <label for="ingredients_icing">Icing Ingredients (Optional)</label>
    <?php
        echo '<div class="ingred_input_wrapper">';
    	echo '<div id="ingredient_icing_col1">';
	    for($i = 0; $i < 5; $i++) {
	    	$a = set_value('ingredient_icing_col1['.$i.']');
	    	echo form_input('ingredient_icing_col1[]', $a, TRUE);
	    }
	echo '</div>';
    	echo '<div id="ingredient_icing_col2">';
	    for($i = 0; $i < 5; $i++) {
	    	$a = set_value('ingredient_icing_col2['.$i.']');
	    	echo form_input('ingredient_icing_col2[]', $a, TRUE);
	    }
	echo '</div>';
	echo '</div>';
    ?>
    
    <label for="icing_instructions">Icing Instructions (Optional)</label>
    <?php echo form_textarea($textdata[2], set_value($textdata[2]['name']), TRUE); ?><br />

    <input type="submit" name="submit" value="Create Recipe" />

</form>
</div>
</div>

