<?php

class CelularInversoTest extends PHPUnit_Framework_TestCase {

	public function testV() {
		$obj = new CelularInverso('V');
		$this->assertEquals(8, $obj->resolve());
	}

	public function testI() {
		$obj = new CelularInverso('I');
		$this->assertEquals(4, $obj->resolve());
	}

	public function testVIVO() {
		$obj = new CelularInverso('VIVO');
		$this->assertEquals(8486, $obj->resolve());
	}

	public function testABC() {
		$obj = new CelularInverso('ABC');
		$this->assertEquals(222, $obj->resolve());
	}

	public function testDOJOMT() {
		$obj = new CelularInverso('DOJOMT');
		$this->assertEquals(365668, $obj->resolve());
	}

	public function testHomeSweetHome() {
		$obj = new CelularInverso('1-HOME-SWEET-HOME');
		$this->assertEquals('1-4663-79338-4663', $obj->resolve());
	}

	/**
     * @expectedException        Exception
     * @expectedExceptionMessage Blablabla
     */
	public function testSpecialCharacters() {
		$obj = new CelularInverso('878$&@');
		$obj->resolve();
	}

	/**
     * @expectedException        Exception
     * @expectedExceptionMessage Blablabla
     */
	public function testUnexpectedCharacters() {
		$obj = new CelularInverso('8[]78{');
		$obj->resolve();
	}

	public function testLowerCase() {
		$obj = new CelularInverso('home4241');
		$this->assertEquals(46634241, $obj->resolve());
	}

	public function testSpecialCharactersAllowed() {
		$obj = new CelularInverso('#*35nk');
		$this->assertEquals('#*3565', $obj->resolve());
	}

	public function testSpaces() {
		$obj = new CelularInverso('#*35 nk');
		$this->assertEquals('#*35065', $obj->resolve());
	}
	/**
     * @expectedException InvalidArgumentException
     */
	public function testWithoutArgument() {
		$this->setExpectedException('InvalidArgumentException');
		new CelularInverso();
	}

}