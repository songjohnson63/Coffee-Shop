<div class="container-form">
     <div class="form-header">
        <div class="header-left">
             FORM
             <img src="{{asset('img/Form.png')}}" alt="">
        </div>
        <div class="header-right">
           @if (isset($data))
           Update Product
           @else
           Create Product
           @endif
        </div>
     </div>
     <div class="form-body">
          <div class="body-left">
               <label for="">Product Name (EN)</label>
               <input type="text" value="@if(isset($data->name_en)){{$data->name_en}} @endif" name="txt_pro_en" id="txt_pro_en" class="frm-control" placeholder="Enter Product Name">
               <label for="">Product Name (Kh)</label>
               <input type="text" value="@if(isset($data->name_kh)){{$data->name_kh}} @endif" name="txt_pro_kh" id="txt_pro_kh" class="frm-control" placeholder="Enter Product Name">
               <label for="">Product Cost Price ($)</label>
               <input type="text" value="@if(isset($data->cost)){{$data->cost}} @endif" name="txt_cost" id="txt_cost" class='frm-control' placeholder="Enter Product Cost Price">
               <label for="">Product Price ($)</label>
               <input type="text" value="@if(isset($data->price)){{$data->price}} @endif" name="txt_price" id="txt_price" class='frm-control' placeholder="Enter Product Price">
               <label for="">Status</label>
               <select name="txt_status" id="txt_status" class="frm-control">
                    <option value="">Select Option for Status</option>
                    <option value="1" {{ isset($data->status) && $data->status == 1 ? 'selected' : '' }}>Show</option>
                    <option value="2" {{ isset($data->status) && $data->status == 2 ? 'selected' : '' }}>Hide</option>
               </select>
              
          </div>
          <div class="body-middle">

          </div>
          
          <div class="body-right">
               <label for="">Product Category</label>
               <select name="txt_cat" id="txt_cat"  class="frm-control" >
                    <option value="">Select Option for Category</option>
                    @foreach ($Categories as $Category)
                      <option value="{{$Category->id}}"  {{ isset($data->category_id) && $data->category_id ==  $Category->id ? 'selected' : '' }}>{{$Category->name}}</option>
                    @endforeach
               </select>
               <label for="">Writter</label>
               <input type="hidden" name="txt_userID" class="frm-control" id='txt_userID' value="{{Auth::user()->id}}">
               <input type="text" name='txt_UserName' class="frm-control" id="txt_UserName" readonly value="{{Auth::user()->name}}">
               <label for="">Product Photo</label>
               <input type="file" name="txt_photo" id="txt_photo" class="frm-control">

               <label for="">Rate(USD)</label>
             @if (isset($data))
             <input type="text" name="txt_rate" class="frm-control" id='txt_rate' value="{{$data->rate}}" >
             @else
             <input type="text" name="txt_rate" class="frm-control" id='txt_rate' value="4100" >
             @endif
          </div>
     </div>
     @include('admin.components.footer-form')
 </div>