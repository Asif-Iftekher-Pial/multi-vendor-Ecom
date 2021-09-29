<table class="table table-bordered mb-30">
    <thead>
        
        <tr>
            <th scope="col"><i class="icofont-ui-delete"></i></th>
            <th scope="col">Image</th>
            <th scope="col">Product</th>
            <th scope="col">Unit Price</th>
            <th scope="col"></th>
        </tr>
    </thead>
    @if (Cart::instance('wishlist')->count() > 0)
    <tbody>
        @foreach ( Cart::instance('wishlist')->content() as  $item)
        <tr>
            @php
            $photo = explode(',', $item->model->photo); // its because theres multiple photo
            @endphp
            <th scope="row">
                <i class="icofont-close wishlist_delete" data-id="{{ $item->rowId }}"></i>
            </th>
            <td>
                <img src="{{ $photo[0] }}" alt="Product">
            </td>
            <td>
                <a href="{{ route('product.detail',$item->model->slug) }}">{{ $item->name }}</a>
            </td>
            <td>${{ number_format($item->price),2 }}</td>
           
            <td><a href="javascript:void(0);" data-id="{{ $item->rowId }}" class="move-to-cart btn btn-primary btn-sm">Add to Cart</a></td>
        </tr>
        @endforeach
       
       
    </tbody>
    @else
   <tr>
       <td colspan="5" class="text-center">No item in the wishlist</td>
   </tr>
    @endif
    
</table>