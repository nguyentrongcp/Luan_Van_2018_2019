<div id="error-payment-modal" class="modal">
    <div class="modal-content">
        <div class="col s12 center-align error-modal-content">
            <span id="error-modal-text"></span>
        </div>

        <div class="col s12 center-align">
            <a id="error-modal-button" href="{{ route('payment.index') }}" class="waves-effect waves-light btn">Cập nhật ngay</a>
        </div>
    </div>
</div>

<style>
    .error-modal-content {
        font-size: 18px;
        margin-bottom: 20px;
    }
</style>