@extends ('/layouts/app')

@section('content')
<h1>Voeg een artikel toe</h1>
<form action="/groceries" method="post">
    @csrf
<table>
        <tr>
            <th>Naam</th>
            <th>Categorie</th>
            <th>Prijs</th>
            <th>Aantal</th>
            <th>Subtotaal</th>
        </tr>
        <tr>
            <td><input type="text" name="name"></td>
            <td><input type="text" name="category"></td>
            <td id="price1"><input type="number" name="price" step="0.01" min=0 value=0 id="price" onchange="calculateSubTotal()"></td>
            <td><input type="number" name="number" min=1 value=0 id="number" onchange="calculateSubTotal()"></td>
            <td id="SubTotal"> 0.00&#8364</td>
            <td><input type="submit" value="Toevoegen"></td>
        </tr>
    </table>

</form>
<a href="/">Terug naar de boodschappenlijst</a>
<script>
    function calculateSubTotal() {
        document.getElementById("SubTotal").innerHTML = ((document.getElementById("price").value) * (document.getElementById("number").value)).toFixed(2) + "&#8364";
    }
</script>

@endsection