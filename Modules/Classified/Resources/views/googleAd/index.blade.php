@extends('adminlte::page')
@section('content')
<div class="margin-bottom">
    @can('create',\Modules\Classified\Entities\GoogleAd::class)
    <a href="{{ route('googleadsense.create')}}" class="btn btn-success ">
        Add Google Ads
    </a>
    @endcan
</div>

<div class="card card-body panel">
    @if($classifieds->count()>0)
    <table class="table table-bordered table-hover panel-body" id="adView">
        <thead>
            <th>Description</th>
            <th>Code</th>
            <th></th>
        </thead>
        <tbody>
        @foreach($classifieds as $classified)
            <tr>
                <td>{{ $classified->description}}</td>
                <td>{{$classified->code}}</td>
                <td>
                    @can('update',$classified)
                    <a href=" {{ route('googleadsense.edit', $classified->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                    @endcan
                    @can('delete',$classified)
                    <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('googleadsense.destroy' ,$classified->id) }}" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="fa fa-trash-o"></i></button>
                    </form>
                    @endcan
                </td>
            </tr>
         @endforeach
         </tbody>
    </table>
    @else
    <h3 class="text-center">
        Nothing to Show!
    </h3>
    @endif
</div>
@endsection
@section('scripts')
<script>
    $(function() {
        $("#adView").DataTable();
    });
</script>
@endsection