<!-- ledger modal -->
<div id="addmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title">Add Taxes</h5>
            </div>
            <form action="/taxes/" method="post" id="addform">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="name" class="control-label mb-10">Short Name :</label>
                                <input type="text" class="form-control" id="short_name" name="short_name">
                            </div>
                            <div class="form-group">
                                <label for="name" class="control-label mb-10">Tax Name :</label>
                                <input type="text" class="form-control" id="tax_name" name="tax_name">
                            </div>
                            <div class="form-group">
                                <label for="name" class="control-label mb-10">Applies From :</label>
                                <input type="text" class="form-control datepicker" id="applies_from" name="applies_from">
                            </div>
                            <div class="form-group">
                                <label for="name" class="control-label mb-10">Exempt After :</label>
                                <input type="number" class="form-control" id="exempt_after" name="exempt_after">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">    
                             <div class="form-group">
                                <label for="name" class="control-label mb-10">Posting Type :</label>
                                <select class="form-control postingtype" id="posting_type" name="posting_type">
                                    <option>--Select Posting Type--</option>
                                    <option value="Amount">Flat Amount</option>
                                    <option value="Percentage">Flat Percentage</option>
                                    <option value="Slab">Slab</option>
                                </select>
                            </div>
                            <div class="form-group flatamount">
                                <label for="name" class="control-label mb-10">Amount : (Rs)</label>
                                <input type="text" class="form-control" id="flat_amount" name="flat_amount">
                            </div>
                            <div class="form-group pax">
                                <label for="name" class="control-label mb-10">Apply On Pax :</label>
                                <select class="form-control" id="apply_pax" name="apply_pax">
                                    <option value="Night">Per Night</option>
                                    <option value="Adult">Per Adult</option>
                                    <option value="Child">Per Child</option>
                                    <option value="Pax">Per Pax</option>
                                </select>
                            </div>
                            <div class="form-group flatpercentage">
                                <label for="name" class="control-label mb-10">Tax % :</label>
                                <input type="text" class="form-control" id="flat_percentage" name="flat_percentage">
                            </div>
                            <div class="form-group slabno">
                                <label for="name" class="control-label mb-10">No. Of Slab :</label>
                                <div class="row">
                                <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" id="no_slab" name="no_slab">
                                </div>
                                <div class="col-md-6 col-sm-6">
                                <div class="btn btn-success generate">Generate</div>
                                </div>
                                </div>
                            </div>
                            <div class="form-group slabs">
                                <div class="row" style="margin-bottom:10px;text-align:center;">
                                    <label class="col-md-4" style="font-weight:bolder">FROM</label>
                                    <label class="col-md-4" style="font-weight:bolder">To</label>
                                    <label class="col-md-4" style="font-weight:bolder">%</label>
                                </div>
                                <div class="row" id="txt_slabs">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="control-label mb-10">Apply Tax :</label>
                                <div class="radio radio-info">
                                <input id="before" class="form-control" name="apply_tax" value="Before" type="radio">
                                <label for="checkbox2">Before Discount</label>
                                </div>
                                <div class="radio radio-info">
                                <input id="after" class="form-control" name="apply_tax" type="radio" value="After" checked="">
                                <label for="checkbox2">After Discount</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox checkbox-primary">
                                    <input id="is_on_rackrate" name="is_on_rackrate" type="checkbox" value="Yes">
                                    <label for="checkbox2">Apply Tax On Rack Rate :</label>
                                </div>
                            </div>
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
                <h5 class="modal-title">Edit Taxes</h5>
            </div>
            <form method="post" id="editform">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-group">
                                <label for="name" class="control-label mb-10">Short Name :</label>
                                <input type="text" class="form-control" id="short_name" name="short_name">
                            </div>
                            <div class="form-group">
                                <label for="name" class="control-label mb-10">Tax Name :</label>
                                <input type="text" class="form-control" id="tax_name" name="tax_name">
                            </div>
                            <div class="form-group">
                                <label for="name" class="control-label mb-10">Applies From :</label>
                                <input type="text" class="form-control datepicker" id="applies_from" name="applies_from">
                            </div>
                            <div class="form-group">
                                <label for="name" class="control-label mb-10">Exempt After :</label>
                                <input type="number" class="form-control" id="exempt_after" name="exempt_after">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">    
                             <div class="form-group">
                                <label for="name" class="control-label mb-10">Posting Type :</label>
                                 <input type="hidden" name="tax_id" id="tax_id" />
                                <select class="form-control postingtype" id="posting_type" name="posting_type">
                                    <option>--Select Posting Type--</option>
                                    <option value="Amount">Flat Amount</option>
                                    <option value="Percentage">Flat Percentage</option>
                                    <option value="Slab">Slab</option>
                                </select>
                            </div>
                            <div class="form-group flatamount">
                                <label for="name" class="control-label mb-10">Amount : (Rs)</label>
                                <input type="text" class="form-control" id="flat_amount" name="flat_amount">
                            </div>
                            <div class="form-group pax">
                                <label for="name" class="control-label mb-10">Apply On Pax :</label>
                                <select class="form-control" id="apply_pax" name="apply_pax">
                                    <option value="Night">Per Night</option>
                                    <option value="Adult">Per Adult</option>
                                    <option value="Child">Per Child</option>
                                    <option value="Pax">Per Pax</option>
                                </select>
                            </div>
                            <div class="form-group flatpercentage">
                                <label for="name" class="control-label mb-10">Tax % :</label>
                                <input type="text" class="form-control" id="flat_percentage" name="flat_percentage">
                            </div>
                            <div class="form-group edit_slabs">
                            </div>
                            <div class="form-group">
                                <label for="name" class="control-label mb-10">Apply Tax :</label>
                                <div class="radio radio-info">
                                    <input id="before" class="form-control" name="apply_tax" value="Before" type="radio">
                                    <label for="checkbox2">Before Discount</label>
                                </div>
                                <div class="radio radio-info">
                                    <input id="after" class="form-control" name="apply_tax" type="radio" value="After">
                                    <label for="checkbox2">After Discount</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox checkbox-primary">
                                    <input id="is_on_rackrate" name="is_on_rackrate" type="checkbox" value="1">
                                    <label for="checkbox2">Apply Tax On Rack Rate :</label>
                                </div>
                            </div>
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


