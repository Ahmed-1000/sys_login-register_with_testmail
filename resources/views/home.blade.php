





<!DOCTYPE html>
<html>
   <head>
      <title>Home</title>
        <meta charset="utf-8">
       <meta name="viewport" content="width=device-width,initial-scale=1">
       <link rel="stylesheet" type="text/css" href={{asset('css/style1.css')}}>
       <link rel="icon" href={{asset('image/online-course-line.jpg')}}>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
     <style>
       
          .woo{
                   height: 33px;
                  width: 38px;
                  position: absolute;
   
                  top: -30px;
                  left: 84.3%;
                  bottom: 120px;
                  border: 2px solid #fff;
                   border-radius: 50%;
                   background: url(image/avatar.jpg);
                  background-size: 100% 100%;
                  margin: 60px auto;
                   overflow: hidden; 
  
              }
       
       
    </style>
    
    </head>
    <body>
        <header>
           <img src={{asset('image/online-course-line.jpg')}}>
           <ul>
                <li><a href="#">Enroll</a></li>
                <li><a href="#">mycourses</a></li>
              <li><a href={{route('setting')}}>setting</a></li>
            @if(isset($LoggedUserInfo['username']))
                <li><a href="#">{{$LoggedUserInfo['username']}}</a></li>
            @endif
            @csrf   
             
             <button id="log"><a href="{{ route('logout') }}">log out</a></button>
             
              
            </ul>
            
        <div class="woo">
            
            <input type="file" class="myfile" id="image" accept="image/*">
          
          
        </div>
         
        
        </header>
        <div class="text-post">
        
            
        </div>
      
         @yield("content")
    
    </body>


</html>