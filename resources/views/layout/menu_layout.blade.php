<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="../js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="dashboard">
                <div class="left">
                    <span class="left__icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                    <div class="left__content">
                        <div class="left__profile">
                            <div class="left__image"><img src="../images/avatar-admin.jpg" alt=""></div>
                        <a href="/" >
                        <p class="left__name">{{Auth::user()->FullName}}</p>
                        </a>
                        </div>
                        <ul class="left__menu">
                            <li class="left__menuItem">
                                <a href="/" class="left__title"><img src="../assets/icon-dashboard.svg" alt="">Bảng Điều Khiển</a>
                            </li>
                            @if (Auth::user()->RoleCode_FK == 2)
                                <li class="left__menuItem">
                                    <div class="left__title"><img src="../assets/icon-tag.svg" alt="">Bài Viết<img class="left__iconDown" src="../assets/arrow-down.svg" alt=""></div>
                                    <div class="left__text">
                                        <a class="left__link" href="{{route('News.index')}}">Tất Cả Bài Viết</a>
                                        <a class="left__link" href="{{route('News.create')}}">Thêm Bài Viết</a>
                                    </div>
                                </li>
                            @else @if (Auth::user()->RoleCode_FK == 1)
                                <li class="left__menuItem">
                                    <div class="left__title"><img src="../assets/icon-tag.svg" alt="">Bài Viết<img class="left__iconDown" src="../assets/arrow-down.svg" alt=""></div>
                                    <div class="left__text">
                                        <a class="left__link" href="{{route('News.index')}}">Tất Cả Bài Viết</a>
                                        <a class="left__link" href="{{route('News.create')}}">Thêm Bài Viết</a>
                                    </div>
                                </li>
                                @endif
                            @endif
                            @if (Auth::user()->RoleCode_FK == 1)
                                
                            <li class="left__menuItem">
                                <div class="left__title"><img src="../assets/icon-edit.svg" alt="">Chủ Đề<img class="left__iconDown" src="../assets/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="{{route('Category.index')}}">Tất Cả Chủ Đề</a>
                                    <a class="left__link" href="{{route('Category.create')}}">Thêm Chủ Đề</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="../assets/icon-book.svg" alt="">Thành viên<img class="left__iconDown" src="../assets/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="{{route('User.index')}}">Tài Khoản thành viên</a>
                                    <a class="left__link" href="{{route('User.create')}}">Thêm tài khoản</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="../assets/icon-book.svg" alt="">Tài Khoản<img class="left__iconDown" src="../assets/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="{{route('MemBer.index')}}">Tài Khoản Khách</a>
                                    <a class="left__link" href="{{route('MemBer.create')}}">Thêm tài khoản</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="../assets/icon-edit.svg" alt="">Banner<img class="left__iconDown" src="../assets/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="{{route('Banner.index')}}">Tất Cả Banner</a>
                                    <a class="left__link" href="{{route('Banner.create')}}">Thêm Banner</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="../assets/icon-book.svg" alt="">Admin<img class="left__iconDown" src="../assets/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="{{route('Roles.index')}}">Tất cả quyền</a>
                                <a class="left__link" href="{{route('Roles.create')}}">Thêm quyền</a>
                                </div>
                            </li>
                            @endif
                            <li class="left__menuItem">
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();" class="left__title" role="button" aria-haspopup="true" aria-expanded="false" v-pre><img src="../assets/icon-logout.svg" alt="">Đăng Xuất</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                {{--  --}}
                <div class="right">
                    <div class="right__content">
                @section('content')
                    @show
                </div>
            </div>
               {{--  --}}
            </div>
        </div>
    </div>

    <script src="../../js/menu.js"></script>
    <script src="../../ckeditor5/build/ckeditor.js"></script>
    @section('script')        
    @show
</body>
</html>