<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Áo Thun',
                'slug' => 'ao-thun',
                'img' => '/img/Categories/category-1.jpg',
                'des' => 'CHỈ TỪ 70K',
            ],
            [
                'name' => 'Áo Khoác',
                'slug' => 'ao-khoac',
                'img' => '/img/Categories/category-2.jpg',
                'des' => 'MỀM MỊN MÁT',
            ],
            [
                'name' => 'Áo Thun Cổ Polo Tay Ngắn',
                'slug' => 'ao-thun-co-polo-tay-ngan',
                'img' => '/img/Categories/category-3.jpg',
                'des' => 'CÔNG NGHỆ CAO',
            ],
            [
                'name' => 'Áo Sơ Mi',
                'slug' => 'ao-so-mi',
                'img' => '/img/Categories/category-4.jpg',
                'des' => 'LÀ SƯỚNG',
            ],
            [
                'name' => 'Quần Jeans Slim Fit',
                'slug' => 'quan-jeans',
                'img' => '/img/Categories/category-5.jpg',
                'des' => 'ĐA DẠNG SIZE',
            ],
            [
                'name' => 'Quần Short',
                'slug' => 'quan-short',
                'img' => '/img/Categories/category-6.jpg',
                'des' => 'CÁ NHÂN HÓA',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

    }
}
