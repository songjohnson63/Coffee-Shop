
@if (isset($MenuCode))
@if ($MenuCode==1)
@php
$listName = "Product";
@endphp  
@else
    @if ($MenuCode==3)
    @php
    $listName = "User";
    @endphp  
    @else
    @if ($MenuCode==4)
    @php
    $listName ="Menu";
    @endphp 
    @else
    @if ($MenuCode==5)
    @php
    $listName = "Category";
    @endphp 
    @endif
        
@endif
@endif
@endif
@else
@endif




<div class="header-list">
    @if (isset($MenuCode))
    <div class="btn-add" data-form='{{$MenuCode}}'>
        New
        <img src="{{asset('img/add.png')}}" alt="">
    </div>
     @endif
     @if (!isset($MenuCode))
     <div class="btn-add" >
        New
        <img src="{{asset('img/add.png')}}" alt="">
    </div>
     @endif   
    
     


     @if (isset($MenuCode))
     {{-- <form id="search-form"action='{{route("admin.list$id",['id'=>$id])}}' --}}
     <form action='{{route("admin.$listName.List",['id'=>$MenuCode])}}' method="GET">
        <div class="box-search">
            <input type="text" name="txt_search" id="txt_search">
            <button type="submit">
                <img src="{{ asset('img/Search.png') }}" alt="Search">
            </button>
        </div>
    </form>
     @else
     <form action="" method="GET">
        <div class="box-search">
            <input type="text" name="term" id="term">
            <button type="submit">
                <img src="{{ asset('img/Search.png') }}" alt="Search">
            </button>
        </div>
    </form>
     @endif
</div>