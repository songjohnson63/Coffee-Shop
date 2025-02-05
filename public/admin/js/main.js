$(document).ready(function(){
    var CodeMenu;
    var FormName;

    function getFormName(CodeMenu) {
      var Name;
      if (CodeMenu == 1) {
        Name = 'Product';
      } else if (CodeMenu == 3) {
        Name = 'User';
      } else if (CodeMenu == 4) {
        Name = 'Menu';
      } else if (CodeMenu == 5) {
        Name = 'Category';
      }
    
      return Name;
    }
  //Show list
    $('.container-admin').on('click','.admin-bottom ul li',function(){
      CodeMenu=$(this).data('menu');
      if(CodeMenu==0){
        $("body").load("/admin/Sale", function(responseTxt, statusTxt, xhr){
            if(statusTxt == "success")
    
            // alert("External content loaded successfully!");
            if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
        });
      }else if(CodeMenu==2){
        $("body").load("/admin/Report", function(responseTxt, statusTxt, xhr){
          if(statusTxt == "success")
             
          // alert("External content loaded successfully!");
          if(statusTxt == "error")
          alert("Error: " + xhr.status + ": " + xhr.statusText);
      });
    //   $("body").load("/admin/Sale", function(responseTxt, statusTxt, xhr){
    //     if(statusTxt == "success")

    //     // alert("External content loaded successfully!");
    //     if(statusTxt == "error")
    //     alert("Error: " + xhr.status + ": " + xhr.statusText);
    // });
      }else if(CodeMenu==10){
        $("body").load("/login", function(responseTxt, statusTxt, xhr){
          if(statusTxt == "success")
             
          // alert("External content loaded successfully!");
          if(statusTxt == "error")
          alert("Error: " + xhr.status + ": " + xhr.statusText);
        });
      }else if(CodeMenu==11){
        $("body").load("/logout", function(responseTxt, statusTxt, xhr){
          if(statusTxt == "success")
             
          // alert("External content loaded successfully!");
          if(statusTxt == "error")
          alert("Error: " + xhr.status + ": " + xhr.statusText);
        });
      }else{
          FormName=getFormName(CodeMenu);
          $("body").load(`/admin/${FormName}/List/${CodeMenu}`, function(responseTxt, statusTxt, xhr){
            if(statusTxt == "success")
    
            // alert("External content loaded successfully!");
            if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
        });

      }
      
    });
//Show Form
    $('.header-list').on('click','.btn-add',function(){
       CodeMenu=$(this).data('form');
       FormName=getFormName(CodeMenu);
      $("body").load(`/admin/${FormName}/Form/${CodeMenu}`, function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success")

        // alert("External content loaded successfully!");
        if(statusTxt == "error")
        alert("Error: " + xhr.status + ": " + xhr.statusText);
    });
      
    })
    //Exit Form
    $('.form-footer').on('click','.btn-Cencle',function(){
      CodeMenu=$(this).data('list');
      FormName=getFormName(CodeMenu);
      $("body").load(`/admin/${FormName}/List/${CodeMenu}`, function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success")

        // alert("External content loaded successfully!");
        if(statusTxt == "error")
        alert("Error: " + xhr.status + ": " + xhr.statusText);
    });
    });


// Get the current date
var currentDate = new Date().toISOString().split('T')[0];

// Set the current date as the value of the start_date input
$('#start_date').val(currentDate);

// Set the current date as the value of the end_date input
$('#end_date').val(currentDate);

//History Report
   $('.header-list').on('click','.HReport',function(){
    var DateCode= $(this).data('code');

    $("body").load(`/admin/Report/HReport/${DateCode}`, function(responseTxt, statusTxt, xhr){
      if(statusTxt == "success")

      // alert("External content loaded successfully!");
      if(statusTxt == "error")
      alert("Error: " + xhr.status + ": " + xhr.statusText);
  });

   });

//Total Sale Report
   $('.header-list').on('click','.TSReport',function(){
    var DateCode= $(this).data('code');
    // alert(DateCode);
    $("body").load(`/admin/Report/TSReport/${DateCode}`, function(responseTxt, statusTxt, xhr){
      if(statusTxt == "success")

      // alert("External content loaded successfully!");
      if(statusTxt == "error")
      alert("Error: " + xhr.status + ": " + xhr.statusText);
  });
    
  });
//Cencel Report
  $('.header-list').on('click','.exit-report',function(){

    $("body").load(`/admin/Report/Cencel`, function(responseTxt, statusTxt, xhr){
      if(statusTxt == "success")

      // alert("External content loaded successfully!");
      if(statusTxt == "error")
      alert("Error: " + xhr.status + ": " + xhr.statusText);
  });
  });

//btn Date
  $('.header-list').on('click','.Print-Report',function(){
    $('.tbl-data').print();
  });

//Click btn for set Permission

$('.tbl-data').on('click','.btn-pms img',function(){

  var indextr = $(this).parents('tr').index();

  var UID= $('tr:eq('+indextr+')').find('td:eq(0)').text();
  $("body").load( `/admin/Permission/${UID}`, function(responseTxt, statusTxt, xhr){
    if(statusTxt == "success")

    // alert("External content loaded successfully!");
    if(statusTxt == "error")
    alert("Error: " + xhr.status + ": " + xhr.statusText);
});
  });

 
  
 

});