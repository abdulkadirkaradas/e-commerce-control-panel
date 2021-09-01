<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('site_property_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/static-contents*") ? "c-show" : "" }} {{ request()->is("admin/banners*") ? "c-show" : "" }} {{ request()->is("admin/videos*") ? "c-show" : "" }} {{ request()->is("admin/video-types*") ? "c-show" : "" }} {{ request()->is("admin/faq-categories*") ? "c-show" : "" }} {{ request()->is("admin/faqs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-paperclip c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.siteProperty.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('static_content_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.static-contents.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/static-contents") || request()->is("admin/static-contents/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-align-left c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.staticContent.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('banner_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.banners.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/banners") || request()->is("admin/banners/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-image c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.banner.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('video_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.videos.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/videos") || request()->is("admin/videos/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-youtube c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.video.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('video_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.video-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/video-types") || request()->is("admin/video-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-file-video c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.videoType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('faq_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.faq-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/faq-categories") || request()->is("admin/faq-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-question-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.faqCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('faq_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.faqs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/faqs") || request()->is("admin/faqs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-question c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.faq.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('customer_action_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/customers*") ? "c-show" : "" }} {{ request()->is("admin/customer-addresses*") ? "c-show" : "" }} {{ request()->is("admin/customer-orders*") ? "c-show" : "" }} {{ request()->is("admin/customer-reviews*") ? "c-show" : "" }} {{ request()->is("admin/customer-favorites*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-user-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.customerAction.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('customer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.customers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/customers") || request()->is("admin/customers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-check c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.customer.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('customer_address_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.customer-addresses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/customer-addresses") || request()->is("admin/customer-addresses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-map-marker-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.customerAddress.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('customer_order_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.customer-orders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/customer-orders") || request()->is("admin/customer-orders/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-shopping-basket c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.customerOrder.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('customer_review_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.customer-reviews.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/customer-reviews") || request()->is("admin/customer-reviews/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-mobile-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.customerReview.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('customer_favorite_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.customer-favorites.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/customer-favorites") || request()->is("admin/customer-favorites/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-heart c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.customerFavorite.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('product_action_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/products*") ? "c-show" : "" }} {{ request()->is("admin/product-details*") ? "c-show" : "" }} {{ request()->is("admin/product-statuses*") ? "c-show" : "" }} {{ request()->is("admin/product-categories*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cart-plus c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.productAction.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('product_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.products.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/products") || request()->is("admin/products/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-shopping-cart c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.product.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('product_detail_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.product-details.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/product-details") || request()->is("admin/product-details/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-tags c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.productDetail.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('product_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.product-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/product-statuses") || request()->is("admin/product-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-box-open c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.productStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('product_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.product-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/product-categories") || request()->is("admin/product-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-th-large c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.productCategory.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('order_action_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/orders*") ? "c-show" : "" }} {{ request()->is("admin/shopping-carts*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-luggage-cart c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.orderAction.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('order_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.orders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/orders") || request()->is("admin/orders/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cart-arrow-down c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.order.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('shopping_cart_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.shopping-carts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/shopping-carts") || request()->is("admin/shopping-carts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-shopping-bag c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.shoppingCart.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('review_action_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/reviews*") ? "c-show" : "" }} {{ request()->is("admin/review-attachments*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-mobile c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.reviewAction.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('review_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.reviews.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reviews") || request()->is("admin/reviews/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-mobile-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.review.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('review_attachment_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.review-attachments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/review-attachments") || request()->is("admin/review-attachments/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-paperclip c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reviewAttachment.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('favorite_action_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/favorites*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-heart c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.favoriteAction.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('favorite_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.favorites.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/favorites") || request()->is("admin/favorites/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-heart c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.favorite.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('campaign_action_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/campaigns*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-bullhorn c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.campaignAction.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('campaign_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.campaigns.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/campaigns") || request()->is("admin/campaigns/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-bullhorn c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.campaign.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('sale_action_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/sale-situations*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-tag c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.saleAction.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('sale_situation_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sale-situations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sale-situations") || request()->is("admin/sale-situations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-tag c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.saleSituation.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
