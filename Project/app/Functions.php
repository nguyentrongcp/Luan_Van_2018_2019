<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Functions extends Model
{
    public static function getTimeCount($last_time) {
        $current_time = time();
        $time_count = $current_time - $last_time;
        if ($time_count / 86400 >= 1) {
            return (int)($time_count / 86400).' ngày trước';
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

    public static function isSalesOff() {
        foreach (SalesOff::all() as $sale) {
            if ($sale->salesOffDetails()->count() > 0) {
                return true;
            }
        }

        return false;
    }
}
