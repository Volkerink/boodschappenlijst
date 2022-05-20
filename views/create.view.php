<?php require './views/partials/header.php';?>

    <h1>Boodschappen Toevoegen</h1>
<form action = "../groceries/insert" method="post">
    <table>
        <tr>
            <th>Naam</th>
            <th>Prijs</th>
            <th>Aantal</th>
            <th>Subtotaal</th>
            <th></th>
        </tr>
        <tr>
            <td><input type="text" name="NAME"></td>
            <td id="price1"><input type="number" name="price" step="0.01" min=0 value=0 id="price" onchange="calculateSubTotal()"></td>
            <td><input type="number" name="NUMBER" min=1 value=0 id="NUMBER" onchange="calculateSubTotal()"></td>
            <td id="SubTotal"> 0.00&#8364</td>
            <td><input type="submit" value="Toevoegen"></td>
        </tr>
    </table>
</form>

<?php require './views/partials/footer.php';?>

<script>
    function calculateSubTotal() {
        document.getElementById("SubTotal").innerHTML = ((document.getElementById("price").value) * (document.getElementById("NUMBER").value)).toFixed(2) + "&#8364";
    }
</script>
</body>
</html>