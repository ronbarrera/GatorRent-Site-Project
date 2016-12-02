<body>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="container-fluid">
                <div class="row content">
                    <div class="col-sm-2 sidenav">
                        <h4>Your Listings</h4>
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="#section1">Listing #1</a></li>
                            <li><a href="#section2">Listing #2</a></li>
                            <li><a href="#section3">Listing #3</a></li>
                            <li><a href="#section3">Listing #4</a></li>
                        </ul><br>
                    </div>
                    <div class="col-sm-5 text-left">
                        <h1>Create a Listing</h1>
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="titleInput" type="text" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Price:</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="priceInput" type="number" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Rooms:</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="roomsInput" type="number" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">SquareFt:</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="squareFtInput" type="number" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Address:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="addressFtInput" type="text" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ZipCode:</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="zipCodeInput" type="number" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Description:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="7" id="description"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-5 input-group">
                        <input id="input-dim-1" name="inputdim1[]" type="file" multiple class="file-loading" accept="image/*">
                    </div>
                </div>
            </div>
            <hr>
            <button type="button" class="btn btn-warning">Remove my property from GatorRent</button>
            <button type="button" class="btn btn-primary">Display my property on GatorRent</button>
        </div>
    </div>
</body>
