@extends('dashboard.layouts.app')
@section('content')
    @include('dashboard.shared.headers.edit_header')
    <section id="hidden-label-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @include('dashboard.shared.personal_information')
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <form class="form" action="{{route($routeName.'.update', $row->id)}}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @include('dashboard.users.form')
                                @include('dashboard.shared.buttons.add')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
