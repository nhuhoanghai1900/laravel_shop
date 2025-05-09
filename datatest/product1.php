$products = [
[
'name' => 'Áo Thun Thể Thao Tay Ngắn Beginner 01 Vol 24',
'img' => '/img/ao-thun/ao-thun-1.jpg',
'des' => '',
'price' => 150000,
'category_id' => 1
],
[
'name' => 'Áo Thun Thể Thao Tay Ngắn Beginner 01 Vol 24',
'img' => '/img/ao-thun/ao-thun-2.jpg',
'des' => '',
'price' => rand(100000, 200000),
'category_id' => 1
],
[
'name' => 'Áo Thun 3 Lỗ Thể Thao Beginner 03 Vol 24',
'img' => '/img/ao-thun/ao-thun-3.jpg',
'des' => '',
'price' => rand(100000, 200000),
'category_id' => 1
],
[
'name' => 'Áo Thun Thể Thao Tay Ngắn Beginner 01 Vol 24',
'img' => '/img/ao-thun/ao-thun-4.jpg',
'des' => '',
'price' => rand(100000, 200000),
'category_id' => 1
],
[
'name' => 'Áo Thun Thể Thao Tay Ngắn Beginner 05 Vol 24',
'img' => '/img/ao-thun/ao-thun-5.jpg',
'des' => '',
'price' => rand(100000, 200000),
'category_id' => 1
],
[
'name' => 'Áo Thun Thể Thao Tay Ngắn Beginner 06 Vol 24',
'img' => '/img/ao-thun/ao-thun-6.jpg',
'des' => '',
'price' => rand(100000, 200000),
'category_id' => 1
],
[
'name' => 'Áo Thun Thể Thao Tay Ngắn Beginner 07 Vol 24',
'img' => '/img/ao-thun/ao-thun-7.jpg',
'des' => '',
'price' => rand(100000, 200000),
'category_id' => 1
],
[
'name' => 'Áo Polo Dáng Vừa Tay Ngắn The Minimalist 001',
'img' => '/img/ao-thun/ao-thun-8.jpg',
'des' => '',
'price' => rand(100000, 200000),
'category_id' => 1
],
[
'name' => 'Áo Polo Dáng Vừa Tay Ngắn No Style 78 Vol 24',
'img' => '/img/ao-thun/ao-thun-9.jpg',
'des' => '',
'price' => rand(100000, 200000),
'category_id' => 1
],
[
'name' => 'Áo Thun Thể Thao Tay Ngắn Beginner 10 Vol 24',
'img' => '/img/ao-thun/ao-thun-10.jpg',
'des' => '',
'price' => rand(100000, 200000),
'category_id' => 1
]
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