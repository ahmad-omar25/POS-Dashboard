@extends('dashboard.layouts.app')
@section('content')
    <style>
        .table th, .table td {
            padding: 0.75rem !important;
        }
    </style>
    @include('dashboard.shared.headers.index_header')
    <section id="hidden-label-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <form action="{{route($routeName.'.index')}}" method="get">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="{{__('global.search')}}" aria-label="Amount" value="{{request()->search}}">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-success" ><i class="la la-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                @if(isset($rows) && $rows->count() > 0)
                        <div class="row match-height">
                            <div class="col-md-7">
                                <div class="categories m-2">
                                    <h5>{{__('dashboard.clients.orders.title')}}</h5>
                                        <div class="card-content collapse show">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead class="bg-success white">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{{__('dashboard.'.$routeName.'.client_name')}}</th>
                                                        <th>{{__('dashboard.'.$routeName.'.price')}}</th>
                                                        <th>{{__('dashboard.'.$routeName.'.created_at')}}</th>
                                                        <th>{{__('global.control')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($rows as $index => $row)
                                                        <tr>
                                                            <td>{{$index + 1}}</td>
                                                            <td>{{$row->client->name}}</td>
                                                            <td>{{number_format($row->total_price, 2)}}</td>
                                                            <td>{{$row->created_at->toFormattedDateString()}}</td>
                                                            <td>
                                                                @include('dashboard.shared.buttons.show')
                                                                @include('dashboard.shared.buttons.edit')
                                                                @include('dashboard.shared.buttons.delete')
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                {{$rows->appends(request()->query())->links()}}
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="categories m-2">
                                    <h5>{{__('dashboard.orders.show_products')}}</h5>
                                    <div class="card-content collapse show">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-success white">
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{__('dashboard.'.$routeName.'.name')}}</th>
                                                    <th>{{__('dashboard.'.$routeName.'.quantity')}}</th>
                                                    <th>{{__('dashboard.'.$routeName.'.price')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($rows as $index=>$row)
                                                    <tr>
                                                        <td>{{$index + 1}}</td>
                                                        <td style="padding: 0.75rem;">{{$row->client->name}}</td>
                                                        <td style="padding: 0.75rem;">{{number_format($row->total_price, 2)}}</td>
                                                        <td style="padding: 0.75rem;">{{$row->created_at->toFormattedDateString()}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="not_found px-2">
                            @include('dashboard.shared.data_not_found')
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>
@endsection
