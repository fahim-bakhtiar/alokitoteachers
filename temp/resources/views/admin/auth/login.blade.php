<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">    

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            form{
                color:#fff;
            }
        </style>
    </head>
    <body class="antialiased">

        <div style="background-color: #041625;">
            

            <div class="container">

                <div class="row align-items-center align-content-center" style="min-height:100vh;">

                    <div class="col-12 text-center">

                        <img src="{{asset_url('dist/img/alokito_logo.png')}}" alt="Alokito Teachers Logo" class="img-fluid mb-5" style="height:auto;width:200px;">

                    </div>

                        
                    <div class="offset-4 col-4">

                        <div class="text-left shadow" style="background-color: #0c0c0c;padding: 50px;border-radius: 10px;">
                            
                            <form method="post" action="{{route('admin.login')}}">

                                @csrf
                                
                                <div class="mb-3">

                                    <label for="exampleInputEmail1" class="form-label">Email address</label>

                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>

                                </div>

                                <div class="mb-3">

                                    <label for="exampleInputPassword1" class="form-label">Password</label>

                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>

                                </div>

                                <button type="submit" class="btn btn-primary w-100">Sign In</button>

                            </form>

                            @if(Session::has('info'))

                            <p class="text-white mt-3">*{{session('info')}}</p>

                            @endif
                            
                        </div>

                    </div>
                    
                </div>

            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
