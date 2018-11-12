<style>
    #foody-rating-modal {
        width: 406px;
        height: 330px;
    }
    #foody-rating-modal > .modal-content {
        overflow: hidden;
    }
    .rating-row {
        margin: 30px 0;
    }
    .rating-row > .til {
        font-size: 17px;
        width: 110px;
        display: inline-block;
        font-weight: 500;
    }
    .rating-row > .rate {
        font-size: 17px;
        display: inline-block;
        width: 140px;
        color: #fc0;
    }
    .rating-row > .rate > i {
        cursor: pointer;
    }
    .rating-row > .describe {
        font-size: 17px;
        font-weight: 500;
        width: 99px;
        display: inline-block;
    }

    #rating-block {
        width: 100%;
        height: 155px;
        display: block;
        position: absolute;
        left: 0;
        top: 70px;
        background-color: rgba(0,0,0,0.8);
        opacity: 0;
    }
    #rating-block:hover {
        opacity: 1;
    }
</style>