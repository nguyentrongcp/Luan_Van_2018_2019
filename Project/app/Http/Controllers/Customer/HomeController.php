<?php

namespace App\Http\Controllers\Customer;

use App\Favorite;
use App\Foody;
use App\FoodyType;
use App\Like;
use function foo\func;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {

    public function index(Request $request) {
        $foody_types = FoodyType::all();
        $foodies = Foody::all();
        $type = '';
        if ($request->session()->has('foody_type_id')) {
            $type = session('foody_type_id');
            $request->session()->forget('foody_type_id');
        }

        return view('customer.home.index', compact(['foody_types', 'foodies', 'type']));
    }

    public function getFoody(Request $request) {
        session(['foody_type_id' => $request->type_id]);

        return Response(route('customer.home'));
//        return Response(session('foody_type_id'));
    }

    public function getFoodySale($percent) {
        if ($percent == 0) {
            $foodies = DB::table('sales_off_details')->join('foodies', 'foody_id', 'foodies.id')
                ->join('sales_offs', 'sales_off_details.sales_off_id', 'sales_offs.id')
                ->where('start_date', '<=', date('Y-m-d'))
                ->where('end_date', '>=', date('Y-m-d'))
                ->orderBy('percent', 'desc')
                ->select('foodies.id')->get();
        }
        else {
            $foodies = DB::table('sales_off_details')->join('foodies', 'foody_id', 'foodies.id')
                ->join('sales_offs', 'sales_off_details.sales_off_id', 'sales_offs.id')
                ->where('start_date', '<=', date('Y-m-d'))
                ->where('end_date', '>=', date('Y-m-d'))
                ->where('percent', $percent)
                ->select('foodies.id')->get();
        }
        $results = [];
        foreach($foodies as $foody) {
            $results[] = Foody::find($foody->id);
        }

        return $results;
    }

    public function getFoodyType($type, &$foody_sales) {
        $foodies = Foody::where('foody_type_id', $type)
            ->orderBy('foody_created_at', 'desc')->get();
        $foody_sales = DB::table('sales_off_details')
            ->join('foodies', 'foody_id', 'foodies.id')
            ->join('sales_offs', 'sales_off_details.sales_off_id', 'sales_offs.id')
            ->where('start_date', '<=', date('Y-m-d'))
            ->where('end_date', '>=', date('Y-m-d'))
            ->where('foody_type_id', $type)
            ->orderBy('percent', 'desc')
            ->select('foodies.id')->get();

        return $foodies;
    }

    public function getFoodyFavorite(&$foody_sales) {
        $foodies = Favorite::where('customer_id', Auth::guard('customer')->user()->id)->get();
        $foody_sales = DB::table('sales_off_details')
            ->join('foodies', 'sales_off_details.foody_id', 'foodies.id')
            ->join('sales_offs', 'sales_off_details.sales_off_id', 'sales_offs.id')
            ->join('favorites', 'foodies.id', 'favorites.foody_id')
            ->where('customer_id', Auth::guard('customer')->user()->id)
            ->where('start_date', '<=', date('Y-m-d'))
            ->where('end_date', '>=', date('Y-m-d'))
            ->orderBy('percent', 'desc')
            ->select('foodies.id')->get();
        $results = [];
        foreach($foodies as $foody) {
            $results[] = Foody::find($foody->foody_id);
        }

        return $results;
    }

    public function getFoodyAll(&$foody_sales) {
        $foodies = Foody::orderBy('foody_created_at', 'desc')->get();
        $foody_sales = DB::table('sales_off_details')->join('foodies', 'foody_id', 'foodies.id')
            ->join('sales_offs', 'sales_off_details.sales_off_id', 'sales_offs.id')
            ->where('start_date', '<=', date('Y-m-d'))
            ->where('end_date', '>=', date('Y-m-d'))
            ->orderBy('percent', 'desc')
            ->select('foodies.id')->get();

        return $foodies;
    }

    public function getFoodyByDesc($foodies) {
        $foody_sorts = [];
        foreach($foodies as $foody) {
            $foody_sorts[] = ['id' => $foody->id, 'cost' => $foody->getSaleCost()];
        }
        $foody_sorts = array_reverse(array_sort($foody_sorts, function($foody_sorts) {
            return $foody_sorts['cost'];
        }));

        return $foody_sorts;
    }

    public function getFoodyByAsc($foodies) {
        $foody_sorts = [];
        foreach($foodies as $foody) {
            $foody_sorts[] = ['id' => $foody->id, 'cost' => $foody->getSaleCost()];
        }
        $foody_sorts = array_sort($foody_sorts, function($foody_sorts) {
            return $foody_sorts['cost'];
        });

        return $foody_sorts;
    }

    public function getFoodyByVote($foodies) {
        $foody_sorts = [];
        foreach($foodies as $foody) {
            $foody_sorts[] = ['id' => $foody->id, 'vote' => $foody->getVoted()->average];
        }
        $foody_sorts = array_sort($foody_sorts, function($foody_sorts) {
            return $foody_sorts['vote'];
        });

        return $foody_sorts;
    }

    public function getFoodyByLike($foodies) {
        $foody_sorts = [];
        foreach($foodies as $foody) {
            $foody_sorts[] = ['id' => $foody->id, 'like' => $foody->getLiked()];
        }
        $foody_sorts = array_sort($foody_sorts, function($foody_sorts) {
            return $foody_sorts['like'];
        });

        return $foody_sorts;
    }

    public function getFoodyByBuy($foodies) {
        $foody_sorts = [];
        foreach($foodies as $foody) {
            $foody_sorts[] = ['id' => $foody->id, 'buy' => $foody->orderFoodies()->count()];
        }
        $foody_sorts = array_sort($foody_sorts, function($foody_sorts) {
            return $foody_sorts['buy'];
        });

        return $foody_sorts;
    }

    public function getFoodyByDefault($foodies, $foody_sales) {
        $results = [];
        if ($foody_sales != null ) {
            $foody_sales_offs = [];
            $foody_sorts = [];
            foreach($foodies as $foody) {
                $foody_sorts[] = $foody['id'];
            }
            foreach($foody_sales as $foody_sale) {
                $foody_sales_offs[] = $foody_sale->id;
            }
            $foody_sorts = array_merge($foody_sales_offs, $foody_sorts);
            $foody_sorts = array_unique($foody_sorts, 0);

            foreach($foody_sorts as $foody_sort) {
                $results[] = Foody::find($foody_sort);
            }
            return $results;
        }

        foreach($foodies as $foody) {
            $results[] = Foody::find($foody->id);
        }
        return $results;
    }

    public function showFoody(Request $request) {
        $foody_sorts = [];
        $foody_sales = null;
        if ($request->foody_type_id == 'all') {
            $foodies = $this->getFoodyAll($foody_sales);
        }
        elseif ($request->foody_type_id == 'sale') {
            $foodies = $this->getFoodySale($request->sales_percent);
        }
        elseif ($request->foody_type_id == 'favorite') {
            $foodies = $this->getFoodyFavorite($foody_sales);
        }
        elseif (Foody::where('foody_type_id', $request->foody_type_id)->count() > 0) {
            $foodies = $this->getFoodyType($request->foody_type_id, $foody_sales);
        }
        else {
            return Response([
                'content' => "<div style='text-align: center;font-size: 20px;font-weight: bolder'>Không tìm thấy ẩm thực nào</div>",
                'end' => true,
                'number' => 0
            ]);
        }

        switch ($request->foody_sort_id) {
            case 'desc':
                $foody_sorts = $this->getFoodyByDesc($foodies);
                break;

            case 'asc':
                $foody_sorts = $this->getFoodyByAsc($foodies);
                break;

            case 'vote':
                $foody_sorts = $this->getFoodyByVote($foodies);
                break;

            case 'like':
                $foody_sorts = $this->getFoodyByLike($foodies);
                break;

            case 'buy':
                $foody_sorts = $this->getFoodyByBuy($foodies);
                break;

            case 'default':
                $foody_sorts = $this->getFoodyByDefault($foodies, $foody_sales);
                break;

            default:
                return Response([
                    'content' => "<div style='text-align: center;font-size: 20px;font-weight: bolder'>Không tìm thấy ẩm thực nào</div>",
                    'end' => true,
                    'number' => 0
                ]);
                break;
        }

//        return Response($foody_sorts);
        $data = '';
        $count = 0;
        $number = $request->number + 10;
        foreach ($foody_sorts as $foody) {
            if ($count++ >= $request->number && $count <= $number) {
                $data .= $this->createData($foody,$request);
            }
        }

        return Response([
            'content' => $data,
            'end' => $request->number + 10 >= count($foody_sorts),
            'number' => $number
        ]);
    }

    public function createData($foody, $request) {
        $data = '';
        if ($request->foody_sort_id != 'default') {
            $foody = Foody::find($foody['id']);
        }
        $id = $foody->id;
        $avatar = asset($foody->avatar);
        $name = $foody->name;
        $describe = $foody->describe;
        $cost = number_format($foody->getSaleCost());
        $favorite = 'bookmark outline';
        $slug = $foody->slug;
        $liked = $foody->getLiked();
        $buy_count = $foody->orderFoodies()->count();
        if (Auth::guard('customer')->check()) {
            if (Favorite::where('foody_id', $id)
                    ->where('customer_id', Auth::guard('customer')->user()->id)->count() > 0) {
                $favorite = 'bookmark';
            }
        }
        $data .= "
                <div class=\"row white show-foody-row\">
            <div class=\"col s12 m4 l4 show-foody-image\">
                <img src=\"$avatar\" class=\"responsive-img\">
            </div>
            <div class=\"col s12 m8 l8 show-foody-content\">
                <div class=\"show-foody-title truncate\">
                    <a class=\"black-text\" href=\"/foody/$slug\">$name</a>
                </div>
                <div class=\"show-foody-cost\">";
        if ($foody->isSalesOff()) {
            $old_cost = number_format($foody->currentCost());
            $sale_percent = $foody->getSalePercent();
            $data .= "
                    <span class=\"old-cost-container\">
                         <span class=\"old-cost\">$old_cost</span><sup>đ</sup>
                    </span>
                    <span class=\"cost\">
                         $cost<sup>đ</sup>
                    </span>
                    <span class=\"ui small red label pulse\" style=\"z-index: 10\">- $sale_percent%</span>
                ";
        }
        else {
            $data .= "
                    <span class=\"cost\">
                         $cost<sup>đ</sup>
                    </span>
                ";
        }
        $data .= "</div>
                <div class=\"show-foody-describe\"><div class='truncate-twolines'>$describe</div></div>
                <span class=\"show-foody-rating\">
                    <span class='rating-vote'>";
        if ($foody->getVoted() != null) {
            $voted = $foody->getVoted()->average;
            $data .= "<span class=\"rating-icon\">";
            for($i=1; $i<=5; $i++) {
                if ($i <= $voted) {
                    $data .= "<i class='fas fa-star'></i>";
                }
                elseif(number_format($voted) == $i) {
                    $data .= "<i class='fas fa-star-half-alt'></i>";
                }
                else {
                    $data .= "<i class='far fa-star'></i>";
                }
            }
            $data .= "</span>
                        <span class=\"rating-number\">
                            <b>$voted</b> / 5
                        </span>
                        </span>
                        <span class=\"rating-spacing\">|</span>";
        }
        $data .= "
                    <span>
                        <i class=\"like icon\" style=\"font-size: 12px\"></i> $liked
                    </span>
                    <span class=\"rating-spacing\">|</span>
                    <span>
                        <i class=\"comment icon\" style=\"font-size: 12px\"></i> 13
                    </span>
                    <span class=\"show-foody-favorite\">
                        <a class=\"foody-favorite tooltipped\" data-id='$id'
                                   data-tooltip=\"Lưu món ăn\" data-position=\"left\">
                                     <i class=\"$favorite icon\"></i>
                                </a>
                    </span>
                </span>
                <div style='margin-top: 5px'>
                    Đã được đặt: <b>$buy_count</b> lượt
                </div>
                <div class=\"show-foody-action\">
                    <a class=\"waves-effect waves-light btn cart-update\" data-id='$id'>
                        <i class=\"cart plus icon\"></i>
                        Thêm vào giỏ
                    </a>
                </div>
            </div>
            </div>
            ";

        return $data;
    }
}
