<?php
class Recipes_model extends CI_Model {

  public function __construct()
  {
          $this->load->database();
  }

  public function get_recipes($slug = FALSE)
  {
    if ($slug === FALSE) {
      $query = $this->db->get('recipes');
      return $query->result_array();
    }
      $query = $this->db->get_where('recipes', array('slug' => $slug));
      return $query->row_array();
   }

	public function set_recipes()
	{
	    $this->load->helper('url');

	    $slug = url_title($this->input->post('title'), 'dash', TRUE);

	    $recipe_data = array(
	    	  'source'         => $this->input->post('source', TRUE),
	        'title'          => $this->input->post('title', TRUE),
	        'slug'           => $slug,
	        'description'    => $this->input->post('description', TRUE),
	        'instructions'   => $this->input->post('instructions', TRUE),
	        'total_time'     => $this->input->post('total_time', TRUE),
	        'servings_yield' => $this->input->post('servings_yield', TRUE),
          'notes'          => $this->input->post('notes', TRUE)
	    );
	
	    $this->db->insert('recipes', $recipe_data);
	    
	    $source_id = $this->db->insert_id();
	    
	    $this->set_ingredients($source_id);
	    
	    /*
	    * Process Icing Ingredients array  
	    *  array_filter() function's default behavior 
	    *  will remove all values from array
	    *  which are equal to null, 0, '' or false
	    */
	    
	    $icingIngredients = $this->input->post('ingredient_icing_col1', TRUE);
	    
	    $errors = array_filter($icingIngredients);

	    if (!empty($errors)) {
	    	$this->set_icingIngredients($source_id);
	    }

	    /**
	     * Set Icing Instructions
	     */
	    $icing_instructions = $this->input->post('icing_instructions', TRUE);

	    if (!empty($icing_instructions)) {
	    	$this->setIcingInstructions($icing_instructions, $source_id);
	    }
	}
	
	public function get_ingredients($source_id = null)
	{
		if ($source_id === null)
		{
			return;
		}
		
		$query = $this->db->query("SELECT * FROM `ingredients` WHERE `source` = ".$source_id." ORDER BY `id` ASC LIMIT 0, 30 ");
		return $query->result_array();
	}
	
	private function set_ingredients($source_id = null)
	{
	
	    $ingredients1 = $this->input->post('ingredients_col1', TRUE);
	    $ingredients2 = $this->input->post('ingredients_col2', TRUE);
	
            $ingredients = array_merge($ingredients1,$ingredients2);
		
	    $ingredient_data = [];
	    $i = 0;
		
		if(isset($ingredients)) {
		    foreach ($ingredients as $value) {
		    	if(empty($value)) {
		    	    unset($value);
		    	} else {
			    $ingredient_data[$i]['source'] = $source_id;
			    $ingredient_data[$i]['ingredient'] = $value;
			    $i++;
			}
		    }
		 }

	    $this->db->insert_batch('ingredients', $ingredient_data);
	
	}
	
	private function set_icingIngredients($source_id = null)
	{
	
	    $icing1 = $this->input->post('ingredient_icing_col1', TRUE);
	    $icing2 = $this->input->post('ingredient_icing_col2', TRUE);

	    $icing_ingredients = array_merge($icing1,$icing2);

	    $icing_ingredient_data = [];
	    $i = 0;
	
		if(isset($icing_ingredients)) {
		    foreach ($icing_ingredients as $value) {
		    	if(empty($value)) {
		    		unset($value);
		    	  } else {
				$icing_ingredient_data[$i]['source'] = $source_id;
				$icing_ingredient_data[$i]['ingredient'] = $value;
				$i++;
			  }
		      }
		 }

	    	$this->db->insert_batch('ingredients_icing', $icing_ingredient_data);
	  }
	
	public function get_icingIngredients($source_id = null)
	{
		if ($source_id === null)
		{
			return;
		}
		
		$query = $this->db->query("SELECT * FROM `ingredients_icing` WHERE `source` = ".$source_id." ORDER BY `id` ASC LIMIT 0, 30 ");
		return $query->result_array();
	}

	public function setIcingInstructions($instructions, $source_id = null)
	{
		if ($source_id === null)
		{
			return;
		}

		$sql = "INSERT INTO `instructions_icing` (`source`, `instructions`) VALUES ('".$source_id."', '".$instructions."')";
		$this->db->query($sql);
	}

	public function getIcingInstructions($source_id = null)
	{
		if ($source_id === null)
		{
			return;
		}

		$query = $this->db->query("SELECT `instructions` FROM `instructions_icing` WHERE `source` = '".$source_id."'");
		return $query->result_array();
	}
/*
	public function remove_recipe($slug)
	{
		$query = $this->db->query(
			"SELECT `id`
			FROM  `recipes`
			WHERE  `slug` =  '".$slug."'"
			);
		$row = $query->row();

		if (isset($row))
		{
		   $query = $this->db->query(
			"DELETE
			FROM  `recipes`
			WHERE  `id` =  '".$row->id."'"
			);

		   $query = $this->db->query(
			"DELETE
			FROM  `ingredients`
			WHERE  `source` =  '".$row->id."'"
			);

		   $query = $this->db->query(
			"DELETE
			FROM  `ingredients_icing`
			WHERE  `source` =  '".$row->id."'"
			);

		   $query = $this->db->query(
			"DELETE
			FROM  `instructions_icing`
			WHERE  `source` =  '".$row->id."'"
			);

		}

	}
  */

}
