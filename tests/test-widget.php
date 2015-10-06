<?php

class Bizzabo_Tickets_Widget_Test extends WP_UnitTestCase {

	function test_sample() {
		// replace this with some actual testing code
		$this->assertTrue( true );
	}

	function test_class_exists() {
		$this->assertTrue( class_exists( 'Bizzabo_Tickets_Widget') );
	}

	function test_class_access() {
		$this->assertTrue( bizzabo_tickets()->widget instanceof Bizzabo_Tickets_Widget );
	}
}
