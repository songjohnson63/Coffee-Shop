<div class="row">
   
    {{-- {{$code}} --}}
  {{-- @endif --}}
    @if (isset($products))
    @foreach ($products as $product)
   {{-- @if ($product->category_id==1) --}}
   <div class="col-4 Box-product">
    <div class="product">
        {{-- {{$product->photo}} --}}
        <img src="/storage/{{$product->photo}}" alt="">
    </div>
   <div class="product-text">
    <div class="pro-id">
        {{-- <input type="hidden" id='txt-price' name="txt_price" value="{{$product->price}}"> --}}
        {{$product->id}}
    </div>
    <div class="box-name">
        <input type="hidden" id='txt-price' name="txt_price" value="{{$product->price}}">
        <div class="pro-name-en">
           
            {{$product->name_en}}
        </div>
        <div class="pro-name-kh">
            {{$product->name_kh}}
        </div>
    </div>
   </div>
</div>
       
   {{-- @endif --}}
    @endforeach
    @endif
   
    
   
</div>