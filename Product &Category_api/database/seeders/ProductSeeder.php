<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Product::create([
            'name' => 'iPhone 11',
            'description' => 'mẫu sản phẩm được ra mắt vào tháng 11/2019 với nhiều tính năng mới hấp dẫn. Có 6 màu đa dạng cho người dùng lựa chọn. Apple đã nâng cấp con chip Apple A13 Bionic mang đến những hiệu năng vô cùng mạnh mẽ, mượt mà.',
            'price' => 11.55,
            'category_id' => 2
        ]);

        Product::create([
            'name' => 'Vivo X80',
            'description' => 'Cụm camera được bố trí ở mặt sau được bọc bởi một ô hình chữ nhật có diện tích lớn, mang đến sự độc đáo và nổi bật hơn cho chiếc điện thoại',
            'price' => 9.00,
            'category_id' => 2
        ]);

        Product::create([
            'name' => 'Derby',
            'description' => 'Mẫu giày tây rất được ưa chuộng bởi giới công sở, văn phòng bên cạnh mẫu giày Oxford.',
            'price' => 11.55,
            'category_id' => 1
        ]);

        Product::create([
            'name' => 'Chanel Bleu De Chanel Parfum',
            'description' => 'Phá vỡ mọi qui ước, mọi khuôn khổ mang đến hương thơm gợi cảm, lịch lãm và đầy bản lĩnh của phái mạnh.',
            'price' => 20.40,
            'category_id' => 3
        ]);
    }

}

