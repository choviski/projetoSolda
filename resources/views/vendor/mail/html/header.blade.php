<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
@else
{{ $slot }}
@endif
    <img src="{{asset("imagens/logo v1.png")}}" class="logo" alt="Infosolda">
</a>
</td>
</tr>
