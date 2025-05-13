<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->truncate();

        $products = [
            [
                'name' => 'Áo Thun Thể Thao Tay Ngắn Beginner 01 Vol 24',
                'img' => '/img/ao-thun/ao-thun-1.jpg',
                'price' => 150000,
                'category_id' => 1,
                'description_id' => 1
            ],
            [
                'name' => 'Áo Thun Thể Thao Tay Ngắn Beginner 01 Vol 24',
                'img' => '/img/ao-thun/ao-thun-2.jpg',
                'price' => rand(100000, 200000),
                'category_id' => 1,
                'description_id' => 1
            ],
            [
                'name' => 'Áo Thun 3 Lỗ Thể Thao Beginner 03 Vol 24',
                'img' => '/img/ao-thun/ao-thun-3.jpg',
                'price' => rand(100000, 200000),
                'category_id' => 1,
                'description_id' => 1
            ],
            [
                'name' => 'Áo Thun Thể Thao Tay Ngắn Beginner 01 Vol 24',
                'img' => '/img/ao-thun/ao-thun-4.jpg',
                'price' => rand(100000, 200000),
                'category_id' => 1,
                'description_id' => 1
            ],
            [
                'name' => 'Áo Thun Thể Thao Tay Ngắn Beginner 05 Vol 24',
                'img' => '/img/ao-thun/ao-thun-5.jpg',
                'price' => rand(100000, 200000),
                'category_id' => 1,
                'description_id' => 1
            ],
            [
                'name' => 'Áo Thun Thể Thao Tay Ngắn Beginner 06 Vol 24',
                'img' => '/img/ao-thun/ao-thun-6.jpg',
                'price' => rand(100000, 200000),
                'category_id' => 1,
                'description_id' => 1
            ],
            [
                'name' => 'Áo Thun Thể Thao Tay Ngắn Beginner 07 Vol 24',
                'img' => '/img/ao-thun/ao-thun-7.jpg',
                'price' => rand(100000, 200000),
                'category_id' => 1,
                'description_id' => 1
            ],
            [
                'name' => 'Áo Polo Dáng Vừa Tay Ngắn The Minimalist 001',
                'img' => '/img/ao-thun/ao-thun-8.jpg',
                'price' => rand(100000, 200000),
                'category_id' => 1,
                'description_id' => 1
            ],
            [
                'name' => 'Áo Polo Dáng Vừa Tay Ngắn No Style 78 Vol 24',
                'img' => '/img/ao-thun/ao-thun-9.jpg',
                'price' => rand(100000, 200000),
                'category_id' => 1,
                'description_id' => 1
            ],
            [
                'name' => 'Áo Thun Thể Thao Tay Ngắn Beginner 10 Vol 24',
                'img' => '/img/ao-thun/ao-thun-10.jpg',
                'price' => rand(100000, 200000),
                'category_id' => 1,
                'description_id' => 1
            ],
            [
                'name' => 'Áo Khoác Chống Nắng Dáng Vừa Cool Touch 02 Vol 24',
                'img' => '/img/ao-khoac/ao-khoac-1.jpg',
                'price' => rand(250000, 650000),
                'category_id' => 2,
                'description_id' => 2
            ],
            [
                'name' => 'Áo Khoác Chống Nắng Dáng Vừa Beginner 09 Vol 24',
                'img' => '/img/ao-khoac/ao-khoac-2.jpg',
                'price' => rand(250000, 650000),
                'category_id' => 2,
                'description_id' => 2
            ],
            [
                'name' => 'Áo Khoác Chống Nắng Dáng Rộng Seventy Seven 07 Vol 24',
                'img' => '/img/ao-khoac/ao-khoac-3.jpg',
                'price' => rand(250000, 650000),
                'category_id' => 2,
                'description_id' => 2
            ],
            [
                'name' => 'Áo Khoác Chống Nắng Dáng Vừa Beginner 09 Vol 24',
                'img' => '/img/ao-khoac/ao-khoac-4.jpg',
                'price' => rand(250000, 650000),
                'category_id' => 2,
                'description_id' => 2
            ],
            [
                'name' => 'Áo Khoác Gió Dáng Rộng Seventy Seven 40 Vol 24',
                'img' => '/img/ao-khoac/ao-khoac-5.jpg',
                'price' => rand(250000, 650000),
                'category_id' => 2,
                'description_id' => 2
            ],
            [
                'name' => 'Áo Khoác Chống Nắng Dáng Rộng Seventy Seven 07 Vol 24',
                'img' => '/img/ao-khoac/ao-khoac-6.jpg',
                'price' => rand(250000, 650000),
                'category_id' => 2,
                'description_id' => 2
            ],
            [
                'name' => 'Áo Khoác Gió Dáng Rộng No Style M52 Vol 24',
                'img' => '/img/ao-khoac/ao-khoac-7.jpg',
                'price' => rand(250000, 650000),
                'category_id' => 2,
                'description_id' => 2
            ],
            [
                'name' => 'Áo Khoác Gió Dáng Rộng Seventy Seven 40 Vol 24',
                'img' => '/img/ao-khoac/ao-khoac-8.jpg',
                'price' => rand(250000, 650000),
                'category_id' => 2,
                'description_id' => 2
            ],
            [
                'name' => 'Áo Khoác Chống Nắng Dáng Rộng Seventy Seven 07 Vol 24',
                'img' => '/img/ao-khoac/ao-khoac-9.jpg',
                'price' => rand(250000, 650000),
                'category_id' => 2,
                'description_id' => 2
            ],
            [
                'name' => 'Áo Khoác Gió Dáng Rộng No Style M58 Vol 24',
                'img' => '/img/ao-khoac/ao-khoac-10.jpg',
                'price' => rand(250000, 650000),
                'category_id' => 2,
                'description_id' => 2
            ],
            [
                'name' => 'Áo Khoác Denim Dáng Vừa Seventy Seven 36 Vol 24',
                'img' => '/img/ao-khoac/ao-khoac-11.jpg',
                'price' => rand(250000, 650000),
                'category_id' => 2,
                'description_id' => 2
            ],
            [
                'name' => 'Áo Khoác Gió Dáng Vừa Non Branded 04 Vol 24',
                'img' => '/img/ao-khoac/ao-khoac-12.jpg',
                'price' => rand(250000, 650000),
                'category_id' => 2,
                'description_id' => 2
            ],
            [
                'name' => 'Áo Khoác Gió Dáng Rộng Seventy Seven 40 Vol 24',
                'img' => '/img/ao-khoac/ao-khoac-13.jpg',
                'price' => rand(250000, 650000),
                'category_id' => 2,
                'description_id' => 2
            ],
            [
                'name' => 'Áo Khoác Chống Nắng Dáng Rộng Seventy Seven 37 Vol 24',
                'img' => '/img/ao-khoac/ao-khoac-14.jpg',
                'price' => rand(250000, 650000),
                'category_id' => 2,
                'description_id' => 2
            ],
            [
                'name' => 'Áo Khoác Chống Nắng Dáng Rộng No Style M51 Vol 24',
                'img' => '/img/ao-khoac/ao-khoac-15.jpg',
                'price' => rand(250000, 650000),
                'category_id' => 2,
                'description_id' => 2
            ],
            [
                'name' => 'Áo Khoác Chống Nắng Dáng Vừa Cool Touch 02 Vol 24',
                'img' => '/img/ao-khoac/ao-khoac-16.jpg',
                'price' => rand(250000, 650000),
                'category_id' => 2,
                'description_id' => 2
            ],
            [
                'name' => 'Áo Polo Dáng Vừa Tay Ngắn The Minimalist 001',
                'img' => '/img/ao-thun-co-polo-tay-ngan/ao-thun-co-polo-tay-ngan-1.jpg',
                'price' => rand(150000, 300000),
                'category_id' => 3,
                'description_id' => 3
            ],
            [
                'name' => 'Áo Polo Dáng Vừa Tay Ngắn No Style 78 Vol 24',
                'img' => '/img/ao-thun-co-polo-tay-ngan/ao-thun-co-polo-tay-ngan-2.jpg',
                'price' => rand(150000, 300000),
                'category_id' => 3,
                'description_id' => 3
            ],
            [
                'name' => 'Áo Polo Dáng Vừa Tay Ngắn Non Branded 45',
                'img' => '/img/ao-thun-co-polo-tay-ngan/ao-thun-co-polo-tay-ngan-3.jpg',
                'price' => rand(150000, 300000),
                'category_id' => 3,
                'description_id' => 3
            ],
            [
                'name' => 'Áo Polo Dáng Vừa Tay Ngắn Non Branded 46',
                'img' => '/img/ao-thun-co-polo-tay-ngan/ao-thun-co-polo-tay-ngan-4.jpg',
                'price' => rand(150000, 300000),
                'category_id' => 3,
                'description_id' => 3
            ],
            [
                'name' => 'Áo Polo Dáng Vừa Tay Ngắn Non Branded 47',
                'img' => '/img/ao-thun-co-polo-tay-ngan/ao-thun-co-polo-tay-ngan-5.jpg',
                'price' => rand(150000, 300000),
                'category_id' => 3,
                'description_id' => 3
            ],
            [
                'name' => 'Áo Polo Dáng Vừa Tay Ngắn Non Branded 48',
                'img' => '/img/ao-thun-co-polo-tay-ngan/ao-thun-co-polo-tay-ngan-6.jpg',
                'price' => rand(150000, 300000),
                'category_id' => 3,
                'description_id' => 3
            ],
            [
                'name' => 'Áo Polo Dáng Vừa Tay Ngắn Non Branded 49',
                'img' => '/img/ao-thun-co-polo-tay-ngan/ao-thun-co-polo-tay-ngan-7.jpg',
                'price' => rand(150000, 300000),
                'category_id' => 3,
                'description_id' => 3
            ],
            [
                'name' => 'Áo Polo Dáng Vừa Tay Ngắn Non-Iron 06 Vol 24',
                'img' => '/img/ao-thun-co-polo-tay-ngan/ao-thun-co-polo-tay-ngan-8.jpg',
                'price' => rand(150000, 300000),
                'category_id' => 3,
                'description_id' => 3
            ],
            [
                'name' => 'Áo Polo Dáng Vừa Tay Ngắn Non-Iron 06 Vol 25',
                'img' => '/img/ao-thun-co-polo-tay-ngan/ao-thun-co-polo-tay-ngan-9.jpg',
                'price' => rand(150000, 300000),
                'category_id' => 3,
                'description_id' => 3
            ],
            [
                'name' => 'Áo Polo Dáng Vừa Tay Ngắn The Minimalist 002',
                'img' => '/img/ao-thun-co-polo-tay-ngan/ao-thun-co-polo-tay-ngan-10.jpg',
                'price' => rand(150000, 300000),
                'category_id' => 3,
                'description_id' => 3
            ],
            [
                'name' => 'Áo Polo Dáng Vừa Tay Ngắn The Minimalist 001',
                'img' => '/img/ao-thun-co-polo-tay-ngan/ao-thun-co-polo-tay-ngan-11.jpg',
                'price' => rand(150000, 300000),
                'category_id' => 3,
                'description_id' => 3
            ],
            [
                'name' => 'Áo Polo Dáng Vừa Tay Ngắn Non-Iron 06 Vol 19',
                'img' => '/img/ao-thun-co-polo-tay-ngan/ao-thun-co-polo-tay-ngan-12.jpg',
                'price' => rand(150000, 300000),
                'category_id' => 3,
                'description_id' => 3
            ],
            [
                'name' => 'Áo Polo Dáng Vừa Tay Ngắn Non-Iron 06 Vol 24',
                'img' => '/img/ao-thun-co-polo-tay-ngan/ao-thun-co-polo-tay-ngan-13.jpg',
                'price' => rand(150000, 300000),
                'category_id' => 3,
                'description_id' => 3
            ],
            [
                'name' => 'Áo Polo Dáng Vừa Tay Ngắn The Minimalist 001',
                'img' => '/img/ao-thun-co-polo-tay-ngan/ao-thun-co-polo-tay-ngan-14.jpg',
                'price' => rand(150000, 300000),
                'category_id' => 3,
                'description_id' => 3
            ],
            [
                'name' => 'Áo Polo Dáng Vừa Tay Ngắn Non Branded 02 Vol 24',
                'img' => '/img/ao-thun-co-polo-tay-ngan/ao-thun-co-polo-tay-ngan-15.jpg',
                'price' => rand(150000, 300000),
                'category_id' => 3,
                'description_id' => 3
            ],
            [
                'name' => 'Áo Sơ Mi Cổ Bẻ Tay Ngắn Dragon Ball Z, bền cao, thoáng mát, thấm hút tốt, ít nhăn, dễ ủi, thanh lịch trẻ
trung',
                'img' => '/img/ao-so-mi/ao-so-mi-1.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 4,
                'description_id' => 4
            ],
            [
                'name' => 'Áo Sơ Mi Cổ Bẻ tay dài sợi Hoa Hồng, kháng khuẩn giảm tia UV, ít nhăn, co giãn thoáng mát, sang trọng cá
tính.',
                'img' => '/img/ao-so-mi/ao-so-mi-2.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 4,
                'description_id' => 4
            ],
            [
                'name' => 'Áo Sơ Mi Cổ Bẻ tay dài sợi Hoa Hồng, kháng khuẩn giảm tia UV, ít nhăn, co giãn thoáng mát, sang trọng cá
tính. ',
                'img' => '/img/ao-so-mi/ao-so-mi-3.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 4,
                'description_id' => 4
            ],
            [
                'name' => 'Áo Sơ Mi Cổ Bẻ tay dài sợi Hoa Hồng, kháng khuẩn giảm tia UV, ít nhăn, co giãn thoáng mát, sang trọng cá
tính.',
                'img' => '/img/ao-so-mi/ao-so-mi-4.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 4,
                'description_id' => 4
            ],
            [
                'name' => 'Áo Sơ Mi Tay Ngắn ONE PIECE-WANO, linen gân mềm mại, túi trước ngực',
                'img' => '/img/ao-so-mi/ao-so-mi-5.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 4,
                'description_id' => 4
            ],
            [
                'name' => 'Áo Sơ Mi Tay Ngắn ONE PIECE-WANO, vải polyester trượt nước, cổ danton biến kiểu , in rubber',
                'img' => '/img/ao-so-mi/ao-so-mi-6.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 4,
                'description_id' => 4
            ],
            [
                'name' => 'Áo Sơ Mi Tay Ngắn ONE PIECE-WANO, vải polyester trượt nước, in rubber',
                'img' => '/img/ao-so-mi/ao-so-mi-7.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 4,
                'description_id' => 4
            ],
            [
                'name' => 'Áo Sơ Mi Tay Ngắn ONE PIECE-WANO, vải polyester trượt nước, cổ danton biến kiểu , in rubber',
                'img' => '/img/ao-so-mi/ao-so-mi-8.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 4,
                'description_id' => 4
            ],
            [
                'name' => 'Áo Sơ mi họa tiết Poly chống nhăn nhanh khô, độ bền cao, trẻ trung năng động',
                'img' => '/img/ao-so-mi/ao-so-mi-9.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 4,
                'description_id' => 4
            ],
            [
                'name' => 'Áo Sơ Mi Tay Ngăn Modal Fabric, mềm mỏng, nhanh khô, ít vón cục',
                'img' => '/img/ao-so-mi/ao-so-mi-10.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 4,
                'description_id' => 4
            ],
            [
                'name' => 'Áo Sơ Mi Tay Ngăn Modal Fabric, mềm mỏng, nhanh khô, ít vón cục',
                'img' => '/img/ao-so-mi/ao-so-mi-11.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 4,
                'description_id' => 4
            ],
            [
                'name' => 'Áo Sơ Mi Unisex Modal, mềm mịn, mỏng nhẹ, ít vón cục',
                'img' => '/img/ao-so-mi/ao-so-mi-12.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 4,
                'description_id' => 4
            ],
            [
                'name' => 'Áo Sơ Mi Họa Tiết Denim Poly độ bền tốt, chống mài mòn ít nhăn, nhanh khô, túi đắp cá tính',
                'img' => '/img/ao-so-mi/ao-so-mi-13.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 4,
                'description_id' => 4
            ],
            [
                'name' => 'Áo Sơ Mi họa tiết ít nhăn bền màu, Doraemon ngộ nghĩnh sắc nét',
                'img' => '/img/ao-so-mi/ao-so-mi-14.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 4,
                'description_id' => 4
            ],
            [
                'name' => 'Áo Sơ Mi Rayon Linen, thấm hút, mềm mại, ít nhăn, thoáng mát',
                'img' => '/img/ao-so-mi/ao-so-mi-15.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 4,
                'description_id' => 4
            ],
            [
                'name' => 'Quần Jean Slimfit Rách Basic Co giãn tốt, mềm mại, độ bền cao, Giữ form, thiết kế rách gối cá tính, trẻ
trung',
                'img' => '/img/quan-jeans/quan-jeans-1.jpg',
                'price' => rand(210000, 550000),
                'category_id' => 5,
                'description_id' => 5
            ],
            [
                'name' => 'Quần Jean Slimfit Rách Basic Co giãn tốt, mềm mại, độ bền cao, Giữ form, thiết kế rách gối cá tính, trẻ
trung',
                'img' => '/img/quan-jeans/quan-jeans-2.jpg',
                'price' => rand(210000, 550000),
                'category_id' => 5,
                'description_id' => 5
            ],
            [
                'name' => 'Quần Jean Slimfit Basic denim cotton thân thiện với môi trường, mềm mại, thấm hút co giãn tốt, đa dạng màu
sắc',
                'img' => '/img/quan-jeans/quan-jeans-3.jpg',
                'price' => rand(210000, 550000),
                'category_id' => 5,
                'description_id' => 5
            ],
            [
                'name' => 'Quần Jean Slimfit Basic denim cotton thân thiện với môi trường, mềm mại, thấm hút co giãn tốt, đa dạng màu
sắc',
                'img' => '/img/quan-jeans/quan-jeans-4.jpg',
                'price' => rand(210000, 550000),
                'category_id' => 5,
                'description_id' => 5
            ],
            [
                'name' => 'Quần Jean Slimfit Basic denim cotton thân thiện với môi trường, mềm mại, thấm hút co giãn tốt, đa dạng màu
sắc',
                'img' => '/img/quan-jeans/quan-jeans-5.jpg',
                'price' => rand(210000, 550000),
                'category_id' => 5,
                'description_id' => 5
            ],
            [
                'name' => 'Quần Jean Slimfit Basic denim cotton thân thiện với môi trường, mềm mại, thấm hút co giãn tốt, đa dạng màu
sắc',
                'img' => '/img/quan-jeans/quan-jeans-6.jpg',
                'price' => rand(210000, 550000),
                'category_id' => 5,
                'description_id' => 5
            ],
            [
                'name' => 'Quần Jean Slimfit Basic denim cotton thân thiện với môi trường, mềm mại, thấm hút co giãn tốt, đa dạng màu
sắc',
                'img' => '/img/quan-jeans/quan-jeans-7.jpg',
                'price' => rand(210000, 550000),
                'category_id' => 5,
                'description_id' => 5
            ],
            [
                'name' => 'Quần Jean Slimfit Basic denim cotton thân thiện với môi trường, mềm mại, thấm hút co giãn tốt, đa dạng màu
sắc',
                'img' => '/img/quan-jeans/quan-jeans-8.jpg',
                'price' => rand(210000, 550000),
                'category_id' => 5,
                'description_id' => 5
            ],
            [
                'name' => 'Quần Jean Slimfit phối da, co giãn, đứng form',
                'img' => '/img/quan-jeans/quan-jeans-9.jpg',
                'price' => rand(210000, 550000),
                'category_id' => 5,
                'description_id' => 5
            ],
            [
                'name' => 'Quần Jean Slimfit mềm mát, co giãn tốt, Wash nhẹ',
                'img' => '/img/quan-jeans/quan-jeans-10.jpg',
                'price' => rand(210000, 550000),
                'category_id' => 5,
                'description_id' => 5
            ],
            [
                'name' => 'Quần Jean Slimfit mềm mát, co giãn tốt, Wash nhẹ',
                'img' => '/img/quan-jeans/quan-jeans-11.jpg',
                'price' => rand(210000, 550000),
                'category_id' => 5,
                'description_id' => 5
            ],
            [
                'name' => 'Quần Jean Slimfit mềm mát, co giãn tốt, Wash nhẹ',
                'img' => '/img/quan-jeans/quan-jeans-12.jpg',
                'price' => rand(210000, 550000),
                'category_id' => 5,
                'description_id' => 5
            ],
            [
                'name' => 'Quần Short 11 Inch thân thiện với môi trường, thấm hút, thoáng khí, mềm mại, có độ co giãn, nhiều túi đa
năng, đa dạng màu sắc, bản quyền chính hãng',
                'img' => '/img/quan-short/quan-short-1.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 6,
                'description_id' => 6
            ],
            [
                'name' => 'Quần Short 11 Inch thân thiện với môi trường, thấm hút, thoáng khí, mềm mại, có độ co giãn, nhiều túi đa
năng, đa dạng màu sắc, bản quyền chính hãng',
                'img' => '/img/quan-short/quan-short-2.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 6,
                'description_id' => 6
            ],
            [
                'name' => 'Quần Short 11 Inch thân thiện với môi trường, thấm hút, thoáng khí, mềm mại, có độ co giãn, nhiều túi đa
năng, đa dạng màu sắc, bản quyền chính hãng',
                'img' => '/img/quan-short/quan-short-3.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 6,
                'description_id' => 6
            ],
            [
                'name' => 'Quần Short 11 Inch thân thiện với môi trường, thấm hút, thoáng khí, mềm mại, có độ co giãn, nhiều túi đa
năng, đa dạng màu sắc, bản quyền chính hãng',
                'img' => '/img/quan-short/quan-short-4.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 6,
                'description_id' => 6
            ],
            [
                'name' => 'Quần Short 11 Inch thân thiện với môi trường, thấm hút, thoáng khí, mềm mại, có độ co giãn, nhiều túi đa
năng, đa dạng màu sắc, bản quyền chính hãng',
                'img' => '/img/quan-short/quan-short-5.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 6,
                'description_id' => 6
            ],
            [
                'name' => 'Quần Short 11 Inch thân thiện với môi trường, thấm hút, thoáng khí, mềm mại, có độ co giãn, nhiều túi đa
năng, đa dạng màu sắc, bản quyền chính hãng',
                'img' => '/img/quan-short/quan-short-6.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 6,
                'description_id' => 6
            ],
            [
                'name' => 'Quần Short 5 Inch, dù mỏng nhẹ, xẻ lai hình chữ V,đai vắt khăn thông minh',
                'img' => '/img/quan-short/quan-short-7.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 6,
                'description_id' => 6
            ],
            [
                'name' => 'Quần Short 5 Inch, dù mỏng nhẹ, xẻ lai hình chữ V,đai vắt khăn thông minh',
                'img' => '/img/quan-short/quan-short-8.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 6,
                'description_id' => 6
            ],
            [
                'name' => 'Quần Short 7 Inch ONE PIECE-WANO, kaki bền , hình thêu 2D và nhãn PU, nhiều túi, ống rộng',
                'img' => '/img/quan-short/quan-short-9.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 6,
                'description_id' => 6
            ],
            [
                'name' => 'Quần Short 9 Inch ONE PIECE-WANO, Chất liệu Diamond Jacquard tạo hiệu ứng đẹp mắt cho bề mặt vải, hình thêu
2D sắc nét',
                'img' => '/img/quan-short/quan-short-10.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 6,
                'description_id' => 6
            ],
            [
                'name' => 'Quần Short 7 Inch ONE PIECE-WANO, Diamond jacquard woven có hiệu ứng bề mặt vân kim cương, túi sườn có dây
kéo, thêu 2D',
                'img' => '/img/quan-short/quan-short-11.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 6,
                'description_id' => 6
            ],
            [
                'name' => 'Quần Short 9 Inch Basic, mát lạnh, mềm mịn, co giãn tốt',
                'img' => '/img/quan-short/quan-short-12.jpg',
                'price' => rand(190000, 490000),
                'category_id' => 6,
                'description_id' => 6
            ]
        ];
        foreach ($products as $product) {
            $slug = Str::slug($product['name']);

            $count = 1;
            while (Product::where('slug', $slug)->exists()) {
                $slug = Str::slug($product['name']) . '-' . $count++;
            }

            $product['slug'] = $slug;
            $product['sku'] = '#' . str_pad(rand(1, 9999999), 7, '0', STR_PAD_LEFT);
            Product::firstOrCreate(
                // [
                //     'sku' => $product['sku'],
                // ],
                $product
            );
        }
    }
}
