<style>

    .news-show-container {
        margin: 20px 0;
        border-radius: 0 0 5px 5px;
    }

    .news-show-title {
        position: relative;
    }
    .news-show-title .til {
        background-color: rgba(0,0,0,0.3);
        color: white;
        width: 100%;
        font-size: 25px;
        font-weight: bolder;
        position: absolute;
        padding: 10px 15px;
        line-height: 28px;
    }
    .news-show-title img {
        width: 100%;
        margin-bottom: -5px;
    }
    .news-show-title .share {
        height: 28px;
        position: absolute;
        bottom: 10px;
        right: 0;
    }
    .news-show-author {
        padding: 15px;
    }
    .author-img {
        width: 50px;
        height: 50px;
        vertical-align: middle;
        border-radius: 50%;
        margin-right: 10px;
    }
    .author-name {
        font-weight: bolder;
        font-size: 17px;
        vertical-align: middle;
    }
    .news-show-author .time {
        color: #666;
        float: right;
        line-height: 50px;
    }
    .news-time {
        color: #666;
        padding: 0 15px 15px 15px;
    }
    .news-show-content{
        padding: 15px;
    }
    .news-show-content > .cont img {
        width: 100%;
    }

    @media only screen and (max-width: 992px) {
        .news-show-content .cont {
            font-size: 14.5px;
        }
    }
    @media only screen and (max-width: 600px) {
        .news-show-content .cont {
            font-size: 14.5px;
        }
        .news-show-title .til {
            position: relative;
            color: rgba(0,0,0,0.87);
            background: unset;
        }
        .news-show-title .til {
            padding: 10px 10px 10px 10px;
        }
        .news-show-content{
            padding: 10px;
        }
    }

</style>