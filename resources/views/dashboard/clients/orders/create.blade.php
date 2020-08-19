@extends('dashboard.layouts.app')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">{{__('global.dashboard')}}</a></li>
                        <li class="breadcrumb-item"><a href="">{{__('dashboard.'.$routeName.'.title')}}</a></li>
                        <li class="breadcrumb-item active">{{__('dashboard.'.$routeName.'.create')}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section id="hidden-label-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @include('dashboard.shared.personal_information')
                    <form action="{{route($routeName.'.store', $client->id)}}" method="POST">
                        @csrf
                        <div class="row match-height">
                            <div class="col-md-12">
                                @if (isset($categories))
                                    <div class="categories m-2">
                                        <h5>{{__('dashboard.categories.title')}}</h5>
                                        @foreach($categories as $category)
                                            <div id="accordionWrap5" role="tablist" aria-multiselectable="true">
                                                <div class="card collapse-icon accordion-icon-rotate">
                                                    <div id="heading53" class="card-header border-success mt-1">
                                                        <a data-toggle="collapse"
                                                           data-parent="#{{str_replace(' ', '-', $category->name)}}"
                                                           href="#{{str_replace(' ', '-', $category->name)}}"
                                                           aria-expanded="false"
                                                           aria-controls="{{str_replace(' ', '-', $category->name)}}"
                                                           class="card-title lead info collapsed">{{$category->name}}</a>
                                                    </div>
                                                    <div id="{{str_replace(' ', '-', $category->name)}}" role="tabpanel"
                                                         aria-labelledby="{{str_replace(' ', '-', $category->name)}}"
                                                         class="card-collapse collapse" aria-expanded="false">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                @if ($category->products->count() > 0)
                                                                    <div class="card-content collapse show">
                                                                        <div class="table-responsive">
                                                                            <table class="table">
                                                                                <thead class="bg-success white">
                                                                                <tr>
                                                                                    <th>{{__('dashboard.'.$routeName.'.name')}}</th>
                                                                                    <th>{{__('dashboard.'.$routeName.'.stock')}}</th>
                                                                                    <th>{{__('dashboard.'.$routeName.'.purchase_price')}}</th>
                                                                                    <th>{{__('dashboard.'.$routeName.'.add')}}</th>
                                                                                </tr>
                                                                                </thead>
                                                                                @foreach($category->products as $product)
                                                                                    <tr>
                                                                                        <th>{{$product->name}}</th>
                                                                                        <th>{{$product->stock}}</th>
                                                                                        <th>{{number_format($product->sale_price, 2)}}</th>
                                                                                        <th>
                                                                                            <a href=""
                                                                                               id="product-{{$product->id}}"
                                                                                               data-name="{{$product->name}}"
                                                                                               data-id="{{$product->id}}"
                                                                                               data-price="{{$product->sale_price}}"
                                                                                               class="btn btn-success btn-sm add-product-btn">
                                                                                                <i class="ft-plus"></i>
                                                                                            </a>
                                                                                        </th>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </table>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @endforeach

                                            </div>
                                            @endif
                                    </div>
                            </div>
                            <div class="col-md-12">
                                <div class="categories m-2">
                                    <h5>{{__('dashboard.clients.orders.title')}}</h5>
                                    <div class="card-content collapse show">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-success white">
                                                <tr>
                                                    <th>{{__('dashboard.'.$routeName.'.product')}}</th>
                                                    <th>{{__('dashboard.'.$routeName.'.quantity')}}</th>
                                                    <th>{{__('dashboard.'.$routeName.'.purchase_price')}}</th>
                                                    <th>{{__('dashboard.'.$routeName.'.delete')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody class="order-list">
                                                </tbody>
                                            </table>
                                            <h5 style="margin-right: 20px">{{__('dashboard.'.$routeName.'.total-price')}} :
                                                <span class="total-price">0</span>
                                            </h5>
                                            <button id="add-order-btn" class="btn btn-info btn-block disabled"><i class="ft-plus-circle" style="margin: -2px -32px;font-size: 21px;position: absolute;"></i>{{__('dashboard.clients.orders.add_order')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection
