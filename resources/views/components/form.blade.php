@props(['action', 'method' => 'POST', 'item' => null, 'buttonText' => 'Enregistrer'])

<form action="{{ $action }}" method="POST">
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif

</form>
