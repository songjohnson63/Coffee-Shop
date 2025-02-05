<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/admin/css/all-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('/home/js/main.js') }}"></script>
</head>
<body>
    <div class="box-invoice">
        <div class="invoice-in">
           
             <div class="header-invoice">
                 <div class="invoice-name">
                     បង្កានដៃបង់ប្រាប់/Receipt
                 </div>
                 <div class="invoice-data">
                     <div class="data-left">
                          <div class="invoice-no">
                             វិក្កយបត្រ/ Invoice No
                          </div>
                          <div class="Cashier">
                             អ្នកគិតលុយ/Cashier
                          </div>
                          <div class="date">
                             កាលបរិច្ឆេទ/Date Time
                          </div>
                          <div class="waiting-no">
                             លេខរង់ចាំ/Waiting No
                          </div>
                     </div>
                     <div class="data-middle">
                         <div class="invoice-no">
                            :
                         </div>
                         <div class="Cashier">
                            :
                         </div>
                         <div class="date">
                            :
                         </div>
                         <div class="waiting-no">
                            :
                         </div>
                    </div>
                     <div class="data-right">
                         <div class="invoice-no-data">
                            {{$Sale->id}}
                          </div>
                          <div class="Cashier-data">
                            {{$Sale->user->name}}
                          </div>
                          <div class="date-data">
                           {{$Sale->created_at->format('d M Y h:i A')}}
                          </div>
                          <div class="waiting-no-data">
                            {{$waitNo}}
                          </div>
                     </div>
                 </div>
             </div>
             <div class="body-invoice">
                 <table>
                    <tr>
                        <th>បរិយាយ</th>
                        <th width='30'>ចំនួន</th>
                        <th width='50'>តំលៃ</th>
                        <th width='60'>សរុប</th>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <th>Qty</th>
                        <th >Price</th>
                        <th >Amount</th>
                    </tr>
                    @foreach ($Sale->products as $product)
                    <tr>
                        <td>{{$product->name_kh}} <br>
                            {{$product->name_en}}</td>
                         <td>{{$product->pivot->qty}}</td>
                         <td>{{$product->price}}</td>
                         <td>{{$product->pivot->qty * $product->price}}</td>
                     </tr>
                    @endforeach
                     
                    
                     
                     {{-- <tr>
                         <td>Iced Green Tea Latte</td>
                          <td>1</td>
                          <td>7500</td>
                          <td>7500</td>
                      </tr> --}}
                 </table>
             </div>
             <div class="total-amount">
                 <div class="amount-in">
                     <div class="in-left">
                     <div class="total-khr">សរុប/Sub Total(៛) :</div>
                     <div class="total-usd">សរុប/Sub Total($) :</div>
                     <div class="total-dis">បញ្ចុះតម្លៃ/Discount :</div>
                     </div>
                     <div class="in-right">
                         <div class="total-khr">{{$Sale->amount * $Sale->exchange}} ៛</div>
                         <div class="total-usd">{{$Sale->amount}}​ $</div>
                         <div class="total-dis">{{$Sale->discount}} %</div>
                     </div>
                 </div>
             </div>
             <div class="total-payment">
                 <div class="payment-in">
                     <div class="in-left">
                        <div class="tpayment-khr">Total Payment (៛) :</div>
                        <div class="tpayment-usd">Total Payment ($) :</div>
                     </div>
                     <div class="in-right">
                         <div class="tpayment-khr-val">{{$Sale->amount * $Sale->exchange - ($Sale->amount * $Sale->exchange * $Sale->discount /100)}} ៛</div>
                        <div class="tpayment-usd-val">{{$Sale->amount - ($Sale->amount  * $Sale->discount /100)}}</div>
                     </div>
                 </div>
             </div>
             <div class="reveive-box">
                 <div class="reveive-khr">
                     <div class="reveive-money-khr">
                          <div class="khr-title-re">
                             Receive(៛):
                          </div>
                          <div class="khr-money-re">
                            {{$reKhr}}
                          </div>
                     </div>
                     <div class="change-money-khr">
                         <div class="khr-title-ch">
                             Change(៛):
                          </div>
                          <div class="khr-money-ch">
                            {{ $Sale->exchange*$reBack }}
                          </div>
                     </div>
                 </div>
                 <div class="reveive-usd">
                     <div class="reveive-money-usd">
                         <div class="usd-title-re">
                             Receive($):
                          </div>
                          <div class="usd-money-re">
                            {{$reUsd}}
                          </div>
                     </div>
                
                 <div class="change-money-usd">
                     <div class="usd-title-ch">
                         Change($):
                      </div>
                      <div class="usd-money-ch">
                        {{ $reBack }}
                      </div>
                 </div>
                 </div>
             </div>
             <div class="exchange">
                 <div class="money-exchange">
                     Exchange Rate 1$ = {{$Sale->exchange}} រៀល
                 </div>
             </div>
            
         
             <div class="invoice-bottom">
                 <div class="thz-kh">
                     សូមអរគុណ!សូមអញ្ចើញមកម្តងទៀត
                 </div>
                 <div class="thz-en">
                     Thank you , Please come again!
                 </div>
             </div>
         </div>
        </div>
     </div>
  
    
</body>
</html>