<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            [
                'title' => 'Ẩm thực Việt Nam',
                'content' => '<p style="text-align:justify;"><strong><em>Đối với các tín đồ ẩm thực thì có ai không muốn mình được một lần du lịch khắp thể giới và thưởng thức tất cả các đặc sản của tất cả các vùng đất lạ. Mỗi vùng đất đều sở hữu cho mình những món đặc sản làm mê đắm trái tim của những người mộ điệu ẩm thực, tuy vậy sẽ thật khó để bạn có thể thưởng thức hết tất cả các món đặc sản của tất cả các quốc gia trên thế giới. Nhưng với những đặc sản sau đây thì bạn sẽ phải hổi tiếc nếu không được thử qua một lần trong đời những món ăn này. Thật ngạc nhiên là món Phở - món ăn nổi tiếng nhất của Việt Nam cũng góp mặt trong danh sách này của trang Business Insider. Hãy cùng Mytour khá phá danh sách thú vị này ngay bây giờ nhé!</em></strong></p>

<p style="text-align:center;">&nbsp;</p>

<p style="text-align:center;"><img alt="Đến Việt Nam, không một du khách nước ngoài nào có thể bỏ qua Phở - món ăn quốc hồn quốc túy của Việt Nam. Sợi phở mềm mịnn, hương vị đậm đà nhưng vẫn thật tinh tế với nước dùng được tạo nên từ việc ninh nhừ xương trong thời gian dài kết hợp với các loại hương liệu truyền thống, những lát thịt bò tươi ngon – tất cả tạo nên một hương vị Phở khó quên trong lòng bất kỳ du khách nào - Ảnh: Joshua Resnick" src="https://s3-ap-southeast-1.amazonaws.com/mytour-static-file/upload_images/Image/Location/5_12_2016/11/nhung-dac-san-phai-thu-mot-lan-mytour-1.jpg" style="height:467px;width:700px;" data-index="0"></p>

<p style="text-align:center;"><em>Đến Việt Nam, không một du khách nước ngoài nào có thể bỏ qua Phở - món ăn quốc hồn quốc túy của Việt Nam. Sợi phở mềm mịnn, hương vị đậm đà nhưng vẫn thật tinh tế với nước dùng được tạo nên từ việc ninh nhừ xương trong thời gian dài kết hợp với các loại hương liệu truyền thống, những lát thịt bò tươi ngon – tất cả tạo nên một hương vị Phở khó quên trong lòng bất kỳ du khách nào - Ảnh: Joshua Resnick</em></p>

<p style="text-align:center;">&nbsp;</p>

',
                'date' => date('Y-m-d H:i:s'),
                'admin_id' => random_int(1, 2)
            ],
            [
                'title' => 'Món phở',
                'content' => '<h2>PHỞ</h2>    <p style="text-align:justify;">&nbsp;</p>    <p style="text-align:justify;">Tại sao Phở lại được xem là một món ăn từ sợi mang hương vị cộp mác Việt Nam? Dù trên thế giới có rất nhiều nơi phỏng theo món phở Việt Nam nhưng dường như để tìm kiếm đúng hương vị của Phở thì chỉ có duy nhất một nơi có thể có được đó là Việt Nam.</p>    <p style="text-align:justify;">&nbsp;</p>    <p style="text-align:center;"><img alt="Phở bò đúng điệu Việt Nam" src="https://s3-ap-southeast-1.amazonaws.com/mytour-static-file/upload_images/Image/Location/11_7_2016/13/du-lich-am-thuc-viet-nam-mytour-1.jpg" style="height:491px;width:700px;" data-index="0"></p>    <p style="text-align:center;"><em>Phở bò đúng điệu Việt Nam- Ảnh: waL noD</em></p>    <p style="text-align:justify;">&nbsp;</p>    <p style="text-align:justify;">',
                'date' => date('Y-m-d H:i:s'),
                'admin_id' => random_int(1, 2)
            ],
            [
                'title' => 'Món bún bò',
                'content' => '<h2>BÚN BÒ</h2>    <p style="text-align:justify;">&nbsp;</p>    <p style="text-align:justify;">Bún bò là món ăn làm từ sợi tiếp theo có hương vị cộp mác Việt Nam mà du khách khó có thể tìm thấy tại đâu trên thế giới. Bún bò có nguồn gốc từ xứ Huế mộng mơ, với hương vị đậm đà của kinh đô xưa, cổ kính và huyền hoặc. Đầu bếp Anthony Bourdain của kênh truyền hình CNN đã từng nói bún bò làm món súp ngon nhất thế giới mà ông từng thưởng thức và nếu đến Huế mà không ghé chợ Đông Ba để thử nó thì đó sẽ là một thiếu sót lớn.</p>    <p style="text-align:justify;">&nbsp;</p>    <p style="text-align:center;"><img alt="Một tô bún mang cả hương vị xứ Huế" src="https://s3-ap-southeast-1.amazonaws.com/mytour-static-file/upload_images/Image/Location/11_7_2016/13/du-lich-am-thuc-viet-nam-mytour-4.jpg" style="height:1049px;width:700px;" data-index="3"></p>    <p style="text-align:center;"><em>Một tô bún mang cả hương vị xứ Huế- Ảnh: Ted Nghiem</em></p>    <p style="text-align:justify;">&nbsp;</p>    <p style="text-align:justify;">Một tô bún bò đầy đủ bao gồm thịt bò, những sợi bún trắng mềm, hành và rau quế. Thịt bò có thể là thịt bắp bò, thêm giò heo, vài lát chả lụa để làm cho món ăn thêm hấp dẫn. Điểm nhấn của một tô bún bò là ở phần nước dùng, không giống với bất kỳ món ăn từ sợi nào khác. Bởi nước dùng không chỉ có vị ngọt từ thịt mà còn thêm một ít vị ruốc đặc trưng của người miền Trung nói riêng và người Việt Nam nói chung, khiến món bún bò lại có hương vị đặc trưng, cuốn hút người du khách ngay cả khi họ đứng từ xa.</p>    <p style="text-align:justify;">&nbsp;</p>    <p style="text-align:center;"><img alt="Đậm đà một tô bún bò" src="https://s3-ap-southeast-1.amazonaws.com/mytour-static-file/upload_images/Image/Location/11_7_2016/13/du-lich-am-thuc-viet-nam-mytour-5.jpg" style="height:560px;width:700px;" data-index="4"></p>    <p style="text-align:center;"><em>Đậm đà một tô bún bò- Ảnh: Sưu tầm</em></p>    <p style="text-align:justify;">&nbsp;</p>    <h2>BÚN RIÊU</h2>    <p style="text-align:justify;">&nbsp;</p>    <p style="text-align:justify;">Bún riêu hay bún riêu cua được xem là một món ăn truyền thống, có vị chua thanh độc đáo, đặc biệt phổ biến ở miền Nam Việt Nam, mang hương vị đặc trưng, “chất ngây ngất” màu Việt Nam. Tác giả cuốn sách The Food Traveler’s Handbook - Jodi Ettenberg khi được hỏi về ẩm thực Việt Nam thì cô đã đánh giá bún riêu là món cô nhớ nhất khi nhắc đến Việt Nam và thường xuyên thèm được ăn.</p>    <p style="text-align:justify;">&nbsp;</p>    <p style="text-align:center;"><img alt="Bún riêu với màu gạch riêu cua đỏ cuốn hút" src="https://s3-ap-southeast-1.amazonaws.com/mytour-static-file/upload_images/Image/Location/11_7_2016/13/du-lich-am-thuc-viet-nam-mytour-6.jpg" style="height:602px;width:700px;" data-index="5"></p>    <p style="text-align:center;"><em>Bún riêu với màu gạch riêu cua đỏ cuốn hút- Ảnh: The little black dress</em></p>    <p style="text-align:center;">&nbsp;</p>    <p style="text-align:center;"><em><strong>Xem thêm: <a href="http://mytour.vn/c3/khach-san-gia-re-tai-ho-chi-minh-sai-gon.html" target="_blank">Các khách sạn giá rẻ tại Hồ Chí Minh</a></strong></em></p>    <p style="text-align:justify;">&nbsp;</p>    <p style="text-align:justify;">',
                'date' => date('Y-m-d H:i:s'),
                'admin_id' => random_int(1, 2)
            ]
        ]);
    }
}
