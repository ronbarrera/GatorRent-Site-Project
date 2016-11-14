<div class="container">

    <?php if (count($results) < 1) { ?>
        <h5>No Result Found</h5>
    <?php
    } else {
        $totalresult = count($results);
        $searchby = $_POST['search_query'];
        echo "<h5>$totalresult results for \"$searchby\"</h5>";

        foreach ($results as $result) {
            ?>
            <div class="row single-row-listing">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="col-sm-6">
                        <center><img src="<?php if (isset($result->apartment_id) && isset($result->picture_1)) { echo 'http://sfsuswe.com/~f16g13/imgfs/' . htmlspecialchars($result->apartment_id) . "/" . htmlspecialchars($result->picture_1); } else { echo ''; }?>" style="height:200px; margin-left:-15px;" /></center>
                    </div>
                     
                    <div class="col-sm-6">  
                            <div class="container">
                                <h4>Price: <?php if (isset($result->price)) {
                echo htmlspecialchars($result->price, ENT_QUOTES, "UTF-8");
            } ?></h4>
                                <h4>Bedrooms: <?php if (isset($result->rooms)) {
                echo htmlspecialchars($result->rooms, ENT_QUOTES, "UTF-8");
            } ?></h4>
                                <h4>Zip Code: <?php if (isset($result->zipcode)) {
                echo htmlspecialchars($result->zipcode, ENT_QUOTES, "UTF-8");
            } ?></h4>
                                <button type="submit" class="btn btn-primary btn-lg">View</button>
                                <button type="submit" class="btn btn-primary btn-lg">Contact</button>
                            </div>

                    </div>          
                    </div>
                </div>
            

    <?php }} ?>

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

