<style>
    @media only screen and (min-width: 993px) {
        .foody-info {
            padding-left: 50px !important;
        }
        .content-col {
            padding-right: 10px !important;
        }
    }
    @media only screen and (min-width: 601px) {
        .involve-foody-name {
            padding: 10px 0 0 10px !important;
        }
        .foody-content-container {
            width: calc(100% - 180px) !important;
        }
    }
    /*@media only screen and (max-width: 600px) {*/
        /*.involve {*/
            /*padding: 0 !important;*/
        /*}*/
    /*}*/
    @media only screen and (max-width: 610px) {
        .input-full-screen {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            padding: 20px !important;
            background-color: white !important;
            z-index: 2 !important;
            height: 100vh !important;
            width: 100vw !important;
            margin: 0 !important;
        }
        #out-full-screen {
            z-index: 2;
            position: fixed;
            right: 0;
            top: 0;
            cursor: pointer;
            opacity: 0.5;
            font-size: 30px;
        }

        #foody-comment-modal {
            top: 0 !important;
            width: 100vw !important;
        }
        #comment-modal-image {
            height: auto !important;
        }
        #foody-comment-modal .modal-content {
            height: calc(100% - 45px - ((100vw - 48px - 20px) / 6 + 8px)) !important;
        }
        .comment-modal-add-image i {
            font-size: calc((100vw - 48px - 20px) / 18) !important;
            margin-left: calc((100vw - 48px - 20px) / 18) !important;
            top: calc((100vw - 48px - 20px) / 18 + 4px) !important;
        }
        #comment-modal-title, #comment-modal-content {
            font-size: 14px !important;
        }
        .comment-modal-image {
            height: calc((100vw - 48px - 20px) / 6 + 8px) !important;
        }
        .comment-modal-image i {
            margin-left: calc((100vw - 48px - 20px) / 6 - 15px) !important;
        }
        .comment-modal-image img {
            width: calc((100vw - 48px - 20px) / 6) !important;
            height: calc((100vw - 48px - 20px) / 6 + 8px) !important;
        }
        .comment-modal-add-image {
            width: calc((100vw - 48px - 20px) / 6) !important;
            height: calc((100vw - 48px - 20px) / 6 + 8px) !important;
        }
        .comment-modal-next i, .comment-modal-before i {
            margin-top: calc(((100vw - 48px - 20px) / 6 + 8px) / 2 - 12px) !important;
        }
    }

    #foody-info {
        margin-top: 15px;
        margin-bottom: 20px;
    }
    .col .row {
        margin: 0;
    }
    .navigation {
        font-size: 12px;
    }
    .navigation i {
        margin: 0;
    }
    .foody-name {
        margin: 10px 0 5px 0;
        font-weight: 500 !important;
    }
    .foody-describe {
        font-size: 13px;
        margin-top: 4px;
    }
    .foody-describe > .cont {
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .foody-rating {
        margin-top: 10px;
    }
    .foody-rating i {
        color: #fc0 !important;
        font-size: 18px;
        margin: 0;
    }
    .foody-rating .space {
        margin: 0 10px;
    }
    .foody-rating span {
        vertical-align: top;
    }
    .foody-rating .rate-number-avg {
        margin-left: 15px;
        font-weight: bolder;
    }
    .foody-rating .rate-number {
        font-weight: 600;
    }
    .foody-rating .rate-title {
        text-align: left;
        font-weight: 500;
        width: 80px;
        display: inline-block;
    }
    i.right {
        float: unset !important;
    }
    .foody-image {
        width: 100%;
        /*max-height: 200px;*/
    }
    .foody-images {
        display: block;
        float: left;
        cursor: pointer;
    }
    .foody-images i {
        color: #535353;
        margin-top: calc((100% - 40px) / 2);
        left: calc((100% - 40px) / 2);
        position: relative;
        font-size: 40px;
    }
    .foody-like {
        margin-top: 10px;
    }
    .foody-like .ui.label {
        height: 28px !important;
    }
    .foody-like i.like.active {
        color: #ff2733 !important;
    }
    .foody-like i.star.active {
        color: #fc0 !important;
    }
    .foody-like .count {
        font-weight: 300;
        margin-left: 2px;
    }
    .foody-like iframe {
        padding: 0;
        top: 200px !important;
        /*margin: ;*/

    }
    .foody-like .heart {
        color: red;
    }
    .foody-like .bookmark {
        color: #039be5;
    }
    .foody-cart {
        margin-top: 12px;
    }
    .foody-cart .cart-number {
        height: 36px !important;
        line-height: 36px !important;
        margin-left: 15px !important;
    }
    .foody-action {
        margin-top: 10px;
    }
    .foody-action nav {
        height: 50px;
    }
    .foody-action li {
        height: 50px;
        line-height: 50px;
        text-align: center;
    }
    .foody-action li i {
        height: 50px;
        line-height: 50px;
    }
    .content-header {
        font-size: 20px;
        font-weight: 500;
    }
    .content {
        padding: 10px 10px 0 10px !important;
    }
    .involve-foody-name {
        padding-left: 10px !important;
    }
    .involve-foody-name a {
        font-size: 18px;
        color: black ;
    }
    .involve-foody-name .describe {
        font-size: 13.5px;
    }
    .involve-foody-action a i {
        margin: 0 !important;
    }
    .involve-foody-action {
        padding-top: 10px !important;
    }
    .involve-footer {
        margin-top: 10px;
    }
    .content-col {
        margin-bottom: 20px;
    }
    .content-col > .row {
        margin-bottom: 20px;
    }

    #foody-comment-modal {
        width: 608px;
        max-height: unset;
        height: 90%;
        overflow: hidden;
    }
    #foody-comment-modal .modal-content {
        height: calc(100% - 156px);
    }
    #comment-modal-image {
        height: 98px;
        bottom: 56px;
        position: absolute;
        padding-right: 24px;
        display: inline-flex;
    }
    .comment-modal-image {
        height: 98px;
        display: inline-block;
        /*position: relative;*/
        margin-left: 4px;
    }
    .comment-modal-image img {
        cursor: pointer;
    }
    .comment-modal-add-image {
        height: 98px;
        display: inline-block;
        width: 90px;
        padding: 4px 0;
    }
    .comment-modal-add-image div {
        height: 100%;
        cursor: pointer;
    }
    .comment-modal-add-image div:hover {
        background-color: #cfd8dc !important;
    }
    .comment-modal-add-image i {
        position: absolute;
        top: 30px;
        margin-left: 30px;
        font-weight: 900;
        font-size: 30px;
        /*cursor: default;*/
        color: #535353;
    }
    .comment-modal-image img {
        height: 98px;
        width: 90px;
        padding: 4px 0;
    }
    #dimmer-image {
        height: 98px;
        width: 90px;
        padding: 4px 0;
    }
    .comment-modal-image i {
        position: absolute;
        top: 4px;
        margin-left: 75px;
        font-size: 15px;
        color: white;
        font-weight: 900;
        cursor: pointer;
    }
    .comment-modal-image i:hover {
        background-color: #FE6D6D;
    }
    .comment-modal-content {
        margin-bottom: 0;
        height: calc(100% - 137px);
    }
    .comment-modal-content textarea {
        margin-bottom: 0;
        height: 100% !important;
        overflow: auto;
        margin-top: .3rem;
        padding-top: .5rem;
    }
    .comment-modal-next i {
        /*line-height: 98px;*/
        cursor: pointer;
        margin-top: 37px;
    }
    .comment-modal-next i:hover {
        color: blue;
    }


    .comment-title {
        margin-top: 15px !important;
    }
    .comment-avatar {
        width: 40px;
    }
    .comment-avatar img {
        width: 40px;
        height: 40px;
    }
    .comment-name {
        display: inline-block;
        margin-left: 5px;
    }
    .comment-customer-name {
        font-weight: bolder;
    }
    .comment-time {
        font-size: 12px;
        font-weight: 300;
    }
    .comment-rate {
        float: right;
    }
    .comment-rate .ui.label {
        width: 35px;
        height: 35px;
        padding: 11px 8.6px;
        border-radius: 50% !important;
    }
    .comment-content {
        margin: 10px 0 20px 0 !important;
    }
    .comment-content-title {
        margin-bottom: 15px;
        font-size: 15px;
        font-weight: 600;
    }
    .comment .content {
        margin-bottom: 5px;
    }
    .comment-content-content {
        font-size: 14px;
        line-height: 1.5em;
    }
    .comment-image {
        margin-bottom: 10px !important;
    }
    .comment-image img {
        display: block;
        float: left;
        cursor: pointer;
    }
    .comment-footer-container {
        background-color: #F9F8F8;
        position: relative;
        left: -10px;
        padding: 0 10px;
        width: calc(100% + 20px);
    }
    .comment-comment-container {
        margin-top: 8px;
    }
    .comment-comment-container .comment-avatar {
        width: 35px;
        float: left;
    }
    .comment-comment-container .comment-avatar img {
        width: 35px;
        height: 35px;
    }
    .comment-comment-content-container, .comment-comment-time-container {
        width: calc(100% - 45px) !important;
        float: right !important;
        font-size: 12px;
    }
    .comment-comment-name {
        margin-right: 5px;
    }
    .comment-comment-time-container {
        font-size: 11px;
        font-weight: 300;
    }
    .comment-comment-content-container textarea {
        margin-bottom: 0;
        font-size: 12px;
        min-height: 1px;
        height: 35px;
    }
    .slider-ads-landscape img {
        width: 100%;
        max-height: 120px;
        margin-bottom: 10px;
    }


</style>