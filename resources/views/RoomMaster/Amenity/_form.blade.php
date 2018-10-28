<!-- ledger modal -->
<div id="addmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title">Amenity Master</h5>
            </div>
            <form action="/amenity/" method="post" id="addform">
                <div class="modal-body">
                    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="name" class="control-label mb-10">Amenity Name :</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="name" class="control-label mb-10">Amenity Type :</label>
                                <select class="form-control postingtype" id="posting_type" name="amenity_type">
                                    <option>--Select Amenity Type--</option>
                                    <option value="Both" selected>Both</option>
                                    <option value="Hotel">Hotel</option>
                                    <option value="Room">Room</option>
                                </select>
                            </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ledger modal -->
<div id="editmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title">Edit Amenity</h5>
            </div>
            <form method="post" id="editform">
                <div class="modal-body">
                     <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-group">
                                <label for="name" class="control-label mb-10">Amenity Name :</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="name" class="control-label mb-10">Amenity Type :</label>
                                <select class="form-control postingtype" id="posting_type" name="amenity_type">
                                    <option>--Select Amenity Type--</option>
                                    <option value="Both" selected>Both</option>
                                    <option value="Hotel">Hotel</option>
                                    <option value="Room">Room</option>
                                </select>
                            </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


