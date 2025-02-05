<div class="box-payment">
    <div class="payment-in">
        <div class="payment-top">
           <div class="top-title">
               Receive Cash
               <i class="fa-solid fa-money-bill"></i>
           </div>
            <div class="top-cencel">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
        <div class="payment-middle">
            <div class="middle-pay">
                <div class="pay-payment">
                    <label for="">Money (KHR)</label>
                    <input type="text" name="txt-money-khr" id="txt-money-khr" class="control" placeholder="Enter Money (៛)">
                    <label for="">Money (USD)</label>
                    <input type="text" name="txt-money-en" id="txt-money-en" class="control" placeholder="Enter Money ($)"​>

                </div>
                <div class="pay-data">
                    <div class="data-left">
                           <div class="total">Total (KHR)</div>
                           <div class="total">Total (USD)</div>
                           <div class="discount">Discount (%)</div>
                           <div class="after-dis">Total After Discount(KHR)</div>
                           <div class="Exchange">Total After Discount(USD)</div>
                    </div>
                    <div class="data-right">
                        <div class="total-val-kh"></div>
                        <div class="total-val-en">
                           0
                        </div>
                        <div class="discount-val">0</div>
                        <div class="after-dis-val-kh">0</div>
                        <div class="after-dis-val-usd">0</div>
                    </div>
                </div>
            </div>
            <div class="middle-show-data">
                      <div class="showdata-top">
                        <div class="top-header">
                            <p>KHR</p>
                            <p>USD</p>
                        </div>
                        <div class="top-data">
                            <div class="total-money-khr">0</div>
                            <div class="total-money-usd">0</div>
                        </div>
                      </div>
                      <div class="showdata-middle">
                        <div class="middle-header">
                            <p>KHR</p>
                            <p>Receive</p>
                            <p>USD</p>
                        </div>
                        
                        <div class="middle-data">
                            <div class="receive-money-khr">0</div>
                            <div class="receive-money-usd">0</div>
                        </div>
                      </div>
                      <div class="showdata-bottom">
                        <div class="bottom-header">
                            <p>KHR</p>
                            <p>Change</p>
                            <p>USD</p>
                        </div>
                        <div class="bottom-data">
                            <div class="change-money-khr">0</div>
                            <div class="change-money-usd">0</div>
                        </div>
                      </div>
            </div>
        </div>
        <div class="payment-bottom">
            <div class="waiting-no">
                <label for="" class="btt-label">Waiting-No :</label>
                <input type="text" name="txt-waiting" id="txt-waiting" value="{{$waitNO}}">
            </div>
            {{-- <div class="Case">
                <label for="">Case :</label>
                <input type="text" name="txt-case" id="txt-case" value="Bank">
            </div> --}}
            <div class="ExchangeMoney" >
                <label for="" class="btt-label">Exchange Money :</label>
                <input type="text" name="txt-money" id="txt-exchange-money" value="4100">
            </div>
            <div class="Boxdiscount">
                <label for="" class="btt-label" >Discount  :</label>
                <input type="text" name="txt-dis" id="txt-dis" value="0">
            </div>
            <div class="BoxCase">
                <label for="" class="btt-label" >Payment Method  :</label>
                <select name="txt_pay" id="txt-case">
                    <option value="Cash">Cash</option>
                    <option value="Card">Card</option>
                    <option value="ABA">ABA</option>
                    <option value="Acleda">ACLEDA</option>
                    <option value="Other">Other</option>
                </select>
                {{-- <input type="text" name="txt-case" id="txt-case" value="Bank"> --}}
            </div>
           
           <div class="print" id='print-invoice' >
              Print <i class="fa-solid fa-print"></i>
           </div>
        </div>
    </div>
</div>