<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{asset("imagens/logo v1.png")}}" class="logo" alt="Info Solda">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
