<style>
    .modal {
        min-width: 300px;
        width: 90%;
    }
    .modal-header {
        margin-top: 0;
    }
    .modal-action {
        float: right;
        margin-bottom: 24px;
        margin-top: 15px;
    }
    .modal-text {
        font-size: 18px;
    }
    .modal-button {
        margin-top: 15px;
    }


    /*login modal*/
    .input-field {
        margin-top: 0;
    }
    #login-modal {
        max-width: 400px;
    }
    #login-modal .modal-header {
        margin-bottom: 25px;
    }

    /*login require*/
    #require-modal {
        max-width: 475px;
    }

    /*notify modal*/
    #notify-modal i {
        font-size: 18px;
    }
    #notify-modal i.check {
        color: #26a69a;
    }
    #notify-modal i.exclamation {
        color: #E57373;
    }

    /*confirm modal*/
    #confirm-modal {
        /*max-width: 450px;*/
    }


    /*error modal*/
    .error-modal-content {
        font-size: 18px;
        margin-bottom: 20px;
    }

    /*profile modal*/
    #profile-modal {
        max-width: 450px;
        max-height: 100%;
    }
    .profile-title {
        margin-bottom: 20px;
        margin-top: 10px;
        font-size: 18px;
        font-weight: 500;
    }
    .profile-avatar {
        width: 100px;
        display: inline-block;
        float: left;
        position: relative;
    }
    .profile-avatar img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
    }
    .profile-avatar div {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background-color: rgba(0,0,0,0.7);
        position: absolute;
        top: 0;
        opacity: 0;
    }
    .profile-avatar div:hover {
        opacity: 1;
    }
    .profile-avatar div i {
        cursor: pointer;
        font-size: 30px;
        position: relative;
        top: 35px;
        left: 35px;
        color: rgba(255,255,255,0.8);
    }
    .profile-name, .profile-gender {
        width: calc(100% - 120px);
        display: inline-block;
        float: right;
    }

    @media only screen and (max-width: 450px) {
        #profile-modal {
            width: 100%;
            height: 100%;
            top: 0 !important;
            left: 0 !important;
        }

    }
</style>