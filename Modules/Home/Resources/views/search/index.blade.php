@extends('layouts.master')
@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="main-ws-sec">
                    <div class="card card-header mt-2">
                        <b>{{ $searchResults->count() }} results found for "{{ request('query') }}"</b>
                    </div>
                    <!--post-st end-->
                    <div class="posts-section">
                            @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                        <div class="card card-body mb-3">
                            <h3 style="font-weight: bolder">Matching results for "{{request('query')}}" in {{$type}}</h3>
                                <div class="row mt-3">
                            @foreach($modelSearchResults as $searchResult)
                                <div class="card-body col-md-4" style="height:70%">
                                    <img class="card-img-top" src="{{asset($searchResult->searchable)}}" height="360px" alt="Card image">
                                    <div class="card-body">
                                        <p class="card-text text-dark" style="font-weight: bolder">{{ $searchResult->title }}</p>
                                        <a href="{{ $searchResult->url }}" class="btn btn-primary ml-5">View {{$type}}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                            @endforeach
                    </div>
                    <!--posts-section end-->
                </div>
                <!--main-ws-sec end-->
            </div><!-- main-section-data end-->
        </div>
    </main>
<!--theme-layout end-->
@endsection