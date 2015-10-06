<?php

class BaseTest extends WP_UnitTestCase {

	function test_sample() {
		// replace this with some actual testing code
		$this->assertTrue( true );
	}

	function test_class_exists() {
		$this->assertTrue( class_exists( 'Bizzabo_Tickets') );
	}
	
	function test_get_instance() {
		$this->assertTrue( bizzabo_tickets() instanceof Bizzabo_Tickets );
	}
}
