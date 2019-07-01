@extends('layouts.master')
@section('content')
<div class="wrapper">
    <section class="companies-info">
        <div class="container">

            <!--company-title end-->
            <div class="companies-list">
                <div>
                    <h2>All Categories</h2>
                </div>
                <div class="row">
                    @foreach($categories as $category)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="company_profile_info">
                            <div class="company-up-info">
                                <h3>{{$category->name}}</h3>
                                <img src="http://via.placeholder.com/91x91" width="150" height="50" alt="">
                                <h4></h4>
                                <ul>
                                    <li><a href="#" title="" class="follow">Follow</a></li>
                                    <li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
                                    <li><a href="#" title="" class="hire-us">Hire</a></li>
                                </ul>
                            </div>
                            <a href="#" title="" class="view-more-pro">View Posts</a>
                        </div>
                        <!--company_profile_info end-->
                    </div>
                    @endforeach

                    <div class="col-lg-3 pd-right-none no-pd">
                        <div class="right-sidebar">
                            <div class="widget widget-about">

                                <h3>Community Media</h3>
                                <span>Connect with your Community</span>
                                <div class="sign_link">
                                    <h3><a href="{{ route('userposts.create') }}" title="" class="">Create a Post</a></h3>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--right-sidebar end-->

                </div>
            </div>
            <!--companies-list end-->

        </div>
    </section>
    <!--companies-info end-->


</div>
<!--theme-layout end-->
@endsection