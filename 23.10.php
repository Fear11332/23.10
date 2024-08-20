<?php
    declare(strict_types=1);
    interface AutoTechnik{
        public function MoveForward():void;
        public function MoveBackwards():void;
        public function SpecialMove():void;

        public function ShowTechnikType():void;

        public function ShowMinimumSpeed():void;

        public function ShowMaximumSpeed():void;
    }

    interface AutosInterface{
        public function GetSalonType():string;

        public function SetSalonType(string $newtype):void;

         public function Honk():void;

         public function TurnOnTheWipers():void;
    }

    abstract class AutoTechnikAbstract implements AutoTechnik{
        protected int $SpeedMaximum;
        protected string $TechnikType;
        protected const SpeedMinimum=0;
        public abstract function MoveForward(): void;
        public abstract function MoveBackwards(): void;
        public abstract function SpecialMove(): void;

        public function ShowTechnikType():void{
            echo "тип техники:$this->TechnikType\n";
        }

        public function ShowMaximumSpeed():void{
            echo "максимальная скорость: $this->SpeedMaximum\n";
        }

        public function ShowMinimumSpeed():void{
            echo "минимальная скорость: ".AutoTechnikAbstract::SpeedMinimum."\n";
        }
    }

    class Autos extends AutoTechnikAbstract implements AutosInterface{
        private string $Salon;

        public function __construct(){
            $this->SpeedMaximum = 250;
            $this->TechnikType = 'Auto';
            $this->Salon = 'Standard';
        }
        public function MoveForward(): void{
            echo "автомобиль:едет вперед, управление:руль, педали, коробка передач\n";
        }

        public function Honk():void{
            echo "автомобиль, включение сигнала:бип-бип\n";
        }

        public function TurnOnTheWipers():void{
            echo "автомобиль:включение дворников\n";
        }

        public function MoveBackwards(): void{
            echo "автомобиль:едет назад, управление:руль, коробка, педали\n";
        }

        public function SpecialMove(): void{
            echo "автомобиль:включение закиси\n";
        }

        public function GetSalonType():string{
            return $this->Salon;
        }

        public function SetSalonType(string $newtype):void{
            $this->Salon = $newtype;
        }
    }

    class Tanks extends AutoTechnikAbstract{

        public function __construct(){
            $this->SpeedMaximum = 265;
            $this->TechnikType = 'Tank';
        }

        public function MoveForward(): void{
            echo "танк движется вперед, управление:специальное\n";
        }

        public function  MoveBackwards(): void{
            echo "танк движется назад, управление:специальное\n";
        }

        public function SpecialMove(): void{
            echo "танк производит выстрел\n";
        }
    }

    class Bulldozer extends AutoTechnikAbstract{    
        public function __construct(){
            $this->SpeedMaximum = 110;
            $this->TechnikType = 'Bulldozer';
        }

        public function MoveForward(): void{
            echo "бульдозер двигается вперед, управление:специальное\n";
        }

        public function MoveBackwards(): void{
            echo "бульдозер двигается назад, управление:специальное\n";
        }

        public function SpecialMove(): void{
            echo "бульдозер двигает ковшом\n";
        }
    }

    function Polimorphic(AutoTechnikAbstract $technik):void{
        $technik->MoveForward();
        $technik->MoveBackwards();
        $technik->SpecialMove();
        $technik->ShowTechnikType();
        $technik->ShowMaximumSpeed();
        $technik->ShowMinimumSpeed();
        if($technik instanceof AutosInterface){
            echo "тип салона автомобиля: ".$technik->GetSalonType()."\n";
            $technik->TurnOnTheWipers();
            $technik->Honk();
        }
    }

    Polimorphic(new Autos());
    Polimorphic(new Tanks());
    Polimorphic(new Bulldozer());

