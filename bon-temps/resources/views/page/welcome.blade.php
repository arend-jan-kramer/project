<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home | Bon Temp's</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {!! Html::style('css/style.css') !!}

    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Bon temps
                </div>

                <div class="links">
                    @foreach($menus as $menu)
                        <a href="{{ $menu->link }}">{{ $menu->title }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
