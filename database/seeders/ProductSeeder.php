<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds
     */
    public function run(): void
    {
        $description = <<<DESC
            1. Kiểu sản phẩm: Áo Thun Cổ Polo Tay Ngắn Dáng Vừa
            2. Ưu điểm: Trải nghiệm sự thoải mái vượt trội với chiếc áo polo được dệt từ chất liệu Polyester Pique Coffee Đặc tính nhẹ nhàng và thoáng khí của vải giúp bạn luôn cảm thấy dễ chịu trong mọi hoạt động Bên cạnh đó, áo còn sở hữu những tính năng nổi bật như khả năng làm mát cơ thể, bảo vệ da dưới ánh nắng mặt trời, khô nhanh chóng và đặc biệt là khả năng kiểm soát mùi tự nhiên, giữ bạn luôn tự tin suốt cả ngày dài Đặc biệt, hai màu cơ bản đen và trắng của mẫu áo này được sản xuất với số lượng size cực lớn, lên đến 15 size khác nhau, giúp bạn dễ dàng tìm được kích cỡ hoàn hảo nhất
            3. Chất liệu: Polyester Pique Coffee, 100% Polyester (Coffee)
            4. Kỹ thuật: Áo polo có dáng vừa vặn, tôn dáng và thoải mái vận động nhờ đường xẻ lai tinh tế được ép seam phẳng mịn, không gây cộm Bo cổ, bo tay được đặt dệt riêng, đồng bộ màu với vải áo, tạo nên sự liền mạch và chỉn chu trong từng chi tiết Nút bóp nhựa trơn nhám hiện đại, dễ sử dụng và tăng tính thẩm mỹ
            5. Phù hợp với: Nam đi làm, đi học, dạo phố, hoặc tham gia các hoạt động thể thao nhẹ nhàng
            6. Phong cách: Smart-casual, Casual, Sporty
            7. Tìm kiếm sản phẩm: Áo thun polo cà phê, Áo polo kháng khuẩn, Áo polo khử mùi, Áo polo tay ngắn, Áo polo dáng vừa, Áo polo nam nữ, Áo polo công sở,Áo polo thể thao
DESC;

        $products = Product::where('category_id', 1)->orderBy('id')->get();
        foreach ($products as $product) {
            $product->update([
                'des' => $description
            ]);
        }
    }
}
