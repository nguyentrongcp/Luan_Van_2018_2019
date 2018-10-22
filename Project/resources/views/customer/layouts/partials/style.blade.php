<style>
    @media only screen and (max-width: 600px) {
        #navbar-search {
            /*width: 0;*/
        }
        #search {
            height: 56px !important;
        }
    }

    @media only screen and (min-width: 601px) {
        #navbar-search.navbar-search {
            width: calc((100% - 90px) / 3) !important;
        }
    }

    .navbar-container {
        height: 300px;
        position: relative !important;
        background: url("{{ asset('/customer/image/background.png') }}") no-repeat center center;
        -webkit-background-size: cover;
    }
    .navbar-first-button {
        text-transform: unset;
        background-color: rgba(0,0,0,0.6);
    }
    .navbar .nav-wrapper .brand-logo img {
        height: 64px;
    }

    .navbar-mobile {
        padding: 0 32px !important;
        font-weight: 500;
    }
    .collapsible-body .waves-effect {
        padding: 0 47px !important;
    }
    #nav-mobile li.search .search-wrapper {
        color: #777;
        margin-top: -1px;
        border-top: 1px solid rgba(0,0,0,0.14);
        -webkit-transition: margin .25s ease;
        transition: margin .25s ease;
    }
    #nav-mobile .search .search-wrapper input {
        border-bottom: 1px solid rgba(0,0,0,0.14);
    }
    #search-mobile {
        padding: 0 32px;
    }


    /*Navbar second*/

    #navbar.pin-top {
        position: absolute;
        top: unset !important;
    }
    #navbar.pinned {
        background: rgba(68,68,68,0.8) !important;
        z-index: 1000;
    }
    .navbar-col {
        width: calc((100% - 90px) / 3);
    }
    #nav-mobile {
        z-index: 1000;
    }
    #cart-count {
        min-width: 0;
        margin: 2px 0 0 -10px;
        vertical-align: top;
    }
    #navbar {
        position: absolute;
        bottom: 0;
    }
    #search {
        height: 64px;
    }



    /*Cart content*/

    .dropdown-content li>a>i {
        margin: 0 15px 0 0;
    }
    .dropdown-content.cart-content {
        color: #666;
        overflow: hidden;
        max-height: calc(100vh - 64px);
        height: auto !important;
    }

    .dropdown-content.cart-content:hover {
        overflow: overlay;
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

    .cart-content .cart-body {
        padding: 15px 0 !important;
        min-height: 1px;

    }

    .cart-body .cart-row {
        line-height: 20px !important;
        padding: 5px 0;
    }

    .cart-content .divider {
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
    .cart-cost .cart-cost-title {
        font-weight: 600;
        padding-left: 15px;
    }
    .cart-cost .cart-cost-number {
        /*width: 100px;*/
        color: red;
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
    
    @media only screen and (max-width: 475px) {
        .col.cart-name {
            width: calc(100% - 80px);
        }
        .col.cart-action {
            width: 42px;
            margin-left: calc(100% - 189px);
        }
        #cart {
            overflow-x: hidden;
        }

    }
</style>