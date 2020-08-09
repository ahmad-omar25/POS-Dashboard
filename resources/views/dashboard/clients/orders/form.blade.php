@csrf
<div class="form-body">
    <div class="row">
        <div class="col-6">
            <h5>{{__('dashboard.categories.title')}}</h5>
            @if (isset($categories))
                @foreach($categories as $category)
                    <p>
                        <button class="btn btn-primary" type="button" data-toggle="collapse"
                                data-target="#{{str_replace(' ', '-', $category->name)}}" aria-expanded="false"
                                aria-controls="{{str_replace(' ', '-', $category->name)}}">
                            {{$category->name}}
                        </button>
                    </p>
                    <div class="collapse" id="{{str_replace(' ', '-', $category->name)}}">
                        <div class="card card-body">
                            @if ($category->products->count() > 0)
                                <div class="card-content collapse show">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-success white">
                                            <tr>
                                                <th>name</th>
                                                <th>name</th>
                                                <th>name</th>
                                            </tr>
                                            </thead>
                                            @foreach($category->products as $product)
                                                <tr>
                                                    <th>{{$product->name}}</th>
                                                    <th>{{$product->stock}}</th>
                                                    <th>{{$product->sale_price}}</th>
                                                </tr>
                                            @endforeach
                                        </table>
                                        @endif
                                    </div>
                                </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="form-group col-6">
            <h5>{{__('dashboard.clients.orders.title')}}</h5>
        </div>
    </div>
</div>
