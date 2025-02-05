<div class="container-form">
     <div class="form-header">
        <div class="header-left">
             <p>FORM</p>
             <img src="{{asset('img/Form.png')}}" alt="">
        </div>
        <div class="header-right">
          @if (!isset($data))
          Create User
          @else
          Update User
          @endif
        </div>
     </div>
     <div class="form-body">
          <div class="body-left">
               <label for="">Full-Name</label>
               <input type="text"  value="@if(isset($data->name)){{$data->name}} @endif" name='name' class='frm-control' placeholder="Enter Category">
               <label for="">Gender</label>
               <select name="txt_gender" id="txt_gender" class='frm-control'>
                    <option value="">Select option For Status</option>
                    <option value="male"  {{ isset($data->gender) && $data->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ isset($data->gender) && $data->gender == 'female' ? 'selected' : '' }}>Female</option>
                </select>
                <label for="">Type</label>
               <select name="txt_type" id="txt_type" class='frm-control'>
                  <option value="">Select Option For Type</option>
                  <option value="1" {{ isset($data->type) && $data->type == 1 ? 'selected' : '' }}>Admin</option>
                  <option value="2" {{ isset($data->type) && $data->type == 2 ? 'selected' : '' }}>Client</option>
                  <option value="3" {{ isset($data->type) && $data->type == 3 ? 'selected' : '' }}>Cashier</option>
                  <option value="4" {{ isset($data->type) && $data->type == 4 ? 'selected' : '' }}>Baristas</option>
                  <option value="5" {{ isset($data->type) && $data->type == 5 ? 'selected' : '' }}>Cleaner</option>
                  <option value="6" {{ isset($data->type) && $data->type == 6 ? 'selected' : '' }}>Security</option>
               </select>
               <label for="">Photo</label>
               <input type="file" name="txt_photo" id="txt_photo" class="frm-control">
               <label for="">Start-Time</label>
               <input type="text" value="@if(isset($data->starttime)){{$data->starttime}} @endif" name="txt_sTime" id="txt_sTime" class="frm-control">
          </div>
          <div class="body-middle">

          </div>
          <div class="body-right">
               <label for="">End-Time</label>
               <input type="text" value="@if(isset($data->endtime)){{$data->endtime}} @endif" name="txt_eTime" id="txt_eTime" class="frm-control">
               <label for="" class="from-control">Telephone</label>
               <input type="text" name="txt_phoneNum" value="@if(isset($data->telephone)){{$data->telephone}} @endif" id="txt_phoneNum" class="frm-control">
               @if (!isset($data))
               <label for="" class="from-control">Password</label>
               <input type="text" name='txt_pass' id="txt_pass" class="frm-control">
               @endif
             
               <label for="">Status</label>
                <select name="txt_status" id="txt_status" class='frm-control'>
                    <option value="">Select option For Status</option>
                    <option value="1" {{ isset($data->status) && $data->status == 1 ? 'selected' : '' }}>Show</option>
                    <option value="2" {{ isset($data->status) && $data->status == 2 ? 'selected' : '' }}>Hide</option>
                </select>
          </div>
     </div>
     @include('admin.components.footer-form')
 </div>