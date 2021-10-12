<li @isset($item['id']) id="{{ $item['id'] }}" @endisset class="nav-header {{ $item['class'] ?? '' }} custom-text-color">

    {{ is_string($item) ? $item : $item['header'] }}

</li>
