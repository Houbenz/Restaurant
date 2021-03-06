@if($notifications)
    @foreach ($notifications as $notification)
        <span class="dropdown-item">
            <div class="row">
                <strong>{{$notification->titre}}</strong>
            </div>
            <div class="row">
                <p>
                    {{$notification->contenu}}
                </p>
            </div>
            <div class="row">
                <small class="offset-4">
                    envoyé à : {{$notification->updated_at}}
                </small>
            </div>
        </span>
        <div class="dropdown-divider"></div>
    @endforeach
    @if (count($notifications) == 0)
        <span class="dropdown-item">
            
        <h5>Vous n'avez aucune notification</h5>            
           
        </span>
    @endif
@endif