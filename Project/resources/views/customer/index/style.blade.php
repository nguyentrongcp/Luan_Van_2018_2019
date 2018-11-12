<style>
    
    @media only screen and (max-width: 992px) {
        .type-container {
            position: relative !important;
            padding: 5% !important;
        }

    }

    @media only screen and (min-width: 993px) {
        .type-container {
            position: fixed;
            padding: 5% 0 0 5% !important;
            height: 100vh;
        }

    }

    .page-title {
        margin-bottom: 20px;
    }
    .page-describe {
        font-size: 22px;
        font-weight: bolder;
        transform: translateY(-20px);
    }
    .page-logo {
        width: 120px;
        height: 120px;
        margin-left: auto;
        margin-right: auto;
    }
    .page-logo img {
        width: 120px;
    }
    
    
    #background-index {
        background-image: url({{ asset('/customer/image/background-index.jpg') }});
        background-size: cover;
        height: 100vh;
        width: 100%;
        position: fixed;
    }
    #footer-container {
        margin-top: 0 !important;
    }
    .type-container .ui.label {
        margin: 10px 6px 0 0;
    }
    .type-container .til {
        font-size: 18px;
        font-weight: 500;
    }
    .type-container input {
        padding-left: 35px !important;
        width: calc(100% - 35px) !important;
        color: white;
    }
    .input-field input[type=text]:focus + label {
        color: white !important;
    }
    .input-field input[type=text]:focus {
        border-bottom: 1px solid white !important;
        box-shadow: 0 1px 0 0 white !important;
    }

    #search-result {
        max-height: 320px;
        z-index: 1002;
    }

    .index-container {
        position: relative;
        background-color: rgba(0,0,0,0.5);
    }
    .index-info-container {
        padding: 5% 5% 0 5% !important;
    }
    .index-row {
        background: white;
        margin-bottom: 20px;
        border-radius: 5px;
    }
    .index-row > .til {
        padding: 15px;
    }
    .index-row > .til span {
        font-weight: 500;
        font-size: 18px;
        line-height: 24px;
    }
    .index-row .til a {
        font-size: 14px;
        float: right;
        line-height: 24px;
    }
    .news-row {
        height: 90px;
    }
    .news-image {
        width: 90px;
        height: 90px;
        display: inline-block;
    }
    .news-image img {
        width: 90px;
        height: 90px;
        padding: 5px;
    }
    .news-content {
        width: calc(100% - 90px);
        display: inline-block;
        vertical-align: top;
        padding: 5px 10px 0 5px;
    }
    .news-content > .til {
        font-weight: 500;
        color: rgba(0,0,0,0.87);
    }
    .news-content > .cont {
        font-size: 13px;
        line-height: 16px;
        margin: 5px 0;
    }
    .news-content > .time {
        color: #666;
        font-size: 13px;
        float: right;
    }


    .index-foody-container {
        display: grid;
    }
    .index-foody {
        padding: 10px;
    }
    .foody-row {
        padding: 5px !important;
    }
    .foody-row a {
        color: rgba(0,0,0,0.87);
    }
    .foody-image img {
        width: 100%;
    }
    .foody-content {
        padding: 0 5px 5px 5px;
    }
    .foody-content > .foody-name {
        font-weight: bolder;
    }
    .foody-content > .foody-type {
        font-size: 13px;
    }
    .foody-cost {
        line-height: 30px;
        font-weight: 500;
        color: red;
    }
    .foody-cost > span {
        color: #666;
        font-size: 12px;
    }
    .foody-cost > .old > span {
        text-decoration: line-through;
    }


    .index-guide {
        display: grid;
    }
    .index-guide-content {
        padding: 20px 10px 15px 10px !important;
    }
    .guide-icon i {
        font-size: 40px;
        color: #009688;
    }
    .guide-step {
        position: absolute;
        margin-left: 5px !important;
    }
    .guide-col {
        padding: 0 5px !important;
    }
    .guide-text {
        padding-top: 5px !important;
        line-height: 18px;
    }

    .index-info {
        padding: 15px !important;
        font-size: 16px;
    }
    .info-text {
        line-height: 22px;
        width: calc(100% - 39px);
        float: right;
    }
</style>