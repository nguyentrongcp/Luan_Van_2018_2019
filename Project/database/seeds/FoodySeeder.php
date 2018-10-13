<?php

use Illuminate\Database\Seeder;

class FoodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foodies')->insert([
            [
                // id = 1
                // price = 143
                'name' => 'Honey chicken thigh & rice',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Italian&Pizza/honey-chicken-thigh-rice.png',
                'describe' => 'Đùi gà rút xương tẩm mật ong nướng trên đĩa nóng, dùng kèm rau xào và cơm trắng',
                'foody_type_id' => 1,
                'slug' => str_slug( 'Honey chicken thigh & rice'),
            ],
            [
                // id = 2
                // price =132
                'name' => 'Bolognaise spaghetti',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Italian&Pizza/bolognaise.png',
                'describe' => 'Mỳ Ý với thịt bò xay và xốt cà chua',
                'foody_type_id' => 1,
                'slug' => str_slug( 'Bolognaise spaghetti'),
            ],
            [
                // id = 3
                // price = 149
                'name' => 'Beef lasagna',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Italian&Pizza/beef-lasagna.png',
                'describe' => 'Thịt bò nghiền bỏ lò với mỳ lá, xốt Bechamel với phomai dùng kèm salad',
                'foody_type_id' => 1,
                'slug' => str_slug( 'Beef lasagna'),
            ],
            [
                // id = 4
                // price = 120
                'name' => 'Pizza Margherita',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Italian&Pizza/pizza-margherita.png',
                'describe' => 'Sốt cà chua, fomai Mozzarella',
                'foody_type_id' => 1,
                'slug' => str_slug( 'Pizza Margherita'),
            ],
            [
                // id = 5
                // price = 135
                'name' => 'Pizza Prosciutto E Funghi',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Italian&Pizza/pizza-prosciuto-e-funghi.png',
                'describe' => 'Sốt cà chua, fomai Mozzarella, thịt jambon trắng, nấm tươi',
                'foody_type_id' => 1,
                'slug' => str_slug( 'Pizza Prosciutto E Funghi'),
            ],
            [
                // id = 6
                // price = 180
                'name' => 'Pizza Pepperonis',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Italian&Pizza/pepperonis-pizza.png',
                'describe' => 'Sốt cà chua, fomai Mozzarella, cà chua tươi, xúc xích cay và mùi tây',
                'foody_type_id' => 1,
                'slug' => str_slug( 'Pizza Pepperonis'),
            ],
            [
                // id = 7
                // price = 90
                'name' => 'Tropical Pizza',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Italian&Pizza/tropical-pizza.png',
                'describe' => 'Thịt Nguội, Dứa, Phô Mai',
                'foody_type_id' => 1,
                'slug' => str_slug( 'Tropical Pizza'),
            ],
            [
                // id = 8
                // price = 90
                'name' => 'Spicy Chicken Pizza',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Italian&Pizza/spicy-chicken-pizza.png',
                'describe' => 'Ức Gà Xào, Ớt, Ớt Chuông & Phô Mai',
                'foody_type_id' => 1,
                'slug' => str_slug( 'Spicy Chicken Pizza'),
            ],
            [
                // id = 9
                // price = 169
                'name' => 'Tuna Tataki Bowl',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Sushi/tuna-tataki-bowl.png',
                'describe' => 'Dưa leo, bơ, đậu Nhật, salad rong biển, cà chua, mè',
                'foody_type_id' => 2,
                'slug' => str_slug( 'Tuna Tataki Bowl'),
            ],
            [
                // id = 10
                // price = 149
                'name' => 'Kasu curry',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Sushi/kasu-curry-don.png',
                'describe' => 'chiên giòn thịt heo cốt lết/gà cà ri, cơm, súp miso',
                'foody_type_id' => 2,
                'slug' => str_slug( 'Kasu curry'),
            ],
            [
                // id = 11
                // price = 149
                'name' => 'Red dragon roll',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Sushi/red-dragon-roll2.png',
                'describe' => 'Tôm chiên giòn, bơ, dưa leo, sốt phô mai cay phủ cá hồi, trứng cá chuồn, sốt mayo',
                'foody_type_id' => 2,
                'slug' => str_slug( 'Red dragon roll'),
            ],
            [
                // id = 12
                // price = 129
                'name' => 'Special Roll',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Sushi/special-roll.png',
                'describe' => 'Bên trong: tôm chiên giòn, bơ, dưa leo, sốt cay. Topping: 2 cá hồi, 2 cá ngừ, 2 bơ, 2 tobiko',
                'foody_type_id' => 2,
                'slug' => str_slug( 'Special Roll'),
            ],
            [
                // id = 13
                // price = 129
                'name' => 'Tuna Tataki Sashimi',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Sushi/tuna-tataki-sashimi.png',
                'describe' => '',
                'foody_type_id' => 2,
                'slug' => str_slug( 'Tuna Tataki Sashimi'),
            ],
            [
                // id = 14
                // price = 130
                'name' => 'Mỳ Miso Ramen',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Sushi/my-miso-ramen.png',
                'describe' => '',
                'foody_type_id' => 2,
                'slug' => str_slug( 'Mỳ Miso Ramen'),
            ],
            [
                // id = 15
                // price = 638
                'name' => 'Sushi tổng hợp cỡ vừa',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Sushi/sushi-tong-hop-co-vua.png',
                'describe' => '',
                'foody_type_id' => 2,
                'slug' => str_slug( 'Sushi tổng hợp cỡ vừa'),
            ],
            [
                // id = 16
                // price = 47
                'name' => 'Hồng Trà Royal Kem Cheese',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/TraSua&Cafe/hong-tra-royal-kem-cheese.png',
                'describe' => '',
                'foody_type_id' => 15,
                'slug' => str_slug( 'Hồng Trà Royal Kem Cheese'),
            ],
            [
                // id = 17
                // price = 47
                'name' => 'Trà Xanh Royal Kem Cheese',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/TraSua&Cafe/tra-xanh-royal-kem-cheese.png',
                'describe' => '',
                'foody_type_id' => 15,
                'slug' => str_slug( 'Trà Xanh Royal Kem Cheese'),
            ],
            [
                // id = 18
                // price = 45
                'name' => 'Trà ô Long Hoa Hồng Kem Cheese',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/TraSua&Cafe/all-cream-cheese-tea.png',
                'describe' => '',
                'foody_type_id' => 15,
                'slug' => str_slug( 'Trà ô Long Hoa Hồng Kem Cheese'),
            ],
            [
                // id = 19
                // price = 45
                'name' => 'Trà sữa kem cheese',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/TraSua&Cafe/tra-sua-kem-cheese.png',
                'describe' => '',
                'foody_type_id' => 3,
                'slug' => str_slug( 'Trà sữa kem cheese'),
            ],
            [
                // id = 20
                // price = 47
                'name' => 'Trà sữa oreo cake cream',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/TraSua&Cafe/tra-sua-tran-chau-cake-cream.png',
                'describe' => '',
                'foody_type_id' => 3,
                'slug' => str_slug( 'Trà sữa oreo cake cream'),
            ],
            [
                // id = 21
                // price = 43
                'name' => 'Trà sữa double oreo',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/TraSua&Cafe/tra-sua-double-oreo.png',
                'describe' => '',
                'foody_type_id' => 3,
                'slug' => str_slug( 'Trà sữa double oreo'),
            ],
            [
                // id = 22
                // price = 45
                'name' => 'Matcha uji',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/TraSua&Cafe/matcha-uji-45_000.png',
                'describe' => '',
                'foody_type_id' => 15,
                'slug' => str_slug( 'Matcha uji'),
            ],
            [
                // id = 23
                // price = 57
                'name' => 'Matcha kem cheese',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/TraSua&Cafe/matcha-kem-cheese.png',
                'describe' => '',
                'foody_type_id' => 15,
                'slug' => str_slug( 'Matcha kem cheese'),
            ],
            [
                // id = 24
                // price = 47
                'name' => 'Socola cake cream',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/TraSua&Cafe/socola-cake-cream.png',
                'describe' => '',
                'foody_type_id' => 15,
                'slug' => str_slug( 'Socola cake cream'),
            ],
            [
                // id = 25
                // price = 36
                'name' => 'Trà sữa cacao',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/TraSua&Cafe/tra-sua-cacao-cocoa-milk-tea.png',
                'describe' => '',
                'foody_type_id' => 3,
                'slug' => str_slug( 'Trà sữa cacao'),
            ],
            [
                // id = 26
                // price = 42
                'name' => 'Trà sữa matcha đậu đỏ',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/TraSua&Cafe/tra-sua-dau-do.png',
                'describe' => '',
                'foody_type_id' => 3,
                'slug' => str_slug( 'Trà sữa matcha đậu đỏ'),
            ],
            [
                // id = 27
                // price = 47
                'name' => 'Trà Bá Tước Kem Cheese',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/TraSua&Cafe/tra-earl-grey-kem-cheese.png',
                'describe' => '',
                'foody_type_id' => 15,
                'slug' => str_slug( 'Trà Bá Tước Kem Cheese'),
            ],
            [
                // id = 28
                // price = 45
                'name' => 'Trà Ô Long Sakura Kem Cheese',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/TraSua&Cafe/tra-o-long-sakura-kem-cheese.png',
                'describe' => '',
                'foody_type_id' => 15,
                'slug' => str_slug( 'Trà Ô Long Sakura Kem Cheese'),
            ],
            [
                // id = 29
                // price = 45
                'name' => 'Trà Ô Long Hoa Hồng Kem Cheese',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/TraSua&Cafe/tra-o-long-hoa-hong-kem-cheese.png',
                'describe' => '',
                'foody_type_id' => 15,
                'slug' => str_slug( 'Trà Ô Long Hoa Hồng Kem Cheese'),
            ],
            [
                // id = 30
                // price = 53
                'name' => 'Trà Sữa Trân Châu Cake Cream',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/TraSua&Cafe/tra-sua-tran-chau-cake-cream(1).png',
                'describe' => '',
                'foody_type_id' => 3,
                'slug' => str_slug( 'Trà Sữa Trân Châu Cake Cream'),
            ],
            [
                // id = 31
                // price = 155
                'name' => 'Kapsalon mix (thịt heo & thịt bò)',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/BanhMi&Xoi/kapsalon.png',
                'describe' => 'Khoai tây chiên, heo & bò, phô mai, salad, sốt tzatziki, sốt cocktail, sốt special',
                'foody_type_id' => 4,
                'slug' => str_slug( 'Kapsalon mix (thịt heo & thịt bò)'),
            ],
            [
                // id = 32
                // price = 79
                'name' => 'Chicken quesadillas',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/BanhMi&Xoi/quesadillas-chicken.png',
                'describe' => 'Gà, phô mai, cà rốt, dừa, ngô, cà chua, kem chua, sốt chutney',
                'foody_type_id' => 4,
                'slug' => str_slug( 'Chicken quesadillas'),
            ],
            [
                // id = 33
                // price = 35
                'name' => 'Heo nướng + khoai tây chiên nhỏ (Bánh mì Việt Nam)',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/BanhMi&Xoi/banh-mi-viet-nam.png',
                'describe' => 'Heo, nộm đu đủ, mùi ta, lạc, hành khô, sốt chutney, sốt ớt',
                'foody_type_id' => 4,
                'slug' => str_slug( 'Heo nướng + khoai tây chiên nhỏ (Bánh mì Việt Nam)'),
            ],
            [
                // id = 34
                // price = 45
                'name' => 'Bò nướng + khoai tây chiên nhỏ (Bánh mì Việt Nam)',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/BanhMi&Xoi/banh-mi-viet-nam(1).png',
                'describe' => 'Bò, nộm đu đủ, mùi ta, lạc, hành khô, sốt chutney, sốt ớt',
                'foody_type_id' => 4,
                'slug' => str_slug( 'Bò nướng + khoai tây chiên nhỏ (Bánh mì Việt Nam)'),
            ],
            [
                // id = 35
                // price = 35
                'name' => 'Heo nướng + khoai tây chiên nhỏ (Bánh mì Mexico)',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/BanhMi&Xoi/banh-mi-mexico.png',
                'describe' => 'Heo, guacamole, jalapeno, cải tím, mùi ta, kem chua',
                'foody_type_id' => 4,
                'slug' => str_slug( 'Heo nướng + khoai tây chiên nhỏ (Bánh mì Mexico)'),
            ],
            [
                // id = 36
                // price = 45
                'name' => 'Bò nướng + khoai tây chiên nhỏ (Bánh mì Kebab)',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/BanhMi&Xoi/banh-mi-kebab.png',
                'describe' => 'Bò, xà lách xoăn, cải tím, cà chua, hành tây, sốt taztziki, sốt cocktail',
                'foody_type_id' => 4,
                'slug' => str_slug( 'Bò nướng + khoai tây chiên nhỏ (Bánh mì Kebab)'),
            ],
            [
                // id = 37
                // price = 99
                'name' => 'Might plate thịt heo nướng',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/BanhMi&Xoi/might-plate.png',
                'describe' => 'Heo, salad, cơm việt, khoai tây chiên , sốt cocktail, sốt tzatziki, sốt tỏi',
                'foody_type_id' => 4,
                'slug' => str_slug( 'Might plate thịt heo nướng'),
            ],
            [
                // id = 38
                // price = 149
                'name' => 'Kapsalon thịt heo nướng',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/BanhMi&Xoi/kapsalon(1).png',
                'describe' => 'Khoai tây chiên, heo, phô mai, salad, sốt tzatziki, sốt cocktail, sốt special',
                'foody_type_id' => 4,
                'slug' => str_slug( 'Kapsalon thịt heo nướng'),
            ],
            [
                // id = 39
                // price = 109
                'name' => 'Might plate mix (thịt heo & thịt bò)',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/BanhMi&Xoi/might-plate(1).png',
                'describe' => 'Bò + heo, salad, cơm việt, khoai tây chiên , sốt cocktail, sốt tzatziki, sốt tỏi',
                'foody_type_id' => 4,
                'slug' => str_slug( 'Might plate mix (thịt heo & thịt bò)'),
            ],
            [
                // id = 40
                // price = 400
                'name' => 'Mẹt vịt 9 món',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/AnVat/met-vit-9-mon.png',
                'describe' => 'Vịt nướng than hoa, vịt hấp, vịt rang muối, xiên tim ngũ vị, nem chị dậu, xôi nếp nương, canh măng vịt, nộm chân gà rút xương, bún',
                'foody_type_id' => 5,
                'slug' => str_slug( 'Mẹt vịt 9 món'),
            ],
            [
                // id = 41
                // price = 320
                'name' => 'Mẹt cá lăng',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/AnVat/met-ca-lang.png',
                'describe' => '1 con từ 2,5kg đến 5kg cá lăng trộn, lòng cá xào dứa, cá lăng cuốn mẹt, lẩu chua, om chuối đậu, cá 100% tươi sống',
                'foody_type_id' => 5,
                'slug' => str_slug( 'Mẹt cá lăng'),
            ],
            [
                // id = 42
                // price = 150
                'name' => 'Gà nướng mật ong nửa con',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/AnVat/ga-nuong-mat-ong-nua-con.png',
                'describe' => '',
                'foody_type_id' => 5,
                'slug' => str_slug( 'Gà nướng mật ong nửa con'),
            ],
            [
                // id = 43
                // price = 150
                'name' => 'Gà rán tẩm bột nửa con',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/AnVat/ga-ran-tam-bot-nua-con.png',
                'describe' => '',
                'foody_type_id' => 5,
                'slug' => str_slug( 'Gà rán tẩm bột nửa con'),
            ],
            [
                // id = 44
                // price = 70
                'name' => 'Chân gà sả ớt nhỏ',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/AnVat/chan-ga-sa-ot.png',
                'describe' => '',
                'foody_type_id' => 5,
                'slug' => str_slug( 'Chân gà sả ớt nhỏ'),
            ],
            [
                // id = 45
                // price = 110
                'name' => 'Chân gà sả ớt to',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/AnVat/chan-ga-sa-ot(1).png',
                'describe' => '',
                'foody_type_id' => 5,
                'slug' => str_slug( 'Chân gà sả ớt to'),
            ],
            [
                // id = 46
                // price = 120
                'name' => 'Chân gà rút xương xả ớt',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/AnVat/chan-ga-rut-xuong-xa-ot.png',
                'describe' => '12-13 chân to',
                'foody_type_id' => 5,
                'slug' => str_slug( 'Chân gà rút xương xả ớt'),
            ],
            [
                // id = 47
                // price = 198
                'name' => 'Chim câu quay xứ Lạng (350g)',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/AnVat/chim-cau-quay-xu-lang.png',
                'describe' => '',
                'foody_type_id' => 5,
                'slug' => str_slug( 'Chim câu quay xứ Lạng (350g)'),
            ],
            [
                // id = 48
                // price = 164
                'name' => 'Súp hải sản bếp trưởng (2 suất) ',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/AnVat/sup-hai-san-bep-truong.png',
                'describe' => '',
                'foody_type_id' => 5,
                'slug' => str_slug( 'Súp hải sản bếp trưởng (2 suất) '),
            ],
            [
                // id = 49
                // price = 120
                'name' => 'Burger Chili ',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Hamburger/burger-chili.png',
                'describe' => 'Thịt bò, phô mai cheddar, jalapenos, sốt cay, xà lách, cà chua, hành tây',
                'foody_type_id' => 6,
                'slug' => str_slug( 'Burger Chili '),
            ],
            [
                // id = 50
                // price = 140
                'name' => 'Burger Mac\'n Cheese & Beef',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Hamburger/burger-mac_n-cheese-_-beef.png',
                'describe' => 'Thịt bò, mac\'n cheese chiên, mayonnaise, xà lách, cà chua, hành tây, phô mai Cheddar',
                'foody_type_id' => 6,
                'slug' => str_slug( 'Burger Mac\'n Cheese & Beef'),
            ],
            [
                // id = 51
                // price = 210
                'name' => 'Double beef Burger',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Hamburger/burger-double-beef.png',
                'describe' => 'Nhân đôi thịt bò, thịt xông khói x2, phô mai x2, mayonnaise, cà chua, xà lách, hành tây',
                'foody_type_id' => 6,
                'slug' => str_slug( 'Double beef Burger'),
            ],
            [
                // id = 52
                // price = 130
                'name' => 'Beef Bacon Burger',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Hamburger/burger-beef-_-bacon.png',
                'describe' => 'Thịt bò, thịt xông khói, phô mai Cheddar, mayonnaise, cà chua, xà lách, hành tây',
                'foody_type_id' => 6,
                'slug' => str_slug( 'Beef Bacon Burger'),
            ],
            [
                // id = 53
                // price = 120
                'name' => "Burger Mac'n Cheese & Beef",
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Hamburger/burger-mac_n-cheese-_-beef(1).png',
                'describe' => "Thịt bò, mac'n cheese chiên, mayonnaise, xà lách, cà chua, hành tây, phô mai Cheddar",
                'foody_type_id' => 6,
                'slug' => str_slug( "Burger Mac'n Cheese & Beef"),
            ],
            [
                // id = 54
                // price = 25
                'name' => 'Bơ-Gơ Tôm',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Hamburger/bo-go-tom.png',
                'describe' => '',
                'foody_type_id' => 6,
                'slug' => str_slug( 'Bơ-Gơ Tôm'),
            ],
            [
                // id = 55
                // price = 120
                'name' => 'Turkey Dinner Sandwich',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/BanhNgot/turkeydinner.png',
                'describe' => 'Bánh sandwich gà tây',
                'foody_type_id' => 7,
                'slug' => str_slug( 'Turkey Dinner Sandwich'),
            ],
            [
                // id = 56
                // price = 120
                'name' => 'The Double Double',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/BanhNgot/the-double-double.png',
                'describe' => 'Bánh trứng egger ban đầu với trứng tăng gấp đôi, ham & pho mát',
                'foody_type_id' => 7,
                'slug' => str_slug( 'The Double Double'),
            ],
            [
                // id = 57
                // price = 125
                'name' => 'Cheesesteak sandwich',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/BanhNgot/cheesesteak.png',
                'describe' => 'Bánh sandwich phô mai bò',
                'foody_type_id' => 7,
                'slug' => str_slug( 'Cheesesteak sandwich'),
            ],
            [
                // id = 58
                // price = 90
                'name' => 'The New Yorker',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/BanhNgot/04_bagel_egger_49_l_new.png',
                'describe' => 'Trứng, jambong và phô mai',
                'foody_type_id' => 7,
                'slug' => str_slug( 'The New Yorker'),
            ],
            [
                // id = 59
                // price = 105
                'name' => 'The Texan',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/BanhNgot/the-texan.png',
                'describe' => 'Trứng, cheddar, thịt xông khói trên bagel tiêu',
                'foody_type_id' => 7,
                'slug' => str_slug( 'The Texan'),
            ],
            [
                // id = 60
                // price = 120
                'name' => 'The Nova Scotia',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/BanhNgot/the-nova-scotia.png',
                'describe' => 'Cá hồi hun khói, trứng + hẹ, phô mai kem, bánh multi grain bagel',
                'foody_type_id' => 7,
                'slug' => str_slug( 'The Nova Scotia'),
            ],
            [
                // id = 61
                // price = 105
                'name' => 'The Parisian',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/BanhNgot/the-parisian.png',
                'describe' => 'trứng + hẹ, thịt xông khói, cheddar trên croissant nướng',
                'foody_type_id' => 7,
                'slug' => str_slug( 'The Parisian'),
            ],
            [
                // id = 62
                // price = 120
                'name' => 'The Italian',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/BanhNgot/the-italian.png',
                'describe' => 'Trứng + hẹ, cà chua & pesto (có chứa hạt) trên croissant nướng',
                'foody_type_id' => 7,
                'slug' => str_slug( 'The Italian'),
            ],
            [
                // id = 63
                // price = 43
                'name' => 'Chè thạch đào',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/TrangMieng/che-thach-dao.png',
                'describe' => '',
                'foody_type_id' => 8,
                'slug' => str_slug( 'Chè thạch đào'),
            ],
            [
                // id = 64
                // price = 43
                'name' => 'Chè thạch xoài',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/TrangMieng/che-thach-xoai.png',
                'describe' => '',
                'foody_type_id' => 8,
                'slug' => str_slug( 'Chè thạch xoài'),
            ],
            [
                // id = 65
                // price = 35
                'name' => 'Chè sen nhãn táo đỏ',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/TrangMieng/sen-nhan-tao-do.png',
                'describe' => '',
                'foody_type_id' => 8,
                'slug' => str_slug( 'Chè sen nhãn táo đỏ'),
            ],
            [
                // id = 66
                // price = 30
                'name' => 'Chè khúc bạch',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/TrangMieng/che-khuc-bach.png',
                'describe' => '',
                'foody_type_id' => 8,
                'slug' => str_slug( 'Chè khúc bạch'),
            ],
            [
                // id = 67
                // price = 35
                'name' => 'Rau câu dừa',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/TrangMieng/rau-cau-dua.png',
                'describe' => '',
                'foody_type_id' => 8,
                'slug' => str_slug( 'Rau câu dừa'),
            ],
            [
                // id = 68
                // price = 35
                'name' => 'Rau câu phô mai',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/TrangMieng/rau-cau-pho-mai.png',
                'describe' => '',
                'foody_type_id' => 8,
                'slug' => str_slug( 'Rau câu phô mai'),
            ],
            [
                // id = 69
                // price = 45
                'name' => 'Sữa chua hoa quả',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/TrangMieng/sua-chua-hoa-qua.png',
                'describe' => '',
                'foody_type_id' => 8,
                'slug' => str_slug( 'Sữa chua hoa quả'),
            ],
            [
                // id = 70
                // price = 35
                'name' => 'Caramen trân châu',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/TrangMieng/caramen-tran-chau.png',
                'describe' => '',
                'foody_type_id' => 8,
                'slug' => str_slug( 'Caramen trân châu'),
            ],
            [
                // id = 71
                // price = 250
                'name' => 'Kem Caramen muối Hộp 650ML',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Kem/caramelmuoi.png',
                'describe' => '',
                'foody_type_id' => 9,
                'slug' => str_slug( 'Kem Caramen muối Hộp 650ML'),
            ],
            [
                // id = 72
                // price = 250
                'name' => 'Kem Phúc Bồn Tử Hộp 650ML',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Kem/phucbontu.png',
                'describe' => '',
                'foody_type_id' => 9,
                'slug' => str_slug( 'Kem Phúc Bồn Tử Hộp 650ML'),
            ],
            [
                // id = 73
                // price = 250
                'name' => 'Kem Sôcôla Hộp 650ML',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Kem/socola3.png',
                'describe' => '',
                'foody_type_id' => 9,
                'slug' => str_slug( 'Kem Sôcôla Hộp 650ML'),
            ],
            [
                // id = 74
                // price = 79
                'name' => 'Madagascar',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Kem/madagascar-cmyk.png',
                'describe' => 'kem Dâu trộn, kem Vani, kem tươi, hạt điều, bánh Choco pie, trái dâu tươi và phúc bồn tử',
                'foody_type_id' => 9,
                'slug' => str_slug( 'Madagascar'),
            ],
            [
                // id = 75
                // price = 79
                'name' => 'Alla Romana',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Kem/ala-romana-cmyk.png',
                'describe' => 'kem bạc hà socola, straccitella, kem tươi, bánh Sampan, socola đen',
                'foody_type_id' => 9,
                'slug' => str_slug( 'Alla Romana'),
            ],
            [
                // id = 76
                // price = 79
                'name' => 'Belgium',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Kem/belgium-cmyk.png',
                'describe' => 'kem vani, kem socola, sốt socola, kem tươi, hạnh nhân, socola và bánh quế',
                'foody_type_id' => 9,
                'slug' => str_slug( 'Belgium'),
            ],
            [
                // id = 77
                // price = 79
                'name' => 'Amazon',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Kem/amazon-cmyk.png',
                'describe' => 'kem trà xanh, kem dừa, kem tươi, mứt dừa, rượu malibu, socola trắng, trái dâu tây, dâu đen',
                'foody_type_id' => 9,
                'slug' => str_slug( 'Amazon'),
            ],
            [
                // id = 78
                // price = 79
                'name' => 'Sofia',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Kem/sofia-cmyk.png',
                'describe' => 'kem phúc bồn tử và rum nho, kem tươi, socola trắng, sốt dâu, mứt vỏ cam và trái phúc bồn tử',
                'foody_type_id' => 9,
                'slug' => str_slug( 'Sofia'),
            ],
            [
                // id = 79
                // price = 490
                'name' => 'Fairy Land',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Kem/ic01.png',
                'describe' => 'Thành phần: Kem Dâu tây, Phúc bồn tử, Dâu sữa chocolate đen, hat điều và kem tươi (Vui lòng đặt trước 6 tiếng)',
                'foody_type_id' => 9,
                'slug' => str_slug( 'Fairy Land'),
            ],
            [
                // id = 80
                // price = 490
                'name' => 'Pinwheel Forest',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Kem/ic02.png',
                'describe' => 'Thành phần: Kem Trà xanh, Dừa, Đào lạc, chocolate, hạt điều, quả Kiwi, phúc bồn tử và kem tươi (Vui lòng đặt trước 6 tiếng)',
                'foody_type_id' => 9,
                'slug' => str_slug( 'Pinwheel Forest'),
            ],
            [
                // id = 81
                // price = 15
                'name' => 'Nước chanh tươi',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/SinhTo&NuocEp/nuoc-chanh-tuoi.png',
                'describe' => '',
                'foody_type_id' => 11,
                'slug' => str_slug( 'Nước chanh tươi'),
            ],
            [
                // id = 82
                // price = 15
                'name' => 'Nước chanh leo',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/SinhTo&NuocEp/chanh-leo2.png',
                'describe' => '',
                'foody_type_id' => 11,
                'slug' => str_slug( 'Nước chanh leo'),
            ],
            [
                // id = 83
                // price = 15
                'name' => 'Nước quất',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/SinhTo&NuocEp/quat2.png',
                'describe' => '',
                'foody_type_id' => 11,
                'slug' => str_slug( 'Nước quất'),
            ],
            [
                // id = 84
                // price = 20
                'name' => 'Nước ép dứa',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/SinhTo&NuocEp/dua-pineapple.png',
                'describe' => '',
                'foody_type_id' => 11,
                'slug' => str_slug( 'Nước ép dứa'),
            ],
            [
                // id = 84
                // price = 25
                'name' => 'Nước ép dứa - cà rốt',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/SinhTo&NuocEp/dua-carot.png',
                'describe' => '',
                'foody_type_id' => 11,
                'slug' => str_slug( 'Nước ép dứa - cà rốt'),
            ],
            [
                // id = 85
                // price = 25
                'name' => 'Nước dưa hấu',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/SinhTo&NuocEp/dua-hau.png',
                'describe' => '',
                'foody_type_id' => 11,
                'slug' => str_slug( 'Nước dưa hấu'),
            ],
            [
                // id = 86
                // price = 25
                'name' => 'Nước ép ổi',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/SinhTo&NuocEp/oi2.png',
                'describe' => '',
                'foody_type_id' => 11,
                'slug' => str_slug( 'Nước ép ổi'),
            ],
            [
                // id = 87
                // price = 40
                'name' => 'Nước ép cam',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/SinhTo&NuocEp/cam.png',
                'describe' => '',
                'foody_type_id' => 11,
                'slug' => str_slug( 'Nước ép cam'),
            ],
            [
                // id = 88
                // price = 163
                'name' => 'Súp nấm đặc biệt',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Sup/forest-mushroom-consomme.png',
                'describe' => 'Nước hầm gà và các loại nấm, các loại rau củ, ăn với nấm tươi',
                'foody_type_id' => 12,
                'slug' => str_slug( 'Súp nấm đặc biệt'),
            ],
            [
                // id = 89
                // price = 159
                'name' => 'Mỳ Ý Sốt Pesto & Cà Chua Bi Bỏ Lò',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Chay/mi-y-sot-pesto.png',
                'describe' => 'Mỳ Ý Sốt Pesto & Cà Chua Bỏ Lò chinh phục khách hàng bởi sự kết hợp hài hoà giữa mì Ý; vị ngậy, béo, thơm ngọt của Pesto với cái vị đậm đà khó mà miêu tả bằng lời của cà chua bỏ lò.',
                'foody_type_id' => 13,
                'slug' => str_slug( 'Mỳ Ý Sốt Pesto & Cà Chua Bi Bỏ Lò'),
            ],
            [
                // id = 90
                // price = 138
                'name' => 'Chả Đậu Gà Rong Biển',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Chay/cha-dau-ga-rong-bien.png',
                'describe' => 'Là món ăn đường phố nổi tiếng có nguồn gốc từ các nước Trung Đông, Chả Đậu Gà Rong Biển trở nên nổi tiếng trên thế giới bởi hương vị thơm ngon của nó khi vị bùi ngọt của đậu gà hoà quyền cùng nhiều loại gia vị như tỏi, hành tây hay rau mùi.',
                'foody_type_id' => 13,
                'slug' => str_slug( 'Chả Đậu Gà Rong Biển'),
            ],
            [
                // id = 91
                // price = 118
                'name' => 'Cà Tím Nướng Pate Chay',
                'foody_created_at' => date('Y-m-d H:i:s'),
                'foody_updated_at' => date('Y-m-d H:i:s'),
                'avatar' => '/customer/image/Chay/ca-tim-nuong-pate.png',
                'describe' => 'Cà Tím Nướng Sốt Mỡ Hành Và Pate Chay là một gợi ý hấp dẫn cho Món Chính. Nó là sự kết hợp hoàn hảo giữa vị ngọt của cà tím, mùi thơm của sốt mỡ hành và vị ngậy từ Pate thuần chay.',
                'foody_type_id' => 13,
                'slug' => str_slug( 'Cà Tím Nướng Pate Chay'),
            ],
//            [
//                // id =
//                // price =
//                'name' => '',
//                'foody_created_at' => date('Y-m-d H:i:s'),
//                'foody_updated_at' => date('Y-m-d H:i:s'),
//                'avatar' => '',
//                'describe' => '',
//                'foody_type_id' => ,
//                'slug' => str_slug('',
//            ],


        ]);
    }
}
