@extends('layout')

@section('titulo')
    Spotify
@endsection

@section('content')

    <?php if(!empty($data)){
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
    ?>
    <div class="container cards">

        @foreach ($data as $key => $value)

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{$value['image']}}" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">{{$value['name']}}</h5>
                <p class="card-text">
                    <li>
                        <label for="">Tipo</label>
                        <p>{{ $value['type'] }}</p>
                    </li>
                    <li>
                        <label for="">Popularidade</label>
                        <p>
                            @for ($i = 0; $i < $value['popularity']; $i++)
                                x
                            @endfor
                        </p>
                    </li>
                </p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        
        @endforeach

    </div>
    <?php } ?>
    
@endsection