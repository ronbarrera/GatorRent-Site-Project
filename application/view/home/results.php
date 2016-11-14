<div class="container">
    <h3>Results</h3>
    <table>
        <thead>
            <tr>
                <td>apartment_id</td>
                <td>lessor_id</td>
                <td>street_address</td>
                <td>zipcode</td>
                <td>price</td>
                <td>rooms</td>
                <td>description</td>
                <td>created_date</td>
                <td>modified_date</td>
                <td>picture_1</td>
                <td>picture_2</td>
                <td>picture_3</td>
                <td>picture_4</td>
            </tr>
        </thead>
        <tbody id="results">
        <?php if (count($results) < 1) { ?>
            <tr>
                <td colspan="13" style="text-align: center">No results found.</td>
            </tr>
        <?php } else { foreach ($results as $result) { ?>
            <tr>
                <td><?php if (isset($result->apartment_id)) { echo htmlspecialchars($result->apartment_id, ENT_QUOTES, "UTF-8"); } ?></td>
                <td><?php if (isset($result->lessor_id)) { echo htmlspecialchars($result->lessor_id, ENT_QUOTES, "UTF-8"); } ?></td>
                <td><?php if (isset($result->street_address)) { echo htmlspecialchars($result->street_address, ENT_QUOTES, "UTF-8"); } ?></td>
                <td><?php if (isset($result->zipcode)) { echo htmlspecialchars($result->zipcode, ENT_QUOTES, "UTF-8"); } ?></td>
                <td><?php if (isset($result->price)) { echo htmlspecialchars($result->price, ENT_QUOTES, "UTF-8"); } ?></td>
                <td><?php if (isset($result->rooms)) { echo htmlspecialchars($result->rooms, ENT_QUOTES, "UTF-8"); } ?></td>
                <td><?php if (isset($result->description)) { echo htmlspecialchars($result->description, ENT_QUOTES, "UTF-8"); } ?></td>
                <td><?php if (isset($result->created_date)) { echo htmlspecialchars($result->created_date, ENT_QUOTES, "UTF-8"); } ?></td>
                <td><?php if (isset($result->modified_date)) { echo htmlspecialchars($result->modified_date, ENT_QUOTES, "UTF-8"); } ?></td>
                <td id="picture_1">
                    <a href="<?php if (isset($result->apartment_id) && isset($result->picture_1)) { echo 'http://sfsuswe.com/~f16g13/imgfs/' . htmlspecialchars($result->apartment_id) . "/" . htmlspecialchars($result->picture_1); } else { echo ''; }?>" target="_blank"></a>
                </td>
                <td id="picture_2">
                    <a href="<?php if (isset($result->apartment_id) && isset($result->picture_2)) { echo 'http://sfsuswe.com/~f16g13/imgfs/' . htmlspecialchars($result->apartment_id) . "/" . htmlspecialchars($result->picture_2); } else { echo ''; }?>" target="_blank"></a>
                </td>
                <td id="picture_3">
                    <a href="<?php if (isset($result->apartment_id) && isset($result->picture_3)) { echo 'http://sfsuswe.com/~f16g13/imgfs/' . htmlspecialchars($result->apartment_id) . "/" . htmlspecialchars($result->picture_3); } else { echo ''; }?>" target="_blank"></a>
                </td>
                <td id="picture_4">
                    <a href="<?php if (isset($result->apartment_id) && isset($result->picture_4)) { echo 'http://sfsuswe.com/~f16g13/imgfs/' . htmlspecialchars($result->apartment_id) . "/" . htmlspecialchars($result->picture_4); } else { echo ''; }?>" target="_blank"></a>
                </td>
            </tr>
        <?php } } ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    /* This JS selects the image links from the results table
     * and creates a thumbnail image that links to the original
     */
    $(function () {
        var link;

        // results is a jQuery object containing DOM elements,
        // so iterate through each one and extract the href from the
        // anchor element and set it as the src for an image element.
        $('#results').children().each(function (index, row) {
            $(row).children().each(function (index, cell) {
                if (cell.id) {
                    link = $(cell).children().first();
                    if (link && link.attr('href').length > 0) {
                        link.html('<img src="'.concat(link.attr('href'), '" width="320px">'));
                    } else {
                        // If no image is found, remove the anchor element from the table cell
                        link.remove();
                    }
                }
            });
        });
    });
</script>
