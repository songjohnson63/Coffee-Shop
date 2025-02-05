<div class="container-form">
    <div class="form-header">
       <div class="header-left">
            FORM
            <img src="{{asset('img/Form.png')}}" alt="">
       </div>
       <div class="header-right">
        @if (!isset($data))
        Create Category
        @else
        Update Category
        @endif
       </div>
    </div>
    <div class="form-body">
         <div class="body-left">
              <label for="">Category</label>
              <input type="text"  name='txt_category' class='frm-control' placeholder="Enter Category" value="@if(isset($data->name)){{$data->name}} @endif">
             
              <label for="">Menu</label>
             <select name="txt_menu_id" class='frm-control'>
                 <option value="0">Select Menu For Status</option>
                 @foreach ($menus as $menu)
                 <option value="{{$menu->id}}" {{ isset($data->menu_id) && $data->menu_id == $menu->id ? 'selected' : '' }}>{{$menu->name}}</option>
                 @endforeach
             </select>
              <label for="">Status</label>
             <select name="txt_status" class='frm-control'>
                 <option value="0">Select Option For Status</option>
                
                 <option value="1" {{ isset($data->status) && $data->status == 1 ? 'selected' : '' }}>Show</option>
                 <option value="2" {{ isset($data->status) && $data->status == 2 ? 'selected' : '' }}>Hide</option>
             </select>

         </div>
         <div class="body-middle">

         </div>
         <div class="body-right">

         </div>
    </div>
    @include('admin.components.footer-form')
</div>