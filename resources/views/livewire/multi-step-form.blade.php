
<div>
<form wire:submit.prevent="register">
{{ csrf_field() }}
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
                        <input type="text" class="form-control" placeholder="الاسم" wire:model="name">
                       <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                       <label for="famName">اللقب</label>
                       <input type="text" class="form-control" placeholder="اللقب" wire:model="famName">
                       <span class="text-danger">@error('famName'){{ $message }}@enderror</span>
                   </div>
               </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="marital_status">الوضع الاجتماعي </label>
                        <select  class="form-control" wire:model="marital_status">
                               <option value="" selected>الحالة الاجتماعية</option>
                               <option value="married">متزوج</option>
                               <option value="divorced">مطلق</option>
                               <option value="widow">أرملة</option>
                               <option value="sponsored">كفيل</option>
                               <option value="single_unsponsored">عزباء بدون كفيل</option>
                               <option value="elderly"> كبار في السن</option>
                        </select>
                        <span class="text-danger">@error('marital_status'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">العنوان</label>
                        <input type="text" class="form-control" placeholder="العنوان" wire:model="address">
                        <span class="text-danger">@error('address'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone_number">رقم الهاتف</label>
                        <input type="text" class="form-control" placeholder="أدخل رقم الهاتف" wire:model="phone_number">
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
                        <input type="text" class="form-control" placeholder="دخل الشهري " wire:model="monthly_income">
                        <span class="text-danger">@error('monthly_income'){{ $message }}@enderror</span>
                     </div>
                 </div>
                 <div class="col-md-6">
                  <div class="form-group">
                        <label for="healthy_disabilty_prevent_work">عجز صحي يمنع القدرة على العمل؟</label>
                        <select class="form-control" wire:model="healthy_disabilty_prevent_work">
                        <option value="" selected>عجز صحي يمنع القدرة على العمل </option>
                            <option value=1>نعم</option>
                            <option value=0>لا</option>
                            
                        </select>
                        <span class="text-danger">@error('healthy_disabilty_prevent_work'){{ $message }}@enderror</span>
                  </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-6">
                     <div class="form-group">
                        <label for="wife_chronic_conditions">إصابة الزوجة بمرض مزمن؟</label>
                        <select class="form-control" wire:model="wife_chronic_conditions">
                        <option value="" selected>إصابة الزوجة بمرض مزمن</option>
                            <option value=1>نعم</option>
                            <option value=0>لا</option>
                            
                        </select>
                        <span class="text-danger">@error('wife_chronic_conditions'){{ $message }}@enderror</span>
                     </div>
                 </div>
                
           
                 <div class="col-md-6">
                  <div class="form-group">
                        <label for="husband_chronic_conditions">إصابةالزوج بمرض مزمن؟</label>
                        <select class="form-control" wire:model="husband_chronic_conditions">
                        <option value="" selected>إصابة الزوج بمرض مزمن</option>
                            <option value=1>نعم</option>
                            <option value=0>لا</option>
                            
                        </select>
                        <span class="text-danger">@error('husband_chronic_conditions'){{ $message }}@enderror</span>
                   </div>
                 </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="underage_children"> عدد الاطفال الذين لم يبلغو سن الرشد</label>
                        <input type="text" class="form-control" placeholder=" عدد الاطفال الذين لم يبلغو سن الرشد" wire:model="underage_children">
                        <span class="text-danger">@error('underage_children'){{ $message }}@enderror</span>
                    </div>
                  </div>
                 <div class="col-md-6">
                  <div class="form-group">
                        <label for="sponsored_chronic_illness">عدد الأطفال المصابين بمرض مزمن</label>
                        <input type="text" class="form-control" placeholder="  عدد الأطفال المصابين بمرض مزمن  " wire:model="sponsored_chronic_illness">
                            
                        </select>
                        <span class="text-danger">@error('sponsored_chronic_illness'){{ $message }}@enderror</span>
                  </div>
                 </div>
             </div>
                









            </div>
        </div>
    </div>


@endif
{{-- STEP 3 --}}

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
                            <option value=1>نعم</option>
                            <option value=0>لا</option>
                            
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
                            <option value=1>نعم</option>
                            <option value=0>لا</option>
                            
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
                            <option value=1>نعم</option>
                            <option value=0>لا</option>
                            
                        </select>
                        <span class="text-danger">@error('rented_house'){{ $message }}@enderror</span>
                     </div>
                 </div>
                
           
                 <div class="col-md-6">
                  <div class="form-group">
                        <label for="has_debt">مديون أو غارق في ديون ؟</label>
                        <select class="form-control" wire:model="has_debt">
                        <option value="" selected>مديون أو غارق في ديون</option>
                            <option value=1>نعم</option>
                            <option value=0>لا</option>
                            
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
                    <input type="checkbox" id="no_municipality_benefits" value="no_municipality_benefits" wire:model="frameworks">غير  مستفيد من إعانة   
                </label>
                <label for="no_association_benefits">
                   <input type="checkbox" id="no_association_benefits" value="no_association_benefits" wire:model="frameworks">غير  مستفيد من جمعيات أخرى   
               </label>
               <label for="no_social_security">
                   <input type="checkbox" id="no_social_security" value="no_social_security" wire:model="frameworks"> لا يمتلك بطاقة الضمان الاجتماعي
               </label>
               
            </div>
            <span class="text-danger">@error('frameworks'){{ $message }}@enderror</span>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                        <label for="live_familyHome">مسكن عائلي ؟ </label>
                        <select class="form-control" wire:model="live_familyHome">
                        <option value="" selected>مسكن عائلي</option>
                            <option value=1>نعم</option>
                            <option value=0>لا</option>
                            
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
                    <input type="checkbox" id="unemployed_husband_no_reason" value="unemployed_husband_no_reason" wire:model="negatives"> الزوج بصحة جيدة لكنه لا يعمل بدون مبرر  
                </label>
                <label for="husband_drugs">
                    <input type="checkbox" id="husband_drugs" value="husband_drugs" wire:model="negatives"> الزوج مدخل أو يتعاطى المواد الممنوعة
                </label>
                <label for="high_income">
                    <input type="checkbox" id="high_income" value="high_income" wire:model="negatives"> الدخل العائلي يفوق 50000 دج 
                </label>
                <label for="family_negative_reputation" >
                    <input type="checkbox" id="family_negative_reputation" value="family_negative_reputation" wire:model="negatives"> عائلة معروفة بسوء التدبير و الاسراف
                </label>
                <label for="owns_land">
                    <input type="checkbox" id="nowns_land" value="owns_land" wire:model="negatives">امتلاك أرض زراعية سكنية صالحة للاستغلال  
                </label>
                <label for="owns_vehicle">
                    <input type="checkbox" id="owns_vehicle" value="owns_vehicle" wire:model="negatives">   امتلاك عربة في حالة مقبولة
                </label>
                <label for="owns_trees">
                    <input type="checkbox" id="owns_trees" value="owns_trees" wire:model="negatives">   امتلاك اشجار مثمرة
                </label>
                <label for="full_heal_card">
                    <input type="checkbox" id="full_heal_card" value="full_heal_card" wire:model="negatives">     امتلاك بطاقة الشفاء 100%
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
        <button type="submit" class="btn btn-md btn-primary">Submit</button>
   @endif
       
      
</div>

</form>


</div>
