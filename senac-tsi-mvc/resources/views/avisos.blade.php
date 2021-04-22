@extends('layouts.externo')
@section('title', 'Quadro de Avisos da Empresa')
@section('sidebar')
    @parent
    <p>^ ^ Barra superior adicionada do layout pai/mae; ^ ^ </p>
@endsection
@section('content')
    <p>Quadro de Avisos da Empresa</p>
    <p>Olá {{ $nome }}! Veja os avisos abaixo e anote(se quiser):</p>
    @if ($mostrar)
        <h2>Avisos: </h2>
        @foreach ($avisos as $aviso)
            <p>Aviso #{{$aviso['id']}}: {{$aviso['texto']}}</p>
        @endforeach
        <!-- OUUUU: 
        <?php
        // foreach ($avisos as $aviso){
        //     echo "<p>Aviso #{$aviso['id']}: {$aviso['texto']}</p>";
        // }
        ?> -->
    @else
        Os avisos não estão disponíveis ou não existem avisos!
    @endif
@endsection
