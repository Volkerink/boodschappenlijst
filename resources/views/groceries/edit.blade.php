@extends ('/layouts/app')

@section('content')
<h1>Pas een artikel aan</h1>

<form action="{{ route('groceries.update', ['grocery' => $activeRow['id']]) }}" method="POST">
    @csrf
    <input name="_method" type="hidden" value="PATCH">
<table>
        <tr>
            <th>Naam</th>
            <th>Categorie</th>
            <th>Prijs</th>
            <th>Aantal</th>
            <th>Subtotaal</th>
        </tr>
        <tr>
            <td><input type="text" name="name" value='{{ $activeRow["name"] }}'></td>
            <td><select name="category_id" value="{{ $activeRow->category }}">
                @foreach ($categoryDB as $value) 
                <option value="{{ $value->id }}" <?php if($value->id === $activeRow->category->id) echo "selected" ?> >{{ $value->category }}</option>
                @endforeach</td>
            <td id="price1"><input type="number" name="price" step="0.01" min=0 value={{ $activeRow["price"] }} id="price" onchange="calculateSubTotal()"></td>
            <td><input type="number" name="number" min=1 value={{ $activeRow["number"] }} id="number" onchange="calculateSubTotal()"></td>
            <td id="SubTotal"> 0,00&#8364</td>
            <td><input type="submit" value="Aanpassen"></td>
        </tr>
    </table>

</form>
<a href="/">Terug naar de boodschappenlijst</a>
<script>
    calculateSubTotal()
    function calculateSubTotal() {
        document.getElementById("SubTotal").innerHTML = ((document.getElementById("price").value) * (document.getElementById("number").value)).toFixed(2) + "&#8364";
    }
</script>

@endsection