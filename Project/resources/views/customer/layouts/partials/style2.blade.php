<style>
    .navbar-container {
        height: 300px;
        position: relative;
        background: url('{{ asset('/customer/image/background.png') }}') no-repeat center center;
        -webkit-background-size: cover;
    }
    .brand-logo img {
        height: 64px;
    }
    .brand-logo {
        height: 64px;
    }
    .btn-nav {
        background-color: rgba(0,0,0,0.6);
        text-transform: unset;
    }

    .navbar.nav-2 nav {
        position: absolute;
        bottom: 0;
    }
    li.nav-2 {
        width: 25%;
    }

    /*Cart*/
    #dro-cart {
        color: #666;
        overflow: hidden;
    }
    #dro-cart li:hover {
        background-color: unset;
        cursor: unset;
    }
    #dro-cart .cart-title {
        font-size: 20px;
        font-weight: 600;
        padding: 15px 15px 0 0;
    }
    .cart-total-cost {
        min-height: 1px !important;
        margin: 10px 0;
    }
    .cart-total-cost .til {
        font-weight: 600;
        padding-left: 15px;
    }
    #dro-cart-total-cost {
        color: red;
        font-weight: 500;
        padding-right: 15px;
    }
    .cart-footer .btn {
        width: 90%;
        margin: 15px 0 15px 5%;
        line-height: 36px;
        padding: unset;
        color: white;
        font-size: 14px;
    }
</style>