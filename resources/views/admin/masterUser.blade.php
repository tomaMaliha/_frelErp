<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{asset('public/assets/images/front-logo.png')}}">
    <!-- Page Title  -->
    <title>First Rays ERP</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{asset('public/assets/assets/css/dashlite.css?ver=1.8.0')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('public/assets/assets/css/theme.css?ver=1.8.0')}}">
    <link id="skin-default" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('css')
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
           

           

            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                
          

            @include('admin.partials.headerUser')


                <!-- main header @e -->
                <!-- content @s -->
                
                @yield('content')

                <!-- content @e -->
                <!-- footer @s -->
            
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{asset('public/assets/assets/js/bundle.js?ver=1.8.0')}}"></script>
    <script src="{{asset('public/assets/assets/js/scripts.js?ver=1.8.0')}}"></script>
    <script src="{{asset('public/assets/assets/js/charts/chart-ecommerce.js?ver=1.8.0')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
   @yield('js')
</body>

</html>