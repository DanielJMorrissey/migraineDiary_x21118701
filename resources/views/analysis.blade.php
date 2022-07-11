@extends('layout')
@section('title')
    <title>
        Migraine Diary - Trigger Analysis
    </title>
@endsection
@section('maincontent')
    <main>
        <div class="container">
            <table class="container table table-striped">
                <tr>
                    <th scope="col">Trigger</th><th scope="col">Percentage</th>
                </tr>
                <tr>
                    <td scope="row">Stress</td>
                    <td id="stressP">{{ $stressPercent }}%</td>
                </tr>
                <tr>
                    <td scope="row">Dehydration</td>
                    <td id="dehydratedP">{{ $hydrated }}%</td>
                </tr>
                <tr>
                    <td scope="row">Chocolate</td>
                    <td id="chocolateP">{{ $chocolate }}%</td>
                </tr>
                <tr>
                    <td scope="row">Cheese</td>
                    <td id="cheeseP">{{ $cheese }}%</td>
                </tr>
                <tr>
                    <td scope="row">Yeast Products</td>
                    <td id="yeastP">{{ $yeast_goods }}%</td>
                </tr>
                <tr>
                    <td scope="row">Yogurt</td>
                    <td id="yoghurtP">{{ $yoghurt }}%</td>
                </tr>
                <tr>
                    <td scope="row">Fruit</td>
                    <td id="fruitP">{{ $fruit }}%</td>
                </tr>
                <tr>
                    <td scope="row">Nuts</td>
                    <td id="nutsP">{{ $nuts }}%</td>
                </tr>
                <tr>
                    <td scope="row">Olives</td>
                    <td id="olivesP">{{ $olives }}%</td>
                </tr>
                <tr>
                    <td scope="row">Tomatoes</td>
                    <td id="tomatoP">{{ $tomato }}%</td>
                </tr>
                <tr>
                    <td scope="row">Soy</td>
                    <td id="soyP">{{ $soy }}%</td>
                </tr>
                <tr>
                    <td scope="row">Vinegar</td>
                    <td id="vinegarP">{{ $vinegar }}%</td>
                </tr>
            </table>
        
    </main>
    
@endsection