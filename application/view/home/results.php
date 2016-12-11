<div class="container-fluid" style="background-color:#e8e8e8">
    <div class="container container-pad" id="property-listings">
        <?php if (count($results) < 1) { ?>
            <h5>No Result Found</h5>
        <?php } else if (is_a($results, 'Exception')) { ?>
            <h5>Invalid Search</h5>
            <span><?php echo $results->getMessage(); ?></span>
        <?php } else { ?>
            <div class="row">
                <div class="col-md-12">
                    <h1>Apartment Listings</h1>
                    <p><?php echo count($results) ?> results for "<?php echo $_POST['search_query'] ?>"</p>
                </div>
            </div>
            <div class="row">
                <?php foreach ($results as $result) {
                    ?>
                    <div class="col-sm-6">
                        <!-- Begin Listing -->
                        <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing">
                            <div class="media">

                                <a class="pull-left" href="#" target="_parent">
                                    <img alt="image" class="img-thumbnail-listing" src="<?php if (isset($result->apartment_id) && isset($result->picture_1)) {
                echo 'http://sfsuswe.com/~f16g13/imgfs/' . htmlspecialchars($result->apartment_id) . "/" . htmlspecialchars($result->picture_1);
            } else {
                echo '';
            } ?>" width="180px" height="135px"></a>
                                <div class="clearfix visible-sm"></div>
                                <div class="media-body fnt-smaller">
                                    <a href="#" target="_parent"></a>
                                    <h4 class="media-heading">
                                        <a href="#" target="_parent">$<?php if (isset($result->price)) {
                echo htmlspecialchars($result->price, ENT_QUOTES, "UTF-8");
            } ?> <small class="pull-right">Apartment #<?php if (isset($result->apartment_id)) {
                echo htmlspecialchars($result->apartment_id, ENT_QUOTES, "UTF-8");
            } ?></small></a></h4>
                                    <ul class="list-inline mrg-0 btm-mrg-10 clr-535353">
                                        <li><?php if (isset($result->rooms)) {
                echo htmlspecialchars($result->rooms, ENT_QUOTES, "UTF-8");
            } ?> Rooms</li>
                                        <li style="list-style: none">|</li>
                                        <li><?php if (isset($result->zipcode)) {
                echo htmlspecialchars($result->zipcode, ENT_QUOTES, "UTF-8");
            } ?></li>
                                    </ul>
                                    <form action="<?php echo URL; ?>home/singleview" method="POST" target="_blank">
                                        <input type="hidden" name="singleapartmentid" value="<?php echo $result->apartment_id ?>"/>
                                        <button type="submit" class="btn btn-primary btn-lg">View</button>
                                        <button type="button" class="btn btn-primary btn-lg">Contact</button>
                                    </form>
                                </div>
                            </div>
                        </div><!-- End Listing-->
                    </div>
    <?php } ?>
            </div><!-- End row -->
<?php } ?>
    </div><!-- End container -->
</div>
