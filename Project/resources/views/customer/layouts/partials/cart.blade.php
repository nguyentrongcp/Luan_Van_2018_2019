<ul id='cart' class='dropdown-content cart-content'>
    <li class="cart-title">
        <div class="col s12 right-align">
            Giỏ hàng
        </div>
    </li>
    <li class="divider"></li>
    <li class="col s12 cart-body">
        @php $cost = 0 @endphp
        @foreach($carts as $cart)
            @php
                $foody = \App\Foody::find($cart->id);
                $cost += $foody->currentCost() * $cart->qty;
            @endphp
            <div class="cart-row row" id="{{ $cart->id }}">
                <div class="col cart-count" id="cart-count-{{ $cart->id }}"
                     style="width: 30px; margin-left: 15px">
                    {{ $cart->qty }}
                </div>
                <div class="col" style="margin-right: 10px">x</div>
                <div class="col cart-name">
                    {{ $cart->name }}
                </div>
                <div class="col cart-action">
                    <a class="ui button" onclick="updateCart(this,{{ $cart->id }})">
                        <i class="plus icon"></i>
                    </a>

                    <a class="ui button" onclick="updateCart(this,{{ $cart->id }})"
                       id="cart-minus-{{ $cart->id }}"><i class="minus icon"></i>
                    </a>
                </div>
                <div class="col right-align" style="width: 70px" id="cart-cost-{{ $cart->id }}">
                    {{ number_format($foody->currentCost() * $cart->qty) }}<sup>đ</sup>
                </div>
                <div class="col cart-remove">
                    <i class="trash alternate icon"></i>
                </div>
            </div>
        @endforeach
    </li>

    <li class="divider"></li>

    <li class="cart-cost">
        <div class="col cart-cost-title left">
            Tổng cộng
        </div>
        <div class="col cart-cost-number right" id="cart-total-cost">
            {{ number_format($cost)  }}<sup>đ</sup>
        </div>
    </li>

    <li class="divider"></li>

    <li class="cart-footer">
        <button class="ui blue button waves-effect waves-light">
            Thanh toán
        </button>
    </li>
</ul>