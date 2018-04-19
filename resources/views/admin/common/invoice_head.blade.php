<div class="row">
    {{csrf_field()}}
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-lg-3 control-label">Mobile</label>

            <div class="col-lg-8">
                <input type="text" name="mobile" class="form-control" placeholder="Mobile"
                       required id="cMobile">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Name</label>

            <div class="col-lg-8">
                <input class="form-control" placeholder="Name" type="text" name="name"
                       required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Email</label>

            <div class="col-lg-8">
                <input class="form-control" placeholder="Email" type="text" name="email">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Address</label>

            <div class="col-lg-8">
                <input class="form-control" placeholder="Address" type="text" name="address"
                       required>
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-lg-3 control-label">Invoice No</label>

            <div class="col-lg-6">
                <input type="text" name="invoice_no" class="form-control" placeholder="Invoice No"
                       required value="{{request()->invoice_no}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Order No</label>

            <div class="col-lg-6">
                <input type="text" name="invoice_sl" class="form-control" placeholder="Invoice Sl"
                       required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Invoice Date</label>

            <div class="col-lg-6">
                <input type="text" name="invoice_date" class="form-control date" placeholder="Date"
                       required value="{{date('Y-m-d')}}">
            </div>
        </div>
    </div>
</div>