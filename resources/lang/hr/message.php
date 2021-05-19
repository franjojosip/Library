<?php
return [
    'success_create' => ':name uspješno kreiran!',
    'success_edit' => ':name uspješno izmjenjen!',
    'success_delete' => ':name uspješno obrisan!',
    'success_borrow' => 'Uspješno ste podigli knjigu!',
    'success_return' => 'Uspješno je vraćena knjiga!',
    'error_not_exist' => ':name s danim ID-em ne postoji!',
    'error_cant_delete' => 'Nije moguće obrisati jer je :name povezan s drugim podatcima.',
    'error_return_all_books' => 'Nije moguće obrisati jer je potrebno vratiti sve primjerke knjige.',
    'error_cant_change_limit' => 'Nije moguće promijeniti limit jer je podignuto više knjiga od novog limita!',
    'warning_not_available' => 'Knjiga nije dostupna.',
    'warning_already_borrowed' => 'Ista knjiga je već podignuta.',
    'warning_already_returned' => 'Ista knjiga je već vraćena ili ID ne postoji.',
    'warning_max_limit' => 'Dostigli ste maksimalan limit podizanja knjiga :book_limit. Za više informacije pogledajte svoj profil.',
    'question_delete' => 'Jeste li sigurni da želite obrisati ovaj podatak?',
];