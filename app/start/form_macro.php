<?php
Form::macro('first_field_error', function($field_name){
  $html = array();
  $errors = Session::get('errors');

  if( !empty($errors) && $errors->has( $field_name ) ){
    array_push( $html, '<span class="text-danger form-error">' );
    array_push( $html, $errors->first( $field_name ) );
    array_push( $html, '</span>' );
  }

  return implode("", $html);
});
