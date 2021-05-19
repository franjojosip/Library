<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Atribut :attribute mora biti prihvaćen.',
    'active_url' => 'Atribut :attribute je neispravan URL.',
    'after' => 'Atribut :attribute mora biti datum poslije datuma :date.',
    'after_or_equal' => 'Atribut :attribute mora biti datum poslije ili jednak datumu :date.',
    'alpha' => 'Atribut :attribute mora sadržavati samo slova.',
    'alpha_dash' => 'Atribut :attribute mora sadržavati samo slova, znamenke, crtice i podvlačenja.',
    'alpha_num' => 'Atribut :attribute mora prihvaćati samo slova i znamenke.',
    'array' => 'Atribut :attribute mora biti polje.',
    'before' => 'Atribut :attribute mora biti datum prije :date.',
    'before_or_equal' => 'Atribut :attribute mora biti datum prije ili jednak datumu :date.',
    'between' => [
        'numeric' => 'Atribut :attribute mora biti između :min i :max.',
        'file' => 'Atribut :attribute mora biti između :min i :max kilobajtova.',
        'string' => 'Atribut :attribute mora biti između :min i :max znakova.',
        'array' => 'Atribut :attribute mora imati između :min i :max podataka.',
    ],
    'boolean' => 'Atribut :attribute polje mora biti true or false.',
    'confirmed' => 'Atribut :attribute potvrda se ne poklapa.',
    'date' => 'Atribut :attribute je neispravan datum.',
    'date_equals' => 'Atribut :attribute mora biti datum jednak datumu :date.',
    'date_format' => 'Atribut :attribute ne odgovara zadanom formatu :format.',
    'different' => 'Atribut :attribute i :other moraju biti drukčiji.',
    'digits' => 'Atribut :attribute mora imati :digits znamenki.',
    'digits_between' => 'Atribut :attribute mora biti između :min i :max znamenki.',
    'dimensions' => 'Atribut :attribute ima neispravne dimenzije slike.',
    'distinct' => 'Atribut :attribute polje ima identične vrijednosti.',
    'email' => 'Atribut :attribute mora biti ispravna email adresa.',
    'ends_with' => 'Atribut :attribute mora završavati s nečim od navedenog: :values.',
    'exists' => 'Odabrani atribut :attribute je neispravan.',
    'file' => 'Atribut :attribute mora biti datoteka.',
    'filled' => 'Atribut :attribute polje mora imati vrijednost.',
    'gt' => [
        'numeric' => 'Atribut :attribute mora biti veći od :value.',
        'file' => 'Atribut :attribute mora biti veći od :value kilobajtova.',
        'string' => 'Atribut :attribute mora biti veći od :value znakova.',
        'array' => 'Atribut :attribute mora imati više od :value podataka.',
    ],
    'gte' => [
        'numeric' => 'Atribut :attribute mora biti veći ili jednak :value.',
        'file' => 'Atribut :attribute mora biti veći ili jednak :value kilobajtova.',
        'string' => 'Atribut :attribute mora biti veći ili jednak :value znakova.',
        'array' => 'Atribut :attribute mora imati :value podataka ili više.',
    ],
    'image' => 'Atribut :attribute mora biti slika.',
    'in' => 'Odabrani atribut :attribute je neispravan.',
    'in_array' => 'Atribut :attribute polje ne postoji u :other.',
    'integer' => 'Atribut :attribute mora biti an integer.',
    'ip' => 'Atribut :attribute mora biti ispravna IP adresa.',
    'ipv4' => 'Atribut :attribute mora biti ispravna IPv4 adresa.',
    'ipv6' => 'Atribut :attribute mora biti ispravna IPv6 adresa.',
    'json' => 'Atribut :attribute mora biti ispravan JSON string.',
    'lt' => [
        'numeric' => 'Atribut :attribute mora biti manji od :value.',
        'file' => 'Atribut :attribute mora biti manji od :value kilobajtova.',
        'string' => 'Atribut :attribute mora biti manji od :value znakova.',
        'array' => 'Atribut :attribute mora imati manje od :value podataka.',
    ],
    'lte' => [
        'numeric' => 'Atribut :attribute mora biti manji od ili jednak :value.',
        'file' => 'Atribut :attribute mora biti manji od ili jednak :value kilobajtova.',
        'string' => 'Atribut :attribute mora biti manji od ili jednak :value znakova.',
        'array' => 'Atribut :attribute ne smije imati više od :value podataka.',
    ],
    'max' => [
        'numeric' => 'Atribut :attribute ne smije biti veća od :max.',
        'file' => 'Atribut :attribute ne smije biti veća od :max kilobajtova.',
        'string' => 'Atribut :attribute ne smije biti veća od :max znakova.',
        'array' => 'Atribut :attribute ne smije imati više od :max podataka.',
    ],
    'mimes' => 'Atribut :attribute mora biti datoteka tipa: :values.',
    'mimetypes' => 'Atribut :attribute mora biti datoteka tipa: :values.',
    'min' => [
        'numeric' => 'Atribut :attribute mora biti barem :min.',
        'file' => 'Atribut :attribute mora biti barem :min kilobajtova.',
        'string' => 'Atribut :attribute mora biti barem :min znakova.',
        'array' => 'Atribut :attribute mora imati barem :min podataka.',
    ],
    'multiple_of' => 'Atribut :attribute mora biti višekratnik od :value.',
    'not_in' => 'Odabrani atribut :attribute je neispravan.',
    'not_regex' => 'Atribut :attribute format je neispravan.',
    'numeric' => 'Atribut :attribute mora biti broj.',
    'password' => 'Lozinka je neispravna.',
    'present' => 'Atribut :attribute polje mora postojati.',
    'regex' => 'Atribut :attribute format je neispravan.',
    'required' => 'Atribut :attribute polje je potrebno.',
    'required_if' => 'Atribut :attribute polje je potrebno kada je :other isti kao :value.',
    'required_unless' => 'Atribut :attribute polje je potrebno osim ako je :other u :values.',
    'required_with' => 'Atribut :attribute polje je potrebno kada :values postoji.',
    'required_with_all' => 'Atribut :attribute polje je potrebno kada :values postoji.',
    'required_without' => 'Atribut :attribute polje je potrebno kada :values ne postoji.',
    'required_without_all' => 'Atribut :attribute polje je potrebno kada nijedan od :values ne postoji.',
    'prohibited' => 'Atribut :attribute je zabranjen.',
    'prohibited_if' => 'Atribut :attribute je zabranjen kada je :other isti kao :value.',
    'prohibited_unless' => 'Atribut :attribute je zabranjen osim ako je :other u :values.',
    'same' => 'Atribut :attribute se mora poklapati s :other.',
    'size' => [
        'numeric' => 'Atribut :attribute mora imati veličinu :size.',
        'file' => 'Atribut :attribute mora imati veličinu :size kilobajta.',
        'string' => 'Atribut :attribute mora imati :size znakova.',
        'array' => 'Atribut :attribute mora sadržavati :size podataka.',
    ],
    'starts_with' => 'Atribut :attribute mora početi sa zadanim vrijednostima: :values.',
    'string' => 'Atribut :attribute mora biti string.',
    'timezone' => 'Atribut :attribute mora biti ispravna zona.',
    'unique' => 'Atribut :attribute se već koristi.',
    'uploaded' => 'Atribut :attribute je neuspješno učitan.',
    'url' => 'Atribut :attribute ima neispravan format.',
    'uuid' => 'Atribut :attribute mora biti ispravni UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
