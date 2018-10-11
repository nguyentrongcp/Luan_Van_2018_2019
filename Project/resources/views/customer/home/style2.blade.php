

<style>
    .foody-navbar {
        overflow: hidden;
        width: 250px !important;
        max-height: calc(100vh - 74px);
    }
    .foody-navbar:hover {
        overflow: auto;
    }
    .foody-navbar .divider {
        margin-bottom: 5px !important;
    }
    .show-foody.special {
        margin-left: 250px !important;
    }
    .show-foody {
        width: calc(100% - 250px) !important;
        margin-top: 20px;
    }
    #foody-navbar.pin-top {
        top: unset !important;
    }
    #foody-navbar.pinned {
        top: 64px !important;
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
        }
        .show-foody-action .btn {
            width: 100%;
        }
        .show-foody-title {
            padding-top: 5px !important;
        }
    }

    .show-foody {
        margin-top: 20px;
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
        font-size: 18px;
        color: #fc0;
        vertical-align: sub;
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
</style>