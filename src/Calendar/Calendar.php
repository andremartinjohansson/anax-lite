<?php

namespace QuasaR\Calendar;

class Calendar
{
    public $date;
    public $month;
    public $year;
    public $title;
    public $calendarMonth;

    public function __construct($month, $year)
    {
        $this->date = time();

        $this->month = (int)$month;
        $this->year = (int)$year;

        if ($this->month == 0) {
            $this->year = $this->year - 1;
        }

        if ($this->month == 13) {
            $this->year = $this->year + 1;
        }

        if ($this->month <= 0) {
            $this->month = 12 + $this->month;
        }

        if ($this->month >= 13) {
            $this->month = abs(12 - $this->month);
        }

        $temp = mktime(0, 0, 0, $this->month, 1, $this->year);
        $this->title = date('F', $temp);

        $this->calendarMonth = new Month($this->month, $this->year);
    }

    public function getYear()
    {
        return $this->year;
    }

    public function getMonth()
    {
        return $this->month;
    }

    public function createPicture()
    {
        echo "<div class='month-pic'>
        <h3>$this->title</h3>
        <img src='image/$this->title.jpg' alt='Month image'>
        </div>";
    }

    public function createMonth()
    {
        $this->calendarMonth->prepMonth($this->month, $this->year);
    }

    public function createCalendar()
    {
        $daysMonth = $this->calendarMonth->daysInMonth;
        $daysPrevMonth = $this->calendarMonth->daysInPrevMonth;
        $blank = $this->calendarMonth->blank;

        echo "<table class='calendar'>";
        echo "<tr><th colspan=7> $this->title $this->year </th></tr>";
        echo "<tr class='days'><td>Mon</td><td>Tue</td><td>Wed</td><td>Thu</td><td>Fri</td>
        <td>Sat</td><td class='red'>Sun</td></tr>";

        $dayCount = 1;

        echo "<tr>";

        while ($blank > 0) {
            echo "<td class='gray'> $daysPrevMonth </td>";
            $blank = $blank-1;
            $dayCount++;
            $daysPrevMonth++;
        }

        $dayNum = 1;

        while ($dayNum <= $daysMonth) {
            if ($dayCount == 7) {
                echo "<td class='red'> $dayNum </td>";
            } else {
                echo "<td> $dayNum </td>";
            }
            $dayNum++;
            $dayCount++;

            if ($dayCount > 7) {
                echo "</tr><tr>";
                $dayCount = 1;
            }
        }

        $dayNum = 1;

        while ($dayCount > 1 && $dayCount <= 7) {
            echo "<td class='gray'> $dayNum </td>";
            $dayNum++;
            $dayCount++;
        }

        echo "</tr></table>";
    }
}
