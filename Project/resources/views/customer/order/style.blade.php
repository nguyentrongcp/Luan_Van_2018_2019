<style>
    .payment-order {
        min-height: calc(100vh - 56px);
        padding: 0 20px;
    }
    .payment-order-header, #payment-success-title {
        cursor: default !important;
    }
    .payment-order-header {
        font-size: 35px !important;
        font-weight: 600 !important;
        margin: 40px 0;
    }
    #page-number {
        width: 35px;
        text-align: center;
        height: 25px;
    }
    .paginate {
        margin: 20px 0 20px 20px;
        font-weight: 500;
    }
    .paginate a {
        width: 130px;
        text-align: left;
    }
    .paginate-page {
        display: inline-block;
        margin-left: 10px;
    }
    .paginate i {
        float: unset !important;
    }
    .paginate i.left {
        margin-right: 10px !important;
        margin-left: 0 !important;
    }
    .paginate i.right {
        margin-left: 10px !important;
        margin-right: 0 !important;
    }

    @media only screen and (min-width: 601px) {
        .payment-order {
            min-height: calc(100vh - 64px);
        }

    }
</style>