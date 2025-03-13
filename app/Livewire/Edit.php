<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Citizen;
class Edit extends Component
{
   
    
    
    public $totalSteps = 4;
    public $currentStep = 1;

    public $citizen;
    public $name;
    public $famName;
    public $address;
    public $phone_number;
    public $marital_status;
    public $monthly_income;
    public $healthy_disabilty_prevent_work;
    public $underage_children;
    public $sponsored_chronic_illness;
    public $wife_chronic_conditions;
    public $husband_chronic_conditions;
    public $fragile_houssing;
    public $live_familyHome;
    public $has_debt;
    public $in_municipality;
    public $rented_house;
    //public $no_association_benefits;
    //public $no_social_security; 
    //public $unemployed_husband_no_reason;
    public $frameworks=[];
    public $negatives=[];
    public $pointMap =
    [
        'benefit_points' => [
            'no_association_benefits' => 3,
            'no_municipality_benefits' => 3,
            'no_social_security' => 3,
            
            // Add more frameworks and their points as needed.
        ],
        'lose_points'=>[
            'unemployed_husband_no_reason'=>8,
            'husband_drugs'=>6,
            'high_income'=>6,
            'family_negative_reputation'=>4,
            'owns_land'=>4,
            'owns_vehicle'=>4,
            'owns_trees'=>2,
            'full_heal_card'=>1,
            

        ],
    ];
   
    public function mount(Citizen $citizen)
    {
        $this->citizen = $citizen;
        $this->currentStep = 1;
        $this->name=$this->citizen->name;
       
        $this->famName=$this->citizen->famName;
        $this->address=$this->citizen->address;
        $this->phone_number=$this->citizen->phone_number;
        $this->marital_status=$this->citizen->marital_status;
        $this->monthly_income=$this->citizen->monthly_income;
        $this->healthy_disabilty_prevent_work=$this->citizen->healthy_disabilty_prevent_work;
        $this->underage_children=$this->citizen->underage_children;
        $this->sponsored_chronic_illness=$this->citizen->sponsored_chronic_illness;
        $this->wife_chronic_conditions=$this->citizen->wife_chronic_conditions;
        $this->husband_chronic_conditions=$this->citizen->husband_chronic_conditions;
        $this->fragile_houssing=$this->citizen->fragile_houssing;
        $this->live_familyHome=$this->citizen->live_familyHome;
        $this->has_debt=$this->citizen->has_debt;
        $this->in_municipality=$this->citizen->in_municipality;
        $this->rented_house=$this->citizen->rented_house;
    //public $no_association_benefits;
    //public $no_social_security; 
    //public $unemployed_husband_no_reason;
    $this->frameworks=$this->citizen->frameworks;
    $this->negatives=$this->citizen->negatives;
    }
    public function render()
    {
        return view('livewire.edit');
    }
    
    public function increaseStep()
    {
        
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if($this->currentStep > $this->totalSteps){
            $this->currentStep = $this->totalSteps;
        }
    }
    public function decreaseStep(){
        $this->resetErrorBag();
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }
    public function validateData(){
        //validation of firt step
        if($this->currentStep == 1){
            $this->validate([
                'name'=>'required|string',
                'famName'=>'required|string',
                'address'=>'nullable|required|string',
                'phone_number'=>'required|digits:10',
                'marital_status'=>'required'
            ]);
        }
        if ($this->currentStep == 2){
            $this->validate([

                'monthly_income'=>'required|numeric|min:0|max:9999999',
                'healthy_disabilty_prevent_work'=>'required',
                'wife_chronic_conditions'=>'required',
                'husband_chronic_conditions'=>'required',
                'underage_children'=>'required|integer|max:20',
                'sponsored_chronic_illness'=>'required|integer|max:20'
                

            ]);
        
        }
        if ($this->currentStep == 3){
            $this->validate([

                 'fragile_houssing'=>'required',
                 'live_familyHome'=>'required',
                 'has_debt'=>'required',
                 'in_municipality'=>'required',
                 'rented_house'=>'required',
                 'frameworks'=>'nullable|array|max:3',


                 
                
                

            ]);

        }
        if ($this->currentStep == 4){
            $this->validate([

                'negatives'=>'nullable|array|max:8',
                 
                
                

            ]);
           // dd($this->negatives);

        }
    }
    public function update()
    {
       
        $values = array(
            "name"=>$this->name,
            "famName"=>$this->famName,
            "address"=>$this->address,
            "phone_number"=>$this->phone_number,
            "marital_status"=>$this->marital_status,
            'monthly_income'=>$this->monthly_income,
            'healthy_disabilty_prevent_work'=>$this->healthy_disabilty_prevent_work,
            'wife_chronic_conditions'=>$this->wife_chronic_conditions,
            'husband_chronic_conditions'=>$this->husband_chronic_conditions,
            'underage_children'=>$this->underage_children,
            'sponsored_chronic_illness'=>$this->sponsored_chronic_illness,
            'fragile_houssing'=>$this->fragile_houssing,
             'live_familyHome'=>$this->live_familyHome,
             'has_debt'=>$this->has_debt,
             'in_municipality'=>$this->in_municipality,
             'rented_house'=>$this->rented_house,
             'frameworks'=>$this->frameworks,
             'negatives'=>$this->negatives,
             
        );
        
      $total_points=$this->calculate($values);
     // dd($total_points);
    
     $citizen=Citizen::updateORCreate(['phone_number' => $this->phone_number],$values);

     
    
     $citizen->total_points=$total_points;
     $citizen->save();
     return redirect('/home')->with('message', 'تم تحديث البيانات بنجاح');
    }
public function calculate(array $data): int
{
    $points = 0;
    
    // Marital Status Points
    $points += match($data['marital_status']) {
        'married' => 2,
        'sponsored' => 2,
        'divorced' => 3,
        'single_unsponsored' => 3,
        'widow' => 4,
        'elderly' => 3,
        default => 0
    };

    // Income Points
    $income = (float)$data['monthly_income'];
    $points += match(true) {
        $income <= 10000 => 8,
        $income <= 20000 => 6,
        $income <= 30000 => 4,
        $income <= 40000 => 2,
        default => 0
    };
    $points += $data['underage_children'] * 2;
    $points += $data['sponsored_chronic_illness'] * 2;
    $points += $data['healthy_disabilty_prevent_work'] ? 4 : 0;
    $points += $data['wife_chronic_conditions'] ? 2 : 0;
    $points += $data['husband_chronic_conditions'] ? 2 : 0;
    $points += $data['husband_chronic_conditions'] ? 2 : 0;
//step"=  3
    $points += $data['in_municipality'] ? 10 : 0;
    
    $points += $data['fragile_houssing'] ? 5 : 0;
    $points += $data['rented_house'] ? 3 : 0;
    $points += $data['live_familyHome'] ? 1 : 0;
    $points += $data['has_debt'] ? 2 : 0;
    

   
    if (!empty($data['frameworks'])) {
        $points -= $this->calculateFrameworkPoints($data['frameworks'],'benefit_points');
    }
    if (!empty($data['negatives'])) {
        $points -=$this->calculateFrameworkPoints($data['negatives'],'lose_points');
    }
   return $points;

 }
  public function calculateFrameworkPoints(array $frameworks, string $pointType ): int
    {
        return collect($frameworks)
            ->filter(fn($framework) => array_key_exists($framework, $this->pointMap[ $pointType]))
            ->sum(fn($framework) => $this->pointMap[ $pointType][$framework]);
    }





    
}

