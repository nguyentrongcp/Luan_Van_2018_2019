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
            ]
        ]);
    }
}
