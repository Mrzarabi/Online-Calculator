<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<a href="https://samxpay.com" class="custom-style-image">
    <img width="150" src="{{ asset('/defaultImages/samxpay-logo-removebg-preview.png') }}" alt="logo">
</a>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
