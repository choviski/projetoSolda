<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nome EPS</title> 
        <style>
        *{
            font-family: sans-serif;
        }
        </style>
    </head>
    <!-- Problemas encontrados -->
    
    <!-- * Alguns caracteres simplesmente se recusam a aparecer no pdf -->
    <!-- Por exemplo: ≤ α -->
    <!-- Esses campos estão marcados com um comentario -> (!) -->

    <!-- * Existem campos aqui no documento que eu acredito que não existem nos formulários de cadastro -->
    <!-- Esses campos estão marcados com um comentario -> (?) -->
    <body>
        @include('pdf.eps.header')
        @include('pdf.eps.processos')
        @include('pdf.eps.junta')
        @include('pdf.eps.metalBase')
        @include('pdf.eps.metalAdicao')
        @include('pdf.eps.posicoesEPreAquecimento')
        @include('pdf.eps.posAquecimentoEGas')
        @include('pdf.eps.caracteristicasEletricas')
        @include('pdf.eps.tecnica')
        <!-- Outra pg -->
        @include('pdf.eps.header')
        @include('pdf.eps.notas')
        @include('pdf.eps.revisao')
        
    </body>
</html>