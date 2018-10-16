<style>
    @media only screen and (min-width: 993px) {
        .foody-info {
            padding-left: 50px !important;
        }
        .content-col {
            padding: 0 10px !important;
        }
    }
    @media only screen and (min-width: 601px) {
        .involve-foody-name {
            padding: 10px 0 0 10px !important;
        }
    }
    /*@media only screen and (max-width: 600px) {*/
        /*.involve {*/
            /*padding: 0 !important;*/
        /*}*/
    /*}*/
    @media only screen and (max-width: 992px) {

    }

    #foody-info {
        margin-top: 15px;
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
        margin: 10px 0;
        font-weight: 500 !important;
    }
    .foody-cost span {
        margin-left: 5px;
    }
    .foody-cost .old-cost {
        margin-left: 0;
    }
    .foody-rating {
        margin-top: 10px;
    }
    .foody-rating i {
        color: #fc0 !important;
        font-size: 21px;
        margin: 0;
    }
    .foody-rating .space {
        margin: 0 10px;
    }
    .foody-rating span {
        vertical-align: top;
    }
    .foody-rating .rate-number {
        margin-left: 15px;
        font-weight: bolder;
    }
    .foody-rating .rate-title {
        text-align: left;
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
    .foody-like {
        margin-top: 10px;
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
        padding: 0 10px !important;
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
    .rating-header {
        height: 50px;
        text-align: center;
    }
    .rating-content {
        margin-top: 10px;
    }
    .rating-content .row span {
        width: 90px !important;
        position: relative;
        left: calc((100% - 90px) / 2) !important;
        margin-bottom: 10px;
    }
    .foody-rating-detail {
        margin-bottom: 5px !important;
        margin-top: 0 !important;
    }
    .rating-footer i {
        font-size: 12px;
        color: #fc0 !important;
        vertical-align: middle;
    }
    .rating-footer .rate-avg {
        font-size: 20px;
        font-weight: bolder;
    }
    .rating-footer {
        margin: 15px 0;
    }



    #foody-comment-modal {
        width: 608px !important;
        max-height: 80%;
        height: 80%;
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
    .comment-image img {
        display: block;
        float: left;
        cursor: pointer;
    }
</style>