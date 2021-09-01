<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'site_property_access',
            ],
            [
                'id'    => 18,
                'title' => 'customer_action_access',
            ],
            [
                'id'    => 19,
                'title' => 'customer_create',
            ],
            [
                'id'    => 20,
                'title' => 'customer_edit',
            ],
            [
                'id'    => 21,
                'title' => 'customer_show',
            ],
            [
                'id'    => 22,
                'title' => 'customer_delete',
            ],
            [
                'id'    => 23,
                'title' => 'customer_access',
            ],
            [
                'id'    => 24,
                'title' => 'customer_order_create',
            ],
            [
                'id'    => 25,
                'title' => 'customer_order_edit',
            ],
            [
                'id'    => 26,
                'title' => 'customer_order_show',
            ],
            [
                'id'    => 27,
                'title' => 'customer_order_delete',
            ],
            [
                'id'    => 28,
                'title' => 'customer_order_access',
            ],
            [
                'id'    => 29,
                'title' => 'customer_review_create',
            ],
            [
                'id'    => 30,
                'title' => 'customer_review_edit',
            ],
            [
                'id'    => 31,
                'title' => 'customer_review_show',
            ],
            [
                'id'    => 32,
                'title' => 'customer_review_delete',
            ],
            [
                'id'    => 33,
                'title' => 'customer_review_access',
            ],
            [
                'id'    => 34,
                'title' => 'customer_favorite_create',
            ],
            [
                'id'    => 35,
                'title' => 'customer_favorite_edit',
            ],
            [
                'id'    => 36,
                'title' => 'customer_favorite_show',
            ],
            [
                'id'    => 37,
                'title' => 'customer_favorite_delete',
            ],
            [
                'id'    => 38,
                'title' => 'customer_favorite_access',
            ],
            [
                'id'    => 39,
                'title' => 'product_action_access',
            ],
            [
                'id'    => 40,
                'title' => 'product_create',
            ],
            [
                'id'    => 41,
                'title' => 'product_edit',
            ],
            [
                'id'    => 42,
                'title' => 'product_show',
            ],
            [
                'id'    => 43,
                'title' => 'product_delete',
            ],
            [
                'id'    => 44,
                'title' => 'product_access',
            ],
            [
                'id'    => 45,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 46,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 47,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 48,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 49,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 50,
                'title' => 'order_action_access',
            ],
            [
                'id'    => 51,
                'title' => 'sale_action_access',
            ],
            [
                'id'    => 52,
                'title' => 'customer_address_create',
            ],
            [
                'id'    => 53,
                'title' => 'customer_address_edit',
            ],
            [
                'id'    => 54,
                'title' => 'customer_address_show',
            ],
            [
                'id'    => 55,
                'title' => 'customer_address_delete',
            ],
            [
                'id'    => 56,
                'title' => 'customer_address_access',
            ],
            [
                'id'    => 57,
                'title' => 'order_create',
            ],
            [
                'id'    => 58,
                'title' => 'order_edit',
            ],
            [
                'id'    => 59,
                'title' => 'order_show',
            ],
            [
                'id'    => 60,
                'title' => 'order_delete',
            ],
            [
                'id'    => 61,
                'title' => 'order_access',
            ],
            [
                'id'    => 62,
                'title' => 'sale_situation_create',
            ],
            [
                'id'    => 63,
                'title' => 'sale_situation_edit',
            ],
            [
                'id'    => 64,
                'title' => 'sale_situation_show',
            ],
            [
                'id'    => 65,
                'title' => 'sale_situation_delete',
            ],
            [
                'id'    => 66,
                'title' => 'sale_situation_access',
            ],
            [
                'id'    => 67,
                'title' => 'shopping_cart_create',
            ],
            [
                'id'    => 68,
                'title' => 'shopping_cart_edit',
            ],
            [
                'id'    => 69,
                'title' => 'shopping_cart_show',
            ],
            [
                'id'    => 70,
                'title' => 'shopping_cart_delete',
            ],
            [
                'id'    => 71,
                'title' => 'shopping_cart_access',
            ],
            [
                'id'    => 72,
                'title' => 'product_status_create',
            ],
            [
                'id'    => 73,
                'title' => 'product_status_edit',
            ],
            [
                'id'    => 74,
                'title' => 'product_status_show',
            ],
            [
                'id'    => 75,
                'title' => 'product_status_delete',
            ],
            [
                'id'    => 76,
                'title' => 'product_status_access',
            ],
            [
                'id'    => 77,
                'title' => 'product_detail_create',
            ],
            [
                'id'    => 78,
                'title' => 'product_detail_edit',
            ],
            [
                'id'    => 79,
                'title' => 'product_detail_show',
            ],
            [
                'id'    => 80,
                'title' => 'product_detail_delete',
            ],
            [
                'id'    => 81,
                'title' => 'product_detail_access',
            ],
            [
                'id'    => 82,
                'title' => 'review_action_access',
            ],
            [
                'id'    => 83,
                'title' => 'review_create',
            ],
            [
                'id'    => 84,
                'title' => 'review_edit',
            ],
            [
                'id'    => 85,
                'title' => 'review_show',
            ],
            [
                'id'    => 86,
                'title' => 'review_delete',
            ],
            [
                'id'    => 87,
                'title' => 'review_access',
            ],
            [
                'id'    => 88,
                'title' => 'review_attachment_create',
            ],
            [
                'id'    => 89,
                'title' => 'review_attachment_edit',
            ],
            [
                'id'    => 90,
                'title' => 'review_attachment_show',
            ],
            [
                'id'    => 91,
                'title' => 'review_attachment_delete',
            ],
            [
                'id'    => 92,
                'title' => 'review_attachment_access',
            ],
            [
                'id'    => 93,
                'title' => 'favorite_action_access',
            ],
            [
                'id'    => 94,
                'title' => 'favorite_create',
            ],
            [
                'id'    => 95,
                'title' => 'favorite_edit',
            ],
            [
                'id'    => 96,
                'title' => 'favorite_show',
            ],
            [
                'id'    => 97,
                'title' => 'favorite_delete',
            ],
            [
                'id'    => 98,
                'title' => 'favorite_access',
            ],
            [
                'id'    => 99,
                'title' => 'banner_create',
            ],
            [
                'id'    => 100,
                'title' => 'banner_edit',
            ],
            [
                'id'    => 101,
                'title' => 'banner_show',
            ],
            [
                'id'    => 102,
                'title' => 'banner_delete',
            ],
            [
                'id'    => 103,
                'title' => 'banner_access',
            ],
            [
                'id'    => 104,
                'title' => 'video_create',
            ],
            [
                'id'    => 105,
                'title' => 'video_edit',
            ],
            [
                'id'    => 106,
                'title' => 'video_show',
            ],
            [
                'id'    => 107,
                'title' => 'video_delete',
            ],
            [
                'id'    => 108,
                'title' => 'video_access',
            ],
            [
                'id'    => 109,
                'title' => 'video_type_create',
            ],
            [
                'id'    => 110,
                'title' => 'video_type_edit',
            ],
            [
                'id'    => 111,
                'title' => 'video_type_show',
            ],
            [
                'id'    => 112,
                'title' => 'video_type_delete',
            ],
            [
                'id'    => 113,
                'title' => 'video_type_access',
            ],
            [
                'id'    => 114,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 115,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 116,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 117,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 118,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 119,
                'title' => 'faq_create',
            ],
            [
                'id'    => 120,
                'title' => 'faq_edit',
            ],
            [
                'id'    => 121,
                'title' => 'faq_show',
            ],
            [
                'id'    => 122,
                'title' => 'faq_delete',
            ],
            [
                'id'    => 123,
                'title' => 'faq_access',
            ],
            [
                'id'    => 124,
                'title' => 'campaign_action_access',
            ],
            [
                'id'    => 125,
                'title' => 'campaign_create',
            ],
            [
                'id'    => 126,
                'title' => 'campaign_edit',
            ],
            [
                'id'    => 127,
                'title' => 'campaign_show',
            ],
            [
                'id'    => 128,
                'title' => 'campaign_delete',
            ],
            [
                'id'    => 129,
                'title' => 'campaign_access',
            ],
            [
                'id'    => 130,
                'title' => 'static_content_create',
            ],
            [
                'id'    => 131,
                'title' => 'static_content_edit',
            ],
            [
                'id'    => 132,
                'title' => 'static_content_show',
            ],
            [
                'id'    => 133,
                'title' => 'static_content_delete',
            ],
            [
                'id'    => 134,
                'title' => 'static_content_access',
            ],
            [
                'id'    => 135,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
