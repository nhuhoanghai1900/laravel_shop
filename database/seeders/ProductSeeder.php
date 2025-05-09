<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            //
        ];

        foreach ($products as $product) {
            // Tạo slug từ tên sản phẩm
            $slug = Str::slug($product['name']);
            // Kiểm tra xem slug đã tồn tại chưa
            $original_slug = $slug;
            $count = 1;
            // Thêm số đếm vào slug nếu cần thiết để đảm bảo tính duy nhất
            while (Product::where('slug', $slug)->exists()) {
                $slug = "{$original_slug}-{$count}";
                $count++;
            }
            $product['slug'] = $slug;

            Product::create($product);
        }
    }
}
