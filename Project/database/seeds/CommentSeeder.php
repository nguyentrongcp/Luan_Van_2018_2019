<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [];
        $contents = [
            [
                'title' => 'Đồ uống mớii',
                'content' => 'Thấy hội review món mới của Gong cha nên mình ko thể ngó lơ, qua tận quán để thưởng thức nhưng xem chừng nó ko hợp vs mình lắm :))) nhất là đồ theo kiểu ngọt lịm thế này mới khổ..<br>
                              Mình gọi Strawberry Earl Grey Latte 0 đường 70 đá trân châu trắng 63k, cốc còn lại là Trà alisan kem sữa trên pudding 57k. Nhân vật chính trông ấn tượng hơn hẳn nhưng chất lượng ko so bì đc với mấy đồ kia :(( mình đã bỏ đường nhưng khuấy lên vẫn rất ngọt, thực sự chỉ hợp vs ng hảo ngọt thôi nhé, thực sự đấy.. chưa kể bị át vị trà nhiều quá, mình phải đợi tan đá r mới uống.. Cốc kia thì vẫn thơm ngon.<br>
                              Đáng tiếc 1 chút khi vừa đắt lại ko đc như kì vọng..'
            ],
            [
                'title' => 'Trà Sữa Gong Cha - 貢茶 - Hoàng Đạo Thúy',
                'content' => 'Gongcha là thương hiệu trà sữa quá quen thuộc đối với giới trẻ Hà thành rồi. Mỗi lần mình tới quán là đều đông nghịt người ở đấy. Thậm chí có mấy lần còn đợi mãi không có chỗ ngồi đành mang về. Sau rút kinh nghiệm nên gọi NOW ship cho nhanh lại còn hay được giảm giá.<br>
                              Menu của quán cũng khá đa dạng. Theo mình thấy nếu biết chọn đồ uống và điều chỉnh đường đá thì Gongcha là một loại đồ uống ngon. Có thương hiệu nên đương nhiên giá cả cũng khá mắc khoảng 50k-70k thì phải. Nói chung mọi người nên thử cho biết nếu ai thấy hợp có thể uống lâu dài.'
            ],
            [
                'title' => 'RẤT NGON',
                'content' => 'Trà Alisan Kem Sữa là món trà mình thích nhất ở Gong Cha Lúc nào đến quán chỉ nghĩ ngay đến Alisan hoi<br>
                              Kem mặn đặc quánh, vị mặn mặn, ngọt ngọt hoà quyện lại với nhau gọi là siêu phẩmmm Trà Alisan có chút vị đắng, vị ngọt ở trong, thanh thanh nhẹ mình rất thích Uống kèm với trân châu đen dai dai, mềm mềm ở Gong Cha phải gọi là quá ngon<br>
                              View ở đây cực đẹp luôn, mà rất rộng nữa chứ Nhưng quán Gong Cha hầu như lúc nào cũng đông nên khó để mà ngồi học bài tại đây được nhá<br>
                              Trà sữa GongCha có đắt so với mặt bằng chung nhưng giá này đáng cho sản phẩm nhé 47k<br>
                              Đến đây các bạn có thể gọi thêm bánh ngọt, đồ ăn tráng miệng từ quán bánh bên cạnh nha Bánh khá ngon, vừa miệng'
            ],
            [
                'title' => 'Ko baoh quay lại',
                'content' => 'Hôm nay mình đi ăn sinh nhật bạn. 4 đứa định ăn nướng nhưng bị chuyển thành buffet lẩu. Giá cả thì oki nhưng đồ ăn cũng bình thg như nhưngx chỗ khác.<br>
                              Nguyên nhân mà bọn mình ko baoh quay lại đó chính là phục vụ quá chán! Mình gọi thêm mấy đĩa bò mà mãi ko thấy ra, lúc đầu còn ko có gia vị! Gọi mãi mới ra gia vị và muôi lẩu! Nói chung phục vụ chán lắm! 0 sao!'
            ],
            [
                'title' => 'Chất lượng xoàng, service tùy tiện',
                'content' => 'Đặt chỗ cho 35 ng, kỳ vọng dc ăn nướng cuối cùng bị xếp vào phòng không có bếp nướng bắt buộc phải ăn lẩu. Mà lẩu thì làm rất cẩu thả, hình như có đúng 1 vị nước lẩu, không có đồ chấm nào khác ngoài muối chanh, thịt toàn mỡ, không có nấm, quẩy or váng đậu. Phục vụ chỉ đều ban đầu tới 1 đoạn chững hẳn lại kiểu ăn hết quota rồi. Đã nuôi hy vọng về 1 quán gần công ty để thi thoảng liên hoan, cơ mà chắc ăn riêng cũng không dám quay lại.'
            ],
            [
                'title' => 'Sapasa - Lẩu Nướng & Vườn Bia',
                'content' => '- vị trí: nằm phía cuối đường luôn từ 96 đi thẳng vào có bãi để xe rộng rãi.<br>
                              - ko gian: quán có mấy tầng nên rộng rãi và thoáng phết<br>
                              - chất lượng: hôm khai trương có km buffer nướng 99k lại còn tặng coca phải nói là quá ok luôn, cơ man là thịt ăn ngon lắm, về sau mình quay lại lần 2 thì ko còn nữa rồi, thay vào đó là giá tầm 130k/ng, như vậy thì cũng giống như các quán khu vực trên này, nếu giá như thế thì chắc là cũng k phải chạy xuống đây làm gì. Vì các món ăn cũng k quá đặc sắc.<br>
                              - nhân viên nhanh nhẹn và rất lịch sự, điểm cộng'
            ],
            [
                'title' => 'Sapasa - Lẩu Nướng & Vườn Bia',
                'content' => 'Đi ăn đúng đợt quán mới mở, khuyến mãi khai trương 99K/suất. Thật ra thì nướng cũng như bao quán khác, ướp đậm nên bạn nào muốn ăn được nhiều thì nên gọi nhiều rau. Còn nữa, suất khuyến mãi uống coca thả phanh nên dễ bị đầy bụng, khó ăn, nếu thấy thịt mặn quá thì nên ăn rau, hạn chế uống coca hoặc gọi hẳn thứ đồ uống khác dễ tiêu.'
            ],
            [
                'title' => 'Tạm được.',
                'content' => 'Không gian đẹp, thoáng. Ngồi tầng 1 mát hơn các tầng trên dù mình đi hôm trời oi nóng.<br>
                              Mình đến ăn buffet 3 người lớn 2 bé 4 tuổi đc free. <br>
                              Nói chung đồ ăn cũng ngon, thịt ăn thoải mái nhưng rau thì gọi khó quá. Mình gọi rau ăn đồ nướng thì mang đc lần đầu tiên 1 đĩa đầy đủ rau sống nấm và cà tím. Sau đó gọi thêm đĩa đó thì bảo hết r.<br>
                              Nhưng có vẻ quán mới nên nhân viên phục vụ còn lóng ngóng. Gọi đồ hơi lâu. Có vẻ các bạn cũng chưa đc đào tạo chuyên nghiệp chứ ko phải do thái độ j. Hi vọng nâng cao chất lượng quản lý hơn.'
            ],
            [
                'title' => 'Quán chuyên Bò và Ngựa',
                'content' => 'Quán này mới mở nằm trong khu đô thị ở 96 Nguyễn Huy Tưởng nha các bạn. Quán chuyên về các món lẩu ngựa và Bò. Ở Hà Nội hầu như rất ít quán chuyên món Ngựa . Đồ ở đây chất lượng rất ok, nêm nếm khá vừa vặn. Mà do quán mới nên còn vắng thành ra nv phục vụ rất nhanh. Quán bài trí rất thoáng đãng rộng rãi , sạch sẽ. Quán mới khai trương nên có ctrinh giảm 25% cho khách đặt bàn trc thành ra giá cực hợp lý nha. Thấy bảo sắp tới có cả buffet ăn nhoè luôn ạ.'
            ],

        ];

        for($i=2; $i<=\App\Foody::count(); $i++) {
            for($j=0; $j<rand(4,9); $j++) {
                do {
                    $customer_id = rand(3, \App\Customer::count());
                }
                while(\App\Comment::where('customer_id', $customer_id)->where('foody_id', $i)->count() > 0);
                $rows[] = [
                    'customer_id' => $customer_id,
                    'foody_id' => $i,
                    'date' => date('Y-m-d H:i:s', rand(1514739600, time())),
                    'title' => $contents[$j]['title'],
                    'content' => $contents[$j]['content'],
                ];
            }
        }

        DB::table('comments')->insert($rows);
    }
}
