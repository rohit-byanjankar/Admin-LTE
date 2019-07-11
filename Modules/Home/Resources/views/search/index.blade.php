@extends('layouts.master')
<div class="wrapper">

    @section('content')
    <main>
        <div class="main-section ">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">



                        <div class="col-lg-9 col-md-8 no-pd">
                            <div class="main-ws-sec ">
                                <div class="post-topbar">
                                    <div class="user-picy">
                                        <img src="http://via.placeholder.com/100x100" alt="">
                                    </div>

                                    <div class="post-st">
                                        <ul>

                                            <li><a class="" href="{{ route('userposts.create')}}" title="">Add an Article </a></li>
                                        </ul>
                                    </div>
                                    <!--post-st end-->

                                </div>
                                <!--post-topbar end-->
                                <div class="card card-header mt-2">
                                    <b>{{ $searchResults->count() }} results found for "{{ request('query') }}"</b>
                                </div>
                                <!--post-st end-->


                                <div class="posts-section">
                                        @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                                    <div class="card card-body">

                                        <h1 class="font-italic mb-2">{{ ucfirst($type) }}</h1>

                                        @foreach($modelSearchResults as $searchResult)
                                        <ul >
                                            <li><a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a></li>
                                            
                                        </ul>
                                        @endforeach

                                    </div>
                                        @endforeach



                                </div>
                                <!--posts-section end-->


                                <!-- For events -->




                            </div>
                            <!--main-ws-sec end-->
                        </div>

                        <div class="col-lg-3 pd-right-none no-pd">
                            <div class="right-sidebar">
                                <div class="widget widget-about">

                                    <h3>Community Media</h3>
                                    <span>Connect with your Community</span>
                                    <div class="sign_link">
                                        <h3><a href="{{ route('userposts.create') }}" title="" class="">Create an Article</a></h3>
                                    </div>

                                </div>
                                <!-- advertisement -->
                                <div class="widget widget-adver">
                                    <img src="http://via.placeholder.com/370x270" alt="">
                                </div>
                                <!-- advertisement -->
                                <div class="widget widget-adver">
                                    <img src="http://via.placeholder.com/370x270" alt="">
                                </div>
                            </div>
                            <!--right-sidebar end-->
                        </div>
                    </div>
                </div><!-- main-section-data end-->
            </div>
        </div>
    </main>

</div>
<!--theme-layout end-->
@endsection