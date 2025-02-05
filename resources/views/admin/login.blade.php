<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="icon" href="{{ asset('img/login.png')}}">
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous"
  />
    <link rel="stylesheet" href="{{asset('/admin/css/login.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="box-img">
        <img src="{{asset('/img/COFFEE.jpg')}}" alt="">
    </div>
    
    <form method="POST" action="{{route('authenticate')}}">
        @csrf
        <div class="box-in">
            <div class="header">
                <div class="header-in">
                     <p>LOGIN FORM</p>
                    <img src="{{asset('img/log-in.png')}}" alt="">
                </div>
            </div>
            <div class="body">
                 <div class="body-in">
                    <div class="UserName">
                        <div class="icon">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <input type="text" class=" @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter Your Username"  value="{{old('name')}}">
                        @error('name') 
                        <div class="invalid-feedback">
                         {{$message}}
                        </div>
                        @enderror 
                    </div>
                    <div class="Password">
                       
                        <input type="password" name="password" id="password" placeholder="Enter Your Password">
                        <div class="icon">
                            <i class="fa-solid fa-unlock"></i>
                        </div>
                    </div>
                   
                   
                 </div>
                 
            </div>
            <div class="footer">
                  <div class="footer-in">
                     <button type="submit">Login</button>
                  </div>
            </div>
        </div>
    </form>
</body>
</html>