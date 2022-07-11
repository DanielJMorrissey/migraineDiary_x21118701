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
                    <td>{{ $stressPercent }}%</td>
                </tr>
                <tr>
                    <td scope="row">Dehydration</td>
                    <td>{{ $hydrated }}%</td>
                </tr>
                <tr>
                    <td scope="row">Chocolate</td>
                    <td>{{ $chocolate }}%</td>
                </tr>
                <tr>
                    <td scope="row">Cheese</td>
                    <td>{{ $cheese }}%</td>
                </tr>
                <tr>
                    <td scope="row">Yeast Products</td>
                    <td>{{ $yeast_goods }}%</td>
                </tr>
                <tr>
                    <td scope="row">Yogurt</td>
                    <td>{{ $yoghurt }}%</td>
                </tr>
                <tr>
                    <td scope="row">Fruit</td>
                    <td>{{ $fruit }}%</td>
                </tr>
                <tr>
                    <td scope="row">Nuts</td>
                    <td>{{ $nuts }}%</td>
                </tr>
                <tr>
                    <td scope="row">Olives</td>
                    <td>{{ $olives }}%</td>
                </tr>
                <tr>
                    <td scope="row">Tomatoes</td>
                    <td>{{ $tomato }}%</td>
                </tr>
                <tr>
                    <td scope="row">Soy</td>
                    <td>{{ $soy }}%</td>
                </tr>
                <tr>
                    <td scope="row">Vinegar</td>
                    <td>{{ $vinegar }}%</td>
                </tr>
            </table> 
        </div>
        
    </main>
@endsection