<div href="#" class="row white" id="search-result">
    {{--<div class="row white search-result-row">--}}
        {{--<img src="/customer/image/Italian&Pizza/honey-chicken-thigh-rice.png">--}}
        {{--<span class="search-result-content">--}}
            {{--<div class="col s11 search-result-title">Ten mon an</div>--}}
            {{--<div class="col s11 search-result-cost">249,000<sup>đ</sup></div>--}}
            {{--<div class="col s11 search-result-rate">--}}
                {{--<i class="material-icons">star</i>--}}
                {{--<i class="material-icons">star</i>--}}
                {{--<i class="material-icons">star</i>--}}
                {{--<i class="material-icons">star_half</i>--}}
                {{--<i class="material-icons">star_half</i>--}}
            {{--</div>--}}
        {{--</span>--}}
    {{--</div>--}}
    {{--<div class="divider"></div>--}}
</div>

<style>
    #search-result {
        position: absolute;
        z-index: 1000;
        display: none;
        /*top: 236px;*/
        /*overflow: auto;*/
        margin-bottom: 0 !important;
    }
    @media only screen and (min-width: 601px) {
        #search-result {
            /*max-height: calc(100vh - 64px);*/
        }
        #search-result.pinned {
            top: 64px !important;
        }
        #search-result.pin-top {
            top: 300px !important;
        }
    }
    @media only screen and (max-width: 600px) {
        #search-result {
            /*max-height: calc(100vh - 56px);*/
        }
        #search-result.pinned {
            top: 56px !important;
        }
        #search-result.pin-top {
            top: 300px !important;
        }
    }
    .search-result-row:hover {
        background-color: #DFDDDD !important;
    }
    .search-result-row {
        height: 64px;
        margin-bottom: 0 !important;
    }
    .search-result {
        display: block !important;
    }
    .search-result-image {
        /*height: 64px;*/
    }
    .search-result-row img {
        height: 64px;
        padding: 5px;
        width: 87px;
    }
    .search-result-content {
        height: 64px;
        display: inline-block;
        width: calc(100% - 97px);
    }
    .search-result-title {
        font-weight: bolder;
        color: black !important;
    }
    .search-result-cost {
        color: red;
        font-size: 12px;
        margin: -2px 0 3px 0;
    }
    .search-result-rate i {
        font-size: 15px;
        color: #fc0;
    }
</style>