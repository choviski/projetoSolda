<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nome EPS</title>
    <style>
        * {
            font-family: sans-serif;
        }

        .page_break {
            page-break-before: always;
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
<div class="page_break"></div><!-- Outra pg. Div com classe responsavel por quebrar pa -->

@include('pdf.eps.header')
@include('pdf.eps.tecnica')
@include('pdf.eps.notas')
@include('pdf.eps.revisao')

</body>
</html>
