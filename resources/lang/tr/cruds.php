<?php

return [
    'userManagement' => [
        'title'          => 'Kullanıcı Yönetimi',
        'title_singular' => 'Kullanıcı Yönetimi',
    ],
    'permission' => [
        'title'          => 'İzinler',
        'title_singular' => 'İzin',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roller',
        'title_singular' => 'Rol',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Kullanıcılar',
        'title_singular' => 'Kullanıcı',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'siteProperty' => [
        'title'          => 'Site Properties',
        'title_singular' => 'Site Property',
    ],
    'customerAction' => [
        'title'          => 'Customer Actions',
        'title_singular' => 'Customer Action',
    ],
    'customer' => [
        'title'          => 'Customers',
        'title_singular' => 'Customer',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'name'                 => 'Name',
            'name_helper'          => ' ',
            'surname'              => 'Surname',
            'surname_helper'       => ' ',
            'date_of_birth'        => 'Date Of Birth',
            'date_of_birth_helper' => ' ',
            'phone'                => 'Phone',
            'phone_helper'         => ' ',
            'email'                => 'Email',
            'email_helper'         => ' ',
            'password'             => 'Password',
            'password_helper'      => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'address'              => 'Address',
            'address_helper'       => ' ',
        ],
    ],
    'customerOrder' => [
        'title'          => 'Customer Orders',
        'title_singular' => 'Customer Order',
    ],
    'customerReview' => [
        'title'          => 'Customer Reviews',
        'title_singular' => 'Customer Review',
    ],
    'customerFavorite' => [
        'title'          => 'Customer Favorites',
        'title_singular' => 'Customer Favorite',
    ],
    'productAction' => [
        'title'          => 'Product Actions',
        'title_singular' => 'Product Action',
    ],
    'product' => [
        'title'          => 'Products',
        'title_singular' => 'Product',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'name'                 => 'Name',
            'name_helper'          => ' ',
            'description'          => 'Description',
            'description_helper'   => ' ',
            'price'                => 'Price',
            'price_helper'         => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'category_uuid'        => 'Category',
            'category_uuid_helper' => ' ',
            'status_uuid'          => 'Status',
            'status_uuid_helper'   => ' ',
        ],
    ],
    'productCategory' => [
        'title'          => 'Product Categories',
        'title_singular' => 'Product Category',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'category_name'        => 'Category Name',
            'category_name_helper' => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'orderAction' => [
        'title'          => 'Order Actions',
        'title_singular' => 'Order Action',
    ],
    'saleAction' => [
        'title'          => 'Sale Actions',
        'title_singular' => 'Sale Action',
    ],
    'customerAddress' => [
        'title'          => 'Customer Address',
        'title_singular' => 'Customer Address',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'customer_uuid'        => 'Customer Uuid',
            'customer_uuid_helper' => ' ',
            'province'             => 'Province',
            'province_helper'      => ' ',
            'district'             => 'District',
            'district_helper'      => ' ',
            'quarter'              => 'Quarter',
            'quarter_helper'       => ' ',
            'street'               => 'Street',
            'street_helper'        => ' ',
            'address'              => 'Address',
            'address_helper'       => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'order' => [
        'title'          => 'Orders',
        'title_singular' => 'Order',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'products_uuid'        => 'Products',
            'products_uuid_helper' => ' ',
            'customer_uuid'        => 'Customer',
            'customer_uuid_helper' => ' ',
            'address_uuid'         => 'Address',
            'address_uuid_helper'  => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'price'                => 'Price',
            'price_helper'         => ' ',
            'order_name'           => 'Order Name',
            'order_name_helper'    => ' ',
        ],
    ],
    'saleSituation' => [
        'title'          => 'Sale Situations',
        'title_singular' => 'Sale Situation',
    ],
    'shoppingCart' => [
        'title'          => 'Shopping Cart',
        'title_singular' => 'Shopping Cart',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'customer_uuid'        => 'Customer',
            'customer_uuid_helper' => ' ',
            'product_uuid'         => 'Product',
            'product_uuid_helper'  => ' ',
            'quantity'             => 'Quantity',
            'quantity_helper'      => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'productStatus' => [
        'title'          => 'Product Statuses',
        'title_singular' => 'Product Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'productDetail' => [
        'title'          => 'Product Details',
        'title_singular' => 'Product Detail',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'product_uuid'        => 'Product',
            'product_uuid_helper' => ' ',
            'details'             => 'Details',
            'details_helper'      => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'reviewAction' => [
        'title'          => 'Review Actions',
        'title_singular' => 'Review Action',
    ],
    'review' => [
        'title'          => 'Reviews',
        'title_singular' => 'Review',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'customer_uuid'        => 'Customer',
            'customer_uuid_helper' => ' ',
            'product_uuid'         => 'Product',
            'product_uuid_helper'  => ' ',
            'rate_score'           => 'Rate Score',
            'rate_score_helper'    => ' ',
            'review'               => 'Review',
            'review_helper'        => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'attachment'           => 'Attachment',
            'attachment_helper'    => ' ',
        ],
    ],
    'reviewAttachment' => [
        'title'          => 'Review Attachments',
        'title_singular' => 'Review Attachment',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'location'          => 'Location',
            'location_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'attachment'        => 'Attachment',
            'attachment_helper' => ' ',
        ],
    ],
    'favoriteAction' => [
        'title'          => 'Favorite Actions',
        'title_singular' => 'Favorite Action',
    ],
    'favorite' => [
        'title'          => 'Favorites',
        'title_singular' => 'Favorite',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'customer_uuid'        => 'Customer',
            'customer_uuid_helper' => ' ',
            'product_uuid'         => 'Product',
            'product_uuid_helper'  => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'banner' => [
        'title'          => 'Banners',
        'title_singular' => 'Banner',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'key'               => 'Key',
            'key_helper'        => ' ',
            'banner'            => 'Banner',
            'banner_helper'     => ' ',
            'link_url'          => 'Link Url',
            'link_url_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'video' => [
        'title'          => 'Videos',
        'title_singular' => 'Video',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'description'        => 'Video Description',
            'description_helper' => ' ',
            'type'               => 'Video Type',
            'type_helper'        => ' ',
            'file'               => 'Video File',
            'file_helper'        => 'Max video file size is 10 mb.',
            'video'              => 'Video Id',
            'video_helper'       => 'The part at the end of the URL on sites such as Youtube, Vimeo. e.g (etc. b1WhlOISRt0, 415423599)',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'videoType' => [
        'title'          => 'Video Types',
        'title_singular' => 'Video Type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'video_type'        => 'Video Type',
            'video_type_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'faqCategory' => [
        'title'          => 'FAQ Categories',
        'title_singular' => 'FAQ Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'category'          => 'Category',
            'category_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'sorting'           => 'Sorting',
            'sorting_helper'    => ' ',
        ],
    ],
    'faq' => [
        'title'          => 'Frequently Asked Questions',
        'title_singular' => 'Frequently Asked Question',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'category'          => 'Category',
            'category_helper'   => ' ',
            'question'          => 'Question',
            'question_helper'   => ' ',
            'answer'            => 'Answer',
            'answer_helper'     => ' ',
            'sorting'           => 'Sorting',
            'sorting_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'campaignAction' => [
        'title'          => 'Campaign Actions',
        'title_singular' => 'Campaign Action',
    ],
    'campaign' => [
        'title'          => 'Campaigns',
        'title_singular' => 'Campaign',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'name'                 => 'Name',
            'name_helper'          => ' ',
            'description'          => 'Description',
            'description_helper'   => ' ',
            'customer_uuid'        => 'Customer',
            'customer_uuid_helper' => ' ',
            'product_uuid'         => 'Product',
            'product_uuid_helper'  => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'staticContent' => [
        'title'          => 'Static Contents',
        'title_singular' => 'Static Content',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'key'                 => 'Key',
            'key_helper'          => ' ',
            'title'               => 'Title',
            'title_helper'        => ' ',
            'html_content'        => 'Html Content',
            'html_content_helper' => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
];
