@extends('dashboard.layouts.app')
@section('content')
    @include('dashboard.shared.headers.index_header')
    <div class="row" id="header-styling">
        <div class="col-12">
            <div class="card">
                @include('dashboard.shared.search-add')
                @if(isset($rows) && $rows->count() > 0)
                <div class="card-content collapse show">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-success white">
                            <tr>
                                <th>#</th>
                                <th>{{__('dashboard.'.$routeName.'.name')}}</th>
                                <th>{{__('dashboard.'.$routeName.'.phone')}}</th>
                                <th>{{__('dashboard.'.$routeName.'.address')}}</th>
                                <th>{{__('dashboard.'.$routeName.'.add_order')}}</th>
                                <th>{{__('global.control')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rows as $index => $row)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{implode(" - ", $row->phone)}}</td>
                                    <td>{{$row->address}}</td>
                                    <td>
                                        @if(auth()->user()->hasPermission('orders_create'))
                                            <a href="{{route('clients.orders.create', $row->id)}}" class="btn btn-info btn-sm">{{__('dashboard.'.$routeName.'.add_order')}}</a>
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled">{{__('dashboard.'.$routeName.'.add_order')}}</a>
                                        @endif
                                    </td>
                                    <td>
                                        @include('dashboard.shared.buttons.edit')
                                        @include('dashboard.shared.buttons.delete')
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            @else
                                @include('dashboard.shared.data_not_found')
                            @endif
                        </table>
                        {{$rows->appends(request()->query())->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
