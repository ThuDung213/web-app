<!doctype html>
<html class="h-100" lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name="description" content="A growing collection of ready to use components for the CSS framework Bootstrap 5">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('.t/img/favicon.png') }}">
    <meta name="author" content="Holger Koenemann">
    <meta name="generator" content="Eleventy v2.0.0">
    <meta name="HandheldFriendly" content="true">
    <title>Starter Page</title>
    <link rel="stylesheet" href="{{ asset('css/theme.min.css') }}">

    <style>
        /* inter-300 - latin */
        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: local(''),
                url('{{ asset('fonts/inter-v12-latin-300.woff2') }}') format('woff2'),
                /* Chrome 26+, Opera 23+, Firefox 39+ */
                url('{{ asset('fonts/inter-v12-latin-300.woff') }}') format('woff');
            /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: local(''),
                url('{{ asset('fonts/inter-v12-latin-500.woff2') }}') format('woff2'),
                /* Chrome 26+, Opera 23+, Firefox 39+ */
                url('{{ asset('fonts/inter-v12-latin-500.woff') }}') format('woff');
            /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: local(''),
                url('{{ asset('fonts/inter-v12-latin-700.woff2') }}') format('woff2'),
                /* Chrome 26+, Opera 23+, Firefox 39+ */
                url('{{ asset('fonts/inter-v12-latin-700.woff') }}') format('woff');
            /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
        }
    </style>

</head>

<body data-bs-spy="scroll" data-bs-target="#navScroll">

    <nav id="navScroll" class="navbar navbar-expand-lg navbar-light fixed-top text-white" tabindex="0">
        <div class="container">
            <a class="navbar-brand pe-4 fs-4" href="/">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" width="200" height="60">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-1 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#about" aria-label="Brings you to the frontpage">
                            私について
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#workwithus">
                            お問い合わせ
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    @if (Route::has('login'))
                        @guest
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link link-dark pb-1 link-fancy me-2">
                                    ログイン
                                    <path
                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                    <path
                                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link link-dark pb-1 link-fancy me-2">
                                        登録
                                        <path
                                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                        <path
                                            d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                    </a>
                                </li>
                            @endif
                        @else
                            @if (auth()->user()->role == 'admin')
                                <li class="nav-item">
                                    <a href="{{ route('home.admin') }}" class="nav-link link-dark pb-1 link-fancy me-2">
                                        マイページ
                                        <path
                                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                        <path
                                            d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                    </a>
                                </li>
                            @elseif (auth()->user()->role == 'creator')
                                <li class="nav-item">
                                    <a href="{{ route('home.creator') }}" class="nav-link link-dark pb-1 link-fancy me-2">
                                        マイページ
                                        <path
                                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                        <path
                                            d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('home.client') }}" class="nav-link link-dark pb-1 link-fancy me-2">
                                        マイページ
                                        <path
                                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                        <path
                                            d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                    </a>
                                </li>
                            @endif
                        @endguest
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="w-100 overflow-hidden bg-gradient" id="top">

            <div class="container position-relative">
                <div class="col-12 col-lg-8 mt-0 h-100 position-absolute top-0 end-0 bg-cover" data-aos="fade-left"
                    style="background-image: url({{ asset('img/webp/interior11.webp)') }});">
                </div>
                <div class="row">
                    <div class="col-lg-7 py-vh-6 position-relative" data-aos="fade-right">
                        <h1 class="display-1 fw-bold mt-5">タレント<br>マネジメントは<br>こちら!</h1>
                        <p class="lead">タスク管理から進捗状況まで、効果的なコラボレーションツールでプロジェクトを成功に導く!</p>
                        <a href="{{ route('login') }}"
                            class="btn btn-dark btn-xl shadow me-3 rounded-0 my-5">始めましょう！</a>
                    </div>
                </div>
            </div>

        </div>


        <div id="about" class="container py-vh-4 w-100 overflow-hidden">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-5">
                    <h3 class="py-5 border-top border-dark" data-aos="fade-right">私について</h3>
                </div>
                <div class="col-md-7" data-aos="fade-left">
                    <blockquote>
                        <div class="fs-4 my-3 fw-light pt-4 border-bottom pb-3">「このウェブサイトは１っか月ぐらい行われました。
                            調べながら開発しましたから、新しくて面白い技術を習いました。嬉しかったです。評価してくださって改善点をごコメントお願いします。
                            ありがとうございます！」</div>
                        <img src="{{ asset('img/junjun.jpg') }}" width="64" height="64"
                            class="img-fluid rounded-circle me-3" alt="" data-aos="fade">
                        <span><span class="fw-bold">トゥズン,</span>
                            システムエンジニア。</span>
                    </blockquote>
                </div>

            </div>
        </div>

        <div class="py-vh-6 bg-gray-900 text-light w-100 overflow-hidden" id="workwithus">
            <div class="container">
                <div class="row d-flex justify-content-center">

                    <div class="container py-vh-3 border-top" data-aos="fade" data-aos-delay="200">
                        <div class="row d-flex justify-content-center">
                            <div class="col-12 col-lg-8 text-center">
                                <h3 class="fs-2 fw-light">
                                    <span class="fw-bold">お問い合わせ</span>
                                </h3>
                            </div>
                            <div class="col-12 col-lg-8 text-center">
                                <div class="row">
                                    <div class="grouped-inputs border bg-light p-2">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group mb-2 mt-2">
                                                    <input type="email" class="form-control" id="emailInput" placeholder="メールアドレス">
                                                </div>
                                            </div>

                                            <div class="col-auto">
                                                <a href="#" class="btn btn-dark py-3 px-5">送信する
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

    </main>

    <footer>
        <div class="container small border-top">
            <div class="row py-5 d-flex justify-content-between">

                <div class="col-12 col-lg-6 col-xl-3 border-end p-5">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" width="150" height="60">
                    <address class="text-secondary mt-3">
                        <strong>Owner: Tran Thi Thu Dung</strong><br>
                        tranthudung21032003@gmail.com<br>
                    </address>
                </div>
            </div>
        </div>

        <div class="container text-center py-3 small">Made by <a href="https://templatedeck.com" class="link-fancy"
                target="_blank">templatedeck.com</a>
        </div>
    </footer>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script>
        AOS.init({
            duration: 800, // values from 0 to 3000, with step 50ms
        });
    </script>

    <script>
        let scrollpos = window.scrollY
        const header = document.querySelector(".navbar")
        const header_height = header.offsetHeight

        const add_class_on_scroll = () => header.classList.add("scrolled", "shadow-sm")
        const remove_class_on_scroll = () => header.classList.remove("scrolled", "shadow-sm")

        window.addEventListener('scroll', function() {
            scrollpos = window.scrollY;

            if (scrollpos >= header_height) {
                add_class_on_scroll()
            } else {
                remove_class_on_scroll()
            }

            console.log(scrollpos)
        })
    </script>

</body>

</html>
