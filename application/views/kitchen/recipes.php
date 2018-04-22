<div class="form column-wrapper clearfix">
	<?php /* <div class="cp-title"><?php echo $title; ?></div> */ ?>
	<div class="searchbox">
		<label for="search-by"><i class="fa fa-search"></i></label>
		<input id="search-by" type="text" placeholder="Search Recipes">
	</div>
		<div class="recipes">
		<?php foreach ($recipes as $recipes_item): ?>
		<div class="recipe">
		        <h3><?php echo $recipes_item['title']; ?></h3>
		                <div class="description"><?php echo $recipes_item['description']; ?></div>
		        <div class="recipe_view"><a href="<?php echo site_url('recipes/'.$recipes_item['slug']); ?>">View recipe</a></div>
		</div>
		<?php endforeach; ?>
		</div>
</div>
