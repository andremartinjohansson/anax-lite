<?php

namespace QuasaR\Calendar;

class CalendarTest extends \PHPUnit_Framework_TestCase
{
    public function testDate()
    {
        $calendar = new Calendar(5, 2017);
        $this->assertEquals(2017, $calendar->year);
        $this->assertEquals(2017, $calendar->getYear());
        $this->assertEquals(5, $calendar->month);
        $this->assertEquals(5, $calendar->getMonth());
        $this->assertTrue(isset($calendar->date));
        $this->assertTrue(isset($calendar->calendarMonth));
    }

    public function testMonth()
    {
        $calendar = new Calendar(5, 2017);
        $calendar->createMonth();
        $this->assertEquals(31, $calendar->calendarMonth->daysInMonth);
        $this->assertEquals(32, $calendar->calendarMonth->daysInPrevMonth);
        $this->assertTrue(isset($calendar->calendarMonth->blank));

        $month = new Month(5, 2017);
        $month->prepMonth(5, 2017);
        $this->assertEquals(31, $month->daysInMonth);
        $this->assertEquals(32, $month->daysInPrevMonth);
        $this->assertTrue(isset($month->blank));
    }

    public function testDraw()
    {
        $calendar = new Calendar(5, 2017);
        $calendar->createMonth();
        $calendar->createPicture();
        $calendar->createCalendar();
    }
}
