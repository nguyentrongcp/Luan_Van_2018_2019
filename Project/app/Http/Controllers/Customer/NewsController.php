<?php

namespace App\Http\Controllers\Customer;

use App\News;
use App\NewsVisited;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index() {
        $newses = News::all();

        return view('customer.news.index', compact([
            'newses'
        ]));
    }

    public function show($slug, Request $request) {

        $news = News::where('slug', $slug)->first();
        $ip = $request->ip();
        if (NewsVisited::where('ip', $ip)->where('news_id', $news->id)->count() > 0) {
            $news_visited = NewsVisited::where('ip', $ip)->where('news_id', $news->id)->first();
            if (time() - date_create($news_visited->last_date)->getTimestamp() >= 1800) {
                $news_visited->last_date = date('Y-m-d H:i:s');
                $news_visited->count++;
                $news_visited->update();
            }
        }
        else {
            $news_visited = new NewsVisited();
            $news_visited->news_id = $news->id;
            $news_visited->ip = $ip;
            $news_visited->last_date = date('Y-m-d H:i:s');
            $news_visited->count = 1;
            $news_visited->save();
        }

        return view('customer.news.show.index', compact([
            'news'
        ]));
    }
}
