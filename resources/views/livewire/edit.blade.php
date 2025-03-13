
<div>
<form wire:submit.prevent="update">

{{-- STEP 1 --}}

@if ($currentStep == 1)
    

<div class="step-one">
    <div class="card">
        <div class="card-header bg-secondary text-white">المرحلة 1/4 - المعلومات الشخصية</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" class="form-control" value='{{  $citizen->name  }}' wire:model="name">
                       <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                       <label for="famName">اللقب</label>
                       <input type="text" class="form-control" value='{{  $citizen->name  }}' wire:model="famName">
                       <span class="text-danger">@error('famName'){{ $message }}@enderror</span>
                   </div>
               </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="marital_status">الوضع الاجتماعي </label>
                        <select class="form-control" wire:model="marital_status">
                        <option value="" {{$citizen->marital_status == '' ? 'selected' : '' }}>الحالة الاجتماعية</option>
                        <option value="married" {{$citizen->marital_status == 'married' ? 'selected' : '' }}>متزوج</option>
                         <option value="divorced" {{$citizen->marital_status == 'divorced' ? 'selected' : '' }}>مطلق</option>
                         <option value="widow" {{ $citizen->marital_status == 'widow' ? 'selected' : '' }}>أرملة</option>
                        <option value="sponsored" {{ $citizen->marital_status == 'sponsored' ? 'selected' : '' }}>كفيل</option>
                        <option value="single_unsponsored" {{ $citizen->marital_status == 'single_unsponsored' ? 'selected' : '' }}>عزباء بدون كفيل</option>
                        <option value="elderly" {{$citizen->marital_status == 'elderly' ? 'selected' : '' }}>كبار في السن</option>
                       </select>
                       <span class="text-danger">@error('marital_status'){{ $message }}@enderror</span>

                    </div>
                  </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">العنوان</label>
                        <input type="text" class="form-control" value="{{$citizen->address}}" wire:model="address">
                        <span class="text-danger">@error('address'){{ $message }}@enderror</span>
                    </div>
                </div>
           </div>

           <div class="row">
                 <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone_number">رقم الهاتف</label>
                        <input type="text" class="form-control"  value="{{$citizen->phone_number}}" wire:model="phone_number">
                        <span class="text-danger">@error('phone_number'){{ $message }}@enderror</span>
                    </div>
                </div> 
            </div>
            
           
        </div>
    </div>
</div>

@endif
{{-- STEP 2 --}}

@if ($currentStep == 2)
    

<div class="step-two">
    <div class="card">
        <div class="card-header bg-secondary text-white">المرحلة 2/4 - الوضع العائلي</div>
        <div class="card-body">
              <div class="row">
                 <div class="col-md-6">
                     <div class="form-group">
                        <label for=""> دخل الشهري </label>
                        <input type="text" class="form-control"  value="{{$citizen->monthly_income}}" wire:model="monthly_income">
                        <span class="text-danger">@error('monthly_income'){{ $message }}@enderror</span>
                     </div>
                 </div>
                 <div class="col-md-6">
                  <div class="form-group">
                        <label for="healthy_disabilty_prevent_work">عجز صحي يمنع القدرة على العمل</label>
                        <select class="form-control" wire:model="healthy_disabilty_prevent_work">
                        <option value="" selected>عجز صحي يمنع القدرة على العمل </option>
                            <option value=1 {{$citizen->healthy_disabilty_prevent_work == 1 ? 'selected' : '' }}>نعم</option>
                            <option value=0 {{$citizen->healthy_disabilty_prevent_work == 0 ? 'selected' : '' }}>لا</option>
                            
                        </select>
                        <span class="text-danger">@error('healthy_disabilty_prevent_work'){{ $message }}@enderror</span>
                  </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-6">
                     <div class="form-group">
                        <label for="wife_chronic_conditions">إصابة الزوجة بمرض مزمن</label>
                        <select class="form-control" wire:model="wife_chronic_conditions">
                        <option value="" selected>إصابة الزوجة بمرض مزمن</option>
                            <option value=1 {{$citizen->wife_chronic_conditions == 1 ? 'selected' : '' }}>نعم</option>
                            <option value=0 {{$citizen->wife_chronic_conditions == 0 ? 'selected' : '' }}>لا</option>
                            
                        </select>
                        <span class="text-danger">@error('wife_chronic_conditions'){{ $message }}@enderror</span>
                     </div>
                 </div>
                
           
                 <div class="col-md-6">
                  <div class="form-group">
                        <label for="husband_chronic_conditions">إصابة الزوج بمرض مزمن</label>
                        <select class="form-control" wire:model="husband_chronic_conditions">
                        <option value="" selected>إصابة الزوج بمرض مزمن</option>
                            <option value=1 {{$citizen->husband_chronic_conditions == 1 ? 'selected' : '' }}>نعم</option>
                            <option value=0 {{$citizen->husband_chronic_conditions == 0 ? 'selected' : '' }}>لا</option>
                            
                        </select>
                        <span class="text-danger">@error('husband_chronic_conditions'){{ $message }}@enderror</span>
                   </div>
                 </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="underage_children"> عدد الاطفال الذين لم يبلغو سن الرشد</label>
                        <input type="text" class="form-control" value="{{$citizen->underage_children}}" wire:model="underage_children">
                        <span class="text-danger">@error('underage_children'){{ $message }}@enderror</span>
                    </div>
                  </div>
                 <div class="col-md-6">
                  <div class="form-group">
                        <label for="sponsored_chronic_illness">عدد الأطفال المصابين بمرض مزمن</label>
                        <input type="text" class="form-control"  value="{{$citizen->sponsored_chronic_illness}}" wire:model="sponsored_chronic_illness">
                            
                        </select>
                        <span class="text-danger">@error('sponsored_chronic_illness'){{ $message }}@enderror</span>
                  </div>
                 </div>
             </div>
                









            </div>
        </div>
    </div>

    @endif


    @if ($currentStep == 3)
    

