[33mcommit 0a38acf1fdda9ae4ec46a84b97e92a78a7c30ca1[m[33m ([m[1;36mHEAD[m[33m -> [m[1;32mmain[m[33m)[m
Author: Nhữ Hoàng Hải <nhuhoanghai1900@gmail.com>
Date:   Mon May 19 17:58:22 2025 +0700

    Add order status management: update Order model to include status field; enhance OrderAdminController to prioritize order status; modify views to display order status in listings and details.

[33mcommit af94fd3e76568bb121d6868286c2d284ecb83cb2[m
Author: Nhữ Hoàng Hải <nhuhoanghai1900@gmail.com>
Date:   Mon May 19 16:40:59 2025 +0700

    Implement order management enhancements: update OrderAdminController to group orders by customer; add show method for individual order details; modify routes for order display; enhance views for order listing and details.

[33mcommit a7aed8815c5d6ff67ccb61676833429023be76c5[m
Author: Nhữ Hoàng Hải <nhuhoanghai1900@gmail.com>
Date:   Mon May 19 10:03:53 2025 +0700

    Implement order details view: add show method in OrderAdminController; update routes for order details; create show view for displaying individual order information.

[33mcommit 08d126032160d3b81d79b357749fd9d2cffcf065[m
Author: Nhữ Hoàng Hải <nhuhoanghai1900@gmail.com>
Date:   Sun May 18 20:04:59 2025 +0700

    Implement admin order management: create OrderAdminController for order listing; add routes for admin orders; create view for displaying orders with sample data; update JavaScript for cart reset after order submission; adjust configuration for cache settings.

[33mcommit 02891e87b7904f2987b524ea9633c9b964a5fb52[m
Author: Nhữ Hoàng Hải <nhuhoanghai1900@gmail.com>
Date:   Sun May 18 16:36:11 2025 +0700

    Enhance order and cart functionality: update CartController to calculate subtotals, improve session handling, and add debug logging; modify OrderController to prevent duplicate orders and validate cart items; implement success modal in order handling; adjust routes for order throttling.

[33mcommit fced3e575f0267008de6dfc179cbf42b7158ddac[m
Author: Nhữ Hoàng Hải <nhuhoanghai1900@gmail.com>
Date:   Sun May 18 10:08:21 2025 +0700

    Implement order items functionality: create OrderItem model and migration for order_items table; establish relationships between Order and OrderItem models; update JavaScript to reset total price on order submission.

[33mcommit 718d139778373832ca5fff4d6053c5dbadb1fd72[m
Author: Nhữ Hoàng Hải <nhuhoanghai1900@gmail.com>
Date:   Sat May 17 21:35:11 2025 +0700

    Implement order processing functionality: create OrderController to handle order submissions, validate user input, and manage cart sessions; add Order model and migration for orders table; update routes for order processing; enhance cart view with order form and validation.

[33mcommit 8e8775a2fb8bd0f6645538d9b57851e688c88a74[m
Author: Nhữ Hoàng Hải <nhuhoanghai1900@gmail.com>
Date:   Sat May 17 15:51:19 2025 +0700

    Enhance cart functionality: log cart details for debugging, calculate total quantity, and display subtotal for each item in the cart view; update Debugbar configuration to disable in production.

[33mcommit 54bdfa9abba8c8a813df1fb96d3f104106f2c227[m
Author: Nhữ Hoàng Hải <nhuhoanghai1900@gmail.com>
Date:   Sat May 17 13:44:56 2025 +0700

    Refactor code structure for improved readability and maintainability

[33mcommit fe337296cc35f2db3d59918be05399e1717eb88f[m
Author: Nhữ Hoàng Hải <nhuhoanghai1900@gmail.com>
Date:   Fri May 16 20:08:28 2025 +0700

    Implement cart functionality: enhance CartController to calculate total price and quantity, update cart view, and add debug support; integrate Debugbar for debugging; update JavaScript for cart operations; modify styles for product display.

[33mcommit 080874b8d3529ffcafd89bccbfdeb77f40867880[m
Author: Nhữ Hoàng Hải <nhuhoanghai1900@gmail.com>
Date:   Thu May 15 23:09:37 2025 +0700

    Implement shopping cart functionality: add CartController, update routes, and create cart views; enhance product details with color and size selection

[33mcommit f74403603b33bdbe52c9041eb2f2426c74f44db0[m
Author: Nhữ Hoàng Hải <nhuhoanghai1900@gmail.com>
Date:   Tue May 13 13:40:18 2025 +0700

    Update product migration and description seeder: make SKU unique, enhance seeder logic with multiple product descriptions

[33mcommit 2373e4e85291d0ab56963be24ef6083d02665cdc[m
Author: Nhữ Hoàng Hải <nhuhoanghai1900@gmail.com>
Date:   Tue May 13 11:54:44 2025 +0700

    Update database migrations and seeders: enforce unique content in descriptions, set default values for product color and size, and refactor seeder logic for categories and users.

[33mcommit 32c9ae121a3984c579a98ad3643ee3b16992b087[m
Author: Nhữ Hoàng Hải <nhuhoanghai1900@gmail.com>
Date:   Tue May 13 09:46:14 2025 +0700

    Implement product detail view and update routing; remove unused GitHub Actions workflow

[33mcommit f589e8f089ac135fd4a86af4988ae2bbfedddf02[m
Author: Nhữ Hoàng Hải <nhuhoanghai1900@gmail.com>
Date:   Mon May 12 18:30:18 2025 +0700

    Refactor product model and migration to include color, size, and SKU fields; add description model and relationships

[33mcommit 383bc9db606ef2c00c00b5a8384fe15488ac91a4[m
Author: Nhữ Hoàng Hải <nhuhoanghai1900@gmail.com>
Date:   Fri May 9 16:43:11 2025 +0700

    Create laravel.yml

[33mcommit f90a9f49056cc7edde81562b6122d974c3b08266[m
Author: Nhữ Hoàng Hải <nhuhoanghai1900@gmail.com>
Date:   Fri May 9 16:41:35 2025 +0700

    [1]  Add initial project structure with basic configurations and models
