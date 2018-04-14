<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

class Kitchen_test extends TestCase
{
	/*
	 * @uses TestCase::request runs a controller method
	 */
	public function test_index()
	{
		//returns output strings (view)
		$output = $this->request('GET', 'kitchen/index');
		$this->assertContains('<h1 class="headline">Thomas Family Recipes</h1>', $output);
	}

}
