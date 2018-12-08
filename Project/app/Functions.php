<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Functions extends Model
{
    public static function getTimeCount($last_time, $time = true) {
        $current_time = time();
        $time_count = $current_time - $last_time;
        if ($time_count / 86400 >= 1) {
            $date = (int)($time_count / 86400);
            if ($time) {
                $format = 'd/m/Y H:i';
            }
            else {
                $format = 'd/m/Y';
            }
            if ($date == 1) {
                return 'Hôm qua';
            }
            elseif ($date > 7) {
                return date_format(date_create(date('Y-m-d H:i:s', $last_time)), $format);
            }
            else {
                return $date.' ngày trước';
            }
        }
        elseif ($time_count / 3600 >= 1) {
            return (int)($time_count / 3600).' giờ trước';
        }
        elseif ($time_count / 60 >= 1) {
            return (int)($time_count / 60).' phút trước';
        }
        else {
            return (int)($time_count).' giây trước';
        }
    }

    public static function getDateCount($last_time) {
        $current_time = time();
        $time_count = $current_time - $last_time;
        if ($time_count / 86400 >= 1) {
            $date = (int)($time_count / 86400);
            if ($date == 1) {
                return '(Hôm qua)';
            }
            elseif ($date <= 30) {
                return '('.$date.' ngày trước)';
            }
            else {
                return '';
            }
        }
        elseif ($time_count / 3600 >= 1) {
            return '('.(int)($time_count / 3600).' giờ trước)';
        }
        elseif ($time_count / 60 >= 1) {
            return '('.(int)($time_count / 60).' phút trước)';
        }
        else {
            return '('.(int)($time_count).' giây trước)';
        }
    }

    public static function getHotNews() {
        $newses = [];
        foreach(News::all() as $news) {
            $newses[] = [
                'id' => $news->id,
                'view' => $news->getVisited()
            ];
        }
        $newses = array_reverse(array_sort($newses, function($newses) {
            return $newses['view'];
        }));
        $results = [];
        foreach($newses as $key => $news) {
            if ($key == 5) {
                break;
            }
            $results[] = News::find($news['id']);
        }

        return $results;
    }

    public static function getHotFoody() {
        $results = [];
        foreach(Foody::all() as $foody) {
            $results[] = [
                'id' => $foody->id,
                'count' => $foody->getBuyCount()
            ];
        }
        $results = array_reverse(array_sort($results, function($results) {
            return $results['count'];
        }));
        $foodies = [];
        foreach($results as $result) {
            $foodies[] = Foody::find($result['id']);
        }

        return $foodies;
    }

    public static function getHotFoodyByDate($date) {
        $results = [];
        foreach(Foody::all() as $foody) {
            $results[] = [
                'id' => $foody->id,
                'count' => $foody->getBuyCountByDate($date)
            ];
        }
        $results = array_reverse(array_sort($results, function($results) {
            return $results['count'];
        }));
        $foodies = [];
        foreach($results as $result) {
            $foodies[] = Foody::find($result['id']);
        }

        return $foodies;
    }

    public static function getHotFoodyByDates($start, $end) {
        $results = [];
        foreach(Foody::all() as $foody) {
            $results[] = [
                'id' => $foody->id,
                'count' => $foody->getBuyCountByDates($start, $end)
            ];
        }
        $results = array_reverse(array_sort($results, function($results) {
            return $results['count'];
        }));
        $foodies = [];
        foreach($results as $result) {
            $foodies[] = Foody::find($result['id']);
        }

        return $foodies;
    }

    public static function isSalesOff() {
        foreach (SalesOff::all() as $sale) {
            if ($sale->salesOffDetails()->count() > 0) {
                return true;
            }
        }

        return false;
    }
}
