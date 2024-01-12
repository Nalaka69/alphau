@extends('app.welcome.layout.app')
@section('title')
    AlphaU - NIE Radio for Students 24/7
@endsection
@section('welcomebody')
    <div class="ms_blog_wrapper">
        <div class="row">
            <div class="col-lg-6">
                <div class="ms_blog_section blog_active marger_bottom30">
                    <div class="ms_blog_img">
                        <img src="{{ asset('admin/images/blog/blog1.jpg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="ms_main_overlay">
                        <div class="ms_box_overlay"></div>
                        <div class="ovrly_text_div">
                            <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 3</a></span>
                            <div class="bottom">
                                <span class="ovrly_text1">May 12,2018</span>
                                <span class="ovrly_text2"><a href="{{route('welcome.blog.single.index')}}"><i
                                            class="fa fa-long-arrow-right"></i></a></span>
                            </div>
                        </div>
                    </div>
                    <div class="ms_box_overlay_on">
                        <div class="ovrly_text_div">
                            <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 3</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ms_blog_section marger_bottom30">
                            <div class="ms_blog_img">
                                <img src="{{ asset('admin/images/blog/blog2.jpg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="ms_main_overlay">
                                <div class="ms_box_overlay"></div>
                                <div class="ovrly_text_div">
                                    <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 3</a></span>
                                    <div class="bottom">
                                        <span class="ovrly_text1">May 12,2018</span>
                                        <span class="ovrly_text2"><a href="{{route('welcome.blog.single.index')}}"><i
                                                    class="fa fa-long-arrow-right"></i></a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="ms_box_overlay_on">
                                <div class="ovrly_text_div">
                                    <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 2</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ms_blog_section marger_bottom30">
                            <div class="ms_blog_img">
                                <img src="{{ asset('admin/images/blog/blog3.jpg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="ms_main_overlay">
                                <div class="ms_box_overlay"></div>
                                <div class="ovrly_text_div">
                                    <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 3</a></span>
                                    <div class="bottom">
                                        <span class="ovrly_text1">May 12,2018</span>
                                        <span class="ovrly_text2"><a href="{{route('welcome.blog.single.index')}}"><i
                                                    class="fa fa-long-arrow-right"></i></a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="ms_box_overlay_on">
                                <div class="ovrly_text_div">
                                    <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 2</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ms_blog_section marger_bottom30">
                            <div class="ms_blog_img">
                                <img src="{{ asset('admin/images/blog/blog4.jpg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="ms_main_overlay">
                                <div class="ms_box_overlay"></div>
                                <div class="ovrly_text_div">
                                    <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 1</a></span>
                                    <div class="bottom">
                                        <span class="ovrly_text1">May 12,2018</span>
                                        <span class="ovrly_text2"><a href="{{route('welcome.blog.single.index')}}"><i
                                                    class="fa fa-long-arrow-right"></i></a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="ms_box_overlay_on">
                                <div class="ovrly_text_div">
                                    <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 1</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ms_blog_section marger_bottom30">
                            <div class="ms_blog_img">
                                <img src="{{ asset('admin/images/blog/blog5.jpg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="ms_main_overlay">
                                <div class="ms_box_overlay"></div>
                                <div class="ovrly_text_div">
                                    <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 2</a></span>
                                    <div class="bottom">
                                        <span class="ovrly_text1">May 12,2018</span>
                                        <span class="ovrly_text2"><a href="{{route('welcome.blog.single.index')}}"><i
                                                    class="fa fa-long-arrow-right"></i></a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="ms_box_overlay_on">
                                <div class="ovrly_text_div">
                                    <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 3</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                {{-- <div class="row">
            <div class="col-lg-5">
                <div class="ms_blog_section marger_bottom30">
                    <div class="ms_blog_img">
                        <img src="{{asset('admin/images/blog/blog6.jpg')}}" alt="" class="img-fluid">
                    </div>
                    <div class="ms_main_overlay">
                        <div class="ms_box_overlay"></div>
                        <div class="ovrly_text_div">
                            <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 3</a></span>
                            <div class="bottom">
                                <span class="ovrly_text1">May 12,2018</span>
                                <span class="ovrly_text2"><a href="{{route('welcome.blog.single.index')}}"><i class="fa fa-long-arrow-right"></i></a></span>
                            </div>
                        </div>
                    </div>
                    <div class="ms_box_overlay_on">
                        <div class="ovrly_text_div">
                            <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 3</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ms_blog_section marger_bottom30">
                    <div class="ms_blog_img">
                        <img src="{{asset('admin/images/blog/blog8.jpg')}}" alt="" class="img-fluid">
                    </div>
                    <div class="ms_main_overlay">
                        <div class="ms_box_overlay"></div>
                        <div class="ovrly_text_div">
                            <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 3</a></span>
                            <div class="bottom">
                                <span class="ovrly_text1">May 12,2018</span>
                                <span class="ovrly_text2"><a href="{{route('welcome.blog.single.index')}}"><i class="fa fa-long-arrow-right"></i></a></span>
                            </div>
                        </div>
                    </div>
                    <div class="ms_box_overlay_on">
                        <div class="ovrly_text_div">
                            <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 3</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ms_blog_section">
                    <div class="ms_blog_img">
                        <img src="{{asset('admin/images/blog/blog10.jpg')}}" alt="" class="img-fluid">
                    </div>
                    <div class="ms_main_overlay">
                        <div class="ms_box_overlay"></div>
                        <div class="ovrly_text_div">
                            <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 3</a></span>
                            <div class="bottom">
                                <span class="ovrly_text1">May 12,2018</span>
                                <span class="ovrly_text2"><a href="{{route('welcome.blog.single.index')}}"><i class="fa fa-long-arrow-right"></i></a></span>
                            </div>
                        </div>
                    </div>
                    <div class="ms_box_overlay_on">
                        <div class="ovrly_text_div">
                            <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 3</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="ms_blog_section">
                    <div class="ms_blog_img">
                        <img src="{{asset('admin/images/blog/blog9.jpg')}}" alt="" class="img-fluid">
                    </div>
                    <div class="ms_main_overlay">
                        <div class="ms_box_overlay"></div>
                        <div class="ovrly_text_div">
                            <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 3</a></span>
                            <div class="bottom">
                                <span class="ovrly_text1">May 12,2018</span>
                                <span class="ovrly_text2"><a href="{{route('welcome.blog.single.index')}}"><i class="fa fa-long-arrow-right"></i></a></span>
                            </div>
                        </div>
                    </div>
                    <div class="ms_box_overlay_on">
                        <div class="ovrly_text_div">
                            <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 3</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-lg-6">
        <div class="row">
            <div class="col-lg-5">
                <div class="ms_blog_section marger_bottom30">
                    <div class="ms_blog_img">
                        <img src="{{asset('admin/images/blog/blog7.jpg')}}" alt="" class="img-fluid">
                    </div>
                    <div class="ms_main_overlay">
                        <div class="ms_box_overlay"></div>
                        <div class="ovrly_text_div">
                            <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 3</a></span>
                            <div class="bottom">
                                <span class="ovrly_text1">May 12,2018</span>
                                <span class="ovrly_text2"><a href="{{route('welcome.blog.single.index')}}"><i class="fa fa-long-arrow-right"></i></a></span>
                            </div>
                        </div>
                    </div>
                    <div class="ms_box_overlay_on">
                        <div class="ovrly_text_div">
                            <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 3</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ms_blog_section marger_bottom30">
                    <div class="ms_blog_img">
                        <img src="{{asset('admin/images/blog/blog11.jpg')}}" alt="" class="img-fluid">
                    </div>
                    <div class="ms_main_overlay">
                        <div class="ms_box_overlay"></div>
                        <div class="ovrly_text_div">
                            <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 3</a></span>
                            <div class="bottom">
                                <span class="ovrly_text1">May 12,2018</span>
                                <span class="ovrly_text2"><a href="{{route('welcome.blog.single.index')}}"><i class="fa fa-long-arrow-right"></i></a></span>
                            </div>
                        </div>
                    </div>
                    <div class="ms_box_overlay_on">
                        <div class="ovrly_text_div">
                            <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 3</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ms_blog_section">
                    <div class="ms_blog_img">
                        <img src="{{asset('admin/images/blog/blog12.jpg')}}" alt="" class="img-fluid">
                    </div>
                    <div class="ms_main_overlay">
                        <div class="ms_box_overlay"></div>
                        <div class="ovrly_text_div">
                            <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 3</a></span>
                            <div class="bottom">
                                <span class="ovrly_text1">May 12,2018</span>
                                <span class="ovrly_text2"><a href="{{route('welcome.blog.single.index')}}"><i class="fa fa-long-arrow-right"></i></a></span>
                            </div>
                        </div>
                    </div>
                    <div class="ms_box_overlay_on">
                        <div class="ovrly_text_div">
                            <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 3</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="ms_blog_section">
                    <div class="ms_blog_img">
                        <img src="{{asset('admin/images/blog/blog13.jpg')}}" alt="" class="img-fluid">
                    </div>
                    <div class="ms_main_overlay">
                        <div class="ms_box_overlay"></div>
                        <div class="ovrly_text_div">
                            <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 3</a></span>
                            <div class="bottom">
                                <span class="ovrly_text1">May 12,2018</span>
                                <span class="ovrly_text2"><a href="{{route('welcome.blog.single.index')}}"><i class="fa fa-long-arrow-right"></i></a></span>
                            </div>
                        </div>
                    </div>
                    <div class="ms_box_overlay_on">
                        <div class="ovrly_text_div">
                            <span class="ovrly_text1"><a href="{{route('welcome.blog.single.index')}}">blog 3</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
            </div>
        </div>
    </div>
@endsection
