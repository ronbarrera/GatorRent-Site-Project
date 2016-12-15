<div class="container text-center">
    <h1>Welcome to GatorRent.</h1>
    <h4>Apartments searching and renting website for SFSU's student only</h4>
</div>
<hr>
<div class="container-fluid text-center bg-grey">
    <div class="row text-center">
        <?php foreach ($recentListings as $recentListing) {
            ?>

            <div class="col-sm-4">
                <img src ="<?php if (isset($recentListing->apartment_id) && isset($recentListing->picture_1)) { echo 'http://sfsuswe.com/~f16g13/imgfs/' . htmlspecialchars($recentListing->apartment_id) . "/" . htmlspecialchars($recentListing->picture_1); } else { echo ''; }?>" style = "width:100%">
                <p><strong> <?php echo $recentListing->title; ?> </strong></p>
            </div>
        <?php } ?>
    </div>

</div>
