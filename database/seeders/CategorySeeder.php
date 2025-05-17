<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->truncate();
        $categories = [
            [
                'name' => 'Áo Thun',
                'img' => '/img/Categories/category-1.jpg',
                'des' => 'CHỈ TỪ 70K',
                'type' => 'quan-ao'
            ],
            [
                'name' => 'Áo Khoác',
                'img' => '/img/Categories/category-2.jpg',
                'des' => 'MỀM MỊN MÁT',
                'type' => 'quan-ao'
            ],
            [
                'name' => 'Áo Thun Cổ Polo Tay Ngắn',
                'img' => '/img/Categories/category-3.jpg',
                'des' => 'CÔNG NGHỆ CAO',
                'type' => 'quan-ao'
            ],
            [
                'name' => 'Áo Sơ Mi',
                'img' => '/img/Categories/category-4.jpg',
                'des' => 'LÀ SƯỚNG',
                'type' => 'quan-ao'
            ],
            [
                'name' => 'Quần Jeans Slim Fit',
                'img' => '/img/Categories/category-5.jpg',
                'des' => 'ĐA DẠNG SIZE',
                'type' => 'quan-ao'
            ],
            [
                'name' => 'Quần Short',
                'img' => '/img/Categories/category-6.jpg',
                'des' => 'CÁ NHÂN HÓA',
                'type' => 'quan-ao'
            ],
            [
                'name' => 'Nón',
                'type' => 'phu-kien'
            ],
            [
                'name' => 'Ví',
                'type' => 'phu-kien'
            ],
            [
                'name' => 'Giây nịt',
                'type' => 'phu-kien'
            ],
            [
                'name' => 'Giày',
                'type' => 'phu-kien'
            ],
        ];

        foreach ($categories as $category) {
            $slug = Str::slug($category['name']);
            $category['slug'] = $slug;
            Category::firstOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }

    }
}
