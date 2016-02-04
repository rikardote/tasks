<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Document</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
</head>
<body>

    @include('layout._nav')
    <div class="container">
      @yield('content')
    </div>  
    
    <div id="modal1" class="modal">
        <div class = "row AjaxisModal"></div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    <script type="text/javascript">var baseURL = "{{URL::to('/')}}"</script>
    <script type="text/javascript" src = "{{URL::to('js/AjaxisMaterialize.js')}}"></script>
    @yield('js')
</body>

</html>