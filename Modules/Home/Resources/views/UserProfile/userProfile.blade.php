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
                                </div>
                                <!--user-pro-img end-->
                                <div class="user_pro_status">
                                    <ul class="flw-hr">
                                        <li><a href="#" title="" class="hre">Request Contact Info</a></li>
                                    </ul>
                                </div>
                                <!--user_pro_status end-->
                            </div>
                            <!--user_profile end-->
                        </div>
                        <!--main-left-sidebar end-->
                    </div>
                    <div class="col-lg-6">
                        <div class="main-ws-sec">
                            <div class="user-tab-sec">
                                <div class="card card-header">
                                    <h3 class="text-info">{{$user->name}}</h3>
                                    @if($user->profession)
                                    <div class="star-descp ml-1 mt-2">
                                        <span style='text-transform:capitalize'>{{$user->profession}}</span>
                                    </div>
                                    @else
                                    <div class="star-descp ml-1 mt-2">
                                        <span>No Profession</span>
                                    </div>
                                    @endif
                                </div>

                                <!--star-descp end-->
                            </div>
                            <!--user-tab-sec end-->
                            <div class="card card-body">

                                <h1 style='font-size:150%'>About</h1>

                                <p><br>My email is "{{ $user->email}}". You can request my contact info if you
                                    need any help related to my profession. My address is {{$user->address}}.</p>

                            </div>
                            <!--product-feed-tab end-->
                        </div>
                        <!--main-ws-sec end-->
                    </div>
                    <div class="col-lg-3">
                        <div class="right-sidebar">
                            <div class="widget widget-user">
                                <h3 class="title-wd text-center">Recent Articles</h3>
                                <ul>
                                    @if($user->posts()->count()>0)
                                    @foreach($posts as $post)
                                    <li>
                                        <div class="usr-msg-details">
                                            <img src="{{url($post->image)}}" width="40" height="60" alt="">
                                            <div class="usr-mg-info">
                                                <a href="{{route('userposts.show', $post->id)}}">
                                                    <h2> <b> {{ $post->title }} </b></h2>
                                                </a>

                                            </div>
                                            <!--usr-mg-info end-->
                                        </div>
                                    </li>
                                    @endforeach
                                    @else
                                    <div class="usr-msg-details">
                                        <li>
                                            <div class="usr-msg-details">
                                                <div class="usr-mg-info">
                                                    <h2 class="text-center">No recent articles from {{$user->name}}..</h2>
                                                </div>
                                                <!--usr-mg-info end-->
                                            </div>
                                        </li>
                                    </div>
                                    @endif
                                </ul>

                            </div>
                            <!--widget-portfolio end-->

                            <div class="widget widget-user">
                                <h3 class="title-wd text-center">Recent Advertisements</h3>
                                <ul>
                                    @if($user->advertisements()->count()>0)
                                    @foreach($classifieds as $classified)
                                  
                                    <li>
                                        <div class="usr-msg-details">
                                            <img src="{{url($classified->image)}}" width="40" height="60" alt="">
                                            <div class="usr-mg-info">
                                                <a href="{{route('classified.show', $classified->id)}}">
                                                    <h2> <b> {{ $classified->title }} </b></h2>
                                                </a>

                                            </div>
                                            <!--usr-mg-info end-->
                                        </div>
                                    </li>
                                   
                                    @endforeach
                                    @else
                                    <div class="usr-msg-details">
                                        <li>
                                            <div class="usr-msg-details">
                                                <div class="usr-mg-info">
                                                    <h2 class="text-center">No recent advertisements from {{$user->name}}..</h2>
                                                </div>
                                                <!--usr-mg-info end-->
                                            </div>
                                        </li>
                                    </div>
                                    @endif
                                </ul>


                            </div>
                            <!--widget-portfolio end-->

                        </div>
                        <!--right-sidebar end-->
                    </div>
                </div>
            </div><!-- main-section-data end-->
        </div>
    </div>
</main>
@endsection