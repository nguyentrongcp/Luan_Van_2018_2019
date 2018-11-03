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
                'title' => 'Gong Cha và 4 năm tạo nên khác biệt trong văn hóa trà sữa Việt',
                'slug' => str_slug('Gong Cha và 4 năm tạo nên khác biệt trong văn hóa trà sữa Việt'),
                'avatar' => '/customer/image_news/1_0.jpg',
                'content' => "
                    Nhìn lại quãng đường 4 năm, văn hóa uống trà sữa đã thay đổi nhiều, trong đó Gong Cha là một trong những thương hiệu tiên phong cho những thay đổi này.
                    <br><br>
                    Năm 2014, định nghĩa trà sữa còn đơn giản, như những quán ăn vặt trước cổng trường pha chế thức uống này. Chỉ cần 3 phút đợi là có ngay một ly thơm ngon đầy ụ, với mức giá chỉ tầm 10.000-30.000 đồng. Ở đâu cũng có, vị không giống thì cũng hao hao. Việc xếp hàng để uống trà sữa hầu như không có.
                    <br><br>
                    <img src='/customer/image_news/1_0.jpg'>
                    <br>
                    <small>Dòng người xếp hàng dài tại Gong Cha Hồ Tùng Mậu thời điểm năm 2014.</small>
                    <br><br>
                    Vì vậy, thời gian đầu khi đến với Gong Cha, mức giá trung bình 50.000 đồng/cốc làm nhiều người bất ngờ một, thì việc phải xếp hàng dài chờ gọi nước còn gây ngạc nhiên hơn. Tại thời điểm đó, khách hàng đã quen với việc được phục vụ tận nơi, nên chuyện “tự phục vụ” dẫn đến không ít ý kiến trái chiều. Nhưng Gong Cha vẫn từ tốn giữ nguyên quy trình mà nhiều người cho rằng mất thời gian.
                    <br><br>
                    Và sau 4 năm, chuyện xếp hàng lại trở thành nét văn hóa. Việc chờ 20 phút không còn khiến khách hàng than phiền. Ngược lại, giới trẻ mặc định đây là cái giá xứng đáng để thưởng thức món ngon.
                    <br><br>
                    Điều khiến trà sữa trở nên đặc biệt chính là ở loạt topping đa dạng dùng kèm. Bên cạnh trân châu là món cơ bản, hình ảnh của topping trong mắt mọi người vẫn chỉ là các loại thạch, có chăng khác nhau về mùi vị. Thế nhưng, Gong Cha đã tạo ra bước ngoặt lớn khi cộng đồng trà sữa Việt lần đầu biết đến milk foam. Chỉ lớp mỏng đặc mịn màng như tuyết phủ, nhưng vẫn đủ khiến vị giác người dùng không thể cưỡng lại. Thơm béo, ngọt vừa và đặc biệt là mặn nhẹ nơi đầu lưỡi là đặc trưng của loại váng sữa này.
                    <br><br>
                    <img src='/customer/image_news/1_1.jpg'>
                    <br>
                    <small>Nhắc đến milk foam mặn, giới trẻ nghĩ ngay đến Gong Cha.</small>
                    <br><br>
                    Về sau, milk foam đã xuất hiện ở hầu hết quán trà sữa, với nhiều công thức mặn ngọt khác nhau. Thế nhưng, chỉ cần nhắc đến milk foam mặn, hình ảnh đầu tiên hiện lên vẫn sẽ là Gong Cha.
                    <br>
                    Trước đây, giới trẻ đa phần quen với trà sữa được pha với đủ các vị như dưa lưới, khoai môn, chocolate, xoài… tạo nên một menu đầy màu sắc. Nhưng ở Gong Cha menu sẽ đậm vị trà. Lần đầu gọi nước, không ít bạn đã bị lạc vào mê cung của đủ loại trà xanh, trà đen, trà alishan, trà earl grey…
                    <br><br>
                    <img src='/customer/image_news/1_2.jpg'>
                    <br>
                    <small>Gong Cha nổi tiếng nhờ sự đa dạng về loại trà cũng như những cách mix-match hương vị mới độc đáo.</small>
                    <br><br>
                    Chính nhờ việc tập trung vào trải nghiệm đậm vị này, Gong Cha chinh phục được không chỉ khách hàng trẻ, mà còn cả người lớn tuổi khó tính. Từ đây, hình ảnh trà sữa được nâng tầm, không còn là những ly xanh đỏ cộp mác “tuổi teen”.
                    <br><br>
                    Ngoài ra, bạn được tự do điều chỉnh lượng đường, đá theo sở thích. Ban đầu, nhiều bạn trẻ bỡ ngỡ với điều này, nhưng dần dần lại thấy thích thú. Đặc biệt, ly trà 0% đá của Gong Cha cũng sẽ đầy bằng ly 100% đá.
                    <br><br>
                    <img src='/customer/image_news/1_3.jpg'>
                    <br>
                    <small>Mỗi ly trà đều như một tác phẩm của riêng từng khách hàng.</small>
                    <br><br>
                    Sau 4 năm, Gong Cha vẫn giữ vững vị trí của mình, tạo ra cho khách hàng những trải nghiệm khác biệt mỗi ngày. Với sinh nhật năm nay, Gong Cha Việt Nam hứa hẹn mang đến nhiều bất ngờ thú vị với chương trình “Mừng sinh nhật Gong Cha, săn Oppa về nhà”. Và oppa chính là Phó tổng Lee - Park Seo Jun, đã đốn tim nhiều fan nữ Việt cùng bộ phim Thư ký Kim sao thế?.
                    
                ",
                'date' => date('Y-m-d H:i:s'),
                'admin_id' => 1
            ],
            [
                'title' => '12 điều bí mật về thức ăn nhanh khiến bạn bất ngờ',
                'slug' => str_slug('12 điều bí mật về thức ăn nhanh khiến bạn bất ngờ'),
                'avatar' => '/customer/image_news/2_0.jpg',
                'content' => "
                    <b>(PLO)- Có bao giờ bạn tự hỏi vì sao gọi là thức ăn nhanh và những loại thực phẩm ấy chứa điều bí ẩn gì khiến chúng ta khó cưỡng lại không?</b>
                    <br><br>
                    Đồ ăn nhanh luôn khiến người khác bị cuốn hút không chỉ vì hương vị mà còn vì sự tiện lợi. Tuy nhiên, có một số bí mật thú vị mà các cửa hàng đồ ăn nhanh sử dụng để thu hút khách hàng cũng như bán được nhiều sản phẩm mà bạn không biết được, theo Brightside.
                    <br><br>
                    <b>1. Mọi đồ ăn đều có cùng một vị</b>
                    <br><br>
                    Chuỗi cửa hàng đồ ăn nhanh luôn biết khách hàng thích vị nào nhất và đó là lý do tại sao tất cả thực phẩm tại cửa hàng đồ ăn nhanh đều có chung một vị cơ bản. Bằng cách này, cửa hàng đồ ăn nhanh có thể đáp ứng mong muốn của khách hàng ngay lập tức.
                    <br><br>
                    <b>2. Bánh burger được làm cực kỳ nhanh</b>
                    <img src='/customer/image_news/2_0.jpg'>
                    <br>
                    <small>Bánh burger đơn giản nhất được chuẩn bị chỉ trong vòng 30 giây. Ảnh: Brightside</small>
                    <br><br>
                    Trong chuỗi thức ăn nhanh, bánh burger đơn giản nhất được chuẩn bị chỉ trong vòng 30 giây. Vì sao họ có thể phục vụ nhanh như vậy? Thực tế, bánh burger này đã được làm sẵn sau đó để trong tủ lạnh. Khi được yêu cầu, nhân viên chỉ hâm nóng lại sau đó mang ra cho khách.
                    <br><br>
                    <b>3. Thức ăn của họ được thiết kế để ăn nhanh</b>
                    <br><br>
                    <p>Trung bình, trong một cửa hàng đồ ăn nhanh, bạn nuốt một miếng thức ăn sau khi nhai khoảng 12 lần. Bên ngoài cửa hàng, bạn thường nhai khoảng 15 lần trước khi nuốt. Chúng ta càng nhai ít thì càng ít cảm thấy hài lòng và vì thế chúng ta ăn nhiều hơn.</p>
                    <br>
                    Bởi thế nên thức ăn nhanh khiến bạn khó có thể giảm cân được!
                    <br><br>
                    <b>4. Màu sắc cửa hàng đồ ăn nhanh được thiết kế để tăng sự thèm ăn của bạn</b>
                    <br><br>
                    Bạn có nhận thấy các cửa hàng đồ ăn nhanh luôn dùng màu vàng hoặc đỏ không? Không phải vì đẹp mà là có lý do. Những màu sắc này khuyến khích bạn dừng lại và mua thứ gì đó để ăn. Điều này đôi khi được gọi là: \"Lý thuyết sốt cà chua và mù tạt\".
                    <br><br>
                    <b>5. Mục tiêu tối thượng của họ là bán được nhiều đồ ăn nhất có thể</b>
                    <br><br>
                    Các chuyên gia nhận thấy rằng bạn sẽ rất khó từ chối những gì được cung cấp trực tiếp cho bạn. 85% khách hàng mua nhiều hơn dự định ban đầu khi nhân viên trong cửa hàng đồ ăn nhanh đề nghị họ mua thêm.
                    <br><br>
                    <b>6. Đồ uống cỡ vừa đôi khi biến thành cỡ lớn</b>
                    <br><br>
                    Cách tốt nhất để bán được nhiều đồ uống đó là tăng kích cỡ/khối lượng của chúng. Khi chọn đồ uống, thông thường chúng ta sẽ chọn cỡ trung bình nhưng bạn sẽ nhận được đồ uống cỡ lớn nhất. Nhân viên cửa hàng không hề nhầm đâu, họ cố tình đấy. Còn khi bạn không chọn cỡ đồ uống thì đương nhiên là họ sẽ phục vụ bạn cỡ lớn nhất.
                    <b>7. Thịt nướng chỉ là ảo ảnh</b>
                    <br><br>
                    Như đã nói ở trên, bánh mì kẹp tại những cửa hàng đồ ăn nhanh được chuẩn bị trước trong các nhà máy lớn và sau đó để vào tủ lạnh. Các chuỗi cửa hàng đồ ăn nhanh thường thêm một chút mùi thơm từ khói nhân tạo để tạo cảm giác như thịt vừa được nướng.
                    <br><br>
                    <b>8. Không phải lúc nào salad cũng là lựa chọn lành mạnh nhất</b>
                    <br><br>
                    Nhiều chuỗi thức ăn nhanh cung cấp salad và họ cho rằng đó là lựa chọn \"lành mạnh\". Tuy nhiên, do các chất phụ gia họ thêm vào để chế biến chúng nên salad có thể trở thành một trong những món có lượng calo cao nhất. Đôi khi ngay cả nhân viên cửa hàng <span style='color: red'>đồ ăn nhanh</span> cũng không biết có gì trong món salad.
                    <br><br>
                    <b>9. Cà phê có thể ảnh hưởng thần kinh và không kích thích bạn</b>
                    <br><br>
                    Một số chuỗi cửa hàng thực phẩm ăn nhanh thường cung cấp ly xốp chứ không phải ly giấy hay ly thủy tinh để chứa cà phê cho bạn. Rất có thể, loại ly xốp này chứa một số chất hóa học mà khi kết hợp với cà phê ở nhiệt độ cao, chúng có thể ảnh hưởng tới hệ thần kinh, gây trầm cảm và giảm nồng độ cà phê.
                    <br><br>
                    <b>10. Trứng không đơn giản chỉ là trứng</b>
                    <br><br>
                    Đôi khi trứng trong phần ăn sáng mua ở cửa hàng đồ ăn nhanh không chỉ có trứng mà gồm trứng cộng với một \"hỗn hợp trứng cao cấp\". Hỗn hợp này gồm glycerin, dimethylpolysiloxane (dạng silicon) và chất phụ gia thực phẩm E552. Tất nhiên không phải ở đâu cũng vậy nhưng tốt hơn hết nên ăn trứng mà bạn chế biến ở nhà.
                    <br><br>
                    <b>11. Đồ uống có gas không ngon hơn như bạn tưởng</b>
                    <br><br>
                    Một số người cho rằng đồ uống có gas tại cửa hàng này ngon hơn so với đồ uống cùng loại mua ở cửa hàng khác. Thực sự thì chúng y hệt nhau nhưng cửa hàng đồ ăn nhanh thường kết hợp nước với đồ uống có gas ngay khi cho ra cốc phục vụ bạn để chúng có vị \"tươi\" hơn.
                    <br><br>
                    <b>12. Không nên để đồ ăn nhanh quá lâu</b>
                    <br><br>
                    <img src='/customer/image_news/2_1.jpg'>
                    <br>
                    <small>Không nên để đồ ăn nhanh quá lâu vì chúng sẽ mất đi hương vị. Ảnh: Brightside</small>
                    <br><br>
                    Hầu hết đồ ăn phục vụ trong cửa hàng đồ ăn nhanh đều phải được ăn trong một thời gian ngắn sau khi chuẩn bị. Ví dụ, khoai tây chiên chỉ giữ độ tươi ngon trong vòng năm phút và sau đó chúng bắt đầu mất vị. Vì vậy, đừng mang đồ ăn nhanh như khoai tây chiên hay bánh mì kẹp về nhà bởi trong thời gian bạn di chuyển hương vị của đồ ăn sẽ dần biến mất, không như ban đầu.
                    
                ",
                'date' => date('Y-m-d H:i:s'),
                'admin_id' => 1
            ],
