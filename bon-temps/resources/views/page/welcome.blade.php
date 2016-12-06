@extends('layout.bon-temps')

@section('title')
    Home
@endsection

@section('wrapper')
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
    <div class="overzicht">
    <span class="drop_down glyphicon glyphicon-fullscreen large-font"></span>
    <span class="drop_down glyphicon glyphicon-remove large-font" style="display: none"></span>
        <div class="toggler reservations">
        <h1>Reserveringen Nu</h1>
        <div class="tafels">
        </div>
    </div>
@endsection
@section('scripts')
<script>
$('.drop_down').on('click', function(){
    $('.drop_down').animate({opacity: ['toggle','swing']});
    $('.toggler').toggleClass('reservations');
});

$(function(){
    $.get('/getReserveringen', function(data){
        uitvoeren(data);
    });
    setInterval(function(){
        $.get('/getReserveringen', function(data){
            uitvoeren(data);
        });
    }, 60000);// 60 sec

    function uitvoeren(data){
        var tafel = '';
        var text;
        var s;
        var p;
        var div;
        var i;
        $('.tafels').html(tafel);
        for(i = 0; i < data.length; i++){
            text = ' tafel nummer '+data[i].table_id+' gereserveerd door '+data[i].name+' aantal mensen '+data[i].x_people;
            tafel = document.createElement('div');
            tafel.setAttribute('class','tafel');

            // s = document.createElement('span');
            // s.setAttribute('class','glyphicon glyphicon-move');

            p = document.createElement('p');
            // p.append(s);
            p.append(text);

            tafel.append(p);

            $('.tafels').append(tafel);
        }
        // $('.tafel').draggable({ containment: "window" });
        // $('.tafel').on('mouseup', function () {
        //     var left = '';
        //     var top = '';
        //     left =  $(this).css('left');
        //     top = $(this).css('top');
        //     console.log('left '+left+' top '+top);
        // });
    }
})

</script>
@endsection