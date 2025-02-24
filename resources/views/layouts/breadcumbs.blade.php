@props(['title' => 'Page', 'breadcrumb' => []])

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>{{ $title }}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="">Home</a>
            </li>
            @foreach($breadcrumb as $item)
                <li class="{{ $loop->last ? 'active' : '' }}">
                    @if(!$loop->last)
                        <a href="{{ $item['url'] }}">{{ $item['name'] }}</a>
                    @else
                        <strong>{{ $item['name'] }}</strong>
                    @endif
                </li>
            @endforeach
        </ol>
    </div>
</div>
