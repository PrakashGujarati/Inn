<!-- ledger modal -->
<div id="addmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width: 97%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title">Add Ledger</h5>
            </div>
            <form action="/ledgers/" method="post" id="addform">
                <div class="modal-body">
                    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="name" class="control-label">Ledger Name</label>
                            <input id="name" autocomplete="off" name="name" type="text" class="form-control" required="required">
                        </div>
                        <div class="col-md-2">
                            <label for="alias" class="control-label">Alias</label>
                            <input id="alias" autocomplete="off" name="alias" type="text" class="form-control" required="required">
                        </div>
                        <div class="col-md-2">
                            <label for="opening" class="control-label">Opening</label>
                            <input id="opening" autocomplete="off" name="opening" type="text" class="form-control" required="required">
                        </div>
                        <div class="col-md-2">
                            <label for="connect_with" class="control-label">Connect With</label>
                            <input id="connect_with" autocomplete="off" name="connect_with" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="group_id" class="col-4 control-label">Select Group</label>
                            <select id="group_id" autocomplete="off" name="group_id" class="form-control" required="required">
                                @foreach($ledgergroups as $ledgergroup)
                                <option value="{{$ledgergroup->id}}">{{$ledgergroup->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="tally_name" class="control-label">Tally Name</label>
                            <input id="tally_name" autocomplete="off" name="tally_name"type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="dob" class="control-label">Date of Birth</label>
                            <input id="dob" autocomplete="off" name="dob" type="text" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label for="dob" class="control-label">Employee
                                <input type="hidden" name="is_employee" value="0" />
                                <input type="checkbox" name="is_employee"  id="is_employee" class="form-control" value="1" style="height: 22px; margin-top:6px;" /></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="city" class="control-label">Address</label>
                            <textarea id="address" autocomplete="off" name="address" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="city" class="control-label">City</label>
                            <input id="city" autocomplete="off" name="city" type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="pincode" class="control-label">Pincode</label>
                            <input id="pincode" autocomplete="off" name="pincode" type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="state" class="control-label">State</label>
                            <input id="state" autocomplete="off" name="state" type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="nationality" class="control-label">Nationality</label>
                            <input id="nationality" autocomplete="off" name="nationality" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="email" class="control-label">Email</label>
                            <input id="email" autocomplete="off" name="email" type="text" class="form-control" required="required">
                        </div>
                        <div class="col-md-3">
                            <label for="phone_no" class="control-label">Phone No</label>
                            <input id="phone_no" autocomplete="off" name="phone_no" type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="mobile_no" class="control-label">Mobile No</label>
                            <input id="mobile_no" autocomplete="off" name="mobile_no" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="reference_name" class="control-label">Reference Name</label>
                            <input id="reference_name" autocomplete="off" name="reference_name" placeholder="FirstName LastName"  type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="discount" class="control-label">Discount</label>
                            <input id="discount" autocomplete="off" name="discount" type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="native" class="control-label">Native</label>
                            <input id="native" autocomplete="off" name="native" type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="control-label" for="gstn_no">GSTN No</label>
                            <input id="gstn_no" autocomplete="off" name="gstn_no" type="text" class="form-control">
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
    <div class="modal-dialog" style="width: 97%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title">Edit Designation</h5>
            </div>
            <form method="post" id="editform">
                <div class="modal-body">
                    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="name" class="control-label">Ledger Name</label>
                            <input id="name" autocomplete="off" name="name" type="text" class="form-control" required="required">
                        </div>
                        <div class="col-md-2">
                            <label for="alias" class="control-label">Alias</label>
                            <input id="alias" autocomplete="off" name="alias" type="text" class="form-control" required="required">
                        </div>
                        <div class="col-md-2">
                            <label for="opening" class="control-label">Opening</label>
                            <input id="opening" autocomplete="off" name="opening" type="text" class="form-control" required="required">
                        </div>
                        <div class="col-md-2">
                            <label for="connect_with" class="control-label">Connect With</label>
                            <input id="connect_with" autocomplete="off" name="connect_with" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="group_id" class="col-4 control-label">Select Group</label>
                            <select id="group_id" autocomplete="off" name="group_id" class="form-control" required="required">
                                @foreach($ledgergroups as $ledgergroup)
                                    <option value="{{$ledgergroup->id}}">{{$ledgergroup->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="tally_name" class="control-label">Tally Name</label>
                            <input id="tally_name" autocomplete="off" name="tally_name"type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="dob" class="control-label">Date of Birth</label>
                            <input id="dob" autocomplete="off" name="dob" type="text" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label for="dob" class="control-label">Employee
                                <input type="hidden" name="is_employee" value="0" />
                                <input type="checkbox" name="is_employee"  id="is_employee" value="1" class="form-control" style="height: 22px; margin-top:6px;" /></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="city" class="control-label">Address</label>
                            <textarea id="address" autocomplete="off" name="address" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="city" class="control-label">City</label>
                            <input id="city" autocomplete="off" name="city" type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="pincode" class="control-label">Pincode</label>
                            <input id="pincode" autocomplete="off" name="pincode" type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="state" class="control-label">State</label>
                            <input id="state" autocomplete="off" name="state" type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="nationality" class="control-label">Nationality</label>
                            <input id="nationality" autocomplete="off" name="nationality" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="email" class="control-label">Email</label>
                            <input id="email" autocomplete="off" name="email" type="text" class="form-control" required="required">
                        </div>
                        <div class="col-md-3">
                            <label for="phone_no" class="control-label">Phone No</label>
                            <input id="phone_no" autocomplete="off" name="phone_no" type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="mobile_no" class="control-label">Mobile No</label>
                            <input id="mobile_no" autocomplete="off" name="mobile_no" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="reference_name" class="control-label">Reference Name</label>
                            <input id="reference_name" autocomplete="off" name="reference_name" placeholder="FirstName LastName"  type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="discount" class="control-label">Discount</label>
                            <input id="discount" autocomplete="off" name="discount" type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="native" class="control-label">Native</label>
                            <input id="native" autocomplete="off" name="native" type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="control-label" for="gstn_no">GSTN No</label>
                            <input id="gstn_no" autocomplete="off" name="gstn_no" type="text" class="form-control">
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