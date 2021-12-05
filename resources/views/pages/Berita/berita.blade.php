<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PENGKAT | Berita</title>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="icon" href="{{ asset('img/favicon.svg')}}">
  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>
</head>

<body class="leading-normal tracking-normal" style="font-family: 'Montserrat', sans-serif">

    <nav class="flex items-center justify-between flex-wrap bg-blue-200 p-7 px-20">
      <div class="flex items-center flex-shrink-0 text-black mr-6">
        <img src="{{ asset('img/logo.svg')}}" alt=""
          class="transform transition hover:scale-125 duration-300 ease-in-out" />
        <span class="font-bold tracking-wider text-xl">
          &nbsp PENGKAT</span>
      </div>

      <div class="block lg:hidden">
        <button
          class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
          <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
          </svg>
        </button>
      </div>

      <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto text-center">
        <div class="text-md lg:flex-grow">
          <a href="/" class="block mt-4 lg:inline-block lg:mt-0 text-black mr-4">
            Home
          </a>
          <a href="/#how" class="block mt-4 lg:inline-block lg:mt-0 text-black mr-4">
            Tata Cara
          </a>
          <a href="#" class="block mt-4 lg:inline-block lg:mt-0 text-black mr-4">
              Kabar Berita
            </a>
        </div>

        <div>
          <button
            class="text-black font-normal rounded-md py-3 border-black px-4 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            <a href="{{ url('login')}}">Masuk</a>
          </button>
          <button
            class="text-blue-500 font-medium rounded-md py-3 px-4 border-2 border-white focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            <a href="{{ url('register')}}">Daftar</a>
          </button>
        </div>
      </div>
    </nav>

    @foreach ($news as $article)
    <div class="col-md-4 col-sm-12 mt-4">
        <div class="card">
            <img src="https://atlantictravelsusa.com/wp-content/uploads/2016/04/dummy-post-horisontal-thegem-blog-default.jpg" class="card-img-top" alt="gambar" >
            <div class="card-body">
                <h5 class="card-title">{{ $article->judul }}</h5>
                <a href="#" class="btn btn-primary">Baca berita</a>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Footer -->
    <footer class="text-center font-medium bg-blue-200 py-5">
      © 2021 PENGKAT
    </footer>
    @include('sweetalert::alert')
  </body>
  @include('pages.chatbot.chatbot')
</html>
