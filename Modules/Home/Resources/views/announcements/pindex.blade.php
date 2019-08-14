<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href='css/workwise/style.css'>

</head>

<body>

        @if($announcements->count()>0)
        @foreach($announcements as $announcement)

        <div class="mainannouncement ml-4 mt-2">

            <ul>
                <li>
                    <div class="announcementtitle">

                        <h3> <a target='_blank' class="text-aqua" href="{{ route('userannouncements.index') }}">{{ $announcement->title }} </a>
                        </h3>

                    </div>

                    <i class="fa fa-clock-o"></i> {{ \carbon\carbon::parse($announcement->published_till)->format('d D-M Y') }}
                </li>
                <hr>

            </ul>
        </div>


        @endforeach
        @else
        <div class="mainannouncement ml-4 mt-2">

            <ul class="card card-body mr-4">
                <li>
                    <h2>No Announcements available..</h2>
                </li>

            </ul>
        </div>

        @endif

        <div class="text-center">
            {!! $announcements->links(); !!}
        </div>

</body>

</html>