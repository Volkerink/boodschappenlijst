@extends ('/layouts/app')

@section('content')
<h1>Pas een boodschap aan</h1>

<form action="{{ route('groceries.update', ['grocery' => $activeRow['id']]) }}" method="POST">
    @csrf
    <input name="_method" type="hidden" value="PATCH">
<table>
        <tr>
            <th>Naam</th>
            <th>Prijs</th>
            <th>Aantal</th>
            <th>Subtotaal</th>
            <th></th>
        </tr>
        <tr>
            <td><input type="text" name="NAME" value={{ $activeRow["NAME"] }}></td>
            <td id="price1"><input type="number" name="price" step="0.01" min=0 value={{ $activeRow["price"] }} id="price" onchange="calculateSubTotal()"></td>
            <td><input type="number" name="NUMBER" min=1 value={{ $activeRow["NUMBER"] }} id="NUMBER" onchange="calculateSubTotal()"></td>
            <td id="SubTotal"> 0.00&#8364</td>
            <td><input type="submit" value="Aanpassen"></td>
        </tr>
    </table>

</form>
<a href="/">Terug naar de boodschappenlijst</a>
<script>
    calculateSubTotal()
    function calculateSubTotal() {
        document.getElementById("SubTotal").innerHTML = ((document.getElementById("price").value) * (document.getElementById("NUMBER").value)).toFixed(2) + "&#8364";
    }
</script>

@endsection