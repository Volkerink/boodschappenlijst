
<?php require './views/partials/header.php';?>
<h1>Boodschappenlijst</h1>
    <form>
        <table>
            <tr>
                <th>Product</th>
                <th>Prijs</th>
                <th>Aantal</th>
                <th>Subtotaal</th>
            </tr>

<?php buildlist($groceryDB) ?>

    <tr>
        <td><strong>Totaal</strong></td>
        <td></td>
        <td></td>
        <td><strong><?php giveTotalPrice($groceryDB) ?>&#8364</strong></td>
    </tr>
</table> 
</form>
<?php require './views/partials/footer.php';?>
</body>
</html>