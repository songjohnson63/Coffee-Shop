<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/coffee-shop.png')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/admin/css/style.css') }}" type="text/css">
    <!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('/admin/js/main.js') }}"></script>
</head>
<body>


   @if (isset($Permission))
   @foreach ($Permission->users as $item)
   @php
       if ($item->pivot->mid==1) {
         $proAid=$item->pivot->aid;
       }
       if ($item->pivot->mid==2) {
         $reAid=$item->pivot->aid;
       }
       if ($item->pivot->mid==3) {
         $userAid=$item->pivot->aid;
       }
       if ($item->pivot->mid==4) {
         $menuAid=$item->pivot->aid;
       }
       if ($item->pivot->mid==5) {
         $catAid=$item->pivot->aid;
       }
   @endphp
    @endforeach 
@endif

    <div class="container-admin">
        @include('admin.components.Header-admin')
          <div class="admin-bottom">

          
              @include('admin.components.left-admin')
              <div class="bottom-right">
                   @yield('headerAdmin')
                  <div class="tbl-data">
                      <table>
                          @yield('table')
                      </table>
                  </div>
              </div>
          </div>
      </div>

</body>
</html>