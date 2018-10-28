<!-- ledger modal -->
<div id="addmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title">Add HouseKeeping Status</h5>
            </div>
            <form action="/hkstatus/" method="post" id="addform">
                <div class="modal-body">
                    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="status" class="control-label mb-10">Status :</label>
                                <input type="text" class="form-control" id="status" name="status">
                            </div>
                            <div class="form-group">
                                <div id="cp2" class="input-group colorpicker-component">
                                    <!--{{Form::text('color',null, ['class' => 'form-control','id' =>'color','placeholder' => 'Enter Color']) }}-->
                                    <input type="text" name="color" id="color" class="form-control" placeholder="Enter Color">
                                    <span class="input-group-addon"><i></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox checkbox-primary">
                                    <input id="is_dirty" name="is_dirty" type="checkbox" value="Yes" checked="">
                                    <label for="checkbox2">Is Dirty</label>
                                </div>
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
                <h5 class="modal-title">Edit HouseKeeping Status</h5>
            </div>
            <form method="post" id="editform">
                <div class="modal-body">
                     <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-group">
                                <label for="status" class="control-label mb-10">Status :</label>
                                <input type="text" class="form-control" id="status" name="status">
                            </div>
                            <div class="form-group">
                                <div id="cp3" class="input-group colorpicker-component">
                                    <!--{{Form::text('color',null, ['class' => 'form-control','id' =>'color','placeholder' => 'Enter Color']) }}-->
                                    <input type="text" name="color" id="color2" class="form-control" placeholder="Enter Color">
                                    <span class="input-group-addon"><i></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox checkbox-primary">
                                    <input id="is_dirty" name="is_dirty" type="checkbox" checked="">
                                    <label for="checkbox2">Is Dirty</label>
                                </div>
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


