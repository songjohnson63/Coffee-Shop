$(document).ready(function(){
   var item=0;
   var totalprice=0;
   var total=0;
   var formattedPrice=0;
   var Val =0;
   var tdprice=0;
   var DataOrder={};
   var newTab;
    // dec Qty
    $('.list-order').on('click','.btn-dec',function(){
       var indexTr=$(this).parents('tr').index();
       Val=$('tr:eq(' + indexTr + ')').find('.qty').text();
       tdprice=$('tr:eq(' + indexTr + ')').find('td:eq(2)').text();
       Val = Val - 1;
      //  alert(v)
       if(Val<=0 ){
          Val=1;
       }else{
         item=item-1;     
          $('.box-action').find('.item-num').text(item);
            totalprice=totalprice-parseFloat(tdprice);
            formattedPrice = totalprice.toFixed(3);
            $('.box-action').find('.val-price').text(formattedPrice);  
       }
       $('tr:eq(' + indexTr + ')').find('.qty').text(Val);
       $('tr:eq(' + indexTr + ')').find('.qtyInput').val(Val);

      
    });
    // add Qty
    $('.list-order').on('click','.btn-add',function(){
        var indexTr=$(this).parents('tr').index();
         Val=$('tr:eq(' + indexTr + ')').find('.qty').text();
         tdprice=$('tr:eq(' + indexTr + ')').find('td:eq(2)').text();
         Val = parseInt(Val)+1;

         item=item+1;     
          $('.box-action').find('.item-num').text(item);

          $('tr:eq(' + indexTr + ')').find('.qty').text(Val);
          $('tr:eq(' + indexTr + ')').find('.qtyInput').val(Val);
      //   total=tdprice*Val;
        totalprice=totalprice+parseFloat(tdprice);
        formattedPrice = totalprice.toFixed(3);
        $('.box-action').find('.val-price').text(formattedPrice);
        

     });
    //  Del
    $('.list-order').on('click','.btn-del',function(){
        var indexTr=$(this).parents('tr').index();
        Val=$('tr:eq(' + indexTr + ')').find('.qty').text();
        tdprice=$('tr:eq(' + indexTr + ')').find('td:eq(2)').text();

        total=tdprice*Val;

        totalprice=totalprice-parseFloat(total);
        formattedPrice = totalprice.toFixed(3);
        $('.box-action').find('.val-price').text(formattedPrice);
       
        $('.box-action').find('.val-price').text(formattedPrice);
        item=item-Val;     
        $('.box-action').find('.item-num').text(item);
        $('tr:eq(' + indexTr + ')').remove();
     });


     //Click on Product
     $('.body-right').on('click','.Box-product',function(){
        Val=1;
        var boxindex=$(this).index();
        var id=$('.product-text:eq('+ boxindex+')').find('.pro-id').text();
        id=parseInt(id);
      //   alert(id);
        var price=$('.product-text:eq('+ boxindex+')').find('#txt-price').val();
        var proNameEN=$('.product-text:eq('+ boxindex+')').find('.pro-name-en').text();
        var proNameKH=$('.product-text:eq('+ boxindex+')').find('.pro-name-kh').text();
        var proID=$('.product-text:eq('+ boxindex+')').find('.pro-id').text();
        

      
        $.ajax({
         beforeSend:function(){
                   //work before success    
         },
         success:function(data){ 
            // alert(Val);
            
            // alert(totalprice);
            item=item+1;
            $('.box-action').find('.item-num').text(item);
            total=price*Val;
            totalprice=totalprice+total;
            formattedPrice = totalprice.toFixed(3);
            $('.box-action').find('.val-price').text(formattedPrice);
            var tr;  
            tr=`
            <tr>
            <td>
            <input type="hidden" id='txt_id' name="txt_id[]" value="${id}">
            <div class='proNameEN'>${proNameEN}</div>
                <div class='proNameKH'>${proNameKH}</div>
                </td>
            <td>
                <div class="box-qty">
                    <button class="btn-dec"><i class="fa-solid fa-minus"></i></button>
                   <div class="qty">1</div>
                   <input type="hidden" id='txt_qty' name="txt_qty[]" value="1" class='qtyInput'>
                
                   <button class="btn-add"><i class="fa-solid fa-plus"></i></button>
               
                </div>
            </td>
            <td><div class="proPrice">${price}</div></td>
            <td><i class="fa-solid fa-trash btn-del"></i></td>
        </tr>
            `
            // localStorage.setItem('tr', tr);
            // alert(tr);
            $('.list-order tr:last').after(tr)
            
            // saveDataToStorage();
           
                   //work after success        
         }
      });
     });
      // Function to load data from localStorage
 
      $('#boxR2').hide();
      var changeKH = $('.payment-bottom').find('#txt-exchange-money').val();

     $('.action-bottom').on('click','.btn-pay',function(){
      // var totalPay=0;
      //  totalPay=$('.top-right').parents('.box-action').find('.val-price').text();
      //  totalPay= parseFloat(total);
      //  alert(totalPay);
      // alert(formattedPrice);
     
       
            $('.data-right').parent('.pay-data').find('.total-val-en').text(formattedPrice);
            changeMoney(changeKH)

            if(formattedPrice>0){
               $('#boxR2').show();
               $('#boxR1').hide();
            }
            
     });
 
        //click category
        $('.menu').on('click','.box-category',function(){
            var dataMenu=$(this).data('cat');
           
            $(".row").load(`/admin/Sale/SelectMenu/${dataMenu}`, function(responseTxt, statusTxt, xhr){
          if(statusTxt == "success")

          // alert("External content loaded successfully!");
          if(statusTxt == "error")
          alert("Error: " + xhr.status + ": " + xhr.statusText);
    });    
        });
 
        $('.payment-bottom').on('blur','#txt-exchange-money',function(event){
            changeKH = $(this).val(); 
            //   $('.data-right').parent('.pay-data').find('.discount-val').text(Value);
              changeMoney(changeKH)

            //   var money = $('.data-right').parent('.pay-data').find('.total-val-en').text();
              
        })
      

        //Cencenbox
        $('.payment-top').on('click','.top-cencel',function(){
         $('#boxR2').hide();
         $('#boxR1').show();
         $('#txt-money-en').val(0);
         $('#txt-money-khr').val(0);
         

         $('.showdata-middle').parent('.middle-show-data').find('.receive-money-khr').text(0);
         $('.showdata-middle').parent('.middle-show-data').find('.receive-money-usd').text(0);
    
         $('.showdata-top').parent('.middle-show-data').find('.total-money-khr').text(0);
         $('.showdata-top').parent('.middle-show-data').find('.total-money-usd').text(0);

         $('.showdata-bottom').parent('.middle-show-data').find('.change-money-khr').text(0);
         $('.showdata-bottom').parent('.middle-show-data').find('.change-money-usd').text(0);
        });

        function changeMoney(changeKH){
         // alert(formattedPrice);
        //    alert(money);
           var totalkh =   formattedPrice * changeKH;
           totalkh= totalkh
           $('.data-right').parent('.pay-data').find('.total-val-kh').text(totalkh);

           var Dis = $('.payment-bottom').find('#txt-dis').val();
           Dis=parseFloat(Dis);
           
           // alert(Dis);
            if(Dis>=0){
               var totalDisUsd =  formattedPrice -   formattedPrice* Dis/100;
               totalDisUsd= totalDisUsd.toFixed(2)
               $('.data-right').parent('.pay-data').find('.after-dis-val-usd').text(totalDisUsd);
               var totalDisKh = totalDisUsd * changeKH;
               $('.data-right').parent('.pay-data').find('.after-dis-val-kh').text(totalDisKh);
               totalDisKh = totalDisKh.toFixed(2)
               $('.showdata-top').parent('.middle-show-data').find('.total-money-khr').text(totalDisKh);
               $('.showdata-top').parent('.middle-show-data').find('.total-money-usd').text(totalDisUsd);
               
            }
         
        }

        //discount
        $('.payment-bottom').on('blur','#txt-dis',function(event){
         var Value = $(this).val(); 
         var changeKH = $('.payment-bottom').find('#txt-exchange-money').val();
         $('.data-right').parent('.pay-data').find('.discount-val').text(Value);

         var money = $('.data-right').parent('.pay-data').find('.total-val-en').text();
         money=parseFloat(money);

         var totalDisUsd = money - money*Value/100;
         totalDisUsd=totalDisUsd.toFixed(3); 
         $('.data-right').parent('.pay-data').find('.after-dis-val-usd').text(totalDisUsd);
         var totalDisKh = totalDisUsd * changeKH;
         totalDisKh=totalDisKh.toFixed(3);
         $('.data-right').parent('.pay-data').find('.after-dis-val-kh').text(totalDisKh);

         $('.showdata-top').parent('.middle-show-data').find('.total-money-khr').text(totalDisKh);
         $('.showdata-top').parent('.middle-show-data').find('.total-money-usd').text(totalDisUsd);


   })
   //Re
   $('.middle-pay').on('blur','#txt-money-khr',function(){
    var MoneyKH= $(this).val();
    var MoneyUsd;
    var returnBackkh;
    var returnBackusd;
   //  var receiveKh=;
    var totalAmonthUsd=$('.showdata-top').parent('.middle-show-data').find('.total-money-usd').text();
    var totalAmonth=$('.showdata-top').parent('.middle-show-data').find('.total-money-khr').text();
    totalAmonth=parseFloat(totalAmonth);
    if(MoneyKH<totalAmonth){
      var txt='Please Enter Again'
      $('.showdata-middle').parent('.middle-show-data').find('.receive-money-usd').text(txt);
      $('.showdata-middle').parent('.middle-show-data').find('.receive-money-khr').text(txt);
      //   $(this).focus();
    }else{
      MoneyUsd= MoneyKH/changeKH;
      MoneyUsd= MoneyUsd.toFixed(3);
      returnBackusd = MoneyUsd - totalAmonthUsd;
      returnBackkh = MoneyKH - totalAmonth;
      returnBackusd =   returnBackusd.toFixed(3);
      returnBackkh = returnBackkh.toFixed(3);
      // alert(changeKH);
      $('.showdata-middle').parent('.middle-show-data').find('.receive-money-khr').text(MoneyKH);
      $('.showdata-middle').parent('.middle-show-data').find('.receive-money-usd').text(MoneyUsd);
    
     

      $('.showdata-bottom').parent('.middle-show-data').find('.change-money-khr').text(returnBackkh);
      $('.showdata-bottom').parent('.middle-show-data').find('.change-money-usd').text(returnBackusd);
   }
  
   });

   $('.middle-pay').on('blur','#txt-money-en',function(){
      var MoneyUsd= $(this).val();
      var MoneyKH;
      var returnBackkh;
      var returnBackusd;
      var totalAmonthKhr=$('.showdata-top').parent('.middle-show-data').find('.total-money-khr').text();
      var totalAmonth=$('.showdata-top').parent('.middle-show-data').find('.total-money-usd').text();
      totalAmonth=parseFloat(totalAmonth);
      if(MoneyUsd<totalAmonth){
        var txt='Please Enter Again'
        $('.showdata-middle').parent('.middle-show-data').find('.receive-money-usd').text(txt);
        $('.showdata-middle').parent('.middle-show-data').find('.receive-money-khr').text(txt);
         //  $(this).focus();
      }else{
        MoneyKH = MoneyUsd * changeKH;
      //   MoneyUsd= MoneyKH/4000;
       returnBackusd = MoneyUsd - totalAmonth;
       returnBackkh = MoneyKH - totalAmonthKhr;
       returnBackusd =   returnBackusd.toFixed(3);
       returnBackkh = returnBackkh.toFixed(3);
      // alert(changeKH);
      $('.showdata-middle').parent('.middle-show-data').find('.receive-money-khr').text(MoneyKH);
      $('.showdata-middle').parent('.middle-show-data').find('.receive-money-usd').text(MoneyUsd);
    
     

      $('.showdata-bottom').parent('.middle-show-data').find('.change-money-khr').text(returnBackkh);
      $('.showdata-bottom').parent('.middle-show-data').find('.change-money-usd').text(returnBackusd);
      }
    
     });

     $('.header-right').on('keyup','#Search',function(){
      var txtSearch = $(this).val();
        $(".row").load(`/admin/Sale/Search/${txtSearch}`, function(responseTxt, statusTxt, xhr){
          if(statusTxt == "success")

          // alert("External content loaded successfully!");
          if(statusTxt == "error")
          alert("Error: " + xhr.status + ": " + xhr.statusText);
    });    

     })

   //   $('.header-right').on('click','#Search',function(){

        

   //   })
   var newTab;
   $('.payment-bottom').on('click','#print-invoice',function(){
      //GETIT
      var txtIdValues =$('input[name="txt_id[]"]').map(function() {
         return $(this).val();
       }).get();
       //GETQTY
       var txtQtyValues=$('input[name="txt_qty[]"]').map(function() {
         return $(this).val();
       }).get();
    //get discount
       var dis= $('.payment-bottom').find('#txt-dis').val();
      //exchaneg
      var changeKH =$('.payment-bottom').find('#txt-exchange-money').val();
      //Total Before Discount
      var amount =formattedPrice;
       //Method Payment
      var MethodPay =$('.payment-bottom').find('#txt-case').val();
      
      var receiveMoneykhr =  $('.showdata-middle').parent('.middle-show-data').find('.receive-money-khr').text();
      receiveMoneykhr = parseFloat(receiveMoneykhr);

      var receiveMoneyusd =  $('.showdata-middle').parent('.middle-show-data').find('.receive-money-usd').text();
       receiveMoneyusd = parseFloat(receiveMoneyusd);
       
      var Returnback =$('.showdata-bottom').parent('.middle-show-data').find('.change-money-usd').text();
      Returnback= parseFloat(Returnback);

      var waitNo = $('.waiting-no').parent('.payment-bottom').find('#txt-waiting').val();
      alert(waitNo);
      // var data = {
       
      //    dis:dis,
      //    changeKH:changeKH,
      //    amount:amount,
      //    MethodPay:MethodPay,
      //    txtIdValues:txtIdValues,
      //    txtQtyValues:txtQtyValues
      //  };
      $.ajax({
         url: `/admin/Sale/Save/${txtIdValues}/${txtQtyValues}/${dis}/${changeKH}/${amount}/${MethodPay}/${receiveMoneykhr}/${receiveMoneyusd}/${waitNo}/${Returnback}`,
         type: 'GET',
         data: {},
         beforeSend: function() {
           // Code to execute before the request is sent
           // For example, you can display a loading spinner or disable a button
         },
         success: function(data) {
            
            //  alert(txtIdValues);
         newTab = window.open();
          newTab.document.open();
          newTab.document.write(data);
          newTab.document.close();
         },
         error: function(xhr, status, error) {
           // Code to execute if the request encounters an error
           // The 'xhr' parameter contains the XMLHttpRequest object
           // The 'status' parameter contains the status code
           // The 'error' parameter contains the error message
           console.log("AJAX request error:", error);
         }
       });
   });
   $('.box-invoice').on('click','.invoice-in',function(){
      closeTab()
      $.ajax({
         url: `/admin/Sale`,
         type: 'GET',
         data: {},
         beforeSend: function() {
           // Code to execute before the request is sent
           // For example, you can display a loading spinner or disable a button
         },
         success: function(data) {
            
            //  alert(txtIdValues);

         },
         error: function(xhr, status, error) {
           // Code to execute if the request encounters an error
           // The 'xhr' parameter contains the XMLHttpRequest object
           // The 'status' parameter contains the status code
           // The 'error' parameter contains the error message
           console.log("AJAX request error:", error);
         }
       });
      // alert("HELLO");
   })
   function closeTab() {
      close();
    }

    //Clear Data 
    
    $('.action-bottom').on('click','.btn-Clear',function(){
      $.ajax({
         beforeSend:function(){
                   //work before success    
         },
         success:function(data){ 
            // alert(Val);
            
            // alert(totalprice);
            item=0;
            $('.box-action').find('.item-num').text(item);

            totalprice=0;
            formattedPrice = 0;
            $('.box-action').find('.val-price').text(formattedPrice);
            $('tr td').remove();
            $('#boxR1').show();
            $('#boxR2').hide();
            // saveDataToStorage();
           
                   //work after success        
         }
      });
    });
//Chick  Sale back
   $('.header-right').on('click','.back',function(){
      $("body").load("/admin/Sale/Cencel", function(responseTxt, statusTxt, xhr){
         if(statusTxt == "success")
 
         // alert("External content loaded successfully!");
         if(statusTxt == "error")
         alert("Error: " + xhr.status + ": " + xhr.statusText);
     });
   });




});