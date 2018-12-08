<div class="ui grid stackable">
    <div class="ten wide column">
        <h4 class="ui header">Top 10 ẩm thực bán chạy nhất</h4>
        <form class="ui tiny form">
            <div class="inline fields">
                <div class="field" id="select-type">
                    <label>Xem theo: </label>
                    <select name="type" id="type">
                        <option value="day">Ngày</option>
                        <option value="days">Nhiều ngày</option>
                    </select>
                </div>
                <div class="field select-hide" id="select-day">
                    <input type="date" name="day" id="day" value="{{ date('Y-m-d') }}">
                </div>
                <div class="field select-hide hidden" id="select-day-start">
                    <label>Từ: </label>
                    <input type="date" name="day-star" id="day-start">
                </div>
                <div class="field select-hide hidden" id="select-day-end">
                    <label>Đến: </label>
                    <input type="date" name="day-end" id="day-end">
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
                    <th id="table-title"></th>
                    <th>Ẩm thực</th>
                    <th>Lượt mua</th>
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

