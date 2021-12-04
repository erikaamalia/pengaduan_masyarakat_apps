
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <link rel="stylesheet" href="{{ asset('frontnews/CSS/style.css')}}">
  <link rel="stylesheet" media = 'screen and (max-width: 768px)' href="{{ asset('frontnews/CSS/mobile.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Lato|Staatliches&display=swap" rel="stylesheet">
  <link rel="shortcut icon" type="{{ asset('frontnews/image/x-icon')}}" href="{{ asset('frontnews/favicon.ico')}}">
  <script src="https://kit.fontawesome.com/85a5fdd30e.js" async></script>

  <title>Berita Situbondo</title>
</head>
<body>
  <nav id="main-nav">
    <div class="container">
      <img src="{{ asset('frontnews/img/logo.png')}}" alt="NewsMedia" class="logo">
      <div class = 'social'>
        <a href="http://facebook.com.br" target = 'blank'><i class="fab fa-facebook fa-2x"></i></a>
        <a href="http://twitter.com.br" target = 'blank'><i class="fab fa-twitter fa-2x"></i></a>
        <a href="http://instagram.com.br" target = 'blank'><i class="fab fa-instagram fa-2x"></i></a>
        <a href="http://youtube.com.br" target = 'blank'><i class="fab fa-youtube fa-2x"></i></a>
      </div>
      <ul>
        <li><a href="index.html" class="current">Home</a></li>
        <li><a href="about.html" >About</a></li>
      </ul>
    </div>
  </nav>
<!-- content -->


  @include('pages.news.inc.main')

<!-- footer -->
  @include('pages.news.inc.footer')
</body>
</html>