

<style>

    .home-nav {
        padding: 5px 5px 0 10px !important;
    }

    .home-nav .btn {
        text-transform: unset;
        color: #666 !important;
        text-align: left;
    }
    #home-nav-container .row {
        margin: 0 0 20px 0;
    }
    .divider {
        /*margin-bottom: 5px;*/
    }

    .foody-type.active, .foody-sort.active {
        color: white !important;
        background-color: #26a69a !important;
    }

    .foody-sort.btn, .foody-type.btn {
        font-weight: unset;
    }


    /*.foody-navbar-overflow {*/
        /*overflow: hidden;*/
        /*width: 250px !important;*/
        /*max-height: calc(100vh - 74px);*/
    /*}*/
    #home-nav-container {
        padding-right: 10px !important;
        padding-top: 10px !important;
        width: 250px !important;
        height: auto;
        bottom: 0;
    }
    #home-nav-container::-webkit-scrollbar {
        width: 0;
    }
    #home-nav-container:hover {
        overflow: auto;
    }
    #home-nav-container .divider {
        margin-bottom: 5px !important;
    }
    .show-foody {
        width: calc(100% - 250px) !important;
        margin-top: 20px;
        min-height: calc(100vh - 56px) !important;
    }
    #home-nav-container.pin-top {
        top: unset !important;
    }
    #home-nav-container.pinned {
        top: 64px !important;
        overflow-y: auto;
        /*max-height: calc(100vh - 64px);*/
    }
    /*#home-nav-container.pinned:hover {*/
        /*overflow: auto;*/
    /*}*/

    @media only screen and (min-width: 601px) {
        .show-foody.special {
            margin-left: 250px !important;
        }
        .show-foody {
            min-height: calc(100vh - 64px) !important;
        }

    }

    @media only screen and (max-width: 600px) {
        .show-foody {
            margin-left: 0 !important;
            width: 100% !important;
        }
        .show-foody-row {
            padding: 0 10px;
        }
        .show-foody-image img {
            padding: 20px 0 0 0 !important;
            width: 100%;
        }
        .show-foody-action .btn {
            width: 100%;
        }
        .show-foody-title {
            padding-top: 5px !important;
        }
    }

    .show-foody-image img {
        padding: 20px 10% 10% 10%;
    }
    .show-foody-row {
        margin-bottom: 5px !important;
    }
    /*.show-foody-action .button {*/
        /*margin-top: 50% !important;*/
        /*margin-right: 10px !important;*/
        /*float: right;*/
    /*}*/
    /*.show-foody-action i {*/
        /*margin-right: -1px !important;*/
    /*}*/
    .show-foody-title {
        padding-top: 20px;
    }
    .show-foody-title {
        font-size: 1.2rem;
        font-weight: 600;
    }
    .show-foody-describe {
        font-size: 13.5px;
        margin-top: 5px;
        margin-bottom: 5px;
        line-height: 15px;
    }
    .rating-icon i {
        font-size: 16px;
        color: #fc0;
    }
    .rating-number {
        margin-left: 3px;
    }
    .rating-spacing {
        color: #666;
        margin: 0 5px;
        font-weight: 300;
    }
    .show-foody-rating .icon {
        margin-right: 0;
    }
    .show-foody-action {
        margin-top: 10px;
        margin-bottom: 15px;
    }
    .show-foody-action .btn {
        text-transform: unset;
    }
    .show-foody-favorite {
        margin-left: 10px;
    }
    .show-foody-favorite i {
        cursor: pointer;
    }



    /*nav-mobile*/
    #m-home-nav-container {
        width: 100% !important;
        height: auto !important;
        max-height: calc(100vh - 56px);
    }
    #m-home-nav-container a, #m-home-nav-container li, #m-home-nav-container span {
        color: #666;
    }
    .m-home-nav-title {
        font-size: 20px !important;
        font-weight: bolder;
    }
    #m-home-nav-container::-webkit-scrollbar {
        width: 0;
    }
    .m-home-nav-title:hover {
        background-color: unset;
    }


    .slider-ads-landscape img {
        width: 100%;
        max-height: 120px;
        margin-bottom: 10px;
    }
</style>