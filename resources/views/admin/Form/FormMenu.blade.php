<div class="container-form">
     <div class="form-header">
        <div class="header-left">
             FORM
             <img src="{{asset('img/Form.png')}}" alt="">
        </div>
        <div class="header-right">
          @if (!isset($data))
          Create Menu
          @else
          Update Menu
          @endif
        </div>
     </div>
     <div class="form-body">
          <div class="body-left">
               <label for="">Menu Name</label>
               <input type="text" value="@if(isset($data->name)){{$data->name}} @endif" name='txt_name' class='frm-control' placeholder="Enter Menu-Name">
               <label for="">Status</label>
               <select name="txt_status" class="frm-control" >
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