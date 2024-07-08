<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$eps->nome}}</title>
    <style>
        * {
            font-family: sans-serif;
        }
        .page_break {
            page-break-before: always;
        }

        @page{
            margin-top: 150px;
        }
        header { 
            position: fixed; 
            top:-115px; 
            left: 0px; 
            right: 0px; 
            height: 250px; 
            width: 100%; 
        }

        table {
            page-break-inside: avoid;
        }

    </style>
</head>
<!-- Problemas encontrados -->

<!-- * Alguns caracteres simplesmente se recusam a aparecer no pdf -->
<!-- Por exemplo: ≤ α -->
<!-- Esses campos estão marcados com um comentario -> (!) -->

<!-- Ainda existem alguns campos meio "esquisitos" no PDF, se achar algum marca ele com * -->
<!-- que depois a gente ve o que faz com eles -->
<!-- Também não sei ao certo oq exatamente vai naqueles (ABC-XY) da vida após o nome -->
<!-- da "sessão" no pdf, tipo: JUNTAS (AB-WYZ), não sei oq iri ali-->

<body>
@include('pdf.eps.header')

@foreach($eps->processos as $processo)
    @include('pdf.eps.processos')
    @include('pdf.eps.junta')
    @include('pdf.eps.metalBase')

    @foreach($processo->metaisAdicao as $metal)
        @include('pdf.eps.metalAdicao')
    @endforeach

    @include('pdf.eps.posicoesEPreAquecimento')
    @include('pdf.eps.posAquecimentoEGas')
    @include('pdf.eps.caracteristicasEletricas')
@endforeach

@include('pdf.eps.tecnica')
@include('pdf.eps.notas')
@include('pdf.eps.revisao')

<script type="text/php">
    if ( isset($pdf) ) {
        $x = 535;
        $y = 100;
        $text = "{PAGE_NUM} / {PAGE_COUNT}";
        $font = $fontMetrics->get_font("helvetica", "bold");
        $size = 10;
        $color = array(0,0,0);
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
    }
</script>


</body>




</html>

