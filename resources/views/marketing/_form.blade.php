
                      <div class="form-body">
					    <div class="form-group">
                           {{ Form::label("Customer Name",null,["for"=>"Customer Name"]) }}
                           {{Form::select('c_id',$customer, null, ['class' => 'form-control','id' =>'exampleFormControlSelect1','placeholder' => 'Select Customer']) }}
							@if ($errors->has('c_id'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('c_id') }}</strong>
                              </span>
                           @endif

                        </div>
						
						<div class="form-group">
                           {{ Form::label("Tool Name",null,["for"=>"email"]) }}
                           {{ Form::text("tool_name",null,["class" => "form-control","placeholder"=> "Tool Name","id"=>"tool_name"]) }}
                           @if ($errors->has('tool_name'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('tool_name') }}</strong>
                              </span>
                           @endif
                        </div>
						<div class="row">
							<div class="col-md-4">
							   <div class="form-group">
								   {{ Form::label("P.O.No",null) }}
								   {{ Form::text("p_o_no",null,["class" => "form-control","placeholder"=> "Policy No","id"=>"policy_no"]) }}
								   @if ($errors->has('p_o_no'))
									  <span class="help-block">
										  <strong>{{ $errors->first('p_o_no') }}</strong>
									  </span>
								   @endif
							   </div>
							</div>
							<div class="col-md-4">
							   <div class="form-group">
								   {{ Form::label("Quantity",null) }}
								   {{ Form::text("quantity",null,["class" => "form-control","placeholder"=> "Quantity","id"=>"quantity"]) }}
								   @if ($errors->has('quantity'))
									  <span class="help-block">
										  <strong>{{ $errors->first('quantity') }}</strong>
									  </span>
								   @endif
							   </div>
							</div>
							<div class="col-md-4">
							   <div class="form-group">
								   {{ Form::label("Code",null) }}
								   {{ Form::text("code",null,["class" => "form-control","placeholder"=> "Code","id"=>"code"]) }}
								   @if ($errors->has('code'))
									  <span class="help-block">
										  <strong>{{ $errors->first('code') }}</strong>
									  </span>
								   @endif
							   </div>
							</div>
						</div>
						<div class="form-group">
                           {{ Form::label("Order To",null,["for"=>"email"]) }}
                           {{ Form::text("order_to",null,["class" => "form-control","placeholder"=> "Order To","id"=>"order_to"]) }}
                           @if ($errors->has('order_to'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('order_to') }}</strong>
                              </span>
                           @endif
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
							  {{ Form::label("Order Date",null,["for"=>"email"]) }}
                               {{ Form::date("order_date",null,["class" => "form-control","placeholder"=> "Order Date","id"=>"order_to","data-toggle"=>"tooltip","data-trigger"=>"hover","data-placement"=>"top","data-title"=>"order date"]) }}
							   @if ($errors->has('order_date'))
								  <span class="help-block">
									  <strong>{{ $errors->first('order_date') }}</strong>
								  </span>
							   @endif
							
                            </div>
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
							  {{ Form::label("Order Destination Date",null,["for"=>"email"]) }}
                               {{ Form::date("des_date",null,["class" => "form-control","placeholder"=> "Select Destination Date","id"=>"des_date","data-toggle"=>"tooltip","data-trigger"=>"hover","data-placement"=>"top","data-title"=>"des_date"]) }}
							   @if ($errors->has('des_date'))
								  <span class="help-block">
									  <strong>{{ $errors->first('des_date') }}</strong>
								  </span>
							   @endif
							
                            </div>
                            </div>
                          </div>
                       
                        <div class="form-group">
						
							{{ Form::label("Order Is :",null) }}
							{{ Form::label("Repeat",null) }}
                            {{ Form::radio("order_is","repeat",["class" => "form-control","id"=>"input-radio-11"]) }}
							{{ Form::label("Modify",null) }}
                            {{ Form::radio("order_is","modify",["class" => "form-control","id"=>"input-radio-11"]) }}
							{{ Form::label("New",null) }}
                            {{ Form::radio("order_is","new",["class" => "form-control","id"=>"input-radio-11"]) }}
							{{ Form::label("Stock",null) }}
                            {{ Form::radio("order_is","stock",["class" => "form-control","id"=>"input-radio-11"]) }}
							   @if ($errors->has('order_is'))
								  <span class="help-block">
									  <strong>{{ $errors->first('order_is') }}</strong>
								  </span>
							   @endif
							   
							
                        </div>
						<div class="form-group">
                           {{ Form::label("Marking Detail",null) }}
                           {{ Form::textarea("marking_detail",null,["class" => "form-control","placeholder"=> "Marking Detail","rows"=>3,"id"=>"issueinput8","data-toggle"=>"tooltip","data-trigger"=>"hover","data-placement"=>"top","data-title"=>"marking_detail"]) }}
                           @if ($errors->has('marking_detail'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('marking_detail') }}</strong>
                              </span>
                           @endif
                        </div>
						<div class="form-group">
                           {{ Form::label("Note",null) }}
                           {{ Form::textarea("note",null,["class" => "form-control","placeholder"=> "note","rows"=>3,"id"=>"issueinput8","data-toggle"=>"tooltip","data-trigger"=>"hover","data-placement"=>"top","data-title"=>"note"]) }}
                           @if ($errors->has('note'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('note') }}</strong>
                              </span>
                           @endif
                        </div>
						<div class="form-group">
                           {{ Form::label("Employee Name",null,["for"=>"Customer Name"]) }}
                           {{Form::select('emp_id',$employee, null, ['class' => 'form-control','id' =>'exampleFormControlSelect1','placeholder' => 'Select Employee']) }}
							@if ($errors->has('emp_id'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('emp_id') }}</strong>
                              </span>
                           @endif

                        </div>
                       
                      
                      
    