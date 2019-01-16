<?php

    /**
    * find the % of a number
    *
    * @param $x
    * @param $total
    */

    function percentage($total, $x){

        if($total == 0){
            return 0;
        }else {
            $val = ($x * 100)/$total;
            return round( $val, 1, PHP_ROUND_HALF_UP);
        }
    }

    /**
    * find the commission amount
    *
    * @param $percentage
    * @param $total
    */

    function calculate_commission($total, $percantage)
    {
        if($total <= 0){
            return 0;
        }
        else {
            $val = ($percantage / 100) * $total;
            return floatval($val);
        }
    }

     /**
     * generates a 12 random digit number.
     *
     * @return init
     */
    function unique_code()
    {
        return mt_rand(100000000000, 99999999999999);
    }

