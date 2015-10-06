<?php

class BT_Order_Test extends WP_UnitTestCase {

	function test_sample() {
		// replace this with some actual testing code
		$this->assertTrue( true );
	}

	function test_class_exists() {
		$this->assertTrue( class_exists( 'BT_Order') );
	}

	function test_class_access() {
		$this->assertTrue( bizzabo_tickets()->order instanceof BT_Order );
	}
}
