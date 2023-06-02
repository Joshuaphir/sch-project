<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script-->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
     @vite('resources/css/app.css')
</head>
<body>
    <nav class="relative container mx-auto bg-yellow-700 mb-0 ring-2 ring-white md:mt-1 rounded-b-lg  text-white p-3">
        <div class="flex iterm-center justify-between">
            <div class="pt-2">
                <h1 class="md:text-2xl">MsMs</h1>
            </div>
        @guest
            <div class=" hidden md:flex space-x-6 pt-2">
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="p-1 hidden md:block md:px-4 text-white md:ring-1 md:ring-white md:ring-offset-1 md:ring-offset-gray-100 bg-yellow-700 border-2 border-blue-300 md:rounded-lg md:baseline">Login</a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="p-1 hidden md:block md:px-4 text-white md:ring-1 md:ring-white md:ring-offset-1 md:ring-offset-gray-100 bg-yellow-700 border-2 border-blue-300 md:rounded-lg md:baseline">Register</a>
                @endif
            </div>
        @else
            <div class=" hidden md:flex space-x-6 pt-2" id="menulist">
                <a href="/home" class="p-1 hidden md:block md:px-4 text-white md:ring-1 md:ring-white md:ring-offset-1 md:ring-offset-gray-100 bg-yellow-700 border-2 border-blue-300 md:rounded-lg md:baseline">Home</a>

                <a href="/posts" class="p-1 hidden md:block md:px-4 text-white md:ring-1 md:ring-white md:ring-offset-1 md:ring-offset-gray-100 bg-yellow-700 border-2 border-blue-300 md:rounded-lg md:baseline">Post</a>

                <a href="#" class="p-1 hidden md:block md:px-4 text-white md:ring-1 md:ring-white md:ring-offset-1 md:ring-offset-gray-100 border-2 border-blue-300 bg-yellow-700 md:rounded-lg md:baseline">Resources</a>

                <a href="#" class="p-1 hidden md:block md:px-4 text-white md:ring-1 md:ring-white md:ring-offset-1 md:ring-offset-gray-100 border-2 border-blue-300 bg-yellow-700 md:rounded-lg md:baseline">Notifications</a>
            </div>
            <div class="md:flex space-x-6 pt-2 mx-4">
                <a href="#" class="p-1 hidden md:block px-6 text-white ring-1 ring-white ring-offset-1 ring-offset-gray-100 bg-yellow-700 rounded-full baseline">Profile</a>
                <a href="{{ route('logout') }}" class="p-1 hidden md:block px-6 text-white ring-1 ring-white ring-offset-1 ring-offset-gray-100 bg-yellow-700 rounded-full baseline"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        @endguest
        </div>
    </nav>
    <main class="p-4">
        @yield('content')
    </main>
    
</body>
<script type="text/javascript" src="{{url('js/main.js')}}"></script>
<script type="text/javascript" src="{{url('js/jquery.js')}}"></script>
<script>
    $(document).ready(function() {
        fetch_customer_data();
        function fetch_customer_data(query='') {
            $.ajax({
                url:"{{ route('post.search') }}",
                method: 'GET',
                data: {query:query},
                dataType:'json',
                success: function(data) {
                    $('#data').html(data.table_data);
                    $('#total').text(data.total_data);
                }
            });
        }

        $(document).on('keyup','#search',function() {
            var query = $(this).val();
            fetch_customer_data(query);
        });
    });
       
</script>
</html>
