@extends('adminlte::page')


<div class="wrapper">
    @section('content')
    <section class="forum-page">
        <div class="container">
            <div class="forum-questions-sec">
                <div class="row">



                    <div class="col-lg-6">

                        <div class="details">



                            <div class="title">
                                General Details
                            </div>
                            <div class="info">
                                <table>
                                    <tr>
                                        <th>

                                            Ad Post Date:
                                        </th>
                                        <td>
                                            {{$classified->created_at}}
                                        </td>
                                    </tr>

                                </table>

                            </div>

                            <br>

                            <div class="title">
                                Seller Details
                            </div>
                            <div class="info">
                                <table>
                                    <tr>
                                        <th>
                                            Posted By:
                                        </th>
                                        <td>
                                            {{$classified->user->name}}
                                        </td>

                                    </tr>
                                    <tr>
                                        <th>Member since:</th>
                                        <td> {{$classified->user->created_at}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Email :

                                        </th>
                                        <td>
                                            {{$classified->user->email}}

                                        </td>

                                    </tr>
                                    <tr>
                                        <th>
                                            Address :
                                        </th>
                                        <td>
                                            {{$classified->user->address}}

                                        </td>

                                    </tr>
                                    <tr>
                                        <th>
                                            Number :
                                        </th>
                                        <td>
                                            {{$classified->user->phone_number}}

                                        </td>
                                </table>
                            </div>

                            <br>
                            <div class="title">
                                Pricing Details
                            </div>
                            <div class="info">
                                <ul>
                                    <li class="mt-2">
                                        Price : {{$classified->price}}

                                    </li>

                                </ul>

                            </div>

                            <br>
                            <div class="title">
                                Product Details
                            </div>

                            <div class="info">
                                <p> {{$classified->description}}</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="widget widget-user border pt-1 pl-3 pr-3 pb-1">

                            <img src="{{url($classified->image)}}" width="100%" height="30% alt="">
						</div>
					</div>
				</div>
			</div>
			<!--forum-questions-sec end-->

	</section>
	<!--forum-page end-->






</div>
<!--theme-layout end-->
@endsection