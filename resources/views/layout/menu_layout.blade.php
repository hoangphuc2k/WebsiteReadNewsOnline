<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="../../css/menu.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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
                            <div class="left__image"><img src="../../img/{{Auth::User()->Img}}" alt=""></div>
                        <a href="/" >
                        <p class="left__name">{{Auth::user()->FullName}}</p>
                        </a>
                        </div>
                        <ul class="left__menu">
                            <li class="left__menuItem">
                                <a href="/" class="left__title"><img src="../../assets/icon-dashboard.svg" alt="">Bảng Điều Khiển</a>
                            </li>
                            @if (Auth::user()->RoleCode_FK == 2)
                                <li class="left__menuItem">
                                    <div class="left__title"><img src="../../assets/icon-tag.svg" alt="">Bài Viết<img class="left__iconDown" src="../../assets/arrow-down.svg" alt=""></div>
                                    <div class="left__text">
                                        <a class="left__link" href="{{route('News.index')}}">Tất Cả Bài Viết</a>
                                        <a class="left__link" href="{{route('News.create')}}">Thêm Bài Viết</a>

                                    </div>
                                </li>
                            @else @if (Auth::user()->RoleCode_FK == 1)
                                <li class="left__menuItem">
                                    <div class="left__title"><img src="../../assets/icon-tag.svg" alt="">Bài Viết<img class="left__iconDown" src="../../assets/arrow-down.svg" alt=""></div>
                                    <div class="left__text">
                                        <a class="left__link" href="{{route('News.index')}}">Tất Cả Bài Viết</a>
                                        <a class="left__link" href="{{route('News.create')}}">Thêm Bài Viết</a>
                                    </div>
                                </li>
                                @endif
                            @endif
                            @if (Auth::user()->RoleCode_FK == 1)
                                
                            <li class="left__menuItem">
                                <div class="left__title"><img src="../../assets/icon-edit.svg" alt="">Chuyên Mục<img class="left__iconDown" src="../../assets/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="{{route('Category.index')}}">Quản Lí Chuyên Mục</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="../../assets/icon-book.svg" alt="">Thành viên<img class="left__iconDown" src="../../assets/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="{{route('User.index')}}">Tài Khoản thành viên</a>
                                    <a class="left__link" href="{{route('User.create')}}">Thêm tài khoản</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="../../assets/icon-book.svg" alt="">Tài Khoản<img class="left__iconDown" src="../../assets/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="{{route('MemBer.index')}}">Tài Khoản Khách</a>
                                    <a class="left__link" href="{{route('MemBer.create')}}">Thêm tài khoản</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="../../assets/icon-edit.svg" alt="">Banner<img class="left__iconDown" src="../../assets/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="{{route('Banner.index')}}">Tất Cả Banner</a>
                                    <a class="left__link" href="{{route('Banner.create')}}">Thêm Banner</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="../../assets/icon-book.svg" alt="">Admin<img class="left__iconDown" src="../../assets/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="{{route('Roles.index')}}">Quản Lí Quyền</a>
                                    <a class="left__link" href="">Phân Quyền Người Dùng</a>
                                </div>
                            </li>
                            @endif
                            <li class="left__menuItem">
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();" class="left__title" role="button" aria-haspopup="true" aria-expanded="false" v-pre><img src="../../assets/icon-logout.svg" alt="">Đăng Xuất</a>
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
                        <div class="right__title">Báo Mới 404</div>
                            <p class="right__desc">Bảng điều khiển</p>
                            @php
                                $countNews = count(App\News::where('Status','=','Yes')->get());
                                $countCategory = count(App\Category::where('Status','=','Yes')->get());
                                $countComment = count(App\Comment::where('Status','=','Yes')->get());
                                $countMember = count(App\Member::where('Status','=','Yes')->get());
                            @endphp
                            <div class="right__cards">
                                <a class="right__card" href="{{route('News.index')}}">
                                    <div class="right__cardTitle">Tất Cả Bài Viết</div>
                                    <div class="right__cardNumber">{{$countNews}}</div>
                                    <div class="right__cardDesc">Xem Chi Tiết <img src="../../assets/arrow-right.svg" alt=""></div>
                                </a>
                                <a class="right__card" href="{{route('Category.index')}}">
                                    <div class="right__cardTitle">Chuyên Mục</div>
                                    <div class="right__cardNumber">{{$countCategory}}</div>
                                    <div class="right__cardDesc">Xem Chi Tiết <img src="../../assets/arrow-right.svg" alt=""></div>
                                </a>
                                <a class="right__card" href="">
                                    <div class="right__cardTitle">Bình Luận</div>
                                    <div class="right__cardNumber">{{$countComment}}</div>
                                    <div class="right__cardDesc">Xem Chi Tiết <img src="../../assets/arrow-right.svg" alt=""></div>
                                </a>
                                <a class="right__card" href="{{route('MemBer.index')}}">
                                    <div class="right__cardTitle">Đọc Giả</div>
                                    <div class="right__cardNumber">{{$countMember}}</div>
                                    <div class="right__cardDesc">Xem Chi Tiết <img src="../../assets/arrow-right.svg" alt=""></div>
                                </a>
                            </div>
                @section('content')
                    @show
                </div>
            </div>
               {{--  --}}
            </div>
        </div>
    </div>

    <script src="../../../js/menu.js"></script>
    <script src="../../../ckeditor5/build/ckeditor.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
    <script src="../../js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>
    <script>
         $('.table').dataTable( {
      "language": {
      "sProcessing":   "Đang xử lý...",
      "sLengthMenu":   "Xem _MENU_ mục",
      "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
      "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
      "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
      "sInfoFiltered": "(được lọc từ _MAX_ mục)",
      "sInfoPostFix":  "",
      "sSearch":       "Tìm:",
      "sUrl":          "",
      "oPaginate": {
          "sFirst":    "Đầu",
          "sPrevious": "Trước",
          "sNext":     "Tiếp",
          "sLast":     "Cuối"
          }
      },
      "processing": true, // tiền xử lý trước
      "aLengthMenu": [[5, 10, 20, 50], [5, 10, 20, 50]], // danh sách số trang trên 1 lần hiển thị bảng
      "order": [[ 1, 'desc' ]] //sắp xếp giảm dần theo cột thứ 1
        });
    </script>
    @section('script')        
    @show
</body>
</html>