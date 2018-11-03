<style>

    @media only screen and (max-width: 600px) {
        .news-title {
            width: 100% !important;
            float: unset !important;
            font-size: 16px !important;
            line-height: 20px !important;
        }
        .news-image {
            width: 175px !important;
            height: 105px !important;
        }
        .news-content, .news-footer {
            width: calc(100% - 185px) !important;
        }
        .news-footer img {
            display: none;
        }
    }
    @media only screen and (max-width: 450px) {
        .news-row {
            padding: 10px !important;
        }
        .news-image {
            width: 120px !important;
            height: 75px !important;
        }
        .news-content, .news-footer {
            width: calc(100% - 135px) !important;
            line-height: 18px !important;
        }
        .news-footer {
            margin-top: 3px !important;
        }
    }

    .news-container {
        margin: 20px 0;
        border-radius: 5px;
    }
    .news-header {
        font-size: 35px;
        font-weight: 600;
        padding: 15px 15px 40px 15px;
    }
    .slider-ads-landscape {
        width: 100%;
    }
    .slider-ads-landscape img {
        width: 100%;
    }
    .news-row {
        padding: 15px;
    }
    .news-title {
        width: calc(100% - 270px);
        float: right;
        font-size: 18px;
        font-weight: bolder;
        line-height: 22px;
        margin-bottom: 7px;
    }
    .news-image {
        float: left;
        width: 250px;
        height: 150px;
    }
    .news-content {
        width: calc(100% - 270px);
        float: right;
        line-height: 20px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .news-footer {
        width: calc(100% - 270px);
        float: right;
        margin-top: 7px;
    }
    .news-footer img {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 7px;
    }
    .news-footer > span {
        vertical-align: middle;
    }
    .news-footer-name {
        font-weight: 500;
        font-size: 14px;
    }
    .news-footer-time {
        font-size: 12px;
        color: #666;
    }
    .news-footer-time:before {
        content: ' – ';
    }



</style>