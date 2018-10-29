<div class="row white" id="search-result">

</div>

<style>
    #search-result {
        position: absolute;
        z-index: 1000;
        display: none;
        /*top: 236px;*/
        height: auto;
        margin-bottom: 0 !important;
    }
    @media only screen and (min-width: 601px) {
        #search-result {
            max-height: calc(100vh - 64px);
        }
        #search-result.pinned {
            top: 64px !important;
        }
        #search-result.pin-top {
            top: 300px !important;
        }
    }
    @media only screen and (min-width: 993px) {
        #search-result {
            width: calc((90vw - 90px) / 3);
        }

    }
    @media only screen and (max-width: 992px) {
        #search-result {
            width: calc((98vw - 90px) * 2 / 3);
        }

    }
    @media only screen and (max-width: 600px) {
        #search-result {
            max-height: calc(100vh - 56px);
            width: 98vw;
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
    .search-result-content span {
        color: black;
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
        font-size: 14px;
        color: #fc0;
    }
</style>