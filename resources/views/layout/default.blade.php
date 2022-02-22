<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Streamline KOL Portal</title>
	
	<meta name="description" content="@yield('page_description', $page_description ?? '')"/>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon.ico') }}">
	
	
	
	@if(!empty(config('dz.public.pagelevel.css.'.$action))) 
		@foreach(config('dz.public.pagelevel.css.'.$action) as $style)
				<link href="{{ asset($style) }}" rel="stylesheet" type="text/css"/>
		@endforeach
	@endif	

	{{-- Global Theme Styles (used by all pages) --}}
	@if(!empty(config('dz.public.global.css'))) 
		@foreach(config('dz.public.global.css') as $style)
			<link href="{{ asset($style) }}" rel="stylesheet" type="text/css"/>
		@endforeach
	@endif	
    <script type="text/javascript" src="https://d3js.org/d3.v4.min.js"></script>
</head>

<body>

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{!! url('/'); !!}" class="brand-logo">
			@if(!empty($logo))
				<img class="logo-abbr"  style="max-width: 150px;" src="{{ asset($logo) }}" alt="" />
                <img class="mini-logo-abbr" style="max-with: 50px;" src="{{ asset('images/logo-mini.png') }}" alt="" />
			@else
                <img class="logo-abbr" style="max-width: 150px;" src="{{ asset('images/logo.png') }}" alt="" />
			@endif	
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        
		@include('elements.header2')
		
		
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('elements.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

		
		
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            @yield('content')
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        
		@include('elements.footer')
		
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
	@include('elements.footer-scripts')

    <style>
        .nav-header .logo-abbr {
            max-width: 150px;
        }

        .nav-header .mini-logo-abbr {
            display: none;
        }

        .nav-header .mini-logo-abbr {
            max-width: 150px;
        }

        @media (max-width: 1200px) {
            .logo-abbr {
                display: none !important;
            }

            .nav-header .mini-logo-abbr {
                display: block !important;
                width: 50px;
            }
        }
    </style>
    @stack('css')
</body>
</html>