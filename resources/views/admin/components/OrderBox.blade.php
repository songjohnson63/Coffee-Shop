<div class="body-left">
    <div class="list-order">
      <table>
          <tr>
              <th>Product</th>
              <th width='100'>QTY</th>
              <th width='80'>Price</th>
              <th width='60'>Action</th>
          </tr>
          {{-- <tr>
              <td>Ice-Lattedddddddddddddddr</td>
              <td>
                  <div class="box-qty">
                      <button class="btn-dec"><i class="fa-solid fa-minus"></i></button>
                     <div class="qty">9</div>
                     <button class="btn-add"><i class="fa-solid fa-plus"></i></button>
                 
                  </div>
              </td>
              <td>1.625​ ៛</td>
              <td><i class="fa-solid fa-trash btn-del"></i></td>
          </tr>
          <tr>
              <td>Ice-Lattedddddddddddddddr</td>
              <td>
                  <div class="box-qty">
                      <button class="btn-dec"><i class="fa-solid fa-minus"></i></button>
                     <div class="qty">10</div>
                     <button class="btn-add"><i class="fa-solid fa-plus"></i></button>
                 
                  </div>
              </td>
              <td>1.625​ ៛</td>
              <td><i class="fa-solid fa-trash btn-del"></i></td>
          </tr>
          <tr>
              <td>Ice-Lattedddddddddddddddr</td>
              <td>
                  <div class="box-qty">
                      <button class="btn-dec"><i class="fa-solid fa-minus"></i></button>
                     <div class="qty">12</div>
                     <button class="btn-add"><i class="fa-solid fa-plus"></i></button>
                 
                  </div>
              </td>
              <td>1.625​ ៛</td>
              <td><i class="fa-solid fa-trash btn-del"></i></td>
          </tr> --}}
      </table>
    </div>
    <div class="box-action">
        <div class="action-top">
          <div class="top-left">
              <div class="item">
              <div class='item-num'>0</div>
              items
          </div>
              
          </div>
          <div class="top-right">
              <div class="total">   
                  <div class="total-text">
                      Total : 
                  </div>
                  <div class="total-price">
                      $
                      <div class="val-price">
                          0
                      </div>
                  </div>
              </div>
              <div class="discount">
                  <div class="dis-text">
                      Discount :
                  </div>
                  <div class="dis-val">
                      0%
                  </div>
              </div>
          </div>
          
        </div>
        <div class="action-bottom">
          {{-- <div class="btn-case">
              <img src="{{asset('img/payment.png')}}" alt="">
             <p>Case</p>
          </div> --}}
          {{-- <div class="btn-dis">
              <img src="{{asset('img/discounts.png')}}" alt="">
             <p>Discount</p>
          </div> --}}
          <div class="btn-Clear" id='Clear'>
            <img src="{{asset('img/clear.png')}}" alt="">
            <p>Clear</p>
         </div>
          <div class="btn-pay" >
             <img src="{{asset('img/pay.png')}}" alt="">
              <p>Pay</p>
          </div>
        </div>
    </div>
  </div>