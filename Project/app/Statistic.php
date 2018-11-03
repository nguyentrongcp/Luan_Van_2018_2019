<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Statistic extends Model
{
    public static function getFoodyAmountOnSale() {
        $total = DB::table('sales_off_details')
            ->join('sales_offs', 'sales_offs.id', '=', 'sales_off_details.sales_off_id')
            ->where('sales_offs.end_date', '>=', date('Y-m-d'))
            ->count();

        return $total;
    }
    public static function getOutOffStock(){
        $total = DB::table('foody_statuses')
            ->where('status',false)
            ->count();

        return $total;
    }
    public static function getFoodyType() {
        $atypefoodies = DB::table('foodies')
            ->leftJoin('foody_types', 'foody_types.id', '=', 'foodies.foody_type_id')
            ->select(['foody_types.name as label', DB::raw('count(*) as value')])
            ->groupBy('foody_types.id')->get();

        return $atypefoodies;
    }
}
