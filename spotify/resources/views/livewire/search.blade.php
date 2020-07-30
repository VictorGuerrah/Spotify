<div>
    <nav  class="navbar navbar-dark" style="background-color: #000000;">
        <a class="navbar-brand" href="#">
            <img src="{{asset('img/logo.png')}}" width="35" height="35" class="d-inline-block align-top" loading="lazy">
            Spotify
        </a>
        <form class="form-inline" wire:submit.prevent="submit">
            <input wire:loading.attr="disabled" wire:target="submit" class="form-control mr-sm-2" type="search" wire:model="value" placeholder="Search" aria-label="Search">
            <button wire:loading.attr="disabled" wire:target="submit" class="btn btn-outline-success my-2 my-sm-0">
                <span wire:loading.remove wire:target="submit">Buscar</span>     
                <div> 
                    <span wire:loading wire:target="submit" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </div>
            </button>
        </form>
    </nav>
    
    
    {{-- @if ($data)
        <pre><?php print_r($data['artists'])?></pre>
    @endif --}}

    @if (!empty($artists))
    
        <div class="card-deck artists container">
            <div class="row">
    
                @foreach ($artists as $key => $value)
    
                    <div class="card a-card border-secondary" style="width: 18rem;">
                        <img class="card-img-top" src="{{$value['image']}}" alt="Card image cap">
                        <div class="card-body a-card-body">
                            <h5 class="card-title">{{$value['name']}}</h5>
                        </div>
                    </div>
                
                @endforeach
    
            </div>
        </div>
    
    @endif
    
    
    @if (!empty($tracks))
    
        <div class="card-deck tracks container">
    
                @foreach ($tracks as $key => $value)
    
                    <div class="card bg-light mb-3" style="max-width: 18rem;">
                        <div class="card-header"> {{ $value['artist'] }} </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $value['name'] }}</h5>
                        </div>
                        <p class="card-text">{{ $value['album'] }}</p>
                    </div>
                        
                @endforeach
    
        </div>
    
    @endif
    
    <div wire:offline.class="bg-red-300"></div>
    
</div>