<?php
require_once 'vendor/autoload.php';

require_once 'vendor/fzaninotto/faker/src/autoload.php';

$builder = new AdamWathan\Form\FormBuilder;

// <form method="POST" action="/test">
echo $builder->open()->action('validate.php');

// <input type="text" name="email">
echo "Enter your name : " . $builder->text('name')->required() . "<br />";

// <input type="text" name="email">
echo "enter your e-mail : " . $builder->text('email')->value('example@example.com')->required() . "<br /><br />";

echo "Your gender : ";

// <input type="radio" name="gender" value="male">
echo "Male " . $builder->radio('gender', 'male')->defaultToChecked();
// <input type="radio" name="gender" value="female">
echo "Female " . $builder->radio('gender', 'female') . "<br />";

// <button type="submit">Sign Up</button>
echo $builder->submit('Sign Up');

$faker = Faker\Factory::create();

echo "<br /><br />Contact us : " . "<br /><br />";
echo "$faker->email<br /> Phone 1: $faker->phoneNumber <br />";
echo $faker->address . "<br /><br />";