<div class="step-three">
    <div class="card">
        <div class="card-header bg-secondary text-white">  المرحلة 3/4 - الوضع السكني و المعيشي</div>
        <div class="card-body">
           
            <div class="row">
            <div class="col-md-6">
                  <div class="form-group">
                        <label for="ragile_houssing">
                         مسكن هش أو فوضوي ؟
        
                        </label>
                        <select class="form-control" wire:model="fragile_houssing">
                        <option value="" selected>مسكن هش أو فوضوي</option>
                            <option value=1 {{$citizen->fragile_houssing == 1 ? 'selected' : '' }}>نعم</option>
                            <option value=0 {{$citizen->fragile_houssing == 0 ? 'selected' : '' }}>لا</option>
                            
                        </select>
                        <span class="text-danger">@error('fragile_houssing'){{ $message }}@enderror</span>
                  </div>
                 </div>
                 <div class="col-md-6">
                  <div class="form-group">
                        <label for="in_municipality">
                            الإقامة داخل حدود بلدية قادرية ؟
                        </label>
                        <select class="form-control" wire:model="in_municipality">
                        <option value="" selected> الإقامة داخل حدود بلدية قادرية</option>
                            <option value=1 {{$citizen->in_municipality == 1 ? 'selected' : '' }}>نعم</option>
                            <option value=0 {{$citizen->in_municipality == 0 ? 'selected' : '' }}>لا</option>
                            
                        </select>
                        <span class="text-danger">@error('in_municipality'){{ $message }}@enderror</span>
                  </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-6">
                     <div class="form-group">
                        <label for="rented_house"> مستأجر لمسكن ؟</label>
                        <select class="form-control" wire:model="rented_house">
                        <option value="" selected> مستأجر لمسكن </option>
                            <option value=1 {{$citizen->rented_house == 1 ? 'selected' : '' }}>نعم</option>
                            <option value=0 {{$citizen->rented_house == 0 ? 'selected' : '' }}>لا</option>
                            
                        </select>
                        <span class="text-danger">@error('rented_house'){{ $message }}@enderror</span>
                     </div>
                 </div>
                
           
                 <div class="col-md-6">
                  <div class="form-group">
                        <label for="has_debt">مديون أو غارق في ديون ؟</label>
                        <select class="form-control" wire:model="has_debt">
                        <option value="" selected>مديون أو غارق في ديون</option>
                            <option value=1 {{$citizen->has_debt == 1 ? 'selected' : '' }}>نعم</option>
                            <option value=0 {{$citizen->has_debt == 0 ? 'selected' : '' }}>لا</option>
                            
                        </select>
                        <span class="text-danger">@error('has_debt'){{ $message }}@enderror</span>
                   </div>
                 </div>
                </div>
            <div class="row">
            <div class="col-md-6">
                <label>الاعانات الخارجية</label>
           
            <div class="frameworks d-flex flex-column align-items-left mt-2">
            <label for="no_municipality_benefits">
    <input type="checkbox" id="no_municipality_benefits" value="no_municipality_benefits" wire:model="frameworks"
        {{ in_array('no_municipality_benefits', $citizen->frameworks ) ? 'checked' : '' }}>
    غير مستفيد من إعانة
