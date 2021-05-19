<?php
return [
    'success_create' => ':name successfully created!',
    'success_edit' => ':name successfully updated!',
    'success_delete' => ':name successfully deleted!',
    'success_borrow' => 'Successfully borrowed a book!',
    'success_return' => 'Successfully returned a book!',
    'error_not_exist' => ':name with given ID doesn\'t exist!',
    'error_cant_delete' => 'Cannot delete :name because it it connected with other records.',
    'error_return_all_books' => 'Return all samples of the book before deleting.',
    'error_cant_change_limit' => 'Cannot change a book limit because it would intercept with current count of borrowed books!',
    'warning_not_available' => 'Book is not available.',
    'warning_already_borrowed' => 'Same book is already borrowed.',
    'warning_already_returned' => 'Same book is already return or the book with given ID doesn\'t exist.',
    'warning_max_limit' => 'You reached maximum limit for borrowing books :book_limit. Go to your profile to see more information.',
    'question_delete' => 'Are you sure you wanna delete this record?',
];