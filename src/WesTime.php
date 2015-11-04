<?php
/**
 * This is a simple class to demonstrate the test driven development processes
 * as sample code for Time. The class is a simple time calculator with a few
 * methods that will be unit tested with phpunit
 *
 * User: wesleynitsckie
 * Date: 2015/11/04
 * Time: 9:04 AM
 */

namespace WesTime;

/**
 * The WesTime object class used for managing all time related functionality
 *
 * Class WesTime
 *
 * @package WesTime
 * @author Wesley Nitsckie <wesleynitsckie@gmail.com>
 * @copyright Wesley Nitsckie <wesleynitsckie@gmail.com>
 */
class WesTime {

    /**
     * @var \DateTime
     */
    private $objDateTime;

    /**
     * @param string $dateTime
     * @throws \Exception
     */
    public function __construct($dateTime = "NOW"){
        try {
            $this->objDateTime = new \DateTime($dateTime);
        } catch (\Exception $e) {
            throw new \Exception('DateTime::create error');
        }
    }

    /**
     * Return what day is it
     *
     * @return String
     */
    public function getDay(){
        return $this->objDateTime->format("l");
    }

    /**
     * Get the day for tomorrow
     *
     * @return string
     */
    public function getDayAfter(){
        return $this->objDateTime
                    ->add(new \DateInterval("P1D"))
                    ->format("l");
    }

    /**
     *  Return Age in Years
     *
     * @param Datetime|String $now
     * @return Integer
     */
    public function getAge($now = "NOW"){
        $toDate = new \DateTime($now);
        return $this->objDateTime
                    ->diff($toDate)
                    ->format('%y');
    }
}