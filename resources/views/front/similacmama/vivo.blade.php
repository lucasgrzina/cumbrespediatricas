@extends('layouts.similacmama.front-vue')
@section('head')
    <script>
        console.debug('vivo');
        var _data = {!!json_encode($props)!!};
        console.debug(_data);
        if (_data.registrado) {
            gtag('set', {'user_id': _data.registrado.id});

            setInterval(function() {
                console.debug('Mando evento');
                gtag('event', 'vivo', {
                    'event_category' : 'similacmama',
                    'event_label' : 'ver'
                });                

            },5000);
        }
    </script>
@endsection
@section('content')
<div class="container vivo">            
    <vivo v-bind="{{json_encode($props)}}"></vivo>
</div>
@endsection