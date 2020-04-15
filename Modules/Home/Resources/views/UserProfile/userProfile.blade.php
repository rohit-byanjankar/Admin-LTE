@extends('layouts.master')
@section('content')
    <main>
        <div class="main-section ">
            <div class="container ">
                <div class="main-section-data">
                    <div class="row ">
                        <div class="col-lg-3">
                            <div class="main-left-sidebar">
                                <div class="user_profile">
                                    <div class="user-pro-img mt-3">
                                        <img src="{{asset($user->image)}}" alt="" height="250px" width="200px">
                                    </div><!--user-pro-img end-->
                                    <div class="user_pro_status">
                                        <ul class="flw-hr">
                                            <li><a href="{{route('request',$user->id)}}" title="" class="hre">Request Contact Info</a></li>
                                        </ul>
                                    </div><!--user_pro_status end-->
                                </div><!--user_profile end-->
                            </div><!--main-left-sidebar end-->
                        </div>
                        <div class="col-lg-6">
                            <div class="main-ws-sec">
                                <div class="user-tab-sec">
                                    <h3 class="text-info">{{$user->name}}</h3>
                                    <div class="star-descp">
                                        <span>{{$user->profession}}</span>
                                    </div><!--star-descp end-->
                                </div><!--user-tab-sec end-->
                                <div class="product-feed-tab current">
                                    <div class="posts-section">
                                        <div class="post-bar">
                                            <div class="job_descp">
                                                <h3>USER DETAIL</h3>
                                                <ul class="job-dt text-white">
                                                    <li><a>Available Time</a></li>
                                                    @if($user->from)
                                                        <li><a>{{$user->from}} - {{$user->to}}</a></li>
                                                    @else
                                                        <li><a>Currently not available</a></li>
                                                    @endif
                                                </ul>
                                                <p>{{$user->about}}<br>My email is {{ $user->email}}.You can request my contact info if u
                                                    need any help related to my profession.</p>
                                            </div>
                                        </div><!--post-bar end-->
                                    </div><!--posts-section end-->
                                </div><!--product-feed-tab end-->
                            </div><!--main-ws-sec end-->
                        </div>
                        <div class="col-lg-3">
                            <div class="right-sidebar">
                                <div class="widget widget-portfolio">
                                    <div class="wd-heady">
                                        <h3>Other {{$user->profession}}'s</h3>
                                    </div>
                                    @if(count($profession) > 0)
                                    @foreach($profession as $prof)
                                            <div class="usr-msg-details mt-3 ml-3 mb-3">
                                                <div class="usr_img">
                                                    <a href="{{ route('user-profile',$prof->id)}}">
                                                        <img height="60px" width="200px" src="{{ url($prof->image)}}" alt="">
                                                    </a>
                                                </div>
                                                <div class="usr-mg-info mt-3">
                                                    {{ $prof->name }}<br>
                                                    <h2>{{ $prof->profession }}</h2>
                                                </div>
                                                <!--usr-mg-info end-->
                                            </div>
                                    @endforeach
                                    @else
                                        <div class="card card-body text-primary">NO OTHER PROFESSION OF SAME TYPE</div>
                                    @endif
                                </div><!--widget-portfolio end-->
                            </div><!--right-sidebar end-->
                        </div>
                    </div>
                </div><!-- main-section-data end-->
            </div>
        </div>
    </main>
@endsection