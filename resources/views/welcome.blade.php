<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ElectrOrder</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normapze.css v8.0.1 | MIT pcense | github.com/necolas/normapze.css */
        html {
            pne-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BpnkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            pne-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 sopd #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-apgn: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            apgn-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            pne-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .label-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-apgn: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underpne {
            text-decoration: underpne
        }

        .antiapased {
            -webkit-font-smoothing: antiapased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                apgn-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-apgn: left
            }

            .sm\:text-right {
                text-apgn: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }
        }

    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .carousel{
            max-width:1000px;
            height: 580px;
        }

.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  text-align: center;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}


    </style>
</head>

<body class="antiapased">

    @extends('layouts.app')

    @section('content')
        <div class="container">
            <div class="row ">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="/categories/laptop" >Laptops</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/categories/desktop" >Desktops</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/categories/component" >Components</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/aboutus" >About Us</a>
                    </li>
                </ul>

                <div class="col-sm ">

                  <div id="carouselExampleInterval" class="carousel slide mb-3" data-ride="carousel" >
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleInterval" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleInterval" data-slide-to="1"></li>
                      <li data-target="#carouselExampleInterval" data-slide-to="2"></li>
                      <li data-target="#carouselExampleInterval" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner" data-interval="1000">
                      <div class="carousel-item active">
                        <img src="https://cdn.mos.cms.futurecdn.net/wkNecKqj64E24FugVwnQzd-970-80.jpg.webp"
                        class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item" data-interval="2000">
                        <img src="https://www.techspot.com/images2/news/bigimage/2020/10/2020-10-08-image-14.jpg"
                        class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item" data-interval="3000">
                        <img src="https://cdn.mos.cms.futurecdn.net/5c2c84d9858776dd49835610d9c14deb.jpg"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://cdn.wccftech.com/wp-content/uploads/2020/12/ASUS-ROG-STRIX-Gaming-Laptops-2021_-AMD-Ryzen-5000H-Zen-3-CPUs-NVIDIA-GeForce-RTX-3080-GPUs-_5.jpg"
                            class="d-block w-100" alt="...">
                    </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
               
                          
                              
                         
                        <div class="row justify-content-left">
                            @foreach ($products as $product)
                                <div class="col-sm col-md-3 mb-4 text-center">
                                    <a href="/products/{{ $product->id }}" class="text-dark">
                                        <div class="card " style="width: 100%; height: 100%;">
                                            <img src="{{ $product->img }}" alt="" style="width: 100%;">
                                            <div class="card-body">
                                                @if ($product->img != '')
                                                    <img class="rounded " src="{{ asset('/storage/img/' . $product->img) }}"
                                                        style="width:150px; height: 100%;">
                                                @endif
                                            </div>
                                            <div class="card-body">
                                                <label> {{ $product->ProductName }}</label><br>
                                                {{-- <label>{{ $product->ProductDescription }}</label> --}}
                                                <label>Php {{ $product->Price }}</label>
                                                {{-- <label>{{ $product->Status }}</label> --}}

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>

</html>
