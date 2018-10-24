<style>
    .dropdown-content li>a>i {
        margin: 0 15px 0 0;
    }
    #dro-cart {
        color: #666;
        overflow: auto;
        height: auto !important;
        max-height: calc(100vh - 64px);
    }

    .responsive-img.circle {
        height: 40px;
        width: 40px;
        margin-top: 12px;
        margin-right: 10px;
    }

    .cart-title div {
        font-size: 20px;
        font-weight: 600;
        padding: 15px 15px 0 0;
    }

    #cart-body {
        padding: 15px 0 !important;
        min-height: 1px;
    }

    #cart-body .cart-row {
        line-height: 20px !important;
        padding: 5px 0;
    }

    #dro-cart .divider {
        width: 452px !important;
    }

    .cart-name {
        width: 200px;
        margin-right: 15px;
    }
    .cart-action {
        margin-right: 15px;
    }
    .cart-action a {
        padding: 0 2px 0 4px !important;
        height: 20px;
    }
    .cart-action a i {
        line-height: 20px;
        height: 20px;
        margin-right: 0 !important;
        font-size: 10px;
    }
    .cart-remove i {
        line-height: 20px !important;
        margin: 0 15px;
        cursor: pointer;
        height: 20px !important;
    }
    .cart-remove {
        height: 20px;
    }
    .cart-footer .btn {
        width: 90%;
        margin: 15px 0 15px 5% !important;
        line-height: 36px;
        padding: unset;
        color: white;
        font-size: 14px;
    }
    .cart-cost {
        /*line-height: 25px;*/
        min-height: 1px !important;
        margin: 10px 0;
        /*padding-right: 15px;*/
    }
    .cart-cost .til {
        font-weight: 600;
        padding-left: 15px;
    }
    .cart-cost .cost {
        /*width: 100px;*/
        font-weight: 500;
        padding-right: 47px;
    }
    /*#cart {*/
    /*left: 0 !important;*/
    /*width: 100% !important;*/
    /*}*/
    .dropdown-content li:hover {
        background-color: unset;
    }
    .dropdown-content li {
        cursor: unset;
    }

    @media only screen and (max-width: 600px) {
        #dro-cart {
            max-height: calc(100vh - 56px);
        }
        #dro-cart::-webkit-scrollbar {
            width: 0 !important;
        }
    }

    @media only screen and (max-width: 477px) {
        .col.cart-name {
            width: calc(100% - 80px);
        }
        .col.cart-action {
            width: 45px;
            margin-left: calc(100% - 189px);
        }
        #dro-cart {
            overflow-x: hidden;
        }

    }
</style>