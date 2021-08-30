<!DOCTYPE html>
<html>
   <head>
      <title>setting</title>
        <meta charset="utf-8">
       <meta name="viewport" content="width=device-width,initial-scale=1">
       <link rel="stylesheet" type="text/css" href={{asset('css/style1.css')}}>
       <link rel="icon" href={{asset('image/online-course-line.jpg')}}>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
     
    
    </head>
    <body>
        <header>
           <img src={{asset('image/Icon_Students_tcm100-3749853_tcm100-2750236-32.ico')}}>
           <ul>
                <li><a href="#">Enroll</a></li>
                <li><a href="#">mycourses</a></li>
                <li><a href="#">setting</a></li>
            @if(isset($LoggedUserInfo['username']))
                <li><a href="#">{{$LoggedUserInfo['username']}}</a></li>
            @endif
             
             
              
            </ul>
        <div class="woo">
            
            <input type="file" class="myfile" id="image" accept="image/*">
          
          
        </div>
        
        
        </header>
        <div class="warpp">
            
            <input type="file" class="myfile">
          
          
        </div>
        <form action="" method="get">
    
           <div class="items">
          <p>username:</p> 
                @if(isset($LoggedUserInfo['username']))
                    <label>{{$LoggedUserInfo['username']}}</label>
                @endif
           
             <input type="text" placeholder="edit username " name="user">
            
            </div>
         <div class="items">
            <p>email:</p>
               @if(isset($LoggedUserInfo['username']))
                    <label>{{$LoggedUserInfo['email']}}</label>
                @endif
                @csrf 
               <input type="email" placeholder="edit email" name="email">
             <button id="up"><a>update</a></button>
            </div>
       <button id="delet"><a href="{{ route('delete') }}">delete account</a></button>
    </form>
    </body>


</html>