//            [
//                'title' => '',
//                'content' => '',
//                'date' => date('Y-m-d H:i:s'),
//                'admin_id' => 1
//            ],
//            [
//                'title' => '',
//                'content' => '',
//                'date' => date('Y-m-d H:i:s'),
//                'admin_id' => 1
//            ],
//            [
//                'title' => '',
//                'content' => '',
//                'date' => date('Y-m-d H:i:s'),
//                'admin_id' => 1
//            ],
//            [
//                'title' => '',
//                'content' => '',
//                'date' => date('Y-m-d H:i:s'),
//                'admin_id' => 1
//            ],
//            [
//                'title' => '',
//                'content' => '',
//                'date' => date('Y-m-d H:i:s'),
//                'admin_id' => 1
//            ],
//            [
//                'title' => '',
//                'content' => '',
//                'date' => date('Y-m-d H:i:s'),
//                'admin_id' => 1
//            ],
//            [
//                'title' => '',
//                'content' => '',
//                'date' => date('Y-m-d H:i:s'),
//                'admin_id' => 1
//            ],
//            [
//                'title' => '',
//                'content' => '',
//                'date' => date('Y-m-d H:i:s'),
//                'admin_id' => 1
//            ],
//            [
//                'title' => '',
//                'content' => '',
//                'date' => date('Y-m-d H:i:s'),
//                'admin_id' => 1
//            ],
//            [
//                'title' => '',
//                'content' => '',
//                'date' => date('Y-m-d H:i:s'),
//                'admin_id' => 1
//            ],
//            [
//                'title' => '',
//                'content' => '',
//                'date' => date('Y-m-d H:i:s'),
//                'admin_id' => 1
//            ],
//            [
//                'title' => '',
//                'content' => '',
//                'date' => date('Y-m-d H:i:s'),
//                'admin_id' => 1
//            ],

        ]);
    }
}
