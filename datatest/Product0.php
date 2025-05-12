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

/////////////////////////////////////

$products = Product::all();

foreach ($products as $product) {
$product->update([
'color' => 'Đen/Trắng/Xanh',
'size' => 'M/L/XL/XXL',
'sku' => '#' . str_pad(rand(1, 999999999), 7, '0', STR_PAD_LEFT),
]);
}