</label>

<label for="no_association_benefits">
    <input type="checkbox" id="no_association_benefits" value="no_association_benefits" wire:model="frameworks"
        {{ in_array("no_association_benefits", $citizen->frameworks) ? 'checked' : '' }}>
    غير مستفيد من جمعيات أخرى
</label>

<label for="no_social_security">
    <input type="checkbox" id="no_social_security" value="no_social_security" wire:model="frameworks"
        {{ in_array('no_social_security' , $citizen->frameworks) ? 'checked' : '' }}>
    لا يمتلك بطاقة الضمان الاجتماعي
</label>

               
            </div>
            <span class="text-danger">@error('frameworks'){{ $message }}@enderror</span>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                        <label for="live_familyHome">مسكن عائلي ؟ </label>
                        <select class="form-control" wire:model="live_familyHome">
                        <option value="" selected>مسكن عائلي</option>
                            <option value=1 {{$citizen->live_familyHome == 1 ? 'selected' : '' }}>نعم</option>
                            <option value=0 {{$citizen->live_familyHome == 0 ? 'selected' : '' }}>لا</option>
                            
                        </select>
                        <span class="text-danger">@error('live_familyHome'){{ $message }}@enderror</span>
                   </div>
            </div>


            </div>






        </div>
    </div>
</div>
@endif

{{-- STEP 4 --}}
@if ($currentStep == 4)
    

<div class="step-four">
    <div class="card">
        <div class="card-header bg-secondary text-white">المرحلة 4/4 - العوامل السلبية</div>
        <div class="card-body">
            <div class="form-group">
                
                <label for="unemployed_husband_no_reason">
                    <input type="checkbox" id="unemployed_husband_no_reason" value="unemployed_husband_no_reason" wire:model="negatives"  {{ in_array('unemployed_husband_no_reason' , $citizen->negatives) ? 'checked' : '' }}> الزوج بصحة جيدة لكنه لا يعمل بدون مبرر  
                </label>
                <label for="husband_drugs">
                    <input type="checkbox" id="husband_drugs" value="husband_drugs" wire:model="negatives" {{ in_array('husband_drugs' , $citizen->negatives) ? 'checked' : '' }}> الزوج مدخل أو يتعاطى المواد الممنوعة
                </label>
                <label for="high_income">
                    <input type="checkbox" id="high_income" value="high_income" wire:model="negatives" {{ in_array('high_income' , $citizen->negatives) ? 'checked' : '' }}> الدخل العائلي يفوق 50000 دج 
                </label>
                <label for="family_negative_reputation" >
                    <input type="checkbox" id="family_negative_reputation" value="family_negative_reputation" wire:model="negatives" {{ in_array('family_negative_reputation' , $citizen->negatives) ? 'checked' : '' }}> عائلة معروفة بسوء التدبير و الاسراف
                </label>
                <label for="owns_land">
                    <input type="checkbox" id="nowns_land" value="owns_land" wire:model="negatives" {{ in_array('owns_land' , $citizen->negatives) ? 'checked' : '' }}>امتلاك أرض زراعية سكنية صالحة للاستغلال  
                </label>
                <label for="owns_vehicle">
                    <input type="checkbox" id="owns_vehicle" value="owns_vehicle" wire:model="negatives" {{ in_array("owns_vehicle" , $citizen->negatives) ? 'checked' : '' }}>   امتلاك عربة في حالة مقبولة
                </label>
                <label for="owns_trees">
                    <input type="checkbox" id="owns_trees" value="owns_trees" wire:model="negatives" {{ in_array('owns_trees' , $citizen->negatives) ? 'checked' : '' }}>   امتلاك اشجار مثمرة
                </label>
                <label for="full_heal_card">
                    <input type="checkbox" id="full_heal_card" value="full_heal_card" wire:model="negatives" {{ in_array('full_heal_card' , $citizen->negatives) ? 'checked' : '' }}>     امتلاك بطاقة الشفاء 100%
                </label>
                <span class="text-danger">@error('terms'){{ $message }}@enderror</span>
            </div>
        </div>
    </div>
</div>
@endif

<div class="action-buttons d-flex justify-content-between  pt-2 pb-2">

   @if ($currentStep == 1)
       <div></div>
   @endif

   @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4)
       <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Back</button>
   @endif
   
   @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3)
       <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Next</button>
   @endif
   
   @if ($currentStep == 4)
        <button type="submit" class="btn btn-md btn-primary">Edit</button>
   @endif
       
      
</div>


</form>


</div>
