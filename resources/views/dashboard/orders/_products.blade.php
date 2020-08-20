<div class="table-responsive mb-2">
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
        @foreach($orders->products as $index=>$product)
            <tr>
                <td>{{$index + 1}}</td>
                <td style="padding: 0.75rem;">{{$product->name}}</td>
                <td style="padding: 0.75rem;">{{$product->pivot->quantity}}</td>
                <td style="padding: 0.75rem;">{{number_format($product->pivot->quantity * $product->sale_price, 2)}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <h3 style="margin-right: 20px">{{__('dashboard.'.$routeName.'.total_price')}} :
        <span class="total-price">{{number_format($orders->total_price, 2)}}</span>
    </h3>
    <button class="btn btn-info btn-sm btn-block order_products">{{__('dashboard.orders.print')}} <i class="ft-edit"></i></button>
</div>
