@extends('app.welcome.layout.app')
@section('title')
    AlphaU - NIE Radio for Students 24/7
@endsection
@section('welcomebody')
<div class="ms_blog_single_wrapper">
    <div class="row">
        <div class="col-lg-9 col-md-9">
            <div class="ms_blog_single">
                <div class="blog_single_img">
                    <img src="{{asset('admin/images/blog/blog_single.jpg')}}" alt="" class="img-fluid">
                </div>
                <div class="blog_single_content">
                    <h3 class="ms_blog_title">Dream Your Moments</h3>
                    <div class="ms_post_meta">
                        <ul>
                            <li>May 05,2018 / </li>
                            <li>12 likes /    </li>
                            <li>8 comments    </li>
                        </ul>
                    </div>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                    <blockquote>
                        Music is composed and performed for many purposes, ranging from aesthetic pleasure, religious or ceremonial purposes, or as an entertainment product for the marketplace.
                    </blockquote>
                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>
                    <div class="ms_blog_tag foo_sharing">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="blog_comments">
                    <h1>comments</h1>
                    <ol>
                        <li>
                            <div class="ms_comment_section">
                                <div class="comment_img">
                                    <img src="{{asset('admin/images/blog/author.jpg')}}" alt="">
                                </div>
                                <div class="comment_info">
                                    <div class="comment_head">
                                        <h3>Krystal C. Rahn</h3>
                                        <p>april 28,2018 at 20:45</p>
                                    </div>
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                                    <a href="#" class="comment_reply">reply</a>
                                </div>
                            </div>
                        </li>
                    </ol>
                </div>
                <!----Blog Comment Form---->
                {{-- <div class="blog_comments_forms">
                    <h1>Leave A Comment</h1>
                    <form>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="comment_input_wrapper">
                                    <input name="name" value="" type="text" class="cmnt_field" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="comment_input_wrapper">
                                    <input name="email" value="" type="email" class="cmnt_field" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="comment_input_wrapper">
                                    <textarea id="comment" name="comment" class="cmnt_field" placeholder="Your Comments"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="comment-form-submit">
                                    <input name="submit" type="submit" id="comment-submit" class="submit ms_btn" value="Post Comment">
                                </div>
                            </div>
                        </div>
                   </form>
                </div> --}}
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <!----Sidebar Start---->
            <div class="ms_sidebar">
                <div class="widget widget_search">
                    <input type="text" class="form-control" placeholder="Search...">
                    <button class="search_btn search_icon"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
                <!--Categories-->
                <div class="widget widget_categories">
                    <h2 class="widget-title">Categories</h2>
                    <ul>
                        <li><a href="#"> Artist & Band Profile</a></li>
                        <li><a href="#"> Best Sale Album</a></li>
                        <li><a href="#"> Concert Ticket</a></li>
                        <li><a href="#"> Most View Videos</a></li>
                        <li><a href="#"> Musical Instrument</a></li>
                        <li><a href="#"> Top Songs</a></li>
                    </ul>
               </div>
               <!--Feature Post-->
               <div class="widget widget_recent_entries">
                    <h2 class="widget-title">Feature Posts</h2>
                    <ul>
                        <li>
                            <div class="recent_cmnt_img">
                                <img src="{{asset('admin/images/weekly/song2.jpg')}}" alt="">
                            </div>
                            <div class="recent_cmnt_data">
                                <h4><a href="#">Dream Your Moments (Duet)</a></h4>
                                <span>07 October 2018</span>
                            </div>
                        </li>
                        <li>
                            <div class="recent_cmnt_img">
                                <img src="{{asset('admin/images/blog/fp_img1.jpg')}}" alt="">
                            </div>
                            <div class="recent_cmnt_data">
                                <h4><a href="#">Gimme Some Courage</a></h4>
                                <span>11 Apr, 2018</span>
                            </div>
                        </li>
                        <li>
                            <div class="recent_cmnt_img">
                                <img src="{{asset('admin/images/blog/fp_img2.jpg')}}" alt="">
                            </div>
                            <div class="recent_cmnt_data">
                                <h4><a href="#">Until I Met You</a></h4>
                                <span>24 Apr, 2018</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <!---Tags--->
                <div class="widget widget_tag_cloud">
                    <h2 class="widget-title">Tags</h2>
                    <ul>
                        <li><a href="#">Musical</a></li>
                        <li><a href="#">Blue Jazz</a></li>
                        <li><a href="#">Event</a></li>
                        <li><a href="#">Road Show</a></li>
                        <li><a href="#">New Concert</a></li>
                        <li><a href="#">Dancing</a></li>
                        <li><a href="#">Top Artist & Band</a></li>
                    </ul>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
