<!DOCTYPE html>
<html>
   <head>
      <title>form</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <style type="text/css">
         .container{
         margin-top: 8%;
         width: 400px;
         border: ridge 1.5px white;
         padding: 20px;
         }
         body{
         background: #E0EAFC;  /* fallback for old browsers */
         background: -webkit-linear-gradient(to right, #CFDEF3, #E0EAFC);  /* Chrome 10-25, Safari 5.1-6 */
         background: linear-gradient(to right, #CFDEF3, #E0EAFC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
         }
      </style>
   </head>
   <body>
      <div class="container">
         <h2>Registration Form</h2>
         <form action="{{route('user-signup')}}" method="post">
            @csrf
            <div class="form-group">
               <label for="firstname">Full Name</label>
               <input type="text" class="form-control" id="exampleInputfirstname" value="{{old('fullname')}}" name="fullname">
               @if ($errors->has('firstname'))
                 <div class="text-danger">{{ $errors->first('firstname') }}</div>
                @endif
            </div>
           
            <div class="form-group">
               <label for="phoneno">Phone Number</label>
               <input type="text" class="form-control" id="exampleInputphoneno" value="{{old('phoneno')}}" name="phoneno">
               @if ($errors->has('phoneno'))
                 <div class="text-danger">{{ $errors->first('phoneno') }}</div>
                @endif
            </div>
            <div class="form-group">
               <label for="Email1">Email address</label>
               <input type="email" class="form-control" id="exampleInputEmail1" value="{{old('email')}}" aria-describedby="emailHelp" name="email">
               @if ($errors->has('email'))
                 <div class="text-danger">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="form-group">
               <label for="Password">Password</label>
               <input type="password" class="form-control" id="exampleInputPassword" value="{{old('password')}}" name="password">
               @if ($errors->has('password'))
                 <div class="text-danger">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary" name="create">Sign up</button>
         </form>
         @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
      </div>
   </body>
</html>