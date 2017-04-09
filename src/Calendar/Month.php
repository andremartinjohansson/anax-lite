<?php

namespace QuasaR\Calendar;

class Month
{
    public $blank;
    public $daysInMonth;
    public $daysInPrevMonth;

    public function __construct($month, $year)
    {
        $this->daysInMonth = cal_days_in_month(0, $month, $year);
    }

    public function prepMonth($month, $year)
    {
        $firstDay = mktime(0, 0, 0, $month, 1, $year);
        $dayOfWeek = date('D', $firstDay);

        switch ($dayOfWeek) {
            case "Mon":
                $this->blank = 0;
                break;
            case "Tue":
                $this->blank = 1;
                break;
            case "Wed":
                $this->blank = 2;
                break;
            case "Thu":
                $this->blank = 3;
                break;
            case "Fri":
                $this->blank = 4;
                break;
            case "Sat":
                $this->blank = 5;
                break;
            case "Sun":
                $this->blank = 6;
                break;
        }

        $this->daysInPrevMonth = cal_days_in_month(0, $month, $year);
        $this->daysInPrevMonth = $this->daysInPrevMonth - ($this->blank - 1);
    }
}
