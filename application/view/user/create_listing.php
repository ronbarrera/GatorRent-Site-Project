<!-- This is a create listing page. Lesser will list their property and upload photos. -->
<body>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="container-fluid">
                <div class="row content">
                    <!-- This is a section to display user's current listing. User may add new listing here. -->
                    <div class="col-sm-3 sidenav">
                        <h3>My Listings</h3>
                        <ul class="nav nav-pills nav-stacked">
                            <?php if (!empty($currentListings)) { foreach ($currentListings as $listing) { ?>
                                <li><a href="<?php echo URL . 'user/editlisting/' . $listing->apartment_id ?>"><?php echo $listing->title; ?></a></li>
                            <?php } } else { ?>
                                <li><i>No current listings</i></li>
                            <?php } ?>
                        </ul>
                        <br />
                        <a href="<?php echo URL; ?>user/createlisting"><button type="button" class="btn btn-secondary">Add New Listing</button></a>
                    </div>
                    <!-- Fields to add properties of the apartment; title, price, room, address, etc. -->
                    <div class="col-sm-6 text-left">
                        <?php if ($editing === true) { ?>
                            <h1>Edit Listing</h1>
                        <?php } else { ?>
                            <h1>Create a Listing</h1>
                        <?php } ?>
                        <hr>
                        <form class="form-horizontal" action="<?php if ($editing === true) { echo '' . URL . 'listing/update/' . $apartmentId; } else { echo '' . URL . 'listing/create/' . $session['id']; } ?>" method="POST">
                            <!-- Apartment title -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Title*</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="title" id="title" type="text" value="<?php if ($editing === true) { echo $listingInfo->title; } ?>">
                                </div>
                            </div>
                            <!-- Apartment price -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Price*:</label>
                                <div class="col-sm-4">
                                    <input class="form-control" name="price" id="price" type="number" value="<?php if ($editing === true) { echo $listingInfo->price; } ?>">
                                </div>
                            </div>
                            <!-- Available rooms -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Rooms*:</label>
                                <div class="col-sm-4">
                                    <input class="form-control" name="rooms" id="rooms" type="number" value="<?php if ($editing === true) { echo $listingInfo->rooms; } ?>">
                                </div>
                            </div>
                            <!-- Available bathroom -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Bathrooms*:</label>
                                <div class="col-sm-4">
                                    <input class="form-control" name="baths" id="baths" type="number" value="<?php if ($editing === true) { echo $listingInfo->baths; } ?>">
                                </div>
                            </div>
                            <!--
                            <div class="form-group">
                                <label class="col-sm-3 control-label">SquareFt:</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="squareFt" type="number" value="">
                                </div>
                            </div>
                            -->
                            <!-- Apartment address -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Address*:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="address" id="address" type="text" value="<?php if ($editing === true) { echo $listingInfo->street_address; } ?>">
                                </div>
                            </div>
                            <!-- Apartment Zipcode -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">ZipCode*:</label>
                                <div class="col-sm-4">
                                    <input class="form-control" name="zipCode" id="zipCode" type="number" value="<?php if ($editing === true) { echo $listingInfo->zipcode; } ?>">
                                </div>
                            </div>
                            <!-- Short description of the apartment -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Description:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="7" name="description" id="description"><?php if ($editing === true) { echo $listingInfo->description; } ?></textarea>
                                </div>
                            </div>
                            <hr>
                            <!-- Select photos to uploads. Max photo amount 10. Allowed file types: jpg and png. -->
                            <div class="form-group">
                                <label class="control-label">Select Photo to Upload*</label>
                                <input id="select-photos" name="select-photos[]" type="file" multiple class="file-loading" data-allowed-file-extensions='["jpg", "png"]'>
                                <script>
                                    $(document).on('ready', function () {
                                        $("#select-photos").fileinput({
                                            showUpload: true,
                                            maxFileCount: 4,
                                            mainClass: "input-group-lg"
                                        });
                                    });
                                </script>
                            </div>
                            <div class="footer">* Required field</div>
                            <hr>
                            <button type="submit" class="btn btn-primary"><?php if ($editing === true) { echo 'update'; } else { echo 'post'; } ?></button>
                            <?php if ($editing === true) { ?>
                                <a href="<?php echo URL . 'listing/delete/' . $listingInfo->apartment_id; ?>"><button type="button" class="btn btn-danger">delete</button></a>
                            <?php } ?>
                            <hr>
                        </form>
                    </div>
                    <div class="col-sm-3">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
