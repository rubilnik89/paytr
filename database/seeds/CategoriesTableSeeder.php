<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'group_id' => '2598',
                'group_name' => 'Ampule / Phials',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            1 => 
            array (
                'id' => 2,
                'group_id' => '2607',
                'group_name' => 'Bižuterie / Bijouterie',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            2 => 
            array (
                'id' => 3,
                'group_id' => '2612',
                'group_name' => 'Cukřenka / Sugar Bowl',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            3 => 
            array (
                'id' => 4,
                'group_id' => '2622',
                'group_name' => 'Deska pro písemné stolů / Desk for table',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            4 => 
            array (
                'id' => 5,
                'group_id' => '2603',
                'group_name' => 'Deska stolu / Table',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            5 => 
            array (
                'id' => 6,
                'group_id' => '2541',
                'group_name' => 'Držáky na tužky / Pencil holders',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            6 => 
            array (
                'id' => 7,
                'group_id' => '2591',
                'group_name' => 'Fontány / Fountains',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            7 => 
            array (
                'id' => 8,
                'group_id' => '2602',
                'group_name' => 'Geometrické tvary / Geometrical figures',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            8 => 
            array (
                'id' => 9,
                'group_id' => '2445',
                'group_name' => 'Hodinky / Clock',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            9 => 
            array (
                'id' => 10,
                'group_id' => '2587',
                'group_name' => 'Hřeben / Comb',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            10 => 
            array (
                'id' => 11,
                'group_id' => '2539',
                'group_name' => 'Kalendář / Calendar',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            11 => 
            array (
                'id' => 12,
                'group_id' => '2620',
                'group_name' => 'Kartářka / Fortune teller',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            12 => 
            array (
                'id' => 13,
                'group_id' => '2450',
                'group_name' => 'Klíčenka / Keychain',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            13 => 
            array (
                'id' => 14,
                'group_id' => '2615',
                'group_name' => 'Kompas / Compass',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            14 => 
            array (
                'id' => 15,
                'group_id' => '2595',
                'group_name' => 'Koule / Ball',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            15 => 
            array (
                'id' => 16,
                'group_id' => '2448',
                'group_name' => 'Koule a míčky / Globes and balls',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            16 => 
            array (
                'id' => 17,
                'group_id' => '2454',
                'group_name' => 'Kouření příslušenství / Smoking accessories',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            17 => 
            array (
                'id' => 18,
                'group_id' => '2611',
                'group_name' => 'Krásně vykládané šperkovnice / Richly carved caskets',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            18 => 
            array (
                'id' => 19,
                'group_id' => '2623',
                'group_name' => 'Kuželka / Balusters',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            19 => 
            array (
                'id' => 20,
                'group_id' => '2618',
                'group_name' => 'Lupa / Magnifier',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            20 => 
            array (
                'id' => 21,
                'group_id' => '2605',
                'group_name' => 'Medaile / Medals',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            21 => 
            array (
                'id' => 22,
                'group_id' => '2617',
                'group_name' => 'Meteorologické stanice / Weather station',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            22 => 
            array (
                'id' => 23,
                'group_id' => '2449',
                'group_name' => 'Mini písemné sestavy / Mini written set',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            23 => 
            array (
                'id' => 24,
                'group_id' => '2610',
                'group_name' => 'Obkladové desky / Facing materials',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            24 => 
            array (
                'id' => 25,
                'group_id' => '2614',
                'group_name' => 'Papírnictví nože / Office knifes',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            25 => 
            array (
                'id' => 26,
                'group_id' => '2588',
                'group_name' => 'Pero / Pen',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            26 => 
            array (
                'id' => 27,
                'group_id' => '2600',
                'group_name' => 'Podnosy	/ Plates',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            27 => 
            array (
                'id' => 28,
                'group_id' => '2438',
                'group_name' => 'Popelníky / Ashtrays',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            28 => 
            array (
                'id' => 29,
                'group_id' => '2594',
                'group_name' => 'Postavy / Statuete',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            29 => 
            array (
                'id' => 30,
                'group_id' => '2613',
                'group_name' => 'Pouzdra / Cases',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            30 => 
            array (
                'id' => 31,
                'group_id' => '2544',
                'group_name' => 'Psaní vytáčení / Writing dialing',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            31 => 
            array (
                'id' => 32,
                'group_id' => '2616',
                'group_name' => 'Páka pro tisk / Handle for seal',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            32 => 
            array (
                'id' => 33,
                'group_id' => '2447',
                'group_name' => 'Písemné sestavy / Writing sets',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            33 => 
            array (
                'id' => 34,
                'group_id' => '2621',
                'group_name' => 'Přístroj / Gadjets',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            34 => 
            array (
                'id' => 35,
                'group_id' => '2451',
                'group_name' => 'Přívěsky / Pendants',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            35 => 
            array (
                'id' => 36,
                'group_id' => '2604',
                'group_name' => 'Rotační opěrky / Turning support',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            36 => 
            array (
                'id' => 37,
                'group_id' => '2589',
                'group_name' => 'Rámeček pro foto / Frame for photo',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            37 => 
            array (
                'id' => 38,
                'group_id' => '2599',
                'group_name' => 'Sklenky na víno a Sklenky  / Glass and Goblets',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            38 => 
            array (
                'id' => 39,
                'group_id' => '2606',
                'group_name' => 'Stojánek pro telefon / Base for mobile',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            39 => 
            array (
                'id' => 40,
                'group_id' => '2596',
                'group_name' => 'Sudů / Barrel',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            40 => 
            array (
                'id' => 41,
                'group_id' => '2444',
                'group_name' => 'Svícny / Candlesticks',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            41 => 
            array (
                'id' => 42,
                'group_id' => '2592',
                'group_name' => 'Svítidla / Lamps',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            42 => 
            array (
                'id' => 43,
                'group_id' => '2452',
                'group_name' => 'Tabule / Scoreboard',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            43 => 
            array (
                'id' => 44,
                'group_id' => '2601',
                'group_name' => 'Teploměry / Thermometer',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            44 => 
            array (
                'id' => 45,
                'group_id' => '2619',
                'group_name' => 'Urny / Urn',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            45 => 
            array (
                'id' => 46,
                'group_id' => '2593',
                'group_name' => 'Vejce /  Egg',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            46 => 
            array (
                'id' => 47,
                'group_id' => '2546',
                'group_name' => 'Vhcáby-Dáma / Backgammon-Checkers',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            47 => 
            array (
                'id' => 48,
                'group_id' => '2586',
                'group_name' => 'Vizitky / Visit card',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            48 => 
            array (
                'id' => 49,
                'group_id' => '2547',
                'group_name' => 'Vizitkáře / Business card holders',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            49 => 
            array (
                'id' => 50,
                'group_id' => '2542',
                'group_name' => 'Vlajky / Flags',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            50 => 
            array (
                'id' => 51,
                'group_id' => '2597',
                'group_name' => 'Vázy / Vases',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            51 => 
            array (
                'id' => 52,
                'group_id' => '2517',
                'group_name' => 'Výrobky z obsidián / Obsidian products',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            52 => 
            array (
                'id' => 53,
                'group_id' => '2538',
                'group_name' => 'Zapalovače / Lighters',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            53 => 
            array (
                'id' => 54,
                'group_id' => '2543',
                'group_name' => 'Znak a Prapor / Emblem and Banner',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            54 => 
            array (
                'id' => 55,
                'group_id' => '2453',
                'group_name' => 'Známky / Panel',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            55 => 
            array (
                'id' => 56,
                'group_id' => '2590',
                'group_name' => 'Zrcadlo / Mirror',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            56 => 
            array (
                'id' => 57,
                'group_id' => '2540',
                'group_name' => 'Zásobníky / Trays',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            57 => 
            array (
                'id' => 58,
                'group_id' => '2545',
                'group_name' => 'Šachy / Chess',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            58 => 
            array (
                'id' => 59,
                'group_id' => '2446',
                'group_name' => 'Šperkovnice / Casket',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
            59 => 
            array (
                'id' => 60,
                'group_id' => '2745',
                'group_name' => 'Основные средства',
                'created_at' => '2017-08-28 06:45:07',
                'updated_at' => '2017-08-28 06:45:07',
            ),
        ));
        
        
    }
}