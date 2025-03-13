<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Citizen;
use Illuminate\Support\Facades\DB;
class MultiStepForm extends Component
{
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
   // public $high_income;
   // public $owns_land;
   // public $owns_vehicle;
   // public $owns_trees;
    //public $husband_drugs;
    //public $full_heal_card;
   // public $family_negative_reputation;

    public $totalSteps = 4;
    public $currentStep = 1;
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

    public function mount(){
        $this->currentStep = 1;
    }

    public function render()
    {    
        return view('livewire.multi-step-form');
 
        /* $citizens = DB::table('citizens')->orderBy('total_points', 'desc')->get();
         return view('livewire.component', ['citizens' => $citizens])
        ->layout('home')
        ->slot('slot');  */
    }
    public function increaseStep(){
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
                'address'=>'required|string',
                'phone_number'=>'required|digits:10',
                'marital_status'=>'required'
            ]);
        }
        if ($this->currentStep == 2){
            $this->validate([

                'monthly_income'=>'required|digits_between:1,10',
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

        public function register(){

            $this->validate([

                'negatives'=>'nullable|array|max:8',
                 
                
                

            ]);
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
        
         $citizen=Citizen::UpdateOrCreate($values);
   
         
        
         $citizen->total_points=$total_points;
         $citizen->save();
         $info = ['name'=>$this->name.' '.$this->famName];
         return redirect()->route('registration.success', $info);
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

