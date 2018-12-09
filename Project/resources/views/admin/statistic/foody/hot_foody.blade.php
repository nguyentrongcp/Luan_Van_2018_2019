<div class="ui grid stackable">
    <div class="twelve wide column">
        <h4 class="ui header">Top 10 ẩm thực bán chạy nhất</h4>
        <form class="ui tiny form">
            <div class="inline fields">
                <div class="field" id="select-type">
                    <label>Xem theo: </label>
                    <select name="type" id="type">
                        <option value="all">Từ trước đến nay</option>
                        <option value="day">Từ trước đến ngày...</option>
                        <option value="days">Từ ngày... đến ngày...</option>
                        <option value="today">Trong ngày...</option>
                    </select>
                </div>
                <div class="field select-hide hidden" id="select-day">
                    <input max="{{ date('Y-m-d') }}" type="date" name="day" id="day" value="{{ date('Y-m-d') }}">
                </div>
                <div class="field select-hide hidden" id="select-day-start">
                    <label>Từ: </label>
                    <input max="{{ date('Y-m-d') }}" type="date" name="day-start" id="day-start">
                </div>
                <div class="field select-hide hidden" id="select-day-end">
                    <label>Đến: </label>
                    <input type="date" max="{{ date('Y-m-d') }}" name="day-end" id="day-end">
                </div>
                <div class="field" id="select-qty">
                    <label>Số lượng: </label>
                    <select name="type" id="qty">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                        <option value="30">30</option>
                    </select>
                </div>

                <div class="field" id="btn-view">
                    <a class="ui blue label" id="statistic-btn" >OK</a>
                </div>
            </div>
        </form>


        <div class="ui segment" id="table-viewer">
            <table class="ui very compact table celled striped center aligned" id="hot-foody-table">
                <thead>
                <tr>
                    <th class="center aligned">STT</th>
                    <th>Ẩm thực</th>
                    <th class="center aligned">Lượt mua</th>
                </tr>
                </thead>
                <tbody id="table-hot-foody">

                </tbody>
                <tfoot id="table-hot-foody-total">

                </tfoot>
            </table>
        </div>
    </div>
</div>

