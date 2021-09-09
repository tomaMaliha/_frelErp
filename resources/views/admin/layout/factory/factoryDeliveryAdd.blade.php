<!-- <div class="col-sm-2 form-group">
                    <label>Division</label>
                    <select name="division" id="division" class="form-control">
                        <option value="">--Select district--</option>
                        @foreach($divisions as $division)
                            <option value="{{$division->id}}">{{$division->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-2 form-group">
                    <label>District</label>
                    <select name="district" id="district" class="form-control">
                        <option value="">--Select district--</option>
                    </select>
                </div>
                <div class="col-sm-2 form-group">
                    <label>Upazila</label>
                    <select name="upazila" id="upazila" class="form-control">
                        <option value="">--Select upazila--</option>
                    </select>
                </div> -->

                
<!-- <td>{{ $customer->address }},
    {{ Devfaysal\BangladeshGeocode\Models\Upazila::find($customer->upazila)->name}},
    {{ Devfaysal\BangladeshGeocode\Models\District::find($customer->district)->name}},
    {{ Devfaysal\BangladeshGeocode\Models\Division::find($customer->division)->name}}
</td>

//edit
<div class="col-sm-2 form-group">
    <label>Division</label>
    <select name="division" id="division" class="form-control">
        <option value="{{ $customer->division }}">Select to change </option>
        @foreach($divisions as $division)
            <option value="{{$division->id}}">{{$division->name}}</option>
            @endforeach
    </select>
</div>
<div class="col-sm-2 form-group">
    <label>District</label>
    <select name="district" id="district" class="form-control">
        <option value="{{ $customer->district }}">Select to change</option>
    </select>
</div>
<div class="col-sm-2 form-group">
    <label>Upazila</label>
    <select name="upazila" id="upazila" class="form-control">
        <option value="{{ $customer->upazila }}">Select to change</option>
    </select>
</div>

                                             -->