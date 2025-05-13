<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Description;
class DescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $content = <<<DESS
1. Kiểu sản phẩm: Áo Polo tay ngắn dáng vừa.
2. Ưu điểm: thoáng mát (nhờ mắt vải lớn), khả năng hút ẩm tốt, mềm mịn, bo poly có độ bền cao giúp ôm sát nhưng vẫn thoải mái khi mặc.
3. Chất liệu: Vải Cá Sấu Tici 4 chiều, thành phần gồm 61% Polyester, 33% Cotton, 6% Spandex.
4. Kỹ thuật: Bo cổ, bo tay dệt sợi poly phối khác màu tạo điểm nhấn cho áo.
5. Phù hợp với ai: Dành cho những ai yêu thích phong cách trẻ trung, năng động, thoải mái, và muốn thể hiện cá tính mà vẫn lịch sự. Thích hợp cho mọi hoạt động từ ngoài trời, thể thao đến đi làm, đi học, đi chơi.
6. Thuộc Bộ Sưu Tập: No Style, phù hợp với mọi phong cách, từ thanh lịch đến cá tính, luôn thời trang và hiện đại.
7. Các tên thường gọi hoặc tìm kiếm về sản phẩm này: Áo polo cổ bẻ, áo polo đen, áo polo tay ngắn, áo polo dáng vừa.
DESS;

        Description::firstOrCreate([
            'content' => $content
        ]);
    }
}
