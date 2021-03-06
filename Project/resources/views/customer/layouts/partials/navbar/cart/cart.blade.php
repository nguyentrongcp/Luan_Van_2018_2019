<ul id='dro-cart' class='dropdown-content'>
    <li class="cart-title">
        <div class="col s12 right-align">
            Giỏ hàng
        </div>
    </li>
    <li class="divider"></li>
    <li class="col s12" id="cart-body">
        @if($carts->count() == 0)
            <div class="row center-align">
                Giỏ hàng trống
            </div>
        @endif
        @foreach($carts as $cart)
            @php
                $foody = \App\Foody::find($cart->id);
                    if ($foody->getQuantity() > 0 && !$foody->checkQuantity($cart->qty)) {
                        $cart_old = $cart;
                        Cart::remove($cart->rowId);
                        Cart::add($cart_old->id,$foody->name,$foody->getQuantity(),0);
                    }
                    if ($foody->getQuantity() == 0 || $foody->is_deleted) {
                        Cart::remove($cart->rowId);
                    }
            @endphp
        @endforeach
        @php $cost = 0 @endphp
        @foreach($carts as $cart)
            @php
                $foody = \App\Foody::find($cart->id);
                $cost += $foody->getSaleCost() * $cart->qty;
            @endphp
            <div class="cart-row row" id="{{ $cart->id }}">
                <div class="col" id="cart-qty-{{ $cart->id }}"
                     style="width: 30px; margin-left: 15px">
                    {{ $cart->qty }}
                </div>
                <div class="col" style="width: 20px">x</div>
                <div class="col cart-name">
                    {{ $cart->name }}
                </div>
                <div class="col cart-action">
                    <a class="ui button cart-update" data-id="{{ $cart->id }}">
                        <i class="plus icon"></i>
                    </a>

                    <a class="ui button cart-update" data-id="{{ $cart->id }}"
                       data-qty="minus-{{ $cart->id }}"><i class="minus icon"></i>
                    </a>
                </div>
                <div class="col right-align" style="width: 70px" id="cart-cost-{{ $cart->id }}">
                    {{ number_format($foody->getSaleCost() * $cart->qty) }}<sup>đ</sup>
                </div>
                <div class="col cart-remove">
                    <i onclick="removeCart({{ $cart->id }})" class="trash alternate icon"></i>
                </div>
            </div>
        @endforeach
    </li>

    <li class="divider"></li>

    <li class="cart-cost">
        <div class="col til left">
            Tổng cộng
        </div>
        <div class="col cost right" id="cart-total-cost">
            {{ number_format($cost)  }}<sup>đ</sup>
        </div>
    </li>

    <li class="divider"></li>

    <li class="cart-footer">
        <a href="{{ route('payment.index') }}" id="cart-payment" class="
            {{ $carts->count() == 0 ? 'disabled' : '' }} btn waves-effect waves-light">
            Đặt hàng
        </a>
    </li>
</ul>

@include('customer.layouts.partials.navbar.cart.style')