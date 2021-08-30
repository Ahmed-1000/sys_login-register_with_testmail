



<!doctype html>
<html>
   <head>
      <title>login page</title>
         <link rel="stylesheet" href={{ asset('css/style2.css') }}>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width,initial-scale=1">
       <script src="https://kit.fontawesome.com/a076d05399.js"></script>
     
    
  </head>
  <body>
   <svg xmlns="http://www.w3.org/2000/svg" width="446" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
  </svg>
      <form action={{ route('aut-check') }} method="post">
          @if(Session::get('fail'))
             <div class="danger mss">
                 {{Session::get('fail')}}
             </div>
             
          @endif
        
          
          @csrf
          <h1>login</h1>
          <div class="text-box">
             <i class="fas fa-user"></i>
             <input type="text" name="username" placeholder="email" value="{{old('username')}}">
              <span class="text-dander">@error('username'){{$message}}@enderror</span>
          
          </div>
          <div class="text-box">
              <i class="fas fa-unlock-alt"></i>
             <input type="password" name="password" id="pass" placeholder="password" value="{{old('password')}}">
             
              <span class="text-dander">@error('password'){{$message}}@enderror</span>
               <div id="toggle" onclick=" showhidden();"></div>
          </div>
          <input type="submit" name="" value="sign in">
          <p class="message">Do you have account? <span><a href="{{route('aut-register')}}">sign up</a></span></p>
      
      
      </form>
      <script>
          const password = document.getElementById('pass');
          const toggle = document.getElementById('toggle');
          
          function showhidden(){
              
              if(password.type == 'password'){
                  password.setAttribute('type','text');
                  toggle.classList.add('hide');
              }else{
                    password.setAttribute('type','password');
                  toggle.classList.remove('hide');
                  
              }
              
          }
      
      
      </script>
    
    
    
 </body>


</html>