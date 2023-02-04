<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("countries")->truncate();
        $countries =
            [
                [
                    'id' => '1',
                    'name' => 'Afghanistan',
                    'iso3' => 'AFG',
                    'numeric_code' => '004',
                    'iso2' => 'AF',
                    'phonecode' => '93',
                    'capital' => 'Kabul',
                    'currency' => 'AFN',
                    'currency_name' => 'Afghan afghani',
                    'currency_symbol' => '؋',
                    'region' => 'Asia',
                    'latitude' => '33.00000000',
                    'longitude' => '65.00000000',



                ],
                [
                    'id' => '2',
                    'name' => 'Aland Islands',
                    'iso3' => 'ALA',
                    'numeric_code' => '248',
                    'iso2' => 'AX',
                    'phonecode' => '+358-18',
                    'capital' => 'Mariehamn',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '60.11666700',
                    'longitude' => '19.90000000',



                ],
                [
                    'id' => '3',
                    'name' => 'Albania',
                    'iso3' => 'ALB',
                    'numeric_code' => '008',
                    'iso2' => 'AL',
                    'phonecode' => '355',
                    'capital' => 'Tirana',
                    'currency' => 'ALL',
                    'currency_name' => 'Albanian lek',
                    'currency_symbol' => 'Lek',
                    'region' => 'Europe',
                    'latitude' => '41.00000000',
                    'longitude' => '20.00000000',



                ],
                [
                    'id' => '4',
                    'name' => 'Algeria',
                    'iso3' => 'DZA',
                    'numeric_code' => '012',
                    'iso2' => 'DZ',
                    'phonecode' => '213',
                    'capital' => 'Algiers',
                    'currency' => 'DZD',
                    'currency_name' => 'Algerian dinar',
                    'currency_symbol' => 'دج',
                    'region' => 'Africa',
                    'latitude' => '28.00000000',
                    'longitude' => '3.00000000',



                ],
                [
                    'id' => '5',
                    'name' => 'American Samoa',
                    'iso3' => 'ASM',
                    'numeric_code' => '016',
                    'iso2' => 'AS',
                    'phonecode' => '+1-684',
                    'capital' => 'Pago Pago',
                    'currency' => 'USD',
                    'currency_name' => 'US Dollar',
                    'currency_symbol' => '$',
                    'region' => 'Oceania',
                    'latitude' => '-14.33333333',
                    'longitude' => '-170.00000000',



                ],
                [
                    'id' => '6',
                    'name' => 'Andorra',
                    'iso3' => 'AND',
                    'numeric_code' => '020',
                    'iso2' => 'AD',
                    'phonecode' => '376',
                    'capital' => 'Andorra la Vella',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '42.50000000',
                    'longitude' => '1.50000000',



                ],
                [
                    'id' => '7',
                    'name' => 'Angola',
                    'iso3' => 'AGO',
                    'numeric_code' => '024',
                    'iso2' => 'AO',
                    'phonecode' => '244',
                    'capital' => 'Luanda',
                    'currency' => 'AOA',
                    'currency_name' => 'Angolan kwanza',
                    'currency_symbol' => 'Kz',
                    'region' => 'Africa',
                    'latitude' => '-12.50000000',
                    'longitude' => '18.50000000',



                ],
                [
                    'id' => '8',
                    'name' => 'Anguilla',
                    'iso3' => 'AIA',
                    'numeric_code' => '660',
                    'iso2' => 'AI',
                    'phonecode' => '+1-264',
                    'capital' => 'The Valley',
                    'currency' => 'XCD',
                    'currency_name' => 'East Caribbean dollar',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '18.25000000',
                    'longitude' => '-63.16666666',



                ],
                [
                    'id' => '9',
                    'name' => 'Antarctica',
                    'iso3' => 'ATA',
                    'numeric_code' => '010',
                    'iso2' => 'AQ',
                    'phonecode' => '672',
                    'capital' => '',
                    'currency' => 'AAD',
                    'currency_name' => 'Antarctican dollar',
                    'currency_symbol' => '$',
                    'region' => 'Polar',
                    'latitude' => '-74.65000000',
                    'longitude' => '4.48000000',



                ],
                [
                    'id' => '10',
                    'name' => 'Antigua And Barbuda',
                    'iso3' => 'ATG',
                    'numeric_code' => '028',
                    'iso2' => 'AG',
                    'phonecode' => '+1-268',
                    'capital' => 'St. John\'s',
                    'currency' => 'XCD',
                    'currency_name' => 'Eastern Caribbean dollar',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '17.05000000',
                    'longitude' => '-61.80000000',



                ],
                [
                    'id' => '11',
                    'name' => 'Argentina',
                    'iso3' => 'ARG',
                    'numeric_code' => '032',
                    'iso2' => 'AR',
                    'phonecode' => '54',
                    'capital' => 'Buenos Aires',
                    'currency' => 'ARS',
                    'currency_name' => 'Argentine peso',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '-34.00000000',
                    'longitude' => '-64.00000000',



                ],
                [
                    'id' => '12',
                    'name' => 'Armenia',
                    'iso3' => 'ARM',
                    'numeric_code' => '051',
                    'iso2' => 'AM',
                    'phonecode' => '374',
                    'capital' => 'Yerevan',
                    'currency' => 'AMD',
                    'currency_name' => 'Armenian dram',
                    'currency_symbol' => '֏',
                    'region' => 'Asia',
                    'latitude' => '40.00000000',
                    'longitude' => '45.00000000',



                ],
                [
                    'id' => '13',
                    'name' => 'Aruba',
                    'iso3' => 'ABW',
                    'numeric_code' => '533',
                    'iso2' => 'AW',
                    'phonecode' => '297',
                    'capital' => 'Oranjestad',
                    'currency' => 'AWG',
                    'currency_name' => 'Aruban florin',
                    'currency_symbol' => 'ƒ',
                    'region' => 'Americas',
                    'latitude' => '12.50000000',
                    'longitude' => '-69.96666666',



                ],
                [
                    'id' => '14',
                    'name' => 'Australia',
                    'iso3' => 'AUS',
                    'numeric_code' => '036',
                    'iso2' => 'AU',
                    'phonecode' => '61',
                    'capital' => 'Canberra',
                    'currency' => 'AUD',
                    'currency_name' => 'Australian dollar',
                    'currency_symbol' => '$',
                    'region' => 'Oceania',
                    'latitude' => '-27.00000000',
                    'longitude' => '133.00000000',



                ],
                [
                    'id' => '15',
                    'name' => 'Austria',
                    'iso3' => 'AUT',
                    'numeric_code' => '040',
                    'iso2' => 'AT',
                    'phonecode' => '43',
                    'capital' => 'Vienna',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '47.33333333',
                    'longitude' => '13.33333333',



                ],
                [
                    'id' => '16',
                    'name' => 'Azerbaijan',
                    'iso3' => 'AZE',
                    'numeric_code' => '031',
                    'iso2' => 'AZ',
                    'phonecode' => '994',
                    'capital' => 'Baku',
                    'currency' => 'AZN',
                    'currency_name' => 'Azerbaijani manat',
                    'currency_symbol' => 'm',
                    'region' => 'Asia',
                    'latitude' => '40.50000000',
                    'longitude' => '47.50000000',



                ],
                [
                    'id' => '17',
                    'name' => 'Bahamas The',
                    'iso3' => 'BHS',
                    'numeric_code' => '044',
                    'iso2' => 'BS',
                    'phonecode' => '+1-242',
                    'capital' => 'Nassau',
                    'currency' => 'BSD',
                    'currency_name' => 'Bahamian dollar',
                    'currency_symbol' => 'B$',
                    'region' => 'Americas',
                    'latitude' => '24.25000000',
                    'longitude' => '-76.00000000',



                ],
                [
                    'id' => '18',
                    'name' => 'Bahrain',
                    'iso3' => 'BHR',
                    'numeric_code' => '048',
                    'iso2' => 'BH',
                    'phonecode' => '973',
                    'capital' => 'Manama',
                    'currency' => 'BHD',
                    'currency_name' => 'Bahraini dinar',
                    'currency_symbol' => '.د.ب',
                    'region' => 'Asia',
                    'latitude' => '26.00000000',
                    'longitude' => '50.55000000',



                ],
                [
                    'id' => '19',
                    'name' => 'Bangladesh',
                    'iso3' => 'BGD',
                    'numeric_code' => '050',
                    'iso2' => 'BD',
                    'phonecode' => '880',
                    'capital' => 'Dhaka',
                    'currency' => 'BDT',
                    'currency_name' => 'Bangladeshi taka',
                    'currency_symbol' => '৳',
                    'region' => 'Asia',
                    'latitude' => '24.00000000',
                    'longitude' => '90.00000000',



                ],
                [
                    'id' => '20',
                    'name' => 'Barbados',
                    'iso3' => 'BRB',
                    'numeric_code' => '052',
                    'iso2' => 'BB',
                    'phonecode' => '+1-246',
                    'capital' => 'Bridgetown',
                    'currency' => 'BBD',
                    'currency_name' => 'Barbadian dollar',
                    'currency_symbol' => 'Bds$',
                    'region' => 'Americas',
                    'latitude' => '13.16666666',
                    'longitude' => '-59.53333333',



                ],
                [
                    'id' => '21',
                    'name' => 'Belarus',
                    'iso3' => 'BLR',
                    'numeric_code' => '112',
                    'iso2' => 'BY',
                    'phonecode' => '375',
                    'capital' => 'Minsk',
                    'currency' => 'BYN',
                    'currency_name' => 'Belarusian ruble',
                    'currency_symbol' => 'Br',
                    'region' => 'Europe',
                    'latitude' => '53.00000000',
                    'longitude' => '28.00000000',



                ],
                [
                    'id' => '22',
                    'name' => 'Belgium',
                    'iso3' => 'BEL',
                    'numeric_code' => '056',
                    'iso2' => 'BE',
                    'phonecode' => '32',
                    'capital' => 'Brussels',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '50.83333333',
                    'longitude' => '4.00000000',



                ],
                [
                    'id' => '23',
                    'name' => 'Belize',
                    'iso3' => 'BLZ',
                    'numeric_code' => '084',
                    'iso2' => 'BZ',
                    'phonecode' => '501',
                    'capital' => 'Belmopan',
                    'currency' => 'BZD',
                    'currency_name' => 'Belize dollar',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '17.25000000',
                    'longitude' => '-88.75000000',



                ],
                [
                    'id' => '24',
                    'name' => 'Benin',
                    'iso3' => 'BEN',
                    'numeric_code' => '204',
                    'iso2' => 'BJ',
                    'phonecode' => '229',
                    'capital' => 'Porto-Novo',
                    'currency' => 'XOF',
                    'currency_name' => 'West African CFA franc',
                    'currency_symbol' => 'CFA',
                    'region' => 'Africa',
                    'latitude' => '9.50000000',
                    'longitude' => '2.25000000',



                ],
                [
                    'id' => '25',
                    'name' => 'Bermuda',
                    'iso3' => 'BMU',
                    'numeric_code' => '060',
                    'iso2' => 'BM',
                    'phonecode' => '+1-441',
                    'capital' => 'Hamilton',
                    'currency' => 'BMD',
                    'currency_name' => 'Bermudian dollar',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '32.33333333',
                    'longitude' => '-64.75000000',



                ],
                [
                    'id' => '26',
                    'name' => 'Bhutan',
                    'iso3' => 'BTN',
                    'numeric_code' => '064',
                    'iso2' => 'BT',
                    'phonecode' => '975',
                    'capital' => 'Thimphu',
                    'currency' => 'BTN',
                    'currency_name' => 'Bhutanese ngultrum',
                    'currency_symbol' => 'Nu.',
                    'region' => 'Asia',
                    'latitude' => '27.50000000',
                    'longitude' => '90.50000000',

                ],
                [
                    'id' => '27',
                    'name' => 'Bolivia',
                    'iso3' => 'BOL',
                    'numeric_code' => '068',
                    'iso2' => 'BO',
                    'phonecode' => '591',
                    'capital' => 'Sucre',
                    'currency' => 'BOB',
                    'currency_name' => 'Bolivian boliviano',
                    'currency_symbol' => 'Bs.',
                    'region' => 'Americas',
                    'latitude' => '-17.00000000',
                    'longitude' => '-65.00000000',



                ],
                [
                    'id' => '28',
                    'name' => 'Bosnia and Herzegovina',
                    'iso3' => 'BIH',
                    'numeric_code' => '070',
                    'iso2' => 'BA',
                    'phonecode' => '387',
                    'capital' => 'Sarajevo',
                    'currency' => 'BAM',
                    'currency_name' => 'Bosnia and Herzegovina convertible mark',
                    'currency_symbol' => 'KM',
                    'region' => 'Europe',
                    'latitude' => '44.00000000',
                    'longitude' => '18.00000000',



                ],
                [
                    'id' => '29',
                    'name' => 'Botswana',
                    'iso3' => 'BWA',
                    'numeric_code' => '072',
                    'iso2' => 'BW',
                    'phonecode' => '267',
                    'capital' => 'Gaborone',
                    'currency' => 'BWP',
                    'currency_name' => 'Botswana pula',
                    'currency_symbol' => 'P',
                    'region' => 'Africa',
                    'latitude' => '-22.00000000',
                    'longitude' => '24.00000000',



                ],
                [
                    'id' => '30',
                    'name' => 'Bouvet Island',
                    'iso3' => 'BVT',
                    'numeric_code' => '074',
                    'iso2' => 'BV',
                    'phonecode' => '0055',
                    'capital' => '',
                    'currency' => 'NOK',
                    'currency_name' => 'Norwegian Krone',
                    'currency_symbol' => 'kr',
                    'region' => '',
                    'latitude' => '-54.43333333',
                    'longitude' => '3.40000000',



                ],
                [
                    'id' => '31',
                    'name' => 'Brazil',
                    'iso3' => 'BRA',
                    'numeric_code' => '076',
                    'iso2' => 'BR',
                    'phonecode' => '55',
                    'capital' => 'Brasilia',
                    'currency' => 'BRL',
                    'currency_name' => 'Brazilian real',
                    'currency_symbol' => 'R$',
                    'region' => 'Americas',
                    'latitude' => '-10.00000000',
                    'longitude' => '-55.00000000',



                ],
                [
                    'id' => '32',
                    'name' => 'British Indian Ocean Territory',
                    'iso3' => 'IOT',
                    'numeric_code' => '086',
                    'iso2' => 'IO',
                    'phonecode' => '246',
                    'capital' => 'Diego Garcia',
                    'currency' => 'USD',
                    'currency_name' => 'United States dollar',
                    'currency_symbol' => '$',
                    'region' => 'Africa',
                    'latitude' => '-6.00000000',
                    'longitude' => '71.50000000',



                ],
                [
                    'id' => '33',
                    'name' => 'Brunei',
                    'iso3' => 'BRN',
                    'numeric_code' => '096',
                    'iso2' => 'BN',
                    'phonecode' => '673',
                    'capital' => 'Bandar Seri Begawan',
                    'currency' => 'BND',
                    'currency_name' => 'Brunei dollar',
                    'currency_symbol' => 'B$',
                    'region' => 'Asia',
                    'latitude' => '4.50000000',
                    'longitude' => '114.66666666',



                ],
                [
                    'id' => '34',
                    'name' => 'Bulgaria',
                    'iso3' => 'BGR',
                    'numeric_code' => '100',
                    'iso2' => 'BG',
                    'phonecode' => '359',
                    'capital' => 'Sofia',
                    'currency' => 'BGN',
                    'currency_name' => 'Bulgarian lev',
                    'currency_symbol' => 'Лв.',
                    'region' => 'Europe',
                    'latitude' => '43.00000000',
                    'longitude' => '25.00000000',



                ],
                [
                    'id' => '35',
                    'name' => 'Burkina Faso',
                    'iso3' => 'BFA',
                    'numeric_code' => '854',
                    'iso2' => 'BF',
                    'phonecode' => '226',
                    'capital' => 'Ouagadougou',
                    'currency' => 'XOF',
                    'currency_name' => 'West African CFA franc',
                    'currency_symbol' => 'CFA',
                    'region' => 'Africa',
                    'latitude' => '13.00000000',
                    'longitude' => '-2.00000000',



                ],
                [
                    'id' => '36',
                    'name' => 'Burundi',
                    'iso3' => 'BDI',
                    'numeric_code' => '108',
                    'iso2' => 'BI',
                    'phonecode' => '257',
                    'capital' => 'Bujumbura',
                    'currency' => 'BIF',
                    'currency_name' => 'Burundian franc',
                    'currency_symbol' => 'FBu',
                    'region' => 'Africa',
                    'latitude' => '-3.50000000',
                    'longitude' => '30.00000000',



                ],
                [
                    'id' => '37',
                    'name' => 'Cambodia',
                    'iso3' => 'KHM',
                    'numeric_code' => '116',
                    'iso2' => 'KH',
                    'phonecode' => '855',
                    'capital' => 'Phnom Penh',
                    'currency' => 'KHR',
                    'currency_name' => 'Cambodian riel',
                    'currency_symbol' => 'KHR',
                    'region' => 'Asia',
                    'latitude' => '13.00000000',
                    'longitude' => '105.00000000',



                ],
                [
                    'id' => '38',
                    'name' => 'Cameroon',
                    'iso3' => 'CMR',
                    'numeric_code' => '120',
                    'iso2' => 'CM',
                    'phonecode' => '237',
                    'capital' => 'Yaounde',
                    'currency' => 'XAF',
                    'currency_name' => 'Central African CFA franc',
                    'currency_symbol' => 'FCFA',
                    'region' => 'Africa',
                    'latitude' => '6.00000000',
                    'longitude' => '12.00000000',



                ],
                [
                    'id' => '39',
                    'name' => 'Canada',
                    'iso3' => 'CAN',
                    'numeric_code' => '124',
                    'iso2' => 'CA',
                    'phonecode' => '1',
                    'capital' => 'Ottawa',
                    'currency' => 'CAD',
                    'currency_name' => 'Canadian dollar',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '60.00000000',
                    'longitude' => '-95.00000000',



                ],
                [
                    'id' => '40',
                    'name' => 'Cape Verde',
                    'iso3' => 'CPV',
                    'numeric_code' => '132',
                    'iso2' => 'CV',
                    'phonecode' => '238',
                    'capital' => 'Praia',
                    'currency' => 'CVE',
                    'currency_name' => 'Cape Verdean escudo',
                    'currency_symbol' => '$',
                    'region' => 'Africa',
                    'latitude' => '16.00000000',
                    'longitude' => '-24.00000000',



                ],
                [
                    'id' => '41',
                    'name' => 'Cayman Islands',
                    'iso3' => 'CYM',
                    'numeric_code' => '136',
                    'iso2' => 'KY',
                    'phonecode' => '+1-345',
                    'capital' => 'George Town',
                    'currency' => 'KYD',
                    'currency_name' => 'Cayman Islands dollar',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '19.50000000',
                    'longitude' => '-80.50000000',



                ],
                [
                    'id' => '42',
                    'name' => 'Central African Republic',
                    'iso3' => 'CAF',
                    'numeric_code' => '140',
                    'iso2' => 'CF',
                    'phonecode' => '236',
                    'capital' => 'Bangui',
                    'currency' => 'XAF',
                    'currency_name' => 'Central African CFA franc',
                    'currency_symbol' => 'FCFA',
                    'region' => 'Africa',
                    'latitude' => '7.00000000',
                    'longitude' => '21.00000000',



                ],
                [
                    'id' => '43',
                    'name' => 'Chad',
                    'iso3' => 'TCD',
                    'numeric_code' => '148',
                    'iso2' => 'TD',
                    'phonecode' => '235',
                    'capital' => 'N\'Djamena',
                    'currency' => 'XAF',
                    'currency_name' => 'Central African CFA franc',
                    'currency_symbol' => 'FCFA',
                    'region' => 'Africa',
                    'latitude' => '15.00000000',
                    'longitude' => '19.00000000',



                ],
                [
                    'id' => '44',
                    'name' => 'Chile',
                    'iso3' => 'CHL',
                    'numeric_code' => '152',
                    'iso2' => 'CL',
                    'phonecode' => '56',
                    'capital' => 'Santiago',
                    'currency' => 'CLP',
                    'currency_name' => 'Chilean peso',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '-30.00000000',
                    'longitude' => '-71.00000000',



                ],
                [
                    'id' => '45',
                    'name' => 'China',
                    'iso3' => 'CHN',
                    'numeric_code' => '156',
                    'iso2' => 'CN',
                    'phonecode' => '86',
                    'capital' => 'Beijing',
                    'currency' => 'CNY',
                    'currency_name' => 'Chinese yuan',
                    'currency_symbol' => '¥',
                    'region' => 'Asia',
                    'latitude' => '35.00000000',
                    'longitude' => '105.00000000',



                ],
                [
                    'id' => '46',
                    'name' => 'Christmas Island',
                    'iso3' => 'CXR',
                    'numeric_code' => '162',
                    'iso2' => 'CX',
                    'phonecode' => '61',
                    'capital' => 'Flying Fish Cove',
                    'currency' => 'AUD',
                    'currency_name' => 'Australian dollar',
                    'currency_symbol' => '$',
                    'region' => 'Oceania',
                    'latitude' => '-10.50000000',
                    'longitude' => '105.66666666',



                ],
                [
                    'id' => '47',
                    'name' => 'Cocos (Keeling) Islands',
                    'iso3' => 'CCK',
                    'numeric_code' => '166',
                    'iso2' => 'CC',
                    'phonecode' => '61',
                    'capital' => 'West Island',
                    'currency' => 'AUD',
                    'currency_name' => 'Australian dollar',
                    'currency_symbol' => '$',
                    'region' => 'Oceania',
                    'latitude' => '-12.50000000',
                    'longitude' => '96.83333333',



                ],
                [
                    'id' => '48',
                    'name' => 'Colombia',
                    'iso3' => 'COL',
                    'numeric_code' => '170',
                    'iso2' => 'CO',
                    'phonecode' => '57',
                    'capital' => 'Bogotá',
                    'currency' => 'COP',
                    'currency_name' => 'Colombian peso',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '4.00000000',
                    'longitude' => '-72.00000000',



                ],
                [
                    'id' => '49',
                    'name' => 'Comoros',
                    'iso3' => 'COM',
                    'numeric_code' => '174',
                    'iso2' => 'KM',
                    'phonecode' => '269',
                    'capital' => 'Moroni',
                    'currency' => 'KMF',
                    'currency_name' => 'Comorian franc',
                    'currency_symbol' => 'CF',
                    'region' => 'Africa',
                    'latitude' => '-12.16666666',
                    'longitude' => '44.25000000',



                ],
                [
                    'id' => '50',
                    'name' => 'Congo',
                    'iso3' => 'COG',
                    'numeric_code' => '178',
                    'iso2' => 'CG',
                    'phonecode' => '242',
                    'capital' => 'Brazzaville',
                    'currency' => 'XAF',
                    'currency_name' => 'Central African CFA franc',
                    'currency_symbol' => 'FC',
                    'region' => 'Africa',
                    'latitude' => '-1.00000000',
                    'longitude' => '15.00000000',



                ],
                [
                    'id' => '51',
                    'name' => 'Democratic Republic of the Congo',
                    'iso3' => 'COD',
                    'numeric_code' => '180',
                    'iso2' => 'CD',
                    'phonecode' => '243',
                    'capital' => 'Kinshasa',
                    'currency' => 'CDF',
                    'currency_name' => 'Congolese Franc',
                    'currency_symbol' => 'FC',
                    'region' => 'Africa',
                    'latitude' => '0.00000000',
                    'longitude' => '25.00000000',



                ],
                [
                    'id' => '52',
                    'name' => 'Cook Islands',
                    'iso3' => 'COK',
                    'numeric_code' => '184',
                    'iso2' => 'CK',
                    'phonecode' => '682',
                    'capital' => 'Avarua',
                    'currency' => 'NZD',
                    'currency_name' => 'Cook Islands dollar',
                    'currency_symbol' => '$',
                    'region' => 'Oceania',
                    'latitude' => '-21.23333333',
                    'longitude' => '-159.76666666',



                ],
                [
                    'id' => '53',
                    'name' => 'Costa Rica',
                    'iso3' => 'CRI',
                    'numeric_code' => '188',
                    'iso2' => 'CR',
                    'phonecode' => '506',
                    'capital' => 'San Jose',
                    'currency' => 'CRC',
                    'currency_name' => 'Costa Rican colón',
                    'currency_symbol' => '₡',
                    'region' => 'Americas',
                    'latitude' => '10.00000000',
                    'longitude' => '-84.00000000',



                ],
                [
                    'id' => '54',
                    'name' => 'Cote D\'Ivoire (Ivory Coast)',
                    'iso3' => 'CIV',
                    'numeric_code' => '384',
                    'iso2' => 'CI',
                    'phonecode' => '225',
                    'capital' => 'Yamoussoukro',
                    'currency' => 'XOF',
                    'currency_name' => 'West African CFA franc',
                    'currency_symbol' => 'CFA',
                    'region' => 'Africa',
                    'latitude' => '8.00000000',
                    'longitude' => '-5.00000000',



                ],
                [
                    'id' => '55',
                    'name' => 'Croatia',
                    'iso3' => 'HRV',
                    'numeric_code' => '191',
                    'iso2' => 'HR',
                    'phonecode' => '385',
                    'capital' => 'Zagreb',
                    'currency' => 'HRK',
                    'currency_name' => 'Croatian kuna',
                    'currency_symbol' => 'kn',
                    'region' => 'Europe',
                    'latitude' => '45.16666666',
                    'longitude' => '15.50000000',



                ],
                [
                    'id' => '56',
                    'name' => 'Cuba',
                    'iso3' => 'CUB',
                    'numeric_code' => '192',
                    'iso2' => 'CU',
                    'phonecode' => '53',
                    'capital' => 'Havana',
                    'currency' => 'CUP',
                    'currency_name' => 'Cuban peso',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '21.50000000',
                    'longitude' => '-80.00000000',



                ],
                [
                    'id' => '57',
                    'name' => 'Cyprus',
                    'iso3' => 'CYP',
                    'numeric_code' => '196',
                    'iso2' => 'CY',
                    'phonecode' => '357',
                    'capital' => 'Nicosia',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '35.00000000',
                    'longitude' => '33.00000000',



                ],
                [
                    'id' => '58',
                    'name' => 'Czech Republic',
                    'iso3' => 'CZE',
                    'numeric_code' => '203',
                    'iso2' => 'CZ',
                    'phonecode' => '420',
                    'capital' => 'Prague',
                    'currency' => 'CZK',
                    'currency_name' => 'Czech koruna',
                    'currency_symbol' => 'Kč',
                    'region' => 'Europe',
                    'latitude' => '49.75000000',
                    'longitude' => '15.50000000',



                ],
                [
                    'id' => '59',
                    'name' => 'Denmark',
                    'iso3' => 'DNK',
                    'numeric_code' => '208',
                    'iso2' => 'DK',
                    'phonecode' => '45',
                    'capital' => 'Copenhagen',
                    'currency' => 'DKK',
                    'currency_name' => 'Danish krone',
                    'currency_symbol' => 'Kr.',
                    'region' => 'Europe',
                    'latitude' => '56.00000000',
                    'longitude' => '10.00000000',



                ],
                [
                    'id' => '60',
                    'name' => 'Djibouti',
                    'iso3' => 'DJI',
                    'numeric_code' => '262',
                    'iso2' => 'DJ',
                    'phonecode' => '253',
                    'capital' => 'Djibouti',
                    'currency' => 'DJF',
                    'currency_name' => 'Djiboutian franc',
                    'currency_symbol' => 'Fdj',
                    'region' => 'Africa',
                    'latitude' => '11.50000000',
                    'longitude' => '43.00000000',



                ],
                [
                    'id' => '61',
                    'name' => 'Dominica',
                    'iso3' => 'DMA',
                    'numeric_code' => '212',
                    'iso2' => 'DM',
                    'phonecode' => '+1-767',
                    'capital' => 'Roseau',
                    'currency' => 'XCD',
                    'currency_name' => 'Eastern Caribbean dollar',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '15.41666666',
                    'longitude' => '-61.33333333',



                ],
                [
                    'id' => '62',
                    'name' => 'Dominican Republic',
                    'iso3' => 'DOM',
                    'numeric_code' => '214',
                    'iso2' => 'DO',
                    'phonecode' => '+1-809 and 1-829',
                    'capital' => 'Santo Domingo',
                    'currency' => 'DOP',
                    'currency_name' => 'Dominican peso',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '19.00000000',
                    'longitude' => '-70.66666666',



                ],
                [
                    'id' => '63',
                    'name' => 'East Timor',
                    'iso3' => 'TLS',
                    'numeric_code' => '626',
                    'iso2' => 'TL',
                    'phonecode' => '670',
                    'capital' => 'Dili',
                    'currency' => 'USD',
                    'currency_name' => 'United States dollar',
                    'currency_symbol' => '$',
                    'region' => 'Asia',
                    'latitude' => '-8.83333333',
                    'longitude' => '125.91666666',



                ],
                [
                    'id' => '64',
                    'name' => 'Ecuador',
                    'iso3' => 'ECU',
                    'numeric_code' => '218',
                    'iso2' => 'EC',
                    'phonecode' => '593',
                    'capital' => 'Quito',
                    'currency' => 'USD',
                    'currency_name' => 'United States dollar',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '-2.00000000',
                    'longitude' => '-77.50000000',



                ],
                [
                    'id' => '65',
                    'name' => 'Egypt',
                    'iso3' => 'EGY',
                    'numeric_code' => '818',
                    'iso2' => 'EG',
                    'phonecode' => '20',
                    'capital' => 'Cairo',
                    'currency' => 'EGP',
                    'currency_name' => 'Egyptian pound',
                    'currency_symbol' => 'ج.م',
                    'region' => 'Africa',
                    'latitude' => '27.00000000',
                    'longitude' => '30.00000000',



                ],
                [
                    'id' => '66',
                    'name' => 'El Salvador',
                    'iso3' => 'SLV',
                    'numeric_code' => '222',
                    'iso2' => 'SV',
                    'phonecode' => '503',
                    'capital' => 'San Salvador',
                    'currency' => 'USD',
                    'currency_name' => 'United States dollar',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '13.83333333',
                    'longitude' => '-88.91666666',



                ],
                [
                    'id' => '67',
                    'name' => 'Equatorial Guinea',
                    'iso3' => 'GNQ',
                    'numeric_code' => '226',
                    'iso2' => 'GQ',
                    'phonecode' => '240',
                    'capital' => 'Malabo',
                    'currency' => 'XAF',
                    'currency_name' => 'Central African CFA franc',
                    'currency_symbol' => 'FCFA',
                    'region' => 'Africa',
                    'latitude' => '2.00000000',
                    'longitude' => '10.00000000',



                ],
                [
                    'id' => '68',
                    'name' => 'Eritrea',
                    'iso3' => 'ERI',
                    'numeric_code' => '232',
                    'iso2' => 'ER',
                    'phonecode' => '291',
                    'capital' => 'Asmara',
                    'currency' => 'ERN',
                    'currency_name' => 'Eritrean nakfa',
                    'currency_symbol' => 'Nfk',
                    'region' => 'Africa',
                    'latitude' => '15.00000000',
                    'longitude' => '39.00000000',



                ],
                [
                    'id' => '69',
                    'name' => 'Estonia',
                    'iso3' => 'EST',
                    'numeric_code' => '233',
                    'iso2' => 'EE',
                    'phonecode' => '372',
                    'capital' => 'Tallinn',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '59.00000000',
                    'longitude' => '26.00000000',



                ],
                [
                    'id' => '70',
                    'name' => 'Ethiopia',
                    'iso3' => 'ETH',
                    'numeric_code' => '231',
                    'iso2' => 'ET',
                    'phonecode' => '251',
                    'capital' => 'Addis Ababa',
                    'currency' => 'ETB',
                    'currency_name' => 'Ethiopian birr',
                    'currency_symbol' => 'Nkf',
                    'region' => 'Africa',
                    'latitude' => '8.00000000',
                    'longitude' => '38.00000000',



                ],
                [
                    'id' => '71',
                    'name' => 'Falkland Islands',
                    'iso3' => 'FLK',
                    'numeric_code' => '238',
                    'iso2' => 'FK',
                    'phonecode' => '500',
                    'capital' => 'Stanley',
                    'currency' => 'FKP',
                    'currency_name' => 'Falkland Islands pound',
                    'currency_symbol' => '£',
                    'region' => 'Americas',
                    'latitude' => '-51.75000000',
                    'longitude' => '-59.00000000',



                ],
                [
                    'id' => '72',
                    'name' => 'Faroe Islands',
                    'iso3' => 'FRO',
                    'numeric_code' => '234',
                    'iso2' => 'FO',
                    'phonecode' => '298',
                    'capital' => 'Torshavn',
                    'currency' => 'DKK',
                    'currency_name' => 'Danish krone',
                    'currency_symbol' => 'Kr.',
                    'region' => 'Europe',
                    'latitude' => '62.00000000',
                    'longitude' => '-7.00000000',



                ],
                [
                    'id' => '73',
                    'name' => 'Fiji Islands',
                    'iso3' => 'FJI',
                    'numeric_code' => '242',
                    'iso2' => 'FJ',
                    'phonecode' => '679',
                    'capital' => 'Suva',
                    'currency' => 'FJD',
                    'currency_name' => 'Fijian dollar',
                    'currency_symbol' => 'FJ$',
                    'region' => 'Oceania',
                    'latitude' => '-18.00000000',
                    'longitude' => '175.00000000',



                ],
                [
                    'id' => '74',
                    'name' => 'Finland',
                    'iso3' => 'FIN',
                    'numeric_code' => '246',
                    'iso2' => 'FI',
                    'phonecode' => '358',
                    'capital' => 'Helsinki',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '64.00000000',
                    'longitude' => '26.00000000',



                ],
                [
                    'id' => '75',
                    'name' => 'France',
                    'iso3' => 'FRA',
                    'numeric_code' => '250',
                    'iso2' => 'FR',
                    'phonecode' => '33',
                    'capital' => 'Paris',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '46.00000000',
                    'longitude' => '2.00000000',



                ],
                [
                    'id' => '76',
                    'name' => 'French Guiana',
                    'iso3' => 'GUF',
                    'numeric_code' => '254',
                    'iso2' => 'GF',
                    'phonecode' => '594',
                    'capital' => 'Cayenne',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Americas',
                    'latitude' => '4.00000000',
                    'longitude' => '-53.00000000',



                ],
                [
                    'id' => '77',
                    'name' => 'French Polynesia',
                    'iso3' => 'PYF',
                    'numeric_code' => '258',
                    'iso2' => 'PF',
                    'phonecode' => '689',
                    'capital' => 'Papeete',
                    'currency' => 'XPF',
                    'currency_name' => 'CFP franc',
                    'currency_symbol' => '₣',
                    'region' => 'Oceania',
                    'latitude' => '-15.00000000',
                    'longitude' => '-140.00000000',



                ],
                [
                    'id' => '78',
                    'name' => 'French Southern Territories',
                    'iso3' => 'ATF',
                    'numeric_code' => '260',
                    'iso2' => 'TF',
                    'phonecode' => '262',
                    'capital' => 'Port-aux-Francais',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Africa',
                    'latitude' => '-49.25000000',
                    'longitude' => '69.16700000',



                ],
                [
                    'id' => '79',
                    'name' => 'Gabon',
                    'iso3' => 'GAB',
                    'numeric_code' => '266',
                    'iso2' => 'GA',
                    'phonecode' => '241',
                    'capital' => 'Libreville',
                    'currency' => 'XAF',
                    'currency_name' => 'Central African CFA franc',
                    'currency_symbol' => 'FCFA',
                    'region' => 'Africa',
                    'latitude' => '-1.00000000',
                    'longitude' => '11.75000000',



                ],
                [
                    'id' => '80',
                    'name' => 'Gambia The',
                    'iso3' => 'GMB',
                    'numeric_code' => '270',
                    'iso2' => 'GM',
                    'phonecode' => '220',
                    'capital' => 'Banjul',
                    'currency' => 'GMD',
                    'currency_name' => 'Gambian dalasi',
                    'currency_symbol' => 'D',
                    'region' => 'Africa',
                    'latitude' => '13.46666666',
                    'longitude' => '-16.56666666',



                ],
                [
                    'id' => '81',
                    'name' => 'Georgia',
                    'iso3' => 'GEO',
                    'numeric_code' => '268',
                    'iso2' => 'GE',
                    'phonecode' => '995',
                    'capital' => 'Tbilisi',
                    'currency' => 'GEL',
                    'currency_name' => 'Georgian lari',
                    'currency_symbol' => 'ლ',
                    'region' => 'Asia',
                    'latitude' => '42.00000000',
                    'longitude' => '43.50000000',



                ],
                [
                    'id' => '82',
                    'name' => 'Germany',
                    'iso3' => 'DEU',
                    'numeric_code' => '276',
                    'iso2' => 'DE',
                    'phonecode' => '49',
                    'capital' => 'Berlin',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '51.00000000',
                    'longitude' => '9.00000000',



                ],
                [
                    'id' => '83',
                    'name' => 'Ghana',
                    'iso3' => 'GHA',
                    'numeric_code' => '288',
                    'iso2' => 'GH',
                    'phonecode' => '233',
                    'capital' => 'Accra',
                    'currency' => 'GHS',
                    'currency_name' => 'Ghanaian cedi',
                    'currency_symbol' => 'GH₵',
                    'region' => 'Africa',
                    'latitude' => '8.00000000',
                    'longitude' => '-2.00000000',



                ],
                [
                    'id' => '84',
                    'name' => 'Gibraltar',
                    'iso3' => 'GIB',
                    'numeric_code' => '292',
                    'iso2' => 'GI',
                    'phonecode' => '350',
                    'capital' => 'Gibraltar',
                    'currency' => 'GIP',
                    'currency_name' => 'Gibraltar pound',
                    'currency_symbol' => '£',
                    'region' => 'Europe',
                    'latitude' => '36.13333333',
                    'longitude' => '-5.35000000',



                ],
                [
                    'id' => '85',
                    'name' => 'Greece',
                    'iso3' => 'GRC',
                    'numeric_code' => '300',
                    'iso2' => 'GR',
                    'phonecode' => '30',
                    'capital' => 'Athens',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '39.00000000',
                    'longitude' => '22.00000000',



                ],
                [
                    'id' => '86',
                    'name' => 'Greenland',
                    'iso3' => 'GRL',
                    'numeric_code' => '304',
                    'iso2' => 'GL',
                    'phonecode' => '299',
                    'capital' => 'Nuuk',
                    'currency' => 'DKK',
                    'currency_name' => 'Danish krone',
                    'currency_symbol' => 'Kr.',
                    'region' => 'Americas',
                    'latitude' => '72.00000000',
                    'longitude' => '-40.00000000',



                ],
                [
                    'id' => '87',
                    'name' => 'Grenada',
                    'iso3' => 'GRD',
                    'numeric_code' => '308',
                    'iso2' => 'GD',
                    'phonecode' => '+1-473',
                    'capital' => 'St. George\'s',
                    'currency' => 'XCD',
                    'currency_name' => 'Eastern Caribbean dollar',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '12.11666666',
                    'longitude' => '-61.66666666',



                ],
                [
                    'id' => '88',
                    'name' => 'Guadeloupe',
                    'iso3' => 'GLP',
                    'numeric_code' => '312',
                    'iso2' => 'GP',
                    'phonecode' => '590',
                    'capital' => 'Basse-Terre',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Americas',
                    'latitude' => '16.25000000',
                    'longitude' => '-61.58333300',



                ],
                [
                    'id' => '89',
                    'name' => 'Guam',
                    'iso3' => 'GUM',
                    'numeric_code' => '316',
                    'iso2' => 'GU',
                    'phonecode' => '+1-671',
                    'capital' => 'Hagatna',
                    'currency' => 'USD',
                    'currency_name' => 'US Dollar',
                    'currency_symbol' => '$',
                    'region' => 'Oceania',
                    'latitude' => '13.46666666',
                    'longitude' => '144.78333333',



                ],
                [
                    'id' => '90',
                    'name' => 'Guatemala',
                    'iso3' => 'GTM',
                    'numeric_code' => '320',
                    'iso2' => 'GT',
                    'phonecode' => '502',
                    'capital' => 'Guatemala City',
                    'currency' => 'GTQ',
                    'currency_name' => 'Guatemalan quetzal',
                    'currency_symbol' => 'Q',
                    'region' => 'Americas',
                    'latitude' => '15.50000000',
                    'longitude' => '-90.25000000',



                ],
                [
                    'id' => '91',
                    'name' => 'Guernsey and Alderney',
                    'iso3' => 'GGY',
                    'numeric_code' => '831',
                    'iso2' => 'GG',
                    'phonecode' => '+44-1481',
                    'capital' => 'St Peter Port',
                    'currency' => 'GBP',
                    'currency_name' => 'British pound',
                    'currency_symbol' => '£',
                    'region' => 'Europe',
                    'latitude' => '49.46666666',
                    'longitude' => '-2.58333333',



                ],
                [
                    'id' => '92',
                    'name' => 'Guinea',
                    'iso3' => 'GIN',
                    'numeric_code' => '324',
                    'iso2' => 'GN',
                    'phonecode' => '224',
                    'capital' => 'Conakry',
                    'currency' => 'GNF',
                    'currency_name' => 'Guinean franc',
                    'currency_symbol' => 'FG',
                    'region' => 'Africa',
                    'latitude' => '11.00000000',
                    'longitude' => '-10.00000000',



                ],
                [
                    'id' => '93',
                    'name' => 'Guinea-Bissau',
                    'iso3' => 'GNB',
                    'numeric_code' => '624',
                    'iso2' => 'GW',
                    'phonecode' => '245',
                    'capital' => 'Bissau',
                    'currency' => 'XOF',
                    'currency_name' => 'West African CFA franc',
                    'currency_symbol' => 'CFA',
                    'region' => 'Africa',
                    'latitude' => '12.00000000',
                    'longitude' => '-15.00000000',



                ],
                [
                    'id' => '94',
                    'name' => 'Guyana',
                    'iso3' => 'GUY',
                    'numeric_code' => '328',
                    'iso2' => 'GY',
                    'phonecode' => '592',
                    'capital' => 'Georgetown',
                    'currency' => 'GYD',
                    'currency_name' => 'Guyanese dollar',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '5.00000000',
                    'longitude' => '-59.00000000',



                ],
                [
                    'id' => '95',
                    'name' => 'Haiti',
                    'iso3' => 'HTI',
                    'numeric_code' => '332',
                    'iso2' => 'HT',
                    'phonecode' => '509',
                    'capital' => 'Port-au-Prince',
                    'currency' => 'HTG',
                    'currency_name' => 'Haitian gourde',
                    'currency_symbol' => 'G',
                    'region' => 'Americas',
                    'latitude' => '19.00000000',
                    'longitude' => '-72.41666666',



                ],
                [
                    'id' => '96',
                    'name' => 'Heard Island and McDonald Islands',
                    'iso3' => 'HMD',
                    'numeric_code' => '334',
                    'iso2' => 'HM',
                    'phonecode' => '672',
                    'capital' => '',
                    'currency' => 'AUD',
                    'currency_name' => 'Australian dollar',
                    'currency_symbol' => '$',
                    'region' => '',
                    'latitude' => '-53.10000000',
                    'longitude' => '72.51666666',



                ],
                [
                    'id' => '97',
                    'name' => 'Honduras',
                    'iso3' => 'HND',
                    'numeric_code' => '340',
                    'iso2' => 'HN',
                    'phonecode' => '504',
                    'capital' => 'Tegucigalpa',
                    'currency' => 'HNL',
                    'currency_name' => 'Honduran lempira',
                    'currency_symbol' => 'L',
                    'region' => 'Americas',
                    'latitude' => '15.00000000',
                    'longitude' => '-86.50000000',



                ],
                [
                    'id' => '98',
                    'name' => 'Hong Kong S.A.R.',
                    'iso3' => 'HKG',
                    'numeric_code' => '344',
                    'iso2' => 'HK',
                    'phonecode' => '852',
                    'capital' => 'Hong Kong',
                    'currency' => 'HKD',
                    'currency_name' => 'Hong Kong dollar',
                    'currency_symbol' => '$',
                    'region' => 'Asia',
                    'latitude' => '22.25000000',
                    'longitude' => '114.16666666',



                ],
                [
                    'id' => '99',
                    'name' => 'Hungary',
                    'iso3' => 'HUN',
                    'numeric_code' => '348',
                    'iso2' => 'HU',
                    'phonecode' => '36',
                    'capital' => 'Budapest',
                    'currency' => 'HUF',
                    'currency_name' => 'Hungarian forint',
                    'currency_symbol' => 'Ft',
                    'region' => 'Europe',
                    'latitude' => '47.00000000',
                    'longitude' => '20.00000000',



                ],
                [
                    'id' => '100',
                    'name' => 'Iceland',
                    'iso3' => 'ISL',
                    'numeric_code' => '352',
                    'iso2' => 'IS',
                    'phonecode' => '354',
                    'capital' => 'Reykjavik',
                    'currency' => 'ISK',
                    'currency_name' => 'Icelandic króna',
                    'currency_symbol' => 'kr',
                    'region' => 'Europe',
                    'latitude' => '65.00000000',
                    'longitude' => '-18.00000000',



                ],
                [
                    'id' => '101',
                    'name' => 'India',
                    'iso3' => 'IND',
                    'numeric_code' => '356',
                    'iso2' => 'IN',
                    'phonecode' => '91',
                    'capital' => 'New Delhi',
                    'currency' => 'INR',
                    'currency_name' => 'Indian rupee',
                    'currency_symbol' => '₹',
                    'region' => 'Asia',
                    'latitude' => '20.00000000',
                    'longitude' => '77.00000000',



                ],
                [
                    'id' => '102',
                    'name' => 'Indonesia',
                    'iso3' => 'IDN',
                    'numeric_code' => '360',
                    'iso2' => 'ID',
                    'phonecode' => '62',
                    'capital' => 'Jakarta',
                    'currency' => 'IDR',
                    'currency_name' => 'Indonesian rupiah',
                    'currency_symbol' => 'Rp',
                    'region' => 'Asia',
                    'latitude' => '-5.00000000',
                    'longitude' => '120.00000000',



                ],
                [
                    'id' => '103',
                    'name' => 'Iran',
                    'iso3' => 'IRN',
                    'numeric_code' => '364',
                    'iso2' => 'IR',
                    'phonecode' => '98',
                    'capital' => 'Tehran',
                    'currency' => 'IRR',
                    'currency_name' => 'Iranian rial',
                    'currency_symbol' => '﷼',
                    'region' => 'Asia',
                    'latitude' => '32.00000000',
                    'longitude' => '53.00000000',



                ],
                [
                    'id' => '104',
                    'name' => 'Iraq',
                    'iso3' => 'IRQ',
                    'numeric_code' => '368',
                    'iso2' => 'IQ',
                    'phonecode' => '964',
                    'capital' => 'Baghdad',
                    'currency' => 'IQD',
                    'currency_name' => 'Iraqi dinar',
                    'currency_symbol' => 'د.ع',
                    'region' => 'Asia',
                    'latitude' => '33.00000000',
                    'longitude' => '44.00000000',



                ],
                [
                    'id' => '105',
                    'name' => 'Ireland',
                    'iso3' => 'IRL',
                    'numeric_code' => '372',
                    'iso2' => 'IE',
                    'phonecode' => '353',
                    'capital' => 'Dublin',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '53.00000000',
                    'longitude' => '-8.00000000',



                ],
                [
                    'id' => '106',
                    'name' => 'Israel',
                    'iso3' => 'ISR',
                    'numeric_code' => '376',
                    'iso2' => 'IL',
                    'phonecode' => '972',
                    'capital' => 'Jerusalem',
                    'currency' => 'ILS',
                    'currency_name' => 'Israeli new shekel',
                    'currency_symbol' => '₪',
                    'region' => 'Asia',
                    'latitude' => '31.50000000',
                    'longitude' => '34.75000000',



                ],
                [
                    'id' => '107',
                    'name' => 'Italy',
                    'iso3' => 'ITA',
                    'numeric_code' => '380',
                    'iso2' => 'IT',
                    'phonecode' => '39',
                    'capital' => 'Rome',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '42.83333333',
                    'longitude' => '12.83333333',



                ],
                [
                    'id' => '108',
                    'name' => 'Jamaica',
                    'iso3' => 'JAM',
                    'numeric_code' => '388',
                    'iso2' => 'JM',
                    'phonecode' => '+1-876',
                    'capital' => 'Kingston',
                    'currency' => 'JMD',
                    'currency_name' => 'Jamaican dollar',
                    'currency_symbol' => 'J$',
                    'region' => 'Americas',
                    'latitude' => '18.25000000',
                    'longitude' => '-77.50000000',



                ],
                [
                    'id' => '109',
                    'name' => 'Japan',
                    'iso3' => 'JPN',
                    'numeric_code' => '392',
                    'iso2' => 'JP',
                    'phonecode' => '81',
                    'capital' => 'Tokyo',
                    'currency' => 'JPY',
                    'currency_name' => 'Japanese yen',
                    'currency_symbol' => '¥',
                    'region' => 'Asia',
                    'latitude' => '36.00000000',
                    'longitude' => '138.00000000',



                ],
                [
                    'id' => '110',
                    'name' => 'Jersey',
                    'iso3' => 'JEY',
                    'numeric_code' => '832',
                    'iso2' => 'JE',
                    'phonecode' => '+44-1534',
                    'capital' => 'Saint Helier',
                    'currency' => 'GBP',
                    'currency_name' => 'British pound',
                    'currency_symbol' => '£',
                    'region' => 'Europe',
                    'latitude' => '49.25000000',
                    'longitude' => '-2.16666666',



                ],
                [
                    'id' => '111',
                    'name' => 'Jordan',
                    'iso3' => 'JOR',
                    'numeric_code' => '400',
                    'iso2' => 'JO',
                    'phonecode' => '962',
                    'capital' => 'Amman',
                    'currency' => 'JOD',
                    'currency_name' => 'Jordanian dinar',
                    'currency_symbol' => 'ا.د',
                    'region' => 'Asia',
                    'latitude' => '31.00000000',
                    'longitude' => '36.00000000',



                ],
                [
                    'id' => '112',
                    'name' => 'Kazakhstan',
                    'iso3' => 'KAZ',
                    'numeric_code' => '398',
                    'iso2' => 'KZ',
                    'phonecode' => '7',
                    'capital' => 'Astana',
                    'currency' => 'KZT',
                    'currency_name' => 'Kazakhstani tenge',
                    'currency_symbol' => 'лв',
                    'region' => 'Asia',
                    'latitude' => '48.00000000',
                    'longitude' => '68.00000000',



                ],
                [
                    'id' => '113',
                    'name' => 'Kenya',
                    'iso3' => 'KEN',
                    'numeric_code' => '404',
                    'iso2' => 'KE',
                    'phonecode' => '254',
                    'capital' => 'Nairobi',
                    'currency' => 'KES',
                    'currency_name' => 'Kenyan shilling',
                    'currency_symbol' => 'KSh',
                    'region' => 'Africa',
                    'latitude' => '1.00000000',
                    'longitude' => '38.00000000',



                ],
                [
                    'id' => '114',
                    'name' => 'Kiribati',
                    'iso3' => 'KIR',
                    'numeric_code' => '296',
                    'iso2' => 'KI',
                    'phonecode' => '686',
                    'capital' => 'Tarawa',
                    'currency' => 'AUD',
                    'currency_name' => 'Australian dollar',
                    'currency_symbol' => '$',
                    'region' => 'Oceania',
                    'latitude' => '1.41666666',
                    'longitude' => '173.00000000',



                ],
                [
                    'id' => '115',
                    'name' => 'North Korea',
                    'iso3' => 'PRK',
                    'numeric_code' => '408',
                    'iso2' => 'KP',
                    'phonecode' => '850',
                    'capital' => 'Pyongyang',
                    'currency' => 'KPW',
                    'currency_name' => 'North Korean Won',
                    'currency_symbol' => '₩',
                    'region' => 'Asia',
                    'latitude' => '40.00000000',
                    'longitude' => '127.00000000',



                ],
                [
                    'id' => '116',
                    'name' => 'South Korea',
                    'iso3' => 'KOR',
                    'numeric_code' => '410',
                    'iso2' => 'KR',
                    'phonecode' => '82',
                    'capital' => 'Seoul',
                    'currency' => 'KRW',
                    'currency_name' => 'Won',
                    'currency_symbol' => '₩',
                    'region' => 'Asia',
                    'latitude' => '37.00000000',
                    'longitude' => '127.50000000',



                ],
                [
                    'id' => '117',
                    'name' => 'Kuwait',
                    'iso3' => 'KWT',
                    'numeric_code' => '414',
                    'iso2' => 'KW',
                    'phonecode' => '965',
                    'capital' => 'Kuwait City',
                    'currency' => 'KWD',
                    'currency_name' => 'Kuwaiti dinar',
                    'currency_symbol' => 'ك.د',
                    'region' => 'Asia',
                    'latitude' => '29.50000000',
                    'longitude' => '45.75000000',



                ],
                [
                    'id' => '118',
                    'name' => 'Kyrgyzstan',
                    'iso3' => 'KGZ',
                    'numeric_code' => '417',
                    'iso2' => 'KG',
                    'phonecode' => '996',
                    'capital' => 'Bishkek',
                    'currency' => 'KGS',
                    'currency_name' => 'Kyrgyzstani som',
                    'currency_symbol' => 'лв',
                    'region' => 'Asia',
                    'latitude' => '41.00000000',
                    'longitude' => '75.00000000',



                ],
                [
                    'id' => '119',
                    'name' => 'Laos',
                    'iso3' => 'LAO',
                    'numeric_code' => '418',
                    'iso2' => 'LA',
                    'phonecode' => '856',
                    'capital' => 'Vientiane',
                    'currency' => 'LAK',
                    'currency_name' => 'Lao kip',
                    'currency_symbol' => '₭',
                    'region' => 'Asia',
                    'latitude' => '18.00000000',
                    'longitude' => '105.00000000',



                ],
                [
                    'id' => '120',
                    'name' => 'Latvia',
                    'iso3' => 'LVA',
                    'numeric_code' => '428',
                    'iso2' => 'LV',
                    'phonecode' => '371',
                    'capital' => 'Riga',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '57.00000000',
                    'longitude' => '25.00000000',



                ],
                [
                    'id' => '121',
                    'name' => 'Lebanon',
                    'iso3' => 'LBN',
                    'numeric_code' => '422',
                    'iso2' => 'LB',
                    'phonecode' => '961',
                    'capital' => 'Beirut',
                    'currency' => 'LBP',
                    'currency_name' => 'Lebanese pound',
                    'currency_symbol' => '£',
                    'region' => 'Asia',
                    'latitude' => '33.83333333',
                    'longitude' => '35.83333333',



                ],
                [
                    'id' => '122',
                    'name' => 'Lesotho',
                    'iso3' => 'LSO',
                    'numeric_code' => '426',
                    'iso2' => 'LS',
                    'phonecode' => '266',
                    'capital' => 'Maseru',
                    'currency' => 'LSL',
                    'currency_name' => 'Lesotho loti',
                    'currency_symbol' => 'L',
                    'region' => 'Africa',
                    'latitude' => '-29.50000000',
                    'longitude' => '28.50000000',



                ],
                [
                    'id' => '123',
                    'name' => 'Liberia',
                    'iso3' => 'LBR',
                    'numeric_code' => '430',
                    'iso2' => 'LR',
                    'phonecode' => '231',
                    'capital' => 'Monrovia',
                    'currency' => 'LRD',
                    'currency_name' => 'Liberian dollar',
                    'currency_symbol' => '$',
                    'region' => 'Africa',
                    'latitude' => '6.50000000',
                    'longitude' => '-9.50000000',



                ],
                [
                    'id' => '124',
                    'name' => 'Libya',
                    'iso3' => 'LBY',
                    'numeric_code' => '434',
                    'iso2' => 'LY',
                    'phonecode' => '218',
                    'capital' => 'Tripolis',
                    'currency' => 'LYD',
                    'currency_name' => 'Libyan dinar',
                    'currency_symbol' => 'د.ل',
                    'region' => 'Africa',
                    'latitude' => '25.00000000',
                    'longitude' => '17.00000000',



                ],
                [
                    'id' => '125',
                    'name' => 'Liechtenstein',
                    'iso3' => 'LIE',
                    'numeric_code' => '438',
                    'iso2' => 'LI',
                    'phonecode' => '423',
                    'capital' => 'Vaduz',
                    'currency' => 'CHF',
                    'currency_name' => 'Swiss franc',
                    'currency_symbol' => 'CHf',
                    'region' => 'Europe',
                    'latitude' => '47.26666666',
                    'longitude' => '9.53333333',



                ],
                [
                    'id' => '126',
                    'name' => 'Lithuania',
                    'iso3' => 'LTU',
                    'numeric_code' => '440',
                    'iso2' => 'LT',
                    'phonecode' => '370',
                    'capital' => 'Vilnius',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '56.00000000',
                    'longitude' => '24.00000000',



                ],
                [
                    'id' => '127',
                    'name' => 'Luxembourg',
                    'iso3' => 'LUX',
                    'numeric_code' => '442',
                    'iso2' => 'LU',
                    'phonecode' => '352',
                    'capital' => 'Luxembourg',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '49.75000000',
                    'longitude' => '6.16666666',



                ],
                [
                    'id' => '128',
                    'name' => 'Macau S.A.R.',
                    'iso3' => 'MAC',
                    'numeric_code' => '446',
                    'iso2' => 'MO',
                    'phonecode' => '853',
                    'capital' => 'Macao',
                    'currency' => 'MOP',
                    'currency_name' => 'Macanese pataca',
                    'currency_symbol' => '$',
                    'region' => 'Asia',
                    'latitude' => '22.16666666',
                    'longitude' => '113.55000000',



                ],
                [
                    'id' => '129',
                    'name' => 'Macedonia',
                    'iso3' => 'MKD',
                    'numeric_code' => '807',
                    'iso2' => 'MK',
                    'phonecode' => '389',
                    'capital' => 'Skopje',
                    'currency' => 'MKD',
                    'currency_name' => 'Denar',
                    'currency_symbol' => 'ден',
                    'region' => 'Europe',
                    'latitude' => '41.83333333',
                    'longitude' => '22.00000000',



                ],
                [
                    'id' => '130',
                    'name' => 'Madagascar',
                    'iso3' => 'MDG',
                    'numeric_code' => '450',
                    'iso2' => 'MG',
                    'phonecode' => '261',
                    'capital' => 'Antananarivo',
                    'currency' => 'MGA',
                    'currency_name' => 'Malagasy ariary',
                    'currency_symbol' => 'Ar',
                    'region' => 'Africa',
                    'latitude' => '-20.00000000',
                    'longitude' => '47.00000000',



                ],
                [
                    'id' => '131',
                    'name' => 'Malawi',
                    'iso3' => 'MWI',
                    'numeric_code' => '454',
                    'iso2' => 'MW',
                    'phonecode' => '265',
                    'capital' => 'Lilongwe',
                    'currency' => 'MWK',
                    'currency_name' => 'Malawian kwacha',
                    'currency_symbol' => 'MK',
                    'region' => 'Africa',
                    'latitude' => '-13.50000000',
                    'longitude' => '34.00000000',



                ],
                [
                    'id' => '132',
                    'name' => 'Malaysia',
                    'iso3' => 'MYS',
                    'numeric_code' => '458',
                    'iso2' => 'MY',
                    'phonecode' => '60',
                    'capital' => 'Kuala Lumpur',
                    'currency' => 'MYR',
                    'currency_name' => 'Malaysian ringgit',
                    'currency_symbol' => 'RM',
                    'region' => 'Asia',
                    'latitude' => '2.50000000',
                    'longitude' => '112.50000000',



                ],
                [
                    'id' => '133',
                    'name' => 'Maldives',
                    'iso3' => 'MDV',
                    'numeric_code' => '462',
                    'iso2' => 'MV',
                    'phonecode' => '960',
                    'capital' => 'Male',
                    'currency' => 'MVR',
                    'currency_name' => 'Maldivian rufiyaa',
                    'currency_symbol' => 'Rf',
                    'region' => 'Asia',
                    'latitude' => '3.25000000',
                    'longitude' => '73.00000000',



                ],
                [
                    'id' => '134',
                    'name' => 'Mali',
                    'iso3' => 'MLI',
                    'numeric_code' => '466',
                    'iso2' => 'ML',
                    'phonecode' => '223',
                    'capital' => 'Bamako',
                    'currency' => 'XOF',
                    'currency_name' => 'West African CFA franc',
                    'currency_symbol' => 'CFA',
                    'region' => 'Africa',
                    'latitude' => '17.00000000',
                    'longitude' => '-4.00000000',



                ],
                [
                    'id' => '135',
                    'name' => 'Malta',
                    'iso3' => 'MLT',
                    'numeric_code' => '470',
                    'iso2' => 'MT',
                    'phonecode' => '356',
                    'capital' => 'Valletta',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '35.83333333',
                    'longitude' => '14.58333333',



                ],
                [
                    'id' => '136',
                    'name' => 'Man (Isle of)',
                    'iso3' => 'IMN',
                    'numeric_code' => '833',
                    'iso2' => 'IM',
                    'phonecode' => '+44-1624',
                    'capital' => 'Douglas, Isle of Man',
                    'currency' => 'GBP',
                    'currency_name' => 'British pound',
                    'currency_symbol' => '£',
                    'region' => 'Europe',
                    'latitude' => '54.25000000',
                    'longitude' => '-4.50000000',



                ],
                [
                    'id' => '137',
                    'name' => 'Marshall Islands',
                    'iso3' => 'MHL',
                    'numeric_code' => '584',
                    'iso2' => 'MH',
                    'phonecode' => '692',
                    'capital' => 'Majuro',
                    'currency' => 'USD',
                    'currency_name' => 'United States dollar',
                    'currency_symbol' => '$',
                    'region' => 'Oceania',
                    'latitude' => '9.00000000',
                    'longitude' => '168.00000000',



                ],
                [
                    'id' => '138',
                    'name' => 'Martinique',
                    'iso3' => 'MTQ',
                    'numeric_code' => '474',
                    'iso2' => 'MQ',
                    'phonecode' => '596',
                    'capital' => 'Fort-de-France',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Americas',
                    'latitude' => '14.66666700',
                    'longitude' => '-61.00000000',



                ],
                [
                    'id' => '139',
                    'name' => 'Mauritania',
                    'iso3' => 'MRT',
                    'numeric_code' => '478',
                    'iso2' => 'MR',
                    'phonecode' => '222',
                    'capital' => 'Nouakchott',
                    'currency' => 'MRO',
                    'currency_name' => 'Mauritanian ouguiya',
                    'currency_symbol' => 'MRU',
                    'region' => 'Africa',
                    'latitude' => '20.00000000',
                    'longitude' => '-12.00000000',



                ],
                [
                    'id' => '140',
                    'name' => 'Mauritius',
                    'iso3' => 'MUS',
                    'numeric_code' => '480',
                    'iso2' => 'MU',
                    'phonecode' => '230',
                    'capital' => 'Port Louis',
                    'currency' => 'MUR',
                    'currency_name' => 'Mauritian rupee',
                    'currency_symbol' => '₨',
                    'region' => 'Africa',
                    'latitude' => '-20.28333333',
                    'longitude' => '57.55000000',



                ],
                [
                    'id' => '141',
                    'name' => 'Mayotte',
                    'iso3' => 'MYT',
                    'numeric_code' => '175',
                    'iso2' => 'YT',
                    'phonecode' => '262',
                    'capital' => 'Mamoudzou',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Africa',
                    'latitude' => '-12.83333333',
                    'longitude' => '45.16666666',



                ],
                [
                    'id' => '142',
                    'name' => 'Mexico',
                    'iso3' => 'MEX',
                    'numeric_code' => '484',
                    'iso2' => 'MX',
                    'phonecode' => '52',
                    'capital' => 'Mexico City',
                    'currency' => 'MXN',
                    'currency_name' => 'Mexican peso',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '23.00000000',
                    'longitude' => '-102.00000000',



                ],
                [
                    'id' => '143',
                    'name' => 'Micronesia',
                    'iso3' => 'FSM',
                    'numeric_code' => '583',
                    'iso2' => 'FM',
                    'phonecode' => '691',
                    'capital' => 'Palikir',
                    'currency' => 'USD',
                    'currency_name' => 'United States dollar',
                    'currency_symbol' => '$',
                    'region' => 'Oceania',
                    'latitude' => '6.91666666',
                    'longitude' => '158.25000000',



                ],
                [
                    'id' => '144',
                    'name' => 'Moldova',
                    'iso3' => 'MDA',
                    'numeric_code' => '498',
                    'iso2' => 'MD',
                    'phonecode' => '373',
                    'capital' => 'Chisinau',
                    'currency' => 'MDL',
                    'currency_name' => 'Moldovan leu',
                    'currency_symbol' => 'L',
                    'region' => 'Europe',
                    'latitude' => '47.00000000',
                    'longitude' => '29.00000000',



                ],
                [
                    'id' => '145',
                    'name' => 'Monaco',
                    'iso3' => 'MCO',
                    'numeric_code' => '492',
                    'iso2' => 'MC',
                    'phonecode' => '377',
                    'capital' => 'Monaco',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '43.73333333',
                    'longitude' => '7.40000000',



                ],
                [
                    'id' => '146',
                    'name' => 'Mongolia',
                    'iso3' => 'MNG',
                    'numeric_code' => '496',
                    'iso2' => 'MN',
                    'phonecode' => '976',
                    'capital' => 'Ulan Bator',
                    'currency' => 'MNT',
                    'currency_name' => 'Mongolian tögrög',
                    'currency_symbol' => '₮',
                    'region' => 'Asia',
                    'latitude' => '46.00000000',
                    'longitude' => '105.00000000',



                ],
                [
                    'id' => '147',
                    'name' => 'Montenegro',
                    'iso3' => 'MNE',
                    'numeric_code' => '499',
                    'iso2' => 'ME',
                    'phonecode' => '382',
                    'capital' => 'Podgorica',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '42.50000000',
                    'longitude' => '19.30000000',



                ],
                [
                    'id' => '148',
                    'name' => 'Montserrat',
                    'iso3' => 'MSR',
                    'numeric_code' => '500',
                    'iso2' => 'MS',
                    'phonecode' => '+1-664',
                    'capital' => 'Plymouth',
                    'currency' => 'XCD',
                    'currency_name' => 'Eastern Caribbean dollar',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '16.75000000',
                    'longitude' => '-62.20000000',



                ],
                [
                    'id' => '149',
                    'name' => 'Morocco',
                    'iso3' => 'MAR',
                    'numeric_code' => '504',
                    'iso2' => 'MA',
                    'phonecode' => '212',
                    'capital' => 'Rabat',
                    'currency' => 'MAD',
                    'currency_name' => 'Moroccan dirham',
                    'currency_symbol' => 'DH',
                    'region' => 'Africa',
                    'latitude' => '32.00000000',
                    'longitude' => '-5.00000000',



                ],
                [
                    'id' => '150',
                    'name' => 'Mozambique',
                    'iso3' => 'MOZ',
                    'numeric_code' => '508',
                    'iso2' => 'MZ',
                    'phonecode' => '258',
                    'capital' => 'Maputo',
                    'currency' => 'MZN',
                    'currency_name' => 'Mozambican metical',
                    'currency_symbol' => 'MT',
                    'region' => 'Africa',
                    'latitude' => '-18.25000000',
                    'longitude' => '35.00000000',



                ],
                [
                    'id' => '151',
                    'name' => 'Myanmar',
                    'iso3' => 'MMR',
                    'numeric_code' => '104',
                    'iso2' => 'MM',
                    'phonecode' => '95',
                    'capital' => 'Nay Pyi Taw',
                    'currency' => 'MMK',
                    'currency_name' => 'Burmese kyat',
                    'currency_symbol' => 'K',
                    'region' => 'Asia',
                    'latitude' => '22.00000000',
                    'longitude' => '98.00000000',



                ],
                [
                    'id' => '152',
                    'name' => 'Namibia',
                    'iso3' => 'NAM',
                    'numeric_code' => '516',
                    'iso2' => 'NA',
                    'phonecode' => '264',
                    'capital' => 'Windhoek',
                    'currency' => 'NAD',
                    'currency_name' => 'Namibian dollar',
                    'currency_symbol' => '$',
                    'region' => 'Africa',
                    'latitude' => '-22.00000000',
                    'longitude' => '17.00000000',



                ],
                [
                    'id' => '153',
                    'name' => 'Nauru',
                    'iso3' => 'NRU',
                    'numeric_code' => '520',
                    'iso2' => 'NR',
                    'phonecode' => '674',
                    'capital' => 'Yaren',
                    'currency' => 'AUD',
                    'currency_name' => 'Australian dollar',
                    'currency_symbol' => '$',
                    'region' => 'Oceania',
                    'latitude' => '-0.53333333',
                    'longitude' => '166.91666666',



                ],
                [
                    'id' => '154',
                    'name' => 'Nepal',
                    'iso3' => 'NPL',
                    'numeric_code' => '524',
                    'iso2' => 'NP',
                    'phonecode' => '977',
                    'capital' => 'Kathmandu',
                    'currency' => 'NPR',
                    'currency_name' => 'Nepalese rupee',
                    'currency_symbol' => '₨',
                    'region' => 'Asia',
                    'latitude' => '28.00000000',
                    'longitude' => '84.00000000',



                ],
                [
                    'id' => '155',
                    'name' => 'Bonaire, Sint Eustatius and Saba',
                    'iso3' => 'BES',
                    'numeric_code' => '535',
                    'iso2' => 'BQ',
                    'phonecode' => '599',
                    'capital' => 'Kralendijk',
                    'currency' => 'USD',
                    'currency_name' => 'United States dollar',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '12.15000000',
                    'longitude' => '-68.26666700',



                ],
                [
                    'id' => '156',
                    'name' => 'Netherlands',
                    'iso3' => 'NLD',
                    'numeric_code' => '528',
                    'iso2' => 'NL',
                    'phonecode' => '31',
                    'capital' => 'Amsterdam',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '52.50000000',
                    'longitude' => '5.75000000',



                ],
                [
                    'id' => '157',
                    'name' => 'New Caledonia',
                    'iso3' => 'NCL',
                    'numeric_code' => '540',
                    'iso2' => 'NC',
                    'phonecode' => '687',
                    'capital' => 'Noumea',
                    'currency' => 'XPF',
                    'currency_name' => 'CFP franc',
                    'currency_symbol' => '₣',
                    'region' => 'Oceania',
                    'latitude' => '-21.50000000',
                    'longitude' => '165.50000000',



                ],
                [
                    'id' => '158',
                    'name' => 'New Zealand',
                    'iso3' => 'NZL',
                    'numeric_code' => '554',
                    'iso2' => 'NZ',
                    'phonecode' => '64',
                    'capital' => 'Wellington',
                    'currency' => 'NZD',
                    'currency_name' => 'New Zealand dollar',
                    'currency_symbol' => '$',
                    'region' => 'Oceania',
                    'latitude' => '-41.00000000',
                    'longitude' => '174.00000000',



                ],
                [
                    'id' => '159',
                    'name' => 'Nicaragua',
                    'iso3' => 'NIC',
                    'numeric_code' => '558',
                    'iso2' => 'NI',
                    'phonecode' => '505',
                    'capital' => 'Managua',
                    'currency' => 'NIO',
                    'currency_name' => 'Nicaraguan córdoba',
                    'currency_symbol' => 'C$',
                    'region' => 'Americas',
                    'latitude' => '13.00000000',
                    'longitude' => '-85.00000000',



                ],
                [
                    'id' => '160',
                    'name' => 'Niger',
                    'iso3' => 'NER',
                    'numeric_code' => '562',
                    'iso2' => 'NE',
                    'phonecode' => '227',
                    'capital' => 'Niamey',
                    'currency' => 'XOF',
                    'currency_name' => 'West African CFA franc',
                    'currency_symbol' => 'CFA',
                    'region' => 'Africa',
                    'latitude' => '16.00000000',
                    'longitude' => '8.00000000',



                ],
                [
                    'id' => '161',
                    'name' => 'Nigeria',
                    'iso3' => 'NGA',
                    'numeric_code' => '566',
                    'iso2' => 'NG',
                    'phonecode' => '234',
                    'capital' => 'Abuja',
                    'currency' => 'NGN',
                    'currency_name' => 'Nigerian naira',
                    'currency_symbol' => '₦',
                    'region' => 'Africa',
                    'latitude' => '10.00000000',
                    'longitude' => '8.00000000',



                ],
                [
                    'id' => '162',
                    'name' => 'Niue',
                    'iso3' => 'NIU',
                    'numeric_code' => '570',
                    'iso2' => 'NU',
                    'phonecode' => '683',
                    'capital' => 'Alofi',
                    'currency' => 'NZD',
                    'currency_name' => 'New Zealand dollar',
                    'currency_symbol' => '$',
                    'region' => 'Oceania',
                    'latitude' => '-19.03333333',
                    'longitude' => '-169.86666666',



                ],
                [
                    'id' => '163',
                    'name' => 'Norfolk Island',
                    'iso3' => 'NFK',
                    'numeric_code' => '574',
                    'iso2' => 'NF',
                    'phonecode' => '672',
                    'capital' => 'Kingston',
                    'currency' => 'AUD',
                    'currency_name' => 'Australian dollar',
                    'currency_symbol' => '$',
                    'region' => 'Oceania',
                    'latitude' => '-29.03333333',
                    'longitude' => '167.95000000',



                ],
                [
                    'id' => '164',
                    'name' => 'Northern Mariana Islands',
                    'iso3' => 'MNP',
                    'numeric_code' => '580',
                    'iso2' => 'MP',
                    'phonecode' => '+1-670',
                    'capital' => 'Saipan',
                    'currency' => 'USD',
                    'currency_name' => 'United States dollar',
                    'currency_symbol' => '$',
                    'region' => 'Oceania',
                    'latitude' => '15.20000000',
                    'longitude' => '145.75000000',



                ],
                [
                    'id' => '165',
                    'name' => 'Norway',
                    'iso3' => 'NOR',
                    'numeric_code' => '578',
                    'iso2' => 'NO',
                    'phonecode' => '47',
                    'capital' => 'Oslo',
                    'currency' => 'NOK',
                    'currency_name' => 'Norwegian krone',
                    'currency_symbol' => 'kr',
                    'region' => 'Europe',
                    'latitude' => '62.00000000',
                    'longitude' => '10.00000000',



                ],
                [
                    'id' => '166',
                    'name' => 'Oman',
                    'iso3' => 'OMN',
                    'numeric_code' => '512',
                    'iso2' => 'OM',
                    'phonecode' => '968',
                    'capital' => 'Muscat',
                    'currency' => 'OMR',
                    'currency_name' => 'Omani rial',
                    'currency_symbol' => '.ع.ر',
                    'region' => 'Asia',
                    'latitude' => '21.00000000',
                    'longitude' => '57.00000000',



                ],
                [
                    'id' => '167',
                    'name' => 'Pakistan',
                    'iso3' => 'PAK',
                    'numeric_code' => '586',
                    'iso2' => 'PK',
                    'phonecode' => '92',
                    'capital' => 'Islamabad',
                    'currency' => 'PKR',
                    'currency_name' => 'Pakistani rupee',
                    'currency_symbol' => '₨',
                    'region' => 'Asia',
                    'latitude' => '30.00000000',
                    'longitude' => '70.00000000',



                ],
                [
                    'id' => '168',
                    'name' => 'Palau',
                    'iso3' => 'PLW',
                    'numeric_code' => '585',
                    'iso2' => 'PW',
                    'phonecode' => '680',
                    'capital' => 'Melekeok',
                    'currency' => 'USD',
                    'currency_name' => 'United States dollar',
                    'currency_symbol' => '$',
                    'region' => 'Oceania',
                    'latitude' => '7.50000000',
                    'longitude' => '134.50000000',



                ],
                [
                    'id' => '169',
                    'name' => 'Palestinian Territory Occupied',
                    'iso3' => 'PSE',
                    'numeric_code' => '275',
                    'iso2' => 'PS',
                    'phonecode' => '970',
                    'capital' => 'East Jerusalem',
                    'currency' => 'ILS',
                    'currency_name' => 'Israeli new shekel',
                    'currency_symbol' => '₪',
                    'region' => 'Asia',
                    'latitude' => '31.90000000',
                    'longitude' => '35.20000000',



                ],
                [
                    'id' => '170',
                    'name' => 'Panama',
                    'iso3' => 'PAN',
                    'numeric_code' => '591',
                    'iso2' => 'PA',
                    'phonecode' => '507',
                    'capital' => 'Panama City',
                    'currency' => 'PAB',
                    'currency_name' => 'Panamanian balboa',
                    'currency_symbol' => 'B/.',
                    'region' => 'Americas',
                    'latitude' => '9.00000000',
                    'longitude' => '-80.00000000',



                ],
                [
                    'id' => '171',
                    'name' => 'Papua new Guinea',
                    'iso3' => 'PNG',
                    'numeric_code' => '598',
                    'iso2' => 'PG',
                    'phonecode' => '675',
                    'capital' => 'Port Moresby',
                    'currency' => 'PGK',
                    'currency_name' => 'Papua New Guinean kina',
                    'currency_symbol' => 'K',
                    'region' => 'Oceania',
                    'latitude' => '-6.00000000',
                    'longitude' => '147.00000000',



                ],
                [
                    'id' => '172',
                    'name' => 'Paraguay',
                    'iso3' => 'PRY',
                    'numeric_code' => '600',
                    'iso2' => 'PY',
                    'phonecode' => '595',
                    'capital' => 'Asuncion',
                    'currency' => 'PYG',
                    'currency_name' => 'Paraguayan guarani',
                    'currency_symbol' => '₲',
                    'region' => 'Americas',
                    'latitude' => '-23.00000000',
                    'longitude' => '-58.00000000',



                ],
                [
                    'id' => '173',
                    'name' => 'Peru',
                    'iso3' => 'PER',
                    'numeric_code' => '604',
                    'iso2' => 'PE',
                    'phonecode' => '51',
                    'capital' => 'Lima',
                    'currency' => 'PEN',
                    'currency_name' => 'Peruvian sol',
                    'currency_symbol' => 'S/.',
                    'region' => 'Americas',
                    'latitude' => '-10.00000000',
                    'longitude' => '-76.00000000',



                ],
                [
                    'id' => '174',
                    'name' => 'Philippines',
                    'iso3' => 'PHL',
                    'numeric_code' => '608',
                    'iso2' => 'PH',
                    'phonecode' => '63',
                    'capital' => 'Manila',
                    'currency' => 'PHP',
                    'currency_name' => 'Philippine peso',
                    'currency_symbol' => '₱',
                    'region' => 'Asia',
                    'latitude' => '13.00000000',
                    'longitude' => '122.00000000',



                ],
                [
                    'id' => '175',
                    'name' => 'Pitcairn Island',
                    'iso3' => 'PCN',
                    'numeric_code' => '612',
                    'iso2' => 'PN',
                    'phonecode' => '870',
                    'capital' => 'Adamstown',
                    'currency' => 'NZD',
                    'currency_name' => 'New Zealand dollar',
                    'currency_symbol' => '$',
                    'region' => 'Oceania',
                    'latitude' => '-25.06666666',
                    'longitude' => '-130.10000000',



                ],
                [
                    'id' => '176',
                    'name' => 'Poland',
                    'iso3' => 'POL',
                    'numeric_code' => '616',
                    'iso2' => 'PL',
                    'phonecode' => '48',
                    'capital' => 'Warsaw',
                    'currency' => 'PLN',
                    'currency_name' => 'Polish złoty',
                    'currency_symbol' => 'zł',
                    'region' => 'Europe',
                    'latitude' => '52.00000000',
                    'longitude' => '20.00000000',



                ],
                [
                    'id' => '177',
                    'name' => 'Portugal',
                    'iso3' => 'PRT',
                    'numeric_code' => '620',
                    'iso2' => 'PT',
                    'phonecode' => '351',
                    'capital' => 'Lisbon',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '39.50000000',
                    'longitude' => '-8.00000000',



                ],
                [
                    'id' => '178',
                    'name' => 'Puerto Rico',
                    'iso3' => 'PRI',
                    'numeric_code' => '630',
                    'iso2' => 'PR',
                    'phonecode' => '+1-787 and 1-939',
                    'capital' => 'San Juan',
                    'currency' => 'USD',
                    'currency_name' => 'United States dollar',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '18.25000000',
                    'longitude' => '-66.50000000',



                ],
                [
                    'id' => '179',
                    'name' => 'Qatar',
                    'iso3' => 'QAT',
                    'numeric_code' => '634',
                    'iso2' => 'QA',
                    'phonecode' => '974',
                    'capital' => 'Doha',
                    'currency' => 'QAR',
                    'currency_name' => 'Qatari riyal',
                    'currency_symbol' => 'ق.ر',
                    'region' => 'Asia',
                    'latitude' => '25.50000000',
                    'longitude' => '51.25000000',



                ],
                [
                    'id' => '180',
                    'name' => 'Reunion',
                    'iso3' => 'REU',
                    'numeric_code' => '638',
                    'iso2' => 'RE',
                    'phonecode' => '262',
                    'capital' => 'Saint-Denis',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Africa',
                    'latitude' => '-21.15000000',
                    'longitude' => '55.50000000',



                ],
                [
                    'id' => '181',
                    'name' => 'Romania',
                    'iso3' => 'ROU',
                    'numeric_code' => '642',
                    'iso2' => 'RO',
                    'phonecode' => '40',
                    'capital' => 'Bucharest',
                    'currency' => 'RON',
                    'currency_name' => 'Romanian leu',
                    'currency_symbol' => 'lei',
                    'region' => 'Europe',
                    'latitude' => '46.00000000',
                    'longitude' => '25.00000000',



                ],
                [
                    'id' => '182',
                    'name' => 'Russia',
                    'iso3' => 'RUS',
                    'numeric_code' => '643',
                    'iso2' => 'RU',
                    'phonecode' => '7',
                    'capital' => 'Moscow',
                    'currency' => 'RUB',
                    'currency_name' => 'Russian ruble',
                    'currency_symbol' => '₽',
                    'region' => 'Europe',
                    'latitude' => '60.00000000',
                    'longitude' => '100.00000000',



                ],
                [
                    'id' => '183',
                    'name' => 'Rwanda',
                    'iso3' => 'RWA',
                    'numeric_code' => '646',
                    'iso2' => 'RW',
                    'phonecode' => '250',
                    'capital' => 'Kigali',
                    'currency' => 'RWF',
                    'currency_name' => 'Rwandan franc',
                    'currency_symbol' => 'FRw',
                    'region' => 'Africa',
                    'latitude' => '-2.00000000',
                    'longitude' => '30.00000000',



                ],
                [
                    'id' => '184',
                    'name' => 'Saint Helena',
                    'iso3' => 'SHN',
                    'numeric_code' => '654',
                    'iso2' => 'SH',
                    'phonecode' => '290',
                    'capital' => 'Jamestown',
                    'currency' => 'SHP',
                    'currency_name' => 'Saint Helena pound',
                    'currency_symbol' => '£',
                    'region' => 'Africa',
                    'latitude' => '-15.95000000',
                    'longitude' => '-5.70000000',



                ],
                [
                    'id' => '185',
                    'name' => 'Saint Kitts And Nevis',
                    'iso3' => 'KNA',
                    'numeric_code' => '659',
                    'iso2' => 'KN',
                    'phonecode' => '+1-869',
                    'capital' => 'Basseterre',
                    'currency' => 'XCD',
                    'currency_name' => 'Eastern Caribbean dollar',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '17.33333333',
                    'longitude' => '-62.75000000',



                ],
                [
                    'id' => '186',
                    'name' => 'Saint Lucia',
                    'iso3' => 'LCA',
                    'numeric_code' => '662',
                    'iso2' => 'LC',
                    'phonecode' => '+1-758',
                    'capital' => 'Castries',
                    'currency' => 'XCD',
                    'currency_name' => 'Eastern Caribbean dollar',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '13.88333333',
                    'longitude' => '-60.96666666',



                ],
                [
                    'id' => '187',
                    'name' => 'Saint Pierre and Miquelon',
                    'iso3' => 'SPM',
                    'numeric_code' => '666',
                    'iso2' => 'PM',
                    'phonecode' => '508',
                    'capital' => 'Saint-Pierre',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Americas',
                    'latitude' => '46.83333333',
                    'longitude' => '-56.33333333',



                ],
                [
                    'id' => '188',
                    'name' => 'Saint Vincent And The Grenadines',
                    'iso3' => 'VCT',
                    'numeric_code' => '670',
                    'iso2' => 'VC',
                    'phonecode' => '+1-784',
                    'capital' => 'Kingstown',
                    'currency' => 'XCD',
                    'currency_name' => 'Eastern Caribbean dollar',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '13.25000000',
                    'longitude' => '-61.20000000',



                ],
                [
                    'id' => '189',
                    'name' => 'Saint-Barthelemy',
                    'iso3' => 'BLM',
                    'numeric_code' => '652',
                    'iso2' => 'BL',
                    'phonecode' => '590',
                    'capital' => 'Gustavia',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Americas',
                    'latitude' => '18.50000000',
                    'longitude' => '-63.41666666',



                ],
                [
                    'id' => '190',
                    'name' => 'Saint-Martin (French part)',
                    'iso3' => 'MAF',
                    'numeric_code' => '663',
                    'iso2' => 'MF',
                    'phonecode' => '590',
                    'capital' => 'Marigot',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Americas',
                    'latitude' => '18.08333333',
                    'longitude' => '-63.95000000',



                ],
                [
                    'id' => '191',
                    'name' => 'Samoa',
                    'iso3' => 'WSM',
                    'numeric_code' => '882',
                    'iso2' => 'WS',
                    'phonecode' => '685',
                    'capital' => 'Apia',
                    'currency' => 'WST',
                    'currency_name' => 'Samoan tālā',
                    'currency_symbol' => 'SAT',
                    'region' => 'Oceania',
                    'latitude' => '-13.58333333',
                    'longitude' => '-172.33333333',



                ],
                [
                    'id' => '192',
                    'name' => 'San Marino',
                    'iso3' => 'SMR',
                    'numeric_code' => '674',
                    'iso2' => 'SM',
                    'phonecode' => '378',
                    'capital' => 'San Marino',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '43.76666666',
                    'longitude' => '12.41666666',



                ],
                [
                    'id' => '193',
                    'name' => 'Sao Tome and Principe',
                    'iso3' => 'STP',
                    'numeric_code' => '678',
                    'iso2' => 'ST',
                    'phonecode' => '239',
                    'capital' => 'Sao Tome',
                    'currency' => 'STD',
                    'currency_name' => 'Dobra',
                    'currency_symbol' => 'Db',
                    'region' => 'Africa',
                    'latitude' => '1.00000000',
                    'longitude' => '7.00000000',



                ],
                [
                    'id' => '194',
                    'name' => 'Saudi Arabia',
                    'iso3' => 'SAU',
                    'numeric_code' => '682',
                    'iso2' => 'SA',
                    'phonecode' => '966',
                    'capital' => 'Riyadh',
                    'currency' => 'SAR',
                    'currency_name' => 'Saudi riyal',
                    'currency_symbol' => '﷼',
                    'region' => 'Asia',
                    'latitude' => '25.00000000',
                    'longitude' => '45.00000000',



                ],
                [
                    'id' => '195',
                    'name' => 'Senegal',
                    'iso3' => 'SEN',
                    'numeric_code' => '686',
                    'iso2' => 'SN',
                    'phonecode' => '221',
                    'capital' => 'Dakar',
                    'currency' => 'XOF',
                    'currency_name' => 'West African CFA franc',
                    'currency_symbol' => 'CFA',
                    'region' => 'Africa',
                    'latitude' => '14.00000000',
                    'longitude' => '-14.00000000',



                ],
                [
                    'id' => '196',
                    'name' => 'Serbia',
                    'iso3' => 'SRB',
                    'numeric_code' => '688',
                    'iso2' => 'RS',
                    'phonecode' => '381',
                    'capital' => 'Belgrade',
                    'currency' => 'RSD',
                    'currency_name' => 'Serbian dinar',
                    'currency_symbol' => 'din',
                    'region' => 'Europe',
                    'latitude' => '44.00000000',
                    'longitude' => '21.00000000',



                ],
                [
                    'id' => '197',
                    'name' => 'Seychelles',
                    'iso3' => 'SYC',
                    'numeric_code' => '690',
                    'iso2' => 'SC',
                    'phonecode' => '248',
                    'capital' => 'Victoria',
                    'currency' => 'SCR',
                    'currency_name' => 'Seychellois rupee',
                    'currency_symbol' => 'SRe',
                    'region' => 'Africa',
                    'latitude' => '-4.58333333',
                    'longitude' => '55.66666666',



                ],
                [
                    'id' => '198',
                    'name' => 'Sierra Leone',
                    'iso3' => 'SLE',
                    'numeric_code' => '694',
                    'iso2' => 'SL',
                    'phonecode' => '232',
                    'capital' => 'Freetown',
                    'currency' => 'SLL',
                    'currency_name' => 'Sierra Leonean leone',
                    'currency_symbol' => 'Le',
                    'region' => 'Africa',
                    'latitude' => '8.50000000',
                    'longitude' => '-11.50000000',



                ],
                [
                    'id' => '199',
                    'name' => 'Singapore',
                    'iso3' => 'SGP',
                    'numeric_code' => '702',
                    'iso2' => 'SG',
                    'phonecode' => '65',
                    'capital' => 'Singapur',
                    'currency' => 'SGD',
                    'currency_name' => 'Singapore dollar',
                    'currency_symbol' => '$',
                    'region' => 'Asia',
                    'latitude' => '1.36666666',
                    'longitude' => '103.80000000',



                ],
                [
                    'id' => '200',
                    'name' => 'Slovakia',
                    'iso3' => 'SVK',
                    'numeric_code' => '703',
                    'iso2' => 'SK',
                    'phonecode' => '421',
                    'capital' => 'Bratislava',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '48.66666666',
                    'longitude' => '19.50000000',



                ],
                [
                    'id' => '201',
                    'name' => 'Slovenia',
                    'iso3' => 'SVN',
                    'numeric_code' => '705',
                    'iso2' => 'SI',
                    'phonecode' => '386',
                    'capital' => 'Ljubljana',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '46.11666666',
                    'longitude' => '14.81666666',



                ],
                [
                    'id' => '202',
                    'name' => 'Solomon Islands',
                    'iso3' => 'SLB',
                    'numeric_code' => '090',
                    'iso2' => 'SB',
                    'phonecode' => '677',
                    'capital' => 'Honiara',
                    'currency' => 'SBD',
                    'currency_name' => 'Solomon Islands dollar',
                    'currency_symbol' => 'Si$',
                    'region' => 'Oceania',
                    'latitude' => '-8.00000000',
                    'longitude' => '159.00000000',



                ],
                [
                    'id' => '203',
                    'name' => 'Somalia',
                    'iso3' => 'SOM',
                    'numeric_code' => '706',
                    'iso2' => 'SO',
                    'phonecode' => '252',
                    'capital' => 'Mogadishu',
                    'currency' => 'SOS',
                    'currency_name' => 'Somali shilling',
                    'currency_symbol' => 'Sh.so.',
                    'region' => 'Africa',
                    'latitude' => '10.00000000',
                    'longitude' => '49.00000000',



                ],
                [
                    'id' => '204',
                    'name' => 'South Africa',
                    'iso3' => 'ZAF',
                    'numeric_code' => '710',
                    'iso2' => 'ZA',
                    'phonecode' => '27',
                    'capital' => 'Pretoria',
                    'currency' => 'ZAR',
                    'currency_name' => 'South African rand',
                    'currency_symbol' => 'R',
                    'region' => 'Africa',
                    'latitude' => '-29.00000000',
                    'longitude' => '24.00000000',



                ],
                [
                    'id' => '205',
                    'name' => 'South Georgia',
                    'iso3' => 'SGS',
                    'numeric_code' => '239',
                    'iso2' => 'GS',
                    'phonecode' => '500',
                    'capital' => 'Grytviken',
                    'currency' => 'GBP',
                    'currency_name' => 'British pound',
                    'currency_symbol' => '£',
                    'region' => 'Americas',
                    'latitude' => '-54.50000000',
                    'longitude' => '-37.00000000',



                ],
                [
                    'id' => '206',
                    'name' => 'South Sudan',
                    'iso3' => 'SSD',
                    'numeric_code' => '728',
                    'iso2' => 'SS',
                    'phonecode' => '211',
                    'capital' => 'Juba',
                    'currency' => 'SSP',
                    'currency_name' => 'South Sudanese pound',
                    'currency_symbol' => '£',
                    'region' => 'Africa',
                    'latitude' => '7.00000000',
                    'longitude' => '30.00000000',



                ],
                [
                    'id' => '207',
                    'name' => 'Spain',
                    'iso3' => 'ESP',
                    'numeric_code' => '724',
                    'iso2' => 'ES',
                    'phonecode' => '34',
                    'capital' => 'Madrid',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '40.00000000',
                    'longitude' => '-4.00000000',



                ],
                [
                    'id' => '208',
                    'name' => 'Sri Lanka',
                    'iso3' => 'LKA',
                    'numeric_code' => '144',
                    'iso2' => 'LK',
                    'phonecode' => '94',
                    'capital' => 'Colombo',
                    'currency' => 'LKR',
                    'currency_name' => 'Sri Lankan rupee',
                    'currency_symbol' => 'Rs',
                    'region' => 'Asia',
                    'latitude' => '7.00000000',
                    'longitude' => '81.00000000',



                ],
                [
                    'id' => '209',
                    'name' => 'Sudan',
                    'iso3' => 'SDN',
                    'numeric_code' => '729',
                    'iso2' => 'SD',
                    'phonecode' => '249',
                    'capital' => 'Khartoum',
                    'currency' => 'SDG',
                    'currency_name' => 'Sudanese pound',
                    'currency_symbol' => '.س.ج',
                    'region' => 'Africa',
                    'latitude' => '15.00000000',
                    'longitude' => '30.00000000',



                ],
                [
                    'id' => '210',
                    'name' => 'Suriname',
                    'iso3' => 'SUR',
                    'numeric_code' => '740',
                    'iso2' => 'SR',
                    'phonecode' => '597',
                    'capital' => 'Paramaribo',
                    'currency' => 'SRD',
                    'currency_name' => 'Surinamese dollar',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '4.00000000',
                    'longitude' => '-56.00000000',



                ],
                [
                    'id' => '211',
                    'name' => 'Svalbard And Jan Mayen Islands',
                    'iso3' => 'SJM',
                    'numeric_code' => '744',
                    'iso2' => 'SJ',
                    'phonecode' => '47',
                    'capital' => 'Longyearbyen',
                    'currency' => 'NOK',
                    'currency_name' => 'Norwegian Krone',
                    'currency_symbol' => 'kr',
                    'region' => 'Europe',
                    'latitude' => '78.00000000',
                    'longitude' => '20.00000000',



                ],
                [
                    'id' => '212',
                    'name' => 'Swaziland',
                    'iso3' => 'SWZ',
                    'numeric_code' => '748',
                    'iso2' => 'SZ',
                    'phonecode' => '268',
                    'capital' => 'Mbabane',
                    'currency' => 'SZL',
                    'currency_name' => 'Lilangeni',
                    'currency_symbol' => 'E',
                    'region' => 'Africa',
                    'latitude' => '-26.50000000',
                    'longitude' => '31.50000000',



                ],
                [
                    'id' => '213',
                    'name' => 'Sweden',
                    'iso3' => 'SWE',
                    'numeric_code' => '752',
                    'iso2' => 'SE',
                    'phonecode' => '46',
                    'capital' => 'Stockholm',
                    'currency' => 'SEK',
                    'currency_name' => 'Swedish krona',
                    'currency_symbol' => 'kr',
                    'region' => 'Europe',
                    'latitude' => '62.00000000',
                    'longitude' => '15.00000000',



                ],
                [
                    'id' => '214',
                    'name' => 'Switzerland',
                    'iso3' => 'CHE',
                    'numeric_code' => '756',
                    'iso2' => 'CH',
                    'phonecode' => '41',
                    'capital' => 'Bern',
                    'currency' => 'CHF',
                    'currency_name' => 'Swiss franc',
                    'currency_symbol' => 'CHf',
                    'region' => 'Europe',
                    'latitude' => '47.00000000',
                    'longitude' => '8.00000000',



                ],
                [
                    'id' => '215',
                    'name' => 'Syria',
                    'iso3' => 'SYR',
                    'numeric_code' => '760',
                    'iso2' => 'SY',
                    'phonecode' => '963',
                    'capital' => 'Damascus',
                    'currency' => 'SYP',
                    'currency_name' => 'Syrian pound',
                    'currency_symbol' => 'LS',
                    'region' => 'Asia',
                    'latitude' => '35.00000000',
                    'longitude' => '38.00000000',



                ],
                [
                    'id' => '216',
                    'name' => 'Taiwan',
                    'iso3' => 'TWN',
                    'numeric_code' => '158',
                    'iso2' => 'TW',
                    'phonecode' => '886',
                    'capital' => 'Taipei',
                    'currency' => 'TWD',
                    'currency_name' => 'New Taiwan dollar',
                    'currency_symbol' => '$',
                    'region' => 'Asia',
                    'latitude' => '23.50000000',
                    'longitude' => '121.00000000',



                ],
                [
                    'id' => '217',
                    'name' => 'Tajikistan',
                    'iso3' => 'TJK',
                    'numeric_code' => '762',
                    'iso2' => 'TJ',
                    'phonecode' => '992',
                    'capital' => 'Dushanbe',
                    'currency' => 'TJS',
                    'currency_name' => 'Tajikistani somoni',
                    'currency_symbol' => 'SM',
                    'region' => 'Asia',
                    'latitude' => '39.00000000',
                    'longitude' => '71.00000000',



                ],
                [
                    'id' => '218',
                    'name' => 'Tanzania',
                    'iso3' => 'TZA',
                    'numeric_code' => '834',
                    'iso2' => 'TZ',
                    'phonecode' => '255',
                    'capital' => 'Dodoma',
                    'currency' => 'TZS',
                    'currency_name' => 'Tanzanian shilling',
                    'currency_symbol' => 'TSh',
                    'region' => 'Africa',
                    'latitude' => '-6.00000000',
                    'longitude' => '35.00000000',



                ],
                [
                    'id' => '219',
                    'name' => 'Thailand',
                    'iso3' => 'THA',
                    'numeric_code' => '764',
                    'iso2' => 'TH',
                    'phonecode' => '66',
                    'capital' => 'Bangkok',
                    'currency' => 'THB',
                    'currency_name' => 'Thai baht',
                    'currency_symbol' => '฿',
                    'region' => 'Asia',
                    'latitude' => '15.00000000',
                    'longitude' => '100.00000000',



                ],
                [
                    'id' => '220',
                    'name' => 'Togo',
                    'iso3' => 'TGO',
                    'numeric_code' => '768',
                    'iso2' => 'TG',
                    'phonecode' => '228',
                    'capital' => 'Lome',
                    'currency' => 'XOF',
                    'currency_name' => 'West African CFA franc',
                    'currency_symbol' => 'CFA',
                    'region' => 'Africa',
                    'latitude' => '8.00000000',
                    'longitude' => '1.16666666',



                ],
                [
                    'id' => '221',
                    'name' => 'Tokelau',
                    'iso3' => 'TKL',
                    'numeric_code' => '772',
                    'iso2' => 'TK',
                    'phonecode' => '690',
                    'capital' => '',
                    'currency' => 'NZD',
                    'currency_name' => 'New Zealand dollar',
                    'currency_symbol' => '$',
                    'region' => 'Oceania',
                    'latitude' => '-9.00000000',
                    'longitude' => '-172.00000000',



                ],
                [
                    'id' => '222',
                    'name' => 'Tonga',
                    'iso3' => 'TON',
                    'numeric_code' => '776',
                    'iso2' => 'TO',
                    'phonecode' => '676',
                    'capital' => 'Nuku\'alofa',
                    'currency' => 'TOP',
                    'currency_name' => 'Tongan paʻanga',
                    'currency_symbol' => '$',
                    'region' => 'Oceania',
                    'latitude' => '-20.00000000',
                    'longitude' => '-175.00000000',



                ],
                [
                    'id' => '223',
                    'name' => 'Trinidad And Tobago',
                    'iso3' => 'TTO',
                    'numeric_code' => '780',
                    'iso2' => 'TT',
                    'phonecode' => '+1-868',
                    'capital' => 'Port of Spain',
                    'currency' => 'TTD',
                    'currency_name' => 'Trinidad and Tobago dollar',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '11.00000000',
                    'longitude' => '-61.00000000',



                ],
                [
                    'id' => '224',
                    'name' => 'Tunisia',
                    'iso3' => 'TUN',
                    'numeric_code' => '788',
                    'iso2' => 'TN',
                    'phonecode' => '216',
                    'capital' => 'Tunis',
                    'currency' => 'TND',
                    'currency_name' => 'Tunisian dinar',
                    'currency_symbol' => 'ت.د',
                    'region' => 'Africa',
                    'latitude' => '34.00000000',
                    'longitude' => '9.00000000',



                ],
                [
                    'id' => '225',
                    'name' => 'Turkey',
                    'iso3' => 'TUR',
                    'numeric_code' => '792',
                    'iso2' => 'TR',
                    'phonecode' => '90',
                    'capital' => 'Ankara',
                    'currency' => 'TRY',
                    'currency_name' => 'Turkish lira',
                    'currency_symbol' => '₺',
                    'region' => 'Asia',
                    'latitude' => '39.00000000',
                    'longitude' => '35.00000000',



                ],
                [
                    'id' => '226',
                    'name' => 'Turkmenistan',
                    'iso3' => 'TKM',
                    'numeric_code' => '795',
                    'iso2' => 'TM',
                    'phonecode' => '993',
                    'capital' => 'Ashgabat',
                    'currency' => 'TMT',
                    'currency_name' => 'Turkmenistan manat',
                    'currency_symbol' => 'T',
                    'region' => 'Asia',
                    'latitude' => '40.00000000',
                    'longitude' => '60.00000000',



                ],
                [
                    'id' => '227',
                    'name' => 'Turks And Caicos Islands',
                    'iso3' => 'TCA',
                    'numeric_code' => '796',
                    'iso2' => 'TC',
                    'phonecode' => '+1-649',
                    'capital' => 'Cockburn Town',
                    'currency' => 'USD',
                    'currency_name' => 'United States dollar',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '21.75000000',
                    'longitude' => '-71.58333333',



                ],
                [
                    'id' => '228',
                    'name' => 'Tuvalu',
                    'iso3' => 'TUV',
                    'numeric_code' => '798',
                    'iso2' => 'TV',
                    'phonecode' => '688',
                    'capital' => 'Funafuti',
                    'currency' => 'AUD',
                    'currency_name' => 'Australian dollar',
                    'currency_symbol' => '$',
                    'region' => 'Oceania',
                    'latitude' => '-8.00000000',
                    'longitude' => '178.00000000',



                ],
                [
                    'id' => '229',
                    'name' => 'Uganda',
                    'iso3' => 'UGA',
                    'numeric_code' => '800',
                    'iso2' => 'UG',
                    'phonecode' => '256',
                    'capital' => 'Kampala',
                    'currency' => 'UGX',
                    'currency_name' => 'Ugandan shilling',
                    'currency_symbol' => 'USh',
                    'region' => 'Africa',
                    'latitude' => '1.00000000',
                    'longitude' => '32.00000000',



                ],
                [
                    'id' => '230',
                    'name' => 'Ukraine',
                    'iso3' => 'UKR',
                    'numeric_code' => '804',
                    'iso2' => 'UA',
                    'phonecode' => '380',
                    'capital' => 'Kiev',
                    'currency' => 'UAH',
                    'currency_name' => 'Ukrainian hryvnia',
                    'currency_symbol' => '₴',
                    'region' => 'Europe',
                    'latitude' => '49.00000000',
                    'longitude' => '32.00000000',



                ],
                [
                    'id' => '231',
                    'name' => 'United Arab Emirates',
                    'iso3' => 'ARE',
                    'numeric_code' => '784',
                    'iso2' => 'AE',
                    'phonecode' => '971',
                    'capital' => 'Abu Dhabi',
                    'currency' => 'AED',
                    'currency_name' => 'United Arab Emirates dirham',
                    'currency_symbol' => 'إ.د',
                    'region' => 'Asia',
                    'latitude' => '24.00000000',
                    'longitude' => '54.00000000',



                ],
                [
                    'id' => '232',
                    'name' => 'United Kingdom',
                    'iso3' => 'GBR',
                    'numeric_code' => '826',
                    'iso2' => 'GB',
                    'phonecode' => '44',
                    'capital' => 'London',
                    'currency' => 'GBP',
                    'currency_name' => 'British pound',
                    'currency_symbol' => '£',
                    'region' => 'Europe',
                    'latitude' => '54.00000000',
                    'longitude' => '-2.00000000',



                ],
                [
                    'id' => '233',
                    'name' => 'United States',
                    'iso3' => 'USA',
                    'numeric_code' => '840',
                    'iso2' => 'US',
                    'phonecode' => '1',
                    'capital' => 'Washington',
                    'currency' => 'USD',
                    'currency_name' => 'United States dollar',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '38.00000000',
                    'longitude' => '-97.00000000',



                ],
                [
                    'id' => '234',
                    'name' => 'United States Minor Outlying Islands',
                    'iso3' => 'UMI',
                    'numeric_code' => '581',
                    'iso2' => 'UM',
                    'phonecode' => '1',
                    'capital' => '',
                    'currency' => 'USD',
                    'currency_name' => 'United States dollar',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '0.00000000',
                    'longitude' => '0.00000000',



                ],
                [
                    'id' => '235',
                    'name' => 'Uruguay',
                    'iso3' => 'URY',
                    'numeric_code' => '858',
                    'iso2' => 'UY',
                    'phonecode' => '598',
                    'capital' => 'Montevideo',
                    'currency' => 'UYU',
                    'currency_name' => 'Uruguayan peso',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '-33.00000000',
                    'longitude' => '-56.00000000',



                ],
                [
                    'id' => '236',
                    'name' => 'Uzbekistan',
                    'iso3' => 'UZB',
                    'numeric_code' => '860',
                    'iso2' => 'UZ',
                    'phonecode' => '998',
                    'capital' => 'Tashkent',
                    'currency' => 'UZS',
                    'currency_name' => 'Uzbekistani soʻm',
                    'currency_symbol' => 'лв',
                    'region' => 'Asia',
                    'latitude' => '41.00000000',
                    'longitude' => '64.00000000',



                ],
                [
                    'id' => '237',
                    'name' => 'Vanuatu',
                    'iso3' => 'VUT',
                    'numeric_code' => '548',
                    'iso2' => 'VU',
                    'phonecode' => '678',
                    'capital' => 'Port Vila',
                    'currency' => 'VUV',
                    'currency_name' => 'Vanuatu vatu',
                    'currency_symbol' => 'VT',
                    'region' => 'Oceania',
                    'latitude' => '-16.00000000',
                    'longitude' => '167.00000000',



                ],
                [
                    'id' => '238',
                    'name' => 'Vatican City State (Holy See)',
                    'iso3' => 'VAT',
                    'numeric_code' => '336',
                    'iso2' => 'VA',
                    'phonecode' => '379',
                    'capital' => 'Vatican City',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '41.90000000',
                    'longitude' => '12.45000000',



                ],
                [
                    'id' => '239',
                    'name' => 'Venezuela',
                    'iso3' => 'VEN',
                    'numeric_code' => '862',
                    'iso2' => 'VE',
                    'phonecode' => '58',
                    'capital' => 'Caracas',
                    'currency' => 'VEF',
                    'currency_name' => 'Bolívar',
                    'currency_symbol' => 'Bs',
                    'region' => 'Americas',
                    'latitude' => '8.00000000',
                    'longitude' => '-66.00000000',



                ],
                [
                    'id' => '240',
                    'name' => 'Vietnam',
                    'iso3' => 'VNM',
                    'numeric_code' => '704',
                    'iso2' => 'VN',
                    'phonecode' => '84',
                    'capital' => 'Hanoi',
                    'currency' => 'VND',
                    'currency_name' => 'Vietnamese đồng',
                    'currency_symbol' => '₫',
                    'region' => 'Asia',
                    'latitude' => '16.16666666',
                    'longitude' => '107.83333333',



                ],
                [
                    'id' => '241',
                    'name' => 'Virgin Islands (British)',
                    'iso3' => 'VGB',
                    'numeric_code' => '092',
                    'iso2' => 'VG',
                    'phonecode' => '+1-284',
                    'capital' => 'Road Town',
                    'currency' => 'USD',
                    'currency_name' => 'United States dollar',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '18.43138300',
                    'longitude' => '-64.62305000',



                ],
                [
                    'id' => '242',
                    'name' => 'Virgin Islands (US)',
                    'iso3' => 'VIR',
                    'numeric_code' => '850',
                    'iso2' => 'VI',
                    'phonecode' => '+1-340',
                    'capital' => 'Charlotte Amalie',
                    'currency' => 'USD',
                    'currency_name' => 'United States dollar',
                    'currency_symbol' => '$',
                    'region' => 'Americas',
                    'latitude' => '18.34000000',
                    'longitude' => '-64.93000000',



                ],
                [
                    'id' => '243',
                    'name' => 'Wallis And Futuna Islands',
                    'iso3' => 'WLF',
                    'numeric_code' => '876',
                    'iso2' => 'WF',
                    'phonecode' => '681',
                    'capital' => 'Mata Utu',
                    'currency' => 'XPF',
                    'currency_name' => 'CFP franc',
                    'currency_symbol' => '₣',
                    'region' => 'Oceania',
                    'latitude' => '-13.30000000',
                    'longitude' => '-176.20000000',



                ],
                [
                    'id' => '244',
                    'name' => 'Western Sahara',
                    'iso3' => 'ESH',
                    'numeric_code' => '732',
                    'iso2' => 'EH',
                    'phonecode' => '212',
                    'capital' => 'El-Aaiun',
                    'currency' => 'MAD',
                    'currency_name' => 'Moroccan Dirham',
                    'currency_symbol' => 'MAD',
                    'region' => 'Africa',
                    'latitude' => '24.50000000',
                    'longitude' => '-13.00000000',



                ],
                [
                    'id' => '245',
                    'name' => 'Yemen',
                    'iso3' => 'YEM',
                    'numeric_code' => '887',
                    'iso2' => 'YE',
                    'phonecode' => '967',
                    'capital' => 'Sanaa',
                    'currency' => 'YER',
                    'currency_name' => 'Yemeni rial',
                    'currency_symbol' => '﷼',
                    'region' => 'Asia',
                    'latitude' => '15.00000000',
                    'longitude' => '48.00000000',



                ],
                [
                    'id' => '246',
                    'name' => 'Zambia',
                    'iso3' => 'ZMB',
                    'numeric_code' => '894',
                    'iso2' => 'ZM',
                    'phonecode' => '260',
                    'capital' => 'Lusaka',
                    'currency' => 'ZMW',
                    'currency_name' => 'Zambian kwacha',
                    'currency_symbol' => 'ZK',
                    'region' => 'Africa',
                    'latitude' => '-15.00000000',
                    'longitude' => '30.00000000',



                ],
                [
                    'id' => '247',
                    'name' => 'Zimbabwe',
                    'iso3' => 'ZWE',
                    'numeric_code' => '716',
                    'iso2' => 'ZW',
                    'phonecode' => '263',
                    'capital' => 'Harare',
                    'currency' => 'ZWL',
                    'currency_name' => 'Zimbabwe Dollar',
                    'currency_symbol' => '$',
                    'region' => 'Africa',
                    'latitude' => '-20.00000000',
                    'longitude' => '30.00000000',



                ],
                [
                    'id' => '248',
                    'name' => 'Kosovo',
                    'iso3' => 'XKX',
                    'numeric_code' => '926',
                    'iso2' => 'XK',
                    'phonecode' => '383',
                    'capital' => 'Pristina',
                    'currency' => 'EUR',
                    'currency_name' => 'Euro',
                    'currency_symbol' => '€',
                    'region' => 'Europe',
                    'latitude' => '42.56129090',
                    'longitude' => '20.34030350',



                ],
                [
                    'id' => '249',
                    'name' => 'Curaçao',
                    'iso3' => 'CUW',
                    'numeric_code' => '531',
                    'iso2' => 'CW',
                    'phonecode' => '599',
                    'capital' => 'Willemstad',
                    'currency' => 'ANG',
                    'currency_name' => 'Netherlands Antillean guilder',
                    'currency_symbol' => 'ƒ',
                    'region' => 'Americas',
                    'latitude' => '12.11666700',
                    'longitude' => '-68.93333300',



                ],
            ];
        foreach ($countries as $index => $value) {

            $create = Country::create([
                'id' =>  $value['id'],
                'name' =>  $value['name'],
                'iso3' =>  $value['iso3'],
                'numeric_code' =>  $value['numeric_code'],
                'iso2' =>  $value['iso2'],
                'phonecode' =>  $value['phonecode'],
                'capital' =>  $value['capital'],
                'currency' =>  $value['currency'],
                'currency_name' =>  $value['currency_name'],
                'currency_symbol' =>  $value['currency_symbol'],
                'region' =>  $value['region'],
                'latitude' =>  $value['latitude'],
                'longitude' =>  $value['longitude'],
            ]);
        }
    }
}
