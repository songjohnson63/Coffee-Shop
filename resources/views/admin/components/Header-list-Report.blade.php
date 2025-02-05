{{-- 
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
        
@endif --}}




<div class="header-list">
    <div class="HReport" data-code="1">
        History Of Sale
    </div>
    <div class="TSReport" data-code="2">
        Total Sale Report
    </div>

    <div class="Print-Report">
        Print
      </div>
      @if (isset($id))
        
        <form  id='frm-date' method="GET"  action="{{route('admin.Report.SearchDate')}}">
            <input type="hidden" name="id" value="{{$id}}">
            <div class="Filter-Date"> <!-- Replace "/filter" with the appropriate URL for your form -->
            Form
            <input type="date" id="start_date" name="start_date" >
             To
            <input type="date" id="end_date" name="end_date"  >
            <button type="submit" id="btn-date" >Filter</button>
        </div>
        </form>
      
      @else
      <div class="Filter-Date">
        {{-- <form action="/filter" method="GET" > <!-- Replace "/filter" with the appropriate URL for your form --> --}}
            Form
            <input type="date" >
             To
            <input type="date" >
            <button type="submit" >Filter</button>
        {{-- </form> --}}
      </div>
      @endif
     
    
       
    

      
    <div class="exit-report">
        <i class="fa-regular fa-circle-xmark"></i>
    </div>
</div>