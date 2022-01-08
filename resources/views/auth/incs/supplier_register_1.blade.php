<div class="form-group">
    <label for="company-name" class="float-right mb-5">إسم الشركة <span class="text-danger" style="font-size:20px;">*</span> </label>
    <input id="company-name" wire:model.lazy="feilds.company_name" value="{{old('company_name')}}" name="company_name" class="form-control form-control-lg rounded-lg border border-secondary">
    @error('feilds.company_name')
    <span class="text-danger">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>
<div class="form-group" >
    <label for="govern" class="float-right mb-5">المحافظة <span class="text-danger" style="font-size:20px;">*</span> </label>
    <select  name="state" wire:model="feilds.state" id="govern" class="form-control form-control-lg rounded-lg border border-secondary">
    <option value="" selected>--إختر المحافظة--</option>
    @foreach(config('states') as $state)
    <option class="text-right" value="{{$state}}">
        {{$state}}
    </option>
    @endforeach
    </select>
</div>
    @error('feilds.state')
    <span class="text-danger">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
<div class="form-group">
    <label for="company-address" class="float-right mb-5">عنوان الشركة <span class="text-danger" style="font-size:20px;">*</span></label>
    <input wire:model.lazy="feilds.company_address" id="company-address" value="{{old('company_address')}}" name="company_address" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="أكتب العنوان كاملاً">
    @error('feilds.company_address')
    <span class="text-danger">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="details" class="float-right mb-5">:   نبذة عن الشركة  <span class="text-danger" style="font-size:20px;">*</span></label>
    <textarea wire:model.lazy="feilds.about" name="about" class="form-control rounded-lg border border-secondary" id="details"rows="5" placeholder="أكتب نبذة عن الشركة">{{old('about')}}</textarea>
    @error('feilds.about')
    <span class="text-danger">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label for="crn" class="float-right mb-5">رقم السجل التجاري إن وجد</label>
    <input wire:model.lazy="feilds.company_CRN" id="crn" name="company_CRN" value="{{old('company_CRN')}}"  class="form-control form-control-lg rounded-lg border border-secondary" placeholder="مثال : 322787">
    @error('feilds.company_CRN')
    <span class="text-danger">
        <strong>{{ $message }}</strong>
    </span>
    @enderror            
</div>
<div class="form-group">
    <label for="tax" class="float-right mb-5"> البطاقة الضريبية إن وجد</label>
    <input wire:model.lazy="feilds.company_TXCard" id="tax" name="company_TXCard" value="{{old('company_TXCard')}}" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="مثال : 322787">
    @error('feilds.company_TXCard')
    <span class="text-danger">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label for="emp" class="float-right mb-5"> عدد الموظفين <span class="text-danger" style="font-size:20px;">*</span></label>
    <input wire:model.lazy="feilds.employees_number" id="emp" name="employees_number" value="{{old('employees_number')}}" class="form-control form-control-lg rounded-lg border border-secondary" placeholder="مثال : 7">
    @error('feilds.employees_number')
    <span class="text-danger">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group my-6">
    <label  class="float-right mb-5"> عندك كتالوج</label>
    <div class="d-flex">
        <div class="px-3 py-1 mr-3 d-flex justify-content-around border border-primary-dotted rounded">

            <div class="py-2 mx-autos"> 
            <img class="w-30 float-right" src="{{asset('assets/xd/icons/file.png')}}" alt="">
            </div>
            <div class="btn btn-sm rounded btn-primary" style="position: relative;overflow: hidden;"> تحميل الكاتالوج
            <input wire:model.lazy="feilds.cataloge" type="file" value="{{old('cataloge')}}" style="position: absolute;opacity: 0;top: 0;right: 0;" class="ml-2" name="cataloge">
            </div>
        </div>
        
    </div>
    <div class="text-right">
        
    @if ($feilds['cataloge'])
        <img src="{{ $feilds['cataloge']->temporaryUrl() }}" style="width:100px;height:100px;" alt="">
    @endif
    </div>
    @error('feilds.cataloge')
    <span class="text-danger">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>