<?php

class Bizzabo_Tickets_Output_Test extends WP_UnitTestCase {

	function test_sample() {
		// replace this with some actual testing code
		$this->assertTrue( true );
	}

	function test_class_exists() {
		$this->assertTrue( class_exists( 'Bizzabo_Tickets_Output') );
	}

	function test_class_access() {
		$this->assertTrue( bizzabo_tickets()->output instanceof Bizzabo_Tickets_Output );
	}
}
