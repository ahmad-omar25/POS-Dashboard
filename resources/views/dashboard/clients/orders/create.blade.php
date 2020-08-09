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
                    <div class="row match-height">
                        <div class="col-lg-12 col-xl-6">
                            <div id="accordionWrap5" role="tablist" aria-multiselectable="true">
                                <div class="card collapse-icon accordion-icon-rotate" style="height: 530px;">
                                    <div id="heading53" class="card-header border-success mt-1">
                                        <a data-toggle="collapse" data-parent="#accordionWrap5" href="#accordion53" aria-expanded="false" aria-controls="accordion53" class="card-title lead info collapsed">Accordion Group Item #3</a>
                                    </div>
                                    <div id="accordion53" role="tabpanel" aria-labelledby="heading53" class="card-collapse collapse" aria-expanded="false">
                                        <div class="card-content">
                                            <div class="card-body">
                                                Candy cupcake sugar plum oat cake wafer marzipan jujubes lollipop macaroon. Cake
                                                dragée jujubes donut chocolate bar chocolate cake cupcake
                                                chocolate topping. Dessert jelly beans toffee muffin tiramisu
                                                sesame snaps brownie. Cake halvah pastry soufflé oat cake
                                                candy candy canes. Lemon drops gummies gingerbread toffee.
                                                Tart jelly candy pastry. Pastry cake jelly beans carrot cake
                                                marzipan lollipop muffin. Soufflé jujubes cupcake. Powder
                                                danish candy carrot cake pastry. Tart marshmallow caramels
                                                cake macaroon gummies lollipop.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <form class="form" action="" method="">

                                @include('dashboard.shared.buttons.add')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
