@extends('dashboard.layouts.app')
@section('content')
    @include('dashboard.shared.headers.create_header')
    <section id="hidden-label-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @include('dashboard.shared.personal_information')
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <form class="form" action="{{route($routeName.'.store')}}" method="POST">
                                @include('dashboard.'.$routeName.'.form')
                                @include('dashboard.shared.buttons.add')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
