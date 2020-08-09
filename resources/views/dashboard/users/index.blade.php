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
                                <th>{{__('dashboard.'.$routeName.'.email')}}</th>
                                <th>{{__('global.control')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rows as $index => $row)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$row->first_name}} {{$row->last_name}}</td>
                                    <td>{{$row->email}}</td>
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
