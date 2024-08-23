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

        table tr{
            border-bottom: 1px solid rgba(0,0,0,0.3);
        }
        
        table td, table th{
            border-bottom: 1px solid rgba(0,0,0,0.3);
        }

        .borda-lateral{
            border-left: 1px solid rgba(0,0,0,0.3);
        }

    </style>
</head>

<body>
@include('pdf.eps.header')
@include('pdf.eps.processos')

@include('pdf.eps.junta')

@include('pdf.eps.metalBase')
@include('pdf.eps.metalAdicao')
@include('pdf.eps.posicoes')
@include('pdf.eps.aquecimento')
@include('pdf.eps.gas')
@include('pdf.eps.caracteristicasEletricas') 

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

