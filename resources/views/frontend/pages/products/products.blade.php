@extends('frontend.frontend-page-master')
@section('site-title')
    {{ get_static_option('product_page_' . $user_select_lang_slug . '_name') }}
@endsection
@section('page-title')
    {{ get_static_option('product_page_' . $user_select_lang_slug . '_name') }}
@endsection
@section('page-meta-data')
    <meta name="description"
        content="{{ get_static_option('product_page_' . $user_select_lang_slug . '_meta_description') }}">
    <meta name="tags" content="{{ get_static_option('product_page_' . $user_select_lang_slug . '_meta_tags') }}">
    {!! render_og_meta_image_by_attachment_id(
        get_static_option('product_page_' . $user_select_lang_slug . '_meta_image'),
    ) !!}
@endsection

@section('content')
    <style>
        .widget.widget_nav_menu ul li {
            margin: 0;
        }

        .widget.widget_nav_menu ul li ul {
            margin-top: 0;
        }
    </style>
    <section class="blog-content-area padding-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-lg-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-archive-top-content-area">
                                <div class="search-form">
                                    <input type="text" class="form-control" id="search_term"
                                        placeholder="{{ __('Search..') }}" value="{{ $search_term }}">
                                    <button type="button" id="product_search_btn"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                        @if (count($dynamic_products) > 0)
                            @foreach ($dynamic_products as $data)
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product-item-3 mb-3">
                                        <a href="{{ route('frontend.dynamic.page', ['slug' => $data['slug']]) }}">
                                            <div class="card w-100">
                                                <img class="card-img-top"
                                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7zhk_JimcpasB1BrMLiqiJA6wkyNQcGSQUYc0vLtZ&s"
                                                    alt="Card image cap">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $data['title'] }}</h5>
                                                    <p class="card-text">{{ $data['meta_description'] }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-lg-12">
                                <div class="alert alert-warning">{{ __('No Products Found') }}</div>
                            </div>
                        @endif
                        <div class="col-lg-12 text-center d-none">
                            <nav class="pagination-wrapper product-page-pagination" aria-label="Page navigation ">
                                {{ $all_products->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-1">
                    <div class="product-widget-area">
                        <div class="widget widget_nav_menu">
                            <h4>Section 1</h4>
                            <ul class="sc-fHCHyC hLxoC" role="navigation">
                                <li data-item-id="group/Introduction" class="sc-dtLLSn kDuajB"><label type="group"
                                        role="menuitem" class="sc-dkQUaI lnolcv -depth0"><span title="Introduction"
                                            class="sc-WZYut gEpWTJ">Introduction</span></label>
                                    <ul class="sc-fHCHyC hLxoC">
                                        <li data-item-id="tag/Getting-Started" class="sc-dtLLSn jZkwGH"><label
                                                type="tag" role="menuitem" class="sc-dkQUaI daLLfp -depth1"><span
                                                    title="Getting Started" class="sc-WZYut gEpWTJ">Getting
                                                    Started</span></label></li>
                                        <li data-item-id="tag/Response-Structure" class="sc-dtLLSn jZkwGH"><label
                                                type="tag" role="menuitem" class="sc-dkQUaI daLLfp -depth1"><span
                                                    title="Response Structure" class="sc-WZYut gEpWTJ">Response
                                                    Structure</span></label></li>
                                        <li data-item-id="tag/Exceptions-and-Errors" class="sc-dtLLSn jZkwGH"><label
                                                type="tag" role="menuitem" class="sc-dkQUaI daLLfp -depth1"><span
                                                    title="Exceptions and Errors" class="sc-WZYut gEpWTJ">Exceptions and
                                                    Errors</span></label></li>
                                    </ul>
                                </li>
                                <li data-item-id="group/API" class="sc-dtLLSn kDuajB"><label type="group" role="menuitem"
                                        class="sc-dkQUaI lnolcv -depth0"><span title="API"
                                            class="sc-WZYut gEpWTJ">API</span></label>
                                    <ul class="sc-fHCHyC hLxoC">
                                        <li data-item-id="tag/User" class="sc-dtLLSn jZkwGH"><label type="tag"
                                                role="menuitem" class="sc-dkQUaI daLLfp -depth1"><span title="User"
                                                    class="sc-WZYut gEpWTJ">User</span></label>
                                            <ul class="sc-fHCHyC buUJiL">
                                                <li data-item-id="tag/User/paths/~1authentication~1v1~1user~1session/post"
                                                    class="sc-dtLLSn jZkwGH"><label role="menuitem"
                                                        class="sc-dkQUaI gPKPLO -depth2"><span type="post"
                                                            class="sc-euEtCV iBNnfl operation-type post">post</span><span
                                                            width="calc(100% - 38px)"
                                                            class="sc-WZYut bBfjXA">Login</span></label></li>
                                                <li data-item-id="tag/User/paths/~1authentication~1v1~1user~1session/delete"
                                                    class="sc-dtLLSn jZkwGH"><label role="menuitem"
                                                        class="sc-dkQUaI gPKPLO -depth2"><span type="delete"
                                                            class="sc-euEtCV iBNnfl operation-type delete">del</span><span
                                                            width="calc(100% - 38px)"
                                                            class="sc-WZYut bBfjXA">Logout</span></label></li>
                                                <li data-item-id="tag/User/paths/~1authentication~1v1~1user~1session/put"
                                                    class="sc-dtLLSn jZkwGH"><label role="menuitem"
                                                        class="sc-dkQUaI gPKPLO -depth2"><span type="put"
                                                            class="sc-euEtCV iBNnfl operation-type put">put</span><span
                                                            width="calc(100% - 38px)" class="sc-WZYut bBfjXA">Validate
                                                            Session</span></label></li>
                                            </ul>
                                        </li>
                                        <li data-item-id="tag/Order" class="sc-dtLLSn jZkwGH"><label type="tag"
                                                role="menuitem" class="sc-dkQUaI daLLfp -depth1"><span title="Order"
                                                    class="sc-WZYut gEpWTJ">Order</span></label>
                                            <ul class="sc-fHCHyC buUJiL">
                                                <li data-item-id="tag/Order/paths/~1transactional~1v1~1orders~1regular/post"
                                                    class="sc-dtLLSn jZkwGH"><label role="menuitem"
                                                        class="sc-dkQUaI gPKPLO -depth2"><span type="post"
                                                            class="sc-euEtCV iBNnfl operation-type post">post</span><span
                                                            width="calc(100% - 38px)" class="sc-WZYut bBfjXA">Place Order
                                                            - Any Scrip</span></label></li>
                                                <li data-item-id="tag/Order/paths/~1transactional~1v1~1orders~1regular~1{exchange}~1{order_id}/put"
                                                    class="sc-dtLLSn jZkwGH"><label role="menuitem"
                                                        class="sc-dkQUaI gPKPLO -depth2"><span type="put"
                                                            class="sc-euEtCV iBNnfl operation-type put">put</span><span
                                                            width="calc(100% - 38px)" class="sc-WZYut bBfjXA">Modify
                                                            Order</span></label></li>
                                                <li data-item-id="tag/Order/paths/~1transactional~1v1~1orders~1regular~1{exchange}~1{order_id}/delete"
                                                    class="sc-dtLLSn jZkwGH"><label role="menuitem"
                                                        class="sc-dkQUaI gPKPLO -depth2"><span type="delete"
                                                            class="sc-euEtCV iBNnfl operation-type delete">del</span><span
                                                            width="calc(100% - 38px)" class="sc-WZYut bBfjXA">Cancel
                                                            Order</span></label></li>
                                            </ul>
                                        </li>
                                        <li data-item-id="tag/Portfolio" class="sc-dtLLSn jZkwGH"><label type="tag"
                                                role="menuitem" class="sc-dkQUaI daLLfp -depth1"><span title="Portfolio"
                                                    class="sc-WZYut gEpWTJ">Portfolio</span></label>
                                            <ul class="sc-fHCHyC buUJiL">
                                                <li data-item-id="tag/Portfolio/paths/~1transactional~1v1~1portfolio~1positions~1{type}/get"
                                                    class="sc-dtLLSn jZkwGH"><label role="menuitem"
                                                        class="sc-dkQUaI gPKPLO -depth2"><span type="get"
                                                            class="sc-euEtCV iBNnfl operation-type get">get</span><span
                                                            width="calc(100% - 38px)"
                                                            class="sc-WZYut bBfjXA">Positions</span></label></li>
                                                <li data-item-id="tag/Portfolio/paths/~1transactional~1v1~1portfolio~1positions/put"
                                                    class="sc-dtLLSn jZkwGH"><label role="menuitem"
                                                        class="sc-dkQUaI gPKPLO -depth2"><span type="put"
                                                            class="sc-euEtCV iBNnfl operation-type put">put</span><span
                                                            width="calc(100% - 38px)" class="sc-WZYut bBfjXA">Position
                                                            Conversion</span></label></li>
                                                <li data-item-id="tag/Portfolio/paths/~1transactional~1v1~1portfolio~1positions/get"
                                                    class="sc-dtLLSn jZkwGH"><label role="menuitem"
                                                        class="sc-dkQUaI gPKPLO -depth2"><span type="get"
                                                            class="sc-euEtCV iBNnfl operation-type get">get</span><span
                                                            width="calc(100% - 38px)" class="sc-WZYut bBfjXA">Position
                                                            Conversion Inquiry</span></label></li>
                                                <li data-item-id="tag/Portfolio/paths/~1transactional~1v1~1portfolio~1holdings/get"
                                                    class="sc-dtLLSn jZkwGH"><label role="menuitem"
                                                        class="sc-dkQUaI gPKPLO -depth2"><span type="get"
                                                            class="sc-euEtCV iBNnfl operation-type get">get</span><span
                                                            width="calc(100% - 38px)"
                                                            class="sc-WZYut bBfjXA">Holdings</span></label></li>
                                            </ul>
                                        </li>

                                        <li data-item-id="tag/Price-Feed" class="sc-dtLLSn jZkwGH"><label type="tag"
                                                role="menuitem" class="sc-dkQUaI daLLfp -depth1"><span title="Price Feed"
                                                    class="sc-WZYut gEpWTJ">Price Feed</span></label>
                                        </li>
                                        <li data-item-id="tag/Real-time-streaming-messages" class="sc-dtLLSn jZkwGH">
                                            <label type="tag" role="menuitem" class="sc-dkQUaI daLLfp -depth1"><span
                                                    title="Real-time streaming messages" class="sc-WZYut gEpWTJ">Real-time
                                                    streaming messages</span></label>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <form id="product_search_form" class="d-none" action="{{ route('frontend.products') }}" method="get">
        <input type="hidden" id="search_query" name="q" value="{{ $search_term }}">
        <input type="hidden" id="min_price" name="min_price" value="{{ $min_price }}">
        <input type="hidden" id="max_price" name="max_price" value="{{ $max_price }}">
        <input type="hidden" name="cat_id" id="category_id" value="{{ $selected_category }}">
        <input type="hidden" name="subcat_id" id="subcategory_id" value="{{ $selected_subcategory }}">
        <input type="hidden" name="orderby" id="orderby"
            value="{{ $selected_order ? $selected_order : 'default' }}">
        <input type="hidden" name="rating" id="review" value="{{ $selected_rating }}">
        <input type="hidden" name="page" value="{{ $pages ?? 1 }}">
        <button id="product_hidden_form_submit_button" type="submit"></button>
    </form>
@endsection

@section('scripts')
    <script>
        (function() {
            "use strict";

            //search form trigger
            $(document).on('click', '#product_search_btn', function(e) {
                e.preventDefault();
                var searchTerms = $('#search_term').val();
                $('#search_query').val(searchTerms)
                $('#product_hidden_form_submit_button').trigger('click');
            });
            $(document).on('change', '#product_sorting_select', function(e) {
                var sortVal = $('#product_sorting_select').val();
                $('#orderby').val(sortVal);
                $('#product_hidden_form_submit_button').trigger('click');
            });
            $(document).on('click', '.product_category_list > li a.cat', function(e) {
                e.preventDefault();
                var catID = $(this).data('catid');
                $('#category_id').val(catID);
                $('#product_hidden_form_submit_button').trigger('click');
            });
            $(document).on('click', 'ul.product_subcategory_list > li a', function(e) {
                e.preventDefault();
                var catID = $(this).data('catid');
                $('#subcategory_id').val(catID);
                $('#product_hidden_form_submit_button').trigger('click');
            });
            $(document).on('change', 'input[name="ratings_val"]', function(e) {
                e.preventDefault();
                $('#review').val($(this).val());
                $('#product_hidden_form_submit_button').trigger('click');
            });
            $(document).on('click', '#submit_price_filter_btn', function(e) {
                e.preventDefault();
                $('#product_hidden_form_submit_button').trigger('click');
            });
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: "{{ $maximum_available_price }}",
                values: ["{{ $min_price }}", "{{ $max_price }}"],
                slide: function(event, ui) {
                    var min_price = ui.values[0];
                    var max_price = ui.values[1];
                    var siteGlobalCurrency = "{{ site_currency_symbol() }}";
                    $('.min_filter_price').text(siteGlobalCurrency + min_price);
                    $('.max_filter_price').text(siteGlobalCurrency + max_price);
                    $('#min_price').val(min_price);
                    $('#max_price').val(max_price);
                }
            });
            /* product page pagination */
            $(document).on('click', '.product-page-pagination .page-link', function(e) {
                e.preventDefault();
                $('input[name="page"]').val($(this).text());
                $('#product_hidden_form_submit_button').trigger('click');
            });

        })(jQuery);
    </script>
@endsection
