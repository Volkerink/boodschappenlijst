@extends ('/layouts/app')

@section('content')
<h1>Boodschappenlijst</h1>
<table>
    <tr>
        <th>Product</th>
        <th>Categorie</th>
        <th>Prijs</th>
        <th>Aantal</th>
        <th>Subtotaal</th>
    </tr>

    @foreach ($groceryDB as $value) 
        <tr>
            <td>{{ $value["name"] }}</td>
            <td>{{ $value->category->category }}</td>
            <td>{{ number_format($value["price"], 2, ',', ' '); }}&#8364</td>
            <td>{{ $value["number"] }}</td>
            <td>{{ number_format(($value["price"] * $value["number"]), 2, ',', ' ') }}&#8364</td>
            <td><form action='/groceries/{{ $value["id"] }}/edit' method='get'>@csrf<button type='submit' name='grocery_id' class='editbutton' value='{{ $value["id"] }}'>Pas aan</button></form></td>
            <td><form action='/groceries/{{ $value["id"] }}' method='POST'>@csrf<button name='grocery_id' class='editbutton' value='{{ $value["id"] }}' >Verwijder</button><input name="_method" type="hidden" value="DELETE"></form></td>
        </tr>
    @endforeach

    <tr>
        <td colspan="4"><strong>Totaal</strong></td>
        <td><strong>{{$finalPrice[0]}}&#8364</strong></td>
    </tr>
</table> 

<a href="/groceries/create">Voeg een artikel toe</a>
@endsection
