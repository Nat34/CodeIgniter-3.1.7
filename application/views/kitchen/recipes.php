<div class="form column-wrapper clearfix">
	<?php /* <div class="cp-title"><?php echo $title; ?></div> */ ?>
	<div class="selectbox_wrapper">
		<select class="selectbox" name="Category">
		<option value="select">Select a category</option>
		<option value="all">All</option>
		<option value="cookies">Cookies</option>
		<option value="cakes">Cakes</option>
		<option value="chicken">Chicken</option>
		<option value="beef">Beef</option>
		<option value="seafood">Seafood</option>
		<option value="breakfast_items">Breakfast Items</option>
		</select>
	</div>
		<div class="recipes">
		<?php foreach ($recipes as $recipes_item): ?>
		<div class="recipe <?php echo $recipes_item['category']; ?>">
		        <h3><?php echo $recipes_item['title']; ?></h3>
		                <div class="description"><?php echo $recipes_item['description']; ?></div>
		        <div class="recipe_view"><a href="<?php echo site_url('recipes/'.$recipes_item['slug']); ?>">View recipe</a></div>
		</div>
		<?php endforeach; ?>
		</div>
</div>

<script type="text/javascript">
$(".selectbox").change( function(){
let category = $(this).val();
const recipes = $(".recipes");
    recipes.find(".recipe").each(function(index, value){
    	if (!$(value).hasClass(category)) {
				$(value).addClass("hidden");
        } else {
            $(value).removeClass("hidden");
        }
        if (category == "all" || category == "select") {
            $(value).removeClass("hidden");
        }
    });
});
</script>