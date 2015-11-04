<?php
/**
 * This is the Unit Test file for testing the Test object and its methods
 *
 * User: Wesley Nitsckie <wesleynitsckie@gmail.com>
 *
 * Date: 2015/11/04
 * Time: 9:10 AM
 */

namespace WesTime;

require './src/WesTime.php';
use WesTime\WesTime;

class WesTimeTest extends \PHPUnit_Framework_TestCase{

    /**
     * @covers \WesTime\WesTime::__construct
     * @expectedException \Exception
     */
    public function testCannotBeConstructedFromNonDateValue(){
        new WesTime("12- 12 July 2015");
    }

    /**
     * @covers \WesTime\WesTime::__construct
     *
     */
    public function testCanBeContructedFromValidDateString(){
        $d = new WesTime("12 July 2015");
        $this->assertInstanceOf(WesTime::class, $d);
    }

    /**
     * @covers \WesTime\WesTime::getDay
     */
    public function testCannotBeToday(){
        // Get tomorrow's day
        $d = new \DateTime("tomorrow");
        $t = new WesTime();

        $this->assertNotEquals($d->format('l'), $t->getDay());
    }

    /**
     * @covers \WesTime\WesTime::getDay
     */
    public function testCanBeToday(){
        // Get today's day
        $d = new \DateTime("NOW");
        $t = new WesTime();

        $this->assertEquals($d->format('l'), $t->getDay());
    }

    /**
     * @covers \WesTime\WesTime::getDay
     */
    public function testCanAnyToday(){
        // Get a date
        $dateString = "19 July 1979";
        $d = new \DateTime($dateString);
        $t = new WesTime($dateString);

        $this->assertEquals($d->format('l'), $t->getDay());
    }

    /**
     * @covers \WesTime\WesTime::getDayAfter
     */
    public function testCanBeDayAfter(){
        // Get tomorrow's day
        $d = new \DateTime("tomorrow");
        $t = new WesTime();

        $this->assertSame($d->format('l'), $t->getDayAfter());
    }

    /**
     * @covers \WesTime\WesTime::getDayAfter
     */
    public function testCannotBeDayAfter(){
        // Get tomorrow's day
        $d = new \DateTime("now");
        $t = new WesTime();

        $this->assertNotSame($d->format('l'), $t->getDayAfter());
    }

    /**
     * @covers \WesTime\WesTime::getAge
     */
    public function testCanBeZero(){
        $t = new WesTime("now");
        $this->assertEquals(0, $t->getAge());
    }

    /**
     * @covers \WesTime\WesTime::getAge
     */
    public function testCannotBeZero(){
        $dateString = "19 July 1979";
        $t = new WesTime($dateString);
        $this->assertNotEquals(0, $t->getAge());
    }
}