@extends('layouts.master')
@section('content')
<div class="wrapper">
    <section class="companies-info">
        <div class="container">

            <!--company-title end-->
            <!--company-title end-->
            <div class="companies-list col-lg-9">

                <div class="row">
                    @if($categories->count()>0)
                    @foreach($categories as $category)
                    <div class="col-lg-4">
                        <div class="company_profile_info">
                            <div class="company-up-info">
                                <ul>

                                    <li>
                                        <a href="#" title="" class="follow">
                                            <h3>{{$category->name}}</h3>
                                        </a>
                                    </li>
                                </ul>

                                <img src="{{url($category->image)}}" width="150" height="50" alt="">

                            </div>
                            <a href="{{route('adcat',$category->id)}}">
                                View Ads

                            </a>
                        </div>
                        <!--company_profile_info end-->
                    </div>
                    @endforeach
                    @else
                    <div class="card card-header company_profile_info bg-danger">

                        <h1>No Categories...</h1>

                    </div>
                    @endif
                </div>
                
            </div>
            <!--companies-list end-->

            <div class="col-lg-3 pd-right-none no-pd pull-right">
                <div class="right-sidebar">
                    <div class="widget widget-about">

                        <h3>Community Media</h3>
                        <span>Connect with your Community</span>
                        <div class="sign_link">
                            <h3><a href="{{ route('userposts.create') }}" title="" class="">Create an Article </a></h3>
                        </div>

                    </div>
                </div>
            </div>
            <!--right-sidebar end-->

        </div>

    </section>
    <!--companies-info end-->


</div>
<!--theme-layout end-->
@endsection