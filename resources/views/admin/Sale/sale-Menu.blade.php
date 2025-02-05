<div class="menu">  
  
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
         
          @if (isset($categoies))
          <div data-cat="0" class="swiper-slide box-category"> All Products </div>
              @foreach ($categoies as $category)
              <div data-cat="{{$category->id}}" class="swiper-slide box-category">{{$category->name}}</div>
              @endforeach
          @endif
         
          {{-- <div class="swiper-slide box-category">Hot</div>
          <div class="swiper-slide box-category">Pizza</div>
          <div class="swiper-slide box-category">Water</div>
          <div class="swiper-slide box-category">Tea</div>
          <div class="swiper-slide box-category">Smoothie</div>
          <div class="swiper-slide box-category">Juice</div>
          <div class="swiper-slide box-category">Juice</div> --}}
        </div>
      </div>
   </div>