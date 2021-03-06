<style>
    @media only screen and (max-width: 600px) {
        #navbar-search {
            /*width: 0;*/
        }
        #search {
            height: 56px !important;
        }
        .m-nav-col {
            width: calc(25%) !important;
        }
        #cart-qty {
            margin: 0 !important;
            position: absolute;
            top: 2px;
            left: 92%;
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
    .nav-btn {
        text-transform: unset;
        /*background: linear-gradient(rgba(33,33,33,0.6),rgba(66,66,66,0.6),rgba(97,97,97,0.6),rgba(66,66,66,0.6),rgba(33,33,33,0.6));*/
        background-color: rgba(0,0,0,0.6) !important;
    }
    .navbar .nav-wrapper .brand-logo img {
        height: 64px;
    }
    .dropdown-title:hover {
        background-color: unset;
    }
    #dropdown-category-content {
        min-width: 287px !important;
    }

    /*.navbar-mobile {*/
        /*padding: 0 32px !important;*/
        /*font-weight: 500;*/
    /*}*/
    /*.collapsible-body .waves-effect {*/
        /*padding: 0 47px !important;*/
    /*}*/
    /*#nav-mobile li.search .search-wrapper {*/
        /*color: #777;*/
        /*margin-top: -1px;*/
        /*border-top: 1px solid rgba(0,0,0,0.14);*/
        /*-webkit-transition: margin .25s ease;*/
        /*transition: margin .25s ease;*/
    /*}*/
    /*#nav-mobile .search .search-wrapper input {*/
        /*border-bottom: 1px solid rgba(0,0,0,0.14);*/
    /*}*/
    /*#search-mobile {*/
        /*padding: 0 32px;*/
    /*}*/


    /*Navbar second*/

    #navbar.pin-top {
        position: absolute;
        top: unset !important;
    }
    #navbar.pinned {
        background: rgba(68,68,68,0.8) !important;
        z-index: 1000;
    }
    #navbar.pin {
        background: rgba(68,68,68,0.8) !important;
        top: 0;
        bottom: auto;

    }
    .nav-col {
        width: calc((100% - 90px) / 3);
    }

    /*#nav-mobile {*/
        /*z-index: 1000;*/
    /*}*/
    #cart-qty {
        min-width: 0;
        margin: 2px 0 0 -10px;
        vertical-align: top;
    }
    #navbar {
        position: absolute;
        bottom: 0;
    }
    #navbar-ul {
        position: relative;
        display: flex;
    }
    #search {
        height: 64px;
    }
    #navbar-search {
        transition: width 0.75s;
    }



    /*Cart content*/


</style>