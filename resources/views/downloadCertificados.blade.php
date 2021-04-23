links = [@foreach($certificados as $certificado)@if(!$loop->last)'{{asset($certificado)}}',@else'{{asset($certificado)}}'@endif @endforeach];
