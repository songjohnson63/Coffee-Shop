
<div class="bottom-left">
    <ul>       
    @if (auth()->check() )
    @php
    $Auth= Auth::user();
    
@endphp

    @if ($Auth->type==1 || $Auth->type==3 || $Auth->type==2)
         @if ($Auth->type==3)
                    <li data-menu="0">
                    <div class="li-txt">
                        Sales
                    </div>
                    <img src="{{asset('img/coffee.png')}}" alt="">
                </li>
        @endif
        @if ($Auth->type==1)
        <li data-menu="0">
            <div class="li-txt">
                Sales
            </div>
            <img src="{{asset('img/coffee.png')}}" alt="">
        </li>
            <li data-menu="1">
                <div class="li-txt">
                    Product
                </div>
                
                <img src="{{asset('img/coffee-pods.png')}}" alt="">
            </li>
            <li data-menu="2">
                <div class="li-txt">
                    Report
                </div>
                <img src="{{asset('img/report.png')}}" alt="">
            </li>
            <li data-menu="3">
                <div class="li-txt">
                    USER
                </div>
            
                <img src="{{asset('img/user.png')}}" alt="">
            </li >
            <li data-menu="4">
                <div class="li-txt">
                    Menu
                </div>
            
                <img src="{{asset('img/fast-food.png')}}" alt="">
            </li>
            <li data-menu="5">
                <div class="li-txt">
                    Category
                </div>
    
                <img src="{{asset('img/menu.png')}}" alt="">
                </li>
        @endif
        @if ($Auth->type==2)
            @if ($proAid!=0)
                    <li data-menu="1">
                    <div class="li-txt">
                        Product
                    </div>
                    
                    <img src="{{asset('img/coffee-pods.png')}}" alt="">
                    </li>
            @endif

            @if ($reAid!=0)
                        <li data-menu="2">
                        <div class="li-txt">
                            Report
                        </div>
                        <img src="{{asset('img/report.png')}}" alt="">
                        </li>
            @endif
            
            @if ($userAid!=0 )
                    <li data-menu="3">
                        <div class="li-txt">
                            USER
                        </div>
                    
                        <img src="{{asset('img/user.png')}}" alt="">
                    </li >
            @endif
            
            @if ($menuAid!=0)
                    <li data-menu="4">
                        <div class="li-txt">
                            Menu
                        </div>
                    
                        <img src="{{asset('img/fast-food.png')}}" alt="">
                    </li>
            @endif
            
            @if ($catAid!=0)
                    <li data-menu="5">
                    <div class="li-txt">
                        Category
                    </div>

                    <img src="{{asset('img/menu.png')}}" alt="">
                    </li>
            @endif
        @endif
        
    
        <li data-menu='11'>
            <div class="li-txt">
            LogOut
            </div>
                    <img src="{{asset('img/check-out.png')}}" alt="">
        </li>
    
        @else
        <li data-menu='11'>
            <div class="li-txt">
            LogOut
            </div>
                    <img src="{{asset('img/check-out.png')}}" alt="">
        </li>
        @endif
        
       
        
    
    @else
        <li data-menu="10">
            <div class="li-txt">
                Login
            </div>
            <img src="{{asset('img/login.png')}}" alt="">
        </li>
        @endif
    
      
    </ul>
</div>